const CROUSTILLE = window.CROUSTILLE || {};
const isChrome =
  /Chrome/.test(navigator.userAgent) && /Google Inc/.test(navigator.vendor);
const webpSupport = () => isChrome || (CROUSTILLE && CROUSTILLE.webp);

// Cache if we've seen an image before so we don't bother with
// lazy-loading
const imageCache = {};
const inImageCache = (src) => imageCache[src] || false;

const activateCacheForImage = (src) => {
  imageCache[src] = true;
};

let io;
let listeners;
const rootMargin = "0px 0px 100px 0px";

const getIO = () => {
  if (
    typeof io === "undefined" &&
    typeof window !== "undefined" &&
    window.IntersectionObserver
  ) {
    io = new window.IntersectionObserver(
      (entries) => {
        for (let i = 0; i < entries.length; i += 1) {
          for (let j = 0; j < listeners.length; j += 1) {
            if (listeners[j][0] === entries[i].target) {
              // Edge doesn't currently support isIntersecting,
              // so also test for an intersectionRatio > 0
              if (
                entries[i].isIntersecting ||
                entries[i].intersectionRatio > 0
              ) {
                io.unobserve(listeners[j][0]);
                listeners[j][1](listeners[j][0]);
              }
            }
          }
        }
      },
      { root: null, rootMargin }
    );
  }
  return io;
};

const listenToIntersections = (el, cb) => {
  getIO().observe(el);
  listeners.push([el, cb]);
};

const reveal = (ref) => {
  if (ref && ref.nodeName === "VIDEO") {
    const src = ref.dataset.src;

    if (src) {
      ref.src = src;
    }

    if (ref.autoplay && ref.paused) {
      // it might be that Safari on iOS won't auto play..
      try {
        ref.load();
        if (ref.paused) {
          // eslint-disable-next-line
          ref.outerHTML = ref.outerHTML;
        }
      } catch (err) {
        console.error(err);
      }
    }
  } else {
    const imgEl = ref.querySelector(
      "[data-lazyload-placeholder] + picture img"
    );
    const srcEls = ref.querySelectorAll(
      "[data-lazyload-placeholder] + picture source"
    );
    const placeholderEl = ref.querySelector("[data-lazyload-placeholder]");

    let srcEl;

    srcEls.forEach((node) => {
      let mQ = {};
      if (node.media) {
        mQ = window.matchMedia(node.media);
      }
      if (
        mQ.matches &&
        ((node.type === "image/webp" && webpSupport()) ||
          (node.type === "image/jpeg" && !srcEl) ||
          !node.type)
      ) {
        srcEl = node;
      }
    });

    !srcEl && srcEls.length > 0 && (srcEl = srcEls[0]);

    const resolve = () => {
      srcEls.forEach((srcEl) => {
        srcEl.srcset = srcEl.dataset.srcset;
      });
      imgEl.src = imgEl.dataset.src;
      placeholderEl && (placeholderEl.style.opacity = 0);
      imgEl.style.opacity = 1;
    };

    const onError = (err) => {
      throw new Error("Could not load/decode image.", err);
    };

    if (inImageCache(imgEl.dataset.src)) {
      resolve();
      return;
    }
    activateCacheForImage(imgEl.dataset.src);

    const img = new Image();

    if (!("decode" in img)) {
      img.onload = resolve;
      img.onError = onError;
    }

    img.sizes = srcEl.sizes;
    img.srcset = srcEl.dataset.srcset;
    img.src = imgEl.dataset.src;

    if ("decode" in img) {
      img.decode().then(resolve).catch(onError);
    }
  }
};

class Lazyload {
  init() {
    this.observe();
  }

  observe() {
    const images = document.querySelectorAll("[data-lazyload]");

    listeners = [];

    for (let i = 0; i < images.length; i += 1) {
      listenToIntersections(images[i], () => reveal(images[i]));
    }
  }

  reset() {
    if (io) {
      for (let j = 0; j < listeners.length; j += 1) {
        io.unobserve(listeners[j][0]);
        delete listeners[j];
      }
    }

    this.observe();
  }
}

export default Lazyload;

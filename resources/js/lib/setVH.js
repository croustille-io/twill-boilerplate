/**
 * Quickfix for viewport units on mobile (vh)
 * Ref: https://css-tricks.com/the-trick-to-viewport-units-on-mobile/
 */

const setVH = () => {
  const vh = window.innerHeight * 0.01;
  document.documentElement.style.setProperty("--vh", `${vh}px`);
};

export default setVH;

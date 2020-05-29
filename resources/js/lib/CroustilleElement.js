import debounce from "lodash/debounce";

const camelToSnake = (str) =>
  str
    .replace(/[A-Z]/g, (letter) => `-${letter.toLowerCase()}`)
    .replace(/^-+|-+$/g, "");

/**
 * CroustilleElement API
 *
 * Exemple:
 *
 * class Nav extends CroustilleElement {
 *   init() {},
 *   resized() {},
 *   destroy() {},
 *   ...
 * }
 *
 * window.customElements.define('croustille-nav', Nav)
 *
 * <croustille-nav data-style="dark">
 *   <h3 data-nav-title>Title</h3>
 *   <span data-nav-item>Hello</span>
 *   <span data-nav-item>Hello</span>
 *   <span data-nav-item>Hello</span>
 * </croustille-nav>
 *
 * <div data-nav-outsider>World!</div>
 *
 *
 * this.children('item'): NodeList [<span>, <span>, <span>]
 * this.child('title'): Node <h3>
 * this.child('outsider', document): Node <div>
 * this.node.dataset.style: "dark"
 *
 */

class CroustilleElement extends HTMLElement {
  constructor() {
    super();
    this.namespace = camelToSnake(this.constructor.name);
  }

  connectedCallback() {
    this.node = this;
    this._debouncedResizeCallback = debounce(this._resize, 100).bind(this);

    window.addEventListener("resize", this._debouncedResizeCallback);
    this.init();
  }

  disconnectedCallback() {
    window.addEventListener("resize", this._debouncedResizeCallback);
    this.destroy();
  }

  // private methods

  _resize() {
    this.resized();
  }

  // public methods

  children(str, ctx) {
    const context = ctx || this.node;
    return context.querySelectorAll(`[data-${this.namespace}-${str}]`);
  }

  child(str, ctx) {
    const context = ctx || this.node;
    return context.querySelector(`[data-${this.namespace}-${str}]`);
  }

  // lifecycle methods

  init() {}

  destroy() {}

  resized() {}
}

export default CroustilleElement;

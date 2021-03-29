import debounce from 'lodash/debounce'
import { camelToSnake } from './camelToSnake'

/**
 * CroustilleElement
 *
 * Exemple:
 *
 * class Nav extends CroustilleElement {
 *   constructor() {
 *     super("nav")
 *   }
 *   init() {}
 *   resized() {}
 *   destroy() {}
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
  constructor(namespace) {
    const self = super()

    if (!namespace) {
      throw new Error(
        `Provide a namespace in constuctor: super("${camelToSnake(
          self.constructor.name
        )}")`
      )
    }

    self.namespace = namespace || camelToSnake(self.constructor.name)
    self._debouncedResizeCallback = debounce(self._resize, 100).bind(this)
    self._resized = this.resized.bind(this)
    self.node = self
    window.addEventListener('resize', self._debouncedResizeCallback)

    return self
  }

  connectedCallback() {
    this.init()
  }

  disconnectedCallback() {
    window.removeEventListener('resize', this._debouncedResizeCallback)
    this.destroy()
  }

  // private methods

  _resize() {
    this._resized()
  }

  // public methods

  children(str, ctx) {
    const context = ctx || this
    return context.querySelectorAll(this.childSelector(str))
  }

  child(str, ctx) {
    const context = ctx || this
    return context.querySelector(this.childSelector(str))
  }

  childSelector(str) {
    return `[data-${this.namespace}-${str}]`
  }

  // lifecycle methods

  init() {}

  destroy() {}

  resized() {}
}

export default CroustilleElement

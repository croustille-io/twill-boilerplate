import Vue from 'vue'
import { setVH, focusDisplayHandler } from './lib'
import { CroustilleImage } from '../../packages/croustille/image/src/js'

require('./bootstrap')

Vue.component(
  'example-component',
  require('./components/ExampleComponent.vue').default
)

// const CROUSTILLE = window.CROUSTILLE || {};

// eslint-disable-next-line
const app = new Vue({
  el: '#app',
})

document.addEventListener('DOMContentLoaded', function () {
  const lazyloading = new CroustilleImage()

  window.addEventListener('resize', setVH)
  setVH()
  focusDisplayHandler()
})

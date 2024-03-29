import Vue from 'vue'
import { setVH, focusDisplayHandler } from './lib'
import { TwillImage } from '../../vendor/croustille/twill-image'

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
  const lazyloading = new TwillImage()

  window.addEventListener('resize', setVH)
  setVH()
  focusDisplayHandler()
})

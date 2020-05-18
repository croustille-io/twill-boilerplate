import Vue from "vue";
import Lazyload from "./vendor/croustille/image/lazyload";
import setVH from "./lib/setVH";

require("./bootstrap");

Vue.component(
  "example-component",
  require("./components/ExampleComponent.vue").default
);

// const CROUSTILLE = window.CROUSTILLE || {};

// eslint-disable-next-line
const app = new Vue({
  el: "#app",
});

document.addEventListener("DOMContentLoaded", function () {
  const lazyloading = new Lazyload();
  lazyloading.init();

  window.addEventListener("resize", setVH);
  setVH();
});

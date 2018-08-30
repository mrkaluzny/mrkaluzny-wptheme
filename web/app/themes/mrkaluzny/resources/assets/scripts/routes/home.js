import 'jquery';
import 'tilt.js';

export default {
  init() {
    // JavaScript to be fired on the home page
    $('.service').tilt({
      maxTilt: 10,
      perspective: 1500,
      scale: 1.1,
      speed: 400,
    })
  },
  finalize() {
    // JavaScript to be fired on the home page, after the init JS
  },
};

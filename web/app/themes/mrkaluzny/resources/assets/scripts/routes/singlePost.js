import 'jquery';
import hljs from 'highlight.js';

export default {
  init() {
    // JavaScript to be fired on the home page
    $(document).ready(function() {
      $('pre code').each(function(i, block) {
        hljs.highlightBlock(block);
        console.log('Activated..') /* eslint-disable-line */
      });
    });
  },
  finalize() {
    // JavaScript to be fired on the home page, after the init JS
  },
};

import 'jquery';
import React from 'react';
import ReactDOM from 'react-dom';
import Blog from '../React/Blog.jsx'

export default {
  init() {
    // JavaScript to be fired on the home page
    console.log("loaded")
    ReactDOM.render(<Blog />, document.getElementById('clients'))
  },
  finalize() {
    // JavaScript to be fired on the home page, after the init JS
  },
};

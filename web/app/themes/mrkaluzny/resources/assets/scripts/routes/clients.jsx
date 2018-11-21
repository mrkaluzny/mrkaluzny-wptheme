import 'jquery';
import React from 'react';
import ReactDOM from 'react-dom';
import Clients from '../React/Clients.jsx'

export default {
  init() {
    // JavaScript to be fired on the home page
    ReactDOM.render(<Clients />, document.getElementById('clients'))
  },
  finalize() {
    // JavaScript to be fired on the home page, after the init JS
  },
};

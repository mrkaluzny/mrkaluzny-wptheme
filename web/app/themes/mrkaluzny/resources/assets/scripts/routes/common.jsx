import React from 'react';
import ReactDOM from 'react-dom';
import Availability from '../components/Availability.jsx';
import Navbar from '../components/Navbar.jsx';

export default {
  init() {
    ReactDOM.render(<Availability />, document.getElementById('availability'))
    ReactDOM.render(<Navbar />, document.getElementById('navbar'))
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};

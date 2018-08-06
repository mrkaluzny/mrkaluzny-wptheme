import React from 'react';
import ReactDOM from 'react-dom';
import Availability from '../components/Availability.jsx';

export default {
  init() {
    ReactDOM.render(<Availability />, document.getElementById('availability'))
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};

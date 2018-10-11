import 'jquery';
import AOS from 'aos';
import React from 'react';
import ReactDOM from 'react-dom';
import Availability from '../React/Availability.jsx';
import Navbar from '../React/Navbar.jsx';
import Testimonials from '../React/Testimonials.jsx';
import RecentProjects from '../React/RecentProjects.jsx';
import RecentArticles from '../React/RecentArticles.jsx';

export default {
  init() {
    AOS.init();
    checkIfElementExistsAndRenderReactComponent(<Availability />, 'availability')
    checkIfElementExistsAndRenderReactComponent(<Navbar />, 'navbar')
    checkIfElementExistsAndRenderReactComponent(<Testimonials />, 'testimonials')
    checkIfElementExistsAndRenderReactComponent(<Testimonials />, 'testimonials')
    checkIfElementExistsAndRenderReactComponent(<RecentProjects />, 'recent-projects')
    checkIfElementExistsAndRenderReactComponent(<RecentArticles />, 'recent-articles')
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};


function checkIfElementExistsAndRenderReactComponent(Component, elementID) {
  if ($(`#${elementID}`).length > 0) {
    ReactDOM.render(Component, document.getElementById(elementID))
  }
}

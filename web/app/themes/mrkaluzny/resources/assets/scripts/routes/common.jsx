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
    ReactDOM.render(<Availability />, document.getElementById('availability'))
    ReactDOM.render(<Navbar />, document.getElementById('navbar'))
    ReactDOM.render(<Testimonials />, document.getElementById('testimonials'))
    ReactDOM.render(<RecentProjects />, document.getElementById('recent-projects'))
    ReactDOM.render(<RecentArticles />, document.getElementById('recent-articles'))
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};

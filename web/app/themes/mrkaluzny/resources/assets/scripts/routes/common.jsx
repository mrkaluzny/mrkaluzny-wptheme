import React from 'react';
import ReactDOM from 'react-dom';
import Availability from '../components/Availability.jsx';
import Navbar from '../components/Navbar.jsx';
import Testimonials from '../components/Testimonials.jsx';
import RecentProjects from '../components/RecentProjects.jsx';
import RecentArticles from '../components/RecentArticles.jsx';

export default {
  init() {
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

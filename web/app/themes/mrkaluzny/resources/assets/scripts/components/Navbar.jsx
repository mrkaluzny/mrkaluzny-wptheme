import PropTypes from 'prop-types';
import React from 'react';
import {Helper} from '../Helper.js';
import axios from 'axios';

export default class Navbar extends React.Component {
  constructor(props) {
    super(props);

    // How to set initial state in ES6 class syntax
    // https://reactjs.org/docs/state-and-lifecycle.html#adding-local-state-to-a-class
    this.state = {
      status: '',
      content: '',
    };
  }

  componentDidMount() {
    axios.get(Helper.getAPIRouteForResource('settings'))
    .then(res => {
      this.setState({
        status: res.data.availability.status,
        content: res.data.availability.content,
      })
    })
  }


  render() {
    let homeURL = window.location.href
    return (
      <header className="header">
        <nav className="navigation">
          <div className="container">
            <a className="brand" href={homeURL}>mrkaluzny</a>
          </div>
        </nav>
      </header>
    );
  }
}

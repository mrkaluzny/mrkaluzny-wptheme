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
      isMenuOpen: false,
    }
    this.activateMenu = this.activateMenu.bind(this)
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

  activateMenu() {
    this.setState(prevState => ({
      isMenuOpen: !prevState.isMenuOpen,
    }))
  }


  render() {
    let homeURL = window.location.href
    let btnClass = 'btn btn--nav' + (this.state.isMenuOpen ? ' btn--active' : '')
    let brandClass = 'brand' + (this.state.isMenuOpen ? ' brand--white' : '')
    let navClass = 'mobile-nav' + (this.state.isMenuOpen ? ' mobile-nav--active' : '')

    return (
      <header className="header">
        <nav className="navigation">
          <div className="container">
            <div className="navigation__inner">
              <a className={brandClass} href={homeURL}>mrkaluzny</a>
              <div className={btnClass} onClick={this.activateMenu}>
                <span></span>
                <span></span>
                <span></span>
              </div>
            </div>
          </div>
        </nav>

        <div className={navClass}>

        </div>
      </header>
    );
  }
}

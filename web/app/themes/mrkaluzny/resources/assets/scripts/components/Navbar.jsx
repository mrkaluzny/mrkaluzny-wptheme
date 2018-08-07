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
      currentScroll: 0,
      isNavigationVisible: false,
    }
    this.activateMenu = this.activateMenu.bind(this)
    this.handleScroll = this.handleScroll.bind(this)
  }

  componentDidMount() {
    window.addEventListener('scroll', this.handleScroll)
    axios.get(Helper.getAPIRouteForResource('settings'))
    .then(res => {
      this.setState({
        status: res.data.availability.status,
        content: res.data.availability.content,
      })
    })
  }

  componentWillUnmount() {
    window.removeEventListener('scroll', this.handleScroll)
  }

  activateMenu() {
    this.setState(prevState => ({
      isMenuOpen: !prevState.isMenuOpen,
    }))
  }

  handleScroll () {
    const lastScrollY = this.state.currentScroll;
    const currentScrollY = window.scrollY;
    console.log(`Current scroll: ${currentScrollY} Last Scroll: ${lastScrollY}`)

    if (currentScrollY > lastScrollY) {
      this.setState({ isNavigationVisible: false });
    } else if (currentScrollY < lastScrollY) {
      this.setState({ isNavigationVisible: true });
    }
    this.setState({ currentScroll: currentScrollY });
  }


  render() {
    let homeURL = window.location.href
    let navigationClass
    if (this.state.currentScroll < 66 && !this.state.isNavigationVisible || this.state.currentScroll < 3) {
      navigationClass = 'navigation'
    } else {
      navigationClass = 'navigation navigation--fixed navigation--animate' + (this.state.isNavigationVisible ? ' navigation--visible' : ' navigation--hidden');
    }

    if (this.state.isMenuOpen) {
      navigationClass += ' navigation--open'
    }
    let btnClass = 'btn btn--nav' + (this.state.isMenuOpen ? ' btn--active' : '')
    let brandClass = 'brand' + (this.state.isMenuOpen ? ' brand--white' : '')
    let navClass = 'mobile-nav' + (this.state.isMenuOpen ? ' mobile-nav--active' : '')

    return (
      <header className="header">
        <nav className={navigationClass}>
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

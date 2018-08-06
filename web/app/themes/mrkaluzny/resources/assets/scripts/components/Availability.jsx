import PropTypes from 'prop-types';
import React from 'react';
import {Helper} from '../Helper.js';
import axios from 'axios';

export default class Availability extends React.Component {
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

    let boxClass = 'availability__status availability__status--' + this.state.status.value

    return (
      <div className="availability__wrapper">
        <div className="availability availability--white">
          <div className="availability__name">Current Availability</div>
          <div className="availability__spacer"></div>
          <div className={boxClass}><span></span> { this.state.status.label }</div>
        </div>
      </div>
    );
  }
}

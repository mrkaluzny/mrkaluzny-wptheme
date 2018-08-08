import React, { Component } from 'react';
import PropTypes from 'prop-types';

class Carousel extends Component {
  render() {
    const { title, children } = this.props

    return (
      <div>
        <h2>{ title }</h2>
        { children }
      </div>
    )
  }
}


Carousel.propTypes = {
  title: PropTypes.string,
  children: PropTypes.node,
};



export default Carousel;

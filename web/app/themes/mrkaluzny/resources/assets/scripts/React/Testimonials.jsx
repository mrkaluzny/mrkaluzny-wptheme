import PropTypes from 'prop-types';
import React from 'react';
import axios from 'axios';
import Slider from 'react-slick';
//
import {Helper} from '../Helper.js';
import Loader from './partials/Loader.jsx';
import TestimonialItem from './partials/TestimonialItem.jsx';

import dots from '../../images/testimonial-dots.png';

export default class Testimonials extends React.Component {
  constructor(props) {
    super(props);

    // How to set initial state in ES6 class syntax
    // https://reactjs.org/docs/state-and-lifecycle.html#adding-local-state-to-a-class
    this.state = {
      testimonials: [],
      isLoading: true,
    };
  }

  componentDidMount() {
    axios.get(Helper.getAPIRouteForResource('testimonials'))
    .then(res => {
      this.setState({
        testimonials: res.data,
        isLoading: false,
      })
    })
  }


  render() {
    let i = 1;
    const cards = this.state.testimonials.map( (item) => {
      return (
        <div className="testimonials__slide" key={item[0].id}>
          <TestimonialItem key={item[0].id} testimonial={item[0]} />
          <TestimonialItem key={item[1].id} testimonial={item[1]} />
        </div>
      )
    })

    const settings = {
      dots: false,
      infinite: true,
      swipeToSlide: true,
      arrows: false,
      centerPadding: '0 30px',
      speed: 500,
      slidesToShow: 2,
      variableWidth: true,
    };

    return (
      <section className="testimonials">
        <img src={dots} alt="" className="testimonials__dots" />
        <div className="container">
          <div className="row">
            <div className="col-12">
              <div className="title title--left" data-aos="fade-up">
                <h1 className="title__main title__main--large">Your business always comes first<span>.</span></h1>
              </div>
            </div>
          </div>
        </div>

        <div className="slider-wrapper slider-wrapper--testimonials" data-aos="fade-up">
        {this.state.isLoading ? <Loader /> : '' }
          <Slider {...settings} data-aos="fade-up">
            { cards }
          </Slider>
        </div>

      </section>

    );
  }
}

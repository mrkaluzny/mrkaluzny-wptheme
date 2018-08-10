import PropTypes from 'prop-types';
import React from 'react';
import {Helper} from '../Helper.js';
import axios from 'axios';
import Slider from 'react-slick';

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
      })
    })
  }


  render() {

    const cards = this.state.testimonials.map( (item) => {
      return (
        <article className="card card--testimonial" key={item.id}>
          <img src={item.image.small} alt="" className="card__image card__image--testimonial"/>
          <h1 className="card__name">{item.name}</h1>
          <h2 className="card__position">{item.position} at {item.company}</h2>
          <div className="card__content">{item.content}</div>
        </article>
      )
    })

    const settings = {
      dots: false,
      infinite: true,
      arrows: false,
      centerMode: true,
      centerPadding: '0 12px',
      speed: 500,
      slidesToShow: 1.2,
      slidesToScroll: 1,
    };

    return (
      <section className="section section--testimonials background--up">
        <div className="container">
          <div className="row">
            <div className="col-12">
              <div className="title">
                <h2 className="title__top">Testimonials</h2>
                <h1 className="title__main">Some of my happy clients</h1>
              </div>
              <div className="slider-wrapper">
                <Slider {...settings}>
                  { cards }
                </Slider>
              </div>
            </div>
          </div>
        </div>
      </section>
    );
  }
}

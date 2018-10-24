import PropTypes from 'prop-types';
import React from 'react';
import {Helper} from '../Helper.js';
import axios from 'axios';
import Slider from 'react-slick';
import Loader from './partials/Loader.jsx';

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

    const cards = this.state.testimonials.map( (item) => {
      return (
        <article className="card card--testimonial" key={item.id}>
          <div className="card__content card__content--testimonial" dangerouslySetInnerHTML={{__html: item.content}}></div>
          <img src={item.image.small} alt="" className="card__image card__image--testimonial"/>
          <h1 className="card__name">{item.name}</h1>
          <h2 className="card__position">{item.position} at {item.company}</h2>
        </article>
      )
    })

    const settings = {
      dots: false,
      infinite: true,
      arrows: false,
      centerMode: true,
      centerPadding: '0 30px',
      speed: 500,
      slidesToShow: 3,
      slidesToScroll: 1,
    };

    return (

        <div className="container">
          <div className="row">
            <div className="col-12">
              <div className="title" data-aos="fade-up">
                <h2 className="title__top">Testimonials</h2>
                <h1 className="title__main">Some of my happy clients</h1>
              </div>
              <div className="slider-wrapper slider-wrapper--testimonials" data-aos="fade-up">
              {this.state.isLoading ? <Loader /> : '' }
                <Slider {...settings} data-aos="fade-up">
                  { cards }
                </Slider>
              </div>
            </div>
          </div>
        </div>

    );
  }
}

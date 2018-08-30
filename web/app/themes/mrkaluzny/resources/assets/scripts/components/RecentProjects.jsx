import PropTypes from 'prop-types';
import React from 'react';
import {Helper} from '../Helper.js';
import axios from 'axios';
import Slider from 'react-slick';

export default class RecentProjects extends React.Component {
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
    axios.get(Helper.getAPIRouteForResource('projects'))
    .then(res => {
      this.setState({
        testimonials: res.data,
      })
    })
  }


  render() {

    const cards = this.state.testimonials.map( (item) => {
      return (
        <div className="card card--project" href={item.permalink} key={item.id}>
          <div className="card__image card__image--project" style={{ background: item.color }}>
            <img src={item.image.large} alt={item.name}/>
          </div>
          <div className="card__project-info">
            <div className="card__project-owner">
              <h1 className="card__company">{item.name}</h1>
              <h2 className="card__category">Category</h2>
            </div>
            <div className="card__content">{item.excerpt}</div>
          </div>
        </div>
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
      <section className="section section--portfolio background--down">
        <div className="container">
          <div className="row">
            <div className="col-12">
              <div className="title">
                <h2 className="title__top">Recent Work</h2>
                <h1 className="title__main">Recently delivered projects</h1>
              </div>
              <div className="slider-wrapper">
                <Slider {...settings}>
                  { cards }
                </Slider>
              </div>
            </div>
            <div className="col-12 text-center">
              <a href='/portfolio' className="btn btn--green btn--rounded btn--medium">See complete portfolio</a>
            </div>
          </div>
        </div>
      </section>
    );
  }
}

import React from 'react';
import {Helper} from '../Helper.js';
import axios from 'axios';
import Slider from 'react-slick';

import Project from './partials/Project.jsx';
import Loader from './partials/Loader.jsx';



export default class RecentProjects extends React.Component {
  constructor(props) {
    super(props);

    // How to set initial state in ES6 class syntax
    // https://reactjs.org/docs/state-and-lifecycle.html#adding-local-state-to-a-class
    this.state = {
      testimonials: [],
      isLoading: true,
      isMobile: false,
      viewportWidth: null,
    };
    this.handleResize = this.handleResize.bind(this)
  }

  componentDidMount() {
    window.addEventListener('resize', this.handleResize)
    this.handleResize()
    axios.get(Helper.getAPIRouteForResource('projects'))
    .then(res => {
      this.setState({
        testimonials: res.data,
        isLoading: false,
      })
    })
  }

  handleResize() {
    const isMobile = this.state.isMobile
    let innerWidth = Helper.getInnerWidth()

    if (innerWidth >= 680 && isMobile) {
      this.setState({
        isMobile: false,
      })
    } else if (innerWidth < 680 && !isMobile) {
      this.setState({
        isMobile: true,
      })
    }
  }


  render() {

    const cards = this.state.testimonials.slice(0,6).map( (item) => {
      return (
        <div className="card card--project" href={item.permalink} key={item.id} data-aos="fade-up">
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
      slidesToShow: 1,
      slidesToScroll: 1,
    };

    const projectsMobile = <div className="slider-wrapper">
      <Slider {...settings}>
        { cards }
      </Slider>
    </div>;

    const projects = this.state.testimonials.slice(0,4).map( (item) => {
      return (
        <Project key={item.id} project={item} />
      )
    });

    return (
      <section className="section section--portfolio background--down">
        <div className="container">
          <div className="row">
            <div className="col-12">
              <div className="title title--right" data-aos="fade-up">
                <h1 className="title__main title__main--large">Proudly providing solutions around the globe<span>.</span></h1>
              </div>
              <div className="projects-feed">
                {this.state.isLoading ? <Loader /> : '' }
                {this.state.isMobile ? projectsMobile : projects}
              </div>
            </div>
            <div className="col-12 text-center" data-aos="fade-up">
              <a href='/clients' className="btn btn--standard btn--standard-large">See complete portfolio</a>
            </div>
          </div>
        </div>
      </section>
    );
  }
}

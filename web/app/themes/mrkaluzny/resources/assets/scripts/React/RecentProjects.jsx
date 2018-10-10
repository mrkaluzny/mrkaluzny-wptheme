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

    const projectsMobile = <div className="slider-wrapper">
      <Slider {...settings}>
        { cards }
      </Slider>
    </div>;

    const projects = this.state.testimonials.slice(0,4).map( (item) => {
      return (
        <article className="project" key={item.id}>
          <a href={item.permalink} className="project__wrapper" >
            <div className="project__image">
              <img src={item.desktop_image.large} alt={item.name}/>
            </div>
            <div className="project__info">
              <div className="project__info__owner">
                <h2 className="project__info__category">Category</h2>
                <h1 className="project__info__company">{item.name}</h1>
              </div>
              <div className="project__info__content">{item.excerpt}</div>
            </div>
          </a>
        </article>
      )
    });

    return (
      <section className="section section--portfolio background--down">
        <div className="container">
          <div className="row">
            <div className="col-12">
              <div className="title">
                <h2 className="title__top">Recent Work</h2>
                <h1 className="title__main">Recently delivered projects</h1>
              </div>
              <div className="projects-feed">
                {this.state.isMobile ? projectsMobile : projects}
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

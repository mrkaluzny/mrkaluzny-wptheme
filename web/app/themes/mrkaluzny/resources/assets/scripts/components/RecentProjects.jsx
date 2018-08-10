import PropTypes from 'prop-types';
import React from 'react';
import {Helper} from '../Helper.js';
import axios from 'axios';

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
        <a className="card card--project" href={item.permalink} key={item.id}>
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
        </a>
      )
    })

    return (
      <section className="section section--portfolio background--down">
        <div className="container">
          <div className="row">
            <div className="col-12">
              <div className="title">
                <h2 className="title__top">Recent Work</h2>
                <h1 className="title__main">Recently delivered projects</h1>
              </div>
              <div className="portfolio__feed">
                { cards }
              </div>
            </div>
            <div className="col-12 text-center">
              <a href='/portfolio' className="btn btn--green btn--rounded btn--large">See complete portfolio</a>
            </div>
          </div>
        </div>
      </section>
    );
  }
}

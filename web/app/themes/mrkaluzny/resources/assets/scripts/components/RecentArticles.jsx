import React from 'react';
import {Helper} from '../Helper.js';
import axios from 'axios';
import Slider from 'react-slick';
import RecentArticle from './partials/RecentArticle.jsx';

export default class RecentArticles extends React.Component {
  constructor(props) {
    super(props);

    // How to set initial state in ES6 class syntax
    // https://reactjs.org/docs/state-and-lifecycle.html#adding-local-state-to-a-class
    this.state = {
      posts: [],
      isLoading: true,
      isMobile: false,
      viewportWidth: null,
    };
    this.handleResize = this.handleResize.bind(this)
  }

  componentDidMount() {
    window.addEventListener('resize', this.handleResize)
    this.handleResize()

    axios.get(Helper.getAPIRouteForResource('recent-articles'))
    .then(res => {

      if (res.data) {
        this.setState({
          posts: res.data,
          isLoading: false,
        })
      }
    })
  }

  componentWillUnmount() {
    window.removeEventListener('resize', this.handleResize)
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

    const articles = this.state.posts.map( (item) => {
      return (
        <div className="col-4" key={item.id}>
          <RecentArticle data={item} />
        </div>
      )
    })

    const posts = this.state.posts.map( (item) => {
      return (
        <RecentArticle data={item} key={item.id} />
      )
    })

    const articlesMobile = <div className="col-12"><div className="slider-wrapper"><Slider {...settings} >{posts}</Slider></div></div>

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
      <section className="section promoted-articles">
        <div className="container">
          <div className="row">
            <div className="col-12">
              <div className="title">
                <h2 className="title__top">Latest Tips</h2>
                <h1 className="title__main">Check the latest articles</h1>
              </div>
            </div>
          </div>
        </div>
        <div className="container">
          <div className="row">
            {this.state.isMobile ? articlesMobile : articles}
          </div>
          <div className="row">
            <div className="col-12 text-center">
              <a className="btn btn--rounded btn--green btn--medium" href="/blog">Check the blog</a>
            </div>
          </div>
        </div>
      </section>
    );
  }
}

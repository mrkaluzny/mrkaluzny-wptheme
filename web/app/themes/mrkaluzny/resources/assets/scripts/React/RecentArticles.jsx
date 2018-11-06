import React from 'react';
import {Helper} from '../Helper.js';
import axios from 'axios';
import Slider from 'react-slick';
import Article from './partials/Article.jsx';
import Loader from './partials/Loader.jsx';

export default class RecentArticles extends React.Component {
  constructor(props) {
    super(props);
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
        <div className="col-lg-4 col-md-6" key={item.id}>
          <Article data={item} />
        </div>
      )
    })

    const posts = this.state.posts.map( (item) => {
      return (
        <Article data={item} key={item.id} />
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
      slidesToShow: 1,
      slidesToScroll: 1,
    };

    return (
      <section className="section promoted-articles">
        <div className="container">
          <div className="row">
            <div className="col-12">
              <div className="title title--left" data-aos="fade-up">
                <h1 className="title__main title__main--large">Latest tips from the blog<span>.</span></h1>
              </div>
            </div>
          </div>
        </div>
        <div className="container">
          <div className="row">
            {this.state.isLoading ? <Loader /> : '' }
            {this.state.isMobile ? articlesMobile : articles}
          </div>
          <div className="row">
            <div className="col-12 text-center" data-aos="fade-up">
              <a className="btn btn--standard btn--standard-large" href="/blog">Check the blog</a>
            </div>
          </div>
        </div>
      </section>
    );
  }
}

import React from 'react';
import {Helper} from '../Helper.js';
import axios from 'axios';
//

import Loader from './partials/Loader.jsx';
import Article from './partials/Article.jsx';
import Filters from './partials/Filters/Filters.jsx';

export default class Blog extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      posts: [],
      categories: [],
      isLoading: true,
      isMobile: false,
      viewportWidth: null,
      articleCounter: 3,
      bottom: false,
    };

    this.handleScrollEvent = this.handleScrollEvent.bind(this)
  }

  componentDidMount() {
    axios.get(Helper.getAPIRouteForResource('articles'))
    .then(res => {
      if (res.data) {
        this.setState({
          posts: res.data,
          isLoading: false,
        })

        window.addEventListener('scroll', this.handleScrollEvent)
      }
    })

    axios.get(Helper.getAPIRouteForResource('filters/category'))
    .then(res => {
      this.setState({
        categories: res.data,
      })
    })
  }

  componentWillUnmount() {
    window.removeEventListener('scroll', this.handleScrollEvent)
  }

  handleScrollEvent() {
    let bottom = this.bottomVisible()
    if (bottom && this.state.posts.length >= this.state.articleCounter) {
      this.setState((prevState) => {
        return {articleCounter: prevState.articleCounter + 3}
      })
    }
  }

  bottomVisible() {
    const scrollY = window.scrollY
    const visible = document.documentElement.clientHeight
    const pageHeight = document.documentElement.scrollHeight
    const bottomOfPage = visible + scrollY >= pageHeight - 500
    return bottomOfPage || pageHeight < visible
  }


  render() {

    const articles = this.state.posts.slice(0, this.state.articleCounter).map( (item) => {
      return (
        <Article data={item} key={item.id} />
      )
    })

    return (
      <section className="section blog-posts">
        <div className="container">
          <div className="row">
            <div className="col-12">
              <div className="filters__wrapper">
                <Filters title="Browse by topic" filters={this.state.categories} />
              </div>
              <div className="blog-posts__feed">
                {!this.state.isLoading ? articles : ''}
                {this.state.isLoading ? <Loader /> : ''}
              </div>
            </div>
          </div>
        </div>
      </section>
    );
  }
}

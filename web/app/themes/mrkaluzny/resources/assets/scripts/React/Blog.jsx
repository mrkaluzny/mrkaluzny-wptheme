import React from 'react';
import {Helper} from '../Helper.js';
import axios from 'axios';
import RecentArticle from './partials/RecentArticle.jsx';
import Loader from './partials/Loader.jsx';

export default class Blog extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      posts: [],
      isLoading: true,
      isMobile: false,
      viewportWidth: null,
      articleCounter: 3,
      bottom: false,
    };
  }

  componentDidMount() {
    axios.get(Helper.getAPIRouteForResource('articles'))
    .then(res => {
      if (res.data) {
        this.setState({
          posts: res.data,
          isLoading: false,
        })

        window.addEventListener('scroll', () => {
          let bottom = this.bottomVisible()
          if (bottom && this.state.posts.length >= this.state.articleCounter) {
            this.setState((prevState) => {
              return {articleCounter: prevState.articleCounter + 3}
            })
          }
        })
      }
    })
  }

  componentWillUnmount() {
    window.removeEventListener('scroll')
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
        <RecentArticle data={item} key={item.id} />
      )
    })

    return (
      <section className="section blog-posts">
        <div className="container">
          <div className="row">
            <div className="col-12">
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

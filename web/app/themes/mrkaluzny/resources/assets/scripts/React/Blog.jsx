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
      }
    })
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
                {this.state.isLoading ? <Loader /> : articles}
              </div>
            </div>
          </div>
        </div>
      </section>
    );
  }
}

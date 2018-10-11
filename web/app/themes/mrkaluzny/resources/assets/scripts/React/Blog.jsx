import React from 'react';
import {Helper} from '../Helper.js';
import axios from 'axios';
import RecentArticle from './partials/RecentArticle.jsx';

export default class Blog extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      posts: [],
      isLoading: true,
      isMobile: false,
      viewportWidth: null,
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

    const articles = this.state.posts.map( (item) => {
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
                {articles}
              </div>
            </div>
          </div>
        </div>
      </section>
    );
  }
}

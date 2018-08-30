import React, { Component } from 'react';
import PropTypes from 'prop-types';

class RecentArticle extends Component {
  render() {

    const post = this.props.data

    return (
      <a href={post.permalink} className="article__link">
        <article className="article article--recent">
          <img src={post.image.large} alt={post.title} className="article__image"/>
          <h1 className="article__title article__title--recent">{post.title}</h1>
          <div className="article__excerpt">
            {post.excerpt}
          </div>
        </article>
      </a>
    )
  }
}


RecentArticle.propTypes = {
  data: PropTypes.object,

};



export default RecentArticle;

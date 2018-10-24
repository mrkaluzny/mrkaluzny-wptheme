import React, { Component } from 'react';
import PropTypes from 'prop-types';
import Author from './Author.jsx';


class Article extends Component {
  render() {

    const post = this.props.data

    const categories = post.categories.map( cat => {
      return (
        <span className="article__cat" key={cat.term_id} dangerouslySetInnerHTML={{__html: cat.name}}></span>
      )
    });

    return (
      <a href={post.permalink} className="article__link" data-aos="fade-up">
        <article className="article article--recent">
          <div className="article__image">
            <img src={post.image.large} alt={post.title}/>
          </div>
          <div className="article__categories">
            { categories }
          </div>
          <h1 className="article__title article__title--recent">{post.title}</h1>
          <Author author={post.author} published={post.published_on} readtime={post.time_to_read} />
          <div className="article__excerpt">
            {post.excerpt}
          </div>
        </article>
      </a>
    )
  }
}


Article.propTypes = {
  data: PropTypes.object,
};



export default Article;

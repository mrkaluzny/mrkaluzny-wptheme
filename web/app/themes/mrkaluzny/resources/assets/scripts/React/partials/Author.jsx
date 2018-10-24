import React, { Component } from 'react';
import PropTypes from 'prop-types';


class Author extends Component {
  render() {
    const author = this.props.author
    const published = this.props.published
    const readtime = this.props.readtime

    return (
      <div className="author author--recent">
        <img src={author.avatar} alt={author.name} className="author__photo author__photo--recent"/>
        <div className="author__info author__info--recent">
          <div className="author__name author__name--recent"> { author.name }</div>
          <div className="author__details author__details--recent">
            <span className="article__published">{published}</span> | <span className="article__time">{readtime }</span>
          </div>
        </div>
      </div>
    )
  }
}


Author.propTypes = {
  author: PropTypes.object.isRequired,
  readtime: PropTypes.string.isRequired,
  published: PropTypes.string.isRequired,
};



export default Author;

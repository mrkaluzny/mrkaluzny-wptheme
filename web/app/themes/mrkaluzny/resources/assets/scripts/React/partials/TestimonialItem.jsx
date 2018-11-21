import React, { Component } from 'react'


export default class TestimonialItem extends Component {
  render() {
    return(
      <article className="testimonial">
        <div className="testimonial__author">
          <img src={this.props.testimonial.image.small ? this.props.testimonial.image.small : 'https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp&f=y' } alt="" className="testimonial__author__image"/>
          <div className="testimonial__author__details">
            <h1 className="testimonial__author__name">{this.props.testimonial.name}</h1>
            <h2 className="testimonial__author__position">{this.props.testimonial.position} at {this.props.testimonial.company}</h2>
          </div>
        </div>
        <div className="testimonial__content" dangerouslySetInnerHTML={{__html: this.props.testimonial.content}}></div>
      </article>
    )
  }
}

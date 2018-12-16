import React, {Component} from 'react'

export default class Project extends Component {
  render() {

    const types = this.props.project.type.map( cat => {
      return (
        <span className="project__type" key={cat.term_id} dangerouslySetInnerHTML={{__html: cat.name}}></span>
      )
    });

    return(
      <article className="project" key={this.props.project.id} data-aos="fade-up" style={{backgroundImage: `url('${this.props.project.desktop_image.large}')`}}>
        <a href={this.props.project.permalink} className="project__wrapper" >
          <div className="project__image">
          </div>
          <div className="project__info">
            <div className="project__info__owner">
              <div className="project__info__types">
                { types }
              </div>
              <h1 className="project__info__company">{this.props.project.name}</h1>
            </div>
            <div className="project__info__content">{this.props.project.excerpt}</div>
          </div>
        </a>
      </article>
    )
  }
}

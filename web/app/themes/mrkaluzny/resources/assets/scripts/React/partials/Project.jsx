import React, {Component} from 'react'

export default class Project extends Component {
  render() {
    return(
      <article className="project" key={project.id} data-aos="fade-up" style={{backgroundImage: `url('${project.desktop_image.large}')`}}>
        <a href={project.permalink} className="project__wrapper" >
          <div className="project__image">
          </div>
          <div className="project__info">
            <div className="project__info__owner">
              <h2 className="project__info__category">Category</h2>
              <h1 className="project__info__company">{project.name}</h1>
            </div>
            <div className="project__info__content">{project.excerpt}</div>
          </div>
        </a>
      </article>
    )
  }
}

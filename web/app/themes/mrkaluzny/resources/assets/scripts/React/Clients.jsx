import React, {Component} from 'react'
import axios from 'axios';
//

import {Helper} from '../Helper.js';
import Project from './partials/Project.jsx';
import Filters from './partials/Filters/Filters.jsx';
import Loader from './partials/Loader.jsx';

export default class Clients extends Component {
  constructor(props) {
    super(props);
    this.state = {
      projects: [],
      isLoading: true,
      industries: null,
      projectTypes: null,
      currentCategory: [],
      currentIndustry: [],
    }

    this.fetchData = this.fetchData.bind(this)
  }

  componentDidMount() {
    this.fetchData()
  }

  fetchData() {
    axios.get(Helper.getAPIRouteForResource('projects'))
    .then(res => {
      this.setState({
        projects: res.data,
        isLoading: false,
      })
    })

    axios.get(Helper.getAPIRouteForResource('filters/industry'))
    .then(res =>{
      this.setState({
        industries: res.data,
      })
    })
    axios.get(Helper.getAPIRouteForResource('filters/project_type'))
    .then(res =>{
      this.setState({
        projectTypes: res.data,
      })
    })
  }

  render() {

    const projects = this.state.projects.map( item => {
      return (
        <Project key={item.id} project={item} />
      )
    });

    return (
      <React.Fragment>
        <div className="container">
          <div className="row">
            <div className="col-12">
              <div className="filters__wrapper">
                <Filters title="Project type" filters={this.state.projectTypes} key="Project Types" />
                <Filters title="Industry" filters={this.state.industries} key="Industry" />
              </div>
            </div>
            <div className="col-12">
              <div className="projects-feed">
                {this.state.isLoading ? <Loader /> : projects}
              </div>
            </div>
          </div>
        </div>
      </React.Fragment>
    )
  }
}

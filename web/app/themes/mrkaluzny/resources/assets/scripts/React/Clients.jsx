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
      industries: [],
      projectTypes: [],
      currentProjectType: [],
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


  handleProjectType(id, isActive) {
    if (isActive) {
      this.setState(prevState => {
        return {
          currentProjectType: [...prevState.currentProjectType, id]
        }
      })
    } else {
      let index = this.state.currentProjectType.indexOf(id)
      this.setState(prevState => {
        return {
          currentProjectType: prevState.currentProjectType.filter((_,i) => i !== index),
        }
      })
    }
  }

  handleIndustry(id, isActive) {
    if (isActive) {
      this.setState(prevState => {
        return {
          currentIndustry: [...prevState.currentIndustry, id]
        }
      })
    } else {
      let index = this.state.currentIndustry.indexOf(id)
      this.setState(prevState => {
        return {
          currentIndustry: prevState.currentIndustry.filter((_,i) => i !== index),
        }
      })
    }
  }

  render() {

    const projects = this.state.projects
    .filter(item => {
      if (this.state.currentProjectType.length >= 1) {
        let result = false
        for (let i = 0; i < item.type.length; i++) {
          if (this.state.currentProjectType.indexOf(item.type[i].term_id) != -1) {
            result = true;
          }
        }
        return result;
      } else {
        return true;
      }
    })
    .filter(item => {
        if (this.state.currentIndustry.length >= 1) {
          let result = false
          for (let i = 0; i < item.industry.length; i++) {
            if (this.state.currentIndustry.indexOf(item.industry[i].term_id) != -1) {
              result = true;
            }
          }
          return result;
        } else {
          return true;
        }
    })
    .map( item => {
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
                <Filters title="Project type" filters={this.state.projectTypes} key="ProjectTypes" filterChange={this.handleProjectType.bind(this)} />
                <Filters title="Industry" filters={this.state.industries} key="Industry" filterChange={this.handleIndustry.bind(this)} />
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

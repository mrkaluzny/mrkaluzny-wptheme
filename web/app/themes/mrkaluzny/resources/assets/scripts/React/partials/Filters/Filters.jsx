import React, { Component } from 'react';

import Filter from './Filter.jsx'

export default class Filters extends Component {
  render() {

    const filters = this.props.filters ?
      this.props.filters.map(filter => {
        return (
          <Filter key={filter.id} data={filter} filterChange={this.props.filterChange} />
        )
      })
      : '' ;

    return (
      <div className="filters">
        <div className="filters__title">{this.props.title}</div>
        <div className="filters__items">
          { filters }
        </div>
      </div>
    )
  }
}
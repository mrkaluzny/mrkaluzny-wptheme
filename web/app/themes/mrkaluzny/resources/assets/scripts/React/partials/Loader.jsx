import React, { Component } from 'react';

class Loader extends Component {
  render() {
    return (
      <div className="Loader">
        <div className="Loader__inner">
          <span className="loader">
            <span className="loader-inner"></span>
          </span>
        </div>
      </div>
    )
  }
}


export default Loader;

export const Helper = {
  getAPIRouteForResource(resource_name, version) {
    let APIver
    (version ? (APIver = version) : (APIver = 'v1'))
    return window.location.origin + '/wp-json/api/' + APIver + '/' + resource_name
  },

  getInnerWidth() {
    let w = window,
    d = document,
    e = d.documentElement,
    g = d.getElementsByTagName('body')[0],
    x = w.innerWidth || e.clientWidth || g.clientWidth;

    return x
  },

  getInnerHeight() {
    let w = window,
    d = document,
    e = d.documentElement,
    g = d.getElementsByTagName('body')[0],
    y = w.innerHeight|| e.clientHeight|| g.clientHeight;

    return y
  },
}

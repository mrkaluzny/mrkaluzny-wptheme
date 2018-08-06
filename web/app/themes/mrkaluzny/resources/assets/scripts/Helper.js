export const Helper = {
  getAPIRouteForResource(resource_name, version) {
    let APIver
    (version ? (APIver = version) : (APIver = 'v1'))
    return window.location.href + '/wp-json/api/' + APIver + '/' + resource_name
  },
}

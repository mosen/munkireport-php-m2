import axios from 'axios';

export const fetchDiskReportSpace = ({ commit, state }) => {
  commit('fetchDiskReportSpaceRequest');

  return axios.get('/xapi/stats/diskreport/free_space').then((response) => {
    commit('fetchDiskReportSpaceSuccess', response);
  }).catch((response) => {
    commit('fetchDiskReportSpaceFailure', response);
  });
};
import axios from 'axios';

export const fetchCertificateStats = ({ commit, state }) => {
  commit('fetchCertificateStatsRequest');

  return axios.get('/xapi/stats/certificate').then((response) => {
    commit('fetchCertificateStatsSuccess', response);
  }).catch((response) => {
    commit('fetchCertificateStatsFailure', response);
  });
};
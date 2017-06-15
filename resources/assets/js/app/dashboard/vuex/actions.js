import axios from 'axios';

export const fetchReportData = ({ commit, state }) => {
  commit('fetchReportDataRequest');

  return axios.get('/api/v1/stats/report_data').then((response) => {
    commit('fetchReportDataSuccess', response);
  }).catch((response) => {
    commit('fetchReportDataFailure', response);
  });
};

export const fetchNewClients = ({ commit, state }) => {
  commit('fetchNewClientsRequest');

  return axios.get('/api/v1/stats/new_clients').then((response) => {
    commit('fetchNewClientsSuccess', response);
  }).catch((response) => {
    commit('fetchNewClientsFailure', response);
  });
};

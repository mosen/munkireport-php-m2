import axios from 'axios';

export const fetch_report_data = ({ commit, state }) => {
  commit('fetchReportDataRequest');

  return axios.get('/api/v1/stats/report_data').then((response) => {
    commit('fetchReportDataSuccess', response);
  }).catch((response) => {
    commit('fetchReportDataFailure', response);
  });
};

export const fetch_new_clients = ({ commit, state }) => {
  commit('fetchNewClientsRequest');

  return axios.get('/api/v1/stats/new_clients').then((response) => {
    commit('fetchNewClientsSuccess', response);
  }).catch((response) => {
    commit('fetchNewClientsFailure', response);
  });
};

export const fetch_uptime = ({ commit, state }) => {
  commit('fetch_uptime_request');

  return axios.get('/api/v1/stats/uptime').then((response) => {
    commit('fetch_uptime_success', response);
  }).catch((response) => {
    commit('fetch_uptime_failure', response);
  })
};

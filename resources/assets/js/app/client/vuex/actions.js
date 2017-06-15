import axios from 'axios';


export const read = ({ commit, state }, serial_number) => {
  commit('read_request');

  return axios.get(`/api/v1/clients/${serial_number}`).then((response) => {
    commit('read_success', response);
  }).catch((response) => {
    commit('read_failure', response);
  });
};
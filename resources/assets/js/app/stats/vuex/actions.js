import axios from 'axios';

export const fetchStats = ({ commit, state }, stats = []) => {
  return axios.get('/api/v1/stats').then((response) => {
    commit('')
  })
};
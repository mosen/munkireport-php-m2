import axios from 'axios';

export const fetchStats = ({ commit, state }) => {
  return axios.post('/api/v1/stats', {
      ...state.stats.subscriptions
  }).then((response) => {
    commit('')
  })
};
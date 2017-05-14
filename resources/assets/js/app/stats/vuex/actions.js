import axios from 'axios';

export const fetchStats = ({ commit, state }, options) => {
    commit('fetchStatsRequest', options);
    
    return axios.get('/api/v1/metrics', { params: { topics: options.topics }}).then((response) => {
        commit('fetchStatsSuccess', response);
    }).catch((response) => {
        commit('fetchStatsFailure', response);
    });
};
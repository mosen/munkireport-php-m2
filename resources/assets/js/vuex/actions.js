
export const fetchLocale = ({ commit }, code) => {
    return axios.get('/api/locale').then((response) => {
        commit('setLocale', code);
    })
};
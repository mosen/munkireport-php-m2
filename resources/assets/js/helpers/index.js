export const setHttpToken = (token) => {
    if (!token) {
        window.axios.defaults.headers.common['Authorization'] = null
    }

    window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + token
};
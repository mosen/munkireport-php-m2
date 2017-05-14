export const topics = (state, getters) => {
    return Object.keys(state.subscriptions);
};
export const STATS_REQUEST = 'STATS_REQUEST';
export const STATS_SUCCESS = 'STATS_SUCCESS';
export const STATS_FAILURE = 'STATS_FAILURE';

export const setStatsRequesting = (state, stats = []) => {
  state.statsLoading = stats;
};

export const setStatsFetchSuccess = (state, response) => {
  state.stats = response;
};

export const setStatsError = (state, response) => {
  state.error = true;
  state.errorPayload = response;
};

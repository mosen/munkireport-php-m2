export const STATS_REQUEST = 'STATS_REQUEST';
export const STATS_SUCCESS = 'STATS_SUCCESS';
export const STATS_FAILURE = 'STATS_FAILURE';

export const fetchStatsRequest = (state, stats = []) => {
  state.statsLoading = stats;
};

export const fetchStatsSuccess = (state, response) => {
  state.stats = response;
};

export const fetchStatsFailure = (state, response) => {
  state.error = true;
  state.errorPayload = response;
};

// Request that a metric be included in the fetch
export const subscribe = (state, { topic }) => {
  if (state.subscriptions.hasOwnProperty(topic)) {
    state.subscriptions[topic]++;
  } else {
    state.subscriptions[topic] = 1;
  }

  console.log(`Subscribed to ${topic}`);
};

// Release a request for a metric
export const unsubscribe = (state, { topic }) => {
  if (state.subscriptions[topic] === 1) {
    delete state.subscriptions[topic];
  } else {
    state.subscriptions[topic]--;
  }
};
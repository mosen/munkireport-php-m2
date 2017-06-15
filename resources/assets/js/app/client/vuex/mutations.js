export const read_request = (state) => {
  state.loading = true;
};

export const read_failure = (state, response) => {
  state.loading = false;
  state.error = true;
  state.errorDetail = response.data;
};

export const read_success = (state, response) => {
  const { data } = response;

  state.data = data;
};
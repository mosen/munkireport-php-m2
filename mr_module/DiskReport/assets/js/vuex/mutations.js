export const fetchDiskReportSpaceRequest = (state) => {
  state.loading = true;
};

export const fetchDiskReportSpaceSuccess = (state, response) => {
  state.loading = false;
  state.danger = response.data.danger;
  state.dangerThreshold = response.data.dangerThreshold;
  state.warningThreshold = response.data.warningThreshold;
};

export const fetchDiskReportSpaceFailure = (state, response) => {
  state.error = true;
  state.errorPayload = response;
};


export const removeWidget = (state, { rowIndex, columnIndex }) => {
    const page = 0;
    console.log(`remove row ${rowIndex}, column ${columnIndex}`);
    state.pages[page].widgets[rowIndex] = state.pages[page].widgets[rowIndex].splice(columnIndex, 1)
};

export const fetchReportDataRequest = (state) => {
    state.report_data.loading = true;
};

export const fetchReportDataSuccess = (state, response) => {
    const { data } = response;

    state.report_data.inactive_month = data.inactive_month;
    state.report_data.inactive_three_months = data.inactive_three_months;
    state.report_data.inactive_week = data.inactive_week;
    state.report_data.seen_last_day = data.seen_last_day;
    state.report_data.seen_last_hour = data.seen_last_hour;
    state.report_data.seen_last_month = data.seen_last_month;
    state.report_data.seen_last_week = data.seen_last_week;
    state.report_data.total = data.total;
};

export const fetchNewClientsRequest = (state) => {
  state.new_clients.loading = true;
};

export const fetchNewClientsSuccess = (state, response) => {
    const { data } = response;

    state.new_clients.loading = false;
    state.new_clients.items = data;
};
export const widgets = (state, getters) => (page) => state.pages[page].widgets;
export const page = state => state.page;

export const reportDataTotal = state => (
  state.report_data.inactive_month +
  state.report_data.inactive_week +
  state.report_data.inactive_three_months);

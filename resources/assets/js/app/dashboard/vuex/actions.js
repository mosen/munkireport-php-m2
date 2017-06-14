import axios from 'axios';

export const fetchReportData = ({ commit, state }) => {
  commit('fetchReportDataRequest');

  return axios.get('/api/v1/stats/report_data').then((response) => {
    commit('fetchReportDataSuccess', response);
  }).catch((response) => {
    commit('fetchReportDataFailure', response);
  });
};

// export default {
//   data () {
//     return {
//       stats: {
//         inactive_month: 0,
//         inactive_three_months: 0,
//         inactive_week: 0,
//         seen_last_day: 0,
//         seen_last_hour: 0,
//         seen_last_month: 0,
//         seen_last_week: 0
//       }
//     }
//   },
//   computed: {
//     total: function () {
//       return this.stats.inactive_month +
//         this.stats.inactive_three_months +
//         this.stats.inactive_week +
//         this.stats.seen_last_day +
//         this.stats.seen_last_hour +
//         this.stats.seen_last_month +
//         this.stats.seen_last_week;
//     }
//   },
//   created () {
//     this.axios.get(`${API_ROOT}/stats/report_data`).then((response) => {
//       this.stats = response.data;
//     }).catch((response) => {
//       this.error = true;
//       this.errorDetails.status = response.status;
//       this.errorDetails.message = response.message;
//     });
//
//   }
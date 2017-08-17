import {widgets} from './widgets';

export default {
  page: 0,
  pages: [{
    title: 'main',
    widgets: widgets
  }],
  report_data: {
    loading: false,
    
    inactive_week: 0,
    inactive_month: 0,
    inactive_three_months: 0,
    seen_last_hour: 0,
    seen_last_day: 0,
    seen_last_week: 0,
    seen_last_month: 0
  },
  new_clients: {
    loading: false,
    items: [],
  },
  uptime: {
    loading: false,
    oneweekplus: 0,
    oneweek: 0,
    oneday: 0
  }
}

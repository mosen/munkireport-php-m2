import moment from 'moment';

export const lastSeen = (state, getters) => {
  return moment(state.data.last_updated).fromNow();
};

export const uptime = (state) => {
  return moment.duration(state.data.uptime, 'seconds').humanize();
};
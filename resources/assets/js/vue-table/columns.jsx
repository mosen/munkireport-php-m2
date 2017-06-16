// Reusable vue-table-2 column templates
import moment from 'moment';

export const computer_name = (h, row) => (
  <router-link to={`/clients/${row.serial_number}`}>{row.machine.computer_name}</router-link>);

export const machine_name = (h, row) => (
  <span>{row.machine.machine_name}</span>
);

export const os_version = (h, row) => {
  const os_version = row.machine.os_version;

  if (os_version && os_version.indexOf(".") === -1) {
    const components = [];

    for (let c = 0; c < os_version.length; c = c + 2) {
      components.push(os_version.substr(c, 2));
    }

    return <span>{components.join('.')}</span>;
  } else {
    return <span>{os_version}</span>;
  }
};

export const from_now = (field) => (h, row) => {
  return <span>{moment(row[field]).fromNow()}</span>
};

export const unix_duration = (field) => (h, row) => {
  return <span>{moment.duration(row[field], 'h').humanize()}</span>
};
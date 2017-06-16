// Reusable vue-table-2 column templates

export const computer_name = (h, row) => (
  <router-link to={`/clients/${row.serial_number}`}>{row.machine.computer_name}</router-link>);

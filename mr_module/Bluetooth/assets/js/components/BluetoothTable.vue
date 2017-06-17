<template>
    <v-server-table
            name="bluetooth_table"
            url="/xapi/bluetooth"
            :columns="columns"
            :options="options"
            @loaded="onLoaded"
    ></v-server-table>
</template>

<script>
  import {computer_name} from 'Core/vue-table/columns.jsx';

  export default {
    data() {
      return {
        columns: [
          'computer_name',
          'serial_number',
          'username',
          'status',
          'keyboard',
          'mouse',
          'trackpad'
        ],
        options: {
          pagination: {
            dropdown: true
          },
          templates: {
            computer_name,
            username: function (h, row) {
              if (row.reportdata && row.reportdata.long_username) {
                return h('span', {}, row.reportdata.long_username);
              }
              else {
                return h('span', {}, 'N/A');
              }
            }
          }
          // TODO: texts and i18n
        }
      }
    },
    methods: {
      onLoaded: function () {

      }
    }
  }
</script>
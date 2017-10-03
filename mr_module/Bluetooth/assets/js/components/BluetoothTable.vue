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
  import locales from './BluetoothTable.i18n.json';

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
          texts: {
            loading: this.$t('listing.loading')
          },
          headings: {
            'computer_name': this.$t('listing.computername'),
            'serial_number': this.$t('serial'),
            'username': this.$t('username'),
            'status': this.$t('bluetooth.status'),
            'keyboard': this.$t('bluetooth.keyboard'),
            'mouse': this.$t('bluetooth.mouse'),
            'trackpad': this.$t('bluetooth.trackpad')
          },
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
    locales: locales,
    methods: {
      onLoaded: function () {

      }
    }
  }
</script>
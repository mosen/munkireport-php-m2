<template>
    <v-server-table
            name="wifi_table"
            url="/xapi/wifi"
            :columns="columns"
            :options="options"
    ></v-server-table>
</template>

<script>
  import locales from './WifiTable.i18n.json';
  //    import texts from 'vue-table-i18n.json';
  import {computer_name} from 'Core/vue-table/columns.jsx';

  export default {
    data() {
      return {
        columns: [
          'computer_name',
          'reportdata.serial_number',
          'ssid',
          'bssid',
          'state',
          'lasttxrate',
          'maxrate',
          'channel',
          'agrctlrssi',
          'agrctlnoise',
          'x802_11_auth',
          'link_auth',
          'op_mode',
          'mcs'
        ],
        options: {
          headings: {
            'computer_name': this.$t('listing.computername'),
            'serial_number': this.$t('serial'),
            'ssid': 'SSID',
            'bssid': 'BSSID',
            'state': this.$t('listing.wifi.state'),
            'lasttxrate': this.$t('listing.wifi.lasttx'),
            'maxrate': this.$t('listing.wifi.maxtx'),
            'channel': this.$t('listing.wifi.channel'),
            'agrctlrssi': 'RSSI',
            'agrctlnoise': this.$t('listing.wifi.noise'),
            'x802_11_auth': this.$t('listing.wifi.authtype'),
            'link_auth': this.$t('listing.wifi.linkauthtype'),
            'op_mode': this.$t('listing.wifi.apmode'),
            'mcs': 'MCS',
          },
          pagination: {
            dropdown: true
          },
          templates: {
            computer_name
          }
        }
      }
    },
    locales: locales
  }
</script>
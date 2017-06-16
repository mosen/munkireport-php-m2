<template>
    <v-server-table
            name="munkireport_table"
            url="/xapi/munkireport"
            :columns="columns"
            :options="options"
            @loaded="onLoaded"
    ></v-server-table>
</template>

<script>
  import locales from './MunkiTable.i18n.json';
  import {computer_name} from 'Core/vue-table/columns.jsx';
  
  export default {
    data() {
      return {
        columns: [
          'machine.computer_name',
          'serial_number',
          'long_username',
          'remote_ip',
          'os_version',
          'version',
          'munkiinfo_value',
          'updated_at',
          'runtype',
          'errors',
          'warnings',
          'manifestname'
        ],
        options: {
          texts: {
            loading: this.$t('listing.loading')
          },
          headings: {
            'machine.computer_name': this.$t('listing.computername'),
            'serial_number': this.$t('serial'),
            'long_username': this.$t('listing.username'),
            'remote_ip': this.$t('network.ip_address'),
            'os_version': this.$t('os.version'),
            'version': this.$t('munki.version'),
            'munkiinfo_value': this.$t('munki.munkiprotocol'),
            'updated_at': this.$t('last_seen'),
            'runtype': this.$t('munki.run_type'),
            'errors': this.$t('error_plural'),
            'warnings': this.$t('warning_plural'),
            'manifestname': this.$t('manifest.name')
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
    locales: locales,
    methods: {
      onLoaded: function () {

      }
    }
  }
</script>
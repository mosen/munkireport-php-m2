<template>
    <v-server-table
            name="clients_table"
            url="/api/v1/clients"
            :columns="columns"
            :options="options"
    ></v-server-table>
</template>

<script>
  import locales from './ClientsTable.i18n.json';
  import {computer_name, machine_name, os_version, from_now, unix_duration} from 'Core/vue-table/columns.jsx';

  export default {
    data() {
      return {
        columns: [
          'computer_name',
          'serial_number',
          'long_username',
          'machine.os_version',
          'machine.buildversion',
          'machine.machine_name',
          'warranty.status',
          'uptime',
          'updated_at',
          'munkireport.manifestname'
        ],
        options: {
          headings: {
            'computer_name': this.$t('listing.computername'),
            'serial_number': this.$t('serial'),
            'username': this.$t('username'),
            'machine.os_version': this.$t('os.version'),
            'machine.buildversion': this.$t('buildversion'),
            'machine.machine_name': this.$t('type'),
            'warranty_status': this.$t('warranty.status'),
            'uptime': this.$t('uptime'),
            'updated_at': this.$t('listing.checkin'),
            'munkireport.manifestname': this.$t('munkireport.manifest.manifest')
          },
          texts: {
            loading: this.$t('listing.loading')
          },
          templates: {
            computer_name,
            'machine.machine_name': machine_name,
            'machine.os_version': os_version,
            'machine.buildversion': (h, row) => (<span>{row.machine ? row.machine.buildversion : ''}</span>),
            'updated_at': from_now('updated_at'),
            'uptime': unix_duration('uptime'),
            'warranty.status': (h, row) => (<span>{row.warranty && row.warranty.status}</span>),
            'munkireport.manifestname': (h, row) => (<span>{row.munkireport ? row.munkireport.manifestname : ''}</span>)
          }
        }
      }
    },
    locales: locales
  }
</script>
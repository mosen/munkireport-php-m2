<template>
    <v-server-table
            name="clients_table"
            url="/api/v1/clients"
            :columns="columns"
            :options="options"
            @loaded="onLoaded"
    ></v-server-table>
</template>

<script>
    export default {
        data() {
          return {
            columns: [
              'machine.computer_name',
              'serial_number',
              'long_username',
              'machine.os_version',
              'machine.buildversion',
              'machine.machine_name',
              'warranty_status',
              'uptime',
              'updated_at',
              'munkireport_manifestname'
            ],
            options: {
              headings: {
                'machine.computer_name': this.$t('listing.computername'),
                'serial_number': this.$t('serial'),
                'username': this.$t('listing.username'),
                'machine.os_version': 'OS',
                'machine.buildversion': this.$t('buildversion'),
                'machine.machine_name': this.$t('machine.machine_name'),
                'warranty_status': this.$t('warranty.status'),
                'uptime': this.$t('reportdata.uptime'),
                'updated_at': this.$t('reportdata.timestamp'),
                'munkireport.manifestname': this.$t('munkireport.manifestname')
              },
              texts: {
                loading: this.$t('listing.loading')
              }
            }
          }
        }
    }
</script>
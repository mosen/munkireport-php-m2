<template>
    <v-server-table
            url="/api/clients"
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
              'computer_name',
              'serial_number',
              'username',
              'os_version',
              'buildversion',
              'machine_name',
              'warranty_status',
              'reportdata_uptime',
              'reportdata_updated_at',
              'munkireport_manifestname'
            ],
            options: {
              headings: {
                'computer_name': this.$t('listing.computername'),
                'serial_number': this.$t('serial'),
                'username': this.$t('listing.username'),
                'os_version': 'OS',
                'buildversion': this.$t('buildversion'),
                'machine_name': this.$t('machine.machine_name'),
                'warranty_status': this.$t('warranty.status'),
                'reportdata_uptime': this.$t('reportdata.uptime'),
                'reportdata_updated_at': this.$t('reportdata.timestamp'),
                'munkireport_manifestname': this.$t('munkireport.manifestname')
              },
              texts: {
                loading: this.$t('listing.loading')
              }
            }
          }
        }
    }
</script>
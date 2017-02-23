<template>
    <v-server-table
            url="/xapi/diskreport"
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
          'mountpoint',
          'volume_type',
          'percentage',
          'free',
          'total_size',
          'smartstatus'
        ],
        options: {
          texts: {
            loading: this.$t('listing.loading')
          },
          headings: {
            'computer_name': this.$t('listing.computername'),
            'serial_number': this.$t('serial'),
            'username': this.$t('listing.username'),
            'mountpoint': this.$t('storage.mountpoint'),
            'volume_type': this.$t('storage.volume_type'),
            'percentage': this.$t('storage.percentage'),
            'free': this.$t('storage.free'),
            'total_size': this.$t('storage.total_size'),
            'smartstatus': this.$t('storage.smartstatus')
          },
          pagination: {
            dropdown: true
          }
        }
      }
    },
    methods: {
      onLoaded: function () {

      }
    }
  }
</script>
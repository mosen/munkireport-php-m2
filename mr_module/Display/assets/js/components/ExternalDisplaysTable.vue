<template>
    <v-server-table
            url="/xapi/display"
            :columns="columns"
            :options="options"
            @loaded="onLoaded"
    ></v-server-table>
</template>

<script>
    import DisplayName from './DisplayName.vue';

  export default {
    data() {
      return {
        columns: [
          'computer_name',
          'serial_number',
          'type',
          'vendor',
          'model',
          'display_serial',
          'manufactured',
          'native',
          'updated_at'
        ],
        options: {
          texts: {
            loading: this.$t('listing.loading')
          },
          headings: {
            'computer_name': this.$t('listing.computername'),
            'serial_number': this.$t('serial'),
            'type': this.$t('displays.type'),
            'vendor': this.$t('displays.vendor'),
            'model': this.$t('displays.model'),
            'display_serial': this.$t('displays.display_serial'),
            'manufactured': this.$t('displays.manufactured'),
            'native': this.$t('displays.native'),
            'updated_at': this.$t('displays.timestamp')
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
    },
    components: {
      'display-name': DisplayName
    }
  }
</script>
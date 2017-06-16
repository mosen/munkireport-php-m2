<template>
    <v-server-table
            name="printer_table"
            url="/xapi/printer"
            :columns="columns"
            :options="options"
            @loaded="onLoaded"
    ></v-server-table>
</template>

<script>
    import locales from './PrinterTable.i18n.json';
    import {computer_name} from 'Core/vue-table/columns.jsx';
    
    export default {
        data() {
            return {
                columns: [
                    'computer_name',
                    'serial_number',
                    'name',
                    'ppd',
                    'driver_version',
                    'url',
                    'default_set',
                    'printer_status',
                    'printer_sharing'
                ],
                options: {
                    texts: {
                        loading: this.$t('listing.loading')
                    },
                    headings: {
                        'computer_name': this.$t('listing.computername'),
                        'serial_number': this.$t('serial'),
                        'name': this.$t('printer.name'),
                        'ppd': this.$t('printer.ppd'),
                        'driver_version': this.$t('printer.driver_version'),
                        'url': this.$t('printer.url'),
                        'default_set': this.$t('printer.default_set'),
                        'printer_status': this.$t('printer.printer_status'),
                        'printer_sharing': this.$t('printer.printer_sharing')
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
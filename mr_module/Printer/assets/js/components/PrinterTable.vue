<template>
    <v-server-table
            url="/xapi/printer"
            :columns="columns"
            :options="options"
            @loaded="onLoaded"
    ></v-server-table>
</template>

<script>
    import locales from './PrinterTable.i18n.json';

    export default {
        data() {
            return {
                columns: [
                    'machine.computer_name',
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
                        'machine.computer_name': this.$t('listing.computername'),
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
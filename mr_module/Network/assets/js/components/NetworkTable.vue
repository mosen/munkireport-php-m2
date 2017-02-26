<template>
    <v-server-table
            url="/xapi/network"
            :columns="columns"
            :options="options"
            @loaded="onLoaded"
    ></v-server-table>
</template>

<script>
    import locales from './NetworkTable.i18n.json';

    export default {
        data() {
            return {
                columns: [
                    'machine.computer_name',
                    'serial_number',
                    'long_username',
                    'service',
                    'status',
                    'ethernet',
                    'ipv4ip',
                    'ipv4router',
                    'ipv4mask'
                ],
                options: {
                    texts: {
                        loading: this.$t('listing.loading')
                    },
                    headings: {
                        'machine.computer_name': this.$t('listing.computername'),
                        'serial_number': this.$t('serial'),
                        'long_username': this.$t('listing.username'),
                        'service': this.$t('listing.network.service'),
                        'status': this.$t('listing.network.status'),
                        'ethernet': this.$t('listing.network.ethernet'),
                        'ipv4ip': this.$t('listing.network.ipv4ip'),
                        'ipv4router': this.$t('listing.network.ipv4router'),
                        'ipv4mask': this.$t('listing.network.ipv4mask')
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
<template>
    <v-server-table
            url="/xapi/timemachine"
            :columns="columns"
            :options="options"
            @loaded="onLoaded"
    ></v-server-table>
</template>

<script>
    import locales from './TimeMachineTable.i18n.json';

    export default {
        data() {
            return {
                columns: [
                    'machine.computer_name',
                    'reportdata.serial_number',
                    'reportdata.long_username',
                    'last_success',
                    'duration',
                    'last_failure',
                    'last_failure_msg',
                    'reportdata.updated_at'
                ],
                options: {
                    texts: {
                        loading: this.$t('listing.loading')
                    },
                    headings: {
                        'machine.computer_name': this.$t('listing.computername'),
                        'serial_number': this.$t('serial'),
                        'long_username': this.$t('listing.username'),
                        'last_success': this.$t('backup.last_success'),
                        'duration': this.$t('backup.duration'),
                        'last_failure': this.$t('backup.last_failure'),
                        'last_failure_msg': this.$t('backup.last_failure_msg'),
                        'reportdata.updated_at': this.$t('listing.checkin')
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
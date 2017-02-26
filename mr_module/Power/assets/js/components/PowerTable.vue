<template>
    <v-server-table
            url="/xapi/power"
            :columns="columns"
            :options="options"
            @loaded="onLoaded"
    ></v-server-table>
</template>

<script>
    import locales from './PowerTable.i18n.json';

    export default {
        data() {
            return {
                columns: [
                    'machine.computer_name',
                    'serial_number',
                    'long_username',
                    'design_capacity',
                    'max_capacity',
                    'cycle_count',
                    'max_percent',
                    'condition',
                    'current_capacity',
                    'current_percent',
                    'temperature',
                    'manufacture_date',
                    'updated_at'
                ],
                options: {
                    texts: {
                        loading: this.$t('listing.loading')
                    },
                    headings: {
                        'machine.computer_name': this.$t('listing.computername'),
                        'serial_number': this.$t('serial'),
                        'long_username': this.$t('listing.username'),
                        'design_capacity': this.$t('listing.power.design_capacity'),
                        'max_capacity': this.$t('listing.power.max_capacity'),
                        'cycle_count': this.$t('listing.power.cycle_count'),
                        'max_percent': this.$t('listing.power.max_percent'),
                        'condition': this.$t('listing.power.condition'),
                        'current_capacity': this.$t('listing.power.current_capacity'),
                        'current_percent': this.$t('listing.power.current_percent'),
                        'temperature': this.$t('listing.power.temperature'),
                        'manufacture_date': this.$t('listing.power.manufacture_date'),
                        'updated_at': this.$t('listing.power.checkin'),
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
<template>
    <v-server-table
            name="warranty_table"
            url="/xapi/warranty"
            :columns="columns"
            :options="options"
            @loaded="onLoaded"
    ></v-server-table>
</template>

<script>
    import locales from './WarrantyTable.i18n.json';

    export default {
        data() {
            return {
                columns: [
                    'machine.computer_name',
                    'reportdata.serial_number',
                    'reportdata.long_username',
                    'status',
                    'purchase_date',
                    'end_date'
                ],
                options: {
                    texts: {
                        loading: this.$t('listing.loading')
                    },
                    headings: {
                        'machine.computer_name': this.$t('listing.computername'),
                        'serial_number': this.$t('serial'),
                        'long_username': this.$t('listing.username'),
                        'status': this.$t('listing.warranty.status'),
                        'purchase_date': this.$t('listing.warranty.purchase_date'),
                        'end_date': this.$t('listing.warranty.end_date'),
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
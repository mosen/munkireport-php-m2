<template>
    <v-server-table
            name="ard_table"
            url="/xapi/ard"
            :columns="columns"
            :options="options"
            @loaded="onLoaded"
    ></v-server-table>
</template>

<script>
    import locales from './ARDTable.i18n.json';

    export default {
        data() {
            return {
                columns: [
                    'computer_name',
                    'serial_number',
                    'username',
                    'Text1',
                    'Text2',
                    'Text3',
                    'Text4'
                ],
                options: {
                    texts: {
                        loading: this.$t('listing.loading')
                    },
                    headings: {
                        'computer_name': this.$t('listing.computername'),
                        'serial_number': this.$t('serial'),
                        'username': this.$t('listing.username'),
                        'Text1': this.$t('text 1'),
                        'Text2': this.$t('text 2'),
                        'Text3': this.$t('text 3'),
                        'Text4': this.$t('text 4')
                    },
                    pagination: {
                        dropdown: true
                    },
                    templates: {
                        computer_name: function (h, row) {
                            return h('span', {}, row.machine.computer_name);
                        },
                        username: function (h, row) {
                            return h('span', {}, row.reportdata.long_username);
                        }
                    }
                    // TODO: texts and i18n
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
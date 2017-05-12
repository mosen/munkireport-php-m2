<template>
    <v-server-table
            name="directory_services_table"
            url="/xapi/directoryservice"
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
                    'which_directory_service',
                    'addomain',
                    'computeraccount',
                    'createmobileaccount',
                    'networkprotocoltobeused',
                    'allowedadmingroups'
                ],
                options: {
                    headings: {
                        'computer_name': 'Name',
                        'which_directory_service': 'Bound Status',
                        'addomain': 'AD Domain',
                        'computeraccount': 'Computer Account',
                        'createmobileaccount': 'Mobile Account',
                        'networkprotocoltobeused': 'Network Protocol',
                        'allowedadmingroups': 'Allowed Admin Groups'
                    },
                    pagination: {
                        dropdown: true
                    },
                    templates: {
                        computer_name: function (h, row) {
                            if (row.machine && row.machine.computer_name) {
                                return h('span', {}, row.machine.computer_name);
                            }
                            else {
                                return h('span', {}, 'N/A');
                            }
                        },
                        username: function (h, row) {
                            if (row.reportdata && row.reportdata.long_username) {
                                return h('span', {}, row.reportdata.long_username);
                            }
                            else {
                                return h('span', {}, 'N/A');
                            }
                        }
                    }
                    // TODO: texts and i18n
                }
            }
        },
        methods: {
            onLoaded: function () {

            }
        }
    }
</script>
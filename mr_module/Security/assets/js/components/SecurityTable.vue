<template>
    <v-server-table
            url="/xapi/security"
            :columns="columns"
            :options="options"
            @loaded="onLoaded"
    ></v-server-table>
</template>

<script>
    import locales from './SecurityTable.i18n.json';

    export default {
        data() {
            return {
                columns: [
                    'machine.computer_name',
                    'serial_number',
                    'long_username',
                    'localadmin.users',
                    'filevault_status.filevault_users',
                    'machine.machine_name',
                    'diskreport.CoreStorageEncrypted',
                    'gatekeeper',
                    'sip'
                ],
                options: {
                    texts: {
                        loading: this.$t('listing.loading')
                    },
                    headings: {
                        'machine.computer_name': this.$t('listing.computername'),
                        'serial_number': this.$t('serial'),
                        'long_username': this.$t('listing.username'),
                        'localadmin.users': this.$t('user.local_admins'),
                        'filevault_status.filevault_users': this.$t('filevault.users'),
                        'machine.machine_name': this.$t('type'),
                        'diskreport.CoreStorageEncrypted': this.$t('storage.encryption_status'),
                        'gatekeeper': this.$t('security.gatekeeper'),
                        'sip': this.$t('security.sip'),
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
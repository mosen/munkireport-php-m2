<template>
    <v-server-table
            url="/xapi/profile"
            :columns="columns"
            :options="options"
            @loaded="onLoaded"
    ></v-server-table>
</template>

<script>
    import locales from './ProfileTable.i18n.json';

    export default {
        data() {
            return {
                columns: [
                    'machine.computer_name',
                ],
                options: {
                    texts: {
                        loading: this.$t('listing.loading')
                    },
                    headings: {
                        'machine.computer_name': this.$t('listing.computername'),
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
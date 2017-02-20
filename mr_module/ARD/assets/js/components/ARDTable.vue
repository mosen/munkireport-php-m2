<template>
    <v-server-table
            url="/xapi/ards"
            :columns="columns"
            :options="options"></v-server-table>
</template>

<script>
    import {ServerTable} from 'vue-tables-2';

    export default {
        data() {
            return {
                columns: [
                    'name',
                    'serial_number',
                    'username',
                    'Text1',
                    'Text2',
                    'Text3',
                    'Text4'
                ],
                options: []
            }
        },
        components: {
            'v-server-table': ServerTable
        }
    }
</script>
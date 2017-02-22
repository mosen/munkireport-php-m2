<template>
    <v-server-table
            url="/xapi/bluetooth"
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
                    'status',
                    'keyboard',
                    'mouse',
                    'trackpad'
                ],
                options: {
                    pagination: {
                      dropdown: true
                    },
                  templates: {
                      computer_name: function(h, row) {
                        return h('span', {}, row.machine.computer_name);
                      },
                      username: function(h, row) {
                        return h('span', {}, row.reportdata.long_username);
                      }
                  }
                    // TODO: texts and i18n
                }
            }
        },
        methods: {
          onLoaded: function() {
            
          }
        }
    }
</script>
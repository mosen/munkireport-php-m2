<template>
    <v-server-table
            name="bluetooth"
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
          onLoaded: function() {
            
          }
        }
    }
</script>
<template>
    <div class="panel panel-default">
        <div class="panel-heading" data-container="body" :title="$t('widget.new_clients.tooltip')">
            <div class="panel-title"><i class="fa fa-star-o"></i> <span>{{ $t('widget.new_clients.title') }}</span> <span class="counter badge pull-right"></span></div>
        </div>

        <div class="list-group scroll-box">
            <template v-if="clients.length > 0">
                <a v-for="client in clients" class="list-group-item" :href="url(client)">
                    {{ client.computer_name }}
                    <span class="pull-right">{{ age(client) }}</span>
                </a>
            </template>
            <span v-else class="list-group-item"><span>{{ $t('widget.new_clients.no_new_clients') }}</span></span>
        </div>

    </div><!-- /panel -->
</template>

<script>
    import moment from 'moment';
    
    export default {
        data () {
          return {
            clients: []
          }
        },

        created () {
          this.axios.get(`/xapi/machine?filter[created_at]=recent`).then((response) => {
            this.clients = response.data;
          })
        },

        methods: {
          url (client) {
            return `/client/detail/${client.serial_number}`;
          },
          age (client) {
            return moment(client.created_at).fromNow();
          }
        }
    }
</script>

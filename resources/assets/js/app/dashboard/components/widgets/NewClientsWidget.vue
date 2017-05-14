<template>
    <panel>

        <span slot="title">
            <span class="glyphicon glyphicon-star-empty"></span>
            {{ $t('widget.new_clients.title') }}
        </span>
        <!--<span slot="title" class="counter badge pull-right">{{ clients.length }}</span>-->


        <div class="widget-padded scroll-box">
            <template v-if="clients.length > 0">
                <a v-for="client in clients" class="list-group-item" :href="url(client)">
                    {{ client.computer_name }}
                    <span class="pull-right">{{ age(client) }}</span>
                </a>
            </template>
            <span v-else class="widget-list-item"><span>{{ $t('widget.new_clients.no_new_clients') }}</span></span>
        </div>
    </panel>
</template>

<script>
    import { mapMutations } from 'vuex';
    import moment from 'moment';
    const API_ROOT = '/api';
    import panel from '../WidgetPanel.vue';

    export default {
        data () {
            return {
                clients: [],
                limit: 10
            }
        },
        mounted () {
            this.subscribe({ topic: 'core.machines.recent' });
        },
        beforeDestroy () {
            this.unsubscribe({ topic: 'core.machines.recent' });
        },
        methods: {
            ...mapMutations('stats', ['subscribe, unsubscribe']),
            url (client) {
                return `/client/detail/${client.serial_number}`;
            },
            age (client) {
                return moment(client.created_at).fromNow();
            }
        },
        components: {
            panel
        }
    }
</script>

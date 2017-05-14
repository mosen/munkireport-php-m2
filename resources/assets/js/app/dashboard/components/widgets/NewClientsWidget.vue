<template>
    <list-widget>
        <span slot="title">
            <span class="glyphicon glyphicon-star-empty"></span>
            {{ $t('widget.new_clients.title') }}
        </span>
        <!--<span slot="title" class="counter badge pull-right">{{ clients.length }}</span>-->

        <template v-if="clients.length > 0">
            <a v-for="client in clients" class="list-group-item" :href="url(client)">
                {{ client.computer_name }}
                <span class="pull-right">{{ age(client) }}</span>
            </a>
        </template>
        <div v-else class="widget-list-item"><span>{{ $t('widget.new_clients.no_new_clients')
            }}</span></div>
    </list-widget>
</template>

<script>
    import {mapMutations} from 'vuex';
    import moment from 'moment';
    import ListWidget from '../ListWidget.vue';

    export default {
        data () {
            return {
                clients: [],
                limit: 10
            }
        },
        mounted () {
            this.subscribe({topic: 'core.machines.recent'});
        },
        beforeDestroy () {
            this.unsubscribe({topic: 'core.machines.recent'});
        },
        methods: {
            ...mapMutations('stats', ['subscribe, unsubscribe']),
            url (client) {
                return `/clients/${client.serial_number}`;
            },
            age (client) {
                return moment(client.created_at).fromNow();
            }
        },
        components: {
            'list-widget': ListWidget
        }
    }
</script>

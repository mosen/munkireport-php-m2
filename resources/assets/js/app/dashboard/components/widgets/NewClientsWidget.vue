<template>
    <list-widget>
        <span slot="title">
            <span class="glyphicon glyphicon-star-empty"></span>
            {{ $t('widget.new_clients.title') }}
        </span>

        <template v-if="clients.length > 0">
            <router-link v-for="client in clients" class="list-group-item" :to="url(client)">
                {{ client.computer_name }}
                <span class="pull-right">{{ age(client) }}</span>
            </router-link>
        </template>
        <div v-else class="widget-list-item"><span>{{ $t('widget.new_clients.no_new_clients')
            }}</span></div>

        <!--<span slot="title" class="counter badge pull-right">{{ clients.length }}</span>-->
    </list-widget>
</template>

<script>
  import {mapMutations, mapActions, mapGetters} from 'vuex';
  import moment from 'moment';
  import ListWidget from '../ListWidget.vue';

  export default {
    data () {
      return {
        limit: 10
      }
    },
    mounted () {
      this.fetchNewClients();
    },
    computed: {
      ...mapGetters('dashboard', [
        'clients'
      ])
    },
    methods: {
      ...mapActions('dashboard', [
        'fetchNewClients'
      ]),
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

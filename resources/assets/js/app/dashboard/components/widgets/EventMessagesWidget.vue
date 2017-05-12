<template>
    <panel>
        <i slot="title" class="glyphicon glyphicon-volume-up"></i>
        <span slot="title">{{ $t('event_plural') }}</span>

        <div class="widget-padded" style="max-height: 308px">
            <div v-if="items.length == 0" class="widget-list-item">No messages</div>
            <template v-else>
                <message v-for="item in items"
                         :key="item.updated_at"
                         v-bind:serial="item.serial_number"
                         v-bind:type="item.type"
                         v-bind:module="item.module"
                         v-bind:msg="item.msg"
                         v-bind:data="item.data"
                         v-bind:updated="item.updated_at"
                         v-bind:urlPrefix="urlPrefix"
                ></message>
            </template>
            <span v-if="error" class="list-group-item list-group-item-danger">Request Failed</span>
        </div>
    </panel>
</template>

<script>
  const API_ROOT = '/api';
    import moment from 'moment';
    import Message from '../events/Message.vue';
    import panel from '../WidgetPanel.vue';

    export default {
        props: ['urlPrefix'],
        data() {
            return {
                items: [],
                limit: 10,
                error: false
            }
        },
        created () {
            this.axios.get(`${API_ROOT}/events?limit=${this.limit}`).then((response) => {
                this.items = response.data;
            });
        },
        methods: {
            url: function (serialNumber) {
                return `${this.urlPrefix}${serialNumber}`;
            },
            fromNow: function (relativeDate) {
                return moment(relativeDate).fromNow();
            }
        },
        components: {
            'message': Message,
          panel
        }
    }
</script>
<template>
    <div class="panel panel-default" id="events-widget">
        <div class="panel-heading" data-container="body" :title="$t('events.widget_title')">
            <h3 class="panel-title"><i class="fa fa-bullhorn"></i> <span>{{ $t('event_plural') }}</span></h3>
        </div>
        <div class="list-group scroll-box" style="max-height: 308px">
            <span v-if="items.length == 0" class="list-group-item">No messages</span>
            <template v-else>
                <message v-for="item in items"
                         v-bind:serial="item.serial_number"
                         v-bind:type="item.type"
                         v-bind:module="item.module"
                         v-bind:msg="item.msg"
                         v-bind:data="item.data"
                         v-bind:updated="item.updated_at"
                ></message>
            </template>
            <span v-if="error" class="list-group-item list-group-item-danger">Request Failed</span>
        </div>
    </div>
</template>

<script>
    import {API_ROOT} from '../../constants';
    import moment from 'moment';
    import Message from '../events/Message.vue';

    export default {
        data() {
            return {
                items: [],
                limit: 50,
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
                return `/clients/detail/${serialNumber}`;
            },
            fromNow: function (relativeDate) {
                return moment(relativeDate).fromNow();
            }
        },
        components: {
            'message': Message
        }
    }
</script>
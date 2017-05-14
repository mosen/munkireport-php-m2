<template>
    <panel>

        <span slot="title">
            <i class="glyphicon glyphicon-volume-up"></i>
            {{ $t('event_plural') }}
        </span>

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
    import { mapMutations } from 'vuex';
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
        mounted () {
            this.subscribe({ topic: 'core.events' });
        },
        beforeDestroy () {
            this.unsubscribe({ topic: 'core.events' });
        },
        methods: {
            ...mapMutations('stats', ['subscribe', 'unsubscribe']),
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
<template>
    <list-widget>
        <span slot="title">
            <span class="glyphicon glyphicon-warning-sign"></span>
            {{ $t('widget.duplicate_computernames.title') }}
        </span>

        <template v-if="items.length > 0" v-for="item in items">
            <div v-if="!item.computer_name" class="widget-list-item">
                {{ $t('empty') }}
                <span class="badge pull-right">{{ item.count }}</span>
            </div>
            <div v-else href="/show/listing/clients/computer_name" class="widget-list-item">
                {{ item.computer_name }}
                <span class="badge pull-right">{{ item.count }}</span>
            </div>
        </template>
        <div v-else class="widget-list-item">{{ $t('widget.duplicate_computernames.notfound') }}</div>
    </list-widget>
</template>

<script>
    import { mapMutations } from 'vuex';
    import ListWidget from '../ListWidget.vue';

    export default {
        data() {
            return {
                items: []
            }
        },
        methods: {
            ...mapMutations('stats', [
                'subscribe',
                'unsubscribe'
            ])
        },
        components: {
            'list-widget': ListWidget
        },
        mounted () {
            this.subscribe({ topic: 'core.machine.duplicate_computernames' });
        },
        beforeDestroy () {
            this.unsubscribe({ topic: 'core.machine.duplicate_computernames' });
        }
    }
</script>
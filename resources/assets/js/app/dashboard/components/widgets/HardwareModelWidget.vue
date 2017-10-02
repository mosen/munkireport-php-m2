<template>
    <list-widget>
        <span slot="title">
            <span class="glyphicon glyphicon-list"></span>
            {{ $t('machine.hardware_widget_title') }}
        </span>


        <template v-if="items.length > 0">
            <div v-for="item in items" href="/show/listing/hardware/machine_desc" class="widget-list-item">
                {{ item.machine_desc }}
                <span class="badge pull-right">{{ count }}</span>
            </div>
        </template>
        <div v-else class="widget-list-item">{{ $t('no_clients') }}</div>

    </list-widget>
</template>

<script>
    import {mapMutations} from 'vuex';
    import ListWidget from '../ListWidget.vue';

    export default {
        data() {
            return {
                items: []
            }
        },
        methods: {
        },

        mounted () {
//            this.subscribe({topic: 'core.machine.hardware_models'});
        },

        beforeDestroy () {
//            this.unsubscribe({topic: 'core.machine.hardware_models'});
        },
        components: {
            'list-widget': ListWidget
        }
    }
</script>
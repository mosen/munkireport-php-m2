<template>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">
                <i class="glyphicon glyphicon-list"></i>
                {{ $t('machine.hardware_widget_title') }}
            </h3>
        </div>
        <div class="list-group scroll-box">
            <template v-if="items.length > 0">
                <a v-for="item in items" href="/show/listing/hardware/machine_desc" class="list-group-item">
                    {{ item.machine_desc }}
                    <span class="badge pull-right">{{ count }}</span>
                </a>
            </template>
            <span v-else class="list-group-item">{{ $t('no_clients') }}</span>
        </div>
    </div>
</template>

<script>
    import { mapMutations } from 'vuex';

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

        mounted () {
            this.subscribe({ topic: 'core.machine.hardware_models' });
        },

        beforeDestroy () {
            this.unsubscribe({ topic: 'core.machine.hardware_models' });
        }
    }
</script>
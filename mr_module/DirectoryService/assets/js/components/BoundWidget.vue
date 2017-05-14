<template>
    <panel>

        <span slot="title">
            <span class="glyphicon glyphicon-link"></span>
            {{ $t('widget.bound_to_ds.title') }}
        </span>

        <div class="widget-status">
            <div class="widget-status-item widget-danger widget-padded">
                <a href="#">
                    <span class="bigger-150">{{ notbound || 0 }}</span>
                    <br>{{ $t('widget.bound_to_ds.notbound') }}
                </a>
            </div>
            <div class="widget-status-item widget-success widget-padded">
                <a href="#">
                    <span class="bigger-150">{{ arebound || 0 }}</span>
                    <br>{{ $t('widget.bound_to_ds.bound') }}
                </a>

            </div>

        </div>

    </panel>
</template>

<script>
    import {mapMutations} from 'vuex';
    import panel from 'CoreDashboard/components/WidgetPanel.vue';

    export default {
        data() {
            return {
                arebound: 0,
                notbound: 0
            }
        },
        methods: {
            ...mapMutations('stats', [
                'subscribe',
                'unsubscribe'
            ])
        },
        mounted() {
            this.subscribe({ topic: 'directoryservice.bound' });
        },
        beforeDestroy() {
            this.unsubscribe({ topic: 'directoryservice.bound' });
        },
        components: {
            panel
        }
    }
</script>
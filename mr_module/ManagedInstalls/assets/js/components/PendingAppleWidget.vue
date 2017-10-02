<template>
    <panel>
        <span slot="title">
            <span class="glyphicon glyphicon-apple"></span>
            {{ $t('widget.pending_apple.title') }}
        </span>
        
        <div class="list-group scroll-box">
            <template v-for="item in items">
                <a href="/x/managedinstalls" class="list-group-item">
                    {{ item.display_name || item.name }}
                    {{ item.version }}
                    <span class="badge pull-right">{{ item.count }}</span>
                </a>
            </template>
            <span v-if="items.length === 0 && !error" class="list-group-item">{{ $t('widget.munki.no_updates_pending')
                }}</span>
            <span v-if="error" class="list-group-item text-danger">An error occurred fetching items.</span>
        </div>
    </panel>
</template>

<script>
    import { mapMutations } from 'vuex';
    import panel from 'CoreDashboard/components/WidgetPanel.vue';

    export default {
        data() {
            return {
                items: [],
                error: false
            }
        },
        methods: {

        },
        mounted() {

        },
        beforeDestroy() {

        },
        components: {
            panel
        }
    }
</script>
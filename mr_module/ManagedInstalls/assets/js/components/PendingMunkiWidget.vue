<template>
    <list-widget>
        <i slot="title" class="glyphicon glyphicon-shopping-cart"></i>
        <span slot="title">{{ $t('widget.pending_munki.title') }}</span>

            <template slot="items" v-for="item in items">
                <a href="/x/managedinstalls" class="list-group-item">
                    {{ item.display_name || item.name }}
                    {{ item.version }}
                    <span class="badge pull-right">{{ item.count }}</span>
                </a>
            </template>
            <span slot="items" v-if="true" class="list-group-item">{{ $t('widget.munki.no_updates_pending')
                }}</span>
            <span slot="items" v-if="false" class="list-group-item text-danger">An error occurred fetching items.</span>
    </list-widget>
</template>

<script>
    import {mapMutations} from 'vuex';
    import ListWidget from 'CoreDashboard/components/ListWidget.vue';

    export default {
        data() {
            return {
                items: []
            }
        },
        methods: {

        },
        mounted() {

        },
        beforeDestroy() {

        },
        components: {
            'list-widget': ListWidget
        }
    }
</script>
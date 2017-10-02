<template>
    <panel>
        <div class="widget-padded">
            <i slot="title" class="fa fa-code-fork"></i>
            <span slot="title"
                  data-i18n="widget.modified_computernames.title">{{ $t('widget.modified_computernames.title')
                }}</span>
            <span slot="title" class="counter badge pull-right">{{ items.length }}</span>

            <div class="widget-list scroll-box">
                <a v-if="items.count > 0" v-for="item in items" href="#" class="list-group-item">
                    {{ item.computer_name }} != {{ item.computer_account_no_dollarsign }}
                </a>
                <span v-else class="list-group-item">{{ $t('no_clients') }}</span>
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
                items: [],
                error: false
            }
        },
        methods: {

        },
        mounted() {

        },
        components: {
            panel
        }
    }
</script>
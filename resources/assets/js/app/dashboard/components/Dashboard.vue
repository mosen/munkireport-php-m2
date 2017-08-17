<template>
    <div class="dashboard">
        <template v-for="(row, ridx) in widgets(page)">
            <div class="dashboard-row">
            <template v-for="(widget, col) in row">
                <WidgetContainer
                        :widget="widget"
                        :col="col"
                        :row="ridx"
                        :key="ridx + '-' + widget.widget"
                />

            </template>
            </div>
        </template>
    </div>
</template>

<script>
    import {mapGetters} from 'vuex';
    import WidgetContainer from './WidgetContainer';
    import './Dashboard.scss';

    export default {
        computed: {
            ...mapGetters('dashboard', [
                'widgets',
                'page'
            ])
        },
        components: {
            WidgetContainer
        }
    }
</script>
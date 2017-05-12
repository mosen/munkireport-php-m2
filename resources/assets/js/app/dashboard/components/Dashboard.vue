<template>
    <div class="dashboard">
        <div class="row" v-for="row in widgets(page)">
            <div class="widget-container" v-for="widget in row" :key="widget">
                <div class="widget-controls">
                    <span class="glyphicon glyphicon-remove widget-close" aria-hidden="true"></span>
                </div>
                <Widget :widget="widget" />
            </div>
        </div>
    </div>
</template>

<script>
    import { mapGetters } from 'vuex';
    import Widget from './Widget';
    import * as Core from './widgets';
    import './Dashboard.scss';

    export default {
      computed: {
        ...mapGetters('dashboard', [
          'widgets',
          'page'
        ])
      },
      components: {
        Widget
      }
    }
</script>
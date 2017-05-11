<template>
    <div class="dashboard">
        <div class="row" v-for="row in widgets(page)">
            <Widget v-for="widget in row" :key="widget" />
        </div>
    </div>
</template>

<script>
    import { mapGetters } from 'vuex';
    import Widget from './Widget';
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
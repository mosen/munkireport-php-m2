<template>
    <panel>
        <i slot="title" class="fa fa-tasks"></i>
        <span slot="title">{{ $t('warranty.installed_memory_title') }}</span>
        <div class="widget-padded">
            <a href="/show/listing/hardware/#memory < 4GB" class="btn btn-danger">
                <span class="bigger-150">{{ danger || 0 }}</span>
                <br>
                &lt; 4GB
            </a>
        </div>
    </panel>
</template>

<script>
    import { mapMutations } from 'vuex';
    import panel from '../WidgetPanel.vue';

  export default {
      data() {
          return {
              danger: 0
          }
      },
      methods: {

      },
      mounted() {
//          this.subscribe({ topic: 'core.installed_memory' });
      },
    components: {
      panel
    }
  }
</script>
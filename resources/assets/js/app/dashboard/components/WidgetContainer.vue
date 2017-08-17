<template>
    <div class="widget-container" :class="classObject">
      <div class="widget-controls">
        <span class="glyphicon glyphicon-remove widget-close" aria-hidden="true" @click.prevent="removeWidget(row, col)"></span>
      </div>
      <Widget :widget="widget.widget" :row="row" :column="col" :width="widget.width" :height="widget.height" />
    </div>
</template>
<script>
import Widget from './Widget';

export default {
  props: ['widget', 'col', 'row'],
  computed: {
    classObject: function () {
      let classes = {};
      if (this.widget.width) {
        classes[`widget-width-${this.widget.width}`] = true;
      }

      if (this.widget.height) {
        classes[`widget-height-${this.widget.height}`] = true;
      }

      return classes;
    }
  },
  components: {
    Widget
  }
}

</script>
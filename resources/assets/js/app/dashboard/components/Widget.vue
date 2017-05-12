<script>
  import './Widget.scss';

  // Polymorphic widget component should just render a globally registered widget based on the name passed down on
  // a prop
  export default {
    props: ['widget'],
    render: function (createElement) {
      return createElement(
        this.widget,
        this.$slots.default
      )
    }
  }
</script>
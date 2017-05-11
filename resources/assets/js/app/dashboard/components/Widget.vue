<template>
    <div class="widget">
        <slot></slot>
    </div>
</template>

<script>
    import './Widget.scss';
    const names = {
        'core.uptime': ''
    };

    export default {
        render: function(createElement) {
          return createElement(
            '<span>',
            this.$slots.default
          )
        }
    }
</script>
<template>
    <div class="widget">
        <div class="widget-heading" data-container="body">
            <slot name="title"></slot>
        </div>
        <div class="widget-content scroll-box">
            <slot></slot>
        </div>
    </div>
</template>

<script>
    import panel from './WidgetPanel.vue';

    export default {
        components: {
            panel
        }
    }
</script>
<template>
    <panel>
        <div class="widget-padded">
            <template slot="items"></template>
        </div>
    </panel>
</template>

<script>
    import panel from './WidgetPanel.vue';

    export default {
        components: {
            panel
        }
    }
</script>
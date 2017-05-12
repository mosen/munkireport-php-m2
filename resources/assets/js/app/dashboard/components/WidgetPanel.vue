<template>
    <div class="widget">
        <div class="widget-heading" data-container="body">
            <slot name="title"></slot>
        </div>
        <div class="widget-content">
            <slot></slot>
        </div>
    </div>
</template>

<script>
    export default {
        
    }
</script>
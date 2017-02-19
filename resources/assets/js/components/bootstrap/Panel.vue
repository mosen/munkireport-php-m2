<template>
    <div class="panel panel-default">
        <div class="panel-heading" data-container="body">
            <h3 class="panel-title">
                <slot name="title"></slot>
            </h3>
        </div>
        <div class="list-group scroll-box">
            <slot></slot>
        </div>
    </div>
</template>

<script>
    export default {
        
    }
</script>
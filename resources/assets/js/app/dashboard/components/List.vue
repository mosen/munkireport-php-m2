<template>
    <div class="panel panel-default">
        <div class="panel-heading" data-container="body">
            <div class="panel-title">
                <span>{{ title }}</span> <span class="counter badge pull-right"></span>
            </div>
        </div>
        <div class="list-group scroll-box">
            <a v-for="item in items" :href="url" class="list-group-item">{{ value }}</a>
        </div>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                items: []
            }
        }
    }
</script>
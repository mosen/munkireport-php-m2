<template>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">{{ title }}</h3>
        </div>
        <div class="panel-body text-center">
            <a href="#" v-for="counter in counters" :class="counterClass">
                <span class="bigger-150">{{ counter.value }}</span>
            </a>
            <br />
            {{ $t(counter.label) }}
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                counters: []
            }
        }
    }
</script>
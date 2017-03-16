<template>
    <panel>
        <a v-if="danger" :href="danger.url" class="btn btn-danger">
            <span class="bigger-150">{{ danger.text }}</span>
            <br>

        </a>
        <a v-if="warning" :href="warning.url" class="btn btn-warning">
            <span class="bigger-150">{{ warning.text }}</span>
            <br>

        </a>
        <a v-if="success" :href="success.url" class="btn btn-success">
            <span class="bigger-150">{{ success.text }}</span>
            <br>

        </a>
    </panel>
</template>

<script>
    import Panel from './Panel';

    export default {
        props: ['title', 'danger', 'warning', 'success'],
        components: {
          'panel': Panel
        }
    }
</script>
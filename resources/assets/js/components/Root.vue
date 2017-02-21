<template>
    <div>
        <navigation></navigation>
        <dashboard></dashboard>
    </div>
</template>

<script>
    import Navigation from './Navigation.vue';
    import Dashboard from './Dashboard.vue';

    export default {
        components: {
            'navigation': Navigation,
            'dashboard': Dashboard
        }
    }
</script>
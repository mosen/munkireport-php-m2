<template>
    <div>
        <navigation></navigation>
        <dashboard></dashboard>
    </div>
</template>

<script>
    import 'font-awesome/css/font-awesome.css';
    import Navigation from './Navigation.vue';
    import Dashboard from './Dashboard.vue';

    export default {
        components: {
            'navigation': Navigation,
            'dashboard': Dashboard
        }
    }
</script>
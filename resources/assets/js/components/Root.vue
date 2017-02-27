<template>
    <dashboard :user="user"></dashboard>
</template>

<script>
    import Dashboard from './Dashboard.vue';

    export default {
        computed: {
          user: function() {
            return window.Auth.user;
          }
        },
        components: {
            'dashboard': Dashboard
        }
    }
</script>
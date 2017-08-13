<template>
    <div class="container-fluid">
        <DeviceImage :serial="data.serial_number" />
        <h1>{{ data.machine.computer_name }}</h1>
        <h2>{{ data.serial_number }}</h2>

        <dl>
            <dt><span class="glyphicon glyphicon-heart"></span> Last Seen</dt>
            <dd>{{ lastSeen }}</dd>
            <dt>Uptime</dt>
            <dd>{{ uptime }}</dd>
            <dt>CPU</dt>
            <dd>{{ data.machine.cpu }} &times; {{ data.machine.number_processors }}</dd>
            <dt>RAM</dt>
            <dd>{{ data.machine.physical_memory }}</dd>
            <dt>Model</dt>
            <dd><a :href="'https://www.everymac.com/ultimate-mac-lookup/?search_keywords=' + data.machine.machine_model">{{ data.machine.machine_model }}</a></dd>
        </dl>
    <spinner v-if="loading" size="md" fixed></spinner>


    </div>
</template>

<script>
  import {mapActions, mapState, mapGetters} from 'vuex';
  import { spinner, alert } from 'vue-strap';
  import DeviceImage from './DeviceImage.vue';

  export default {
    computed: {
      ...mapState('client', ['loading', 'error', 'data']),
      ...mapGetters('client', ['lastSeen', 'uptime'])
    },
    mounted() {
      this.read(this.$route.params.serial_number);
    },
    methods: {
      ...mapActions('client', ['read'])
    },
    components: { spinner, alert, DeviceImage }
  }
</script>
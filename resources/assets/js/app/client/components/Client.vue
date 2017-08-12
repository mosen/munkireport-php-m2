<template>
    <div class="container-fluid">
        <DeviceImage :serial="data.serial_number" />
        <h1>{{ data.machine.computer_name }}</h1>
        <h2>{{ data.serial_number }}</h2>

        <dl>
            <dt>Last Seen</dt>
            <dd>{{ lastSeen }}</dd>
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
      ...mapGetters('client', ['lastSeen'])
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
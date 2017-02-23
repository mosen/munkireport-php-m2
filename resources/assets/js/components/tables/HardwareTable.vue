<template>
    <v-server-table
            url="/api/machines"
            :columns="columns"
            :options="options"
            @loaded="onLoaded"
    ></v-server-table>
</template>

<script>
  export default {
    data() {
      return {
        columns: [
          'computer_name',
          'serial_number',
          'long_username',
          'machine_model',
          'machine_desc',
          'physical_memory',
          'number_processors',
          'cpu_arch',
          'current_processor_speed',
          'boot_rom_version'
        ],
        options: {
          headings: {
            'computer_name': this.$t('listing.computername'),
            'serial_number': this.$t('serial'),
            'long_username': this.$t('listing.username'),
            'machine_model': this.$t('machine.model'),
            'machine_desc': this.$t('listing.hardware.description'),
            'physical_memory': this.$t('memory.memory'),
            'number_processors': this.$t('machine.cores'),
            'cpu_arch': this.$t('machine.cpu_arch'),
            'current_processor_speed': this.$t('machine.current_processor_speed'),
            'boot_rom_version': this.$t('machine.boot_rom_version')
          },
          texts: {
            loading: this.$t('listing.loading')
          }
        }
      }
    }
  }
</script>
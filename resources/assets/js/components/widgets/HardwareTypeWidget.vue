<template>
    <panel>
        <i slot="title" class="fa fa-desktop"></i>
        <span slot="title">{{ $t('machine.hardware_type_title') }}</span>

        <svg style="width:100%"></svg>
    </panel>
</template>

<script>
    // TODO: d3 graph unfinished
    
    import Panel from '../bootstrap/Panel';
    export default {
        data() {
            return {

            }
        },
        components: {
            'panel': Panel
        }
    }
</script>
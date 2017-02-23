<template>
    <span>{{ name }}</span>
</template>

<script>
    import vendors from '../vendors';

    export default {
      props: {
        EDID: Number
      },
      data() {
        return {

        }
      },
      computed: {
        name: function() {
            if (vendors.hasOwnProperty(this.EDID)) {
              return vendors[this.EDID];
            } else {
              return this.EDID;
            }
        }
      }
    }
</script>
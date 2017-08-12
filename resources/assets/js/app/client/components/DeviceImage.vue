<template>
    <img class="img-responsive" :src="imageURL" />
</template>

<script>
    export default {
      props: ['serial'],
      computed: {
        imageURL() {
          return `https://km.support.apple.com.edgekey.net/kb/securedImage.jsp?configcode=${this.serial.slice(0, 8)}&;size=240x240`;
        }
      }
    }
</script>
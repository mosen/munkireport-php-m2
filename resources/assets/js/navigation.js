import Vue from 'vue';
import Navigation from './components/Navigation.vue';
import VueI18n from 'vue-i18n';

Vue.use(VueI18n);

new Vue({
  el: '#navigation',
  template: '<navigation/>',
  components: { Navigation }
});
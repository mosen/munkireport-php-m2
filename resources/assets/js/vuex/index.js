import Vue from 'vue';
import Vuex from 'vuex';
import vuexI18n from 'vuex-i18n';

import * as actions from './actions';
import * as getters from './getters';
import * as mutations from './mutations';
import * as state from './state';

import auth from '../app/auth/vuex'
import stats from '../app/stats/vuex'

Vue.use(Vuex);

export default new Vuex.Store({
    actions,
    getters,
    mutations,
    state,
    modules: {
        i18n: vuexI18n.store,
        auth,
        stats
    }
});

if (module.hot) {
  // accept actions and mutations as hot modules
  module.hot.accept(['./mutations'], () => {
    // require the updated modules
    // have to add .default here due to babel 6 module output
    const newMutations = require('./mutations').default
    // swap in the new actions and mutations
    store.hotUpdate({
      mutations: newMutations
    })
  })
}
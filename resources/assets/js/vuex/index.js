import Vue from 'vue';
import Vuex from 'vuex';
import vuexI18n from 'vuex-i18n';

import * as actions from './actions';
import * as getters from './getters';
import * as mutations from './mutations';
import * as state from './state';

import auth from '../app/auth/vuex'

Vue.use(Vuex);

export default new Vuex.Store({
    actions,
    getters,
    mutations,
    state,
    modules: {
        i18n: vuexI18n.store,
        auth
    }
});


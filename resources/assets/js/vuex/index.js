import Vue from 'vue';
import Vuex from 'vuex';
import vuexI18n from 'vuex-i18n';

import * as actions from './actions';
import * as getters from './getters';
import * as mutations from './mutations';
import * as state from './state';

import auth from '../app/auth/vuex'
import stats from '../app/stats/vuex'
import dashboard from '../app/dashboard/vuex';

// MrModules
// TODO: Load dynamically

import ard from 'MrModules/ARD/assets/js/vuex';
import bluetooth from 'MrModules/Bluetooth/assets/js/vuex';

Vue.use(Vuex);

export default new Vuex.Store({
    actions,
    getters,
    mutations,
    state,
    modules: {
        i18n: vuexI18n.store,
        auth,
        stats,
        dashboard,
        ard,
        bluetooth
    }
});

if (module.hot) {
    // accept actions and mutations as hot modules
    module.hot.accept(['./mutations', '../app/auth/vuex', '../app/stats/vuex', '../app/dashboard/vuex'], () => {
        // require the updated modules
        // have to add .default here due to babel 6 module output
        const newMutations = require('./mutations').default;
        const newAuth = require('../app/auth/vuex').default;
        const newStats = require('../app/stats/vuex').default;
        const newDashboard = require('../app/dashboard/vuex').default;

        // swap in the new actions and mutations
        store.hotUpdate({
            mutations: newMutations,
            modules: {
                auth: newAuth,
                stats: newStats,
                dashboard: newDashboard
            }
        })
    })
}
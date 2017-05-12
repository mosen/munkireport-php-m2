import Vue from 'vue';
import Router from 'vue-router';
import { routes } from '../app/index';

import ard from 'MrModules/ARD/assets/js/routes';
import bluetooth from 'MrModules/Bluetooth/assets/js/routes';

Vue.use(Router);

const router = new Router({ routes: [
  ...routes,
  ...ard,
    ...bluetooth
] });

export default router;
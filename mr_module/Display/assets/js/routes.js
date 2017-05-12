import { Listing } from './components';

export default [
  {
    path: '/x/displays',
    component: Listing,
    name: 'display-listing',
    meta: {
      guest: true,
      needsAuth: false
    }
  }
];

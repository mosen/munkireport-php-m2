import { Listing } from './components';

export default [
  {
    path: '/x/networks',
    component: Listing,
    name: 'network-listing',
    meta: {
      guest: true,
      needsAuth: false
    }
  }
];

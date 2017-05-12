import { Listing } from './components';

export default [
  {
    path: '/x/power/listing',
    component: Listing,
    name: 'power-listing',
    meta: {
      guest: true,
      needsAuth: false
    }
  }
];

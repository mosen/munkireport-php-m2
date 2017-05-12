import { Listing } from './components';

export default [
  {
    path: '/x/bluetooth/listing',
    component: Listing,
    name: 'bluetooth-listing',
    meta: {
      guest: true,
      needsAuth: false
    }
  }
];

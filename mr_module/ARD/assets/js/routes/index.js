import { Listing } from '../components';

export default [
  {
    path: '/x/ard/listing',
    component: Listing,
    name: 'listing',
    meta: {
      guest: true,
      needsAuth: false
    }
  }
];

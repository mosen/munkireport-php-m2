import { Listing } from './components';

export default [
  {
    path: '/x/ard/listing',
    component: Listing,
    name: 'ard-listing',
    meta: {
      guest: true,
      needsAuth: false
    }
  }
];

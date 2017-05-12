import { Listing } from './components';

export default [
  {
    path: '/x/security/listing',
    component: Listing,
    name: 'security-listing',
    meta: {
      guest: true,
      needsAuth: false
    }
  }
];

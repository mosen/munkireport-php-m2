import { Listing } from './components';

export default [
  {
    path: '/x/certificates',
    component: Listing,
    name: 'certificate-listing',
    meta: {
      guest: true,
      needsAuth: false
    }
  }
];

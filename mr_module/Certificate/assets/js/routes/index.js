import { Listing } from '../components';

export default [
  {
    path: '/x/certificate/listing',
    component: Listing,
    name: 'certificate-listing',
    meta: {
      guest: true,
      needsAuth: false
    }
  }
];

import { Listing } from './components';

export default [
  {
    path: '/x/directory_services',
    component: Listing,
    name: 'directory-service-listing',
    meta: {
      guest: true,
      needsAuth: false
    }
  }
];

import { Listing } from './components';

export default [
  {
    path: '/x/disks',
    component: Listing,
    name: 'disk-listing',
    meta: {
      guest: true,
      needsAuth: false
    }
  }
];

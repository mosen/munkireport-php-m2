import { Listing } from './components';

export default [
  {
    path: '/x/timemachine/listing',
    component: Listing,
    name: 'timemachine-listing',
    meta: {
      guest: true,
      needsAuth: false
    }
  }
];

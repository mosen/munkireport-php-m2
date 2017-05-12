import { Listing } from './components';

export default [
  {
    path: '/x/warranty/listing',
    component: Listing,
    name: 'warranty-listing',
    meta: {
      guest: true,
      needsAuth: false
    }
  }
];

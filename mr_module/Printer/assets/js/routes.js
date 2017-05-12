import { Listing } from './components';

export default [
  {
    path: '/x/printers',
    component: Listing,
    name: 'printer-listing',
    meta: {
      guest: true,
      needsAuth: false
    }
  }
];

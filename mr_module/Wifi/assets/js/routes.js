import { Listing } from './components';

export default [
  {
    path: '/x/wifi/listing',
    component: Listing,
    name: 'wifi-listing',
    meta: {
      guest: true,
      needsAuth: false
    }
  }
];

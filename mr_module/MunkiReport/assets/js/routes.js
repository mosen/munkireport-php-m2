import { Listing } from './components';

export default [
  {
    path: '/x/munki_reports',
    component: Listing,
    name: 'munkireport-listing',
    meta: {
      guest: true,
      needsAuth: false
    }
  }
];

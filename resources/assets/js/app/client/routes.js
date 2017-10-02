import { Clients, Client } from './components';

export default [
  {
    path: '/clients',
    name: 'client-listing',
    component: Clients
  },
  {
    path: '/clients/:serial_number',
    name: 'client',
    component: Client
  }
]
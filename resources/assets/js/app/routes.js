import auth from './auth/routes';
import dashboard from './dashboard/routes';
import clients from './client/routes';

export default [...dashboard, ...auth, ...clients];


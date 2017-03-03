import auth from './auth/routes';
import dashboard from './dashboard/routes';

export default [...dashboard, ...auth];


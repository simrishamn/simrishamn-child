import 'babel-polyfill';
import Helpers from './theme/helpers';

const Simrishamn = {
    helpers: new Helpers(),
};

window['Simrishamn'] = Simrishamn;

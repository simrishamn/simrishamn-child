import 'babel-polyfill';
import './content/header.js';
import Helpers from './theme/helpers';

const Simrishamn = {
    helpers: new Helpers(),
};
window['Simrishamn'] = Simrishamn;

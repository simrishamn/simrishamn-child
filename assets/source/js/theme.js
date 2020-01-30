import 'core-js/stable';
import 'regenerator-runtime/runtime';

import './content/header';
import Helpers from './theme/helpers';
import initTranslate from './theme/translate';

const Simrishamn = {
    helpers: new Helpers(),
};

window.Simrishamn = Simrishamn;

window.addEventListener('load', () => {
    initTranslate();
});

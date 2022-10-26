import './bootstrap';

import Alpine from 'alpinejs';
import collapse from '@alpinejs/collapse'
import autoAnimate from '@formkit/auto-animate';

Alpine.directive('animate', el => {
    autoAnimate(el);
})
Alpine.plugin(collapse)
window.Alpine = Alpine;

Alpine.start();
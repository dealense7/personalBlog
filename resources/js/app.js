import './bootstrap';
import Alpine from 'alpinejs'

// Alpine Start
window.Alpine = Alpine

Alpine.start()

import.meta.glob([
    '../img/**/*',
    '../fonts/**/*',
]);

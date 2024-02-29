import './bootstrap';

// Ci portiamo appresso il file scss
import '~resources/scss/app.scss';

// Ci importiamo tutto ciò che è dentro il pacchetto js di Bootstrap
import * as bootstrap from 'bootstrap';

// Ci portiamo appresso tutte le immagini che si trovano nella cartella resources/img
import.meta.glob([
    '../img/**'
]);
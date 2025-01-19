import { createVuetify } from 'vuetify';
import * as components from 'vuetify/components'; // Importa i componenti di Vuetify
import * as directives from 'vuetify/directives'; // Importa le direttive di Vuetify
import { aliases, mdi } from 'vuetify/iconsets/mdi-svg';
import 'vuetify/styles';
import '@mdi/font/css/materialdesignicons.css';

export default createVuetify({
    components, // Registra i componenti globalmente
    directives, // Registra le direttive globalmente
    icons: {
        defaultSet: 'mdi',
        aliases,
        sets: { mdi },
    },
    theme: {
        themes: {
            light: {
                colors: {
                    primary: '#1976D2',
                    secondary: '#424242',
                    accent: '#82B1FF',
                },
            },
        },
    },
    ssr: true,
});

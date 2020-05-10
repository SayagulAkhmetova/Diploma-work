import Vue from 'vue';
import Vuetify from 'vuetify';
import 'vuetify/dist/vuetify.min.css';

Vue.use(Vuetify);



export default new Vuetify({
    customVariables: ['~/assets/variables.scss'],
    theme: {
        dark: false,
        default: 'light',
        themes: {
            light: {
                primary: '#5D92F4',
                secondary: '#fff',
                accent: '#82B1FF',
                error: '#FF3739',
                warning: '#FFB70F',
                info: '#00D0BD',
                success: '#00D014',
            },
            dark: {
                primary: '#673ab7',
                secondary: '#3f51b5',
                accent: '#e91e63',
                error: '#f44336',
                warning: '#ff5722',
                info: '#ffeb3b',
                success: '#8bc34a'
            },
        }
    }
});

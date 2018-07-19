import Vue from 'vue'
import App from './App'
import Vuetify from 'vuetify'
import VeeValidate, {Validator} from 'vee-validate'

import ptBr from 'vee-validate/dist/locale/pt_BR.js'
import router from '@/router'
import axios from 'axios'
import {loadProgressBar} from 'axios-progress-bar'

import 'axios-progress-bar/dist/nprogress.css'
import 'vuetify/dist/vuetify.min.css'
import 'material-design-icons-iconfont/dist/material-design-icons.css'

import {NAME_TOKEN} from './config'
import './prototypes'
// Helpers

Vue.config.productionTip = false;
Vue.use(Vuetify, {
    theme: {
        primary: '#4F689C',
        dark: '#3F547C',
        accent: '#FFA500'
    }
});

Validator.localize('pt_BR', ptBr);
Vue.use(VeeValidate, {locale: 'pt_BR'});

loadProgressBar();

axios.interceptors.response.use(function (response) {
    let newToken = response.headers['new_token'];
    if (newToken) {
        localStorage.setItem(NAME_TOKEN, newToken);
    }
    if (response.status === 401 && response.headers['WWW-Authenticate'] === 'jwt_auth') {
        localStorage.removeItem(NAME_TOKEN);
    }
    return response
});

axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem(NAME_TOKEN);
axios.defaults.headers.common['Accept'] = 'application/json';

/* eslint-disable no-new */
new Vue({
  el: '#app',
  router,
  template: '<App/>',
  components: { App }
});

import Vue from 'vue'
import Router from 'vue-router'
import BasePage from '@/components/BasePage'
import Dashboard from '@/components/Dashboard'
import Usuarios from '@/components/Usuarios/Usuarios'
import LoginAdmin from '@/components/Auth/LoginAdmin'
import LoginUser from '@/components/Auth/LoginUser'

Vue.use(Router)

let routes = [
    {
        path: '/admin/login',
        name: 'admin-login',
        component: LoginAdmin
    },
    {
        path: '/login',
        name: 'login',
        component: LoginUser
    },
    {
        path: '/',
        component: BasePage,
        children: [
            {
                path: '',
                name: 'dashboard',
                component: Dashboard,
                meta: {
                    auth: true,
                    master: false
                }

            },
            {
                path: '/usuarios',
                name: 'admin-usuarios',
                component: Usuarios,
                meta: {
                    auth: true,
                    master: true
                }

            },
        ]
    },


];

const router = new Router({
    routes,
    mode: 'history'
});

router.beforeEach((to, from, next) => {
    if (!to.name) {
        return next({name: 'dashboard'})
    }
    let token = localStorage.getItem('jwt_token');
    if (to.meta.auth && !token) {
        localStorage.setItem('nextUrl', to.path);
        return next({name: 'login'})
    }

    localStorage.removeItem('nextUrl');

    if (!to.meta.auth && token) {
        return next({name: 'dashboard'})
    }

    if(to.meta.master && localStorage.getItem('isMaster') !== "1"){
        return next({name: 'login'});
    }
    return next()
});

export default router

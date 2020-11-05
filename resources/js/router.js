import Vue from 'vue';
import VueRouter from 'vue-router';

import User from './components/UserComponent.vue';
import UserView from './components/UserViewComponent.vue';

Vue.use(VueRouter);

const router = new VueRouter ({
    mode: 'history',
    routes: [
        {
            name: 'user',
            path: '/',
            component: User
        },
        {
            name: 'user-view',
            path: '/user/:id',
            component: UserView
        }
    ]
});

export default router;
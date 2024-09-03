import Vue from 'vue';
import Router from 'vue-router';
import Orders from '../views/Orders.vue';
import ProductDetails from '../views/ProductDetails.vue';
import TopUp from '../views/TopUp.vue';

Vue.use(Router);

export default new Router({
    routes: [
        { path: '/orders', name: 'Orders', component: Orders },
        { path: '/orders/:id', name: 'ProductDetails', component: ProductDetails },
        { path: '/top-up', name: 'TopUp', component: TopUp },
    ]
});
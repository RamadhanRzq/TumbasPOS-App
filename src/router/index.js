import { createRouter, createWebHistory } from 'vue-router'
import Home from '../pages/Home.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: Home,
    },
    {
      path: '/transaction',
      name: 'transaction',
      component: () => import('../pages/Transaction.vue'),
    },
    {
      path: '/product',
      name: 'product',
      component: () => import('../pages/Product.vue'),
    },
  ],
})

export default router

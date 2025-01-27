import { createRouter, createWebHistory } from 'vue-router';

const routes = [
  {
    path: '/',
    component: () => import('./pages/Home.vue'),
  },
  {
    path: '/products',
    component: () => import('./pages/Products.vue'),
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;

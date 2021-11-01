import { createRouter, createWebHistory, RouteRecordRaw } from 'vue-router'
import Home from '../views/Home.vue'

const routes: Array<RouteRecordRaw> = [
  // loaded on document load
  {
    path: '/',
    name: 'Accueil',
    component: Home
  },
  // Lazyloaded
  {
    path: '/search/:search',
    name: 'Recherche',
    component: () => import('../views/Search.vue')
  },
  // Lazyloaded
  {
    path: '/directory/:filter',
    name: 'Directory',
    component: () => import('../views/Directory.vue')
  },
  // Lazyloaded
  {
    path: '/restaurant/:restaurant_id',
    name: 'Restaurant',
    // params: {},
    component: () => import('../views/Restaurant.vue')
  },
  // Lazyloaded
  {
    path: '/restaurant/:restaurant_id/menu',
    name: 'Menu',
    component: () => import('../views/Menu.vue')
  },
  // Lazyloaded
  {
    path: '/restaurant/:restaurant_id/menu/dish-:dish_id',
    name: 'Dish',
    component: () => import('../views/Dish.vue')
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

// router.replace({ path: '*', redirect: '/' })

export default router

import Vue from "vue"
import Home from '../views/Home.vue'
import VueRouter from "vue-router";

Vue.use(VueRouter);

const routes = [
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

export const router = new VueRouter({
    mode: "history",
    routes
})

// router.replace({ path: '*', redirect: '/' })

export default router

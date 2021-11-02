import Vue from "vue";
import VueRouter, { Route, RouteRecord } from "vue-router";

Vue.use(VueRouter);

export const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: "*",
            //component: NotFound,
        },
        {
            name: "Index",
            path: "/",
            //component: Index,
        },
    ]
})
export default router;

import {createWebHistory, createRouter} from "vue-router";
import Home from "./pages/Home.vue"
import Login from "./pages/Login.vue"
import About from "./pages/About";
import Rent from "./pages/Rent";
import Land from "./pages/Land";

const routes = [
    {
        path: "/",
        name: "Home",
        component: Home,
    },
    {
        path: "/login",
        name: "Login",
        component: Login,
    },
    {
        path: "/about",
        name: "About",
        component: About,
    },
    {
        path: "/rents",
        name: "Rent",
        component: Rent,
    },
    {
        path: "/rents/id",
        name: "Land",
        component: Land,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
    scrollBehavior() {
        // When Router Link is Clicked, always scroll the new page on the top of page
        document.getElementById('app').scrollIntoView({ behavior: 'smooth' });
    }
});

export default router;

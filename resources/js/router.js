import { createWebHistory, createRouter } from "vue-router";
import Home from "./pages/Home.vue";
import Login from "./pages/Login.vue";
import Register from "./pages/Register.vue";
import About from "./pages/About.vue";
import Rent from "./pages/Rent.vue";
import Land from "./pages/Land.vue";
import Profile from "./pages/Profile.vue";
import EditProfile from "./pages/EditProfile.vue";
import AddListing from "./pages/AddListing.vue";
import EditListing from "./pages/EditListing.vue";

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
        path: "/register",
        name: "Register",
        component: Register,
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
        path: "/rents/:id",
        name: "Land",
        component: Land,
    },
    {
        path: "/profiles/:id",
        name: "Profile",
        component: Profile,
    },
    {
        path: "/profiles/:id/edit",
        name: "EditProfile",
        component: EditProfile,
    },
    {
        path: "/rent/create",
        name: "AddListing",
        component: AddListing,
    },
    {
        path: "/rent/:id/edit",
        name: "EditListing",
        component: EditListing,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
    scrollBehavior() {
        // When Router Link is Clicked, always scroll the new page on the top of page
        document.getElementById("app").scrollIntoView({ behavior: "smooth" });
    },
});

export default router;

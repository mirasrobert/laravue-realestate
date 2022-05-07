/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");

//window.Vue = require('vue').default;

import { createApp } from "vue";
import router from "./router";
import store from "./store";
import { VueQueryPlugin } from "vue-query";

// Vue Toast Notifaction
import VueToast from "vue-toast-notification";
import "vue-toast-notification/dist/theme-sugar.css";

// Config for Fontawesome
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";
import { library } from "@fortawesome/fontawesome-svg-core";
import {
    faBed,
    faBath,
    faDoorOpen,
    faStar,
    faStarHalfStroke,
    faPlus,
    faPencil,
    faTrash,
} from "@fortawesome/free-solid-svg-icons"; // Free Icons
import { fab } from "@fortawesome/free-brands-svg-icons"; // Free Brand Icons

// Add
library.add(
    faBed,
    faBath,
    faDoorOpen,
    faStar,
    faStarHalfStroke,
    faPlus,
    faPencil,
    faTrash
);

import AppRoot from "./AppRoot";

require("./store/subscriber");

// Get User Info Per Refresh or Every Request
store.dispatch("attempt", localStorage.getItem("token")).then(() => {
    // After loading the ME api
    // Then render the vue

    const app = createApp(AppRoot);

    app.component("font-awesome-icon", FontAwesomeIcon); // Use FontAwesome Icons

    app.use(VueQueryPlugin);
    app.use(VueToast);
    app.use(store);
    app.use(router);
    app.mount("#app");
});

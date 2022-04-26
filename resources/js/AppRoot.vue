<template>

    <Navbar />

    <router-view />

    <Footer />

</template>

<script>
    import Navbar from "./components/Navbar";
    import Footer from "./components/Footer";
    export default {
        name: "AppRoot",
        components: {Footer, Navbar}
    }
</script>

<style>
    * {
        font-family: 'Roboto', sans-serif;
        margin: 0;
        padding: 0;
    }

    .primary-color {
        color: rgb(67 56 202);
    }

    .primary-bg-color {
        background-color: rgb(67 56 202);
    }
</style>

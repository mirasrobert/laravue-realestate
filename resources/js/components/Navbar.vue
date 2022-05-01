<template>
    <div class="w-full">
        <div class="antialiased bg-white dark-mode:bg-gray-900">
            <div class="w-full text-gray-700 bg-white dark-mode:text-gray-200 dark-mode:bg-gray-800">
                <div
                    class="flex flex-col max-w-screen-xl px-4 mx-auto md:items-center md:justify-between md:flex-row md:px-6 lg:px-8">
                    <div class="flex flex-row items-center justify-between p-4">
                        <router-link :to="{ name: 'Home' }"
                           class="logo-text text-lg font-semibold tracking-widest text-gray-900 uppercase rounded-lg dark-mode:text-white focus:outline-none focus:shadow-outline">House
                            Marketplace</router-link>
                        <button class="rounded-lg md:hidden focus:outline-none focus:shadow-outline"
                                @click="toggle">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
                            </svg>
                        </button>
                    </div>
                    <nav
                        class="flex flex-col shadow-md	flex-grow pb-4 md:pb-0 md:shadow-none md:flex md:justify-end md:flex-row items-center"
                        :class="{ 'hidden': !isOpen }">
                        <router-link to="/"
                                     class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                            Home
                        </router-link>

                        <router-link :to="{ name: 'About' }"
                                     class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                            About
                        </router-link>

                        <template v-if="!authenticated">
                            <router-link to="/login"
                                         class="px-4 py-2 mt-2 mr-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                                Sign In
                            </router-link>
                        </template>
                        <template v-else>
                            <a class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                               href="#">{{ user.name }}</a>
                            <a @click.prevent="signOut" class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                               href="#">Logout</a>
                        </template>


                        <div class="relative mt-3 md:mt-0 text-gray-600 block md:hidden lg:block">
                            <input
                                class="border-2 border-gray-300 bg-white h-10 pl-2 pr-8 rounded-lg text-sm focus:outline-none"
                                type="search" name="search" placeholder="Search">
                            <button type="submit" class="absolute right-0 top-0 mt-3 mr-2">
                                <svg class="text-gray-600 h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                                     version="1.1" id="Capa_1" x="0px" y="0px"
                                     viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;"
                                     xml:space="preserve"
                                     width="512px" height="512px">
                                        <path
                                            d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z"/>
                                  </svg>
                            </button>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { mapActions, mapGetters} from 'vuex'

    export default {
        name: "Navbar",
        data() {
            return {
                isOpen: false
            }
        },

        computed: mapGetters(['authenticated', 'user']),

        methods: {
            ...mapActions(['logout']),

            toggle() {
                this.isOpen = !this.isOpen;
            },

            signOut()  {
                this.logout().then(() => {
                    this.$router.replace({
                        name: 'Home'
                    })
                }).catch(e => console.error('Error Logging Out'))
            }
        },
    }
</script>

<style scoped>
    .logo-text {
        font-family: 'Nunito', sans-serif;
    }

    nav .router-link-exact-active {
        background-color: rgb(107 114 128);
        color: rgb(229 231 235);
    }
</style>

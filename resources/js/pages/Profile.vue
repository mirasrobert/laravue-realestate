<template>
    <!-- <div
        v-if="profileIsLoading || rentsIsLoading"
        class="flex items-center justify-center min-h-screen w-full"
    >
        <pulse-loader color="#4338CA" size="30px"></pulse-loader>
    </div> -->
    <div
        v-if="profileIsLoading || rentsIsLoading"
        class="flex items-center justify-center min-h-screen w-full"
    >
        <profile-skeleton-loader />
    </div>
    <div v-else-if="profileError">
        <error-message :error="profileError" />
    </div>
    <div v-else class="container mx-auto px-4">
        <div class="block md:flex space-x-6 mt-12">
            <div class="flex-auto w-full md:w-3/5 items-center">
                <div class="flex space-x-6 items-center">
                    <img
                        class="avatar border-solid border-2 border-slate-600"
                        :src="profile.image.url"
                        alt="avatar"
                    />
                    <div>
                        <p class="text-2xl text-gray-800">
                            {{ profile.user.name }}
                        </p>
                        <p class="text-base font-light">
                            {{ profile.profession }}
                        </p>
                        <p class="text-sm font-medium">
                            {{ profile.company }}
                        </p>

                        <div v-if="user && user.id === id">
                            <router-link
                                class="text-blue-500"
                                :to="{ name: 'EditProfile', params: { id } }"
                            >
                                <font-awesome-icon
                                    icon="pencil"
                                ></font-awesome-icon>
                                Edit Profile
                            </router-link>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <h5 class="block font-semibold text-2xl mb-3 mt-10">About me</h5>
        <div class="w-full md:w-3/5 block">
            <p class="text-gray-800">
                {{ profile.about_me }}
            </p>
        </div>

        <div class="my-6">
            <p class="text-gray-800 font-semibold uppercase">
                Contact {{ profile.user.name }}
            </p>
            <p class="text-sm font-light">Call: 09598217694</p>
            <p class="text-sm font-light">Email: {{ profile.user.email }}</p>
            <span class="text-sm font-light">Speaks:</span> &nbsp;
            <span
                v-for="(language, index) in profile.language.split(',')"
                :key="index"
            >
                <span class="text-sm font-light">{{ language }}</span>
            </span>
        </div>

        <hr />

        <div class="my-5">
            <div class="flex items-end mb-5">
                <h5 class="block font-semibold text-2xl mr-3">Sale Listings</h5>
                <div v-if="user && user.id == id">
                    <router-link
                        class="text-blue-500 text-md hover:text-blue-400 focus:text-blue-600"
                        :to="{ name: 'AddListing' }"
                    >
                        <font-awesome-icon icon="plus"></font-awesome-icon>
                        Add Listing
                    </router-link>
                </div>
            </div>
            <div class="grid grid-cols-1 gap-x-5 md:grid-cols-2 lg:grid-cols-4">
                <div v-for="rent in listing" :key="rent.id">
                    <rent-card :rent="rent" />
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { computed, onMounted, ref, watch } from "vue";
import { useStore } from "vuex";
import { useRoute } from "vue-router";
import { useQuery, useQueryClient } from "vue-query";
import RentCard from "../components/RentCard.vue";
import PulseLoader from "vue-spinner/src/PulseLoader.vue";
import ProfileSkeletonLoader from "../components/ProfileSkeletonLoader.vue";
import ErrorMessage from "../components/ErrorMessage.vue";
import useProfile from "../composables/profile.js"; // use composables

export default {
    components: {
        RentCard,
        PulseLoader,
        ErrorMessage,
        ProfileSkeletonLoader,
    },
    name: "Profile",
    setup() {
        const store = useStore();
        const route = useRoute();
        const queryClient = useQueryClient();

        const id = route.params.id; // read parameter id (it is reactive)

        const user = computed(() => store.getters.user);

        // Using Composables
        const {
            profile,
            profileIsLoading,
            profileError,
            getProfile,
            getProfileRents,
            rentsIsLoading,
            rentError,
            listing,
        } = useProfile();

        // fetch the user information when params change
        watch(
            () => route.params.id,
            (newId) => {
                if (newId) {
                    getProfile(newId);
                    getProfileRents(newId);
                }
            },
            {
                deep: true,
                immediate: true,
            }
        );

        /*
         * USING VUE-QUERY LIBRARY
        const {
            error: profileError,
            data: profile,
            isLoading: profileIsLoading,
        } = useQuery(["profile", id], () => fetchProfile(id), {
            retry: 1,
        });
        
        const {
            error: rentError,
            data: listing,
            isLoading: rentsIsLoading,
        } = useQuery(["listing", id], () => fetchProfileRents(id), {
            retry: 1,
        });
        */

        return {
            profileError,
            rentError,
            listing,
            profile,
            profileIsLoading,
            rentsIsLoading,
            user, // Get the user from the getters
            id,
        };
    },
};
</script>

<style>
.avatar {
    width: 130px;
    height: 130px;
    border-radius: 50%;
}
</style>

<template>
    <div
        v-if="profileIsLoading || rentsIsLoading"
        class="flex items-center justify-center min-h-screen w-full"
    >
        <pulse-loader color="#4338CA" size="30px"></pulse-loader>
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

                        <div v-if="user">
                            <router-link
                                class="text-blue-500"
                                :to="{ name: 'EditProfile', params: id }"
                            >
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

        <div class="my-6">
            <h5 class="block font-semibold text-2xl mb-5">Sale Listings</h5>
            <div class="grid grid-cols-1 gap-x-5 md:grid-cols-2 lg:grid-cols-4">
                <div v-for="rent in listing" :key="rent.id">
                    <rent-card :rent="rent" />
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { computed } from "vue";
import { useStore } from "vuex";
import { useRoute } from "vue-router";
import { useQuery } from "vue-query";
import { fetchProfile, fetchProfileRents } from "../services/profileService";
import RentCard from "../components/RentCard.vue";
import PulseLoader from "vue-spinner/src/PulseLoader.vue";
import ErrorMessage from "../components/ErrorMessage.vue";

export default {
    components: { RentCard, PulseLoader, ErrorMessage },
    name: "Profile",
    setup() {
        const store = useStore();
        const route = useRoute();
        const id = route.params.id; // read parameter id (it is reactive)

        const {
            error: profileError,
            data: profile,
            isLoading: profileIsLoading,
        } = useQuery(["profile", id], () => fetchProfile(id), {
            retry: 1,
            enabled: id != null || id != undefined ? true : false,
        });

        const {
            error: rentError,
            data: listing,
            isLoading: rentsIsLoading,
        } = useQuery(["listing", id], () => fetchProfileRents(id), {
            retry: 1,
            enabled: id != null || id != undefined ? true : false,
        });

        return {
            profileError,
            rentError,
            listing,
            profile,
            profileIsLoading,
            rentsIsLoading,
            user: computed(() => store.getters.user), // Get the user from the getters
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

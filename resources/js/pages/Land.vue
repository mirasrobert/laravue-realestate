<template>
    <div
        v-if="isLoading"
        class="flex items-center justify-center min-h-screen w-full"
    >
        <pulse-loader color="#4338CA" size="30px"></pulse-loader>
    </div>
    <div v-else-if="error">
        <error-message :error="error" />
    </div>
    <template v-else>
        <div class="w-full m-0 p-0">
            <Slider :images="data.images" />
        </div>
        <div class="container mx-auto px-4">
            <div class="flex justify-between">
                <h5 class="block font-semibold text-2xl mb-3">
                    {{ data.title }} - &#8369;{{
                        parseFloat(data.price).toFixed(2)
                    }}
                </h5>
                <div v-if="data.user.id === user.id">
                    <button
                        type="submit"
                        class="bg-red-500 hover:bg-red-600 active:bg-red-700 focus:outline-none focus:ring focus:ring-red-300 focus:shadow-outline-red-300 text-white font-bold py-2 px-4 rounded flex items-center justify-center"
                        :class="{ 'opacity-50 cursor-not-allowed': false }"
                        :disabled="false"
                        @click.prevent="deleteDialog"
                    >
                        <font-awesome-icon
                            class="px-1"
                            icon="trash"
                        ></font-awesome-icon>
                        <p>Delete</p>
                    </button>
                </div>
            </div>
            <span
                class="text-sm px-3 py-2 text-white rounded-full"
                :class="{
                    'bg-emerald-500': !data.is_sold,
                    'bg-red-500': data.is_sold,
                }"
            >
                {{ parseFloat(data.is_sold) ? "Sold" : "For Sale" }}
            </span>
            <span
                v-if="data.discount > 0"
                class="text-sm bg-red-500 px-3 py-2 text-white rounded-full ml-3"
            >
                Discounted - {{ data.discount }}%
            </span>

            <h4
                class="font-medium font-semibold text-lg block mt-4 text-gray-800"
            >
                {{ data.location }}
            </h4>
            <div>
                <star-rating :rating="data.reviews_avg_rating" />
                <p class="text-gray-800">
                    {{ data.reviews_avg_rating }}
                    ({{ data.reviews.length }} reviews)
                </p>
            </div>

            <h4 class="font-medium text-md block mt-4 text-gray-800">
                It Includes:
            </h4>

            <div class="mb-4">
                <div
                    v-for="(feature, index) in data.features.split(',')"
                    :key="index"
                >
                    <p class="text-gray-800">{{ feature }}</p>
                </div>
            </div>

            <div class="mb-10">
                <h5 class="block font-semibold text-2xl text-gray-800 mb-3">
                    About Us
                </h5>
                <p class="font-sm text-gray-800 mb-4">
                    {{ data.description }}
                </p>
            </div>

            <div class="mb-8">
                <h5 class="font-semibold text-2xl text-gray-800">Location</h5>
                <p class="text-sm font-semibold block mt-4 text-gray-800 mb-3">
                    {{ data.location }}
                </p>
                <div class="location">
                    <img
                        src="https://media.wired.com/photos/59269cd37034dc5f91bec0f1/191:100/w_1280,c_limit/GoogleMapTA.jpg"
                        alt="img"
                        class="w-full h-full"
                    />
                </div>
            </div>

            <div class="mb-4">
                <h5 class="block font-semibold text-2xl text-gray-800 mb-3">
                    Property Ratings at {{ data.title }}
                </h5>
                <p class="text-sm text-gray-800 italic">
                    Posted by:
                    <router-link
                        class="text-blue-500 hover:text-blue-400"
                        :to="{
                            name: 'Profile',
                            params: { id: data.user.id },
                        }"
                    >
                        {{ data.user.name }}
                    </router-link>
                </p>
                <p class="text-sm text-gray-800 mb-4 italic">
                    Post Created: {{ moment(data.created_at).format("LL") }}
                </p>
            </div>

            <div>
                <div class="grid grid-cols-2 gap-3 mb-6">
                    <div
                        class="w-full flex items-center justify-center text-center"
                    >
                        <div class="border border-emerald-500 w-full">
                            <div class="py-2">
                                <p
                                    class="text-emerald-500 font-base text-3xl font-semibold"
                                >
                                    {{ data.reviews_avg_rating }}
                                </p>
                                <p
                                    class="text-emerald-500 font-base text-2xl font-semibold"
                                >
                                    {{
                                        data.reviews_avg_rating &&
                                        data.reviews_avg_rating >= 4.5
                                            ? "Excellent"
                                            : data.reviews_avg_rating &&
                                              data.reviews_avg_rating >= 3.5
                                            ? "Good"
                                            : "No Reviews"
                                    }}
                                </p>
                            </div>
                            <div class="bg-emerald-600 w-full">
                                <p class="text-white text-lg py-1">Out of 5</p>
                            </div>
                        </div>
                    </div>

                    <div
                        class="w-full flex items-center justify-center text-center bg-gray-300"
                    >
                        <div>
                            <div>
                                <div v-if="data.reviews_avg_rating">
                                    <star-rating
                                        :rating="data.reviews_avg_rating"
                                    />
                                </div>
                                <div v-else>
                                    <star-rating :rating="0" />
                                </div>
                            </div>
                            <h5 class="font-semibold text-gray-800">
                                {{ data.reviews_avg_rating }}
                                {{
                                    data.reviews_avg_rating == 5.0 ||
                                    data.reviews_avg_rating == 5
                                        ? "Perfect"
                                        : "Blended"
                                }}
                                Score
                            </h5>
                            <p class="text-sm text-gray-800">
                                {{ data.reviews.length }} Reviews
                            </p>
                        </div>
                    </div>
                </div>

                <review-form :pageId="id" :reviews="data.reviews" />

                <div class="grid grio-cols-1 md:grid-cols-2 gap-3">
                    <div v-for="review in data.reviews" :key="review.id">
                        <review-card :review="review" />
                    </div>
                </div>
            </div>
        </div>
    </template>
</template>

<script>
import { computed } from "vue";
import { useStore } from "vuex";
import { useRoute, useRouter } from "vue-router";
import { useQuery, useMutation } from "vue-query";
import moment from "moment";
import Slider from "../components/Slider";
import ReviewCard from "../components/ReviewCard.vue";
import PulseLoader from "vue-spinner/src/PulseLoader.vue";
import ErrorMessage from "../components/ErrorMessage.vue";
import StarRating from "../components/StarRating.vue";
import { fetchRent, deleteRent } from "../services/rentService";
import ReviewForm from "../components/ReviewForm.vue";
import Swal from "sweetalert2";

export default {
    name: "Land",
    components: {
        ReviewCard,
        Slider,
        PulseLoader,
        ErrorMessage,
        StarRating,
        ReviewForm,
    },
    created: function () {
        this.moment = moment;
    },
    setup() {
        const store = useStore();
        const route = useRoute();
        const router = useRouter();
        const id = parseInt(route.params.id); // read parameter id (it is reactive)

        const { error, data, isLoading, isFetching } = useQuery(
            ["rent", id],
            () => fetchRent(id),
            {
                retry: 1,
            }
        );

        const { mutate } = useMutation(deleteRent, {
            onSuccess: () => {
                Swal.fire("Deleted!", "Post has been deleted.", "success");

                router.replace({ name: "Home" });
            },
            onError: (error) => {
                Swal.fire(
                    "Error!",
                    "Something went wrong, cannot remove your post",
                    "error"
                );
            },
        });

        const deleteDialog = () => {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!",
            }).then((result) => {
                if (result.isConfirmed) {
                    mutate(id);
                }
            });
        };

        return {
            error,
            data,
            isLoading,
            isFetching,
            id,
            user: computed(() => store.getters.user),
            deleteDialog,
        };
    },
};
</script>

<style scoped>
.location {
    width: 100%;
    height: 350px;
    max-height: 350px;
}
</style>

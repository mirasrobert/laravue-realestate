<template>
    <div
        v-if="isLoading"
        class="flex items-center justify-center min-h-screen w-full"
    >
        <pulse-loader color="#4338CA" size="30px"></pulse-loader>
    </div>
    <div v-else-if="error">An error has occured</div>
    <template v-else>
        <div class="w-full m-0 p-0">
            <Slider :images="data.images" />
        </div>
        <div class="container mx-auto px-4">
            <h5 class="block font-semibold text-2xl mb-3">
                {{ data.title }} - &#8369;{{
                    parseFloat(data.price).toFixed(2)
                }}
            </h5>
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
                <font-awesome-icon icon="star" class="text-yellow-500" />
                <font-awesome-icon icon="star" class="text-yellow-500" />
                <font-awesome-icon icon="star" class="text-yellow-500" />
                <font-awesome-icon icon="star" class="text-yellow-500" />
                <font-awesome-icon icon="star" class="text-yellow-500" />
                <p class="text-gray-800">5.0 (16 reviews)</p>
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
                    Property Ratings at Elevate
                </h5>
                <p class="font-sm text-gray-800 mb-4">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    Blanditiis delectus deserunt est impedit nihil officia
                    quisquam sed sequi sunt tempora! A architecto, dolore
                    exercitationem facilis labore minima perferendis rem
                    voluptas!
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
                                    5.0
                                </p>
                                <p
                                    class="text-emerald-500 font-base text-2xl font-semibold"
                                >
                                    Excellent
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
                                <font-awesome-icon
                                    icon="star"
                                    class="text-yellow-500"
                                />
                                <font-awesome-icon
                                    icon="star"
                                    class="text-yellow-500"
                                />
                                <font-awesome-icon
                                    icon="star"
                                    class="text-yellow-500"
                                />
                                <font-awesome-icon
                                    icon="star"
                                    class="text-yellow-500"
                                />
                                <font-awesome-icon
                                    icon="star"
                                    class="text-yellow-500"
                                />
                            </div>
                            <h5 class="font-semibold text-gray-800">
                                5.0 Blended Score
                            </h5>
                            <p class="text-sm text-gray-800">16 Reviews</p>
                        </div>
                    </div>
                </div>

                <div class="grid grio-cols-1 md:grid-cols-2 gap-3">
                    <ReviewCard />
                    <ReviewCard />
                    <ReviewCard />
                </div>
            </div>
        </div>
    </template>
</template>

<script>
import { useRoute } from "vue-router";
import { useQuery } from "vue-query";
import Slider from "../components/Slider";
import ReviewCard from "../components/ReviewCard";
import PulseLoader from "vue-spinner/src/PulseLoader.vue";

async function fetchRent(id) {
    const { data } = await axios.get("/api/rents/" + id);

    return data;
}

export default {
    name: "Land",
    components: { ReviewCard, Slider, PulseLoader },
    setup() {
        const route = useRoute();
        const id = parseInt(route.params.id); // read parameter id (it is reactive)

        const { error, data, isLoading, isFetching } = useQuery(
            ["rent", id],
            () => fetchRent(id)
        );

        console.log(id);

        return {
            error,
            data,
            isLoading,
            isFetching,
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

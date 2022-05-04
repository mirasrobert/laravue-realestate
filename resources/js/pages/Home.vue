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
        <div class="container mx-auto px-4">
            <Slider :images="data.map((rent) => rent.images[0])" />
        </div>

        <div class="container mx-auto p-4 mt-8">
            <h5 class="block font-semibold text-2xl mb-3">Places for rent</h5>
            <section class="pt-5 pb-5">
                <div
                    class="grid grid-cols-1 gap-3 md:grid-cols-2 lg:grid-cols-4"
                >
                    <div v-for="data in data" :key="data.id">
                        <rent-card :rent="data" />
                    </div>
                </div>
            </section>
        </div>
    </template>
</template>
<script>
import { useQuery } from "vue-query";
import PulseLoader from "vue-spinner/src/PulseLoader.vue";
import ErrorMessage from "../components/ErrorMessage.vue";
import Slider from "../components/Slider";
import { fetchRents } from "../services/rentService";
import RentCard from "../components/RentCard.vue";

export default {
    name: "Home",
    components: { Slider, PulseLoader, ErrorMessage, RentCard },
    setup() {
        const { error, data, isLoading, isFetching } = useQuery(
            "topRents",
            fetchRents
        );

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
.category-item {
    width: 100%;
    min-height: 260px;
    max-height: 260px;
    /*height: 260px;*/
    display: block;
}
</style>

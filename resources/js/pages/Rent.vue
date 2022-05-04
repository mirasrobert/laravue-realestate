<template>
    <div
        v-if="isLoading"
        class="flex items-center justify-center min-h-screen w-full"
    >
        <pulse-loader color="#4338CA" size="30px"></pulse-loader>
    </div>
    <div v-else-if="error">An error has occured</div>
    <div v-else class="container mx-auto p-4 mt-8">
        <h5 class="block font-semibold text-2xl mb-3">Places for rent</h5>
        <section class="pt-5 pb-5">
            <div class="grid grid-cols-1 gap-3 md:grid-cols-2 lg:grid-cols-4">
                <div v-for="data in data.data.data" :key="data.id">
                    <rent-card :rent="data" />
                </div>
            </div>
        </section>
    </div>
</template>

<script>
import { useQuery } from "vue-query";
import RentCard from "../components/RentCard.vue";
import PulseLoader from "vue-spinner/src/PulseLoader.vue";

async function fetchRents() {
    return await axios.get("/api/rents");
}

export default {
    name: "Rent",
    components: { RentCard, PulseLoader },
    setup() {
        const { error, data, isLoading, isFetching } = useQuery(
            "rents",
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
.img-thumbnail {
    width: 100%;
    height: 180px;
    object-fit: cover;
    max-height: 180px;
}
</style>

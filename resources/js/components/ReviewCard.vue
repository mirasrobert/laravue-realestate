<template>
    <div class="shadow-md py-4 px-7 bg-white w-full rounded-lg">
        <star-rating :rating="review.rating" />
        <p class="text-sm text-gray-800 mb-2">{{ review.created_at }}</p>
        <p class="text-gray-800 font-semibold text-md mb-3">
            {{ review.user.name }}
        </p>
        <p class="text-sm text-gray-800">
            {{ review.comment }}
        </p>
    </div>
</template>

<script>
import StarRating from "../components/StarRating.vue";
export default {
    name: "ReviewCard",
    props: ["review"],
    components: {
        StarRating,
    },
};
</script>

<style scoped></style>

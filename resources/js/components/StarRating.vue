<template>
    <div class="flex mb-2">
        <span>
            <font-awesome-icon
                :icon="
                    rating >= 1
                        ? 'star'
                        : rating >= 0.5
                        ? 'star-half-stroke'
                        : 'star'
                "
                :class="
                    rating >= 1
                        ? 'text-yellow-500'
                        : rating >= 0.5
                        ? 'text-yellow-500'
                        : 'text-gray-500'
                "
            />
        </span>
        <span>
            <font-awesome-icon
                :icon="
                    rating >= 2
                        ? 'star'
                        : rating >= 1.5
                        ? 'star-half-stroke'
                        : 'star'
                "
                :class="
                    rating >= 2
                        ? 'text-yellow-500'
                        : rating >= 1.5
                        ? 'text-yellow-500'
                        : 'text-gray-500'
                "
            />
        </span>
        <span>
            <font-awesome-icon
                :icon="
                    rating >= 3
                        ? 'star'
                        : rating >= 2.5
                        ? 'star-half-stroke'
                        : 'star'
                "
                :class="
                    rating >= 3
                        ? 'text-yellow-500'
                        : rating >= 2.5
                        ? 'text-yellow-500'
                        : 'text-gray-500'
                "
            />
        </span>
        <span>
            <font-awesome-icon
                :icon="
                    rating >= 4
                        ? 'star'
                        : rating >= 3.5
                        ? 'star-half-stroke'
                        : 'star'
                "
                :class="
                    rating >= 4
                        ? 'text-yellow-500'
                        : rating >= 3.5
                        ? 'text-yellow-500'
                        : 'text-gray-500'
                "
            />
        </span>
        <span>
            <font-awesome-icon
                :icon="
                    rating >= 5
                        ? 'star'
                        : rating >= 4.5
                        ? 'star-half-stroke'
                        : 'star'
                "
                :class="
                    rating >= 5
                        ? 'text-yellow-500'
                        : rating >= 4.5
                        ? 'text-yellow-500'
                        : 'text-gray-500'
                "
            />
        </span>
    </div>
</template>

<script>
export default {
    name: "StarRating",
    props: ["rating"],
};
</script>

<style></style>

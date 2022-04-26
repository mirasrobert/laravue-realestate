<template>
    <div class="w-full shadow-md mb-6 md:mb-0">
        <div class="bg-white rounded-lg overflow-hidden mb-10">
            <img
                :src="item"
                alt="image"
                class="img-thumbnail"
            />
            <div class="mt-2 px-8 sm:px-9 md:px-7 xl:px-9 text-center">
                <h3 class="font-semibold text-dark text-md block hover:text-primary">
                    The Residences at  NewCity
                </h3>
                <p class="text-sm text-gray-800 text-body-color leading-relaxed">
                    9087 Gottlieb Row Apt. 389
                </p>

                <div class="flex flex-wrap justify-center space-x-6 mb-3">
                    <div>
                        <font-awesome-icon icon="bed" />
                        <span class="text-sm text-gray-800 ml-1">4 Bedrooms</span>
                    </div>
                    <div>
                        <font-awesome-icon icon="bath" />
                        <span class="text-sm text-gray-800 ml-1">1 Bathroom</span>
                    </div>
                    <div>
                        <font-awesome-icon icon="door-open" />
                        <span class="text-sm text-gray-800 ml-1">1 Room</span>
                    </div>

                </div>

                <router-link
                    to="/rents/id"
                    class="inline-block
                                py-2
                                px-7
                                bg-indigo-700
                                border
                                border-gray-600
                                rounded-full
                                text-base text-body-color
                                font-medium
                                hover:border-primary hover:bg-indigo-500 text-white
                                transition
                                mb-4
                                ">
                    View Details
                </router-link>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "RentCard",
        props: ['item']
    }
</script>

<style scoped>

</style>

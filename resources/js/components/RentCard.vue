<template>
    <div class="bg-white w-full shadow-md mb-6 md:mb-0 h-full">
        <div class="rounded-lg mb-10">
            <img
                :src="
                    rent.images[0].url.includes('cloudinary')
                        ? rent.images[0].url
                        : `/storage/${rent.images[0].url}`
                "
                alt="image"
                class="img-thumbnail"
            />
            <div class="mt-2 px-8 sm:px-9 md:px-7 xl:px-9 text-center">
                <h3
                    class="font-semibold text-dark text-md block hover:text-primary"
                >
                    {{ rent.title }}
                </h3>
                <p
                    class="text-md text-gray-800 text-body-color leading-relaxed"
                >
                    {{ rent.location }}
                </p>

                <div class="flex flex-wrap justify-center space-x-6 mb-3">
                    <div>
                        <p
                            class="text-lg font-bold text-gray-800 text-body-color leading-relaxed"
                        >
                            &#x20B1; {{ parseFloat(rent.price).toFixed(2) }}
                        </p>
                    </div>
                </div>

                <router-link
                    :to="{ name: 'Land', params: { id: rent.id } }"
                    class="inline-block py-2 px-7 bg-indigo-700 border border-gray-600 rounded-full text-base text-body-color font-medium hover:border-primary hover:bg-indigo-500 text-white transition mb-4"
                >
                    View Details
                </router-link>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "RentCard",
    props: ["rent"],
};
</script>

<style>
.img-thumbnail {
    width: 100%;
    min-height: 230px;
    height: 230px;
    max-height: 230px;
    object-fit: cover;
}
</style>

<template>

    <!-- Slider -->
    <div class="container mx-auto px-4">
        <Slider :images="carouselImages" />
    </div>

    <!--  Category  -->
    <div class="container mx-auto px-4">
        <h5 class="block font-semibold text-2xl mb-3">Categories</h5>

        <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
            <div class="category-item shadow-xl rounded-lg mb-10">
                <router-link :to="{ name: 'Rent' }" class="w-full h-full">
                    <img
                        class="w-full h-full rounded-lg object-cover shadow-xl"
                        src="https://images.pexels.com/photos/186077/pexels-photo-186077.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                        alt="category-1">
                </router-link>
                <h5 class="font-medium text-md block mt-4 text-gray-800">Places for rent</h5>
            </div>

            <div class="category-item shadow-xl rounded-lg mb-10">
                <router-link to="/login" class="w-full h-full">
                    <img
                        class="w-full h-full rounded-lg object-cover shadow-xl"
                        src="https://images.pexels.com/photos/1396122/pexels-photo-1396122.jpeg?auto=compress&cs=tinysrgb&w=600"
                        alt="category-2">
                </router-link>
                <h5 class="font-medium text-md block mt-4 text-gray-800">Places for sale</h5>

            </div>

            <div class="category-item shadow-xl rounded-lg mb-7">
                <router-link to="/" class="w-full h-full">
                    <img
                        class="w-full h-full rounded-lg object-cover shadow-xl"
                        src="https://images.pexels.com/photos/276724/pexels-photo-276724.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                        alt="category-3">
                </router-link>
                <h5 class="font-medium text-md block mt-4 text-gray-800">Places for everyone</h5>

            </div>

        </div>
    </div>


</template>
<script>



    import Slider from "../components/Slider";
    export default {
        name: "Home",
        components: {Slider},
        data() {
            return {
                name: '',
                email: '',
                carouselImages: [
                    'https://images.pexels.com/photos/280229/pexels-photo-280229.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
                    'https://images.pexels.com/photos/2635038/pexels-photo-2635038.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
                    'https://images.pexels.com/photos/2001944/pexels-photo-2001944.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
                    'https://images.pexels.com/photos/2724749/pexels-photo-2724749.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1'
                ],

            }
        },
    }
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

<template>
    <div class="container mx-auto p-4 mt-8">
        <h5 class="block font-semibold text-2xl mb-3">Places for rent</h5>
        <section class="pt-5 pb-5">
            <div class="grid grid-cols-1 gap-3 md:grid-cols-2 lg:grid-cols-4">
                <div v-for="(item, index) in images" :key="index">
                    <RentCard :item="item" />
                </div>
            </div>
        </section>
    </div>
</template>

<script>
    import RentCard from "../components/RentCard";
    export default {
        name: "Rent",
        components: {RentCard},
        data() {
            return {
                images: [
                    'https://images.pexels.com/photos/280229/pexels-photo-280229.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
                    'https://images.pexels.com/photos/2635038/pexels-photo-2635038.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
                    'https://images.pexels.com/photos/2001944/pexels-photo-2001944.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
                    'https://images.pexels.com/photos/2724749/pexels-photo-2724749.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
                    'https://images.pexels.com/photos/2724749/pexels-photo-2724749.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1'
                ],
            }
        }
    }
</script>

<style scoped>
    .img-thumbnail {
        width: 100%;
        height: 180px;
        object-fit: cover;
        max-height: 180px;
    }
</style>

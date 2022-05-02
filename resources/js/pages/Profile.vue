<template>
    <div class="container mx-auto px-4">
        <div class="block md:flex space-x-6 mt-12">
            <div class="flex-auto w-full md:w-3/5 items-center">
                <div class="flex space-x-6 items-center">
                    <img
                        class="avatar border-solid border-2 border-slate-600"
                        src="https://randomuser.me/api/portraits/men/35.jpg"
                        alt="avatar"
                    />
                    <div>
                        <p class="text-2xl text-gray-800">John Doe</p>
                        <p class="text-base font-light">
                            Licensed Real Estate Salesperson
                        </p>
                        <p class="text-sm font-medium">
                            NYC Real Estate Company
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <h5 class="block font-semibold text-2xl mb-3 mt-10">About me</h5>
        <div class="w-full md:w-3/5 block">
            <p class="text-gray-800">
                Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                Dignissimos culpa perspiciatis aperiam possimus ipsum quae et
                enim. Illo harum autem dicta maxime. Rerum, natus voluptatem
                quaerat quo fuga delectus repudiandae?
            </p>
        </div>

        <div class="my-6">
            <p class="text-gray-800 font-semibold uppercase">
                Contact John Doe
            </p>
            <p class="text-sm font-light">Call: 09598217694</p>
            <p class="text-sm font-light">Email: jdoe@gmail.com</p>
            <p class="text-sm font-light">Speaks: English, Filipino</p>
        </div>

        <hr />

        <div class="my-6">
            <h5 class="block font-semibold text-2xl mb-5">Sale Listings</h5>
            <div class="grid grid-cols-1 gap-x-5 md:grid-cols-2 lg:grid-cols-4">
                <div v-for="(item, index) in images" :key="index">
                    <rent-card :item="item" />
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import RentCard from "../components/RentCard.vue";
export default {
    components: { RentCard },
    name: "Profile",
    data() {
        return {
            images: [
                "https://images.pexels.com/photos/280229/pexels-photo-280229.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1",
                "https://images.pexels.com/photos/2635038/pexels-photo-2635038.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1",
                "https://images.pexels.com/photos/2001944/pexels-photo-2001944.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1",
                "https://images.pexels.com/photos/2724749/pexels-photo-2724749.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1",
                "https://images.pexels.com/photos/2724749/pexels-photo-2724749.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1",
            ],
        };
    },
};
</script>

<style scoped>
.avatar {
    width: 130px;
    height: 130px;
    border-radius: 50%;
}
</style>

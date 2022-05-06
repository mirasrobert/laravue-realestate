<template>
    <div class="container mx-auto p-4 mt-8">
        <h5 class="block font-semibold text-2xl mb-7">Add a new listing</h5>

        <form
            class="w-full inline-block"
            enctype="multipart/form-data"
            @submit.prevent="onSubmit"
        >
            <div class="w-full md:w-1/2 block">
                <div class="mb-5">
                    <label>Title</label>
                    <input
                        type="text"
                        class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500"
                        placeholder="Title"
                        v-model="fields.title"
                    />
                </div>
                <div class="mb-5">
                    <label class="text-gray-700">Location</label>
                    <input
                        type="text"
                        class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500"
                        placeholder="Location"
                        v-model="fields.location"
                    />
                </div>
                <div class="mb-5">
                    <label class="text-gray-700">Price</label>
                    <input
                        type="number"
                        class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500"
                        placeholder="Rent price"
                        v-model="fields.price"
                    />
                </div>
                <div class="mb-5">
                    <label class="text-gray-700">Discount (%)</label>
                    <input
                        type="number"
                        class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500"
                        placeholder="Discount in percentage"
                        v-model="fields.discount"
                    />
                </div>
                <div class="mb-5">
                    <label class="text-gray-700">Description</label>
                    <textarea
                        type="text"
                        class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500"
                        rows="4"
                        placeholder="Description"
                        v-model="fields.description"
                    ></textarea>
                </div>
                <div class="mb-5">
                    <label class="text-gray-700">Features</label>
                    <p class="text-sm font-light italic text-gray-500">
                        Please seperate each feature by comma (eg. swimming
                        pool, gym, garage)
                    </p>
                    <textarea
                        type="text"
                        class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500"
                        placeholder="features"
                        v-model="fields.features"
                    ></textarea>
                </div>
                <div class="mb-5">
                    <div class="flex">
                        <div class="mb-3 w-full md:w-96">
                            <label
                                for="formFile"
                                class="form-label inline-block mb-2 text-gray-700"
                                >Attach your images</label
                            >
                            <input
                                class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                multiple
                                type="file"
                                id="formFile"
                                @change="onFileChange"
                            />
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <button
                    type="submit"
                    class="bg-blue-500 hover:bg-blue-600 active:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-300 focus:shadow-outline-blue-300 text-white font-bold py-2 px-4 rounded flex items-center justify-center"
                >
                    <p>Create</p>
                    <div v-if="isLoading" class="px-1">
                        <pulse-loader size="7px"></pulse-loader>
                    </div>
                </button>
            </div>
        </form>
    </div>
</template>

<script>
import { ref } from "vue";
import { addRent } from "../services/rentService";
import { useMutation } from "vue-query";
import PulseLoader from "vue-spinner/src/PulseLoader.vue";
import Swal from "sweetalert2";

export default {
    name: "AddListing",
    components: { PulseLoader },
    setup() {
        const fields = ref({
            title: "",
            location: "",
            price: "",
            description: "",
            features: "",
            is_sold: 0,
            discount: "",
            images: [],
        });

        const { mutate, isLoading } = useMutation(addRent, {
            onSuccess: (data) => {
                // Empty Fields
                fields.value = {
                    title: "",
                    location: "",
                    price: "",
                    description: "",
                    features: "",
                    is_sold: 0,
                    discount: "",
                    images: [],
                };

                // Success message
                Swal.fire({
                    toast: true,
                    icon: "success",
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    title: "A new rent has been added",
                });
            },
            onError: () => {
                // Success message
                Swal.fire({
                    toast: true,
                    icon: "error",
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    title: "An error occured, please try again later",
                });
            },
        });

        const formData = new FormData();

        const onFileChange = (e) => {
            const files = e.target.files;
            for (let i = 0; i < files.length; i++) {
                fields.value.images.push(files[i]);
            }
        };

        const onSubmit = async () => {
            formData.append("title", fields.value.title);
            formData.append("location", fields.value.location);
            formData.append("price", fields.value.price);
            formData.append("description", fields.value.description);
            formData.append("features", fields.value.features);
            formData.append("is_sold", fields.value.is_sold);
            formData.append("discount", fields.value.discount);

            // Append all the images on the FormData Object
            for (let i = 0; i < fields.value.images.length; i++) {
                formData.append("images[]", fields.value.images[i]);
            }

            mutate(formData);
        };

        return {
            fields,
            onFileChange,
            onSubmit,
            isLoading,
        };
    },
};
</script>

<style></style>

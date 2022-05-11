<template>
    <div class="container mx-auto p-4 mt-8">
        <h5 class="block font-semibold text-2xl mb-7">Edit Listing</h5>

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
                    <small
                        v-if="validationError && validationError.title"
                        class="text-pink-600 mb-1"
                    >
                        <ul class="list-none text-pink-600">
                            <li
                                v-for="(error, index) in validationError.title"
                                :key="index"
                            >
                                {{ error }}
                            </li>
                        </ul>
                    </small>
                </div>

                <div class="mb-5">
                    <label class="text-gray-700">Location</label>
                    <input
                        type="text"
                        class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500"
                        placeholder="Location"
                        v-model="fields.location"
                    />
                    <small
                        v-if="validationError && validationError.location"
                        class="text-pink-600 mb-1"
                    >
                        <ul class="list-none text-pink-600">
                            <li
                                v-for="(
                                    error, index
                                ) in validationError.location"
                                :key="index"
                            >
                                {{ error }}
                            </li>
                        </ul>
                    </small>
                </div>
                <div class="mb-5">
                    <label class="text-gray-700">Price</label>
                    <input
                        type="number"
                        class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500"
                        placeholder="Rent price"
                        v-model="fields.price"
                    />
                    <small
                        v-if="validationError && validationError.price"
                        class="text-pink-600 mb-1"
                    >
                        <ul class="list-none text-pink-600">
                            <li
                                v-for="(error, index) in validationError.price"
                                :key="index"
                            >
                                {{ error }}
                            </li>
                        </ul>
                    </small>
                </div>
                <div class="mb-5">
                    <label class="text-gray-700">Discount (%)</label>
                    <input
                        type="number"
                        class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500"
                        placeholder="Discount in percentage"
                        v-model="fields.discount"
                    />
                    <small
                        v-if="validationError && validationError.discount"
                        class="text-pink-600 mb-1"
                    >
                        <ul class="list-none text-pink-600">
                            <li
                                v-for="(
                                    error, index
                                ) in validationError.discount"
                                :key="index"
                            >
                                {{ error }}
                            </li>
                        </ul>
                    </small>
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
                    <small
                        v-if="validationError && validationError.description"
                        class="text-pink-600 mb-1"
                    >
                        <ul class="list-none text-pink-600">
                            <li
                                v-for="(
                                    error, index
                                ) in validationError.description"
                                :key="index"
                            >
                                {{ error }}
                            </li>
                        </ul>
                    </small>
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
                    <small
                        v-if="validationError && validationError.features"
                        class="text-pink-600 mb-1"
                    >
                        <ul class="list-none text-pink-600">
                            <li
                                v-for="(
                                    error, index
                                ) in validationError.features"
                                :key="index"
                            >
                                {{ error }}
                            </li>
                        </ul>
                    </small>
                </div>
                <div class="mb-5">
                    <div class="flex items-center">
                        <label class="text-gray-700 mr-3">Is Sold</label>
                        <input
                            type="checkbox"
                            class="block px-3 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500"
                            :checked="fields.is_sold"
                            v-model="fields.is_sold"
                        />
                    </div>

                    <small
                        v-if="validationError && validationError.is_sold"
                        class="text-pink-600 mb-1"
                    >
                        <ul class="list-none text-pink-600">
                            <li
                                v-for="(
                                    error, index
                                ) in validationError.is_sold"
                                :key="index"
                            >
                                {{ error }}
                            </li>
                        </ul>
                    </small>
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
                    :class="{ 'opacity-50 cursor-not-allowed': isLoading }"
                    :disabled="isLoading"
                >
                    <p>Update</p>
                    <div v-if="isLoading" class="px-1">
                        <pulse-loader size="7px"></pulse-loader>
                    </div>
                </button>
            </div>
        </form>
    </div>
</template>

<script>
import { ref, computed } from "vue";
import { useRouter, useRoute } from "vue-router";
import { useStore } from "vuex";
import { useQuery, useMutation, useQueryClient } from "vue-query";
import { updateRent, fetchRent } from "../services/rentService";
import PulseLoader from "vue-spinner/src/PulseLoader.vue";
import Swal from "sweetalert2";

export default {
    name: "EditListing",
    components: { PulseLoader },
    setup() {
        const router = useRouter();
        const route = useRoute();
        const store = useStore();
        const queryClient = useQueryClient();

        const pageId = route.params.id;

        // To Get User (user.value)
        const user = computed(() => store.getters.user);

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

        const validationError = ref(null);

        // Get Data
        const { data: listing } = useQuery(
            ["fetchRent", pageId],
            () => fetchRent(pageId),
            {
                onSuccess: (data) => {
                    // Check if user owns the listing
                    if (user.value.id !== data.user_id) {
                        router.replace({ name: "Home" });
                    } else {
                        fields.value = {
                            ...data,
                            images: [],
                        };
                    }
                },
            }
        );

        // Update Data
        const { mutate, isLoading } = useMutation(updateRent, {
            onSuccess: (data) => {
                queryClient.invalidateQueries(["fetchRent", pageId]); // Delete Cache

                // Success message
                Swal.fire({
                    toast: true,
                    icon: "success",
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    title: "Listing updated successfully",
                });

                // Go back to post
                router.push({ name: "Land", params: { id: pageId } });
            },
            onError: (err) => {
                // Error message
                const status = err.response.status;
                const validation = err.response.data.errors;

                if (status == 422) {
                    validationError.value = validation;
                }

                if (status !== 422) {
                    Swal.fire({
                        toast: true,
                        icon: "error",
                        position: "top-end",
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        title: "An error occured, please try again later",
                    });
                }
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
            formData.append("is_sold", Boolean(fields.value.is_sold));
            formData.append("discount", fields.value.discount);

            // Append all the images on the FormData Object
            for (let i = 0; i < fields.value.images.length; i++) {
                formData.append("images[]", fields.value.images[i]);
            }

            formData.append("_method", "PUT"); // For Laravel PUT|PATCH To Work

            const params = {
                id: pageId,
                fields: formData,
            };

            mutate(params); // Update
        };

        return {
            fields,
            onFileChange,
            onSubmit,
            isLoading,
            validationError,
        };
    },
};
</script>

<style></style>

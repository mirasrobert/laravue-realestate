<template>
    <div
        v-if="isLoading || !id"
        class="flex items-center justify-center min-h-screen w-full"
    >
        <pulse-loader color="#4338CA" size="30px"></pulse-loader>
    </div>
    <div v-else-if="error">
        <error-message :error="error" />
    </div>
    <div v-else class="container mx-auto p-4 mt-8">
        <h5 class="block font-semibold text-2xl mb-3">Edit Your Profile</h5>

        <form class="w-full inline-block" @submit.prevent="onSubmit">
            <div class="w-full md:w-3/5 block">
                <div class="flex space-x-6 items-center">
                    <img
                        class="avatar border-solid border-2 border-slate-600"
                        :src="profileForm.image.url"
                        alt="avatar"
                    />
                    <div>
                        <p class="text-sm font-medium">
                            <input
                                type="text"
                                class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500"
                                placeholder="Your name"
                                v-model="profileForm.user.name"
                            />
                            <small
                                v-if="validationError && validationError.name"
                                class="text-pink-600 mb-1"
                            >
                                <ul class="list-none text-pink-600">
                                    <li
                                        v-for="(
                                            error, index
                                        ) in validationError.name"
                                        :key="index"
                                    >
                                        {{ error }}
                                    </li>
                                </ul>
                            </small>
                        </p>
                        <p class="text-sm font-medium">
                            <input
                                type="text"
                                class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500"
                                placeholder="Your profession"
                                v-model="profileForm.profession"
                            />
                            <small
                                v-if="
                                    validationError &&
                                    validationError.profession
                                "
                                class="text-pink-600 mb-1"
                            >
                                <ul class="list-none text-pink-600">
                                    <li
                                        v-for="(
                                            error, index
                                        ) in validationError.profession"
                                        :key="index"
                                    >
                                        {{ error }}
                                    </li>
                                </ul>
                            </small>
                        </p>
                        <p class="text-sm font-medium">
                            <input
                                type="text"
                                class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500"
                                placeholder="Your company"
                                v-model="profileForm.company"
                            />
                            <small
                                v-if="
                                    validationError && validationError.company
                                "
                                class="text-pink-600 mb-1"
                            >
                                <ul class="list-none text-pink-600">
                                    <li
                                        v-for="(
                                            error, index
                                        ) in validationError.company"
                                        :key="index"
                                    >
                                        {{ error }}
                                    </li>
                                </ul>
                            </small>
                        </p>
                    </div>
                </div>
            </div>

            <h5 class="block font-semibold text-2xl mb-3 mt-10">About me</h5>
            <div class="w-full md:w-3/5 block">
                <p class="text-gray-800">
                    <textarea
                        type="text"
                        class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500"
                        v-model="profileForm.about_me"
                        rows="3"
                        placeholder="Add here your self description..."
                    ></textarea>
                    <small
                        v-if="validationError && validationError.about_me"
                        class="text-pink-600 mb-1"
                    >
                        <ul class="list-none text-pink-600">
                            <li
                                v-for="(
                                    error, index
                                ) in validationError.about_me"
                                :key="index"
                            >
                                {{ error }}
                            </li>
                        </ul>
                    </small>
                </p>
            </div>

            <div class="my-6">
                <p class="text-gray-800 font-semibold uppercase">
                    Contact {{ profileForm.user.name }}
                </p>
                <div class="mb-3">
                    <p class="text-sm font-light">Call:</p>
                    <input
                        type="text"
                        class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500"
                        placeholder="Your phone number"
                        v-model="profileForm.mobile_number"
                    />
                    <small
                        v-if="validationError && validationError.mobile_number"
                        class="text-pink-600 mb-1"
                    >
                        <ul class="list-none text-pink-600">
                            <li
                                v-for="(
                                    error, index
                                ) in validationError.mobile_number"
                                :key="index"
                            >
                                {{ error }}
                            </li>
                        </ul>
                    </small>
                </div>
                <div class="mb-3">
                    <p class="text-sm font-light">Email:</p>
                    <input
                        type="text"
                        class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500"
                        placeholder="Your email address"
                        v-model="profileForm.user.email"
                    />
                    <small
                        v-if="validationError && validationError.email"
                        class="text-pink-600 mb-1"
                    >
                        <ul class="list-none text-pink-600">
                            <li
                                v-for="(error, index) in validationError.email"
                                :key="index"
                            >
                                {{ error }}
                            </li>
                        </ul>
                    </small>
                </div>
                <div class="mb-3">
                    <span class="text-sm font-light">Speaks:</span> &nbsp;

                    <input
                        type="text"
                        class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500"
                        placeholder="Your language"
                        v-model="profileForm.language"
                    />
                    <small
                        v-if="validationError && validationError.language"
                        class="text-pink-600 mb-1"
                    >
                        <ul class="list-none text-pink-600">
                            <li
                                v-for="(
                                    error, index
                                ) in validationError.language"
                                :key="index"
                            >
                                {{ error }}
                            </li>
                        </ul>
                    </small>
                </div>
            </div>
            <div>
                <button
                    type="submit"
                    class="bg-blue-500 hover:bg-blue-600 active:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-300 focus:shadow-outline-blue-300 text-white font-bold py-2 px-4 rounded flex items-center justify-center"
                    :class="{ 'cursor-not-allowed': isSaving }"
                    :disabled="isSaving"
                >
                    <p>Save changes</p>
                    <div v-if="isSaving" class="px-1">
                        <pulse-loader size="7px"></pulse-loader>
                    </div>
                </button>
            </div>
        </form>
    </div>
</template>

<script>
import { ref, onMounted, computed } from "vue";
import { useRoute, useRouter } from "vue-router";
import { useQuery, useMutation, useQueryClient } from "vue-query";
import { useStore } from "vuex";
import PulseLoader from "vue-spinner/src/PulseLoader.vue";
import ErrorMessage from "../components/ErrorMessage.vue";
import { fetchProfile, updateProfile } from "../services/profileService";
import Swal from "sweetalert2";

export default {
    name: "EditProfile",
    components: { PulseLoader, ErrorMessage },
    setup() {
        const route = useRoute();
        const router = useRouter();
        const queryClient = useQueryClient();
        const store = useStore();

        const id = route.params.id; // read parameter id (it is reactive)

        const user = computed(() => store.getters.user);

        const validationError = ref(null);

        const { isLoading: isSaving, mutate } = useMutation(updateProfile, {
            onSuccess: () => {
                queryClient.invalidateQueries(["profile", id]); // Delete Cache

                // Success message
                Swal.fire({
                    toast: true,
                    icon: "success",
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    title: "Your profile has been updated!",
                });

                router.push({ name: "Profile", params: { id } });
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

        let isLoading = ref(true);

        // On Mount - Check if Authenticated
        onMounted(() => {
            if (!localStorage.getItem("token") || !user.value) {
                router.push({ name: "Login" });
            }

            // Check If Owned Profile
            if (user.value && user.value.id !== parseInt(id)) {
                router.push({ name: "Profile", params: { id: user.value.id } });
            }
        });

        // Form Data
        const profileForm = ref({
            profession: "",
            company: "",
            about_me: "",
            language: "",
            user: {
                name: "",
                email: "",
            },
            image: {
                url: "",
            },
        });

        // Get the profile and populate form state
        const { data, error } = useQuery(
            ["profile", id],
            () => fetchProfile(id),
            {
                retry: 1,
                onSuccess: (data) => {
                    profileForm.value = data;
                    isLoading.value = false;
                },
            }
        );

        // Update the profile
        const onSubmit = () => {
            const fields = {
                id,
                formData: {
                    name: profileForm.value.user.name,
                    email: profileForm.value.user.email,
                    profession: profileForm.value.profession,
                    company: profileForm.value.company,
                    about_me: profileForm.value.about_me,
                    language: profileForm.value.language,
                    mobile_number: profileForm.value.mobile_number,
                },
            };

            mutate(fields);
        };

        return {
            data,
            isLoading,
            error,
            profileForm,
            id,
            onSubmit,
            isSaving,
            validationError,
        };
    },
};
</script>

<style></style>

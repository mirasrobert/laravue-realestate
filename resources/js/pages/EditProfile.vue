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
                        <p class="text-2xl text-gray-800">
                            <input
                                type="text"
                                class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500"
                                v-model="profileForm.user.name"
                            />
                        </p>
                        <p class="text-base font-light">
                            <input
                                type="text"
                                class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500"
                                v-model="profileForm.profession"
                            />
                        </p>
                        <p class="text-sm font-medium">
                            <input
                                type="text"
                                class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500"
                                v-model="profileForm.company"
                            />
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
                </p>
            </div>

            <div class="my-6">
                <p class="text-gray-800 font-semibold uppercase">
                    Contact {{ profileForm.user.name }}
                </p>
                <p class="text-sm font-light">
                    Call:
                    <input
                        type="text"
                        class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500"
                        v-model="profileForm.mobile_number"
                    />
                </p>
                <p class="text-sm font-light">
                    Email:
                    <input
                        type="text"
                        class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500"
                        v-model="profileForm.user.email"
                    />
                </p>
                <span class="text-sm font-light">Speaks:</span> &nbsp;

                <input
                    type="text"
                    class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500"
                    v-model="profileForm.language"
                />
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
            },
        });

        let isLoading = ref(true);

        // On Mount - Check if Authenticated
        onMounted(() => {
            if (!localStorage.getItem("token")) {
                router.push({ name: "Login" });
            }

            if (user.value.id !== parseInt(id)) {
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
                password: "",
                password_confirmation: "",
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
        };
    },
};
</script>

<style></style>

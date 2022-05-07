<template>
    <div class="wrapper mb-4" v-if="!hasReview">
        <div>
            <a
                href="#"
                class="text-blue-500 text-md hover:text-blue-400 focus:text-blue-600"
                @click.prevent="isHidden = !isHidden"
            >
                <font-awesome-icon icon="plus"></font-awesome-icon>
                Add a review
            </a>
        </div>

        <div
            class="w-full bg-white shadow-lg p-5"
            :class="{ hidden: isHidden }"
        >
            <form class="inline-block w-full" @submit.prevent="onSubmit">
                <div class="mb-5">
                    <label class="text-gray-700">Rating</label>
                    <select
                        class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500"
                        v-model="fields.rating"
                    >
                        <option
                            :selected="fields.rating == index"
                            v-for="index in 5"
                            :key="index"
                        >
                            {{ index }}
                        </option>
                    </select>
                </div>
                <div class="mb-5">
                    <label class="text-gray-700">Comment</label>
                    <textarea
                        type="text"
                        class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500"
                        rows="4"
                        placeholder="Comment"
                        v-model="fields.comment"
                    ></textarea>
                </div>
                <div>
                    <button
                        type="submit"
                        class="bg-blue-500 hover:bg-blue-600 active:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-300 focus:shadow-outline-blue-300 text-white font-bold py-2 px-4 rounded flex items-center justify-center"
                        :class="{ 'opacity-50 cursor-not-allowed': isLoading }"
                        :disabled="isLoading"
                    >
                        <p>Submit</p>
                        <div v-if="isLoading" class="px-1">
                            <pulse-loader size="7px"></pulse-loader>
                        </div>
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import { ref, computed, onMounted } from "vue";
import { useMutation, useQueryClient } from "vue-query";
import { useStore } from "vuex";
import { addReview } from "../services/reviewService";
import PulseLoader from "vue-spinner/src/PulseLoader.vue";
import Swal from "sweetalert2";

export default {
    name: "ReviewForm",
    props: ["pageId", "reviews"],
    components: { PulseLoader },
    setup(props) {
        const isHidden = ref(true);

        const user = computed(() => store.getters.user);
        const hasReview = computed(() => {
            return (
                props.reviews.filter(
                    (review) => review.user_id == user.value.id
                ).length > 0
            );
        });

        const store = useStore();
        const queryClient = useQueryClient();

        const { mutate, isLoading } = useMutation(addReview, {
            onSuccess: () => {
                isHidden.value = true;
                queryClient.invalidateQueries(["rent", props.pageId]);

                // Success message
                Swal.fire({
                    toast: true,
                    icon: "success",
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    title: "Review has been added",
                });
            },
            onError: () => {
                isHidden.value = true;
                // Error message
                Swal.fire({
                    toast: true,
                    icon: "error",
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    title: "An error occured adding your review",
                });
            },
        });

        const fields = ref({
            rating: 5,
            comment: "",
        });

        const onSubmit = () => {
            const formData = {
                rent_id: props.pageId,
                rating: parseInt(fields.value.rating),
                comment: fields.value.comment,
            };

            mutate(formData);
        };

        return {
            fields,
            isHidden,
            onSubmit,
            isLoading,
            hasReview,
        };
    },
};
</script>

<style></style>

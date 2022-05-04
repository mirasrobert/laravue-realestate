<template>
    <div v-if="String(error).match('404')">
        <div class="flex items-center justify-center min-h-screen w-full">
            <h1 class="text-center text-gray-500">
                <i class="fas fa-exclamation-triangle"></i>
            </h1>
            <h1 class="text-center text-gray-500 uppercase">
                404 | No results found
            </h1>
        </div>
    </div>
    <div v-else>
        <div class="flex items-center justify-center min-h-screen w-full">
            <h1 class="text-center text-gray-500">
                <i class="fas fa-exclamation-triangle"></i>
            </h1>
            <h1 class="text-center text-gray-500 uppercase">
                500 | Server Error
            </h1>
        </div>
    </div>
</template>

<script>
export default {
    name: "ErrorMessage",
    props: ["error"],
};
</script>

<style></style>

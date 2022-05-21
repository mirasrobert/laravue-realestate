<template>
    <div class="container mx-auto px-4 animate-pulse">
        <div class="block md:flex space-x-6 mt-12 mb-6">
            <div class="flex-auto w-full md:w-3/5 items-center">
                <div class="flex items-center">
                    <div class="w-1/6">
                        <div class="bg-gray-300 rounded-full w-32 h-32"></div>
                    </div>
                    <div class="w-full">
                        <div class="bg-gray-300 w-1/5 h-3 rounded mb-2"></div>
                        <div class="bg-gray-300 w-1/6 h-3 rounded mb-2"></div>
                        <div class="bg-gray-300 w-1/6 h-3 rounded mb-2"></div>
                    </div>
                </div>
            </div>
        </div>

        <div
            class="relative flex flex-col rounded w-full overflow-hidden bg-white"
        >
            <div class="flex items-center gap-2 mt-3">
                <div class="w-full">
                    <div class="bg-gray-300 w-1/6 h-6 rounded mb-4"></div>
                    <div class="bg-gray-300 w-2/3 h-3 rounded mb-2"></div>
                    <div class="bg-gray-300 w-2/4 h-3 rounded mb-2"></div>
                    <div class="bg-gray-300 w-2/5 h-3 rounded mb-2"></div>
                </div>
            </div>
        </div>

        <div
            class="relative flex flex-col rounded w-full overflow-hidden bg-white"
        >
            <div class="flex items-center gap-2 mt-3">
                <div class="w-full">
                    <div class="bg-gray-300 w-1/6 h-4 rounded mb-4"></div>
                    <div class="bg-gray-300 w-1/5 h-3 rounded mb-2"></div>
                    <div class="bg-gray-300 w-1/5 h-3 rounded mb-2"></div>
                    <div class="bg-gray-300 w-1/4 h-3 rounded mb-2"></div>
                </div>
            </div>
        </div>

        <div class="my-5">
            <div class="flex items-end mb-5">
                <h5 class="block font-semibold text-2xl mr-3">Sale Listings</h5>
            </div>
            <div class="grid grid-cols-1 gap-x-5 md:grid-cols-2 lg:grid-cols-4">
                <!-- START CARD -->
                <div class="bg-white w-full shadow-md mb-6 md:mb-0 h-full">
                    <div class="w-full object-contain">
                        <div
                            class="bg-gray-300 w-full h-56 object-contain"
                        ></div>
                    </div>
                    <div
                        class="mt-2 px-8 sm:px-9 md:px-7 xl:px-9 flex flex-col justify-center items-center"
                    >
                        <div class="bg-gray-300 w-2/3 h-3 rounded mb-2"></div>
                        <div class="bg-gray-300 w-1/2 h-3 rounded mb-2"></div>
                        <div class="bg-gray-300 w-2/3 h-3 rounded mb-2"></div>
                    </div>
                </div>
                <!-- END CARD -->
                <!-- START CARD -->
                <div class="bg-white w-full shadow-md mb-6 md:mb-0 h-full">
                    <div class="w-full object-contain">
                        <div
                            class="bg-gray-300 w-full h-56 object-contain"
                        ></div>
                    </div>
                    <div
                        class="mt-2 px-8 sm:px-9 md:px-7 xl:px-9 flex flex-col justify-center items-center"
                    >
                        <div class="bg-gray-300 w-2/3 h-3 rounded mb-2"></div>
                        <div class="bg-gray-300 w-1/2 h-3 rounded mb-2"></div>
                        <div class="bg-gray-300 w-2/3 h-3 rounded mb-2"></div>
                    </div>
                </div>
                <!-- END CARD -->
                <!-- START CARD -->
                <div class="bg-white w-full shadow-md mb-6 md:mb-0 h-full">
                    <div class="w-full object-contain">
                        <div
                            class="bg-gray-300 w-full h-56 object-contain"
                        ></div>
                    </div>
                    <div
                        class="mt-2 px-8 sm:px-9 md:px-7 xl:px-9 flex flex-col justify-center items-center"
                    >
                        <div class="bg-gray-300 w-2/3 h-3 rounded mb-2"></div>
                        <div class="bg-gray-300 w-1/2 h-3 rounded mb-2"></div>
                        <div class="bg-gray-300 w-2/3 h-3 rounded mb-2"></div>
                    </div>
                </div>
                <!-- END CARD -->
                <!-- START CARD -->
                <div class="bg-white w-full shadow-md mb-6 md:mb-0 h-full">
                    <div class="w-full object-contain">
                        <div
                            class="bg-gray-300 w-full h-56 object-contain"
                        ></div>
                    </div>
                    <div
                        class="mt-2 px-8 sm:px-9 md:px-7 xl:px-9 flex flex-col justify-center items-center"
                    >
                        <div class="bg-gray-300 w-2/3 h-3 rounded mb-2"></div>
                        <div class="bg-gray-300 w-1/2 h-3 rounded mb-2"></div>
                        <div class="bg-gray-300 w-2/3 h-3 rounded mb-2"></div>
                    </div>
                </div>
                <!-- END CARD -->
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "ProfileSkeletonLoading",
};
</script>

<style></style>

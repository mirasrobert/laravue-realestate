<template>

    <div class="w-full m-0 p-0">
        <Slider :images="carouselImages" />
    </div>

    <div class="container mx-auto px-4">
        <h5 class="block font-semibold text-2xl mb-3">Classy Home in Calyton - $690.00 </h5>
        <span class="text-sm bg-emerald-500 px-3 py-2 text-white rounded-full">
            For Sale
        </span>

        <h4 class="font-medium font-semibold text-lg block mt-4 text-gray-800">9087 Gottlieb Row Apt. 389</h4>
        <div>
            <font-awesome-icon icon="star" class="text-yellow-500"  />
            <font-awesome-icon icon="star" class="text-yellow-500" />
            <font-awesome-icon icon="star" class="text-yellow-500" />
            <font-awesome-icon icon="star" class="text-yellow-500" />
            <font-awesome-icon icon="star" class="text-yellow-500" />
            <p class="text-gray-800">5.0 (16 reviews)</p>
        </div>

        <h4 class="font-medium text-md block mt-4 text-gray-800">It Includes: </h4>

        <div class="mb-4">
            <p class="text-gray-800">4 Bedrooms</p>
            <p class="text-gray-800">1 Bathroom</p>
            <p class="text-gray-800">Parking Spot</p>
        </div>

        <div class="mb-10">
            <h5 class="block font-semibold text-2xl text-gray-800 mb-3">About Us</h5>
            <p class="font-sm text-gray-800 mb-4">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis delectus deserunt est impedit nihil officia quisquam sed sequi sunt tempora! A architecto, dolore exercitationem facilis labore minima perferendis rem voluptas!
            </p>
            <p class="font-sm text-gray-800 mb-4">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis delectus deserunt est impedit nihil officia quisquam sed sequi sunt tempora! A architecto, dolore exercitationem facilis labore minima perferendis rem voluptas!
            </p>
        </div>

        <div class="mb-8">
            <h5 class="font-semibold text-2xl text-gray-800">Location</h5>
            <p class="text-sm font-semibold block mt-4 text-gray-800 mb-3">9087 Gottlieb Row Apt. 389</p>
            <div class="location">
                <img src="https://media.wired.com/photos/59269cd37034dc5f91bec0f1/191:100/w_1280,c_limit/GoogleMapTA.jpg" alt="img" class="w-full h-full">
            </div>
        </div>

        <div class="mb-4">
            <h5 class="block font-semibold text-2xl text-gray-800 mb-3">Property Ratings at Elevate</h5>
            <p class="font-sm text-gray-800 mb-4">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis delectus deserunt est impedit nihil officia quisquam sed sequi sunt tempora! A architecto, dolore exercitationem facilis labore minima perferendis rem voluptas!
            </p>
        </div>

        <div>
            <div class="grid grid-cols-2 gap-3 mb-6">
                <div class="w-full flex items-center justify-center text-center">
                  <div class="border border-emerald-500 w-full">
                      <div class="py-2">
                          <p class="text-emerald-500 font-base text-3xl font-semibold">
                              5.0
                          </p>
                          <p class="text-emerald-500 font-base text-2xl font-semibold">
                              Excellent
                          </p>
                      </div>
                      <div class="bg-emerald-600 w-full">
                          <p class="text-white text-lg py-1">Out of 5</p>
                      </div>
                  </div>
                </div>

                <div class="w-full flex items-center justify-center text-center bg-gray-300">
                    <div>
                        <div>
                            <font-awesome-icon icon="star" class="text-yellow-500" />
                            <font-awesome-icon icon="star" class="text-yellow-500" />
                            <font-awesome-icon icon="star" class="text-yellow-500" />
                            <font-awesome-icon icon="star" class="text-yellow-500" />
                            <font-awesome-icon icon="star" class="text-yellow-500" />
                        </div>
                        <h5 class="font-semibold text-gray-800">
                            5.0 Blended Score
                        </h5>
                        <p class="text-sm text-gray-800">16 Reviews</p>
                    </div>
                </div>
            </div>

            <div class="grid grio-cols-1 md:grid-cols-2 gap-3">
                <ReviewCard />
                <ReviewCard />
                <ReviewCard />
            </div>

        </div>



    </div>




</template>

<script>
    import Slider from "../components/Slider";
    import ReviewCard from "../components/ReviewCard";
    export default {
        name: "Land",
        components: {ReviewCard, Slider},
        data() {
            return {
                carouselImages: [
                    'https://images.pexels.com/photos/280229/pexels-photo-280229.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
                    'https://images.pexels.com/photos/2635038/pexels-photo-2635038.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
                    'https://images.pexels.com/photos/2001944/pexels-photo-2001944.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
                    'https://images.pexels.com/photos/2724749/pexels-photo-2724749.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1'
                ],
            }
        }
    }
</script>

<style scoped>
    .location {
        width: 100%;
        height: 350px;
        max-height: 350px;
    }
</style>

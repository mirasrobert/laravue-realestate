<template>
    <Carousel :autoplay="3000" :breapoints="breakpoints" :wrap-around="true">
        <Slide v-for="(img, index) in images" :key="index">
            <div class="carousel__item">
                <img class="w-full h-full object-cover rounded-lg" :src="img" alt="img">
            </div>
        </Slide>

        <template #addons>
            <Navigation/>
            <Pagination/>
        </template>
    </Carousel>
</template>

<script>
    import {Carousel, Navigation, Pagination, Slide } from 'vue3-carousel';
    import 'vue3-carousel/dist/carousel.css';
    export default {
        name: "Slider",
        props: ['images'],
        components: {
            Carousel,
            Slide,
            Pagination,
            Navigation,
        },
        data() {
            return {
                breakpoints: {
                    // 700px and up
                    700: {
                        itemsToShow: 1,
                        snapAlign: 'center',
                    },
                    // 1024 and up
                    1024: {
                        itemsToShow: 2,
                        snapAlign: 'center',
                    },
                },
            }
        }
    }
</script>

<style>
    .carousel__prev,
    .carousel__next {
        display: none;
    }

    .carousel__item {
        min-height: 300px;
        max-height: 300px;
        width: 100%;
        border-radius: 8px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .carousel__slide {
        /*padding: 10px;*/
    }

    .carousel__prev,
    .carousel__next {
        background-color: #ccc;
        box-sizing: content-box;
        border: 5px solid white;
    }
</style>

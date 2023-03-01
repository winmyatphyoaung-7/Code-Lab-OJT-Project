<template>
    <div class="py-3">
        <div class="">
            <h3
                class="text-start text-black"
                style="
                    transform: rotate(-1deg);
                    font-family: 'Roboto Slab', serif;
                "
            >
                Recommended Courses
                <small class="text-info fs-5">For You</small>
            </h3>
            <div class="w-75 bg-info mt-3" style="height: 4px"></div>

            <div
                class="w-100 mt-3 px-4 custom-scroll rounded-5"
                style="background-color: #fff9fe"
            >
                <Carousel :items-to-show="5" :wrap-around="true">
                    <Slide v-for="course in recommendCourse" :key="course">
                        <div class="carousel__item">
                            <div class="p-3 text-center mx-auto">
                                <div
                                    class="overflow-hidden rounded-4"
                                    style="width: 160px; height: 150px"
                                >
                                    <Link :href="route('course#detail' , course.id)">
                                        <img
                                            :src="`/storage/${course.image}`"
                                            alt=""
                                            style="width: 160px; height: 150px"
                                        />
                                    </Link>
                                </div>

                                <Link
                                    :href="route('course#detail', course.id)"
                                    class=""
                                >
                                    <small
                                        class="fst-italic lh-1 fw-bold"
                                        style="
                                            font-size: 13px;
                                            line-height: 5px !important;
                                            color: #ff9635;
                                        "
                                        >{{ course.name }}</small
                                    >
                                </Link>

                                <div class="text-center fw-bolder">
                                    <small>{{ course.price }} Kyats</small>
                                </div>
                            </div>
                        </div>
                    </Slide>

                    <template #addons>
                        <Navigation />
                    </template>
                </Carousel>
            </div>
        </div>
    </div>
</template>

<script setup>
import { Link, Head } from "@inertiajs/inertia-vue3";
import "vue3-carousel/dist/carousel.css";
import { Carousel, Slide, Navigation } from "vue3-carousel";

const props = defineProps({
    recommendCourse: Object,
});
</script>

<style scoped>
.carousel__item {
    padding: 10px 20px;
}

.carousel__prev,
.carousel__next {
    width: 1000px !important;
    height: 100px;
    color: rgb(0, 0, 0);
    margin-top: 0px;
    border: 3px solid transparent;
}

.carousel__prev:hover,
.carousel__next:hover {
    width: 40px;
    height: 40px;
    color: rgb(0, 0, 0);
    margin-top: 0px;
    border: 3px solid rgb(217, 217, 217);
}
</style>

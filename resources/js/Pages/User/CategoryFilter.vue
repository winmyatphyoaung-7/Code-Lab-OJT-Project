<template>
    <Head title="Category Filter"></Head>
    <div>
        <UserLayout :cart="cartForNav">
            <div class="container mt-3">
                <div class="mb-3">
                    <h2 class="text-info fw-bold">{{ course[0].name }}</h2>
                    <small class="fw-bold"
                        >Here, We have shown the course which related with
                        <p class="text-info d-inline">
                            {{ course[0].name }}
                        </p></small
                    >
                </div>

                <div>
                    <p class="border border-3 rounded-5 p-2 border-info px-4">
                        1-{{ course.length }} of over {{course.length}} results for 
                        <p class="text-info d-inline">
                            {{ course[0].name }}
                        </p>
                    </p>
                </div>

                <div class="mt-4">
                    <div class="d-flex justify-content-around flex-wrap">
                        <div
                            class="card p-3 pt-2 mb-4"
                            style="width: 380px"
                            v-for="course in course"
                        >
                            <div
                                class="card-header d-flex justify-content-between align-items-center"
                            >
                                <h6 class="m-0 text-info fw-bold">
                                    {{ course.name }}
                                </h6>
                                <small
                                    style="font-size: 12px"
                                    class="text-warning"
                                    >{{ course.price }} Kyats</small
                                >
                            </div>
                            <img
                                :src="`/storage/${course.image}`"
                                style="height: 192px"
                                class="overflow-hidden w-100 pt-2"
                                alt=""
                            />
                            <div class="card-body">
                                <p style="font-size: 15px">
                                    {{ course.description.substring(0, 100) }}
                                    ....
                                </p>
                                <div class="d-flex justify-content-between">
                                    <div
                                        class="bg-primary rounded-pill px-2 text-white"
                                    >
                                        Like 100
                                    </div>
                                    <div class="text-primary">
                                        {{ course.categoryName }}
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer text-center">
                                <div
                                    class="w-100 rounded-top-pill py-2 bg-info"
                                    style="cursor: pointer"
                                >
                                    <a href="" class="text-white">
                                        For More Detials
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- recommended course section  -->
                <RecommendCourse :recommendCourse="recommendCourse" />
                <!-- recommended course end section  -->

                
            </div>
            <!-- Footer section  -->
            <Footer></Footer>
            <!-- Footer section end  -->

            <Link
                class="position-fixed bottom-0 end-0 rounded-top-circle bg-info d-flex justify-content-center align-items-center mb-3 me-3 animate__animated animate__pulse animate__fast animate__infinite"
                style="width: 60px; height: 60px; cursor: pointer"
                :href="route('user#homePage')"
            >
                <div class="fw-bold text-white">Back</div>
            </Link>
        </UserLayout>
    </div>
</template>

<script setup>
import UserLayout from "./Layout/UserLayout.vue";
import RecommendCourse from "../../Components/RecommendCourse.vue";
import { Link, Head } from "@inertiajs/inertia-vue3";
import Footer from "../../Components/Footer.vue";

const props = defineProps({
    course: Object,
    recommendCourse: Object,
    cartForNav : Object
});
</script>

<style scoped></style>

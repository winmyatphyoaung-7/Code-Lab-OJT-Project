<template>
    <Head title="Home Page" />
    <div>
        <div
            v-if="$page.props.flash.profileUpdate ? profileUpdate() : ''"
        ></div>
        <div
            v-if="
                $page.props.flash.changePasswordSuccess
                    ? changePasswordSuccess()
                    : ''
            "
        ></div>
        <UserLayout :cart="cart">
            <div class="d-flex" style="">
                <div
                    class="col-2 custom-scroll position-sticky left-0 p-3"
                    style="
                        background-color: #fefff9;
                        overflow: auto;
                        height: calc(100vh - 49.59px);
                        top: 49.59px;
                    "
                >
                    <!-- category section  -->
                    <div class="">
                        <Link
                            v-for="c in category"
                            :key="c"
                            :href="route('category#search', c.id)"
                            class="px-1 rounded-top-pill rounded-start-pill py-2 text-center w-100 mb-4 d-block"
                            style="background-color: #e0faff; cursor: pointer"
                        >
                            {{ c.name }}
                        </Link>
                    </div>

                    <!-- category end section  -->
                </div>
                <div class="col-10" style="min-height: calc(100vh - 58.6px)">
                    <!-- latest course section  -->
                    <div class="p-4">
                        <h3
                            class="text-start text-black"
                            style="
                                transform: rotate(-1deg);
                                font-family: 'Roboto Slab', serif;
                            "
                        >
                            Latest Courses
                            <small class="text-info fs-5">Lists</small>
                        </h3>

                        <div
                            class="w-75 bg-info mt-3"
                            style="height: 4px"
                        ></div>

                        <div class="mt-4">
                            <div
                                class="d-flex justify-content-around flex-wrap"
                            >
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
                                            {{
                                                course.description.substring(
                                                    0,
                                                    100
                                                )
                                            }}
                                            ....
                                        </p>
                                        <div
                                            class="d-flex justify-content-between"
                                        >
                                            <div
                                                class="bg-primary rounded-pill px-2 text-white"
                                            >
                                                Like {{ course.likes_count }}
                                            </div>
                                            <div class="text-primary">
                                                {{ course.categoryName }}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-footer text-center">
                                        <Link
                                            :href="
                                                route(
                                                    'course#detail',
                                                    course.id
                                                )
                                            "
                                            class="w-100 rounded-top-pill py-2 bg-info d-block"
                                            style="cursor: pointer"
                                        >
                                            <div class="text-white">
                                                For More Detials
                                            </div>
                                        </Link>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- latest course end section  -->

                    <!-- recommended course section  -->
                    <RecommendCourse
                        class="p-3"
                        :recommendCourse="recommendCourse"
                    ></RecommendCourse>
                    <!-- recommended course end section  -->

                    <!-- footer section  -->
                    <Footer></Footer>
                    <!-- end footer section  -->
                </div>
            </div>
        </UserLayout>
    </div>
</template>

<script setup>
import UserLayout from "./Layout/UserLayout.vue";
import { Link, Head } from "@inertiajs/inertia-vue3";
import RecommendCourse from "../../Components/RecommendCourse.vue";
import Swal from "sweetalert2";
import Footer from "../../Components/Footer.vue";
import { Inertia } from "@inertiajs/inertia";
import { ref, onMounted } from "vue";

window.addEventListener("popstate", function (event) {
    // If the user is leaving the home page, redirect them back to the home page
    if (location.pathname === "/login") {
        Inertia.get("/user/homePage");
    }
});

const props = defineProps({
    category: Object,
    recommendCourse: Object,
    course: Object,
    cart: Object,
    flash: Object,
});
let isDeleting = ref(false);
onMounted(() => {
    if (isDeleting) {
        delete props.flash.profileUpdate;
        delete props.flash.changePasswordSuccess;
    }
});

const profileUpdate = () => {
    Swal.fire("Your Profile Updated!", "" + "", "success").then(() => {
        isDeleting = true;
        delete props.flash.profileUpdate;
        Inertia.reload();
    });
};

const changePasswordSuccess = () => {
    Swal.fire(
        "We've changed your password Successfully!",
        "" + "",
        "success"
    ).then(() => {
        isDeleting = true;
        delete props.flash.changePasswordSuccess;
        Inertia.reload();
    });
};
</script>

<style scoped>
.custom-scroll::-webkit-scrollbar {
    width: 6px;
    height: 6px;
    background-color: #f5f5f5;
}

.custom-scroll::-webkit-scrollbar-thumb {
    border-radius: 10px;
    -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
    background-color: #4f5d7536;
}

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

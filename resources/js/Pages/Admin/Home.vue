<template>
    <Head title="HomePage" />
    <div>
        <AdminLayout>
            <div
                v-if="
                    $page.props.flash.changePasswordSuccess
                        ? changePasswordSuccess()
                        : ''
                "
            ></div>

            <div class="container">
                <div class="col-5 mx-auto mt-2">
                    <form>
                        <div class="input-group">
                            <input
                                type="search"
                                v-model="search"
                                class="form-control rounded rounded-pill btn-outline-info"
                                placeholder="Search with Course Name"
                                aria-label="Search"
                                aria-describedby="search-addon"
                            />
                        </div>
                    </form>
                </div>
                <div class="d-flex justify-content-around flex-wrap mt-5">
                    <div
                        class="card pt-2 mb-4"
                        style="width: 380px"
                        v-for="(course, index) in course"
                        :key="index"
                    >
                        <img
                            :src="`/storage/${course.image}`"
                            style="height: 192px"
                            class="overflow-hidden w-100 pt-2 px-3"
                            alt=""
                        />

                        <div
                            class="d-flex justify-content-between align-items-center mt-2 px-3"
                        >
                            <div class="">
                                <h5 class="fw-bold text-info">
                                    {{ course.name }}
                                </h5>
                            </div>
                            <div class="text-danger">
                                <h6>{{ course.price }} Kyats</h6>
                            </div>
                        </div>

                        <Link
                            preserve-state="true"
                            preserve-scroll="true"
                            @click="handleShowContent(index)"
                            class="px-3"
                            style="color: #bab6b6;min-height: 140px;"
                        >
                            <p>
                                {{ course.description.substring(0, 180) }}....
                            </p>
                        </Link>

                        <div
                            class="d-flex align-items-center justify-content-between px-3"
                        >
                            <div class="">
                                <h6 class="d-inline fw-bold">Category</h6>
                                : <small>{{ course.categoryName }}</small>
                            </div>

                            <div class="">
                                {{ moment(course.created_at).fromNow() }}
                            </div>
                        </div>

                        <div
                            class="card-footer"
                            style="background-color: rgba(244, 244, 244, 0.514)"
                        >
                            <div class="d-flex justify-content-around">
                                <Link
                                    @click="handleShowLike(course.id)"
                                    class="btn btn-primary px-3 d-flex align-items-center"
                                >
                                    <div class="">
                                        <i
                                            class="fa-solid fa-thumbs-up me-2 text-white fs-6"
                                        ></i>
                                    </div>
                                    <div class="fw-bold text-white">
                                        LIKE {{ course.likes_count }}
                                    </div>
                                </Link>
                                <Link
                                    preserve-scroll="true"
                                    preserve-state="true"
                                    @click="handleShowComment(course.id)"
                                    class="btn btn-primary px-3 bg-info d-flex align-items-center"
                                >
                                    <div class="">
                                        <i
                                            class="fa-solid fa-comment me-2 fs-6"
                                        ></i>
                                    </div>
                                    <div class="fw-bold">
                                        Comment {{ course.comments_count }}
                                    </div>
                                </Link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div
                v-if="showContent"
                class="position-fixed translate-middle top-50 start-50 overlay"
            >
                <div
                    class="card px-4 py-3 rounded-5 overflow-auto animate__animated animate__bounceInDown animate__fast"
                    style="width: 500px; max-height: 300px"
                >
                    <div class="fs-5 fw-bolder text-info mb-2">Description</div>
                    <p class="" style="color: #999999">
                        {{ course[showContentId].description }}
                    </p>
                    <div class="d-block">
                        <a
                            @click="showContent = false"
                            class="btn btn-black text-white w-100 mt-3 fw-bold fs-6"
                        >
                            Close
                        </a>
                    </div>
                </div>
            </div>
            <div
                v-if="showLike == true"
                class="position-fixed translate-middle top-50 start-50 overlay"
            >
                <div
                    class="card px-4 py-3 rounded-5 overflow-auto animate__animated animate__bounceInDown animate__fast"
                    style="width: 320px; max-height: 600px"
                >
                    <div
                        class="d-flex align-items-center justify-content-between"
                    >
                        <div class="fs-5 fw-bolder text-info mb-2">
                            Like Lists
                        </div>
                        <Link
                            class="text-black"
                            preserve-state="true"
                            preserve-scroll="true"
                            :href="route('admin#homePage')"
                            style="cursor: pointer"
                        >
                            <i class="fa-solid fa-circle-xmark fs-4"></i>
                        </Link>
                    </div>

                    <div
                        class="d-flex justify-content-start align-items-center mb-3"
                        v-for="(user, index) in likeList"
                        :key="index"
                    >
                        <div
                            class="overflow-hidden rounded-circle shadow-sm"
                            style="width: 50px; height: 50px"
                        >
                            <img
                                v-if="user.userImage == null"
                                class="w-100 h-100"
                                src="/images/defaultUser.jpg"
                                alt=""
                            />
                            <img
                                v-else
                                :src="`/storage/${user.userImage}`"
                                class="w-100 h-100"
                                alt=""
                            />
                        </div>

                        <div class="ms-3 d-flex flex-column">
                            <h6 class="fw-bold m-0 p-0">{{ user.userName }}</h6>
                            <small class="text-secondary"
                                >Make Liked
                                {{ moment(user.created_at).fromNow() }}</small
                            >
                        </div>
                    </div>
                </div>
            </div>
            <div
                v-if="showComment"
                class="position-fixed translate-middle top-50 start-50 overlay"
            >
                <div
                    class="card px-4 py-3 rounded-5 overflow-auto animate__animated animate__bounceInDown animate__fast"
                    style="width: 600px; max-height: 600px"
                >
                    <div
                        class="d-flex align-items-center justify-content-between"
                    >
                        <div class="fs-5 fw-bolder text-info mb-2">
                            Comment Lists
                        </div>
                        <Link
                            preserve-state="true"
                            preserve-scroll="true"
                            class="text-black"
                            :href="route('admin#homePage')"
                            style="cursor: pointer"
                        >
                            <i class="fa-solid fa-circle-xmark fs-4"></i>
                        </Link>
                    </div>

                    <div
                        class="d-flex justify-content-start align-items-start mb-4"
                        v-for="(user, index) in commentList"
                        :key="index"
                    >
                        <div
                            class="overflow-hidden rounded-circle shadow-sm"
                            style="width: 55px; height: 50px"
                        >
                            <img
                                v-if="user.userImage == null"
                                class="w-100 h-100"
                                src="/images/defaultUser.jpg"
                                alt=""
                            />
                            <img
                                v-else
                                :src="`/storage/${user.userImage}`"
                                class="w-100 h-100"
                                alt=""
                            />
                        </div>

                        <div
                            class="w-100 ms-3 d-flex flex-column p-2 rounded-5"
                            style="background-color: whitesmoke"
                        >
                            <h6 class="fw-bold">{{ user.userName }}</h6>
                            <p class="m-0 p-0">{{ user.comment }}</p>
                            <small class="text-secondary text-end">{{
                                moment(user.created_at).fromNow()
                            }}</small>
                        </div>
                    </div>
                </div>
            </div>
            <div
                class="w-50 mx-auto mt-5 p-5 border border-2 border-danger d-flex flex-column justify-content-center align-items-center"
                v-if="course.length == 0"
            >
                <div class="">
                    <i
                        style="font-size: 150px"
                        class="fa-solid fa-magnifying-glass-minus text-danger"
                    ></i>
                    <!-- <i style="font-size: 200px;" class="fa-solid fa-box-open text-danger"></i> -->
                </div>
                <div class="text-danger mt-3">
                    <h4 class="">There is no course with that course name</h4>
                    <p class="text-center fw-bold">
                        Check Again Your Course Name
                    </p>
                </div>
            </div>
        </AdminLayout>
        
    </div>
</template>

<script setup>
import { Head, Link } from "@inertiajs/inertia-vue3";
import AdminLayout from "./Layout/Master.vue";
import Swal from "sweetalert2";
import { ref, watch , onMounted } from "vue";
import moment from "moment";
import { Inertia } from "@inertiajs/inertia";

window.addEventListener("popstate", function (event) {
    // If the user is leaving the home page, redirect them back to the home page
    if (location.pathname === "/login") {
        Inertia.get('/admin/homePage');
    }
});

const props = defineProps({
    course: Object,
    likeList: Object,
    commentList: Object,
    showLike: Object,
    showComment: Object,
    filters: Object,
    flash : Object
});

let showContent = ref(false);
let showContentId = ref(null);
let search = ref(props.filters);
let isDeleting = ref(false);

const changePasswordSuccess = () => {
    Swal.fire("Your Password Changed!", "" + "", "success").then(() => {
        isDeleting = true;
        delete props.flash.changePasswordSuccess;
        Inertia.reload();
    });;
};

onMounted(() => {
    if (isDeleting) {
        delete props.flash.changePasswordSuccess;
    }
});

const handleShowContent = (id) => {
    props.showComment = ref(false);
    props.showLike = ref(false);
    showContentId = id;
    showContent = ref(true);
};

const handleShowLike = (courseId) => {
    Inertia.get(
        `/admin/course/like/${courseId}/list`,
        { preserveState: true },
        { preserveScroll: true }
    );
    showLike = ref(props.showLike);
};

const handleShowComment = (courseId) => {
    Inertia.get(
        `/admin/course/comment/${courseId}/list`,
        { preserveState: true },
        { preserveScroll: true }
    );
    showComment = ref(props.showComment);
};

watch(search, (value) => {
    Inertia.get("/admin/homePage", { search: value }, { preserveState: true });
});
</script>

<style scoped>
.overlay {
    z-index: 9999;
    background-color: rgba(0, 0, 0, 0.5);
    width: 100vw;
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
}
.overlay > * {
    z-index: 10000;
}
</style>

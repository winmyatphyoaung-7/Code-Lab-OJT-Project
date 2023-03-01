<template>
    <Head title="Course Details"></Head>
    <div>
        <UserLayout :cart="cartForNav">
            <div class="container">
                <div class="row mt-2">
                    <div class="">
                        <h3
                            class="text-start text-black"
                            style="
                                transform: rotate(-1deg);
                                font-family: 'Roboto Slab', serif;
                            "
                        >
                            {{ course.name }}
                            <small class="text-info fs-5">Details</small>
                        </h3>
                        <div
                            class="w-75 bg-info mt-3"
                            style="height: 3px"
                        ></div>
                    </div>
                    <div class="col-4 offset-4 mt-3">
                        <img
                            :src="`/storage/${course.image}`"
                            class="w-100"
                            alt=""
                        />
                    </div>
                </div>

                <div class="row my-5">
                    <div class="col-5">
                        <h4
                            class="fw-bold text-white d-inline p-1 rounded-2"
                            style="background-color: #3290ff"
                        >
                            {{ course.name }}
                        </h4>
                        <div
                            class="w-100 bg-info mt-1"
                            style="height: 2px"
                        ></div>

                        <div class="mt-3">
                            <p style="color: #757677">
                                {{ course.description }}
                            </p>
                        </div>
                    </div>
                    <div class="col-5 offset-1">
                        <div class="mt-5 d-flex">
                            <div class="me-3">
                                <span
                                    class="border border-2 p-2 border-info fw-bold"
                                    >Price
                                    <small class="text-warning"
                                        >{{ course.price }}Kyats</small
                                    ></span
                                >
                            </div>

                            <div class="me-3">
                                <span
                                    class="border border-2 p-2 border-info fw-bold"
                                    >Duration
                                    <small class="text-warning"
                                        >{{ course.duration }}months</small
                                    ></span
                                >
                            </div>

                            <div class="me-3">
                                <span
                                    class="border border-2 p-2 border-info fw-bold"
                                    >Start_Date
                                    <small class="text-warning">{{
                                        course.start_date
                                    }}</small></span
                                >
                            </div>
                        </div>

                        <div class="my-5">
                            <h5
                                class="text-center bg-info text-white p-2 rounded-4"
                            >
                                Only (
                                <span class="text-warning">
                                    {{ course.qty }}
                                </span>
                                ) students will be able to submit !
                            </h5>
                        </div>

                        <div class="d-flex justify-content-around">
                            <div
                                @click="handleLike(course.id)"
                                v-if="like.length == 0"
                            >
                                <h6
                                    class="p-3 px-5 text-blue d-inline rounded-5"
                                    style="
                                        background-color: whitesmoke;
                                        border-bottom-left-radius: 40px !important;
                                        border-bottom-right-radius: 35px !important;
                                        border-top-left-radius: 20px !important;
                                        cursor: pointer;
                                    "
                                >
                                    Like <i class="fa-solid fa-thumbs-up"></i>
                                </h6>
                            </div>

                            <div
                                class=""
                                @click="handleUnLike(course.id)"
                                v-else
                            >
                                <h6
                                    class="p-3 px-5 text-white d-inline rounded-5"
                                    style="
                                        background-color: #1511f7;
                                        border-bottom-left-radius: 40px !important;
                                        border-bottom-right-radius: 35px !important;
                                        border-top-left-radius: 20px !important;
                                        cursor: pointer;
                                    "
                                >
                                    Like <i class="fa-solid fa-thumbs-up"></i>
                                </h6>
                            </div>
                            <div
                                v-if="save.length == 0"
                                @click="handleSave(course.id)"
                            >
                                <h6
                                    class="p-3 px-5 text-white d-inline rounded-5"
                                    style="
                                        background-color: skyblue;
                                        border-bottom-left-radius: 40px !important;
                                        border-bottom-right-radius: 35px !important;
                                        border-top-left-radius: 20px !important;
                                        cursor: pointer;
                                    "
                                >
                                    Saved <i class="fa-solid fa-bookmark"></i>
                                </h6>
                            </div>

                            <div v-else @click="handleUnSave(course.id)">
                                <h6
                                    class="p-3 px-5 text-white d-inline rounded-5"
                                    style="
                                        background-color: skyblue;
                                        border-bottom-left-radius: 40px !important;
                                        border-bottom-right-radius: 35px !important;
                                        border-top-left-radius: 20px !important;
                                        cursor: pointer;
                                    "
                                >
                                    Unsaved <i class="fa-solid fa-bookmark"></i>
                                </h6>
                            </div>
                            <Link
                                v-if="cart.length == 0 && laterCart.length == 0"
                                @click="handleAddToCart(course.id)"
                            >
                                <h6
                                    class="p-3 px-4 text-white d-inline rounded-5"
                                    style="
                                        background-color: #a435f0;
                                        border-bottom-left-radius: 40px !important;
                                        border-bottom-right-radius: 35px !important;
                                        border-top-left-radius: 20px !important;
                                        cursor: pointer;
                                    "
                                >
                                    Add To Cart
                                    <i class="fas fa-shopping-cart"></i>
                                </h6>
                            </Link>
                            <Link v-else :href="route('cart#page')">
                                <h6
                                    class="p-3 px-4 text-white d-inline rounded-5"
                                    style="
                                        background-color: #a435f0;
                                        border-bottom-left-radius: 40px !important;
                                        border-bottom-right-radius: 35px !important;
                                        border-top-left-radius: 20px !important;
                                        cursor: pointer;
                                    "
                                >
                                    Go To Cart
                                    <i class="fas fa-shopping-cart"></i>
                                </h6>
                            </Link>
                        </div>
                    </div>
                </div>

                <div class="row py-5">
                    <div class="col-4">
                        <div class="text-end">
                            <textarea
                                class="form-control btn-outline-info"
                                style="outline: none"
                                cols="30"
                                rows="10"
                                v-model="form.comment"
                            ></textarea>

                            <Link
                                @click="handleComment(course.id)"
                                class="btn btn-info mt-3 px-5"
                                >Comment</Link
                            >
                        </div>
                    </div>

                    <div class="col-8">
                        <div class="py-2 bg-info rounded-top-2">
                            <h5 class="text-white p-0 m-0 ms-3 fw-bold">
                                Reviews ({{ comment.length }})
                            </h5>
                        </div>
                        <div
                            class="border border-1 p-3"
                            v-for="(comment, index) in comment"
                            :key="index"
                        >
                            <div class="d-flex align-items-center">
                                <div class="d-flex">
                                    <div class="me-2">
                                        <img
                                            v-if="comment.userImage == null"
                                            src="/images/defaultUser.jpg"
                                            class="rounded-circle shadow-sm"
                                            style="width: 40px; height: 40px"
                                            alt=""
                                        />
                                        <img
                                            v-else
                                            :src="`/storage/${comment.userImage}`"
                                            class="rounded-circle shadow-sm"
                                            style="width: 40px; height: 40px"
                                            alt=""
                                        />
                                    </div>

                                    <div
                                        v-if="editComment != index"
                                        class="card px-3 py-2"
                                    >
                                        <div class="">
                                            <h6 class="fw-bold text-black">
                                                {{ comment.userName }}
                                            </h6>
                                        </div>
                                        <p class="m-0">
                                            {{ comment.comment }}
                                        </p>
                                        
                                    </div>

                                    <div v-else class="">
                                        <input
                                            type="text"
                                            @keyup.enter="
                                                handleUpdateComment(comment.id)
                                            "
                                            class="form-control"
                                            v-model="form.editComment"
                                            ref="editCommentInput"
                                        />
                                    </div>
                                </div>
                                <div v-if="$page.props.auth.user.id == comment.user_id" class="ms-3">
                                    <div class="dropdown">
                                        <button
                                            class="m-0 p-0 btn btn-secondary rounded-circle d-flex justify-content-center align-items-center"
                                            style="width: 37px; height: 37px"
                                            type="button"
                                            data-bs-toggle="dropdown"
                                            aria-expanded="false"
                                        >
                                            <i class="fa-solid fa-ellipsis"></i>
                                        </button>
                                        <ul
                                            class="dropdown-menu"
                                            style="background-color: #f9feff"
                                        >
                                            <li>
                                                <Link 
                                                    @click="
                                                        handleEditComment(
                                                            index,
                                                            comment.comment
                                                        )
                                                    "
                                                    preserve-scroll="true"
                                                    preserve-state="true"
                                                    class="dropdown-item"
                                                >
                                                    <i
                                                        class="fa-solid fa-pencil me-2"
                                                    ></i
                                                    >Edit</Link
                                                >
                                            </li>

                                            <li>
                                                <Link 
                                                    class="dropdown-item"
                                                    :href="
                                                        route(
                                                            'comment#delete',
                                                            comment.id
                                                        )
                                                    "
                                                    preserve-scroll="true"
                                                >
                                                    <i
                                                        class="fa-solid fa-trash me-2"
                                                    ></i
                                                    >Delete</Link
                                                >
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                       
                    </div>
                </div>
            </div>
        </UserLayout>
    </div>
</template>

<script setup>
import { Link, Head, useForm } from "@inertiajs/inertia-vue3";
import UserLayout from "../Layout/UserLayout.vue";
import { Inertia } from "@inertiajs/inertia";
import { ref, nextTick , onMounted } from "vue";

let editComment = ref(null);
const editCommentInput = ref(null);

const props = defineProps({
    course: Object,
    like: Object,
    save: Object,
    cart: Object,
    laterCart: Object,
    cartForNav: Object,
    comment: Object,
});

const form = useForm({
    comment: "",
    editComment: "",
});

const handleLike = (id) => {
    Inertia.post(
        `/user/course/like/${id}`,
        { value: 1 },
        { preserveScroll: true }
    );
};

const handleUnLike = (id) => {
    Inertia.post(
        `/user/course/like/${id}`,
        { value: 0 },
        { preserveScroll: true }
    );
};

const handleSave = (id) => {
    Inertia.post(
        `/user/course/save/${id}`,
        { value: 1 },
        { preserveScroll: true }
    );
};

const handleUnSave = (id) => {
    Inertia.post(
        `/user/course/save/${id}`,
        { value: 0 },
        { preserveScroll: true }
    );
};

const handleAddToCart = (id) => {
    Inertia.get(`/user/add/cart/${id}`, { preserveScroll: true });
};

const handleComment = (id) => {
    form.post(route("course#comment", id), { preserveScroll: true });

    form.comment = "";
};

const handleEditComment = (id, comment) => {
    editComment = id;
    form.editComment = comment;

    nextTick(() => {
        editCommentInput.value[0].focus(); 
    });
};

const handleUpdateComment = (id) => {
    form.post(
        `/user/comment/update/${id}`,{
            preserveScroll : true,
            preserveState : true
        }
    );
    editComment = null;
};
</script>

<style scoped></style>

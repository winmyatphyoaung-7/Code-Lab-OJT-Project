<template>
    <Head title="Cart Page" />
    <div>
        <UserLayout :cart="cart">
            <div class="container mt-3">
                <div class="mb-3">
                    <h2 class="text-info fw-bold">Shopping Cart</h2>
                </div>

                <div class="row mt-5 pb-5">
                    <div class="col-8">
                        <div class="fw-bolder text-black fs-6">
                            {{ cart.length }} Courses in Cart
                        </div>

                        <div
                            class="border border-1 border-secondary p-5 text-center animate__animated animate__fadeIn animate_slow"
                            v-if="cart.length == 0"
                        >
                            <div class="text-center mb-4">
                                <i
                                    class="fa-solid fa-cart-shopping"
                                    style="font-size: 200px; color: #c9c9c9"
                                ></i>
                            </div>

                            <div class="text-center text-danger fw-bold">
                                Your cart is empty. Keep Shopping to find a
                                course!
                            </div>

                            <Link
                                :href="route('user#homePage')"
                                class="btn btn-info mt-4 fs-6"
                            >
                                Keep Shopping
                            </Link>
                        </div>

                        <div
                            class="animate__animated animate__fadeIn animate_slow"
                            v-for="cart in cart"
                            :key="cart"
                        >
                            <hr class="m-0 mb-4 mt-2" />

                            <div class="d-flex justify-content-between">
                                <div class="d-flex">
                                    <div
                                        class="overflow-hidden"
                                        style="width: 150px; height: 100px"
                                    >
                                        <img
                                            class="w-100"
                                            :src="`/storage/${cart.image}`"
                                            alt=""
                                        />
                                    </div>

                                    <div class="ms-3">
                                        <h4 class="fw-bold text-black">
                                            {{ cart.name }}
                                        </h4>
                                        <small class="me-2"
                                            ><i class="fa-regular fa-clock"></i>
                                            {{ cart.duration }} Months</small
                                        >
                                        <small class="me-2"
                                            ><i
                                                class="fa-solid fa-graduation-cap"
                                            ></i>
                                            {{ cart.qty }} Students</small
                                        >
                                        <small
                                            ><i
                                                class="fa-regular fa-calendar"
                                            ></i>
                                            {{ cart.start_date }}</small
                                        >
                                        <p class="fw-bold">
                                            Category :
                                            <small class="fw-normal fs-6">{{
                                                cart.categoryName
                                            }}</small>
                                        </p>
                                    </div>
                                </div>

                                <div class="d-flex flex-column">
                                    <Link
                                        preserveScroll="true"
                                        :href="route('cart#remove', cart.id)"
                                        class="mb-2"
                                        ><i
                                            class="fa-regular fa-trash-can me-2"
                                        ></i
                                        >Remove</Link
                                    >
                                    <Link
                                        preserveScroll="true"
                                        :href="
                                            route('cart#saveForLater', cart.id)
                                        "
                                        ><i class="fa-solid fa-share me-2"></i
                                        >Save For Later</Link
                                    >
                                </div>

                                <div class="">
                                    <h6 class="text-info fw-bold">
                                        <i
                                            class="fa-solid fa-sack-dollar me-2"
                                        ></i
                                        >{{ cart.price }} Kyats
                                    </h6>
                                </div>
                            </div>
                        </div>

                        <div
                            class="fw-bolder mt-5 text-black fs-6"
                            v-if="saveForLater.length > 0"
                        >
                            Save for later
                        </div>

                        <div
                            class="animate__animated animate__fadeIn animate_slow"
                            v-if="saveForLater.length > 0"
                            v-for="cart in saveForLater"
                            :key="cart"
                        >
                            <hr class="m-0 mb-4 mt-2" />

                            <div class="d-flex justify-content-between">
                                <div class="d-flex">
                                    <div
                                        class="overflow-hidden"
                                        style="width: 150px; height: 100px"
                                    >
                                        <img
                                            class="w-100"
                                            :src="`/storage/${cart.image}`"
                                            alt=""
                                        />
                                    </div>

                                    <div class="ms-3">
                                        <h4 class="fw-bold text-black">
                                            {{ cart.name }}
                                        </h4>
                                        <small class="me-2"
                                            ><i class="fa-regular fa-clock"></i>
                                            {{ cart.duration }} Months</small
                                        >
                                        <small class="me-2"
                                            ><i
                                                class="fa-solid fa-graduation-cap"
                                            ></i>
                                            {{ cart.qty }} Students</small
                                        >
                                        <small
                                            ><i
                                                class="fa-regular fa-calendar"
                                            ></i>
                                            {{ cart.start_date }}</small
                                        >
                                        <p class="fw-bold">
                                            Category :
                                            <small class="fw-normal fs-6">{{
                                                cart.categoryName
                                            }}</small>
                                        </p>
                                    </div>
                                </div>

                                <div class="d-flex flex-column">
                                    <Link
                                        preserveScroll="true"
                                        :href="route('laterCart#remove', cart.id)"
                                        class="mb-2"
                                        ><i
                                            class="fa-regular fa-trash-can me-2"
                                        ></i
                                        >Remove</Link
                                    >
                                    <Link
                                        preserveScroll="true"
                                        :href="
                                            route('cart#moveToCart', cart.id)
                                        "
                                        ><i
                                            class="fa-solid fa-arrow-rotate-left me-2"
                                        ></i
                                        >Move To Cart</Link
                                    >
                                </div>

                                <div class="">
                                    <h6 class="text-info fw-bold">
                                        <i
                                            class="fa-solid fa-sack-dollar me-2"
                                        ></i
                                        >{{ cart.price }} Kyats
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-3 offset-1">
                        <small class="fw-bold fs-6">Total:</small>

                        <div class="mt-2">
                            <h3 class="fw-bolder text-black">
                                <i class="fa-solid fa-coins me-2"></i
                                >{{ total }} Kyats
                            </h3>
                            <p>
                                <span class="fw-bold">Items</span> : ({{
                                    cart.length
                                }})
                            </p>
                        </div>

                        <Link :href="route('course#checkout')" class="btn btn-info text-white w-100 fs-5">
                            CHECKOUT
                        </Link>
                        <hr />
                    </div>
                </div>

                <!-- recommended course section  -->
                <RecommendCourse :recommendCourse="recommendCourse" />
                <!-- recommended course end section  -->
            </div>

            <!-- Footer section start  -->
            <Footer></Footer>
            <!-- Footer section end  -->
        </UserLayout>
    </div>
</template>

<script setup>
import UserLayout from "../Layout/UserLayout.vue";
import { Link, Head } from "@inertiajs/inertia-vue3";
import RecommendCourse from "../../../Components/RecommendCourse.vue";
import { computed } from "vue";
import Footer from "../../../Components/Footer.vue";

const props = defineProps({
    recommendCourse: Object,
    cart: Object,
    saveForLater: Object,
});

const total = computed(() => {
    let total = 0;
    props.cart.forEach((c) => {
        total += Number(c.price);
    });
    if (total > 0) {
        return total;
    }

    return 0;
});
</script>

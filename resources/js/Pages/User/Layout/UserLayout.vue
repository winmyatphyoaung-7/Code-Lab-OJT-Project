<template>
    <div
        v-if="showMenu"
        @click="showMenu = false"
        class="position-fixed top-0 w-100 h-100 bg-black"
        :class="[
            showMenu ? 'animate__animated animate__fadeIn animate__faster' : '',
        ]"
    ></div>
    <div
        :class="showMenu ? 'backdrop-blur' : ''"
        style="background-color: #f9feff; min-height: 100vh"
    >
        <!-- nav bar section  -->
        <nav
            class="navbar navbar-expand-lg p-1 position-sticky top-0 left-0"
            style="background-color: #fff9fe; z-index: 100"
        >
            <div
                class="container-fluid d-flex justify-between align-items-center mx-4"
            >
                <div class="">
                    <Link
                        class="navbar-brand border rounded-4 border-2 shadow-sm"
                        style="
                            font-family: 'Pacifico', cursive;
                            border-color: black !important;
                        "
                        :href="route('user#homePage')"
                        >Signature Of Seven</Link
                    >
                </div>

                <div class="d-flex">
                    <Link class="me-5" :href="route('cart#page')">
                        <div class="position-relative">
                            <i
                                class="fa-solid fa-cart-shopping text-black"
                                style="font-size: 18px"
                            ></i>
                            <span
                                v-if="cart.length > 0"
                                class="position-absolute top-0 start-100 translate-middle d-flex justify-content-center align-items-center bg-info text-white rounded-circle"
                                style="
                                    width: 20px;
                                    height: 20px;
                                    font-size: 12px;
                                "
                            >
                                {{ cart.length }}
                            </span>
                        </div>
                    </Link>
                    <a style="cursor: pointer" @click.prevent="showMenu = true"
                        ><i class="fa-solid fa-gear me-2"></i>Setting</a
                    >
                </div>
            </div>
        </nav>

        <!-- nav bar section end  -->

        <div class="">
            <slot />
        </div>
    </div>

    <!-- setting section start  -->
    <div
        v-if="showMenu"
        class="position-fixed top-0 end-0 z-10 shadow-sm bg-white w-25 h-100 animate__animated animate__slideInRight"
    >
        <div class="">
            <div
                class="text-white p-2 d-flex justify-start align-items-center"
                style="background-color: #232f3e"
            >
                <div
                    class="me-4"
                    @click="showMenu = false"
                    style="cursor: pointer"
                >
                    <i class="fa-solid fa-xmark fs-4"></i>
                </div>
                <div class="">
                    <h5 class="text-center fw-bold">
                        <span class="text-info">Hello! , </span>
                        {{ $page.props.auth.user.name }}
                    </h5>
                </div>
            </div>

            <div class="mt-3">
                <div class="d-flex justify-content-center">
                    <div
                        class="overflow-hidden shadow rounded-circle"
                        style="width: 140px; height: 130px"
                    >
                        <img
                            v-if="$page.props.auth.user.image == null"
                            class="w-100 h-100"
                            src="/images/defaultUser.jpg"
                            alt=""
                        />
                        <img
                            v-else
                            class="w-100 h-100"
                            :src="`/storage/${$page.props.auth.user.image}`"
                            alt=""
                        />
                    </div>
                </div>

                <div class="mt-3 text-center">
                    <small class="fw-bold fs-6">{{
                        $page.props.auth.user.email
                    }}</small>
                </div>

                <div class="mt-2 d-flex justify-content-around">
                    <small class="text-secondary fw-bold">
                        <i class="fa-solid fa-phone me-1"></i
                        >{{ $page.props.auth.user.phone }}</small
                    >
                    <small class="text-secondary fw-bold">
                        <i class="fa-solid fa-venus-mars me-1"></i
                        >{{ $page.props.auth.user.gender }}</small
                    >
                    <small class="text-secondary fw-bold">
                        <i class="fa-solid fa-location-dot me-1"></i
                        >{{ $page.props.auth.user.address }}</small
                    >
                </div>
            </div>

            <div class="d-flex align-items-center flex-column pt-5 mt-3">
                <div
                    class="text-center text-white py-2 w-75 rounded-top-3 mb-3"
                    style="background-color: #232f3e"
                >
                    <div
                        class="d-flex align-items-center justify-content-start"
                    >
                        <div class="ms-3"><i class="fa-solid fa-user"></i></div>
                        <Link
                            :href="route('user#profileEditPage')"
                            class="text-center text-white w-75"
                            >Edit profile</Link
                        >
                    </div>
                </div>
                <div
                    class="text-center text-white py-2 w-75 mb-3"
                    style="background-color: #232f3e"
                >
                    <div
                        class="d-flex align-items-center justify-content-start"
                    >
                        <div class="ms-3">
                            <i class="fa-solid fa-bookmark"></i>
                        </div>
                        <Link
                            :href="route('user#savePage')"
                            :preserve-scroll="true"
                            class="text-center text-white w-75"
                            >Save</Link
                        >
                    </div>
                </div>

                <div
                    class="text-center text-white py-2 w-75 mb-3"
                    style="background-color: #232f3e"
                >
                    <Link
                        :href="route('user#changePasswordPage')"
                        class="d-flex align-items-center justify-content-start text-white"
                    >
                        <div class="ms-3"><i class="fa-solid fa-lock"></i></div>
                        <div class="text-center w-75">Change Password</div>
                    </Link>
                </div>

                <div
                    class="text-center text-white py-2 w-75 mb-3"
                    style="background-color: #232f3e"
                >
                    <Link
                        :href="route('user#contactPage')"
                        class="d-flex align-items-center justify-content-start text-white"
                    >
                        <div class="ms-3"><i class="fa-solid fa-message"></i></div>
                        <div class="text-center w-75">Contact Us</div>
                    </Link>
                </div>

                <div
                    class="text-center text-white py-2 w-75 mb-3 rounded-bottom-3"
                    style="background-color: #232f3e"
                >
                    <div
                        class="d-flex align-items-center justify-content-start"
                    >
                        <div class="ms-3">
                            <i class="fa-solid fa-share-from-square"></i>
                        </div>
                        <Link
                            :href="route('auth#logout')"
                            class="text-center w-75 text-white"
                            >Logout</Link
                        >
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- setting section end  -->
</template>

<script setup>
import { Head, Link } from "@inertiajs/inertia-vue3";
import { ref } from "vue";

let showMenu = ref(false);

const props = defineProps({
    cart: Object,
});
</script>

<style>
@import url("https://fonts.googleapis.com/css2?family=Pacifico&display=swap");

* {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}

.backdrop-blur {
    opacity: 0.2;
}

::-webkit-scrollbar {
    width: 5px;
}
::-webkit-scrollbar-track {
    background-color: #eee;
}
::-webkit-scrollbar-thumb {
    background-color: #60d9f1;
    box-shadow: 0 -100vh 0 100vh #00d5ff, 0 0 15px 5px black;
}

.navbar-brand {
    animation: text-color 6s infinite;
    background: linear-gradient(to right, rgb(255, 104, 104) 20%, #68e2fa );
}

@keyframes text-color {
    0% {
        background: linear-gradient(to right, rgb(255, 109, 109) 20%, #68e2fa );
    }
    20% {
        background: linear-gradient(to right, rgb(137, 255, 113) 20%, #68e2fa);
    }

    40% {
        background: linear-gradient(to right, rgb(227, 255, 114) 20%, #68e2fa);
    }
    60% {
        background: linear-gradient(to right, rgb(149, 131, 255) 20%, #68e2fa);
    }
    80% {
        background: linear-gradient(to right, rgb(255, 104, 187) 20%, #68e2fa);
    }

    100% {
        background: linear-gradient(to right, rgb(255, 176, 91) 20%, #68e2fa);
    }
}
</style>

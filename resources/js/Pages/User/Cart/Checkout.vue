<template>
    <Head title="Checkout Success" />
    <div>
        <div
            class="container"
            style="
                background-color: #f9feff;
                min-height: 100vh;
                max-width: 100vw;
            "
        >
            <div class="d-flex flex-column justify-content-center  align-items-center" style="height: 100vh;">
                <div class="">
                    <div class="">
                        <h3
                            class="text-start text-success fw-bold"
                            
                        >
                            Checkout
                            <small class="text-black fs-5">Success</small>
                        </h3>
                    </div>
                    <div class="p-5 bg-white text-center rounded-3" style="width: 537px">
                        <div class="d-flex flex-column align-items-center">
                            <div class="d-flex justify-content-center align-items-center p-4 rounded-circle" style="background-color: whitesmoke;">
                                <i class="fa-solid fa-check animate__animated animate__heartBeat animate__slow" style="font-size: 90px;color: #00e81b;font-weight: 700;"></i>
                            </div>
                            <div class="text-black mt-3">
                                <h2 class="">Success</h2>
                            </div>
                        </div>

                        <div class="fw-bold">
                            <p>Your shopping has been done successfully!!!</p>
                        </div>

                        <div class="">
                            <Link :href="route('user#homePage')" class="btn btn-success w-100 py-2 fs-5 fw-bold">
                            Home</Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { Link , Head } from '@inertiajs/inertia-vue3';
</script>

<style scoped></style>

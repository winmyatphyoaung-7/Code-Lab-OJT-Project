<template>
    <Head title="Change Password Page" />
    <div>
        <div class="container">
            <div
                class="row d-flex justify-content-center align-items-center"
                style="height: 100vh"
            >
                <div class="card pt-2 pb-4 w-50 px-5">
                    <div
                        class="card-header pb-1 text-center"
                        style="background-color: transparent"
                    >
                        <div class="d-flex align-items-center">
                            <div class="">
                                <a onclick="history.back()">
                                    <i
                                        class="fa-solid fa-circle-left text-black fs-2"
                                    ></i>
                                </a>
                            </div>
                            <div style="margin-left: 130px">
                                <h4
                                    class="text-start text-black"
                                    style="
                                        transform: rotate(-1deg);
                                        font-family: 'Roboto Slab', serif;
                                    "
                                >
                                    Change Password
                                    <small class="text-info fs-5">Page</small>
                                </h4>
                            </div>
                        </div>
                    </div>

                    <div v-if="$page.props.flash.wrongPassword"
                        class="col-12 mt-2 mb-0 alert alert-warning alert-dismissible fade show"
                        role="alert"
                    >
                        <strong><i class="fa-solid fa-trash-check"></i></strong>
                        {{$page.props.flash.wrongPassword}}
                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="alert"
                            aria-label="Close"
                        ></button>
                    </div>

                    <form
                        @submit.prevent="
                            form.post(route('user#changePassword'))
                        "
                    >
                        <div class="mt-3">
                            <label for="">Old Password</label>
                            <input
                                type="password"
                                class="form-control mb-0"
                                :class="
                                    form.errors.oldPassword
                                        ? 'btn-outline-danger'
                                        : 'btn-outline-info'
                                "
                                v-model="form.oldPassword"
                                placeholder="Enter your old password..."
                            />
                            <small
                                class="text-danger"
                                v-if="form.errors.oldPassword"
                                >{{ form.errors.oldPassword }}</small
                            >
                        </div>

                        <div class="mt-3">
                            <label for="">New Password</label>
                            <input
                                type="password"
                                class="form-control mb-0"
                                :class="
                                    form.errors.password
                                        ? 'btn-outline-danger'
                                        : 'btn-outline-info'
                                "
                                v-model="form.password"
                                placeholder="Enter your new password..."
                            />
                            <small
                                class="text-danger"
                                v-if="form.errors.password"
                                >{{ form.errors.password }}</small
                            >
                        </div>

                        <div class="mt-4">
                            <label for="">Confirm New Password</label>
                            <input
                                type="password"
                                class="form-control mb-0"
                                :class="
                                    form.errors.confirmPassword
                                        ? 'btn-outline-danger'
                                        : 'btn-outline-info'
                                "
                                v-model="form.confirmPassword"
                                placeholder="Enter your confirm new password..."
                            />
                            <small
                                class="text-danger"
                                v-if="form.errors.confirmPassword"
                                >{{ form.errors.confirmPassword }}</small
                            >
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="mt-5">
                                    <button
                                        class="btn btn-lg-square w-100 fs-5 btn-info"
                                    >
                                        Confirm
                                    </button>
                                </div>
                            </div>
                        </div>
                        {{ fail }}
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";

const form = useForm({
    oldPassword: "",
    password: "",
    confirmPassword: "",
});
</script>

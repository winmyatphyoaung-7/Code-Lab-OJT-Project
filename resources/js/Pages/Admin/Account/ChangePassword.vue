<template>
    <Head title="Change Password" />
    <div>
        <AdminLayout>
            <div class="container">
                <div class="row d-flex justify-content-center align-items-center" style="height: 90vh;">
                    <div class="card p-5 pt-3 col-6">
                        <div class="card-header text-center">
                            <h4
                                class=" text-center text-black"
                                style="
                                    transform: rotate(-1deg);
                                    font-family: 'Roboto Slab', serif;
                                "
                            >
                            Change <small class="text-info fs-5">Your Password</small>
                            </h4>
                        </div>

                        <div v-if="$page.props.flash.notMatch" class="">
                            <div class="col-12 alert alert-warning alert-dismissible fade show" role="alert">
                                <strong><i class="fa-solid fa-trash-check"></i></strong> {{ $page.props.flash.notMatch }}
                                
                            </div>
                        </div>

                        <form @submit.prevent="form.post(route('admin#changePassword'))">
                            <div class="mt-1">
                                <label class="fw-bold">Old Password</label>
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
                                <label class="fw-bold">New Password</label>
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
                                <label class="fw-bold">Confirm New Password</label>
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
                        </form>
                    </div>
                </div>
            </div>
        </AdminLayout>
    </div>
</template>

<script setup>
import { Link, Head, useForm } from "@inertiajs/inertia-vue3";
import AdminLayout from "../Layout/Master.vue";


const form = useForm({
    oldPassword: "",
    password: "",
    confirmPassword: "",
});


</script>

<style scoped>

</style>

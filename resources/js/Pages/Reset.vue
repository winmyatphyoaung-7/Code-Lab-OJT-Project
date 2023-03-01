<template>
    <Head title="Reset Password" />
    <div style="background-color: #d0eaff; min-height: 100vh">
        <div class="container pt-5">
            <div class="row">
                <div class="col-4 mx-auto card p-4" style="margin-top: 45px">
                    <h4>Reset Password</h4>
                    <hr />

                    <form
                        @submit.prevent="form.post(route('reset#password'))"
                        autocomplete="off"
                    >
                        <div v-if="$page.props.flash.fail" class="alert alert-danger">
                            {{ $page.props.flash.fail }}
                        </div>

                        
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input
                                type="text"
                                class="form-control"
                                :class="
                                    form.errors.email
                                        ? 'btn-outline-danger'
                                        : 'btn-outline-info'
                                "
                                v-model="form.email"
                                placeholder="Enter your email"
                                disabled
                            />
                            <small
                                class="text-danger"
                                v-if="form.errors.email"
                                >{{ form.errors.email }}</small
                            >
                        </div>

                        <div class="form-group mt-3">
                            <label for="password">Password</label>
                            <input
                                type="password"
                                class="form-control"
                                :class="
                                    form.errors.password
                                        ? 'btn-outline-danger'
                                        : 'btn-outline-info'
                                "
                                v-model="form.password"
                                placeholder="Enter your password"
                            />
                            <small
                                class="text-danger"
                                v-if="form.errors.password"
                                >{{ form.errors.password }}</small
                            >
                        </div>

                        <div class="form-group mt-3">
                            <label for="password">Confirm Password</label>
                            <input
                                type="password"
                                class="form-control"
                                :class="
                                    form.errors.password_confirmation
                                        ? 'btn-outline-danger'
                                        : 'btn-outline-info'
                                "
                                v-model="form.password_confirmation"
                                placeholder="Enter password confirm"
                            />
                            <small
                                class="text-danger"
                                v-if="form.errors.password_confirmation"
                                >{{ form.errors.password_confirmation }}</small
                            >
                        </div>

                        <div class="form-group mt-2">
                            <button type="submit" class="btn btn-primary">
                                Reset Password
                            </button>
                        </div>

                        <br />

                        <Link :href="route('auth#loginPage')">Login</Link>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";

const props = defineProps({
    token: Object,
    email: Object,
});

const form = useForm({
    email: props.email,
    password: "",
    password_confirmation: "",
    token : props.token
});
</script>

<style lang="scss" scoped></style>

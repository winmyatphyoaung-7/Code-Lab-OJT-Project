<template>
    <Head title="Login" />
    <div>
        <div class="container-fluid">
            <div
                class="row vh-100 d-flex justify-content-center align-items-center bg-sm-color"
                style="background-color: #d0eaff"
            >
                <div class="col-md-8 col-sm-12">
                    <div class="row bg-white p-5 rounded shadow-md">
                        <div class="col-lg-12 col-xl-6">
                            <div class="col-12 text-center mb-5">
                                <h2>Welcome!</h2>
                            </div>

                            <div
                                v-if="$page.props.flash.wrongPassword"
                                class="alert alert-danger d-flex align-items-center"
                                role="alert"
                            >
                            <i class="fa-solid fa-exclamation me-3 fa-2x text-danger"></i>
                                <div>
                                    {{ $page.props.flash.wrongPassword }}
                                </div>
                            </div>

                            <div
                                v-if="$page.props.flash.clickEmail"
                                class="alert alert-info d-flex align-items-center"
                                role="alert"
                            >
                            <i class="fa-solid fa-exclamation me-3 fa-2x text-info"></i>
                                <div>
                                    {{ $page.props.flash.clickEmail }}
                                </div>
                            </div>

                            <div
                                v-if="$page.props.flash.emailVerified"
                                class="alert alert-info d-flex align-items-center"
                                role="alert"
                            >
                            <i class="fa-solid fa-check me-3 fa-2x text-info"></i>
                                <div>
                                    {{ $page.props.flash.emailVerified }}
                                </div>
                            </div>

                            <div
                                v-if="$page.props.flash.alreadyVerified"
                                class="alert alert-info d-flex align-items-center"
                                role="alert"
                            >
                            <i class="fa-solid fa-check me-3 fa-2x text-info"></i>
                                <div>
                                    {{ $page.props.flash.alreadyVerified }}
                                </div>
                            </div>


                            <form @submit.prevent="submit" autocomplete="off" autosave="off">
                                <div class="from-group mb-2">
                                    <label for="forEmail">Email</label>
                                    <input
                                        type="email"
                                        v-model="form.email"
                                        class="form-control mt-1"
                                        id="forEmail"
                                    />
                                    <small
                                        class="text-danger"
                                        v-if="form.errors.email"
                                        >{{ form.errors.email }}</small
                                    >
                                </div>

                                <div class="from-group mb-2">
                                    <label for="forPassword">Password</label>
                                    <input
                                        type="password"
                                        v-model="form.password"
                                        class="form-control mt-1"
                                        id="forPassword"
                                    />
                                    <small
                                        class="text-danger"
                                        v-if="form.errors.password"
                                        >{{ form.errors.password }}</small
                                    >
                                </div>

                                <div class="from-group mb-3">
                                    <div
                                        class="row d-flex justify-content-between align-items-center"
                                    >
                                        <div class="col-md-6 col-12">
                                            <input
                                                type="checkbox"
                                                class="form-check-input"
                                                name=""
                                                id="forCheckbox"
                                            />
                                            <label
                                                for="forCheckbox"
                                                class="form-check-label"
                                                >Remember Me</label
                                            >
                                        </div>
                                        <div
                                            class="col-md-6 col-12 mt-md-0 mt-sm-1"
                                        >
                                            <Link
                                                :href="route('forget#passwordForm')"
                                                class="text-decoration-none"
                                            >
                                                Forget Password?
                                            </Link>
                                        </div>
                                    </div>

                                    <div class="col-10 offset-1 mt-4">
                                        <button
                                            type="submit"
                                            class="btn w-100 py-2 btn-md btn-primary"
                                        >
                                            <strong>Login</strong>
                                        </button>
                                    </div>
                                </div>
                            </form>

                            <hr />

                            <div class="text-center">
                                <small>
                                    Don't have an account?
                                    <Link
                                        :href="route('auth#registerPage')"
                                        :method="get"
                                        class="ms-1"
                                        >Register</Link
                                    >
                                </small>
                            </div>
                        </div>
                        <div class="col-xl-5 d-image-none offset-xxl-1">
                            <img
                                src="images/undraw_access_account_re_8spm.svg"
                                class="img-fluid"
                                alt=""
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";

const form = useForm({
    email: "",
    password: "",
});

function submit() {
    form.post(route("auth#login"), {
        onFinish: () => form.reset("password"),
    });
}
</script>

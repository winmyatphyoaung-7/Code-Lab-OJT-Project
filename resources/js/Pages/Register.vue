<template>
    <div>
        <Head title="Register" />
        <div class="container-fluid">
            <div
                class="row d-flex justify-content-center align-items-center bg-sm-color"
                style="background-color: #d0eaff"
            >
                <div class="col-md-8 col-lg-5 col-xl-4 col-sm-12 my-5">
                    <div class="row bg-white p-4 rounded shadow-md">
                        <div class="d-flex justify-content-center mb-5">
                            <div class="">
                                <h3 class="ms-3" style="color: gray">
                                    Registration Form
                                </h3>
                            </div>
                        </div>

                        <form @submit.prevent="submit">
                            <div class="d-flex align-items-center mb-3">
                                <div style="width: 60px">
                                    <i
                                        class="fa-solid fa-user icon-register"
                                        style="color: gray"
                                    ></i>
                                </div>
                                <div class="w-100">
                                    <div class="form-floating">
                                        <input
                                            type="text"
                                            v-model="form.name"
                                            class="form-control"
                                            id="floatingInput"
                                            placeholder="name@example.com"
                                        />
                                        <label for="floatingInput"
                                            >UserName</label
                                        >
                                    </div>

                                    <small class="text-danger" v-if="form.errors.name">{{ form.errors.name }}</small>
                                </div>
                            </div>

                            <div class="d-flex align-items-center mb-3">
                                <div style="width: 60px">
                                    <i
                                        class="fa-solid fa-envelope icon-register"
                                        style="color: gray"
                                    ></i>
                                </div>

                                <div class="w-100">
                                    <div class="form-floating">
                                        <input
                                            type="email"
                                            v-model="form.email"
                                            class="form-control"
                                            id="floatingInput"
                                            placeholder="name@example.com"
                                        />
                                        <label for="floatingInput">Email</label>
                                    </div>

                                    <small class="text-danger" v-if="form.errors.email">{{ form.errors.email }}</small>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-3">
                                <div style="width: 60px">
                                    <i
                                        class="fa-solid fa-phone icon-register"
                                        style="color: gray"
                                    ></i>
                                </div>

                                <div class="w-100">
                                    <div class="form-floating">
                                        <input
                                            type="text"
                                            v-model="form.phone"
                                            class="form-control"
                                            id="floatingInput"
                                            placeholder="09 - 0000000000"
                                        />
                                        <label for="floatingInput">Phone</label>
                                    </div>

                                    <small class="text-danger" v-if="form.errors.phone">{{ form.errors.phone }}</small>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-3">
                                <div style="width: 60px">
                                    <i
                                        class="fa-solid fa-location-dot icon-register"
                                        style="color: gray"
                                    ></i>
                                </div>

                                <div class="w-100">
                                    <div class="form-floating">
                                        <textarea
                                            class="form-control"
                                            v-model="form.address"
                                            placeholder="Leave a comment here"
                                            id="floatingTextarea"
                                        ></textarea>
                                        <label for="floatingInput"
                                            >Address</label
                                        >
                                    </div>

                                    <small class="text-danger" v-if="form.errors.address">{{ form.errors.address }}</small>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-3">
                                <div style="width: 60px">
                                    <i
                                        class="fa-solid fa-venus-mars icon-register"
                                        style="color: gray"
                                    ></i>
                                </div>
                                <div class="w-100">
                                    <select
                                        class="form-select"
                                        v-model="form.gender"
                                        aria-label="Default select example"
                                    >
                                        <option value="" selected>
                                            Choose Your Gender
                                        </option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                    <small class="text-danger" v-if="form.errors.gender">{{ form.errors.gender }}</small>
                                </div>

                                
                            </div>
                            <div class="d-flex align-items-center mb-3">
                                <div style="width: 60px">
                                    <i
                                        class="fa-solid fa-lock icon-register"
                                        style="color: gray"
                                    ></i>
                                </div>

                                <div class="w-100">
                                    <div class="form-floating">
                                        <input
                                            type="password"
                                            v-model="form.password"
                                            class="form-control"
                                            id="floatingInput"
                                            placeholder="name@example.com"
                                        />
                                        <label for="floatingInput"
                                            >Password</label
                                        >
                                    </div>

                                    <small class="text-danger" v-if="form.errors.password">{{ form.errors.password }}</small>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-3">
                                <div style="width: 60px">
                                    <i
                                        class="fa-solid fa-check icon-register"
                                        style="color: gray"
                                    ></i>
                                </div>

                                <div class="w-100">
                                    <div class="form-floating">
                                        <input
                                            type="password"
                                            v-model="form.password_confirm"
                                            class="form-control"
                                            id="floatingInput"
                                            placeholder="name@example.com"
                                        />
                                        <label for="floatingInput"
                                            >Confirm Password</label
                                        >
                                    </div>

                                    <small class="text-danger" v-if="form.errors.password_confirm">{{ form.errors.password_confirm }}</small>
                                </div>
                            </div>

                            <div class="text-center mt-5">
                                <Button
                                    type="submit"
                                    class="col-12 btn px-4 py-2 btn-primary rounded-3 fs-4"
                                    >Sign Up</Button
                                >
                            </div>
                        </form>

                        <div class="text-end mt-3">
                            <Link :href="route('auth#loginPage')">
                                <small class="text-red"
                                    >Click here to log in</small
                                >
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { Head, Link, useForm } from "@inertiajs/vue3";




const form = useForm({
    name: "",
    email: "",
    phone: "",
    address: "",
    gender: "",
    password: "",
    password_confirm: "",
});

function submit() {
    form.post(route('auth#register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });;
}
</script>

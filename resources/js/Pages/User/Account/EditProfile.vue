<template>
    <Head title="Profile Edit" />
    <div>
        <UserLayout :cart="cartForNav">
            <div class="container">
                <div class="row my-5 d-flex justify-content-center">
                    <div class="card w-100 pt-3 p-5">
                        <div class="card-header text-center fs-4">
                            <h3
                                class="text-start text-black"
                                style="
                                    transform: rotate(-1deg);
                                    font-family: 'Roboto Slab', serif;
                                "
                            >
                                Profile Edit
                                <small class="text-info fs-5">Page</small>
                            </h3>
                        </div>

                        <form @submit.prevent="editProfile">
                            <div class="row mt-3 d-flex justify-content-around">
                                <div class="col-4">
                                    <div class="text-center ">
                                        <div class="d-flex justify-content-center">
                                            <div class="rounded-circle overflow-hidden shadow-sm" style="width: 200px;height: 200px;">
                                                <img
                                                    v-if="
                                                        $page.props.auth.user.image ==
                                                        null
                                                    "
                                                    src="/images/defaultUser.jpg"
                                                    class=" w-100 h-100"
                                                    alt=""
                                                />

                                                <img
                                                    v-else
                                                    :src="`/storage/${$page.props.auth.user.image}`"
                                                    class=" w-100 h-100"
                                                    alt=""
                                                />
                                            </div>
                                        </div>
                                        

                                        <div class="mt-2 text-center">
                                            <input
                                                type="file"
                                                @input="
                                                    form.profileImage =
                                                        $event.target.files[0]
                                                "
                                                class="form-control mt-3"
                                                :class="
                                                    form.errors.profileImage
                                                        ? 'btn-outline-danger'
                                                        : 'btn-outline-info'
                                                "
                                                id=""
                                            />
                                            <small
                                                class="text-danger"
                                                v-if="form.errors.profileImage"
                                                >{{
                                                    form.errors.profileImage
                                                }}</small
                                            >
                                        </div>

                                        <div class="mt-4">
                                            <button
                                                type="submit"
                                                class="btn btn-info"
                                            >
                                                <i
                                                    class="fa-solid fa-address-card me-2"
                                                ></i
                                                >Update Profile
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label
                                            for="name"
                                            class="form-label fw-bold"
                                            >Name</label
                                        >
                                        <input
                                            type="text"
                                            v-model="form.profileName"
                                            class="form-control mb-0"
                                            :class="
                                                form.errors.profileName
                                                    ? 'btn-outline-danger'
                                                    : 'btn-outline-info'
                                            "
                                            id="name"
                                            placeholder="Enter New Name..."
                                        />
                                        <small
                                            class="text-danger"
                                            v-if="form.errors.profileName"
                                            >{{
                                                form.errors.profileName
                                            }}</small
                                        >
                                    </div>

                                    <div class="mb-3">
                                        <label
                                            for="email"
                                            class="form-label fw-bold"
                                            >Email</label
                                        >
                                        <input
                                            type="email"
                                            v-model="form.profileEmail"
                                            class="form-control mb-0"
                                            :class="
                                                form.errors.profileEmail
                                                    ? 'btn-outline-danger'
                                                    : 'btn-outline-info'
                                            "
                                            id="email"
                                            placeholder="Enter New Email..."
                                        />
                                        <small
                                            class="text-danger"
                                            v-if="form.errors.profileEmail"
                                            >{{
                                                form.errors.profileEmail
                                            }}</small
                                        >
                                    </div>

                                    <div class="mb-3">
                                        <label
                                            for="phone"
                                            class="form-label fw-bold"
                                            >Phone</label
                                        >
                                        <input
                                            type="number"
                                            v-model="form.profilePhone"
                                            class="form-control mb-0"
                                            :class="
                                                form.errors.profilePhone
                                                    ? 'btn-outline-danger'
                                                    : 'btn-outline-info'
                                            "
                                            id="phone"
                                            placeholder="Enter New Number..."
                                        />
                                        <small
                                            class="text-danger"
                                            v-if="form.errors.profilePhone"
                                            >{{
                                                form.errors.profilePhone
                                            }}</small
                                        >
                                    </div>

                                    <div class="">
                                        <label
                                            for="gender"
                                            class="form-label fw-bold"
                                            >Gender</label
                                        >
                                        <select
                                            class="form-select"
                                            :class="
                                                form.errors.profileGender
                                                    ? 'btn-outline-danger'
                                                    : 'btn-outline-info'
                                            "
                                            v-model="form.profileGender"
                                            aria-label="Default select example"
                                        >
                                            <option value="" selected>
                                                Choose Your Gender
                                            </option>
                                            <option value="male">Male</option>
                                            <option value="female">
                                                Female
                                            </option>
                                        </select>
                                        <small
                                            class="text-danger"
                                            v-if="form.errors.profileGender"
                                            >{{
                                                form.errors.profileGender
                                            }}</small
                                        >
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="">
                                        <label
                                            for="address"
                                            class="form-label fw-bold"
                                            >Address</label
                                        >
                                        <textarea
                                            v-model="form.profileAddress"
                                            class="form-control"
                                            :class="
                                                form.errors.profileAddress
                                                    ? 'btn-outline-danger'
                                                    : 'btn-outline-info'
                                            "
                                            id="address"
                                            cols="30"
                                            rows="10"
                                            placeholder="Enter New Address..."
                                        ></textarea>
                                        <small
                                            class="text-danger"
                                            v-if="form.errors.profileAddress"
                                            >{{
                                                form.errors.profileAddress
                                            }}</small
                                        >
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </UserLayout>
    </div>
</template>

<script setup>
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";
import UserLayout from "../Layout/UserLayout.vue";

const props = defineProps({
    user: Object,
    cartForNav: Object,
});

const form = useForm({
    profileImage: props.user.image,
    profileName: props.user.name,
    profileEmail: props.user.email,
    profilePhone: props.user.phone,
    profileGender: props.user.gender,
    profileAddress: props.user.address,
});

const editProfile = () => {
    form.post(`/user/profile/edit`);
};
</script>

<style lang="scss" scoped></style>

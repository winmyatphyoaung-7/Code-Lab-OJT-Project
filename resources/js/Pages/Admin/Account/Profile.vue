<template>
    <Head title="Profile" />
    <div>
        <AdminLayout>
            <div
                v-if="$page.props.flash.profileUpdate ? profileUpdate() : ''"
            ></div>
            <div class="container">
                <div
                    class="row d-flex justify-content-center align-items-center"
                    style="height: 85vh"
                >
                    <div class="card p-3 w-75">
                        <div class="card-header d-flex align-items-center">
                            <!-- <div class="">
                                <a href="">
                                    <i
                                        class="fa-solid fa-circle-left text-black fs-2"
                                    ></i>
                                </a>
                            </div> -->
                            <div class="mx-auto">
                                <h4>Your Account Profile</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-center">
                                <div
                                    class="rounded-circle bg-light shadow-sm"
                                    style="width: 150px; height: 150px"
                                >
                                    <img
                                        v-if="user.image == null"
                                        src="/images/defaultUser.jpg"
                                        class="rounded-circle w-100"
                                        alt=""
                                    />
                                    <img
                                        v-else
                                        :src="`/storage/${user.image}`"
                                        class="rounded-circle"
                                        style="width: inherit; height: inherit"
                                        alt=""
                                    />
                                </div>
                            </div>

                            <div
                                class="d-flex flex-column align-items-center justify-content-center mt-3"
                            >
                                <div class="">
                                    <h4>{{ user.name }}</h4>
                                </div>
                                <div class="mt-1">
                                    <h6
                                        style="
                                            color: lightgray;
                                            font-size: 15px;
                                        "
                                    >
                                        {{ user.email }}
                                    </h6>
                                </div>
                            </div>

                            <div class="mt-5 d-flex justify-content-around">
                                <div class="">
                                    <i class="fa-solid fa-phone me-2"></i>
                                    <small>{{ user.phone }}</small>
                                </div>

                                <div class="">
                                    <i
                                        class="fa-solid fa-house-chimney me-2"
                                    ></i>
                                    <small>{{ user.address }}</small>
                                </div>

                                <div class="">
                                    <i class="fa-solid fa-venus-mars me-2"></i>
                                    <small>{{ user.gender }}</small>
                                </div>
                            </div>

                            <div class="mt-5 text-center">
                                <Link
                                    :href="route('admin#confirmPasswordPage')"
                                    class="btn btn-outline-info btn-info bg-info text-white fw-bold"
                                >
                                    <i
                                        class="fa-solid fa-pen-to-square me-2"
                                    ></i>
                                    Edit Profile
                                </Link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </AdminLayout>
    </div>
</template>

<script setup>
import { Link, Head } from "@inertiajs/inertia-vue3";
import AdminLayout from "../Layout/Master.vue";
import Swal from "sweetalert2";
import { ref , onMounted } from "vue";

const props = defineProps({
    user: Object,
    flash: Object,
});

let isDeleting = ref(false);

const profileUpdate = () => {
    Swal.fire("Your Profile Updated!", "" + "", "success").then(() => {
        isDeleting = true;
        delete props.flash.profileUpdate;
        Inertia.reload();
    });
};

onMounted(() => {
    if (isDeleting) {
        delete props.flash.profileUpdate;
    }
});
</script>

<style lang="scss" scoped></style>

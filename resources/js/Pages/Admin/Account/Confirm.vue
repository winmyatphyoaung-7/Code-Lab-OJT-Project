<template>
    <Head title="Confirm Password" />
    <div>
        <AdminLayout>
            <div class="container h-100">
                <div
                    class="row h-100 justify-content-center align-items-center"
                    style="height: 85vh !important"
                >
                    <div class="card p-5 pt-3 col-6">
                        <div class="card-header text-center">
                            <h4 class="fw-bold">Confirm Your Password</h4>
                        </div>

                        <div v-if="$page.props.flash.notMatch" class="">
                            <div class="col-12 alert alert-warning alert-dismissible fade show" role="alert">
                                <strong><i class="fa-solid fa-trash-check"></i></strong> {{ $page.props.flash.notMatch }}
                                
                            </div>
                        </div>

                        <form @submit.prevent="submit" method="POST">
                            <div class="">
                                <label for="" class="fw-semibold"
                                    >Password</label
                                >
                                <input
                                    type="password"
                                    v-model="form.password"
                                    class="form-control mb-0"
                                    :class="
                                        form.errors.password
                                            ? 'btn-outline-danger'
                                            : 'btn-outline-info'
                                    "
                                    placeholder="Enter your password..."
                                />
                                <small
                                    class="text-danger"
                                    v-if="form.errors.password"
                                    >{{ form.errors.password }}</small
                                >
                            </div>

                            <div class="mt-4">
                                <label for="" class="fw-semibold"
                                    >Confirm Password</label
                                >
                                <input
                                    type="password"
                                    v-model="form.confirmPassword"
                                    class="form-control mb-0"
                                    :class="
                                        form.errors.confirmPassword
                                            ? 'btn-outline-danger'
                                            : 'btn-outline-info'
                                    "
                                    placeholder="Enter your confirm password..."
                                />
                                <small
                                    class="text-danger"
                                    v-if="form.errors.confirmPassword"
                                    >{{ form.errors.confirmPassword }}</small
                                >
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="mt-4">
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
    password: "",
    confirmPassword: "",
});

function submit() {
    form.post(route("admin#confirmPassword"), {
        onFinish: () => form.reset("password"),
    });
}

</script>

<style lang="scss" scoped></style>

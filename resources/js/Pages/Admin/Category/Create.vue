<template>
    <Head title="Category Create" />
    <div>
        <AdminLayout>
            <div class="container">
                <div
                    class="row d-flex justify-content-center align-items-center"
                    style="height: 80vh"
                >
                    <div class="card col-5 p-5 pt-0">
                        <div class="card-header text-center">
                            <h3>Create Your Course</h3>
                        </div>

                        <form @submit.prevent="submit">
                            <div class="mb-3 mt-3">
                                <label for="name" class="form-label"
                                    >Category Name</label
                                >
                                <input
                                    type="text"
                                    v-model="form.category"
                                    class="mb-0 form-control"
                                    :class="
                                        form.errors.category
                                            ? 'btn-outline-danger'
                                            : ''
                                    "
                                    id="name"
                                    placeholder="Enter Category Name..."
                                />
                                <small
                                    class="text-danger"
                                    v-if="form.errors.category"
                                    >{{ form.errors.category }}</small
                                >
                            </div>

                            <div class="">
                                <button class="w-100 btn btn-info fs-6">
                                    Create<i
                                        class="fa-solid fa-circle-right ms-3"
                                    ></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </AdminLayout>
        
    </div>
</template>

<script setup>
import AdminLayout from "../Layout/Master.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import Swal from "sweetalert2";


const form = useForm({
    category: "",
});

const submit = () => {
    form.post(route("category#create"));
};
</script>

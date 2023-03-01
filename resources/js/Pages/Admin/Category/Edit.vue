<template>
    <Head title="Category Edit" />
    <div>
        <div class="container">
            <div
                class="row d-flex justify-content-center align-items-center"
                style="height: 80vh"
            >
                <div class="card col-5 p-5 pt-0">
                    <div class="card-header text-center">
                        <h3>Edit Category</h3>
                    </div>

                    <form @submit.prevent="form.put(route('category#edit',form.id))">
                        <div class="mb-3 mt-3">
                            <label for="name" class="form-label"
                                >Category Name</label
                            >
                            <input
                                type="text"
                                class="mb-0 form-control"
                                :class="form.errors.category ? 'btn-outline-danger' : '' "
                                id="name"
                                v-model="form.category"
                            />

                            <small
                            class="text-danger"
                            v-if="form.errors.category"
                            >{{ form.errors.category }}</small>
                        </div>

                        <div class="">
                            <button type="submit" class="w-100 btn btn-info fs-6">
                                Update<i
                                    class="fa-solid fa-circle-right ms-3"
                                ></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import AdminLayout from "../Layout/Master.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";


const props = defineProps({ category: Object });

const form = useForm({
    id : props.category[0].id, 
    category : props.category[0].name,
});



</script>

<template>
    <Head title="Course Create" />
    <div>
        <AdminLayout>
            <div class="container py-5 pt-5">
                <div class="row">
                    <div class=""></div>
                    <h3
                        class="fw-semibold text-center text-black"
                        style="
                            transform: rotate(-2deg);
                            font-family: 'Roboto Slab', serif;
                        "
                    >
                        Course <small class="text-info fs-5">Create Page</small>
                    </h3>
                </div>

                <div class="col-10 mx-auto pt-4">
                    <form @submit.prevent="storeCourse">
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label fw-bold"
                                        >Course Name</label
                                    >
                                    <input
                                        type="text"
                                        v-model="form.courseName"
                                        class="mb-0 form-control"
                                        :class="form.errors.courseName ? 'btn-outline-danger' : 'btn-outline-info' "
                                        id="name"
                                        placeholder="Enter Course Name..."
                                        
                                    />
                                    <small
                                        class="text-danger"
                                        v-if="form.errors.courseName"
                                        >{{ form.errors.courseName }}</small
                                    >
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="mb-3">
                                    <label
                                        for="price"
                                        class="form-label fw-bold"
                                        >Price</label
                                    >
                                    <input
                                        type="text"
                                        v-model="form.coursePrice"
                                        class="form-control mb-0"
                                        :class="form.errors.coursePrice ? 'btn-outline-danger' : 'btn-outline-info' "
                                        id="price"
                                        placeholder="Enter Course Price..."
                                        
                                    />

                                    <small
                                        class="text-danger"
                                        v-if="form.errors.coursePrice"
                                        >{{ form.errors.coursePrice }}</small
                                    >
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label fw-bold"
                                >Course Description</label
                            >
                            <textarea
                                name="courseDescription"
                                class="form-control mb-0"
                                :class="form.errors.courseDescription ? 'btn-outline-danger' : 'btn-outline-info' "
                                id="description"
                                cols="30"
                                rows="10"
                                placeholder="Enter Course Description..."
                                v-model="form.courseDescription"
                            >{{ form.courseDescription }}</textarea>
                            <small
                                class="text-danger"
                                v-if="form.errors.courseDescription"
                                >{{ form.errors.courseDescription }}</small
                            >
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label fw-bold"
                                >Category</label
                            >
                            <select
                                class="form-select"
                                :class="form.errors.courseCategory ? 'btn-outline-danger' : 'btn-outline-info' "
                                v-model="form.courseCategory"
                                aria-label="Default select example" 
                            >
                                <option value="" selected>
                                    Choose Your Category
                                </option>
                                
                                
                                    <option v-for="c in category" :key="c" :value="c.id">{{c.name}} </option>
                                
                            </select>
                            <small
                                class="text-danger"
                                v-if="form.errors.courseCategory"
                                >{{ form.errors.courseCategory }}</small
                            >
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label
                                        for="duration"
                                        class="form-label fw-bold"
                                        >Duration</label
                                    >
                                    <input
                                        type="number"
                                        v-model="form.courseDuration"
                                        class="form-control mb-0"
                                        :class="form.errors.courseDuration ? 'btn-outline-danger' : 'btn-outline-info' "
                                        id="duration"
                                        placeholder="Enter Course Duration..."
                                        
                                    />
                                    <small
                                        class="text-danger"
                                        v-if="form.errors.courseDuration"
                                        >{{ form.errors.courseDuration }}</small
                                    >
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label
                                        for="price"
                                        class="form-label fw-bold"
                                        >Limited Quatity</label
                                    >
                                    <input
                                        type="number"
                                        v-model="form.courseQty"
                                        class="form-control mb-0"
                                        :class="form.errors.courseQty ? 'btn-outline-danger' : 'btn-outline-info' "
                                        id="price"
                                        placeholder="Enter Course Limited Quatity..."
                                    />
                                    <small
                                        class="text-danger"
                                        v-if="form.errors.courseQty"
                                        >{{ form.errors.courseQty }}</small
                                    >
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="row">
                                <div class="col-4">
                                    <label class="form-label fw-bold"
                                        >Start Date</label
                                    >
                                </div>
                                <div class="col-4">
                                    <label class="form-label fw-bold"
                                        >Image</label
                                    >
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <input
                                        type="date"
                                        v-model="form.courseStartDate"
                                        class="form-control mb-0"
                                        :class="form.errors.courseStartDate ? 'btn-outline-danger' : 'btn-outline-info' "
                                        id="startDate"
                                    />
                                    <small
                                        class="text-danger"
                                        v-if="form.errors.courseStartDate"
                                        >{{ form.errors.courseStartDate }}</small
                                    >
                                </div>
                                <div class="col-4">
                                    <input
                                        type="file"
                                        @input="form.courseImage = $event.target.files[0]"
                                        class="form-control"
                                        :class="form.errors.courseImage ? 'btn-outline-danger' : 'btn-outline-info' "
                                    />
                                    <small
                                        class="text-danger"
                                        v-if="form.errors.courseImage"
                                        >{{ form.errors.courseImage }}</small
                                    >
                                </div>
                                <div class="col-4 text-end">
                                    <button
                                        type="submit"
                                        class="btn shadow btn-info px-5"
                                    >
                                        Create
                                        <i
                                            class="fa-solid fa-circle-chevron-right ms-2"
                                        ></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </AdminLayout>
    </div>
</template>

<script setup>
import AdminLayout from "../Layout/Master.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";

const props = defineProps({
    category : Object
})

const form = useForm({
    courseName : '',
    coursePrice : '',
    courseDescription : '',
    courseCategory : '',
    courseQty : '',
    courseStartDate : '',
    courseDuration : '',
    courseImage : ''
});

function storeCourse() {
    form.post(route('course#create'));
}
</script>

<style scoped>
@import url("https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@500&display=swap");
</style>

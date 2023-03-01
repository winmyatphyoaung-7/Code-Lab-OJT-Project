<template>
    <Head title="Course List" />
    <div>
        <AdminLayout>
            <div
                v-if="$page.props.flash.courseCreate ? createCourse() : ''"
            ></div>
            <div v-if="$page.props.flash.courseEdit ? editCourse() : ''"></div>

            <div class="container py-4 animate__animated animate__fadeIn">
                <div
                    class="row d-flex justify-content-between align-items-center"
                >
                    <div class="col-2">
                        <h3
                            class="text-center text-black"
                            style="
                                transform: rotate(-1deg);
                                font-family: 'Roboto Slab', serif;
                            "
                        >
                            Course <small class="text-info fs-5">Lists</small>
                        </h3>
                    </div>

                    <div class="col-8 d-flex">
                        <div class="me-3 d-flex align-items-center">
                            <a
                                class="btn me-2 btn-rounded text-white bg-info disabled"
                                >Total - {{ course.total }}
                            </a>
                            <Link
                                :href="route('course#recommendPage')"
                                type="button"
                                class="btn btn-info btn-rounded shadow-sm d-flex align-items-center me-2"
                                ><i class="fa-solid fa-heart me-2"></i>Recommend
                            </Link>

                            <Link
                                :href="route('course#createPage')"
                                type="button"
                                class="btn btn-info btn-rounded shadow-sm d-flex align-items-center me-2"
                                ><i class="fa-solid fa-square-plus me-2"></i
                                >Create
                            </Link>

                            <Link
                                :href="route('course#listPage')"
                                type="button"
                                class="btn btn-info btn-rounded shadow-sm d-flex align-items-center"
                                >All
                            </Link>
                        </div>
                        <form>
                            <div class="input-group">
                                <input
                                    type="search"
                                    v-model="search"
                                    class="form-control rounded"
                                    placeholder="Search"
                                    aria-label="Search"
                                    aria-describedby="search-addon"
                                />
                                <button
                                    type="button"
                                    class="btn text-white bg-primary"
                                >
                                    search
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="my-5">
                    <table class="table align-middle mb-0 bg-white">
                        <thead class="bg-light">
                            <tr class="text-center">
                                <th>Images</th>
                                <th>Course Name</th>
                                <th>Price</th>
                                <th>Limited quantity</th>
                                <th>Start Date</th>
                                <th>Duration</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody v-for="(c, index) in course.data" :key="index">
                            <tr class="text-center">
                                <td>
                                    <img
                                        :src="`/storage/${c.image}`"
                                        class="border border-3 border-info"
                                        style="width: 100px"
                                        alt=""
                                    />
                                </td>
                                <td>
                                    <h5>{{ c.name }}</h5>
                                </td>
                                <td>{{ c.price }} Kyats</td>
                                <td>{{ c.qty }} Students</td>

                                <td>{{ c.start_date }}</td>

                                <td>{{ c.duration }} Months</td>

                                <td class="col-2">
                                    <Link
                                        :href="route('course#editPage', c.id)"
                                        class="btn btn-link fw-bold btn-sm btn-rounded"
                                    >
                                        Edit
                                    </Link>
                                    <Link
                                        onclick="return confirm('Are you sure to delete?')"
                                        :href="route('course#delete', c.id)"
                                        method="delete"
                                        as="button"
                                        class="btn deleteCourseBtn btn-link fw-bold btn-sm btn-rounded"
                                    >
                                        Delete
                                    </Link>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="mt-3">
                        <Pagination :data="course" />
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
import Pagination from "../../../Components/Pagination.vue";
import { ref, watch , onMounted } from "vue";
import { Inertia } from "@inertiajs/inertia";

let search = ref(props.filters);
let isDeleting = ref(false);

const props = defineProps({
    course: Object,
    filters: Object,
    flash : Object
});

onMounted(() => {
    if (isDeleting) {
        delete props.flash.courseEdit;
        delete props.flash.courseCreate;

    }
});

watch(search, (value) => {
    Inertia.get(
        "/admin/course/list",
        { search: value },
        { preserveState: true }
    );
});

const createCourse = () => {
    Swal.fire("New Course Created!", "" + "", "success").then(() => {
        isDeleting = true;
        delete props.flash.courseCreate;
    });;
};

const editCourse = () => {
    Swal.fire("Course Edited Successfully!", "" + "", "success").then(() => {
        isDeleting = true;
        delete props.flash.courseEdit;
    });
};
</script>

<style scoped>
@import url("https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@500&display=swap");
</style>

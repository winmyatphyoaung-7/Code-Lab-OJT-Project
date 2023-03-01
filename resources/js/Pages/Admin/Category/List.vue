<template>
    <Head title="Category List" />
    <div>
        <AdminLayout>
            <div
                v-if="$page.props.flash.categoryCreate ? createCategory() : ''"
            ></div>
            <div
                v-if="$page.props.flash.categoryEdit ? editCategory() : ''"
            ></div>

            <div class="container my-4 animate__animated animate__fadeIn">
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
                            Category <small class="text-info fs-5">Lists</small>
                        </h3>
                    </div>

                    <div class="col-7 offset-1 d-flex">
                        <div class="me-3 d-flex align-items-center">
                            <a
                                class="btn me-2 btn-rounded text-white bg-info disabled"
                                >Total - {{ category.total }}
                            </a>
                            <Link
                                :href="route('category#createPage')"
                                class="btn btn-info btn-rounded shadow-sm d-flex align-items-center me-2"
                                ><i class="fa-solid fa-square-plus me-2"></i
                                >Create
                            </Link>

                            <Link
                                :href="route('category#listPage')"
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
                                <th>Id</th>
                                <th>Category Name</th>
                                <th>Created_at</th>
                                <th>Updated_at</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody v-for="(c, index) in category.data" :key="index">
                            <tr class="text-center">
                                <td>
                                    {{ index + 1 }}
                                </td>
                                <td>
                                    {{ c.name }}
                                </td>
                                <td>
                                    {{
                                        moment(c.created_at).format(
                                            "MMMM Do YYYY, h:mm:ss a"
                                        )
                                    }}
                                </td>
                                <td>
                                    {{
                                        moment(c.updated_at).format(
                                            "MMMM Do YYYY, h:mm:ss a"
                                        )
                                    }}
                                </td>

                                <td class="col-2">
                                    <Link
                                        :href="route('category#editPage', c.id)"
                                        class="btn btn-link fw-bold btn-sm btn-rounded"
                                    >
                                        Edit
                                    </Link>
                                    <Link
                                        onclick="return confirm('Are you sure to delete?')"
                                        :href="route('category#delete', c.id)"
                                        method="get"
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
                        <Pagination :data="category" />
                    </div>

                    <!-- @if (count($data) == 0)
        <div class="card p-5 d-flex justify-content-center align-items-center" style="margin-top:200px;">
            <h3 class="text-danger">There is no Course!</h3>
        </div>
    @endif -->
                </div>
            </div>
        </AdminLayout>
    </div>
</template>

<script setup>
import AdminLayout from "../Layout/Master.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import Swal from "sweetalert2";
import { ref, watch, computed , onMounted } from "vue";
import { Inertia } from "@inertiajs/inertia";
import Pagination from "../../../Components/Pagination.vue";
import moment from "moment";

const props = defineProps({
    category: Object,
    filters: Object,
    flash : Object
});

let search = ref(props.filters);
let isDeleting = ref(false);

const createCategory = () => {
    Swal.fire("New category created!", "" + "", "success").then(() => {
        isDeleting = true;
        delete props.flash.categoryCreate;
        Inertia.reload();
    });
};

const editCategory = () => {
    Swal.fire("Category Edited Successfully!", "" + "", "success").then(() => {
        isDeleting = true;
        delete props.flash.categoryEdit;
        Inertia.reload();
    });
};

onMounted(() => {
    if (isDeleting) {
        delete props.flash.categoryEdit;
        delete props.flash.categoryCreate;

      }
})



watch(search, (value) => {
    Inertia.get(
        "/admin/category/list",
        { search: value },
        { preserveState: true }
    );
});
</script>

<style scoped>
@import url("https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@500&display=swap");
</style>

<template>
    <Head title="Recommend Course" />
    <div>
        <AdminLayout>
            <div class="container py-4">
                <div
                    class="row d-flex justify-content-between align-items-center"
                >
                    <div class="col-3">
                        <h3
                            class="text-center text-black"
                            style="
                                transform: rotate(-1deg);
                                font-family: 'Roboto Slab', serif;
                            "
                        >
                            Recommend
                            <small class="text-info fs-5">Course</small>
                        </h3>
                    </div>

                    <div class="col-4 d-flex">
                        <div class="me-3 d-flex align-items-center">
                            <Link
                                :href="route('course#listPage')"
                                type="button"
                                class="btn btn-black btn-rounded shadow-sm d-flex align-items-center me-2"
                                >Back
                            </Link>

                            <a
                                href=""
                                type="button"
                                class="btn btn-info btn-rounded shadow-sm d-flex align-items-center"
                                >All
                            </a>
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
                                    <button
                                        v-if="!c.recommend"
                                        @click="handleRecommend(c.id)"
                                        class="btn btn-link fw-bold btn-sm btn-rounded"
                                    >
                                        Recommend
                                    </button>
                                    <button
                                        v-else
                                        @click="handleUnrecommend(c.id)"
                                        class="btn bg-info text-white btn-link fw-bold btn-sm btn-rounded"
                                    >
                                        Unrecommend
                                    </button>
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
import Pagination from "../../../Components/Pagination.vue";
import { ref, watch } from "vue";
import { Inertia } from "@inertiajs/inertia";

let search = ref(props.filters);

const props = defineProps({
    course: Object,
    filters: Object,
});

watch(search, (value) => {
    Inertia.get(
        "/admin/course/recommend",
        { search: value },
        { preserveState: true }
    );
});

const handleRecommend = (id) => {
    Inertia.post(`/admin/course/recommend/${id}`,{value : 1});
};

const handleUnrecommend = (id) => {
    Inertia.post(`/admin/course/recommend/${id}`,{value : 0});
};
</script>

<style lang="scss" scoped></style>

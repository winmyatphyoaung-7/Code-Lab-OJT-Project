<template>
    <Head title="Admin List Page" />
    <div>
        <AdminLayout>
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
                            Admin <small class="text-info fs-5">Lists</small>
                        </h3>
                    </div>

                    <div class="col-6 d-flex">
                        <div class="me-3 d-flex align-items-center">
                            <a
                                class="btn me-2 btn-rounded text-white bg-info disabled"
                                >Total - {{ adminList.total }}
                            </a>

                            <Link
                                :href="route('admin#adminListPage')"
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
                                    placeholder="Search with email"
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
                                <th>Image</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                class="text-center"
                                v-for="admin in adminList.data"
                                :key="admin"
                            >
                                <td class="col-3">
                                    <img
                                        v-if="admin.image == null"
                                        src="/images/defaultUser.jpg"
                                        class="img-thumbnail"
                                        style="width: 100px !important"
                                        alt=""
                                    />

                                    <img
                                        v-else
                                        :src="`/storage/${admin.image}`"
                                        style="width: 100px !important"
                                        class="img-thumbnail"
                                        alt=""
                                    />
                                </td>
                                <td>
                                    {{ admin.name }}
                                </td>
                                <td>{{ admin.email }}</td>
                                <td>{{ admin.phone }}</td>

                                <td>{{ admin.address }}</td>

                                <td class="col-2">
                                    <select v-if="$page.props.auth.user.id !== admin.id"
                                        @change="handelChangeRole(admin.id)"
                                        name="role"
                                        class="form-control statusChange"
                                    >
                                        <option value="user">User</option>
                                        <option
                                            v-bind:selected="
                                                admin.role == 'admin'
                                            "
                                            value="admin"
                                        >
                                            Admin
                                        </option>
                                    </select>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="mt-3">
                        <Pagination :data="adminList" />
                    </div>
                </div>
            </div>
        </AdminLayout>
    </div>
</template>

<script setup>
import { Head, Link } from "@inertiajs/inertia-vue3";
import AdminLayout from "../Layout/Master.vue";
import { Inertia } from "@inertiajs/inertia";
import Pagination from "../../../Components/Pagination.vue";
import { ref , watch } from "vue";

const props = defineProps({
    adminList: Object,
    filters: Object,
});

let search = ref(props.filters);

const handelChangeRole = (id) => {
    Inertia.post(`/admin/change/role/${id}`, { value: "admin" });
};

watch(search, (value) => {
    Inertia.get(
        "/admin/adminList",
        { search: value },
        { preserveState: true }
    );
});
</script>

<style scoped></style>

<template>
    <Head title="Contact List Page" />
    <div>
        <AdminLayout>
            
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
                            Contact <small class="text-info fs-5">Lists</small>
                        </h3>
                    </div>

                    <div class="col-6 d-flex">
                        <div class="me-3 d-flex align-items-center">
                            <a
                                class="btn me-2 btn-rounded text-white bg-info disabled"
                                >Total - {{ data.total }}
                            </a>

                            <Link
                                :href="route('admin#contactListPage')"
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
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th class="col-3">Message</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                v-for="(contact, index) in data.data"
                                :key="index"
                                class="text-center"
                            >
                                <td>{{ contact.name }}</td>
                                <td class="text-break">{{ contact.email }}</td>
                                <td>{{ contact.phone }}</td>
                                <td class="col-3 text-start">
                                    <div class="text-break font-monospace">
                                        {{ contact.content.substring(0, 40) }}
                                        <Link
                                            preserve-state="true"
                                            @click="handleShowContent(index)"
                                            >.... For More Click Here</Link
                                        >
                                    </div>
                                </td>

                                <td>
                                    <Link
                                        :href="
                                            route(
                                                'admin#contactDelete',
                                                contact.id
                                            )
                                        "
                                        class="btn deleteCourseBtn btn-link fw-bold btn-sm btn-rounded"
                                    >
                                        Delete
                                    </Link>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="mt-3">
                        <Pagination :data="data" />
                    </div>
                </div>
            </div>

            <div
                v-if="showContent"
                class="position-absolute translate-middle top-50 start-50 overlay"
            >
                <div
                    class="card px-4 py-3 rounded-5 overflow-auto animate__animated animate__bounceInDown animate__fast"
                    style="width: 500px; max-height: 300px"
                >
                    <div class="fs-5 fw-bolder text-info mb-2">
                        Contact Message
                    </div>
                    <p class="" style="color: #999999">
                        {{ data.data[showContentId].content }}
                    </p>
                    <div class="d-block">
                        <a
                            @click="showContent = false"
                            class="btn btn-black text-white w-100 mt-3 fw-bold fs-6"
                        >
                            Close
                        </a>
                    </div>
                </div>
            </div>
        </AdminLayout>
    </div>
</template>

<script setup>
import { Head, Link } from "@inertiajs/inertia-vue3";
import AdminLayout from "../Layout/Master.vue";
import { ref, watch  } from "vue";
import { Inertia } from "@inertiajs/inertia";
import Pagination from "../../../Components/Pagination.vue";
import Swal from "sweetalert2";

const props = defineProps({
    data: Object,
    filters: Object,
});



let search = ref(props.filters);

let showContent = ref(false);
let showContentId = ref(null);

const handleShowContent = (id) => {
    showContentId = id;
    showContent = ref(true);
};

watch(search, (value) => {
    Inertia.get(
        "/admin/contactList",
        { search: value },
        { preserveState: true }
    );
});
</script>

<style scoped>
.overlay {
    z-index: 9999;
    background-color: rgba(0, 0, 0, 0.5);
    width: 100vw;
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
}
.overlay > * {
    z-index: 10000;
}
</style>

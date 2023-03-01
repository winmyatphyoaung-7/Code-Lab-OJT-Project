<template>
    <div>
        <AdminLayout>
            <div class="container">
                <div class="row mt-5 d-flex justify-content-center align-items-center" style="height: 80vh;">
                    <div class="card w-50 p-5">
                        <h1 class="text-center">Confirmation success!</h1>
                        <div class="col-12 d-flex justify-content-center">
                            <Link class="btn col-4 btn-info " :href="route('admin#editProfilePage')">
                                Next
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </AdminLayout>
    </div>
</template>

<script setup>
import { Head , Link } from '@inertiajs/inertia-vue3';
import AdminLayout from '../Layout/Master.vue';
</script>

<style lang="scss" scoped>

</style>
<template>
    <Head title="Contact Page" />
    <div>
        <UserLayout :cart="cartForNav">
            <div class="container">
                <div
                    v-if="$page.props.flash.contactSent ? contactSent() : ''"
                ></div>
                <div class="row my-5">
                    <div class="col-10 offset-1">
                        <div class="mb-3">
                            <h2
                                class="text-center text-black"
                                style="
                                    transform: rotate(-1deg);
                                    font-family: 'Roboto Slab', serif;
                                "
                            >
                                Contact Us
                                <small class="text-info fs-5">Page</small>
                            </h2>
                        </div>
                        <form
                            @submit.prevent="submitForm"
                        >
                            <!-- <div class="row">
                    <div class="col-6 offset-6 alert alert-success alert-dismissible fade show" role="alert">
                        <strong><i class="fa-solid fa-check me-2"></i></strong> {{ session('sendSuccess') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                    </div>  
            </div> -->
                            <div class="row mb-2">
                                <div class="form-group col-5 offset-1">
                                    <label for="a">Name</label>
                                    <input
                                        type="text"
                                        v-model="form.contactName"
                                        id="a"
                                        class="form-control"
                                        :class="
                                            form.errors.contactName
                                                ? 'btn-outline-danger'
                                                : 'btn-outline-info'
                                        "
                                        placeholder="Enter your Name..."
                                    />
                                    <small
                                        class="text-danger"
                                        v-if="form.errors.contactName"
                                        >{{ form.errors.contactName }}</small
                                    >
                                </div>

                                <div class="col-5 offset-1">
                                    <label for="b">Email</label>
                                    <input
                                        type="email"
                                        v-model="form.contactEmail"
                                        id="b"
                                        class="form-control"
                                        :class="
                                            form.errors.contactEmail
                                                ? 'btn-outline-danger'
                                                : 'btn-outline-info'
                                        "
                                        placeholder="Enter your email..."
                                    />
                                    <small
                                        class="text-danger"
                                        v-if="form.errors.contactEmail"
                                        >{{ form.errors.contactEmail }}</small
                                    >
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-5 offset-1">
                                    <label for="d">Phone Number</label>
                                    <input
                                        type="text"
                                        v-model="form.contactNumber"
                                        id="d"
                                        class="form-control"
                                        :class="
                                            form.errors.contactNumber
                                                ? 'btn-outline-danger'
                                                : 'btn-outline-info'
                                        "
                                        placeholder="Enter your Number..."
                                    />
                                    <small
                                        class="text-danger"
                                        v-if="form.errors.contactNumber"
                                        >{{ form.errors.contactNumber }}</small
                                    >
                                </div>

                                <div class="col-5 offset-1">
                                    <label for="e">Address</label>
                                    <input
                                        type="text"
                                        v-model="form.contactAddress"
                                        id="e"
                                        class="form-control"
                                        :class="
                                            form.errors.contactAddress
                                                ? 'btn-outline-danger'
                                                : 'btn-outline-info'
                                        "
                                        placeholder="Enter your Address..."
                                    />
                                    <small
                                        class="text-danger"
                                        v-if="form.errors.contactAddress"
                                        >{{ form.errors.contactAddress }}</small
                                    >
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="offset-1 col-11">
                                    <label for="c">Message</label>
                                    <textarea
                                        v-model="form.contactMessage"
                                        id="c"
                                        class="form-control"
                                        :class="
                                            form.errors.contactMessage
                                                ? 'btn-outline-danger'
                                                : 'btn-outline-info'
                                        "
                                        cols="30"
                                        rows="10"
                                        placeholder="Enter your Message..."
                                    ></textarea>
                                    <small
                                        class="text-danger"
                                        v-if="form.errors.contactMessage"
                                        >{{ form.errors.contactMessage }}</small
                                    >
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-3 offset-9">
                                    <button
                                        type="submit"
                                        class="w-100 btn btn-lg btn-info text-white"
                                        style="border-top-left-radius: 50px"
                                    >
                                        Send Message
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </UserLayout>
    </div>
</template>

<script setup>
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import UserLayout from "../Layout/UserLayout.vue";
import Swal from "sweetalert2";
import { ref , onMounted } from "vue";
import { Inertia } from "@inertiajs/inertia";

const props = defineProps({
    cartForNav: Object,
    flash : Object
});

onMounted(() => {
    if (isDeleting) {
        delete props.flash.contactSent;
    }
});

let isDeleting = ref(false);

const contactSent = () => {
    Swal.fire("Thanks For Contact Us", "" + "", "success").then(() => {
        isDeleting = true;
        delete props.flash.contactSent;
        Inertia.reload();
    });;
};

const form = useForm({
    contactName: "",
    contactEmail: "",
    contactNumber: "",
    contactAddress: "",
    contactMessage: "",
});

const submitForm = () => {
    form.post(route('user#contact') , {
        onSuccess: () => form.reset('contactName','contactEmail','contactNumber','contactAddress','contactMessage'),  
    })
}
</script>

<style lang="scss" scoped></style>

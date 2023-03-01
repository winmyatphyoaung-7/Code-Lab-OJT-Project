<template>
    <Head title="Forget Password"/>
    <div style="background-color: #d0eaff;min-height: 100vh;">
        <div class="container pt-5">
            <div class="row">
                <div class="col-5 mx-auto card p-4" style="margin-top: 45px">
                    <h4 class="m-0 p-0">Forgot Password</h4>
                    <hr>

                    <form @submit.prevent="form.post(route('forget#passwordLink'))" autocomplete="off">
        

                        <p>Enter your email address and we will sent you a link to reset your password.</p>

                        <div v-if="$page.props.flash.resetLink" class="alert alert-success">
                            {{ $page.props.flash.resetLink }}
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" :class="form.errors.email ? 'btn-outline-danger' : 'btn-outline-info'" v-model="form.email" placeholder="Enter your email">
                            <small
                                class="text-danger"
                                v-if="form.errors.email"
                                >{{ form.errors.email }}</small
                            >
                            
                        </div>

                        <div class="form-group mt-2">
                            <button type="submit" class="btn btn-primary">Send Reset Password Link</button>
                        </div>

                        <br>

                        <Link style="text-decoration: underline;" :href="route('auth#loginPage')">Login</Link>
                    
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { Link , Head, useForm } from '@inertiajs/inertia-vue3';

const form = useForm({
    email : ''
})
</script>
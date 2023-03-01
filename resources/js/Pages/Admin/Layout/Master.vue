<template>
    <div class="" style="background: linear-gradient(139deg,rgb(204, 244, 255,  0.119) 80%,rgb(204, 244, 255, 0.858) 20%);min-height: 100vh;">
        <div >
            <nav class="navbar navbar-expand-lg shadow position-sticky p-0" id="Navbar1234" style="background-color: #D0EAFF;;z-index: 10;">
                <div class="container">
                    <div class="d-flex justify-content-between align-items-center w-100">
                        <div class="">
                            <Link
                                class="navbar-brand border border-2 shadow-sm"
                                style="
                                    font-family: 'Pacifico', cursive;
                                    border-color: black !important;
                                "
                                :href="route('admin#homePage')"
                                >Signature Of Seven</Link
                            >
                        </div>
                        <a class="navbar-brand fs-4" style="font-weight: 700" href="#"></a>

                        <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarNav">
                            <ul class="navbar-nav d-flex align-items-center">
                                <li class="nav-item me-4">
                                    <Link :href="route('admin#homePage')" class="nav-link text-black fw-semibold" aria-current="page"
                                        href="">Home</Link>
                                </li>
                                <li class="nav-item me-4">
                                    <Link class="nav-link text-black fw-semibold" aria-current="page"
                                        :href="route('category#listPage')">Category</Link>
                                </li>
                                <li class="nav-item me-4">
                                    <Link class="nav-link text-black fw-semibold"
                                        :href="route('course#listPage')">Courses</Link>
                                </li>
                                
                                <li class="nav-item dropdown me-4">
                                    <a class="nav-link dropdown-toggle text-black fw-semibold" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Lists
                                    </a>
                                    <ul class="dropdown-menu shadow-sm" style="background-color: #F9FEFF;">
                                        <li>
                                            <Link  class="dropdown-item" :href="route('admin#adminListPage')">
                                                <i class="fa-solid fa-hammer me-2"></i>
                                                Admin Lists
                                            </Link>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" :href="route('admin#userListPage')">
                                                <i class="fa-solid fa-user me-2"></i>
                                                User Lists
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item me-4">
                                    <Link class="nav-link text-black fw-semibold" :href="route('admin#contactListPage')">Contacts</Link>
                                </li>
                                <li class="nav-item dropdown ms-2">
                                    <a class="nav-link text-black fw-semibold" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <div class="rounded-circle bg-light shadow-sm"
                                            style="margin-right: 15px;cursor:pointer">
                                            
                                                <img v-if="$page.props.auth.user.image == null" src="/images/defaultUser.jpg"
                                                    class="rounded-circle" style="width: 40px;height:40px;" alt="">
                                        
                                                <img v-else :src="`/storage/${$page.props.auth.user.image}`" class="rounded-circle" style="width: 40px;height:40px;" alt="">
                                            
                                        </div>
                                    </a>
                                    <ul class="dropdown-menu shadow-sm">
                                        <li>
                                            <Link class="dropdown-item" :href="route('admin#profilePage')">
                                                <i class="fa-regular fa-user me-2"></i>
                                                Profile
                                            </Link>
                                        </li>
                                        <li>
                                            <Link class="dropdown-item" :href="route('admin#changePasswordPage')">
                                                <i class="fa-solid fa-lock me-2"></i>
                                                Password
                                            </Link>
                                        </li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li>
                                            
                                                
                                                <Link class="dropdown-item" :href="route('auth#logout')">
                                                    
                                                        <i class="fa-solid fa-right-from-bracket me-2"></i>
                                                        Logout
                                                    
                                                </Link>
                                            
                                        </li>
                                    </ul>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </nav>

            <div class="">
                <slot />
            </div>
        </div>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/inertia-vue3';
</script>

<style scoped>
.dropdown-item:hover{
    background-color: rgba(159, 223, 251, 0.829)!important;
}
</style>


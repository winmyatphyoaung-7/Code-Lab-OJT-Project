<template>
    <div>
        <div class="bg-black p-5 pt-4 pb-2 mt-4" style="border-top-left-radius: 200px;">
            <div class="d-flex flex-column align-items-center">
                <div
                    class=" border rounded-4 border-2 shadow-sm text-center fs-4 text-white"
                    style="
                        font-family: 'Pacifico', cursive;
                        border-color: black !important;
                    "
                    :href="route('user#homePage')"
                    >Signature Of Seven</div
                >
                <div class="text-info">(SOS)</div>
            </div>

            <div class="d-flex justify-content-around mt-3 mx-auto text-white" style="width: 600px;">
                <div class="" style="cursor: pointer;">
                    Get to Know Us
                </div>
                <div class=""  style="cursor: pointer;">Careers</div>
                <div class=""  style="cursor: pointer;">About SOS</div>
                <div class=""  style="cursor: pointer;">
                    Investor Relations
                </div>
                <div class=""  style="cursor: pointer;">
                    Contact Us
                </div>
            </div>

            <div class="d-flex justify-content-around mt-3 mx-auto" style="width: 240px;">
                <div class="rounded-circle bg-super-light d-flex justify-content-center align-items-center" style="width:30px;height: 30px;cursor: pointer;">
                    <i class="fa-brands fa-facebook-f fs-5 text-primary"></i>
                </div>
                <div class="rounded-circle bg-super-light d-flex justify-content-center align-items-center" style="width:30px;height: 30px;cursor: pointer;">
                    <i class="fa-brands fa-tiktok"></i>
                </div>
                <div class="rounded-circle bg-super-light d-flex justify-content-center align-items-center" style="width:30px;height: 30px;cursor: pointer;">
                    <i class="fa-brands fa-pinterest-p fs-5 text-danger"></i>
                </div>
                <div class="rounded-circle bg-super-light d-flex justify-content-center align-items-center" style="width:30px;height: 30px;cursor: pointer;">
                    <i class="fa-solid fa-paper-plane text-primary"></i>
                </div>
                <div class="rounded-circle bg-super-light d-flex justify-content-center align-items-center" style="width:30px;height: 30px;cursor: pointer;">
                    <i class="fa-brands fa-twitter text-info fs-5"></i>
                </div>
            </div>

            <div class="mx-auto text-center mt-5 text-secondary" style="width:530px;font-size: 14px;">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Error exercitationem corporis ut amet. Fugiat, culpa blanditiis ut eaque expedita dolorem officiis iste accusantium maiores.
            </div>
        </div>
    </div>
</template>


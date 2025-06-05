<script setup>
import Button from '@/components/Button.vue';
import Input from '@/components/Input.vue';
import { toast } from 'vue3-toastify';
import { ref } from "vue"


const selectedImage = ref(null);
const fileInput = ref(null);

function handleImageClick() {
    fileInput.value.click();
}

function handleFileChange(event) {
    const file = event.target.files[0];
    if (file) {
        selectedImage.value = URL.createObjectURL(file);
    }
}

function submitLogin() {
    toast.success("Login Successfully")
}
</script>
<template>
    <div class=" w-[35vw] h-[60vh] mx-auto pt-4">
        <div class="text-center">
            <h3 class="text-3xl font-primary font-bold mb-3">Create an account</h3>
            <p class="text-gray-700">Enter your details below to create your account</p>
        </div>
        <div class="mt-10">
            <form @submit.prevent="submitLogin">
                <div class="mb-4 text-center">

                    <img :src="selectedImage || 'https://placehold.co/200x200'"
                        class="w-[100px] h-[100px] mx-auto rounded-full object-cover cursor-pointer hover:opacity-80 transition"
                        @click="handleImageClick" />
                    <input ref="fileInput" type="file" accept="image/*" class="hidden" @change="handleFileChange" />
                </div>
                <div class="mb-4">
                    <Input label="Name" name="name" id="name" placeholder="fullname" />
                </div>
                <div class="mb-4">
                    <Input label="Email Address" name="email" id="email" placeholder="example@gmail.com" />
                </div>
                <div class="mb-4">
                    <Input label="Password" name="password" id="password" placeholder="Password" />
                </div>
                <div class="mb-4">
                    <Input label="Confirm Password" name="password_confirmation" id="password-confirmation"
                        placeholder="Confirm Password" />
                </div>

                <div class="mb-4 w-full">
                    <Button type="submit" label="Create Account" />
                </div>
                <div class="text-center">
                    <p class="text-gray-800">Already have an account? <RouterLink to="/login"
                            class="text-black underline">
                            Log in</RouterLink>
                    </p>
                </div>
            </form>
        </div>
    </div>
</template>
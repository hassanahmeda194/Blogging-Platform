<script setup>
import Button from '@/components/Button.vue';
import Input from '@/components/Input.vue';
import { authStore } from '@/store/authStore';
import { reactive } from 'vue';
import { toast } from 'vue3-toastify';
import { useRouter } from 'vue-router';

const router = useRouter();
const user = reactive({
    email: '',
    password: ''
});

const { loading, error, login } = authStore();

async function submitLogin() {
    try {
        await login(user);
        toast.success("Login Successful");
        router.push('/');
    } catch (err) {
        toast.error(err.response?.data?.message || "Login Failed");
    }
}
</script>

<template>
    <div class="w-[35vw] h-[60vh] mx-auto pt-4">
        <div class="text-center">
            <h3 class="text-3xl font-primary font-bold mb-3">Login to your Account</h3>
            <p class="text-gray-700">Enter your email and password below to log in</p>
        </div>
        <div class="mt-10">
            <form @submit.prevent="submitLogin">
                <div class="mb-4">
                    <Input label="Email Address" name="email" id="email" placeholder="example@gmail.com"
                        @inputVal="val => user.email = val" />
                </div>
                <div class="mb-4">
                    <Input label="Password" name="password" id="password" placeholder="Password" type="password"
                        @inputVal="val => user.password = val" />
                </div>
                <div class="mb-4 flex justify-between">
                    <div>
                        <input type="checkbox"> remember me
                    </div>
                    <div>
                        <RouterLink to="/forget-password" class="text-black underline">forget Password?</RouterLink>
                    </div>
                </div>
                <div class="mb-4 w-full">
                    <Button type="submit" :label="loading ? 'Logging in...' : 'Login'" :loading="loading" />
                </div>
                <div class="text-center">
                    <p class="text-gray-800">Don't have an account?
                        <RouterLink to="/register" class="text-black underline">Sign up</RouterLink>
                    </p>
                </div>
            </form>
        </div>
    </div>
</template>
import { defineStore } from "pinia";
import axios from "axios";
import { ref, computed } from "vue";

export const authStore = defineStore('auth', () => {
    const ApiUrl = import.meta.env.VITE_API_URL;
    const token = ref(localStorage.getItem('token'));
    const user = ref(JSON.parse(localStorage.getItem('user') || 'null'));
    const loading = ref(false);
    const error = ref(null);

    const isAuthenticated = computed(() => (!!token.value));

    const login = async (credentials) => {
        loading.value = true;
        error.value = null;
        try {
            const response = await axios.post(`${ApiUrl}/api/login`, {
                email: credentials.email,
                password: credentials.password
            });

            token.value = response.data.token;
            user.value = response.data.user;

            localStorage.setItem('token', token.value);
            localStorage.setItem('user', JSON.stringify(user.value));

            return response.data;
        } catch (err) {
            error.value = err.response?.data?.message || err.message;
            throw err;
        } finally {
            loading.value = false;
        }
    };

    return {
        token,
        user,
        loading,
        error,
        isAuthenticated,
        login
    };
});
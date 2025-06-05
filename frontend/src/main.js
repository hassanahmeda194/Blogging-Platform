import './assets/main.css'

import Vue3Toastify, { toast } from 'vue3-toastify'
import 'vue3-toastify/dist/index.css'


import { createApp } from 'vue'
import { createPinia } from 'pinia'

import App from './App.vue'
import router from './router'

const app = createApp(App)

app.use(createPinia())
app.use(router)


const toastOptions = {
    autoClose: 2000,
    position: toast.POSITION.BOTTOM_RIGHT,
    closeOnClick: true,
    pauseOnHover: true,
    draggable: true,
    draggablePercent: 0.6,
    hideProgressBar: true,  
    closeButton: false,   
    theme: 'light',       
    toastClassName: 'bg-white text-black border border-transparent rounded-lg shadow-sm rounded-2', 
    bodyClassName: 'font-secondary',  
    progressClassName: 'bg-gray-300',
};

app.use(Vue3Toastify, toastOptions)

app.mount('#app')





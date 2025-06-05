<script setup>
import { ref } from 'vue';
defineOptions({
    inheritAttrs: false
});

const props = defineProps({
    label: {
        type: String,
        default: ''
    },
    type: {
        type: String,
        default: 'text'
    },
    id: {
        type: String,
        default: ''
    },
    name: {
        type: String,
        default: ''
    },
    errors: {
        type: Array,
        default: []
    }
});

const emit = defineEmits(['inputVal']);
const value = ref('');

function handleInput(event) {
    value.value = event.target.value;
    emit('inputVal', value.value);
}
</script>

<template>
    <div class="w-full">
        <label v-if="label" :for="id" class="block mb-1 text-black font-medium">
            {{ label }}
        </label>
        <input :type="type" :id="id" :name="name" v-model="value" @input="handleInput" v-bind="$attrs"
            class="w-full border border-black rounded px-3 py-2 focus:outline-black focus:border-black dark:focus:border-white bg-white  text-black  transition-colors duration-300" />
        <div v-if="errors">
            <small class="text-danger" v-for="error in errors" :key="error"> {{ error }}</small>
        </div>
    </div>
</template>

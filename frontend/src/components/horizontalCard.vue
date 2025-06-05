<script setup>
defineProps({
    blog: Object
})
</script>
<template>
    <div class=" h-[200px] flex gap-x-2 mb-6">
        <img src="https://placehold.co/600x400" alt="">
        <div class="py-4 px-1">
            <div class="mb-6">
                <h4 class="font-primary mb-3 text-xl font-semibold">Blog Title</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed, odio unde odit earum commodi perspiciatis dignissimos magnam repellendus a ea ad. Exercitationem mollitia molestias doloribus optio obcaecati qui, et asperiores.</p>
            </div>
            <p>view detail   <i class="ri-arrow-right-line mt-3"></i></p>
        </div>
    </div>
</template>
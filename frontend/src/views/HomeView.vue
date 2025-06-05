<script setup>
import HorizontalCard from '@/components/horizontalCard.vue';
import VerticalCard from '@/components/VerticalCard.vue';



</script>

<template>
  <div class="home">
    <div class="first-section py-14 ">
      <div class="flex justify-between items-center mb-8">
        <h2 class="font-primary font-bold text-4xl">Feature Blogs</h2>
        <div>
          <h3>
            <span>
              View all
            </span>
            <i class="ri-arrow-right-line"></i>
          </h3>
        </div>
      </div>
      <div class="flex justify-between items-center gap-x-5">
        <VerticalCard />
        <VerticalCard />
        <VerticalCard />
      </div>
    </div>
    <div class="second-section py-14 ">
      <div class="flex justify-between items-center mb-8">
        <h2 class="font-primary font-bold text-4xl">Blogs</h2>
        <div>
          <h3>
            <span>
              View all
            </span>
            <i class="ri-arrow-right-line"></i>
          </h3>
        </div>
      </div>
      <div class="">
        <HorizontalCard />
        <HorizontalCard />
        <HorizontalCard />
      </div>
    </div>
  </div>
</template>
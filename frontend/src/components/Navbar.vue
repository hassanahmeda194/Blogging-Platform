<template>
    <header>
        <nav class="flex justify-between items-center lg:px-[5vw] py-4 shadow">
            <!-- logo -->
            <div>
               <RouterLink to="/">
                   <h4 class="text-2xl font-bold font-primary" style="letter-spacing: 1px;">Logo</h4>
               </RouterLink>
            </div>
            <div>
                <ul class="flex justify-between items-center gap-x-7">
                    <li>
                        <i class="ri-search-line text-2xl"></i>
                    </li>
                    <li>
                        <i class="ri-sun-line text-2xl"></i>
                        <!-- <i class="ri-moon-line"></i> -->
                    </li>
                    <li>
                        <!-- <i class="ri-account-circle-line"></i> -->
                        <RouterLink to="/login" class="bg-black px-5 pt-1 pb-2 text-white hover:bg-gray-800">Login</RouterLink>
                    </li>

                </ul>
            </div>
        </nav>
    </header>
</template>
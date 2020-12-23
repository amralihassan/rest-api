<template>
    <header class=" flex justify-between min-h-20 bg-blue-800 items-center">
        <h1 class="text-4xl ml-6 text-white">Projectify</h1>
        <ul class="flex">
            <li class="mr-6">
                <router-link :to="{name:'dashboard'}" class="text-blue-600 hover:text-white">Dashboard</router-link>
            </li>
            <li class="mr-6">
                <router-link :to="{name:'projects'}" class="text-blue-600 hover:text-white">Projects</router-link>
            </li>
            <li class="mr-6">
                <router-link :to="{name:'login'}" class="text-blue-600 hover:text-white">Login</router-link>
            </li>
            <li class="mr-6">
                <a href="#" class="text-blue-600 hover:text-white">Logout</a>
            </li>
        </ul>
    </header>
</template>

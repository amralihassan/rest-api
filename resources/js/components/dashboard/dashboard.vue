<template>
    <div class="p-4 m-4 bg-white-rounded flex">
        <div>
            <h1 class="text-2xl text-grey-700">Dashboard</h1>
            <p class="mt-4">Hello <span class="font-bold">{{user.name}}</span> You logind with user name  <span class="font-bold">{{user.email}}</span></p>
        </div>

    </div>
</template>
<script>
import {mapGetters} from 'vuex';
export default {
    computed:{
        ...mapGetters(['user','authenticated'])
    }
}
</script>

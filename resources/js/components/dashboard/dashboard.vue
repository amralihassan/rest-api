<template>
    <div>
        this is for dashboard
        {{user}}
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

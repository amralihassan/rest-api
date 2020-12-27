<template>
    <div class="mb-2 p-2 bg-gray-300 grid grid-cols-3">
        <dev class="flex items-center">{{task.name}}</dev>
        <dev class="flex items-center justify-center">{{task.due_date}}</dev>
        <dev class="flex items-center justify-center">
            <button class="bg-orange-500 rounded text-white px-3 py-2 mr-2 hover:bg-orange-700">Edit</button>
            <button class="bg-red-500 rounded text-white px-3 py-2 mr-2 hover:bg-red-700">Delete</button>

        </dev>
    </div>
</template>
<script>
export default {
    props:['task']
}
</script>

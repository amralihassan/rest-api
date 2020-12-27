<template>
    <div class="p-4 m-4 bg-white rounded flex flex-col">
        <div class="flex justify-between">
            <h1 class="text-2xl text-gray-700">Project Details  {{id}}</h1>
            <button @click="deleteProject" class="bg-red-500 rounded text-white px-3 py-2 mr-2 hover:bg-red-700">Delete Project</button>
        </div>
        <div v-if="project.id > 0">
            <div class="flex">
                <div class="w-1/6 p-2">
                    <div class="bg-gray-400 text-gray-700 p-2 text-left">
                        Project Name
                    </div>
                </div>
                <div class="w-1/2 p-2">
                    <div class="bg-gray-400 text-gray-700 p-2 text-left">
                        {{project.name}}
                    </div>
                </div>
            </div>

            <div class="flex">
                <div class="w-1/6 p-2">
                    <div class="bg-gray-400 text-gray-700 p-2 text-left">
                        Created at
                    </div>
                </div>
                <div class="w-1/2 p-2">
                    <div class="bg-gray-400 text-gray-700 p-2 text-left">
                        {{project.created_at}}
                    </div>
                </div>
            </div>

            <div class="flex">
                <div class="w-1/6 p-2">
                    <div class="bg-gray-400 text-gray-700 p-2 text-left">
                        Updated at
                    </div>
                </div>
                <div class="w-1/2 p-2">
                    <div class="bg-gray-400 text-gray-700 p-2 text-left">
                        {{project.updated_at}}
                    </div>
                </div>
            </div>
        </div>

        <div class="my-4" v-if="tasks_count > 0">
            <h1 class="text-2xl text-gray-700 mb-4">Tasks</h1>
            <task-items v-for="task in project.tasks" :key="task.id" :task="task"></task-items>
        </div>
    </div>
</template>
<script>
import TaskItems from './task-items.vue';
export default {
    props :['id'],
    components :{
        TaskItems
    },
    data(){
        return{
            project:[],
            tasks_count:null
        }
    },
    mounted(){
        axios.get('/api/projects/' + this.id).then((res) =>{
            this.project = res.data.data;
            this.tasks_count = this.project.tasks.length;

        });
    },

}
</script>

<template>
    <div class="p-4 m-4 bg-white rounded flex flex-col">
        <div class="justify-between flex">
            <h1 class="text-2xl text-gray-700">Projects</h1>
            <button class="bg-gray-500 rounded text-white px-3 py-2 mr-2 hover:bg-gray-700">Add Project</button>
        </div>

        <div class="justify-center flex">
            <table class="table-auto justify-center">
                <thead>
                    <tr>
                        <th class="border px-4 py-2">ID</th>
                        <th class="border px-4 py-2">Name</th>
                        <th class="border px-4 py-2">Tasks</th>
                        <th class="border px-4 py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <project-items v-for="project in projects" :key="project.id" :project="project" @project-deleted="fetchProjects"></project-items>
                </tbody>
            </table>
        </div>
    </div>
</template>
<script>
import ProjectItems from './project-items';

export default {
    components:{
        ProjectItems
    },
    data(){
        return{
            projects:[]
        }
    },
    methods:{
            fetchProjects(){
                    axios.get('/api/projects').then((res) =>{
                    this.projects = res.data.data;
                });
            }
    },
    mounted(){
            this.fetchProjects();
        }

}
</script>

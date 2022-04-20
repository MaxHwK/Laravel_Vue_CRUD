<template>
    <div>
        <table class="table table-bordered text-center align-middle">
            <thead>
                <tr class="table-dark align-middle">
                    <th>Id</th>
                    <th>Number</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Technologies</th>
                    <th>Client</th>
                    <th>Type</th>
                    <th>Responsable</th>
                    <th>Start Date</th>
                    <th>Estimated End Date</th>
                    <th>Real End Date</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th class="w-25">Actions</th>
                </tr>
            </thead>
            <tbody>                  
                <tr v-for="(project, index) in objects" :key="index" >
                    <td>{{ project.id }}</td>
                    <td>{{ project.numero }}</td>
                    <td>{{ project.nom }}</td>
                    <td>{{ project.description }}</td>
                    <td>{{ project.technologies }}</td>
                    <td>{{ project.client ? project.client.nom : '' }}</td>
                    <td>{{ project.type ? project.type.libelle : '' }}</td>
                    <td>{{ project.responsable }}</td>
                    <td>{{ project.date_debut | formatDate }}</td>
                    <td>{{ project.date_fin_estimee | formatDate }}</td>
                    <td v-if="project.date_fin_reelle">{{ project.date_fin_reelle | formatDate }}</td>
                    <td v-else></td>
                    <td>{{ project.created_at | formatDateTime }}</td>
                    <td>{{ project.updated_at | formatDateTime }}</td>
                    <td>  
                        <a class="btn btn-primary mt-1" :href="showProjectRoute + project.id">
                            <i class="bi bi-eye-fill"></i>
                        </a>

                        <a class="btn btn-warning mt-1" :href="showProjectRoute + project.id + '/edit'">
                            <i class="bi bi-pencil-fill"></i>
                        </a>

                        <button v-on:click="removeRow(project.id)" class="btn btn-danger mt-1">
                            <i class="bi bi-trash-fill"></i>
                        </button>
                    </td>
                </tr>                  
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        name: 'table-component',
        props: {
            rows: {
                type: Array,
                required: true
            },
            concept: {
                type: String,
                required: true
            }
        },
        mounted() {
            this.objects = this.rows
        },
        methods: {
            async removeRow(id) {
                if (confirm('Do you really want to delete this project ?')) {
                    try {
                        let response = await axios.delete('projects/'+id)
                        this.objects = response.data.projects
                    } catch (error) {
                        console.log(error)
                    }
                }
            }
        },
        data() {
            return {
                objects: [],
                debut: null,
                fin: null,
                showProjectRoute: "/projects/",
        
            }
        },   
    };
</script>
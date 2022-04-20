<template>
    <div>
        <table class="table table-bordered text-center align-middle">
            <thead>
                <tr class="table-dark align-middle">
                    <th>Id</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Postal Code</th>
                    <th>City</th>
                    <th>Country</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th class="w-25">Actions</th>
                </tr>
            </thead>
            <tbody>                  
                <tr v-for="(client, index) in objects" :key="index" >
                    <td>{{ client.id }}</td>
                    <td>{{ client.nom }}</td>
                    <td>{{ client.adresse }}</td>
                    <td>{{ client.cp }}</td>
                    <td>{{ client.ville }}</td>
                    <td>{{ client.country ? client.country.libelle : '' }}</td>
                    <td>{{ client.created_at | formatDateTime }}</td>
                    <td>{{ client.updated_at | formatDateTime }}</td>
                    <td>  
                        <a class="btn btn-primary mt-1" :href="showClientRoute + client.id">
                            <i class="bi bi-eye-fill"></i>
                        </a>

                        <a class="btn btn-warning mt-1" :href="showClientRoute + client.id + '/edit'">
                            <i class="bi bi-pencil-fill"></i>
                        </a>

                        <button v-on:click="removeRow(client.id)" class="btn btn-danger mt-1">
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
                if (confirm('Do you really want to delete this client ?')) {
                    try {
                        let response = await axios.delete('clients/'+id)
                        this.objects = response.data.clients
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
                showClientRoute: "/clients/",
        
            }
        },   
    };
</script>
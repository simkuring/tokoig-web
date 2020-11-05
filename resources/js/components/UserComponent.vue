<template>
    <div class="container">
        <h2>Users</h2>
        <table style="width:100%" class="table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="user in users" :key="user.id">
                    <td>{{user.name}}</td>
                    <td>{{user.username}}</td>
                    <td>{{user.email}}</td>
                    <td>
                        <router-link class="btn btn-primary" :to="'/user/'+user.id">Detail</router-link>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                users: []
            };
        },
        created() {
            this.loadData();
        },
        methods: {
            loadData(){
                axios.get("/api/v1/user")
                    .then(response => {
                        this.users = response.data.data;
                    });
            }
        }
    }
</script>

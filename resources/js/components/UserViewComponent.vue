<template>
    <div class="container" v-if="!loading">
        <h2>{{user.name}}</h2>
        <div class="row">
            <div class="col-md-3"><b>Name :</b></div>
            <div class="col-md-3">{{user.name}}</div>
        </div>
        
        <div class="row">
            <div class="col-md-3"><b>Username :</b></div>
            <div class="col-md-3">{{user.username}}</div>
        </div>
        
        <div class="row">
            <div class="col-md-3"><b>Email :</b></div>
            <div class="col-md-3">{{user.email}}</div>
        </div>
        
        <div class="row">
            <div class="col-md-3"><b>Address :</b></div>
            <div class="col-md-3">
                <p>
                    {{user.address.street}}, {{user.address.suite}}, {{user.address.city}}, {{user.address.zipcode}}
                </p>
                <a :href="'https://www.google.com/maps/search/?api=1&query='+user.address.geo.lat+','+user.address.geo.lng" target="_blank" class="btn btn-success"> View on Google Maps </a>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-3"><b>Phone :</b></div>
            <div class="col-md-3">{{user.phone}}</div>
        </div>
        
        <div class="row">
            <div class="col-md-3"><b>Website :</b></div>
            <div class="col-md-3">{{user.website}}</div>
        </div>
        
        <div class="row">
            <div class="col-md-3"><b>Company :</b></div>
            <div class="col-md-3">
                <p>{{user.company.name}}</p>
                <blockquote>{{user.company.catchPhrase}}</blockquote>
                <p><i>{{user.company.bs}}</i></p>
            </div>
        </div>
        <div class="row">
            <button @click="goBack" class="btn btn-primary"> Back </button>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                user: {},
                loading: true
            };
        },
        created() {
            this.loadData();
        },
        methods: {
            loadData(){
                axios.get("/api/v1/user/" + this.$route.params.id)
                    .then(response => {
                        this.user = response.data.data;
                        this.loading = false;
                    });
            },
            goBack(){
                return this.$router.go(-1);
            }
        }
    }
</script>

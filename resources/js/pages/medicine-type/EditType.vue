<template>
    <div>
        <!-- loading -->
        <v-loading 
            :active.sync="isLoading" 
            :is-full-page="fullPage"
            :background-color="'#ffff'"
            :color="'#007bff'"
        >
        </v-loading>

        <div class="basic-form-area mg-b-15 mg-t-50">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                        <div class="sparkline8-list mt-b-30">
                            
                            <div class="sparkline8-hd">
                                <div class="main-sparkline8-hd">
                                    <h1>Edit Medicine Type</h1>
                                    <div class="add-product">
                                        <router-link to="/all-types">All Medicine Types</router-link>
                                    </div>
                                </div>
                            </div>
                            <div class="sparkline8-graph">
                                <div class="basic-login-form-ad">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="basic-login-inner">
                                                <form action="#">
                                                    <div class="form-group-inner">
                                                        <label>Name</label>
                                                        <input type="text" v-model="name" class="form-control" placeholder="Enter group name" />
                                                        <p class="text-danger" v-if="errors.name">{{ errors.name[0] }}</p>
                                                    </div>

                                                    <div class="login-btn-inner">
                                                        <div class="inline-remember-me">
                                                            <button class="btn btn-sm btn-primary pull-left login-submit-cs" type="submit" @click.prevent="updateType">Update</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>

    
</template>

<script>
export default {
    data() {
        return {
            name: '',
            errors: [],
            //loading
            isLoading: false,
            fullPage: true,
        }
    },

    methods: {

        getType() {

            let id = this.$route.params.id;
            let that = this;
            this.isLoading = true;
            axios.get('/type/'+id)
                .then(function (response) {

                    that.name = response.data.medicine_type.name;
                    that.isLoading = false;

                })

        },

        updateType() {

            let data = {
                'id': this.$route.params.id,
                'name': this.name,
            }

            let that = this;
            this.isLoading = true;
            axios.post('/update-type',data)
                .then(function (response) {

                    that.isLoading = false;
                    that.$router.push('/all-types');
                    Toast.fire({
                        icon: 'success',
                        title: 'Medicine type updated successfully!!!'
                    })

                })
                .catch(function (error) {

                    that.errors = error.response.data.errors;
                    that.isLoading = false;
                    
                });

        }

    },

    mounted() {

        this.getType();

    }

}
</script>
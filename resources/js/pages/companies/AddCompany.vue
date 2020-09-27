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
                                    <h1>Add Company</h1>
                                    <div class="add-product">
                                        <router-link to="/all-companies">All Companies</router-link>
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
                                                        <input type="text" v-model="name" class="form-control" placeholder="Enter test name" />
                                                        <p class="text-danger" v-if="errors.name">{{ errors.name[0] }}</p>
                                                    </div>

                                                    <div class="form-group-inner">
                                                        <label>Description</label>
                                                        <textarea class="form-control" v-model="description" cols="83" rows="10" placeholder="Enter description"></textarea>
                                                        <p class="text-danger" v-if="errors.description">{{ errors.description[0] }}</p>
                                                    </div>
                                                    <div class="login-btn-inner">
                                                        <div class="inline-remember-me">
                                                            <button class="btn btn-sm btn-primary pull-left login-submit-cs" type="submit" @click.prevent="addCompany">Save</button>
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
            description: '',
            errors: [],

            //loading
            isLoading: false,
            fullPage: true
        }
    },

    methods: {

        addCompany() {

            //loading
            this.isLoading = true;

            let data = {
                'name': this.name,
                'description': this.description
            }

            let that = this;

            axios.post('/save-company',data)
                .then(function (response) {

                    //loading
                    that.isLoading = false;

                    that.$router.push('/all-companies');
                    Toast.fire({
                        icon: 'success',
                        title: 'Company added successfully!!!'
                    })
                })
                .catch(function (error) {

                    //loading
                    that.isLoading = false;

                    that.errors = error.response.data.errors;
                    
                });

        }

    }
}
</script>
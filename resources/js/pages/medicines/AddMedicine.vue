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
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="sparkline8-list mt-b-30">
                        
                        <div class="sparkline8-hd">
                            <div class="main-sparkline8-hd">
                                <h1>Add Medicine</h1>
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
                                                    <label>Type</label>
                                                    <v-select label="name" 
                                                        v-model="type_id" 
                                                        :reduce="type => type.id" 
                                                        :options="types" 
                                                    >
                                                    </v-select>
                                                    <p class="text-danger" v-if="errors.type">{{ errors.type[0] }}</p>
                                                </div>

                                                <div class="form-group-inner">
                                                    <label>Group</label>
                                                    <v-select label="name" 
                                                        v-model="group_id" 
                                                        :reduce="group => group.id" 
                                                        :options="groups" 
                                                    >
                                                    </v-select>
                                                    <p class="text-danger" v-if="errors.group">{{ errors.group[0] }}</p>
                                                </div>

                                                <div class="form-group-inner">
                                                    <label>Company</label>
                                                    <v-select label="name" 
                                                        v-model="company_id" 
                                                        :reduce="company => company.id" 
                                                        :options="companies" 
                                                    >
                                                    </v-select>
                                                    <p class="text-danger" v-if="errors.company">{{ errors.company[0] }}</p>
                                                </div>

                                                <div class="form-group-inner">
                                                    <label>Description</label>
                                                    <textarea class="form-control" v-model="description" cols="83" rows="10" placeholder="Enter Details"></textarea>
                                                    <p class="text-danger" v-if="errors.description">{{ errors.description[0] }}</p>
                                                </div>

                                                <div class="login-btn-inner">
                                                    <div class="inline-remember-me">
                                                        <button class="btn btn-sm btn-primary pull-left login-submit-cs" type="submit" @click.prevent="addMedicine">Save</button>
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
            group_id: '',
            type_id: '',
            company_id: '',

            errors: [],

            types: [],
            groups: [],
            companies: [],

            //loading
            isLoading: false,
            fullPage: true
        }
    },

    methods: {

        addMedicine() {

            let data = {
                'name': this.name,
                'description': this.description,
                'company': this.company_id,
                'type': this.type_id,
                'group': this.group_id
            }

            // console.log(data);
            
            //loading
            this.isLoading = true;
            
            let that = this;

            axios.post('/save-medicine',data)
                .then(function (response) {

                    //loading
                     that.isLoading = false; 

                    // console.log(response)
                    that.$router.push('/all-medicines');
                    Toast.fire({
                        icon: 'success',
                        title: 'Medicine added successfully!!!'
                    })
                })
                .catch(function (error) {

                    //loading
                     that.isLoading = false; 

                    that.errors = error.response.data.errors;
                    // console.log(error.response.data);
                    
                });

        },

        getAdditionalMedicineData() {

            let that = this;
            axios.get('/get-additional-medicine-data')
                .then(function (response) {

                    that.types      = response.data.types;
                    that.groups     = response.data.groups;
                    that.companies  = response.data.companies;

                })

        }

    },

    mounted() {
        
        this.getAdditionalMedicineData();
    
    }
}
</script>
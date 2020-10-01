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

        <div class="breadcome-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="breadcome-list">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="breadcome-heading">
                                        <form role="search" class="sr-input-func">
                                            <input type="text" v-model="search" @keyup="searchItems" placeholder="Search..." class="search-int form-control">
                                            <a href="#"><i class="fa fa-search"></i></a>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Static Table Start -->
        <div class="static-table-area">
            <div class="container-fluid">
              
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline11-list mt-b-30">
                            <div class="sparkline11-hd">
                                <div class="main-sparkline11-hd">
                                    <h1>All Companies</h1>
                                    <div class="add-product">
                                       <router-link to="/add-company">Add Company</router-link>
                                   </div>
                                </div>
                            </div>
                            <div class="sparkline11-graph" v-if="companies.data">
                                <div class="static-table-list">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Description</th>
                                                <th>Created At</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr v-for="(company,index) in companies.data" :key="index">
                                                <td>{{ company.id }}</td>
                                                <td><span class="pie"> {{ company.name }} </span></td>
                                                <td>{{ company.description | shortLength(50,"...")}}</td>
                                                <td>{{ company.created_at  | timeformat}}</td>
                                                <td>
                                                    <div class="inline-remember-me action-inliner">
                                                        <!-- <a  @click.prevent="editCompany(company.id)" href="#" class="pull-left btn btn-info login-submit-cs btn-space" type="submit"><i class="fa fa-pencil"></i></a>
                                                        <a @click.prevent="deleteConfirmation(company.id)" href="#" class="pull-left btn btn-danger login-submit-cs" type="submit"><i class="fa fa-trash"></i></a> -->

                                                        <button data-toggle="tooltip" title="Edit" class="pd-setting-ed" @click="editCompany(company.id)"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                                        <button data-toggle="tooltip" title="Trash" class="pd-setting-ed" @click="deleteConfirmation(company.id)"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                                    </div>
                                                </td>
                                            </tr>
                                           
                                        </tbody>
                                    </table>
                                </div>

                                <div class="custom-pagination align-right">
                                    <nav aria-label="Page navigation example">
                                        <pagination :data="companies" @pagination-change-page="getAllCompanies"></pagination>
                                    </nav>
                                </div>

                            </div>
                              <div v-else>
                                 <h4>No Data Founds!!</h4>
                              </div>

                        </div>
                    </div>
                </div>
                
            </div>
        </div>

    </div>
</template>

<script>
import _ from "lodash"
export default {
    
    data() {
        return {
            companies: [],
            selected_company_id: '',
            search:'',

            //loading
            isLoading: false,
            fullPage: true

        }
    },

    methods: {

        searchItems: _.debounce(function(){
            this.getAllCompanies();
        },500),

        getAllCompanies( page = 1 ) {

            //loading
            this.isLoading = true;

            let that = this;
            axios.get(`/companies?q=${this.search}&page=${page}`)
                .then(function (response) {
                    that.companies = response.data;
                    //loading
                    that.isLoading = false
                })

        },

        editCompany( id ) {

            this.$router.push('/edit-company/'+id);

        },

        deleteCompany() {

            //loading
            this.isLoading = true;

            let id = this.selected_company_id;
            let that = this;

            axios.delete('/delete-company/'+id)
                .then(function (response) {

                    //loading
                    that.isLoading = false;

                    that.selected_company_id = '';
                    that.getAllCompanies();

                    that.$router.push('/all-companies');
                    Toast.fire({
                        icon: 'warning',
                        title: 'Company deleted successfully!!!'
                    })

                })

        },

        deleteConfirmation( id ) {

            this.selected_company_id = id;
            let that = this;

            swalWithBootstrapButtons.fire({
                title: 'Do you want to delete the selected Company?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Delete',
                cancelButtonText: 'Cancel',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {

                    that.deleteCompany();

                } 
            })
        }

    },

    mounted() {

        this.getAllCompanies();

    }
}
</script>





   
    
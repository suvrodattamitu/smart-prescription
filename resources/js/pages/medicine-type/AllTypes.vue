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
                                    <h1>All Medicine Types</h1>
                                    <div class="add-product">
                                       <router-link to="/add-type">Add Medicine Type</router-link>
                                    </div>
                                </div>
                            </div>
                            <div class="sparkline11-graph" v-if="medicine_types.data">
                                <div class="static-table-list">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Created At</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr v-for="(type,index) in medicine_types.data" :key="index">
                                                <td>{{ type.id }}</td>
                                                <td><span class="pie"> {{ type.name }} </span></td>
                                                <td>{{ type.created_at | timeformat }}</td>
                                                <td>
                                                    <div class="inline-remember-me">
                                                        <!-- <button  @click.prevent="editType(type.id)" href="#" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></i></button> -->
                                                        <button data-toggle="tooltip" title="Edit" class="pd-setting-ed" @click="editType(type.id)"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                                        <button data-toggle="tooltip" title="Thrash" class="pd-setting-ed" @click="deleteConfirmation(type.id)"><i class="fa fa-trash-o" aria-hidden="true"></i></button>

                                                        <!-- <a @click.prevent="deleteConfirmation(type.id)" href="#" class="pull-left btn btn-danger login-submit-cs" type="submit"><i class="fa fa-trash"></i></a> -->
                                                    </div>
                                                </td>
                                            </tr>
                                           
                                        </tbody>
                                        
                                    </table>
                                    
                                </div>

                                <div class="custom-pagination align-right">
                                    <nav aria-label="Page navigation example">
                                        <pagination :data="medicine_types" @pagination-change-page="getAllTypes"></pagination>
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

import _ from 'lodash';

export default {
    
    data() {
        return {
            medicine_types: [],
            selected_type_id: '',
            //loading
            isLoading: false,
            fullPage: true,
            search: ''
        }
    },

    methods: {

        searchItems: _.debounce(function () {
            this.getAllTypes();
        }, 500),

        getAllTypes(page = 1) {

            let that = this;
            this.isLoading = true;
            axios.get(`/types?q=${this.search}&page=${page}`)
                .then(function (response) {

                    console.log(response.data);
                    that.medicine_types = response.data;
                    that.isLoading = false;

                })

        },

        editType( id ) {

            this.$router.push('/edit-type/'+id);

        },
        
        deleteType() {

            let id = this.selected_type_id;
            let that = this;

            this.isLoading = true;
            axios.delete('/delete-type/'+id)
                .then(function (response) {
                    that.selected_type_id = '';
                    that.isLoading = true;
                    that.getAllTypes();

                    that.$router.push('/all-types');
                    Toast.fire({
                        icon: 'warning',
                        title: 'Medicine type deleted successfully!!!'
                    })

                })

        },

        deleteConfirmation( id ) {

            this.selected_type_id = id;
            let that = this;

            swalWithBootstrapButtons.fire({
                title: 'Do you want to delete the selected type?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Delete',
                cancelButtonText: 'Cancel',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {

                    that.deleteType();

                } 
            })
        }
    
    },

    mounted() {

        this.getAllTypes();

    }
}
</script>





   
    
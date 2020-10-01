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
                                    <h1>All Medical Tests</h1>
                                    <div class="add-product">
                                       <router-link to="/add-test">Add Medical Test</router-link>
                                   </div>
                                </div>
                            </div>
                            <div class="sparkline11-graph"  v-if="medical_tests.data">
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

                                            <tr v-for="(test,index) in medical_tests.data" :key="index">
                                                <td>{{ test.id }}</td>
                                                <td><span class="pie"> {{ test.name }} </span></td>
                                                <td>{{ test.description | shortLength(50,"...")}}</td>
                                                <td>{{ test.created_at  | timeformat}}</td>
                                                <td>
                                                    <div class="inline-remember-me action-inliner">
                                                        <!-- <a  @click.prevent="editTest(test.id)" href="#" class="pull-left btn btn-info login-submit-cs btn-space" type="submit"><i class="fa fa-pencil"></i></a>
                                                        <a @click.prevent="deleteConfirmation(test.id)" href="#" class="pull-left btn btn-danger login-submit-cs" type="submit"><i class="fa fa-trash"></i></a> -->
                                                        
                                                        <button data-toggle="tooltip" title="Edit" class="pd-setting-ed" @click="editTest(test.id)"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                                        <button data-toggle="tooltip" title="Trash" class="pd-setting-ed" @click="deleteConfirmation(test.id)"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                                    </div>
                                                </td>
                                            </tr>                                          
                                        </tbody>                                           
                                    </table>  
                                </div>
                                <div class="custom-pagination align-right">
                                    <nav aria-label="Page navigation example">
                                        <pagination :data="medical_tests" @pagination-change-page="getAllTests"></pagination>
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
            medical_tests: [],
            selected_test_id: '',
            search: '',

             //loading
            isLoading: false,
            fullPage: true
        }
    },

    methods: {

        searchItems:_.debounce(function(){
            this.getAllTests();
        },500),
        
        getAllTests( page = 1 ) {
            this.isLoading = true
            let that = this;
            axios.get(`/tests?q=${this.search}&page=${page}`)
            
                .then(function (response) {
                    //console.log(response)
                    that.medical_tests = response.data;
                    that.isLoading = false
                    console.log(response.data);
                })

        },

        editTest( id ) {

            this.$router.push('/edit-test/'+id);

        },

        deleteTest() {

            let id = this.selected_test_id;
            let that = this;
            
            //loading
            this.isLoading = true

            axios.delete('/delete-test/'+id)
                .then(function (response) {

                    //loading
                    that.isLoading = false
                    
                    that.selected_test_id = '';
                    that.getAllTests();
                    
                    that.$router.push('/all-tests');
                    Toast.fire({
                        icon: 'warning',
                        title: 'Medical test deleted successfully!!!'
                    })

                })

        },

        deleteConfirmation( id ) {

            this.selected_test_id = id;
            let that = this;

            swalWithBootstrapButtons.fire({
                title: 'Do you want to delete the selected test?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Delete',
                cancelButtonText: 'Cancel',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {

                    that.deleteTest();

                } 
            })
        }

    },

    mounted() {

        this.getAllTests();

    }
}
</script>





   
    
<template>
    <div v-loading="isLoading" element-loading-text="Loading...">
        <div class="breadcome-area" v-if="medical_tests.data && medical_tests.data.length">
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

        <div class="static-table-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline11-list mt-b-30" v-if="medical_tests.data && medical_tests.data.length">
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
                        </div>

                        <div class="empty-list row" v-else>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="sparkline11-list mt-b-30">
                                    <div class="sparkline11-list mt-30 place-middle">
                                        <div class="sparkline11-hd container-box">
                                            <div class="main-sparkline11-hd place-middle">
                                                <h1>No medicine types found!</h1>
                                                <el-button type="success" @click="$router.push('/add-type')">
                                                    Add Type
                                                </el-button>
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

        <el-dialog
            title="Delete Test"
            :visible.sync="dialogVisible"
            width="30%"
        >
            <span>Are you sure to delete this medical test!</span>
            <span slot="footer" class="dialog-footer">
                <el-button @click="dialogVisible = false">Cancel</el-button>
                <el-button type="danger" @click="deleteTest">Confirm</el-button>
            </span>
        </el-dialog>
    </div>
</template>

<script type="text/babel">
import _ from "lodash"
export default {
    data() {
        return {
            medical_tests: [],
            selected_test_id: '',
            search: '',
            isLoading: false,
            fullPage: true,
            dialogVisible: false
        }
    },

    methods: {
        searchItems:_.debounce(function(){
            this.getAllTests();
        },500),
        
        getAllTests( page = 1 ) {
            this.isLoading = true;
            let that = this;

            axios.get(`/tests?q=${this.search}&page=${page}`)
                .then((response) => {
                    that.medical_tests = response.data;
                }).catch(() => {

                }).then(() => {
                    that.isLoading = false;
                })
        },

        editTest( id ) {
            this.$router.push('/edit-test/'+id);
        },

        deleteTest() {
            let id = this.selected_test_id;
            let that = this;
            this.isLoading = true;

            axios.delete('/delete-test/'+id)
                .then(function (response) {                    
                    that.selected_test_id = '';
                    that.getAllTests();
                    
                    that.$router.push('/all-tests');

                    that.$message({
                        message: 'Medical test deleted successfully!!!',
                        type: 'success'
                    });
                }).catch(() => {

                }).then(() => {
                    that.isLoading = false;
                    that.dialogVisible = false;
                })
        },

        deleteConfirmation( id ) {
            this.selected_test_id = id;
            this.dialogVisible = true;
        }
    },

    mounted() {
        this.getAllTests();
    }
}
</script>
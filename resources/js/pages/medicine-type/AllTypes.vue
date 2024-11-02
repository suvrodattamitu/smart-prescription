<template>
    <div v-loading="isLoading" element-loading-text="Loading...">
        <div class="breadcome-area" v-if="medicine_types.data && medicine_types.data.length">
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
                        <div class="sparkline11-list mt-b-30" v-if="medicine_types.data && medicine_types.data.length">
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
                                                <td>{{ type.name }}</td>
                                                <td>{{ type.created_at | timeformat }}</td>
                                                <td class="width-100">
                                                    <div class="inline-remember-me action-inliner">
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
            title="Delete Type"
            :visible.sync="dialogVisible"
            width="30%"
            :before-close="handleClose"
        >
            <span>Are you sure to delete this medicine type!</span>
            <span slot="footer" class="dialog-footer">
                <el-button @click="dialogVisible = false">Cancel</el-button>
                <el-button type="danger" @click="deleteType">Confirm</el-button>
            </span>
        </el-dialog>
    </div>
</template>

<script type="text/babel">
import _ from 'lodash';

export default {
    data() {
        return {
            medicine_types: [],
            selected_type_id: '',
            isLoading: false,
            fullPage: true,
            search: '',
            dialogVisible: false
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
                    that.medicine_types = response.data;
                }).catch((error) => {

                }).then(() => {
                    that.isLoading = false
                })
        },

        editType( id ) {
            this.$router.push('/edit-type/' + id);
        },
        
        deleteType() {
            let id = this.selected_type_id;
            let that = this;

            this.isLoading = true;
            axios.delete('/delete-type/'+id)
                .then(function (response) {
                    that.selected_type_id = '';
                    that.getAllTypes();

                    that.$router.push('/all-types');

                    that.$message({
                        message: 'Medicine type deleted successfully!!!',
                        type: 'success'
                    });
                }).catch((error) => {

                }).then(() => {
                    that.isLoading = false;
                    this.dialogVisible = false;
                })
        },

        deleteConfirmation( id ) {
            this.selected_type_id = id;
            this.dialogVisible = true;
        }
    },

    mounted() {
        this.getAllTypes();
    }
}
</script>
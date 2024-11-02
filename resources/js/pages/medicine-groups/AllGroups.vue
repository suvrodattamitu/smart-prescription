<template>
    <div v-loading="isLoading" element-loading-text="Loading...">
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

        <div class="static-table-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline11-list mt-b-30" v-if="medicine_groups.data && medicine_groups.data.length">
                            <div class="sparkline11-hd">
                                <div class="main-sparkline11-hd">
                                    <h1>All Medicine Groups</h1>
                                    <div class="add-product">
                                       <router-link to="/add-group">Add Medicine Group</router-link>
                                   </div>
                                </div>
                            </div>
                            <div class="sparkline11-graph" v-if="medicine_groups.data">
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
                                            <tr v-for="(group,index) in medicine_groups.data" :key="index">
                                                <td>{{ group.id }}</td>
                                                <td><span class="pie"> {{ group.name }} </span></td>
                                                <td>{{ group.description | shortLength(50,"...")}}</td>
                                                <td>{{ group.created_at | timeformat}}</td>
                                                <td>
                                                    <div class="inline-remember-me action-inliner">
                                                        <button data-toggle="tooltip" title="Edit" class="pd-setting-ed" @click="editGroup(group.id)"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                                        <button data-toggle="tooltip" title="Trash" class="pd-setting-ed" @click="deleteConfirmation(group.id)"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>                          
                                </div>

                                <div class="custom-pagination align-right">
                                    <nav aria-label="Page navigation example">
                                        <pagination :data="medicine_groups" @pagination-change-page="getAllGroups"></pagination>
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
            title="Delete Group"
            :visible.sync="dialogVisible"
            width="30%"
            :before-close="handleClose"
        >
            <span>Are you sure to delete this medicine group!</span>
            <span slot="footer" class="dialog-footer">
                <el-button @click="dialogVisible = false">Cancel</el-button>
                <el-button type="danger" @click="deleteGroup">Confirm</el-button>
            </span>
        </el-dialog>
    </div>
</template>

<script type="text/babel">
export default {
    data() {
        return {
            medicine_groups: [],
            selected_group_id: '',
            search:'',
            isLoading: false,
            fullPage: true,
            dialogVisible: false
        }
    },

    methods: {
        searchItems: _.debounce(function () {
            this.getAllGroups();
        }, 500),

        getAllGroups( page = 1 ) {
            let that = this;
            this.isLoading = true;

            axios.get(`/groups?q=${this.search}&page=${page}`)
                .then(function (response) {
                    that.medicine_groups = response.data;
                }).catch((error) => {

                }).then(() => {
                    that.isLoading = false;
                })
        },

        editGroup( id ) {
            this.$router.push('/edit-group/'+id);
        },
        
        deleteGroup() {
            let id = this.selected_group_id;
            let that = this;
            this.isLoading = true;

            axios.delete('/delete-group/'+id)
                .then(function (response) {
                    that.selected_group_id = '';
                    that.getAllGroups();
                    that.isLoading = false;
                    that.$router.push('/all-groups');
                    
                    that.$message({
                        message: 'Medicine group deleted successfully!!!',
                        type: 'success'
                    });
                }).catch((error) => {

                }).then(() => {
                    that.isLoading = false;
                    this.dialogVisible = false;
                });
        },

        deleteConfirmation( id ) {
            this.selected_group_id = id;
            this.dialogVisible = true;
        }
    },

    mounted() {
        this.getAllGroups();
    }
}
</script>
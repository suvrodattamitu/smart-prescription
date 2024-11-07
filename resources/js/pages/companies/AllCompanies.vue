<template>
    <div v-loading="isLoading" element-loading-text="Loading...">
        <div class="static-table-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline11-list custom-table-padding" v-if="companies && companies.length">
                                <div class="row mb-10">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="sparkline11-hd">
                                            <div class="breadcome-heading">
                                                <div role="search" class="sr-input-func">
                                                    <el-input type="text" v-model="search" @keyup.enter="getAllCompanies" placeholder="Search..." class="search-int" />
                                                    <a href="#"><i class="fa fa-search"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="sparkline11-hd">
                                            <div class="add-product product-button-padding">
                                                <router-link to="/add-company"><i class="el-icon-circle-plus"></i> Add Company</router-link>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="sparkline11-graph">
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
                                                <tr v-for="(company,index) in companies" :key="index">
                                                    <td>{{ company.id }}</td>
                                                    <td><span class="pie"> {{ company.name }} </span></td>
                                                    <td>{{ company.description | shortLength(50,"...")}}</td>
                                                    <td>{{ company.created_at  | timeformat}}</td>
                                                    <td class="width-100">
                                                        <div class="inline-remember-me action-inliner">
                                                            <button data-toggle="tooltip" title="Edit" class="pd-setting-ed" @click="editCompany(company.id)"><i class="color-success  fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                                            <button data-toggle="tooltip" title="Trash" class="pd-setting-ed" @click="deleteConfirmation(company.id)"><i class="color-danger fa fa-trash-o" aria-hidden="true"></i></button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="custom-pagination align-right">
                                        <el-pagination
                                            @size-change="handleSizeChange"
                                            @current-change="handleCurrentChange"
                                            :current-page.sync="currentPage"
                                            :page-sizes="[2, 5, 10, 50, 100, 200, 300, 400]"
                                            :page-size="currentSize"
                                            layout="total, sizes, prev, pager, next, jumper"
                                            :total="total"
                                        >
                                        </el-pagination>
                                    </div>
                                </div>
                        </div>
                        
                        <div class="empty-list row" v-else>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="sparkline11-list mt-b-30">
                                    <div class="sparkline11-list mt-30 place-middle">
                                        <div class="sparkline11-hd container-box">
                                            <div class="main-sparkline11-hd place-middle">
                                                <h1>No Companies found!</h1>
                                                <el-button type="success" @click="$router.push('/add-company')">
                                                    Add Company
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
            title="Delete Company"
            :visible.sync="dialogVisible"
            width="30%"
            :before-close="handleClose"
        >
            <span>Are you sure to delete this company!</span>

            <span slot="footer" class="dialog-footer">
                <el-button @click="dialogVisible = false">Cancel</el-button>
                <el-button type="danger" @click="deleteCompany">Confirm</el-button>
            </span>
        </el-dialog>
    </div>
</template>

<script type="text/babel">
export default {
    data() {
        return {
            dialogVisible: false,
            companies: [],
            selected_company_id: '',
            search: '',
            isLoading: false,
            fullPage: true,
            total: 0,
            currentPage: parseInt(this.$route.query.page || 1),
            pageSize: 0,
            currentSize: parseInt(this.$route.query.paginate || 10)
        }
    },

    methods: {
        handleClose() {
            this.dialogVisible = false;
        },

        handleSizeChange(val) {
            this.$router.push(`/all-companies?page=${this.currentPage}&paginate=${val}`)
            this.currentSize = val;
            this.getAllCompanies();
        },

        handleCurrentChange(val) {
            this.$router.push(`/all-companies?page=${val}&paginate=${this.currentSize}`)
            this.currentPage = val;
            this.getAllCompanies();
        },

        getAllCompanies( page = 1 ) {
            this.isLoading = true;

            let that = this;
            axios.get(`/companies?q=${this.search}&page=${this.currentPage}&paginate=${this.currentSize}`)
                .then( (response) => {
                    if (response) {
                        that.companies = response.data.companies;
                        this.total = response.data.total;
                    }
                }).catch((error) => {
                    // error
                }).then(() => {
                    that.isLoading = false
                })
        },

        editCompany( id ) {
            this.$router.push('/edit-company/'+id);
        },

        deleteCompany() {
            this.isLoading = true;
            let id = this.selected_company_id;
            let that = this;

            axios.delete('/delete-company/'+id)
                .then(function (response) {
                    that.selected_company_id = '';
                    that.getAllCompanies();

                    that.$router.push('/all-companies');

                    that.$message({
                        message: 'Company deleted successfully!!!',
                        type: 'success'
                    });
                }).catch((error) => {
                    //error
                }).then(() => {
                    that.isLoading = false;
                    this.dialogVisible = false;
                })
        },

        deleteConfirmation(id) {
            this.selected_company_id = id;
            this.dialogVisible = true;
        }
    },

    mounted() {
        this.getAllCompanies();
    }
}
</script>
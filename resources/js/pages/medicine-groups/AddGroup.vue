<template>
    <div v-loading="isLoading" element-loading-text="Loading...">
        <div class="basic-form-area mg-b-15 mg-t-50">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                        <div class="sparkline8-list mt-b-30">
                            <div class="sparkline8-hd">
                                <div class="main-sparkline8-hd">
                                    <h1>Add Medicine Group</h1>
                                    <div class="add-product">
                                        <router-link to="/all-groups">All Medicine Groups</router-link>
                                    </div>
                                </div>
                            </div>
                            <div class="sparkline8-graph">
                                <div class="basic-login-form-ad">
                                    <el-row>
                                        <el-col :span="21">
                                            <el-form ref="form"  label-width="120px" class="mg-t-50">
                                                <el-form-item>
                                                    <label>Name</label>
                                                    <el-input type="text" v-model="name" placeholder="Enter group name" />
                                                    <p class="text-danger" v-if="errors.name">{{ errors.name[0] }}</p>
                                                </el-form-item>

                                                <el-form-item>
                                                    <label>Description</label>
                                                    <el-input type="textarea" v-model="description" cols="83" rows="10" placeholder="Enter description"></el-input>
                                                    <p class="text-danger" v-if="errors.description">{{ errors.description[0] }}</p>
                                                </el-form-item>

                                                <el-form-item>
                                                    <el-button type="success" size="medium" @click.prevent="addGroup">Save</el-button>
                                                </el-form-item>
                                            </el-form>
                                        </el-col>
                                    </el-row>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script type="text/babel">
export default {
    data() {
        return {
            name: '',
            description: '',
            errors: [],
            isLoading: false,
            fullPage: true
        }
    },

    methods: {
        addGroup() {
            let data = {
                'name': this.name,
                'description': this.description
            }
            let that = this;
            this.isLoading = true;

            axios.post('/save-group',data)
                .then(function (response) {
                    that.$router.push('/all-groups');

                    that.$message({
                        message: 'Group added successfully!!!',
                        type: 'success'
                    });
                })
                .catch(function (error) {
                    that.errors = error.response.data.errors;                    
                }).then(() => {
                    that.isLoading = false;
                });
        }
    }
}
</script>
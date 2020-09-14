<template>
    <div>
        <div class="breadcome-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="breadcome-list">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="breadcome-heading">
                                        <form role="search" class="sr-input-func">
                                            <input type="text" placeholder="Search..." class="search-int form-control">
                                            <a href="#"><i class="fa fa-search"></i></a>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <ul class="breadcome-menu">
                                        <li><a href="#">Home</a> <span class="bread-slash">/</span>
                                        </li>
                                        <li><span class="bread-blod">Dashboard V.1</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     <div class="basic-form-area mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                    <div class="sparkline8-list mt-b-30">
                        
                        <div class="sparkline8-hd">
                            <div class="main-sparkline8-hd">
                                <h1>Add a medicine group</h1>
                            </div>
                        </div>
                        <div class="sparkline8-graph">
                            <div class="basic-login-form-ad">
                                <div class="row">
                                    <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
                                        <div class="basic-login-inner">
                                            <form action="#">

                                                <div class="form-group-inner">
                                                    <label>Name</label>
                                                    <input type="text" v-model="name" class="form-control" placeholder="Enter test name" />
                                                    <!-- <p class="text-danger" v-if="errors.name">{{ errors.name[0] }}</p> -->
                                                </div>

                                                <div class="form-group-inner">
                                                    <label>Description</label>
                                                    <textarea class="form-control" v-model="description" cols="83" rows="10" placeholder="Enter description"></textarea>
                                                    <!-- <p class="text-danger" v-if="errors.description">{{ errors.description[0] }}</p> -->
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
            errors: []
        }
    },

    methods: {

        addMedicine() {

            let data = {
                'name': this.name,
                'description': this.description
            }

            let that = this;

            axios.post('/save-medicine',data)
                .then(function (response) {
                    that.$router.push('/all-medicines');
                })
                .catch(function (error) {

                    that.errors = error.response.data.errors;
                    console.log(error.response.data);
                    
                });

        }

    }
}
</script>
<template>
<div>
    <div class="breadcome-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="breadcome-list single-page-breadcome">
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
                                    <li><span class="bread-blod">Settings</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="single-pro-review-area mt-t-30 mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-payment-inner-st">
                        <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="review-content-section">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                     <h4 class="mg-b-30">Change Password</h4>
                                                    <div class="devit-card-custom">
                                                        <span class="text-danger" v-if="errors.match_password">{{ errors.match_password[0] }}</span>
                                                        <div class="form-group">
                                                            <input type="text" v-model="current_password" class="form-control" placeholder="Current Password">
                                                            <span class="text-danger" v-if="errors.current_password">{{ errors.current_password[0] }}</span>
                                                        </div>
                                                         <div class="form-group">
                                                            <input type="text" v-model="new_password" class="form-control" placeholder="Type A New Password">
                                                            <span class="text-danger" v-if="errors.new_password">{{ errors.new_password[0] }}</span>
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="text" v-model="confirm_password" class="form-control" placeholder="Confirm Password">
                                                            <span class="text-danger" v-if="errors.confirm_password">{{ errors.confirm_password[0] }}</span>
                                                        </div>
                                                        <a @click.prevent="changePassword" type="submit" class="btn btn-primary waves-effect waves-light">Change</a>
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
</div>
</template>

<script>
export default {
    data(){
        return{
            current_password:'',
            new_password:'',
            confirm_password:'',
            errors:[],
        }
    },
    mounted() {
        jQuery('#myTabedu1 a').on('click', function (e) {
		  e.preventDefault()
		  $(this).tab('show')
        });
        
    },
    methods:{
        changePassword(){
           let data={
               'current_password' : this.current_password,
               'new_password' : this.new_password,
               'confirm_password' : this.confirm_password,
           }

           let that = this
           axios.post('/change-password',data)
           .then(function (response) {
                    Toast.fire({
                        icon: 'success',
                        title: 'Password changed successfully!!!'
                    })

                })
                .catch(function (error) {

                    that.errors = error.response.data.errors;
                    console.log(error.response.data);
                    
                });
        }
    }

}
</script>
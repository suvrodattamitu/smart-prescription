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


    <div class="single-pro-review-area mg-t-50 mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-payment-inner-st">
                        <ul id="myTabedu1" class="tab-review-design">
                            <li class="active"><a href="#description">Header/Footer of prescription</a></li>
                            <li><a href="#reviews"> Change Password</a></li>
                        </ul>
                        <div id="myTabContent" class="tab-content custom-product-edit">
                            <div class="product-tab-list tab-pane fade active in" id="description">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="review-content-section">
                                            <div id="dropzone1" class="pro-ad">
                                                <form action="#" class="dropzone dropzone-custom needsclick add-professors" id="demo1-upload">
                                                    <div class="row">
                                                        <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
                                                            <div class="form-group">
                                                                <h4>Header</h4>
                                                                <textarea class="form-control p-input" id="summernote1" v-model="header"  cols="30" rows="10"></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <h4>Footer</h4>
                                                                <textarea  id="summernote2" v-model="footer" cols="30" rows="10"></textarea>
                                                            </div>
                                                            <a @click.prevent="saveHeaderFooter" type="submit" class="btn btn-primary waves-effect waves-light">Submit</a>
                                                        </div>
                                                        
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-tab-list tab-pane fade" id="reviews">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="review-content-section">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
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
            header:'',
            footer:'',

            //loading
            isLoading: false,
            fullPage: true

        }
    },

    mounted() {
        
        let that = this;
        that.isLoading = true;
        setTimeout(function(){
            that.getHeaderFooter();
            jQuery('#myTabedu1 a').on('click', function (e) {
                e.preventDefault()
                $(this).tab('show')
            });
        },2000);
                
    },
    methods:{
     
        getHeaderFooter(){

            this.isLoading = true;
            let that= this
            axios.get('/get-header-footer')
            .then(function (response){

                jQuery('#summernote1').summernote('code', response.data.info.header);
                jQuery('#summernote2').summernote('code', response.data.info.footer);

                that.header = response.data.info.header;
                that.footer = response.data.info.footer;
                that.isLoading = false;

            })
        },
        saveHeaderFooter(){

            let header = jQuery('#summernote1').val();
            let footer = jQuery('#summernote2').val();

            let data = {
                header: header,
                footer: footer
            }

            console.log('data',data)

            let that = this
            axios.post('/update-header-footer',data)
            .then(function (response){
                Toast.fire({
                    icon: 'success',
                    title: 'Header and footer updated successfully!!!'
                })
            })
        },
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
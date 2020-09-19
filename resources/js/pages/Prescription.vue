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
                                            <!-- <input type="text" placeholder="Search..." class="search-int form-control">
                                            <a href="#"><i class="fa fa-search"></i></a> -->
                                        </form>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <ul class="breadcome-menu">
                                        <li><router-link to="/">Home</router-link> <span class="bread-slash">/</span>
                                        </li>
                                        <li><span class="bread-blod">Add Patient</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

     <div class="profile-details-hr">
         <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-12 col-xs-6">
                <div class="address-hr">
                    <p><b>Date</b><br /> {{ patient_details.created_at | timeformat }}</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 col-xs-6">
                <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                    <p><b>Visiting No</b><br /> {{ patient_details.visiting_no}}</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 col-xs-6">
                <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                    <p><b>Regi No</b><br /> {{ patient_details.regi_no}}</p>
                </div>
            </div>
             <div class="col-lg-3 col-md-6 col-sm-12 col-xs-6">
                <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                    <p><b>Status</b><br /> <span style="color:rgb(0,255,0);">On Going</span></p>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-12 col-xs-6">
                <div class="address-hr">
                    <p><b>Patient Name</b><br /> {{ patient_details.name }}</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 col-xs-6">
                <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                    <p><b>Address</b><br /> {{ patient_details.address}}</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 col-xs-6">
                <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                    <p><b>Mobile</b><br /> {{ patient_details.mobile}}</p>
                </div>
            </div>
             <div class="col-lg-3 col-md-6 col-sm-12 col-xs-6">
                <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                    <p><b>Sex</b><br /> <span v-if="patient_details.gender == 0">Male</span>
                    <span v-else>Female</span></p>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-12 col-xs-6">
                <div class="address-hr">
                    <p><b>C_C</b><br /> {{ patient_details.c_c }}</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 col-xs-6">
                <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                    <p><b>On Exam</b><br /> {{ patient_details.on_exam}}</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 col-xs-6">
                <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                    <p><b>P_A_EXAM</b><br /> {{ patient_details.p_a_exam}}</p>
                </div>
            </div>
             <div class="col-lg-3 col-md-6 col-sm-12 col-xs-6">
                <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                    <p><b>Visiting Status</b><br /> New</p>
                </div>
            </div>
        </div>
     </div>

     <div class="basic-form-area mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="sparkline8-list mt-b-30">
                        
                        <div class="sparkline8-hd">
                            <div class="main-sparkline8-hd">
                                <h1>Medicine Section</h1>
                                <div class="add-product">
                                       <router-link to="#">ADD</router-link>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="sparkline8-graph">
                            <div class="basic-login-form-ad">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="basic-login-inner">
                                            <form action="#">                                                
                                                <div class="form-group-inner">
                                                    <!-- <label>Medical Test</label> -->
                                                    <!-- <input type="number" v-model="gender" class="form-control" placeholder="Enter gender" /> -->
                                                    <div style="float:left" class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                                                        <select name="gender"  class="">
                                                            <option value="">Medicine type</option>
                                                            <option value="0">TypeOne</option>
                                                            <option value="1">TypeTwo</option>
                                                        </select>
                                                        <select name="gender"  class="">
                                                            <option value="">Medicine</option>
                                                            <option value="0">MedicineOne</option>
                                                            <option value="1">MedicineTwo</option>
                                                        </select>
                                                    </div>
                                                   <div  style="float:left" class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
                                                    <span style="margin-left:15px">
                                                        <label style="margin-right: 8px; font-size:15px; font-weight:normal;"> B <input class="radio-checked" checked="" type="checkbox"></label>
                                                        <label style="margin-right: 8px; font-size:15px; font-weight:normal;"> L <input class="radio-checked" type="checkbox"></label>
                                                        <label style="margin-right: 5px; font-size:15px; font-weight:normal;"> D <input class="radio-checked" type="checkbox"></label>
                                                    </span>
                                                    <span style="margin-left:25px">
                                                        <label style="margin-right: 15px; font-size: 15px; font-weight:normal"> Before Meal <input class="radio-checked" checked="" type="checkbox"></label>
                                                        <label style="margin-right:  5px; font-size: 15px; font-weight:normal"> After Meal  <input class="radio-checked"  type="checkbox"></label>   
                                                    </span>
                                                   </div>

                                                   <div style="float:left" class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                                                        <input type="text" placeholder="Duration" style="width:70px; height:21px; border-radius:2px; padding:5px; border: 1px solid #000;">
                                                        <select name="gender"  class="">
                                                            <option value="">Select</option>
                                                            <option value="0">Days</option>
                                                            <option value="1">Months</option>
                                                            <option value="1">Continue</option>
                                                        </select>
                                                    </div>
                                                   
                                                    <!-- <p class="text-danger" v-if="errors.gender">{{ errors.gender[0] }}</p> -->
                                                </div>
                                                
                                                <!-- <div class="login-btn-inner">
                                                    <div class="inline-remember-me">
                                                        <button class="btn btn-sm btn-primary pull-left login-submit-cs" type="submit" @click.prevent="addPatient">Save</button>
                                                    </div>
                                                </div> -->
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

     <div class="basic-form-area mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="sparkline8-list mt-b-30">
                        
                        <div class="sparkline8-hd">
                            <div class="main-sparkline8-hd">
                                <h1>Medical Test Section</h1>
                            </div>
                        </div>
                        <div class="sparkline8-graph">
                            <div class="basic-login-form-ad">
                                <div class="row">
                                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                        <div class="basic-login-inner">
                                            <form action="#">                                                
                                                <div class="form-group-inner">
                                                    <label>Medical Test</label>
                                                    <!-- <input type="number" v-model="gender" class="form-control" placeholder="Enter gender" /> -->
                                                    <select name="gender"  class="form-control">
                                                        <option value="0">TypeOne</option>
                                                        <option value="1">TypeTwo</option>
                                                    </select>
                                                    <br>
                                                    <textarea class="form-control" name="" id="" cols="30" rows="5" placeholder="Enter the description"></textarea>
                                                    <!-- <p class="text-danger" v-if="errors.gender">{{ errors.gender[0] }}</p> -->
                                                </div>
                                                
                                                <!-- <div class="login-btn-inner">
                                                    <div class="inline-remember-me">
                                                        <button class="btn btn-sm btn-primary pull-left login-submit-cs" type="submit" @click.prevent="addPatient">Save</button>
                                                    </div>
                                                </div> -->
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

    <div class="basic-form-area mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="sparkline8-list mt-b-30">
                        
                        <div class="sparkline8-hd">
                            <div class="main-sparkline8-hd">
                                <h1>Suggestions Section</h1>
                            </div>
                        </div>
                        <div class="sparkline8-graph">
                            <div class="basic-login-form-ad">
                                <div class="row">
                                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                        <div class="basic-login-inner">
                                            <form action="#">                                                
                                                <div class="form-group-inner">
                                                    <!-- <label>Suggestions</label> -->
                                                    
                                                    <textarea class="form-control" name="" id="" cols="30" rows="5" placeholder="Enter the suggestions"></textarea>
                                                    <!-- <p class="text-danger" v-if="errors.gender">{{ errors.gender[0] }}</p> -->
                                                </div>
                                                
                                                <div class="login-btn-inner">
                                                    <div class="inline-remember-me">
                                                        <button class="btn btn-sm btn-primary pull-left login-submit-cs" type="submit" @click.prevent="addPatient">Save Prescription</button>
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
        return{
          patient_details:{}
        }
    },
    mounted(){
       this.getPatientDetails();
    },

    methods:{
        getPatientDetails() {
             let that = this;
            axios.get('/patient-details/'+this.$route.params.id)
            .then(response=>{
               that.patient_details = response.data.patient_details
               console.log(response.data)
            })
        }
    }
}
</script>
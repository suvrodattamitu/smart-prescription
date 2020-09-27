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
                                            <input type="text" placeholder="Search..." class="search-int form-control">
                                            <a href="#"><i class="fa fa-search"></i></a>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <ul class="breadcome-menu">
                                        <li><a href="#">Home</a> <span class="bread-slash">/</span>
                                        </li>
                                        <li><span class="bread-blod">View Patient</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

         <div class="product-status mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="background:white;  margin-left:18px;  padding:15px;">

                            <h4>Patient Details</h4> <br>
                            <div class="add-product">
                                <router-link :to="`/prescribe/${$route.params.id}`">Prescribe</router-link>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mg-t-30">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                     <label for="">Visiting No : </label>
                                     <span>{{ patient.visiting_no }}</span>
                                </div>

                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                     <label for="">Regi No : </label>
                                     <span>{{ patient.regi_no }}</span>
                                </div>

                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                     <label for="">Created : </label>
                                     <span>{{ patient.created_at | timeformat }}</span>
                                </div>

                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                     <label for="">Marital Status : </label>
                                     <span v-if="patient.marital_status==0">Married</span>
                                     <span v-else>Unmarried</span>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mg-t-30">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                     <label for="">Name : </label>
                                     <span>{{ patient.name }}</span>
                                </div>

                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                     <label for="">Address : </label>
                                     <span>{{ patient.address }}</span>
                                </div>

                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                     <label for="">Mobile : </label>
                                     <span>{{ patient.mobile }}</span>
                                </div>

                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                     <label for="">Prescribed : </label>
                                     <span v-if="is_prescribed==1">Prescribed</span>
                                     <span v-else>Not Prescribed</span>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mg-t-30">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                     <label for="">Age : </label>
                                     <span>{{ patient.age }}</span>
                                </div>

                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                     <label for="">Height : </label>
                                     <span>{{ patient.height }}</span>
                                </div>

                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                     <label for="">Weight : </label>
                                     <span>{{ patient.weight }}</span>
                                </div>

                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                     <label for="">Gender : </label>
                                     <span v-if="gender==0">Male</span>
                                     <span v-else>Female</span>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mg-t-30">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                     <label for="">CC : </label>
                                     <span>{{ patient.c_c }}</span>
                                </div>

                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                     <label for="">On Exam : </label>
                                     <span>{{ patient.on_exam }}</span>
                                </div>

                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                     <label for="">P_A_Exam : </label>
                                     <span>{{ patient.p_a_exam }}</span>
                                </div>

                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                     <label for="">Status : </label>
                                     <span>New</span>
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
            patient:{},
            //loading
            isLoading: false,
            fullPage: true
        }
    },

    mounted(){
        this.getPatient();
    },

    methods:{
        getPatient(){
            this.isLoading = true;
            let that = this
            axios.get('/get-patient/'+this.$route.params.id)
            .then((response)=>{
                that.patient = response.data.patient
                that.isLoading = false;
            })
        }
    }
}
</script>
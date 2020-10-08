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

         <div class="product-status mg-b-15 mg-t-50">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="background:white;  margin-left:18px;  padding:15px;">
                            <h4>Patient Details</h4> <br>
                            <div class="add-product">
                                <span><router-link :to="`/prescribe/${$route.params.id}`">Prescribe</router-link></span>
                                <span><router-link to="/all-patients" style="margin-right:120px; background:green;">All Patients</router-link></span>
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
                                     <span v-if="patient.is_prescribed==1" style="color:green;">Prescribed</span>
                                     <span v-else style="color:red;">Not Prescribed</span>
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
                                     <span v-if="patient.gender==0">Male</span>
                                     <span v-else>Female</span>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mg-t-30">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                     <label for="">CC : </label>
                                     <span v-html="patient.c_c"></span>
                                </div>

                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                     <label for="">On Exam : </label>
                                     <span v-html="patient.on_exam"></span>
                                </div>

                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                     <label for="">P_A_Exam : </label>
                                     <span v-html="patient.p_a_exam"></span>
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
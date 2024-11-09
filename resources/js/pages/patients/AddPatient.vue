<template>
    <div v-loading="isLoading" element-loading-text="Loading...">
     <div class="basic-form-area mg-b-15 mg-t-50">
        <div class="container-fluid">
            <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                        <div class="sparkline8-list mt-b-30">
                            <div class="sparkline8-hd">
                                <div class="main-sparkline8-hd">
                                    <h1>Add Patient</h1>
                                    <div class="add-product">
                                        <router-link to="/all-patients">All Patients</router-link>
                                    </div>
                                </div>
                            </div>
                            <div class="sparkline8-graph">
                                <div class="basic-login-form-ad">
                                    <el-row>
                                        <el-steps :active="active" finish-status="success">
                                            <el-step title="Patient Details"></el-step>
                                            <el-step title="General"></el-step>
                                            <el-step title="Done"></el-step>
                                        </el-steps>

                                        <el-button style="margin-top: 12px;" @click="next">Next step</el-button>
                                        
                                        <el-form ref="form"  label-width="120px" class="mg-t-50" v-if="active === 0">
                                            <el-row>
                                                <el-col :span="12">
                                                    <el-form-item>
                                                        <label>Name</label>
                                                        <el-input type="text" v-model="patient.name" placeholder="Enter name" />
                                                        <p class="text-danger" v-if="errors['patient.name']">{{ errors['patient.name'][0] }}</p>
                                                    </el-form-item>
                                                </el-col>

                                                <el-col :span="12">
                                                    <el-form-item>
                                                        <label>Age</label>
                                                        <el-input type="number" v-model="patient.age" placeholder="Enter age" />
                                                        <p class="text-danger" v-if="errors['patient.age']">{{ errors['patient.age'][0] }}</p>
                                                    </el-form-item>
                                                </el-col>
                                            </el-row>
                                            <el-row>                                                   
                                                <el-col :span="12">
                                                    <el-form-item>
                                                        <label>Height</label>
                                                        <el-input type="number" v-model="patient.height" placeholder="Enter height" />
                                                        <p class="text-danger" v-if="errors['patient.height']">{{ errors['patient.height'][0] }}</p>
                                                    </el-form-item>
                                                </el-col>

                                                <el-col :span="12">
                                                    <el-form-item>
                                                        <label>Weight</label>
                                                        <el-input type="number" v-model="patient.weight" placeholder="Enter Weight" />
                                                        <p class="text-danger" v-if="errors['patient.weight']">{{ errors['patient.weight'][0] }}</p>
                                                    </el-form-item>
                                                </el-col>
                                            </el-row>
                                            <el-row>  
                                                <el-col :span="12">
                                                    <el-form-item>
                                                        <label>Gender</label><br>
                                                        <el-select v-model="patient.gender" placeholder="Gender">
                                                            <el-option value="Male">Male</el-option>
                                                            <el-option value="Female">Female</el-option>
                                                        </el-select>
                                                        <p class="text-danger" v-if="errors['patient.gender']">{{ errors['patient.gender'][0] }}</p>
                                                    </el-form-item>
                                                </el-col>

                                                <el-col :span="12">
                                                    <el-form-item>
                                                        <label>Marital Status</label><br>
                                                        <el-select v-model="patient.marital_status" placeholder="Marital Status">
                                                            <el-option value="Married">Married</el-option>
                                                            <el-option value="Unmarried">Unmarried</el-option>
                                                        </el-select>
                                                        <p class="text-danger" v-if="errors['patient.marital_status']">{{ errors['patient.marital_status'][0] }}</p>
                                                    </el-form-item>
                                                </el-col>
                                            </el-row>
                                            <el-row>  
                                                <el-col :span="12">
                                                    <el-form-item>
                                                        <label>Mobile</label>
                                                        <el-input type="number" v-model="patient.mobile" placeholder="Enter mobile no" />
                                                        <p class="text-danger" v-if="errors['patient.mobile']">{{ errors['patient.mobile'][0] }}</p>
                                                    </el-form-item>
                                                </el-col>
                                                <el-col :span="12">
                                                    <el-form-item>
                                                        <label>Address</label>
                                                        <el-input type="text" v-model="patient.address" placeholder="Enter address" />
                                                        <p class="text-danger" v-if="errors['patient.address']">{{ errors['patient.address'][0] }}</p>
                                                    </el-form-item>
                                                </el-col>
                                            </el-row>
                                        </el-form>

                                        <el-form ref="form"  label-width="120px" class="mg-t-50" v-if="active === 1">
                                            <el-row>
                                                <el-col :span="12">
                                                    <el-form-item>
                                                        <label>CC</label>
                                                        <el-input type="textarea"  cols="30" rows="5" v-model="prescription.c_c" resize="none"></el-input>
                                                        <p class="text-danger" v-if="errors['prescription.c_c']">{{ errors['prescription.c_c'][0] }}</p>
                                                    </el-form-item>
                                                </el-col>

                                                <el-col :span="12">
                                                    <el-form-item>
                                                        <label>On Exam</label>
                                                        <el-input type="textarea" cols="30" rows="5" v-model="prescription.on_exam" resize="none"></el-input>
                                                        <p class="text-danger" v-if="errors['prescription.on_exam']">{{ errors['prescription.on_exam'][0] }}</p>
                                                    </el-form-item>
                                                </el-col>
                                            </el-row>
                                            <el-row>                                                   
                                                <el-col :span="12">
                                                    <el-form-item>
                                                        <label>Pa On Exam</label>
                                                        <el-input type="textarea" cols="30" rows="5" v-model="prescription.pa_exam" resize="none"></el-input>
                                                        <p class="text-danger" v-if="errors['prescription.pa_exam']">{{ errors['prescription.pa_exam'][0] }}</p>
                                                    </el-form-item>
                                                </el-col>
                                            </el-row>
                                        </el-form>

                                        <div v-if="active === 2">
                                           <h4>We are all set to save</h4> 
                                        </div>
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

<script>
let patient_details = {
    name: '',
    regi_no: '',
    visiting_no: '',
    age: '',
    height: '',
    weight: '',
    mobile: '',
    address: '',
    gender: '',
    marital_status: '',
};

let prescription_details = {
    c_c: '',
    on_exam: '',
    pa_exam: '',
};

export default {
    data() {
        return {
            patient: {
                ...patient_details
            },

            prescription: {
                ...prescription_details
            },
            errors: [],
            isLoading: false,
            fullPage: true,
            active: 0
        }
    },

    mounted(){
        
    },

    methods: {
        next() {
            if (this.active++ > 1) {
                this.active = 0;
                this.addPatient()
            }
        },

        addPatient() {
            let data = {
                patient: this.patient, 
                prescription: this.prescription
            };
            
            this.isLoading = true;
            let that = this;            
            axios.post('/save-patient', data)
                .then((response) => {
                    that.$router.push('/all-patients');
                    that.$message({
                        type: 'success',
                        message: 'Patient added successfully!!!'
                    });
                }).catch((error) => {
                    this.$message({
                        type: 'error',
                        message: error.response.data.message
                    });

                    that.errors = error.response.data.errors;
                }).then(() => {
                    that.isLoading = false
                });
        }
    }
}
</script>
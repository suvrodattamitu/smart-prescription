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
                                       <li><router-link to="/">Home</router-link> <span class="bread-slash">/</span>
                                        </li>
                                        <li><span class="bread-blod">Edit Patient</span>
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
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="sparkline8-list mt-b-30">
                        
                        <div class="sparkline8-hd">
                            <div class="main-sparkline8-hd">
                                <h1>Edit Patient</h1>
                                <div class="add-product">
                                       <router-link to="/all-patients">All Patients</router-link>
                                    </div>
                            </div>
                        </div>
                        <div class="sparkline8-graph">
                            <div class="basic-login-form-ad">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="basic-login-inner">
                                            <form action="#">
                                                
                                                <div class="form-group-inner">
                                                    <label>Visiting No</label>
                                                    <input type="number" v-model="visiting_no" class="form-control" placeholder="Enter visiting no" />
                                                    <p class="text-danger" v-if="errors.visiting_no">{{ errors.visiting_no[0] }}</p>
                                                </div>

                                                <div class="form-group-inner">
                                                    <label>Regi No</label>
                                                    <input type="number" v-model="regi_no" class="form-control" placeholder="Enter regi no" />
                                                    <p class="text-danger" v-if="errors.regi_no">{{ errors.regi_no[0] }}</p>
                                                </div>

                                                <div class="form-group-inner">
                                                    <label>Name</label>
                                                    <input type="text" v-model="name" class="form-control" placeholder="Enter name" />
                                                    <p class="text-danger" v-if="errors.name">{{ errors.name[0] }}</p>
                                                </div>

                                                
                                                <div class="form-group-inner">
                                                    <label>Age</label>
                                                    <input type="number" v-model="age" class="form-control" placeholder="Enter age" />
                                                    <p class="text-danger" v-if="errors.age">{{ errors.age[0] }}</p>
                                                </div>

                                                <div class="form-group-inner">
                                                    <label>Gender</label>
                                                    <!-- <input type="number" v-model="gender" class="form-control" placeholder="Enter gender" /> -->
                                                    <select name="gender" v-model="gender" class="form-control">
                                                        <option value="0">Male</option>
                                                        <option value="1">Female</option>
                                                    </select>
                                                    <p class="text-danger" v-if="errors.gender">{{ errors.gender[0] }}</p>
                                                </div>

                                                <div class="form-group-inner">
                                                    <label>Weight</label>
                                                    <input type="number" v-model="weight" class="form-control" placeholder="Enter Weight" />
                                                    <p class="text-danger" v-if="errors.weight">{{ errors.weight[0] }}</p>
                                                </div>

                                                <div class="form-group-inner">
                                                    <label>Height</label>
                                                    <input type="number" v-model="height" class="form-control" placeholder="Enter height" />
                                                    <p class="text-danger" v-if="errors.height">{{ errors.height[0] }}</p>
                                                </div>

                                                <div class="form-group-inner">
                                                    <label>Marital Status</label>
                                                    <!-- <input type="number" v-model="marital_status" class="form-control" placeholder="Enter marital status" /> -->
                                                    <select name="marital_status" v-model="marital_status" class="form-control">
                                                        <option value="0">Married</option>
                                                        <option value="1">Unmarried</option>
                                                    </select>
                                                    <p class="text-danger" v-if="errors.marital_status">{{ errors.marital_status[0] }}</p>
                                                </div>

                                                <div class="form-group-inner">
                                                    <label>Mobile</label>
                                                    <input type="number" v-model="mobile" class="form-control" placeholder="Enter mobile no" />
                                                    <p class="text-danger" v-if="errors.mobile">{{ errors.mobile[0] }}</p>
                                                </div>

                                                <div class="form-group-inner">
                                                    <label>Address</label>
                                                    <input type="text" v-model="address" class="form-control" placeholder="Enter address" />
                                                    <p class="text-danger" v-if="errors.address">{{ errors.address[0] }}</p>
                                                </div>

                                                <div class="form-group-inner">
                                                    <label>CC</label>
                                                    <textarea class="form-control" name="" id="" cols="30" rows="5" v-model="c_c"></textarea>
                                                    <p class="text-danger" v-if="errors.c_c">{{ errors.c_c[0] }}</p>
                                                </div>

                                                <div class="form-group-inner">
                                                    <label>On Exam</label>
                                                    <textarea class="form-control" name="" id="" cols="30" rows="5" v-model="on_exam"></textarea>
                                                    <p class="text-danger" v-if="errors.on_exam">{{ errors.on_exam[0] }}</p>
                                                </div>

                                                <div class="form-group-inner">
                                                    <label>Pa On Exam</label>
                                                    <textarea class="form-control" name="" id="" cols="30" rows="5" v-model="p_a_exam"></textarea>
                                                    <p class="text-danger" v-if="errors.p_a_exam">{{ errors.p_a_exam[0] }}</p>
                                                </div>

                                                
                                                <div class="login-btn-inner">
                                                    <div class="inline-remember-me">
                                                        <button class="btn btn-sm btn-primary pull-left login-submit-cs" type="submit" @click.prevent="updatePatient">Update</button>
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
            regi_no: '',
            visiting_no: '',
            age: '',
            height: '',
            weight: '',
            mobile: '',
            address: '',
            gender: '',
            marital_status: '',
            c_c: '',
            on_exam: '',
            p_a_exam: '',
            errors: [],

             //loading
            isLoading: false,
            fullPage: true
        }
    },

    methods: {

        getPatient() {
            //loading
            this.isLoading = true;

            let id = this.$route.params.id;
            let that = this;
            axios.get('/patient/'+id)
                .then(function (response) {
                    
                    that.name = response.data.patient.name;
                    that.regi_no = response.data.patient.regi_no;
                    that.visiting_no = response.data.patient.visiting_no;
                    that.age = response.data.patient.age;
                    that.height = response.data.patient.height;
                    that.weight = response.data.patient.weight;
                    that.mobile = response.data.patient.mobile;
                    that.address = response.data.patient.address;
                    that.gender = response.data.patient.gender;
                    that.marital_status = response.data.patient.marital_status;
                    that.c_c = response.data.patient.c_c;
                    that.on_exam = response.data.patient.on_exam;
                    that.p_a_exam = response.data.patient.p_a_exam;

                    //loading
                    that.isLoading = false

                })

        },

        updatePatient() {

            let data = {
                'id': this.$route.params.id,
                'name': this.name,
                'regi_no': this.regi_no,
                'age': this.age,
                'height': this.height,
                'weight': this.weight,
                'mobile': this.mobile,
                'address': this.address,
                'gender': this.gender,
                'marital_status': this.marital_status,
                'c_c': this.c_c,
                'on_exam': this.on_exam,
                'p_a_exam': this.p_a_exam,
                'visiting_no': this.visiting_no,
            }

            //loading
            this.isLoading = true;
            let that = this;

            axios.post('/update-patient',data)
                .then(function (response) {
                    
                    //loading
                    that.isLoading = false

                    that.$router.push('/all-patients');
                    Toast.fire({
                        icon: 'success',
                        title: 'Patient updated successfully!!!'
                    })

                })
                .catch(function (error) {
                    
                    //loading
                    that.isLoading = false

                    that.errors = error.response.data.errors;
                    console.log(error.response.data);
                    
                });

        }

    },

    mounted() {

        this.getPatient();

    }
}
</script>
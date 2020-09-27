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
                      <!-- <input type="text" placeholder="Search..." class="search-int form-control">
                      <a href="#"><i class="fa fa-search"></i></a>-->
                    </form>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <ul class="breadcome-menu">
                    <li>
                      <router-link to="/">Home</router-link>
                      <span class="bread-slash">/</span>
                    </li>
                    <li>
                      <span class="bread-blod">Add Patient</span>
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
            <p>
              <b>Date</b>
              <br />
              {{ patient_details.created_at | timeformat }}
            </p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 col-xs-6">
          <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
            <p>
              <b>Visiting No</b>
              <br />
              {{ patient_details.visiting_no}}
            </p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 col-xs-6">
          <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
            <p>
              <b>Regi No</b>
              <br />
              {{ patient_details.regi_no}}
            </p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 col-xs-6">
          <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
            <p>
              <b>Status</b>
              <br />
              <span style="color:rgb(0,255,0);">On Going</span>
            </p>
          </div>
        </div>
      </div>
      <hr />
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-12 col-xs-6">
          <div class="address-hr">
            <p>
              <b>Patient Name</b>
              <br />
              {{ patient_details.name }}
            </p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 col-xs-6">
          <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
            <p>
              <b>Address</b>
              <br />
              {{ patient_details.address}}
            </p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 col-xs-6">
          <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
            <p>
              <b>Mobile</b>
              <br />
              {{ patient_details.mobile}}
            </p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 col-xs-6">
          <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
            <p>
              <b>Sex</b>
              <br />
              <span v-if="patient_details.gender == 0">Male</span>
              <span v-else>Female</span>
            </p>
          </div>
        </div>
      </div>
      <hr />
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-12 col-xs-6">
          <div class="address-hr">
            <p>
              <b>C_C</b>
              <br />
              {{ patient_details.c_c }}
            </p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 col-xs-6">
          <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
            <p>
              <b>On Exam</b>
              <br />
              {{ patient_details.on_exam}}
            </p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 col-xs-6">
          <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
            <p>
              <b>P_A_EXAM</b>
              <br />
              {{ patient_details.p_a_exam}}
            </p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 col-xs-6">
          <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
            <p>
              <b>Visiting Status</b>
              <br />New
            </p>
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
                    <a href="#" @click.prevent="addMedicineDetailsRow">ADD</a>
                  </div>
                </div>
              </div>
              <br />
              <div class="sparkline8-graph">
                <div class="basic-login-form-ad">
                  <div class="row"  v-for="(medicine_details_row,index) in medicine_details_rows" :key="index">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <div class="basic-login-inner">
                        <form action="#">
                          <div class="form-group-inner">
                            
                            <div style="float:left" class="col-lg-4 col-md-12 col-sm-12 col-xs-12 pull-left">
                              
                              <input
                                type="text"
                                style="display:inline;height:22px;border-radius:2px; padding:5px; border: 1px solid #000;"
                                @input="onChange"
                                v-model="medicine_details_row.medicine_name"
                                @keydown.down="onArrowDown"
                                @keydown.up="onArrowUp"
                                @keydown.enter="onEnter"
                                @click="selectedRow(medicine_details_row)"
                                placeholder="Medicine Name"
                              />

                              <!-- <select name="medicine_type" class v-model="medicine_details_row.type_id" style="display:inline; width:130px!important;">
                                <option  value>Medicine type</option>
                                <option v-for="(type,index) in medicine_types" :value="type.id" :key="index" style="font-size:10px;">{{ type.name }}</option>
                                
                              </select> -->
                              <ul v-if="medicines.length"
                                v-show="medicine_details_row.isOpen"
                                class="autocomplete-results"
                              >
                                <li
                                  style="cursor:pointer"
                                  v-for="(medicine, index) in medicines"
                                  :key="index"
                                  @click="setResult(medicine)"
                                  class="autocomplete-result"
                                  :class="{ 'is-active': index === arrowCounter }"
                                >
                                  <span>{{ medicine.name }}</span> 
                                  <small>[ {{ medicine.type.name }} ]</small>

                                  <!-- <span  v-for="(type,index) in medicine_types"  :key="index">
                                      <small v-if="medicine.type_id == type.id">[ {{ type.name }} ]</small>
                                  </span> -->
                                </li>
                                
                              </ul>

                              <ul v-else>
                               
                                <li>
                                  <p>No results found!</p>
                                </li>
                                
                              </ul>

                            </div>
                            
                            <div style="float:left" class="col-lg-2 col-md-12 col-sm-12 col-xs-12">
                              <span style="margin-left:15px">
                                <label
                                  style="margin-right: 8px; font-size:15px; font-weight:normal;"
                                >
                                  B
                                  <input class="radio-checked" v-model="medicine_details_row.eating_time_breakfast" name="name1" value="0" checked type="checkbox" />
                                </label>
                                <label
                                  style="margin-right: 8px; font-size:15px; font-weight:normal;"
                                >
                                  L
                                  <input class="radio-checked"  v-model="medicine_details_row.eating_time_lunch" name="name2" value="1" type="checkbox" />
                                </label>
                                <label
                                  style="margin-right: 5px; font-size:15px; font-weight:normal;"
                                >
                                  D
                                  <input class="radio-checked"  v-model="medicine_details_row.eating_time_dinner" name="name3" value="2" type="checkbox" />
                                </label>
                              </span>
                            </div> 
                            <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                              <span style="margin-left:25px">
                                <label
                                  style="margin-right: 15px; font-size: 15px; font-weight:normal"
                                >
                                  Before Meal
                                  <input class="radio-checked" v-model="medicine_details_row.eating_term" value="0" name="eating_time" checked type="radio" />
                                </label>
                                <label
                                  style="font-size: 15px; font-weight:normal"
                                >
                                  After Meal
                                  <input class="radio-checked" v-model="medicine_details_row.eating_term" value="1" name="eating_time" type="radio" />
                                </label>
                              </span>
                            </div>

                            <div style="float:left" class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                              <input
                              :disabled="medicine_details_row.duration=='2'?true:false"
                                v-model="medicine_details_row.days"
                                type="text"
                                placeholder="Days/Months"
                                style="width:70px; height:22px; border-radius:2px; padding:5px; border: 1px solid #000;"
                              />
                              <select name="gender" class  v-model="medicine_details_row.duration" @change="selectedRow(medicine_details_row)">
                                <option value>Select</option>
                                <option value="0">Days</option>
                                <option value="1">Months</option>
                                <option value="2">Continue</option>
                              </select>
                              <a
                                type="button"
                                class="pull-right"
                                style="cursor:pointer;"
                                v-if="index"
                                @click.prevent="deleteMedicineDetailsRow(index)"
                              >
                                <i class="fa fa-trash" style="color:red;font-size:18px;"></i>
                              </a>
                            </div>

                          </div>

                        </form>
                      </div>
                    </div>
                    <br><br>
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
                  <div class="add-product">
                    <a href="#" @click.prevent="addTestRow">ADD</a>
                  </div>
                </div>
              </div>
              <div class="sparkline8-graph">
                <div class="basic-login-form-ad">
                  <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                      <div class="basic-login-inner">
                        <form action="#">
                          <div
                            class="form-group-inner"
                            v-for="(row,index) in medical_tests_rows"
                            :key="index"
                          >
                            <a
                              type="button"
                              style="margin-bottom:10px;"
                              class="pull-right btn btn-danger btn-sm"
                              v-if="index"
                              @click.prevent="deleteTestRow(index)"
                            >
                              <i class="fa fa-trash"></i>
                            </a>

                            <label>Medical Test</label>
                            <!-- <input type="number" v-model="gender" class="form-control" placeholder="Enter gender" /> -->
                            <select
                              name="gender"
                              class="form-control"
                              v-model="row.medical_test_id"
                            >
                              <option value disabled>Select Test</option>
                              <option v-for="(test,index) in tests" :key="index" :value="test.id">{{ test.name }}</option>
                              <!-- <option value="2">TypeTwo</option> -->
                            </select>
                            <br />
                            <textarea
                              class="form-control"
                              name
                              id
                              cols="30"
                              rows="5"
                              placeholder="Enter the description"
                              v-model="row.description"
                            ></textarea>
                            <!-- <p class="text-danger" v-if="errors.gender">{{ errors.gender[0] }}</p> -->
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

                            <textarea
                              class="form-control"
                              name
                              id
                              cols="30"
                              rows="5"
                              v-model="suggestion"
                              placeholder="Enter the suggestions"
                            ></textarea>
                            <!-- <p class="text-danger" v-if="errors.gender">{{ errors.gender[0] }}</p> -->
                          </div>

                          <div class="login-btn-inner">
                            <div class="inline-remember-me">
                              <button
                                class="btn btn-sm btn-primary pull-left login-submit-cs"
                                type="submit"
                                @click.prevent="updatePrescription"
                              >Update Prescription</button>
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

    props:['prescription_id'],    

    data() {
        return {
          patient_details: {},
          medical_tests_rows: [],
          medicine_details_rows: [],

          //search medicine
          isOpen: false,
          medicines: [],
          search: '',
          isLoading: false,
          arrowCounter: -1,
          selected_row:{},
          tests:[],
          suggestion: '',

          //loading
          isLoading: false,
          fullPage: true

        };
    },
    mounted() {

        this.getMedicalTests();
        this.viewPrescription(this.prescription_id);
        console.log('prescription_id',this.prescription_id);
        //this.medical_tests_rows.push(this.selected_prescription.prescription_tests); 
        //this.getPatientDetails();
    },

    methods: {

        getMedicalTests(){
          let that = this;
          axios.get('/tests')
            .then(function (response) {
                that.tests = response.data.medical_tests;
                // console.log(response.data);
            })
        },

        viewPrescription(prescription_id) {

            //this.prescription_id = prescription_id;

            let that = this;
            this.isLoading = true;
            axios.get('/get-prescription/'+prescription_id)
                .then(function (response) {
                    // that.selected_prescription = response.data.prescription;
                    // that.showEditModal = true;
                    let prescription_data = response.data.prescription;
                    that.suggestion = prescription_data.suggestion;
                    that.patient_details = prescription_data.patient;

                    if(prescription_data.prescription_medicines.length) {
                      for(var i=0;i<prescription_data.prescription_medicines.length;i++ ){
                        that.medicine_details_rows.push({medicine_id:prescription_data.prescription_medicines[i].medicine_id, medicine_name:prescription_data.prescription_medicines[i].medicine.name, eating_time_breakfast:prescription_data.prescription_medicines[i].eating_time_breakfast, eating_time_lunch:prescription_data.prescription_medicines[i].eating_time_lunch, eating_time_dinner:prescription_data.prescription_medicines[i].eating_time_dinner, eating_term:prescription_data.prescription_medicines[i].eating_term, days:prescription_data.prescription_medicines[i].days, duration:prescription_data.prescription_medicines[i].duration, isOpen:false});
                      }
                    }else{
                      that.medicine_details_rows.push({medicine_id:'',medicine_name:'',eating_time_breakfast:'',eating_time_lunch:'',eating_time_dinner:'',eating_term:'',days:'',duration:'',isOpen:false});
                    }

                    if(prescription_data.prescription_tests.length) {
                      
                      for(var i=0;i<prescription_data.prescription_tests.length;i++ ){
                        that.medical_tests_rows.push({medical_test_id:prescription_data.prescription_tests[i].medical_test_id,description:prescription_data.prescription_tests[i].description });
                      }

                    }else {
                      that.medical_tests_rows.push({ medical_test_id: "", description: "" });
                    }
                    that.isLoading = false;
                })
        },

        
        getPatientDetails() {
          this.isLoading = true;
          let that = this;
          axios.get("/patient-details/" + this.$route.params.id)
              .then((response) => {
                that.patient_details = response.data.patient_details;
                that.isLoading = false;
                console.log(response.data);
              });
        },

        addMedicineDetailsRow() {
          this.medicine_details_rows.push({type_id:'',medicine_id:'',medicine_name:'',eating_time_breakfast:'',eating_time_lunch:'',eating_time_dinner:'',eating_term:'',days:'',duration:'',isOpen:false});
        },
        deleteMedicineDetailsRow(index) {
          this.medicine_details_rows.splice(index, 1);
        },

        addTestRow() {
          this.medical_tests_rows.push({ medical_test_id: "", description: "" });
        },

        deleteTestRow(index) {
          this.medical_tests_rows.splice(index, 1);
        },

        selectedRow(row) {
          this.selected_row = row;
          if( row.duration === '2' ) {
              this.selected_row.days = '';
          }
        },

        updatePrescription() {
          let that = this
          //console.log(this.medicine_details_rows);
          let data = {
              'medical_tests': this.medical_tests_rows,
              'medicine_details': this.medicine_details_rows,
              'suggestion': this.suggestion
          };
            this.isLoading = true;
            axios.post("/update-prescription/"+ this.prescription_id, data)
              .then(function (response) {
                  console.log(response);
                  that.isLoading = false;
                  //that.$router.push('/all-prescriptions/'+that.$route.params.id);
                  Toast.fire({
                      icon: 'success',
                      title: 'Prescription updated successfully!!!'
                  })
              })
              .catch(function (error) {
                //that.errors = error.response.data.errors;
                that.isLoading = false;
              });
        },

        //search medicine
        onArrowDown() {
        if (this.arrowCounter < this.results.length) {
            this.arrowCounter = this.arrowCounter + 1;
        }
        },
        onArrowUp() {
        if (this.arrowCounter > 0) {
            this.arrowCounter = this.arrowCounter - 1;
        }
        },
        onEnter() {
        this.search = this.results[this.arrowCounter];
        this.isOpen = false;
        this.arrowCounter = -1;
        },
        setResult(medicine) {
        //this.search = result;
        this.selected_row.isOpen = false;
        this.selected_row.medicine_name = medicine.name;
        this.selected_row.medicine_id= medicine.id;
        },
        onChange(evt) {

        console.log(evt.target);

        let data = {
            'name' : evt.target.value 
        };

        let that = this;
        axios.post("/find-medicine",data)
        .then(function (response) {
            that.medicines = response.data.medicines;
            that.selected_row.isOpen = true;
            console.log(response);
        })
        .catch(function (error) {
            //that.errors = error.response.data.errors;
            console.log(error.response.data);
        });
        }

    },
};
</script>
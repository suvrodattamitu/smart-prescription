<template>
  <div v-loading="isLoading" element-loading-text="Loading...">
    <div class="profile-details-hr">
      <div class="row mg-t-50 mg-b-30">
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
              <span>{{ patient_details.gender }}</span>
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
              <span v-html="prescription.c_c"></span>
            </p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 col-xs-6">
          <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
            <p>
              <b>On Exam</b>
              <br />
              <span v-html="prescription.on_exam"></span>
            </p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 col-xs-6">
          <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
            <p>
              <b>PA EXAM</b>
              <br/>
              <span v-html="prescription.pa_exam"></span>
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
                      <div class="basic-login-inner">
                          <div class="row" v-for="(medicine_details_row,index) in medicine_details_rows" :key="index">
                            
                            <div style="float:left" class="pull-left">
                              
                              <!-- medicine name selection start -->
                              <div style="display:flex;flex-direction:column;">
                                <div>
                                  
                                  <span style="width:20px" >
                                    <i class="fa fa-check text-success" v-if="medicine_details_row.medicine_id"></i>
                                    <i class="fa fa-close text-danger"  v-else></i>
                                  </span>
            
                                  <span style="display:inline;height:22px;width:130px;border-radius:2px; padding:5px;">
                                    <input
                                      type="text"
                                      @input="onChange"
                                      v-model="medicine_details_row.medicine_name"
                                      @keydown.down="onArrowDown"
                                      @keydown.up="onArrowUp"
                                      @keydown.enter="onEnter"
                                      @click="selectedRow(medicine_details_row)"
                                      placeholder="Medicine Name"
                                    />
                                  </span>

                                  <span style="margin-left:15px">
                                    <input
                                      type="text"
                                      style="display:inline;height:22px;
                                      width:70px; border-radius:2px; padding:5px; border: 1px solid #000;"
                                      v-model="medicine_details_row.type"
                                      disabled
                                      placeholder="Type"
                                    />
                                  </span>

                                  <span style="margin-left:15px">
                                    <input type="text" v-model="medicine_details_row.mg_ml" placeholder="mg/ml" style="width:65px; border: 1px solid #000;height:22px;">
                                  </span>

                                  <span style="width:50px; border: 1px solid #000;height:22px;">
                                    <select name="" v-model="medicine_details_row.qty">
                                      <option value="">Qty</option>
                                      <option value="0.5">0.5</option>
                                      <option value="1">1</option>
                                      <option value="2">2</option>
                                    </select>
                                  </span>

                                  <span style="margin-left:15px">
                                      <label style="margin-right: 8px; font-size:15px; font-weight:normal;">
                                        B
                                        <input class="radio-checked" v-model="medicine_details_row.eating_time_breakfast" name="name1" value="0" checked type="checkbox" />
                                      </label>
                                      <label style="margin-right: 8px; font-size:15px; font-weight:normal;">
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

                                  <span style="margin-left:25px">
                                    <input
                                      :disabled="medicine_details_row.duration=='2'?true:false"
                                      v-model="medicine_details_row.days"
                                      type="text"
                                      placeholder="Days/Months"
                                      style="width:70px; height:22px; border-radius:2px; padding:5px; border: 1px solid #000;"
                                    />
                                  </span>

                                  <span style="margin-left:25px">
                                    <select name="gender" class  v-model="medicine_details_row.duration" @change="selectedRow(medicine_details_row)">
                                      <option value>Select</option>
                                      <option value="0">Days</option>
                                      <option value="1">Months</option>
                                      <option value="2">Continue</option>
                                    </select>
                                  </span>

                                  <span style="margin-left:25px">
                                    <a
                                      type="button"
                                      class="pull-right"
                                      style="cursor:pointer;"
                                      v-if="index"
                                      @click.prevent="deleteMedicineDetailsRow(index)"
                                    >
                                      <i class="fa fa-trash" style="color:red;font-size:18px;"></i>
                                    </a>
                                  </span>

                                </div>

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

                                  </li>
                                  
                                </ul>

                                <ul v-else>
                                
                                  <!-- <li>
                                    <p>No results found!</p>
                                  </li> -->
                                  
                                </ul>
                              </div> 
                              <!-- medicine name selection end-->
                            </div>
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
                                @click.prevent="savePrescription"
                              >Save Prescription</button>
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
import _ from 'lodash';
export default {
  data() {
    return {
      patient_details: {},
      prescription: {},
      // medicine_types: [],
      tests:[],
      medical_tests_rows: [{ medical_test_id: "", description: "" }],
      medicine_details_rows: [{medicine_id:'',medicine_name:'',type:'',eating_time_breakfast:'',eating_time_lunch:'',eating_time_dinner:'',eating_term:'',days:'',duration:'',isOpen:false,qty:'',mg_ml:''}],

      //search medicine
      isOpen: false,
      medicines: [],
      search: '',
      //isLoading: false,
      arrowCounter: -1,
      selected_row:{},

      suggestion: '',

      //loading
      isLoading: false,
      fullPage: true

    };
  },
  mounted() {
    this.getPatientDetails();
    // this.getMedicineTypes();
    this.getMedicalTests();
  },

  methods: {
    addMedicineDetailsRow() {
      this.medicine_details_rows.push({medicine_id:'',medicine_name:'',type:'',eating_time_breakfast:'',eating_time_lunch:'',eating_time_dinner:'',eating_term:'',days:'',duration:'',isOpen:false,qty:'',mg_ml:''});
    },
    deleteMedicineDetailsRow(index) {
      this.medicine_details_rows.splice(index, 1);
    },

    getPatientDetails() {
      let that = this;
      this.isLoading = true;
      // axios.get("/patient-details/" + this.$route.params.id)
      //   .then((response) => {
      //     that.patient_details = response.data.patient_details;
      //     that.isLoading = false;
      //   });

      axios.get("/prescription/" + this.$route.params.id)
        .then((response) => {
          if (response.data) {
            that.prescription = response.data.prescription;
            that.patient_details = response.data.prescription.patient;
            that.isLoading = false;
          }
        });
    },

    // getMedicineTypes(){
    //   let that = this;
    //   axios.get('/types')
    //     .then(function (response) {
    //         that.medicine_types = response.data.medicine_types;
    //         // console.log(response.data);
    //     })
    // },

    getMedicalTests(){
      let that = this;
      axios.get('/all-test-lists')
        .then(function (response) {
            that.tests = response.data.medical_tests;
            // console.log(response.data);
        })
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

    savePrescription() {
      let that = this
      
      let data = {
        'patient_id': this.patient_details.id,
        'medical_tests': this.medical_tests_rows,
        'medicine_details': this.medicine_details_rows,
        'suggestion': this.suggestion
      };

      this.isLoading = true;
      axios.post("/add-prescription/" + this.$route.params.id, data)
        .then( (response) => {
            //that.$router.push('/all-prescriptions/' + that.$route.params.id);
            that.$message({
                type: 'success',
                message: 'Prescription added successfully!!!'
            });
        }).catch((error) => {
          //that.errors = error.response.data.errors;
        }).then(() => {
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
      this.selected_row.type = medicine.type.name;
      this.selected_row.medicine_id= medicine.id;
    },

    onChange:_.debounce(function(evt){
        let data = {
            'name' : evt.target.value 
        };

        let that = this;
        axios.post("/find-medicine",data)
        .then(function (response) {
            that.medicines = response.data.medicines;
            that.selected_row.isOpen = true;
            that.selected_row.medicine_id= '';
            that.selected_row.type = '';
        })
        .catch(function (error) {
            console.log(error.response.data);
        });
    },500),

  },
};
</script>
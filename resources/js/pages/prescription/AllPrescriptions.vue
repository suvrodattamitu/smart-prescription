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

        <div class="product-status mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-status-wrap">

                            <h4>Patient Details</h4>
                            <div>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Address</th>
                                            <th scope="col">Mobile</th>
                                            <th scope="col">Age</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{patient.name}}</td>
                                            <td>{{ patient.address }}</td>
                                            <td>{{ patient.mobile }}</td>
                                            <td>{{ patient.age }}</td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                            <br>
                            <h4>Prescription(s)</h4>
                            <div class="add-product">
                                <router-link :to="'/prescribe/'+this.$route.params.id">Add Prescription</router-link>
                            </div>
                            <div class="asset-inner">
                                <table v-if="patient.prescriptions && patient.prescriptions.length">
                                    <tr>
                                        <th>Prescriptions</th>
                                        <th>Created At</th>
                                        <th>Actions</th>
                                    </tr>

                                    <tr v-for="(prescription,index) in patient.prescriptions" :key="index">
                                        <td>Prescription No. {{ index+1 }}</td>
                                        <td>{{ prescription.created_at | timeformat}}</td>
                                        <td>
                                            <button data-toggle="modal" data-target="#PrimaryModalalert" title="Edit" class="pd-setting-ed" @click="viewPrescription(prescription.id)"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                            <button data-toggle="modal" data-target="#editPrescriptionModal" class="pd-setting-ed" @click="editPrescription(prescription.id)"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                            <!-- <button title="Edit" class="pd-setting-ed" @click="editMedicine(prescription.id)"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button> -->
                                            <button title="Trash" class="pd-setting-ed" @click="deleteConfirmation(prescription.id)"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                        </td>
                                    </tr>
                                    
                                </table>
                                <h4 v-else>No data found!!</h4>
                            </div>
                            
                            

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-10 col-md-12 col-sm-10 col-xs-12">
                <!-- <a class="Primary mg-b-10" href="#" >Primary</a> -->
                
                <div id="PrimaryModalalert" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog" data-keyboard="false" data-backdrop="static">
                    <div class="modal-dialog">
                        <div class="modal-content" style="width=100%!important;">
                            <div class="modal-close-area modal-close-df">
                                <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                            </div>
                            
                            <div class="modal-body">
                                <!-- <i class="educate-icon educate-checked modal-check-pro"></i> -->
                                <h4>Patient Details</h4>
                            
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Address</th>
                                            <th scope="col">Mobile</th>
                                            <th scope="col">Age</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr style="text-align:left;">
                                            <td>{{patient.name}}</td>
                                            <td>{{ patient.height }}</td>
                                            <td>{{ patient.mobile }}</td>
                                            <td>{{ patient.age }}</td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            
                                
                                <h4>Medicines</h4>

                                 <table class="table" v-if="selected_prescription.prescription_medicines && selected_prescription.prescription_medicines.length">
                                    <thead>
                                        <tr>
                                            <th scope="col">No.</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Breakfast/Lunch/Dinner</th>
                                            <th scope="col">Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr style="text-align:left;" v-for="(prescription_medicine,index) in selected_prescription.prescription_medicines" :key="index">
                                            <td>{{index+1}}</td>
                                            <td>{{ prescription_medicine.medicine.name }}</td>
                                            <td>
                                                <span v-if="prescription_medicine.eating_time_breakfast == 1">Yes/</span>
                                                <span v-else>No/</span>

                                                <span v-if="prescription_medicine.eating_time_lunch == 1">Yes/</span>
                                                <span v-else>No/</span>

                                                <span v-if="prescription_medicine.eating_time_dinner == 1">Yes</span>
                                                <span v-else>No</span>
                                                <span v-if="prescription_medicine.eating_term == 0">=(Before)</span>
                                                <span v-else-if="prescription_medicine.eating_term == 1">=(After)</span>
                                                <span v-else>=(Anytime)</span>
                                            </td>
                                            <td>
                                                <span v-if="prescription_medicine.days"> {{ prescription_medicine.days }} </span>

                                                <span v-if="prescription_medicine.duration == 0"> day(s)</span>
                                                <span v-else-if="prescription_medicine.duration == 1"> month(s)</span>
                                                <span v-else> continue...</span>
                                            </td>
                                        </tr>
                                        
                                    </tbody>
                                </table>

                                <h4>Medical Tests</h4>

                                 <table class="table" v-if="selected_prescription.prescription_tests && selected_prescription.prescription_tests.length">
                                    <thead>
                                        <tr>
                                            <th scope="col">No.</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Description</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr style="text-align:left;" v-for="(prescription_tests,index) in selected_prescription.prescription_tests" :key="index">
                                            <td>{{index+1}}</td>
                                            <td>{{ prescription_tests.test.name }}</td>
                                            <td>{{ prescription_tests.description }}</td>
                                        </tr>
                                        
                                    </tbody>
                                </table>

                                <h4>Suggestions</h4>
                                <p>{{ selected_prescription.suggestion }}</p>

                            </div>

                            <div class="modal-footer">
                                <a data-dismiss="modal" href="#">Cancel</a>
                                <!-- <a href="#">Process</a> -->
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="row" v-if="showEditModal">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">                
                <div id="editPrescriptionModal" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog" data-keyboard="false" data-backdrop="static">
                    <div class="modal-dialog" style="width:98%!important">
                        <div class="modal-content">
                            <div class="modal-close-area modal-close-df">
                                <a class="close" data-dismiss="modal" href="#" @click.prevent="hideEditModal">
                                    <i class="fa fa-close"></i>
                                </a>
                            </div>
                            
                            <div class="modal-body">
                                
                                <edit-prescription :prescription_id="prescription_id"></edit-prescription>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>

import EditPrescription from '../prescription/EditPrescription';

export default {

    components: {
        EditPrescription
    },
    
    data() {
        return {
            patient: {},
            prescriptions: '',
            selected_prescription:{},
            showEditModal: false,
            prescription_id:'',
            selected_prescription_id: '',
            //loading
            isLoading: false,
            fullPage: true
        }
    },

    methods: {

        viewPrescription(prescription_id) {

            this.isLoading = true;
            let that = this;
            axios.get('/get-prescription/'+prescription_id)
                .then(function (response) {
                    that.selected_prescription = response.data.prescription;
                    that.isLoading = false;
                })
        },

        getPrescriptionsByPatientId() {

            let that = this;
            this.isLoading = true;
            axios.get('/prescriptions/'+this.$route.params.id)
                .then(function (response) {
                    that.patient = response.data.patient;
                    that.isLoading = false;
                })

        },

        editMedicine( id ) {

            this.$router.push('/edit-medicine/'+id);

        },

        deletePrescription() {

            let id = this.selected_prescription_id;
            let that = this;
            this.isLoading = true;
            axios.delete('/prescription/'+id)
                .then(function (response) {

                    console.log(response);
                    that.selected_prescription_id = '';
                    that.getPrescriptionsByPatientId();
                    that.isLoading = false;
                    Toast.fire({
                        icon: 'warning',
                        title: 'Prescription deleted successfully!!!'
                    })

                })

        },

        deleteConfirmation( id ) {

            this.selected_prescription_id = id;
            let that = this;

            swalWithBootstrapButtons.fire({
                title: 'Do you want to delete the selected prescription?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Delete',
                cancelButtonText: 'Cancel',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {

                    that.deletePrescription();

                } 
            })
        },

        editPrescription(prescription_id) {
            this.showEditModal = true;
            this.prescription_id = prescription_id;
        },

        hideEditModal() {
            this.showEditModal = false;
        },
    },

    mounted() {

        this.getPrescriptionsByPatientId();

    }
}
</script>





   
    
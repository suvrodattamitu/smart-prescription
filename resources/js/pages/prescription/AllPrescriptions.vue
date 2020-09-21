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
                                <router-link to="/add-medicine">All Prescription</router-link>
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
                                            <button title="Edit" class="pd-setting-ed" @click="editMedicine(prescription.id)"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
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
                
                <div id="PrimaryModalalert" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content" style="width=100%!important;">
                            <div class="modal-close-area modal-close-df">
                                <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                            </div>
                            <div class="modal-body">
                                <i class="educate-icon educate-checked modal-check-pro"></i>
                                
                                <h2>Medicines</h2>

                                 <table class="table" v-if="selected_prescription.prescription_medicines && selected_prescription.prescription_medicines.length">
                                    <thead>
                                        <tr>
                                            <th scope="col">No.</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Type</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(medicine,index) in selected_prescription.prescription_medicines" :key="index">
                                            <td>{{index+1}}</td>
                                            <td>{{ medicine.name }}</td>
                                            <td>{{ medicine.type }}</td>
                                        </tr>
                                        
                                    </tbody>
                                </table>

                                <p>The Modal plugin is a dialog box/popup window that is displayed on top of the current page</p>

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

    </div>
</template>

<script>
export default {
    
    data() {
        return {
            patient: {},
            prescriptions: '',

            selected_prescription:{},
        }
    },

    methods: {

        viewPrescription(prescription_id) {
            let that = this;
            axios.get('/get-prescription/'+prescription_id)
                .then(function (response) {
                    that.selected_prescription = response.data.prescription;
                    console.log(response.data);
                })
        },

        getPrescriptionsByPatientId() {

            let that = this;

            axios.get('/prescriptions/'+this.$route.params.id)
                .then(function (response) {
                    that.patient = response.data.patient;
                    console.log(response.data.patient);
                })

        },

        editMedicine( id ) {

            this.$router.push('/edit-medicine/'+id);

        },

        deleteMedicine() {

            let id = this.selected_medicine_id;
            let that = this;

            axios.delete('/delete-medicine/'+id)
                .then(function (response) {
                    that.selected_medicine_id = '';
                    that.getPrescriptionsByPatientId();

                    that.$router.push('/all-prescriptions');
                    Toast.fire({
                        icon: 'warning',
                        title: 'Medicine deleted successfully!!!'
                    })

                })

        },

        deleteConfirmation( id ) {

            this.selected_medicine_id = id;
            let that = this;

            swalWithBootstrapButtons.fire({
                title: 'Do you want to delete the selected medicine?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Delete',
                cancelButtonText: 'Cancel',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {

                    that.deleteMedicine();

                } 
            })
        }

    },

    mounted() {

        this.getPrescriptionsByPatientId();

    }
}
</script>





   
    
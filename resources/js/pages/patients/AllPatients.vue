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
                                            <input type="text" v-model="search" @keyup="searchItems" placeholder="Search..." class="search-int form-control">
                                            <a href="#"><i class="fa fa-search"></i></a>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Static Table Start -->
        <div class="static-table-area">
            <div class="container-fluid">
              
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline11-list mt-b-30">
                            <div class="sparkline11-hd">
                                <div class="main-sparkline11-hd">
                                    <h1>All Patients</h1>
                                    <div class="add-product">
                                       <router-link to="/add-patient">Add Patient</router-link>
                                    </div>
                                </div>
                            </div>
                            <div class="sparkline11-graph"  v-if="patients.data">
                                <div class="static-table-list">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>VisitingNo</th>
                                                <th>RegiNo</th>
                                                <th>Name</th>
                                                <th>Age</th>
                                                <th>Address</th>
                                                <th>Prescribe</th>
                                                <th>Prescriptions</th>
                                                <th>Created</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr v-for="(patient,index) in patients.data" :key="index">
                                                <td>{{ patient.id }}</td>
                                                <td>{{ patient.visiting_no }}</td>
                                                <td>{{ patient.regi_no }}</td>
                                                <td>{{ patient.name }}</td>
                                                <td>{{ patient.age }}</td>
                                                <td>{{ patient.address | shortLength(30,"...")}}</td>
                                                <td v-if="patient.is_prescribed == 1"><a @click.prevent="prescribeNow(patient.id)" href="#" class="pull-left btn btn-success login-submit-cs" type="submit">Prescribed</a>
                                                <td v-else><a @click.prevent="prescribeNow(patient.id)" href="#" class="pull-left btn btn-info login-submit-cs" type="submit">Prescribe</a>
                                                <td><router-link :to="'/all-prescriptions/'+patient.id" class="btn btn-info">View</router-link>
                                                 
                                                <td>{{ patient.created_at | timeformat }}</td>
                                                <td class="width-100">
                                                    <div class="inline-remember-me action-inliner">
                                                        <button data-toggle="tooltip" title="Edit" class="pd-setting-ed" @click="editPatient(patient.id)"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                                        <button data-toggle="tooltip" title="Thrash" class="pd-setting-ed" @click="viwPatient(patient.id)"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                                        <button data-toggle="tooltip" title="Thrash" class="pd-setting-ed" @click="deleteConfirmation(patient.id)"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>      
                                </div>
                                    <div class="custom-pagination align-right">
                                        <nav aria-label="Page navigation example">
                                            <pagination :data="patients" @pagination-change-page="getAllPatients"></pagination>
                                        </nav>
                                    </div>
                            </div>
                                <div v-else>
                                    <h4>No Data Founds!!</h4>
                                </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>

    </div>
</template>

<script>
import _ from "lodash";
export default {
    
    data() {
        return {
            patients: [],
            selected_patient_id: '',
            search:'',

            //loading
            isLoading: false,
            fullPage: true
        }
    },

    methods: {

        searchItems:_.debounce(function(){
            this.getAllPatients();
        },500),

        getAllPatients( page = 1 ) {

             //loading
            this.isLoading = true;

            let that = this;
            axios.get(`/patients?q=${this.search}&page=${page}`)
                .then(function (response) {
                    that.patients = response.data;
                    // console.log(response.data);
                    //loading
                    that.isLoading = false
                })

        },

        editPatient( id ) {

            this.$router.push('/edit-patient/'+id);

        },

        viwPatient( id ) {

            this.$router.push('/view-patient/'+id);

        },
        
        deletePatient() {

            //loading
            this.isLoading = true;

            let id = this.selected_patient_id;
            let that = this;

            axios.delete('/delete-patient/'+id)
                .then(function (response) {

                    //loading
                    that.isLoading = false;
                    
                    that.selected_patient_id = '';
                    that.getAllPatients();

                    that.$router.push('/all-patients');
                    Toast.fire({
                        icon: 'warning',
                        title: 'Patiernt deleted successfully!!!'
                    })

                })

        },

        deleteConfirmation( id ) {

            this.selected_patient_id = id;
            let that = this;

            swalWithBootstrapButtons.fire({
                title: 'Do you want to delete the selected patient?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Delete',
                cancelButtonText: 'Cancel',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {

                    that.deletePatient();

                } 
            })
        },

        prescribeNow(patient_id) {
            this.$router.push('/prescribe/'+patient_id);
        },
    
    },

    mounted() {

        this.getAllPatients();

    }
}
</script>





   
    
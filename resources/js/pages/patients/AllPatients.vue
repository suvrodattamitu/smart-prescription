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
                                        <li><router-link to="/">Home</router-link> <span class="bread-slash">/</span>
                                        </li>
                                        <li><span class="bread-blod">All Patients</span>
                                        </li>
                                    </ul>
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
                            <div class="sparkline11-graph">
                                <div class="static-table-list">
                                    <table class="table sparkle-table" v-if="patients.length">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>VisitingNo</th>
                                                <th>RegiNo</th>
                                                <th>Name</th>
                                                <th>Age</th>
                                                <th>Address</th>
                                                <th>Prescribe</th>
                                                <th>Created At</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr v-for="(patient,index) in patients" :key="index">
                                                <td>{{ index+1 }}</td>
                                                <td>{{ patient.visiting_no }}</td>
                                                <td>{{ patient.regi_no }}</td>
                                                <td>{{ patient.name }}</td>
                                                <td>{{ patient.age }}</td>
                                                <td>{{ patient.address }}</td>
                                                <td><a @click.prevent="prescribeNow(patient.id)" href="#" class="pull-left btn btn-info login-submit-cs" type="submit">Prescribe</a>
                                                    <!-- <a @click.prevent="prescribeNow(patient.id)" href="#" class="pull-left btn btn-info login-submit-cs" type="submit"><i class="fa fa-check-circle"></i> Prescribed</a> --></td>
                                                <td>{{ patient.created_at | timeformat }}</td>
                                                <td>
                                                    <div class="inline-remember-me">
                                                        <a  @click.prevent="editPatient(patient.id)" href="#" class="pull-left btn btn-info login-submit-cs btn-space" type="submit"><i class="fa fa-pencil"></i></a>
                                                        <a  @click.prevent="" href="#" class="pull-left btn btn-success login-submit-cs btn-space" type="submit"><i class="fa fa-eye"></i></a>
                                                        <a @click.prevent="deleteConfirmation(patient.id)" href="#" class="pull-left btn btn-danger login-submit-cs" type="submit"><i class="fa fa-trash"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                           
                                        </tbody>
                                    </table>
                                    <div v-else>
                                        <h4>No Data Founds!!</h4>
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
            patients: [],
            selected_patient_id: ''
        }
    },

    methods: {

        getAllPatients() {

            let that = this;
            axios.get('/patients')
                .then(function (response) {
                    that.patients = response.data.patients;
                    console.log(response.data);
                })

        },

        editPatient( id ) {

            this.$router.push('/edit-patient/'+id);

        },
        
        deletePatient() {

            let id = this.selected_patient_id;
            let that = this;

            axios.delete('/delete-patient/'+id)
                .then(function (response) {
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





   
    
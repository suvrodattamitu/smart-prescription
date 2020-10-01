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
                                    <h1>All Medicines</h1>
                                    <div class="add-product">
                                       <router-link to="/add-medicine">Add Medicine</router-link>
                                    </div>
                                </div>
                            </div>
                            <div class="sparkline11-graph" v-if="medicines.data">
                                <div class="static-table-list">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Group</th>
                                            <th>Type</th>
                                            <th>Company</th>
                                            <th>Created At</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr v-for="(medicine,index) in medicines.data" :key="index">
                                            <td>{{ medicine.id }}</td>
                                            <td>{{ medicine.name }}</td>
                                            <td>{{ medicine.description | shortLength(50,"...")}}</td>
                                            <td>{{ medicine.group.name }}</td>
                                            <td>{{ medicine.type.name }}</td>
                                            <td>{{ medicine.company.name }}</td>
                                            <td>{{ medicine.created_at | timeformat}}</td>
                                            <td>
                                                <div class="inline-remember-me action-inliner">
                                                    <button data-toggle="tooltip" title="Edit" class="pd-setting-ed" @click="editMedicine(medicine.id)"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                                    <button data-toggle="tooltip" title="Trash" class="pd-setting-ed" @click="deleteConfirmation(medicine.id)"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                    
                                </table>

                                  </div>

                                <div class="custom-pagination align-right">
                                    <nav aria-label="Page navigation example">
                                        <pagination :data="medicines" @pagination-change-page="getAllMedicines"></pagination>
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
            medicines: [],
            selected_medicine_id: '',
            search:'',
             
             //loading
            isLoading: false,
            fullPage: true
        }
    },

    methods: {

        searchItems: _.debounce(function () {
            this.getAllMedicines();
        }, 500),

        getAllMedicines( page = 1 ) {
            
            //loading
            this.isLoading = true;

            let that = this;
            axios.get(`/medicines?q=${this.search}&page=${page}`)
                .then(function (response) {
                    that.medicines = response.data;
                     
                     //loading
                    that.isLoading = false
                    console.log(response.data);
                })

        },

        editMedicine( id ) {

            this.$router.push('/edit-medicine/'+id);

        },

        deleteMedicine() {
             //loading
            this.isLoading = true

            let id = this.selected_medicine_id;
            let that = this;

            axios.delete('/delete-medicine/'+id)
                .then(function (response) {
                    
                    //loading
                    that.isLoading = false

                    that.selected_medicine_id = '';
                    that.getAllMedicines();

                    that.$router.push('/all-medicines');
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

        this.getAllMedicines();

    }
}
</script>





   
    
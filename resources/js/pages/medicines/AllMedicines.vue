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

                            <h4>All Medicines</h4>
                            <div class="add-product">
                                <a href="/add-medicine">Add Medicine</a>
                            </div>
                            <div class="asset-inner">
                                <table v-if="medicines.length">
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

                                    <tr v-for="(medicine,index) in medicines" :key="index">
                                        <td>{{ index+1 }}</td>
                                        <td>{{ medicine.name }}</td>
                                        <td>{{ medicine.description | shortLength(50,"...")}}</td>
                                        <td>{{ medicine.group.name }}</td>
                                        <td>{{ medicine.type.name }}</td>
                                        <td>{{ medicine.company.name }}</td>
                                        <td>{{ medicine.created_at | timeformat}}</td>
                                        <td>
                                            <button data-toggle="tooltip" title="Edit" class="pd-setting-ed" @click="editMedicine(medicine.id)"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                            <button data-toggle="tooltip" title="Trash" class="pd-setting-ed" @click="deleteConfirmation(medicine.id)"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
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

    </div>
</template>

<script>
export default {
    
    data() {
        return {
            medicines: [],
            selected_medicine_id: ''
        }
    },

    methods: {

        getAllMedicines() {

            let that = this;
            axios.get('/medicines')
                .then(function (response) {
                    that.medicines = response.data.medicines;
                    console.log(response.data);
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





   
    
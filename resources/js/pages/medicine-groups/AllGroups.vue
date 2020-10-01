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
                                    <h1>All Medicine Groups</h1>
                                    <div class="add-product">
                                       <router-link to="/add-group">Add Medicine Group</router-link>
                                   </div>
                                </div>
                            </div>
                            <div class="sparkline11-graph" v-if="medicine_groups.data">
                                <div class="static-table-list">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Description</th>
                                                <th>Created At</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr v-for="(group,index) in medicine_groups.data" :key="index">
                                                <td>{{ group.id }}</td>
                                                <td><span class="pie"> {{ group.name }} </span></td>
                                                <td>{{ group.description | shortLength(50,"...")}}</td>
                                                <td>{{ group.created_at | timeformat}}</td>
                                                <td>
                                                    <div class="inline-remember-me">
                                                        <!-- <a  @click.prevent="editGroup(group.id)" href="#" class="pull-left btn btn-info login-submit-cs btn-space" type="submit"><i class="fa fa-pencil"></i></a>
                                                        <a @click.prevent="deleteConfirmation(group.id)" href="#" class="pull-left btn btn-danger login-submit-cs" type="submit"><i class="fa fa-trash"></i></a> -->

                                                        <button data-toggle="tooltip" title="Edit" class="pd-setting-ed" @click="editGroup(group.id)"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                                        <button data-toggle="tooltip" title="Trash" class="pd-setting-ed" @click="deleteConfirmation(group.id)"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                                    </div>
                                                </td>
                                            </tr>
                                           
                                        </tbody>
                                    </table>                          
                                </div>
                                    <div class="custom-pagination align-right">
                                        <nav aria-label="Page navigation example">
                                            <pagination :data="medicine_groups" @pagination-change-page="getAllGroups"></pagination>
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
export default {
    
    data() {
        return {
            medicine_groups: [],
            selected_group_id: '',
            search:'',

            //loading
            isLoading: false,
            fullPage: true
        }
    },

    methods: {

        searchItems: _.debounce(function () {
            this.getAllGroups();
        }, 500),

        getAllGroups( page = 1 ) {

            let that = this;
            this.isLoading = true;
            axios.get(`/groups?q=${this.search}&page=${page}`)
                .then(function (response) {
                    that.medicine_groups = response.data;
                    console.log(response.data)
                    that.isLoading = false;
                })

        },

        editGroup( id ) {

            this.$router.push('/edit-group/'+id);

        },
        
        deleteGroup() {

            let id = this.selected_group_id;
            let that = this;
            this.isLoading = true;
            axios.delete('/delete-group/'+id)
                .then(function (response) {
                    that.selected_group_id = '';
                    that.getAllGroups();
                    that.isLoading = false;
                    that.$router.push('/all-groups');
                    Toast.fire({
                        icon: 'warning',
                        title: 'Medicine group deleted successfully!!!'
                    })

                })

        },

        deleteConfirmation( id ) {

            this.selected_group_id = id;
            let that = this;

            swalWithBootstrapButtons.fire({
                title: 'Do you want to delete the selected group?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Delete',
                cancelButtonText: 'Cancel',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {

                    that.deleteGroup();

                } 
            })
        }
    
    },

    mounted() {

        this.getAllGroups();

    }
}
</script>





   
    
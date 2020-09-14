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

        <!-- Static Table Start -->
        <div class="static-table-area">
            <div class="container-fluid">
              
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                        <div class="sparkline11-list mt-b-30">
                            <div class="sparkline11-hd">
                                <div class="main-sparkline11-hd">
                                    <h1>All Medicine Groups</h1>
                                </div>
                            </div>
                            <div class="sparkline11-graph">
                                <div class="static-table-list">
                                    <table class="table sparkle-table" v-if="medicine_groups.length">
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

                                            <tr v-for="(group,index) in medicine_groups" :key="index">
                                                <td>{{ index+1 }}</td>
                                                <td><span class="pie"> {{ group.name }} </span></td>
                                                <td>{{ group.description }}</td>
                                                <td>{{ group.created_at }}</td>
                                                <td>
                                                    <div class="inline-remember-me">
                                                        <a  @click.prevent="editGroup(group.id)" href="#" class="pull-left btn btn-info login-submit-cs btn-space" type="submit"><i class="fa fa-pencil"></i></a>
                                                        <a @click.prevent="deleteConfirmation(group.id)" href="#" class="pull-left btn btn-danger login-submit-cs" type="submit"><i class="fa fa-trash"></i></a>
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
            medicine_groups: [],
            selected_group_id: ''
        }
    },

    methods: {

        getAllGroups() {

            let that = this;
            axios.get('/groups')
                .then(function (response) {
                    that.medicine_groups = response.data.medicine_groups;
                    console.log(response.data);
                })

        },

        editGroup( id ) {

            this.$router.push('/edit-group/'+id);

        },
        
        deleteGroup() {

            let id = this.selected_group_id;
            let that = this;

            axios.delete('/delete-group/'+id)
                .then(function (response) {
                    that.selected_group_id = '';
                    that.getAllGroups();

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





   
    
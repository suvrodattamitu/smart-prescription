<template>
    <div>
        <div class="product-status mg-b-15 mg-t-50">
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
                            <div class="table-responsive">
                                <table v-if="patient.prescriptions && patient.prescriptions.length">
                                    <tr>
                                        <th>Prescriptions</th>
                                        <th>Created At</th>
                                        <th>Actions</th>
                                        <th>Export</th>
                                        <th>Print</th>
                                    </tr>

                                    <tr v-for="(prescription,index) in patient.prescriptions" :key="index">
                                        <td>Prescription No. {{ index+1 }}</td>
                                        <td>{{ prescription.created_at | timeformat}}</td>
                                        
                                        <td class="width-100">
                                            <div class="action-inliner">
                                                <button data-toggle="modal" data-target="#PrimaryModalalert" title="Edit" class="pd-setting-ed" @click="viewPrescription(prescription.id)"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                                <button data-toggle="modal" data-target="#editPrescriptionModal" class="pd-setting-ed" @click="editPrescription(prescription.id)"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                                <!-- <button title="Edit" class="pd-setting-ed" @click="editMedicine(prescription.id)"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button> -->
                                                <button title="Trash" class="pd-setting-ed" @click="deleteConfirmation(prescription.id)"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="btn-group dropright">
                                                <button 
                                                    class="pd-setting-ed dropdown-toggle" 
                                                    data-toggle="dropdown" 
                                                    aria-haspopup="true" 
                                                >
                                                Export as
                                                <i class="fa fa-download" aria-hidden="true"></i>
                                                </button>

                                                <div class="dropdown-menu" x-placement="right-start" style="z-index:999999;transform: translate3d(112px, 0px, 0px);top: 0px;">
                                                    <a class="dropdown-item" @click.prevent="Export2Doc('exportContent','.doc')">Microsoft Word(.doc)</a>
                                                    <a class="dropdown-item" @click.prevent="Export2Pdf('exportPrescription','.pdf')">Pdf Document(.pdf)</a>
                                                    <a class="dropdown-item" @click.prevent="Export2Txt('exportContent','.txt')">Plain Text(.txt)</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <button class="pd-setting-ed" @click.prevent="printDiv('exportContent',prescription.id)">Print <i class="fa fa-print" aria-hidden="true"></i></button>
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

        <!-- prescription view -->
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
                                            <th scope="col">Amount</th>
                                            <th scope="col">Taking Qty</th>
                                            <th scope="col">Breakfast/Lunch/Dinner</th>
                                            <th scope="col">Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr style="text-align:left;" v-for="(prescription_medicine,index) in selected_prescription.prescription_medicines" :key="index">
                                            <td>{{index+1}}</td>
                                            <td>{{ prescription_medicine.medicine.name }}</td>                                           
                                            <td>{{ prescription_medicine.mg_ml }}</td>
                                            <td>{{ prescription_medicine.qty }}</td>
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

                            <div class="modal-footer">
                                <a data-dismiss="modal" href="#">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="hide-export-content" style="visibility:hidden; display:none">
            <!-- prescription print/export start -->
            <div style="margin:0 auto; min-width: 50%; min-height: 500px; overflow: hidden;" id="exportContent">
                <div style="display: block; padding: 20px; overflow: hidden; margin-bottom: 5px;">
                    <p v-html="header_footer.header"></p>
                </div>

                <div style="display: block; padding: 20px; overflow: hidden; border: 1px solid #000; margin-bottom: 5px;">
                    <h4 style="margin: 0; padding: 0;">Patient Details</h4>
                    <div style="float: left; width: 50%; line-height: 8px;">
                        <p>Name : {{ patient.name }}</p>
                        <p>Age  : {{ patient.age }}</p>
                    </div>
                    <div style="float: right; width: 50%; line-height: 8px;">
                        <p>Sex : 
                            <span v-if="patient.gender == 0">Male</span>
                            <span v-if="patient.gender == 1">Female</span>
                        </p>
                        <p>Mobile: {{ patient.mobile }}</p>
                    </div>
                </div>

                <div style="border: 1px solid black; min-height: 300px;">
                    <div style="width: 100%; display: block; padding: 20px; min-height: 30%; overflow: hidden;">
                    <!-- CC and On Exam section  -->
                    <div style="width: 30%; float: left;">
                        <div style="display: block; margin-bottom: 15px;">
                            <h4 style="margin: 0; padding: 0;">CC</h4>
                            <p style="margin: 0; padding: 0;" v-html="patient.c_c"></p>
                        </div>
                        <div style="display: block;">
                            <h4 style="margin: 0; padding: 0;">O/E</h4>
                            <p style="margin: 0; padding: 0;" v-html="patient.on_exam"></p>
                        </div>
                    </div>
                    <!-- end CC and On Exam section  -->
                    <!-- Medicine section -->
                    <div style="width: 65%; float: right; margin-left: 10px;">
                        <h4 style="margin: 0; padding: 0;">Rx</h4>
                        <p style="list-style: none; font-family: 'Roboto';font-size: 18px; margin-top:0; width:99%; padding:0;" v-for="(prescription_medicine,index) in selected_prescription.prescription_medicines" :key="index">
                            <span>{{ index+1 }}. </span> 
                            {{ prescription_medicine.medicine.name }}
                            <small>({{ prescription_medicine.mg_ml }})</small>  
                            
                            <span>{{ ( prescription_medicine.qty * !!prescription_medicine.eating_time_breakfast ) }} +</span>
                            <span>{{ ( prescription_medicine.qty * !!prescription_medicine.eating_time_lunch ) }} +</span>
                            <span>{{ ( prescription_medicine.qty * !!prescription_medicine.eating_time_dinner ) }} </span>
                            
                            <small>
                                <span v-if="prescription_medicine.eating_term == 0">(Before meal)</span>
                                <span v-else-if="prescription_medicine.eating_term == 1">(After meal)</span>
                            </small>

                            <span v-if="prescription_medicine.days"> {{ prescription_medicine.days }} </span>
                            <span v-if="prescription_medicine.duration == 0"> day(s)</span>
                            <span v-else-if="prescription_medicine.duration == 1"> month(s)</span>
                            <span v-else> continue...</span>
                        </p>
                    </div>
                </div>
                
                <!-- medical tests -->
                <div style="width: 100%; display: block; padding: 20px; overflow: hidden; margin-top:-34px;">
                    <h4 style="margin: 0; padding: 0;">Investigations</h4>
                    <span style="display: block;" v-for="(prescription_test,index) in selected_prescription.prescription_tests" :key="index">
                        <span>{{ index+1 }}. </span> {{ prescription_test.test.name }} 
                        <small>[ {{ prescription_test.description }} ]</small>
                    </span>
                
                </div>
                <!-- end medical tests -->
            
                <!-- footer -->
                <div style="width: 100%; display: block; padding: 20px; overflow: hidden;">
                    <span>--------------------------------------------------------------------------------------------------------</span>
                    <div style="display: block; border: 1px dot grey; float: center; width:80%;"></div>
                    <p v-html="header_footer.footer"></p>
                </div>
                <!-- end footer -->
                </div>
            </div>
            <!-- prescription print/export end -->
        </div>

        <ViewPrescription :data="1"/>
    </div>
</template>

<script>
import EditPrescription from '../prescription/EditPrescription';
import ViewPrescription from './ViewPrescription';

import html2pdf from 'html2pdf.js';

export default {
    components: {
        ViewPrescription,
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
            header_footer:'',
            //loading
            isLoading: false,
            fullPage: true
        }
    },

    methods: {
        Export2Doc(element,extension, filename = ''){
            var preHtml = "<html xmlns:o='urn:schemas-microsoft-com:office:office' xmlns:w='urn:schemas-microsoft-com:office:word' xmlns='http://www.w3.org/TR/REC-html40'><head><meta charset='utf-8'><title>Smart Prescription</title></head><body>";
            var postHtml = "</body></html>";
            var html = preHtml+document.getElementById(element).innerHTML+postHtml;

            var blob = new Blob(['\ufeff', html], {
                    type: 'application/msword'
                });
                // Specify link url
            var url = 'data:application/vnd.ms-word;charset=utf-8,' + encodeURIComponent(html);            
            
            // Specify file name
            //filename = filename?filename+'.doc':'document.doc';

            filename = 'filename'+extension;
            
            // Create download link element
            var downloadLink = document.createElement("a");

            document.body.appendChild(downloadLink);
            
            if(navigator.msSaveOrOpenBlob ){
                navigator.msSaveOrOpenBlob(blob, filename);
            }else{
                // Create a link to the file
                downloadLink.href = url;
                
                // Setting the file name
                downloadLink.download = filename;
                
                //triggering the function
                downloadLink.click();
            }
            
            document.body.removeChild(downloadLink);
        },

        Export2Pdf(element,extension) {
            const options = {
                margin:       10,
                filename:     `sample_prescription.pdf`,
                image:        { type: 'jpeg', quality: 0.98 },
                html2canvas:  { scale: 2 },
                jsPDF:        { unit: 'mm', format: 'a4', orientation: 'portrait' }
            };

            html2pdf().from(document.getElementById('exportPrescription')).set(options).save();
        },

        Export2Txt(element,extension) {
            var html = jQuery('#'+element).text();
            var data = { x: 42, s: "hello, world", d: new Date() },
            fileName = "my-download.txt";

            var a = document.createElement("a");
            document.body.appendChild(a);
            a.style = "display: none";

            var blob = new Blob([html], {
                type: "text/plain;charset=utf-8"
            });
            var url = window.URL.createObjectURL(blob);

            a.href = url;
            a.download = fileName;
            a.click();
            window.URL.revokeObjectURL(url);
        },
        
        printDiv(element,prescription_id) {
            this.isLoading = true;
            let that = this;
            axios.get('/get-prescription/'+prescription_id)
                .then(function (response) {
                    that.selected_prescription = response.data.prescription;
                    that.header_footer = response.data.header_footer;
                    that.isLoading = false;
                    setTimeout(function(){
                        var html = $('#'+element).html();
                        var printWin = window.open("","processPrint");
                        printWin.document.open();
                        printWin.document.write(html);
                        printWin.document.close();
                        printWin.print();
                    },100);

                });
        },
        
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
                });
        },

        editMedicine(id) {
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
        setTimeout(function(){
            jQuery(document).ready(function(){
                jQuery('.table-responsive').on('show.bs.dropdown', function () {
                    jQuery('.table-responsive').css( "overflow", "inherit" );
                });

                jQuery('.table-responsive').on('hide.bs.dropdown', function () {
                    jQuery('.table-responsive').css( "overflow", "auto" );
                })
            });
        },1000)

        this.getPrescriptionsByPatientId();
    }
}
</script>

<style lang="scss">
.table-responsive {
    border: 1px solid #ddd;
    margin-bottom: 15px;
    overflow-x: auto;
    overflow-y: hidden;
    width: 100%;
}

.btn-group {
    margin-top: .25rem;
    margin-bottom: .25rem;
}

.dropright {
    margin-top: 0;
    margin-left: .125rem;
}

.dropdown-menu{

    // position: absolute;
    // transform: translate3d(112px, 0px, 0px);
    // top: 0px;
    // left: 0px;
    // will-change: transform;

    position: absolute;
    // top: 100%;
    // left: 0;
    z-index: 1000;
    display: none;
    float: left;
    min-width: 10rem;
    padding: .5rem 0;
    margin: .125rem 0 0;
    font-size: 1rem;
    color: #212529;
    text-align: left;
    list-style: none;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid rgba(0,0,0,.15);
    border-radius: .25rem;
}

.dropdown-item {
    display: block;
    width: 100%;
    padding: .25rem 1.5rem;
    clear: both;
    font-weight: 400;
    color: #212529;
    text-align: inherit;
    white-space: nowrap;
    background-color: transparent;
    border: 0;
    cursor: pointer;
}
</style>
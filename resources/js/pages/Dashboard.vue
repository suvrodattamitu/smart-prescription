<template>
    <div v-loading="isLoading" element-loading-text="Loading...">
        <div class="breadcome-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="mg-t-30">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="analytics-sparkle-area">
            <div class="container-fluid">
                <!-- <div class="row"> -->
                    <!-- <div class="align-center">
                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <div class="analytics-content">
                                <p class="align-center"><i class="fa fa-calendar fa-3x icon-style1" aria-hidden="true"></i></p>
                                <p class="align-center mg-t-15" id="real-time-date"></p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 align-center">
                            <div class="analytics-content">
                                <p class="align-center"><i class="fa fa-clock-o fa-3x icon-style1"></i></p>
                                <p id="real-time-clock" class="mg-t-15 align-center"></p>
                            </div>
                        </div>
                    </div> -->
                <!-- </div> -->

                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="analytics-sparkle-line reso-mg-b-30">
                            <div class="analytics-content">
                                <h5>Total Prescribed</h5>
                                <h2>
                                    {{total_prescribed}}
                                    <span class="tuition-fees">Prescribed</span>
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 border-on-hover">
                        <div class="analytics-sparkle-line reso-mg-b-30">
                            <div class="analytics-content">
                                <h5>Total Patients</h5>
                                <h2>
                                    {{ total_patients }}
                                    <span class="tuition-fees">Patients</span>
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="analytics-sparkle-line reso-mg-b-30 table-mg-t-pro dk-res-t-pro-30">
                            <div class="analytics-content">
                                <h5>Prescribed Today</h5>
                                <h2>
                                    {{ prescribed_today }}
                                    <span class="tuition-fees">Prescribed</span>
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="analytics-sparkle-line table-mg-t-pro dk-res-t-pro-30">
                            <div class="analytics-content">
                                <h5>Added Patients Today</h5>
                                <h2><span class="counter">{{ patients_today }}</span> <span class="tuition-fees">Patients</span></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </div>
</template>

<script type="text/babel">
export default {
    data() {
        return{
            input: '',
            total_prescribed:'',
            total_patients:'',
            prescribed_today:'',
            patients_today:'',
            isLoading: false,
            fullPage: true
        }
    },
    mounted() {
        this.getCountings();
        // this.getTimeNow();
    },

    methods:{
        getTimeNow(){
            const monthNames = ["January", "February", "March", "April", "May", "June","July", "August", "September", "October", "November", "December"];

            var today = new Date(); 
            var date = today.toJSON().slice(0, 10); 
            var nDate = date.slice(8, 10) + ' '  
                       + monthNames[today.getMonth()] + ' '  
                       + date.slice(0, 4); 

            //Make time clock
            let rc    = new Date();
            let hours = rc.getHours();
            let min   = rc.getMinutes();
            let sec   = rc.getSeconds();

            //am/pm
            let ampm = (hours<12)?'Am':'Pm';
            hours    = (hours<12)?hours:hours-12;


            hours = ('0'+hours).slice(-2);
            min   = ('0'+min).slice(-2);
            sec   = ('0'+sec).slice(-2);

            let time = hours+' : '+min+' : '+sec+' '+ampm;

            document.getElementById('real-time-date').innerHTML = nDate;
            document.getElementById('real-time-clock').innerHTML = time;

            let self = this;
            let t = setTimeout( self.getTimeNow,500 );
        },

        getCountings(){
            this.isLoading = true;
            let that = this;
            axios.get('/dashboard')
                .then((response) => {
                    if (response.data) {
                        that.total_prescribed = response.data.total_prescribed;
                        that.total_patients = response.data.total_patients;
                        that.prescribed_today = response.data.prescribed_today;
                        that.patients_today = response.data.patients_today;
                    }
                }).catch((error) => {

                }).then(() => {
                    that.isLoading = false;
                })
        }
    }
}
</script>
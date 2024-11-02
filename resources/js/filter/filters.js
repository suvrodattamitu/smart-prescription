import moment from 'moment';
import Vue from 'vue'

Vue.filter('timeformat', function(arg){
  // return moment(arg).format("MMM Do YY, h:mm:ss a");
  return moment(arg).format("MMM Do YY");
}),

Vue.filter('shortLength',function(text,length,suffix){
  if(typeof text !== 'string') return '';
  return text.substring(0,length)+suffix
})
<link href="{{ asset('frontend/map/dist/css/jsvectormap.css') }}" rel="stylesheet">
<script src="{{ asset('frontend/map/dist/js/jsvectormap.js') }}"></script>
<script src="{{ asset('frontend/map/dist/maps/world-merc.js') }}"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" integrity="sha512-xmGTNt20S0t62wHLmQec2DauG9T+owP9e6VU8GigI0anN7OXLip9i7IwEhelasml2osdxX71XcYm6BQunTQeQg==" crossorigin="anonymous" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.js" integrity="sha512-VvWznBcyBJK71YKEKDMpZ0pCVxjNuKwApp4zLF3ul+CiflQi6aIJR+aZCP/qWsoFBA28avL5T5HA+RE+zrGQYg==" crossorigin="anonymous">
</script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/css/ion.rangeSlider.min.css"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/js/ion.rangeSlider.min.js"></script>
<style type="text/css"> 
.bootstrap-tagsinput{
width: 100%;
}
.label-info{
background-color: #ff379a;
}
.label {
display: inline-block;
padding: .25em .4em;
font-size: 75%;
font-weight: 700;
line-height: 1;
text-align: center;
white-space: nowrap;
vertical-align: baseline;
border-radius: .25rem;
transition: color .15s ease-in-out,background-color .15s ease-in-out,
border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}
.irs--flat .irs-from, .irs--flat .irs-to, .irs--flat .irs-single {
color: white;
font-size: 10px;
line-height: 1.333;
text-shadow: none;
padding: 1px 5px;
background-color: #ff379a;
border-radius: 4px;
}
.irs--flat .irs-bar {
top: 25px;
height: 12px;
background-color: #FF379A;
}
.suggesionul{
padding: 15px;
display: block;
width: 58vw;
position: absolute;
font-weight: 400;
font-size: 12px;
}
.suggesionul .suggesionli,a {

padding: 0px 0;
color: #693FF5;
}
.suggesionul{
height: 50vh;
display: block;
overflow-y: scroll;
}
.bootstrap-tagsinput {
  
    border: 1px solid #ff379a;
    }
</style>
<script type="text/javascript">
$('.dropdown-menu').click(function(event){
event.stopPropagation();
});

$(document).ready(function() {

   


function setCookie(cname, cvalue, exdays) {

var d = new Date();

d.setTime(d.getTime() + (exdays*24*60*60*1000));

var expires = "expires="+ d.toUTCString();

document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";

}



function getCookie(cname) {

var name = cname + "=";

var decodedCookie = decodeURIComponent(document.cookie);

var ca = decodedCookie.split(';');

for(var i = 0; i <ca.length; i++) {

var c = ca[i];

while (c.charAt(0) == ' ') {

c = c.substring(1);

}

if (c.indexOf(name) == 0) {

return c.substring(name.length, c.length);

}

}

return "";

}



$(".js-range-slider").ionRangeSlider({
type: "double",
grid: true,
grid_num: 12,
min: 0,
max: 50000,
from:0,
to:50000,
prefix: "£K",
onFinish: function (data) {
console.dir(data);

$('.spriceRange').val(data.from+'-'+data.to);
},
onStart: function (data) {
$('.spriceRange').val(data.from+'-'+data.to);
},
});



$('.daterange').daterangepicker({

}, function(start, end, label) {


$('.sdaterange').val(start.format('YYYY-MM-DD')+'_'+end.format('YYYY-MM-DD'));
});


var map = new jsVectorMap({

map: 'europe_merc',
selector: document.querySelector('#map'),
zoomButtons: true,
regionsSelectable: true,
markersSelectable: true,
markersSelectableOne: true,
regionStyle: {
initial: { fill: '#6505C1' }
},

onRegionSelected: function (index, isSelected, selectedRegions) {
$('.sregions').val(selectedRegions);
// $('.tagsinput').tagsinput('add',selectedRegions.toString());
},
onRegionTooltipShow: function (tooltip, index) {
tooltip.css({ backgroundColor: 'white', color: '#35373e' }).text(
tooltip.text()
)
},

})
$("#map").hide();
$(".classShowMap").click(function(e){
$("#map").toggle();
});




$(document).on('click', '.pagination a', function(event){
event.preventDefault();
var page = $(this).attr('href').split('page=')[1];
fetch_data(page);
});

$(document).on('click', '.doSearch', function(event){
var page = 1;
fetch_data(page);
});

fetch_data(page=1);

/////////////////////// Search Object pattren //////////////////////////////

// let SearchObj={
// searchText:'',
// searchFor:[],
// regions:[],
// priceRange:[],
// daterange:'',
// Searchfields:[],
// status:[],
// type:'live',
// };
///////////////////// ////////////////////////////////



////////////////////  Search Data ////////////////////
function fetch_data(page)
{


 let searchText=$('.searchText').val();


 let searchFor=$(".tagsinput").val()
 let regions=$('.sregions').val();
 let priceRange=$('.spriceRange').val();
 let daterange=$('.sdaterange').val();

 let stype=$('.searchtype').val();

 let Searchfields = [];
 $('.Searchfields:checked').each(function() {
   Searchfields.push($(this).val());
 });



$('.overlayer').show();

$('.overlayer .loader').show();

let SearchObj={
searchText:searchText,
searchFor:searchFor,
regions:regions.split(","),
priceRange:priceRange,
daterange:daterange,
Searchfields:Searchfields,
stype:stype,
};

console.log(SearchObj);

setCookie('SearchObj',SearchObj,322);


$.ajax({
url:"/Ajax_live_Tender/fetch_data?page="+page,
type:"GET",
data:{
name:'f',
email:'cxzcmzx',

},
success:function(data)
{
$('.overlayer').hide();
$('.overlayer .loader').hide();
$('#Show_Card_Tender_data').html(data);
}
});
}


////////////////////  Search Data End ////////////////////




///////////////////////////////////////////////////////
 @if ($data['buyer']==true || $data['competitors']==true)

 @else
$('.home-search-searchfield').keyup(function(){
var query = $(this).val();
if(query != '')
{
$('.loader_gif').fadeIn();
var _token ="{{ csrf_token() }}";
$.ajax({
url:"{{ route('autocomplete.fetch') }}",
method:"POST",
data:{query:query, _token:_token},
success:function(data){
console.log(data);
$('.loader_gif').fadeOut();
$('.suggesion_result').fadeIn();
$('.suggesion_result').html(data);
}
});
}else {
$('.suggesionul').fadeOut();
}
});



$('body').click(function (e) {
  
   $('.suggesionul').hide(); 
});

@endif

});

</script>
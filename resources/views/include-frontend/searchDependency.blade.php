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
</style>


<script type="text/javascript">
$('.dropdown-menu').click(function(event){
     event.stopPropagation();
 });

$(document).ready(function() {



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
        }, 
        onStart: function (data) {
            console.dir(data);
        },
    });

    $('.daterange').daterangepicker({
    
}, function(start, end, label) {
  console.log(start.format('YYYY-MM-DD')+'-'+end.format('YYYY-MM-DD') );
}); 

 var map = new jsVectorMap({
      // map: 'europe_merc',
     map: 'europe_merc',
      selector: document.querySelector('#map'),
      zoomButtons: true,
      regionsSelectable: true,
      markersSelectable: true,
      markersSelectableOne: true,
      regionStyle: {
        initial: { fill: '#6505C1' }
      },

 onRegionTipShow: function(e, el, code){
      el.html(el.html()+' (GDP - '+gdpData[code]+')');
    },
      onRegionSelected: function (index, isSelected, selectedRegions) {
        console.log(selectedRegions)
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
        
        
    });
   
</script>



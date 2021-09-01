

@section('footer')

    <script src="{{asset('frontend/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('frontend/js/modernizr-3.6.0.min.js')}}"></script>
    <script src="{{asset('frontend/js/plugins.js')}}"></script>
    <script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('frontend/js/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('frontend/js/wow.min.js')}}"></script>
    <script src="{{asset('frontend/js/waypoints.js')}}"></script>
    <script src="{{asset('frontend/js/nice-select.js')}}"></script>
    <script src="{{asset('frontend/js/counterup.min.js')}}"></script>
    <script src="{{asset('frontend/js/owl.min.js')}}"></script>
    <script src="{{asset('frontend/js/magnific-popup.min.js')}}"></script>
    <script src="{{asset('frontend/js/yscountdown.min.js')}}"></script>
    <script src="{{asset('frontend/js/jquery-ui.min.js')}}"></script>
    <script src="{{asset('frontend/js/main.js')}}"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script> 

    <script src="{{ asset('js/toaster.min.js') }}"></script>


    <script type="text/javascript">

        

        $(document).ready(function(){



            var current_fs, next_fs, previous_fs; //fieldsets

            var opacity;

            var current = 1;

            var steps = $("fieldset").length;



            setProgressBar(current);



            $(".next").click(function(){



            current_fs = $(this).parent();

            next_fs = $(this).parent().next();



            //Add Class Active

            $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");



            //show the next fieldset

            next_fs.show();

            //hide the current fieldset with style

            current_fs.animate({opacity: 0}, {

            step: function(now) {

            // for making fielset appear animation

            opacity = 1 - now;



            current_fs.css({

            'display': 'none',

            'position': 'relative'

            });

            next_fs.css({'opacity': opacity});

            },

            duration: 500

            });

            setProgressBar(++current);

            });



            $(".previous").click(function(){



            current_fs = $(this).parent();

            previous_fs = $(this).parent().prev();



            //Remove class active

            $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");



            //show the previous fieldset

            previous_fs.show();



            //hide the current fieldset with style

            current_fs.animate({opacity: 0}, {

            step: function(now) {

            // for making fielset appear animation

            opacity = 1 - now;



            current_fs.css({

            'display': 'none',

            'position': 'relative'

            });

            previous_fs.css({'opacity': opacity});

            },

            duration: 500

            });

            setProgressBar(--current);

            });



            function setProgressBar(curStep){

            var percent = parseFloat(100 / steps) * curStep;

            percent = percent.toFixed();

            $(".progress-bar")

            .css("width",percent+"%")

            }



            $(".submit").click(function(){

            return false;

            })



            });
    </script>

    
@endsection



   
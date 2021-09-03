



    <div class="s010 mt-5">
    <form>

    <input type="hidden" name="searchFor" class="searchFor">
    <input type="hidden" name="sdaterange" class="sdaterange">
    <input type="hidden" name="sregions" class="sregions">
    <input type="hidden" name="spriceRange" class="spriceRange">

    @if ($data['buyer']==true)

    <input type="hidden" name="searchtype" class="searchtype" value="buyer">

    @elseif($data['competitors']==true)

     <input type="hidden" name="searchtype" class="searchtype" value="competitors">

    @elseif($data['historical']==true)

     <input type="hidden" name="searchtype" class="searchtype" value="historical">

    @else

     <input type="hidden" name="searchtype" class="searchtype" value="live">

    @endif

    <div class="inner-form">

      <img src="{{ asset('frontend/images/dashboard/loading.gif') }}" class="loader_gif img-fluid" width="50" style="display:none">
      <div class="input-group mb-3">

         @if ($data['buyer']==true)
    <input type="text" class="form-control home-search-searchfield searchText" aria-label="Text input with dropdown button" placeholder="Search By Company Name">
         @elseif($data['competitors']==true)
  <input type="text" class="form-control home-search-searchfield searchText" aria-label="Text input with dropdown button" placeholder="Search By Company Name">
         @else
  <input type="text" class="form-control home-search-searchfield searchText" aria-label="Text input with dropdown button" placeholder="What do you want to search for?">
         @endif
      

         @if ($data['buyer']==true || $data['competitors']==true)
        

       
        
       @else
       <div class="suggesion_result"></div>
        <div class="input-group-append">
          <button class="btn btn-outline-secondary dropdown-toggle home-search-searchfield" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Select Field</button>
          <div class="dropdown-menu">
            <div  class="funkyradio">
              <div class="funkyradio-success">
                <input type="checkbox" name="Searchfields[]" id="checkbox1" checked class="Searchfields" value="title" />
                <label for="checkbox1">Title</label>
              </div>
              <div class="funkyradio-success">
                <input type="checkbox" name="Searchfields[]" id="checkbox2" class="Searchfields" checked value="publisher"/>
                <label for="checkbox2">Publisher</label>
              </div>
              <div class="funkyradio-success">
                <input type="checkbox" name="Searchfields[]" id="checkbox3" class="Searchfields"checked value="location"/>
                <label for="checkbox3">Location</label>
              </div>
              <div class="funkyradio-success">
                <input type="checkbox" name="Searchfields[]" id="checkbox4" class="Searchfields" checked value="cpv"/>
                <label for="checkbox4">CPV</label>
              </div>
              <div class="funkyradio-success">
                <input type="checkbox" name="Searchfields[]" id="checkbox5" class="Searchfields" value="summary" checked/>
                <label for="checkbox5">Summary</label>
              </div>
              <div class="funkyradio-success">
                <input type="checkbox" name="Searchfields[]" id="checkbox6" class="Searchfields" value="award" checked/>
                <label for="checkbox6">Award</label>
              </div>
              <div class="funkyradio-success">
                <input type="checkbox" name="Searchfields[]" id="checkbox7" class="Searchfields" value="lang" checked/>
                <label for="checkbox7">Response language</label>
              </div>
            </div>
            
            
          </div>
        </div>
        @endif
      </div>
      
      <div class="advance-search">
        <label>Searched For:</label>
        <input type="text"  data-role="tagsinput"  class="tagsinput" />
        <!--  <strong>ADVANCED SEARCH</strong> -->
        <div class="row">
          <div class="col-lg-3  col-sm-12 mt-sm-2">
            <div class="myinputrange">
              <div class="btn group-btn"> 
                
                <button type="button" class="btn-search gray-btn mt-4 classShowMap"><i class="fa fa-map-marker text-dark my-icon-search" aria-hidden="true" ></i>LOCATION</button>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-sm-12 mt-sm-2">
            
            <div class="myinputrange">
              <div class="input-select mt-3">
                <!--  <h8>SEARCH BY PRICE RANGE:</h8> -->
                <div class="wrapper" style="padding:0px 20px;">
                  <div class="range-slider">
                    <input type="text" class="js-range-slider" name="my_range" value="" />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-sm-12 mt-sm-2">
            <div class="myinputrange">
              
              
              <button type="button" class="btn-search gray-btn mt-4 daterange"><i class="fa fa-calendar my-icon-search" aria-hidden="true"></i>DATE RANGE</button>
            </div>
          </div>
        </div>
        <div class="row">
          
          <div class="col-lg-12">
            <div id="map" style="
              height:40vh;
            "></div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-3  col-sm-12 mt-sm-2">
            <div class="myinputrange">
              <div class="result-count custom-button-white font-weight-bold">
                <span>
                  108
                </span>
                results
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-sm-12 mt-sm-2">
            <div class="row">
              <div class="col-lg-4 col-sm-12 mt-sm-2">
                <div class="myinputrange">
                  <div class="btn group-btn">
                    
                    <button type="button" class="btn-search gray-btn"><i class="fa fa-print text-dark my-icon-search" aria-hidden="true"></i>PRINT</button>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-sm-12 mt-sm-2">
                <div class="myinputrange">
                  <div class="btn group-btn">
                    
                    <button type="button" class="btn-search gray-btn "><i class="fa fa-recycle text-dark my-icon-search" aria-hidden="true"></i>RESET</button>
                  </div>
                </div>
              </div>

              
              <div class="col-lg-4 col-sm-12 mt-sm-2">
                <div class="myinputrange">
                  <div class="btn group-btn">
                     @if ($data['buyer']==true || $data['competitors']==true || $data['historical']==true)
        
                    @else
                    <button type="button" class="btn-search gray-btn"><i class="fa fa-cloud text-dark my-icon-search" aria-hidden="true"></i>SAVE</button>

                   @endif
                  </div>
                </div>
              </div>
              
            </div>
          </div>
          <div class="col-lg-3 col-sm-12 mt-sm-2">
            <div class="myinputrange">
              <div class="btn group-btn">
                 @if ($data['buyer']==true || $data['competitors']==true || $data['historical']==true)
        
                      @else
                <button type="button" class="btn-search gray-btn font-weight-bold"><i class="fa fa-bell-o text-dark my-icon-search" aria-hidden="true"></i>EMAIL ALERTS</button>
                @endif
              </div>
              
            </div>
          </div>
        
        </div>
        <div class="row">
          <div class="col-lg-3  col-sm-12 mt-sm-2">
            
          </div>
          <div class="col-lg-6 col-sm-12 mt-sm-2">
            <div class="row">
              <div class="loader" style="display:none;"></div>
              
            </div>
          </div>
          <div class="col-lg-3 col-sm-12 mt-sm-2">
            <div class="myinputrange">
              <div class="btn group-btn">
                 
                <button type="button" class="btn-search font-weight-bold doSearch"><i class="fa fa-search text-light my-icon-search " aria-hidden="true"></i>SEARCH</button>
              </div>
            </div>
          </div>
        </div>
        
      </div>
    </div>
  </form>
</div>
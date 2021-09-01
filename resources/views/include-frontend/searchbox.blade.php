 @php
   echo $data['sidenty'];
 @endphp

  <div class="s010 mt-5">

      <form>

        <div class="inner-form">



            <div class="input-group mb-3">

              <input type="text" class="form-control home-search-searchfield" aria-label="Text input with dropdown button" placeholder="Start Typing Contract Names">

              <div class="input-group-append">

                <button class="btn btn-outline-secondary dropdown-toggle home-search-searchfield" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Select Field</button>

                <div class="dropdown-menu">

                    <div  class="funkyradio">

                        <div class="funkyradio-success">

                            <input type="checkbox" name="checkbox1" id="checkbox1" checked/>

                            <label for="checkbox1">Title</label>

                        </div>

                        <div class="funkyradio-success">

                            <input type="checkbox" name="checkbox2" id="checkbox2" checked/>

                            <label for="checkbox2">Publisher</label>

                        </div>

                        <div class="funkyradio-success">

                            <input type="checkbox" name="checkbox3" id="checkbox3"checked />

                            <label for="checkbox3">Location</label>

                        </div>

                        <div class="funkyradio-success">

                            <input type="checkbox" name="checkbox4" id="checkbox4" checked/>

                            <label for="checkbox4">CPV</label>

                        </div>

                        <div class="funkyradio-success">

                            <input type="checkbox" name="checkbox5" id="checkbox5" checked/>

                            <label for="checkbox5">Summary</label>

                        </div>

                        <div class="funkyradio-success">

                            <input type="checkbox" name="checkbox6" id="checkbox6" checked/>

                            <label for="checkbox6">Award</label>

                        </div>

                         <div class="funkyradio-success">

                            <input type="checkbox" name="checkbox7" id="checkbox7" checked/>

                            <label for="checkbox7">Response language</label>

                        </div>

                    </div>

                    

              
                </div>

              </div>

            </div>





        

          <div class="advance-search">
                 <label>Searched For:</label>
                   <input type="text" value="Amsterdam,Washington,Sydney,Beijing,Cairo" data-role="tagsinput"  class="tagsinput" />
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
                  
                    <button type="button" class="btn-search gray-btn"><i class="fa fa-cloud text-dark my-icon-search" aria-hidden="true"></i>SAVE</button>
                  </div>
              </div>
               </div>

               
             </div>
           </div>

           <div class="col-lg-3 col-sm-12 mt-sm-2">
             <div class="myinputrange">

               <div class="btn group-btn">
                  
                  <button type="button" class="btn-search gray-btn font-weight-bold"><i class="fa fa-bell-o text-dark my-icon-search" aria-hidden="true"></i>EMAIL ALERTS</button>

                </div>

              

              </div>
           </div>
          </div>  

          <div class="row">

           <div class="col-lg-3  col-sm-12 mt-sm-2">
            
           </div>

           <div class="col-lg-6 col-sm-12 mt-sm-2">
             <div class="row">

               
             </div>
           </div>

           <div class="col-lg-3 col-sm-12 mt-sm-2">
             <div class="myinputrange">

               <div class="btn group-btn">
                   
                  <button type="button" class="btn-search font-weight-bold"><i class="fa fa-search text-light my-icon-search" aria-hidden="true"></i>SEARCH</button>

                </div>

              </div>
           </div>
          </div>  

            



          </div>

        </div>

      </form>

    </div>
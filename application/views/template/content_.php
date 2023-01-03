<?php $this->load->view("" . $header) ?>

<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Warning!</strong> Better check yourself, you're not looking too good.
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url() ?>welcome/store" enctype="multipart/form-data" method="POST">

          <div class="form-group">
            <label for="message-text" class="control-label">Pesan:</label>
            <textarea class="form-control" name="pesan" id="message-text" rows="8" required="required"></textarea>
          </div>
          <div class="leave">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="control-label">Foto:</label>
            <input type="file" class="form-control" name="foto" id="recipient-name" accept="image/jpeg,image/png,image/jpg" required="required">
          </div>

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary btn-block btn-lg">Kirim</button>
        </div>
      </form>
    </div>
  </div>
</div>
<body>
  <div class="container bootstrap snippets bootdeys">
    <div class="row">
      <div class="col-lg-3 col-md-3 col-sm-4">
        <div class="panel rounded shadow">
          <div class="panel-body">
            <div class="inner-all">
              <ul class="list-unstyled">
                <li class="text-center">
                  <img data-no-retina="" class="img-circle img-responsive img-bordered-primary" src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="John Doe">
                </li>
                <li class="text-center">
                  <h4 class="text-capitalize">John Doe</h4>
                  <p class="text-muted text-capitalize">web designer</p>
                </li>

                <li><br></li>
                <li>
                  <div class="btn-group-vertical btn-block">
                    <a href="" class="btn btn-default"><i class="fa fa-cog pull-right"></i>Edit Account</a>
                    <a href="" class="btn btn-default"><i class="fa fa-sign-out pull-right"></i>Logout</a>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div><!-- /.panel -->



      </div>
      <div class="col-lg-9 col-md-9 col-sm-8">

        <div class="profile-cover">
         <div class="panel rounded shadow">
          <form action="...">

            <div class="panel-body no-padding">
             <div class="pull-left half">
              <div class="media">
                <div class="media-object pull-left">
                  <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="..." class="img-circle img-post">
                </div>
                <div class="media-body">
                  <button type="button" class="btn btn-default btn-block btn-lg" data-toggle="modal" data-target="#exampleModal">Apa yang ingin Anda laporkan, User?</button>
                </div>
              </div>
            </div><!-- /.pull-left -->

          </div>

        </form>

      </div><!-- /.panel -->
    </div><!-- /.profile-cover -->


    <div class="row" id="post-data">
      <?php
      $this->load->view('template/data', $posts);
      ?>
      
                      <!-- <div class="col-md-6">
                        <div class="panel panel-success rounded shadow">
                          <div class="panel-heading no-border">
                            <div class="pull-left half">
                              <div class="media">
                                <div class="media-object pull-left">
                                  <img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="..." class="img-circle img-post">
                                </div>
                                <div class="media-body">
                                  <a href="#" class="media-heading block mb-0 h4 text-white">John Doe</a>
                                  <small class="block text-muted">8 Desember 2022 pada 14:22</small>
                                </div>
                              </div>
                            </div>

                            <div class="clearfix"></div>
                          </div>
                          <div class="panel-body no-padding">
                            <div class="inner-all block">
                              <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Expedita, iste omnis fugiat porro consequuntur ratione iure error reprehenderit cum est ab similique magnam molestias aperiam voluptatibus quia aliquid! Sed, minima.
                              </p>
                              <blockquote class="mb-10">Laporan telah berhasil diproses</blockquote>

                              <img  src="https://via.placeholder.com/3000x3000/" alt="..." class="img-responsive full-width">
                              <div class="line no-margin"></div>
                              <div class="no-padding mt-3">

                                <ul class="nav nav-pills">

                                  <li><a href="#"><i class="glyphicon glyphicon-map-marker"></i> 6.2526463,106.9367348</a></li>

                                </ul>
                              </div>

                            </div>

                          </div>

                        </div>
                      </div> -->

                    </div>
                    <div class="ajax-load text-center" style="display:none">
                      <!-- <p><img src="http://demo.itsolutionstuff.com/plugin/loader.gif">Loading More post</p> -->
                    </div>


                  </div>

                </div>
              </div>
              <script type="text/javascript">
  var page = 1;
  $(window).scroll(function() {
      if($(window).scrollTop() + $(window).height() >= $(document).height()) {
          page++;
          loadMoreData(page);
      }
  });


  function loadMoreData(page){
    $.ajax(
          {
              url: '?page=' + page,
              type: "get",
              beforeSend: function()
              {
                  $('.ajax-load').show();
              }
          })
          .done(function(data)
          {
              if(data == " "){
                  $('.ajax-load').html("No more records found");
                  return;
              }
              $('.ajax-load').hide();
              $("#post-data").append(data);
          })
          .fail(function(jqXHR, ajaxOptions, thrownError)
          {
                alert('server not responding...');
          });
  }
</script>



              <script type="text/javascript">
                $(document).ready(function() {
                  $('#message-text').change(function() {

                   if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(showPosition, showError);
                  } else { 
                   $('.leave').html(`Geolocation is not supported by this browser.`);
                 }
               });

                });
                function showPosition(position) {
                  $('.leave').html(`<input type="hidden" value="` + position.coords.latitude + `" name="latitude" class="form-control" required="required" id="leave" ><br><input type="hidden" value="` + position.coords.longitude + `" name="longitude" class="form-control" required="required" id="leave">`);
    // x.innerHTML = "Latitude: " + position.coords.latitude + 
    // "<br>Longitude: " + position.coords.longitude;
  }
  function showError(error) {
    switch(error.code) {
      case error.PERMISSION_DENIED:
      x.innerHTML = "User denied the request for Geolocation."
      break;
      case error.POSITION_UNAVAILABLE:
      x.innerHTML = "Location information is unavailable."
      break;
      case error.TIMEOUT:
      x.innerHTML = "The request to get user location timed out."
      break;
      case error.UNKNOWN_ERROR:
      x.innerHTML = "An unknown error occurred."
      break;
    }
  }

</script>

</body>
</html>

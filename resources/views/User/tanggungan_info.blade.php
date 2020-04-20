

<div id="content-wrapper" class="d-flex flex-column">
<div class="container-fluid mt--7">

<!-- Start of Upload Document -->
<div class="row">
  <div class="col-xl-12 col-lg-12">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-9 col-lg-9 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row justify-content-center">
              <div class="col-lg-12 ">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">BORANG MAKLUMAT TANGGUNGAN</h1>
                  </div>
 

                  <div class="col-lg-12 col-sm-12 col-md-12" id="div_id">
                    <div class="form-group">

                      <form class="user" method="post" action="/" enctype="multipart/form-data" autocomplete="off">
                        {{ csrf_field() }}

                        <div class="card-body">
                          <div class="col-xl-12 order-xl-2 p-5 bg-white rounded shadow mb-5">            

                              <div class="form-group col-lg-8">
                                <div class="form-group">
                                <label>Nama</label>
                                <input name="" type="text" class="form-control form-control-user" id="" placeholder="">
                                </div>
                              </div>              

                              <div class="form-group col-lg-8">
                                <div class="form-group">
                                <label>Hubungan</label>
                                <input name="" type="text" class="form-control form-control-user" id="" placeholder="">
                                </div>
                              </div>  

                              <div class="form-group col-lg-6">
                                <div class="form-group">
                                <label>No. Kad Pengenalan</label>
                                <input name="nokp" type="text" class="form-control form-control-user" id="InputIC" maxlength="14" placeholder="Nombor Kad Pengenalan: xxxxxx-xx-xxxx">
                                </div>
                              </div>

                              <div class="form-group col-lg-6">
                                <div class="form-group">
                                <label>Tarikh Lahir</label>
                                <input name="" type="text" class="form-control form-control-user date" id="InputMulaStudy" maxlength="10" placeholder="">
                                </div> 
                              </div> 

                          </div>
                        </div>

                        </div>
                    </div>

                    <script type="text/javascript">
                        $(function () {
                          $('#InputIC').keydown(function (e) {
                            var key = e.charCode || e.keyCode || 0;
                              $text = $(this); 
                              if (key !== 8 && key !== 9) {
                                if ($text.val().length === 6) {
                                  $text.val($text.val() + '-');
                                }
                                if ($text.val().length === 9) {
                                  $text.val($text.val() + '-');
                                }
                              }
                            return (key == 8 || key == 9 || key == 46 || (key >= 48 && key <= 57) || (key >= 96 && key <= 105));
                          })
                        }); 
                    </script>

              <a href="#" onclick="Count_AddRows()"><i class="btn btn-success mt-4">+</i></a>


          <script type="text/javascript">
               /*function Count_AddRows() {
                  var totalRowCount = 0;
                  var rowCount = 0;
                  var table = document.getElementById("table");
                  var rows = table.getElementsByTagName("tr")
                  for (var i = 0; i < rows.length; i++) {
                      totalRowCount++;
                      if (rows[i].getElementsByTagName("td").length > 0) {
                          rowCount++;
                      }
                  }

                  var new_row = rowCount + 1;

                  if(new_row < 5) {
                    var tr='<tr>'+
                    '<td><input name="tanggung_nama_' +new_row+ '" type="text" class="form-control" require=""></td>'+
                    '<td><input name="tanggung_hubungan_' +new_row+ '" type="text" class="form-control" require=""></td>'+
                    '<td><input name="tanggung_nokp_' +new_row+ '" type="text" class="form-control" require=""></td>'+
                    '<td><input name="tanggung_umur_' +new_row+ '" type="text" class="form-control" require=""></td>'+
                    '<td></td>'+
                    '</tr>';
                    
                    $('table').append(tr);                    
                  }
                  else {
                    alert("limit reached");
                  }


                  var div = document.getElementById('div_id'),
                      clone = div.cloneNode(true); // true means clone all childNodes and all event handlers
                  clone.id = "some_id";
                  document.body.appendChild(clone);



              }

              function test_last_row() {
                var id = $('#table tr:last').attr('name');
                alert(id);
              }*/

          </script>

                  <div class="text-right ol-sm-12 col-md-12">
                      <button id="apply_btn" type="submit" class="btn btn-primary mt-4">Simpan</button>
                  </div>

               @csrf
              </form>
            </div>
            </div>

                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>
</div>





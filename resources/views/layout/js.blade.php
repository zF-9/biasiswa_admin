  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>


  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Terima Kasih Menggunakan Sistem Ini</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Sila Tekan "Log Keluar" jika ingin teruskan.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
          <!--<a class="btn btn-primary" href="{{ route('logout') }}">Logout</a>-->
          <a href="{{ route('logout') }}" class="btn btn-primary" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
            <i class="ni ni-user-run"></i>
            <span>{{ __('Log Keluar') }}</span>
          </a>  
          @auth()
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
         @endauth            
        </div>
      </div>
    </div>
  </div>
 <!-- Logout Modal-->

    <script type="text/javascript">
      $('.date').datepicker({  
        format: 'dd-mm-yyyy',
        autoclose: true,
      });  
    </script> 

    <script type="text/javascript">
        var age = "";
        $('#Inputlahir').datepicker({
            onSelect: function(value, ui) {
                var today = new Date();
                age = today.getFullYear() - ui.selectedYear;
                $('#age').val(age);
            },
            autoclose: true,
            changeMonth: true,
            changeYear: true
        });
    </script>

<script type="text/javascript">
  $('#Inputdate').datepicker().on("changeDate", function(e) {
      var selectedDate = new Date(e.date.toString());
      var xMonth = selectedDate.getMonth();
      var xYear = selectedDate.getFullYear();
      //alert(xMonth);
      //alert(xYear);

      $('#m').val(xMonth);
      $('#y').val(xYear);
  });
</script>


  <script type="text/javascript">
    $('#Inputlahir').datepicker().on("changeDate", function(e) {
        var currentDate = new Date();
        var selectedDate = new Date(e.date.toString());
        var age = currentDate.getFullYear() - selectedDate.getFullYear();
        var m = currentDate.getMonth() - selectedDate.getMonth();

        if (m < 0 || (m === 0 && currentDate.getDate() < selectedDate.getDate())) {
            age--;
        }

        $('.inputumur').val(age);
    });
  </script>

  <script type="text/javascript">
        var ageLantik = "";
        $('.Tlantik').datepicker({
            onSelect: function(ui) {
                var today = new Date();
                alert(today);
                ageLantik = today.getFullYear() - ui.selectedYear;
                $('.inputKhidmat').val(ageLantik);
                //alert(ageLantik);
                
            },
            autoclose: true,
            changeMonth: true,
            changeYear: true
        });
  </script>

    <script type="text/javascript">
      $('#InputTlantik').datepicker().on("changeDate", function(e) {
          var currentDate = new Date();
          var selectedDate = new Date(e.date.toString());
          var age = currentDate.getFullYear() - selectedDate.getFullYear();
          var m = currentDate.getMonth() - selectedDate.getMonth();

          if (m < 0 || (m === 0 && currentDate.getDate() < selectedDate.getDate())) {
              age--;
          }
          //alert(age);

          $('.inputKhidmat').val(age);
      });
    </script>

    <script type="text/javascript">
       $(function () {
          $('#InputKp').keydown(function (e) {
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

    <script type="text/javascript">
      // test
    </script>

    <script type="text/javascript">
    </script>

    <script>
      function consecutiveYear() {
        document.getElementById('nama_u_form').style.display = "none"; 
        document.getElementById('option_u_form').style.display = "none";
        document.getElementById('Tanggungan').style.display = "none";
      }
    </script>

    <script>
      $(document).ready(function() {
        var d = new Date();
        var x = d.getFullYear();
        var y = d.getFullYear() - 1;
        var z = d.getFullYear() - 2;

        $("#year_1").yearpicker({
          year: x,
          startYear: 2012,
          endYear: 2048
        });

        $("#year_2").yearpicker({
          year: y,
          startYear: 2012,
          endYear: 2048
        });

        $("#year_3").yearpicker({
          year: z,
          startYear: 2012,
          endYear: 2048
        });

        document.getElementById("yCount").innerHTML = total_y;
        document.getElementByClassName("user_pic").src = imgURL;
      });
    </script>

    <script>
      $(document).ready(function(){
        $('#full-clndr').clndr();
      });
    </script>

    <script>
    </script>

    <script>
    /* canvas-toBlob.js
     * A canvas.toBlob() implementation.
     * 2016-05-26
     * 
     * By Eli Grey, http://eligrey.com and Devin Samarin, https://github.com/eboyjr
     * License: MIT
     *   See https://github.com/eligrey/canvas-toBlob.js/blob/master/LICENSE.md
     */

    /*global self */
    /*jslint bitwise: true, regexp: true, confusion: true, es5: true, vars: true, white: true,
      plusplus: true */

    /*! @source http://purl.eligrey.com/github/canvas-toBlob.js/blob/master/canvas-toBlob.js */

    (function(view) {
    "use strict";
    var
    	  Uint8Array = view.Uint8Array
    	, HTMLCanvasElement = view.HTMLCanvasElement
    	, canvas_proto = HTMLCanvasElement && HTMLCanvasElement.prototype
    	, is_base64_regex = /\s*;\s*base64\s*(?:;|$)/i
    	, to_data_url = "toDataURL"
    	, base64_ranks
    	, decode_base64 = function(base64) {
    		var
    			  len = base64.length
    			, buffer = new Uint8Array(len / 4 * 3 | 0)
    			, i = 0
    			, outptr = 0
    			, last = [0, 0]
    			, state = 0
    			, save = 0
    			, rank
    			, code
    			, undef
    		;
    		while (len--) {
    			code = base64.charCodeAt(i++);
    			rank = base64_ranks[code-43];
    			if (rank !== 255 && rank !== undef) {
    				last[1] = last[0];
    				last[0] = code;
    				save = (save << 6) | rank;
    				state++;
    				if (state === 4) {
    					buffer[outptr++] = save >>> 16;
    					if (last[1] !== 61 /* padding character */) {
    						buffer[outptr++] = save >>> 8;
    					}
    					if (last[0] !== 61 /* padding character */) {
    						buffer[outptr++] = save;
    					}
    					state = 0;
    				}
    			}
    		}
    		// 2/3 chance there's going to be some null bytes at the end, but that
    		// doesn't really matter with most image formats.
    		// If it somehow matters for you, truncate the buffer up outptr.
    		return buffer;
    	}
    ;
    if (Uint8Array) {
    	base64_ranks = new Uint8Array([
    		  62, -1, -1, -1, 63, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, -1
    		, -1, -1,  0, -1, -1, -1,  0,  1,  2,  3,  4,  5,  6,  7,  8,  9
    		, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25
    		, -1, -1, -1, -1, -1, -1, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35
    		, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51
    	]);
    }
    if (HTMLCanvasElement && (!canvas_proto.toBlob || !canvas_proto.toBlobHD)) {
    	if (!canvas_proto.toBlob)
    	canvas_proto.toBlob = function(callback, type /*, ...args*/) {
    		  if (!type) {
    			type = "image/png";
    		} if (this.mozGetAsFile) {
    			callback(this.mozGetAsFile("canvas", type));
    			return;
    		} if (this.msToBlob && /^\s*image\/png\s*(?:$|;)/i.test(type)) {
    			callback(this.msToBlob());
    			return;
    		}

    		var
    			  args = Array.prototype.slice.call(arguments, 1)
    			, dataURI = this[to_data_url].apply(this, args)
    			, header_end = dataURI.indexOf(",")
    			, data = dataURI.substring(header_end + 1)
    			, is_base64 = is_base64_regex.test(dataURI.substring(0, header_end))
    			, blob
    		;
    		if (Blob.fake) {
    			// no reason to decode a data: URI that's just going to become a data URI again
    			blob = new Blob
    			if (is_base64) {
    				blob.encoding = "base64";
    			} else {
    				blob.encoding = "URI";
    			}
    			blob.data = data;
    			blob.size = data.length;
    		} else if (Uint8Array) {
    			if (is_base64) {
    				blob = new Blob([decode_base64(data)], {type: type});
    			} else {
    				blob = new Blob([decodeURIComponent(data)], {type: type});
    			}
    		}
    		callback(blob);
    	};

    	if (!canvas_proto.toBlobHD && canvas_proto.toDataURLHD) {
    		canvas_proto.toBlobHD = function() {
    			to_data_url = "toDataURLHD";
    			var blob = this.toBlob();
    			to_data_url = "toDataURL";
    			return blob;
    		}
    	} else {
    		canvas_proto.toBlobHD = canvas_proto.toBlob;
    	}
    }
    }(typeof self !== "undefined" && self || typeof window !== "undefined" && window || this.content || this));
  </script>

  <script type="text/javascript">
      /*var toggle_01 = document.getElementById('customSwitches1');
      var toggle_02 = document.getElementById('customSwitches2');
      var toggle_03 = document.getElementById('customSwitches3');*/

    function toggler_fx() {
      var toggle_01 = document.getElementById('customSwitches1');
      var toggle_02 = document.getElementById('customSwitches2');
      var toggle_03 = document.getElementById('customSwitches3');

      if(toggle_01.checked == true) {
        toggle_02.checked = false;
        toggle_03.checked = false;

        /*$('#customSwitches2').attr("checked", false);
        $('#customSwitches3').attr("checked", false);*/
      }
      else if(toggle_02.checked == true) {
        toggle_01.checked = false;
        toggle_03.checked = false;
        
        /*$('#customSwitches1').attr("checked", false);
        $('#customSwitches3').attr("checked", false);*/
      } 
      else if(toggle_03.checked == true) {
        toggle_02.checked = false;
        toggle_01.checked = false;
        
        /*$('#customSwitches2').attr("checked", false);
        $('#customSwitches1').attr("checked", false);*/
      } 
      else {
        toggle_01.checked = false;
        toggle_02.checked = false;    
        toggle_03.checked = false;    
      }
    }
  </script>

  <body onload="consecutiveYear();">
  <script src="{{ asset ('js/canvas-to-blob.min.js')}}"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  <script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>

  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset ('vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{ asset ('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset ('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ asset ('js/sb-admin-2.min.js')}}"></script>

  <!-- Page level plugins -->
  <script src="{{ asset ('vendor/chart.js/Chart.min.js')}}"></script>

  <!-- Page level custom scripts -->
  <script src="{{ asset ('js/chart-area.js')}}"></script>
  <script src="{{ asset ('js/chart-rekod.js')}}"></script>
  <script src="{{ asset ('js/chart-pie.js')}}"></script>
  <script src="{{ asset ('js/Chart-Pie-41.js')}}"></script>
  <script src="{{ asset ('js/chart-bar.js') }}"></script>
  <script src="{{ asset ('js/chart-acceptance.js') }}"></script>
  <script src="{{ asset ('js/chart-profile.js') }}"></script>
  <script src="{{ asset ('js/chart-user.js') }}"></script>
  <script src="{{ asset ('js/chart-bar-kursus.js') }}"></script>
  <script src="{{ asset ('js/chart-bar-kursuspemohon.js') }}"></script>
  <script src="{{ asset ('js/chart-bar-mod.js') }}"></script>
  <script src="{{ asset ('js/chart-bar-modpelajar.js') }}"></script>
  <script src="{{ asset ('js/chart-bar-study-place.js') }}"></script>
  <script src="{{ asset ('js/chart-bar-study-placepelajar.js') }}"></script>
  <script src="{{ asset ('js/chart-bar-taraf-pelantikan.js') }}"></script>
  <script src="{{ asset ('js/chart-bar-taraf-pelantikanpemohon.js') }}"></script>
  <script src="{{ asset ('js/pie-gredbyDegree.js') }}"></script>
  <script src="{{ asset ('js/pie-gredbyMaster.js') }}"></script>
  <script src="{{ asset ('js/pie-gredbyPHD.js') }}"></script>
  <script src="{{ asset ('js/Chart-Pie-41.js') }}"></script>

    <!-- Page level plugins -->
  <script src="{{ asset ('vendor/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{ asset ('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

  <!-- Page level custom scripts -->
  <script src="{{ asset ('js/datatables.js')}}"></script>

  <!-- Year Picker CSS -->
  <link rel="stylesheet" href="{{ asset ('css/yearpicker.css') }}" />
  <!-- Year Picker Js -->
  <script src="{{ asset ('js/yearpicker.js') }}"></script>

  <!-- calendar plugins for dahsboard -->
  <link rel="stylesheet" href="{{ asset ('css/demo_cal.css') }}"/>
  <link rel="stylesheet" href="{{ asset ('css/theme2.css') }}"/>
  <!--<link rel="stylesheet" href="{{ asset ('css/progresscrumbs.css') }}"/>-->
  <link rel="stylesheet" href="{{ asset ('css/progressdot.css') }}"/>
  <script type="text/javascript" src="{{ asset ('js/caleandar.js') }}"></script>
  <script type="text/javascript" src="{{ asset ('js/Admin_cal.js') }}"></script>
  <script type="text/javascript" src="{{ asset ('js/canvasjs.min.js') }}"></script>

  <script type="text/javascript" src="{{ asset ('js/canvastoblob.js') }}"></script>






  
 
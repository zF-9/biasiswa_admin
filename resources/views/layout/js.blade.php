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
      /*window.onload = function() {
        document.getElementById('uploadstatw').style.display = 'none';
      };*/

      function togglediv(id) {
        var div = document.getElementById(id);
        div.style.display = div.style.display == "none" ? "block" : "none";
      } 
    </script>

    <script type="text/javascript">
    </script>

    <script>
      function consecutiveYear() {
        var d = new Date();
        var x = d.getFullYear();
        var y = d.getFullYear() - 1;
        var z = d.getFullYear() - 2;
        //document.getElementById("year_1").innerHTML = x;
        //document.getElementById("year_2").innerHTML = y;
        //document.getElementById("year_3").innerHTML = z;
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
      }
    </script>

    <script>
      /*$(document).ready(function() {
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
        //document.getElementById("year_1").val(x);
        //document.getElementById("year_2").val(y);
        //document.getElementById("year_3").val(z);
      });*/
    </script>

    <script>
      /*var events = [
              {'Date': new Date(2020, 1, 7), 'Title': 'Doctor appointment at 3:25pm.'},
              {'Date': new Date(2020, 1, 18), 'Title': 'New Garfield movie comes out!', 'Link': 'https://garfield.com'},
              {'Date': new Date(2020, 1, 27), 'Title': '25 year anniversary', 'Link': 'https://www.google.com.au/#q=anniversary+gifts'},
      ];*/
      $(document).ready(function(){
        $('#full-clndr').clndr();
      });

      $( function() {

        // PARDON ME while I do a little magic to keep these events relevant for the rest of time...
        var currentMonth = moment().format('YYYY-MM');
        var nextMonth    = moment().add('month', 1).format('YYYY-MM');

        var events = [
          { date: currentMonth + '-' + '10', title: 'Persian Kitten Auction', location: 'Center for Beautiful Cats' },
          { date: currentMonth + '-' + '19', title: 'Cat Frisbee', location: 'Jefferson Park' },
          { date: currentMonth + '-' + '23', title: 'Kitten Demonstration', location: 'Center for Beautiful Cats' },
          { date: nextMonth + '-' + '07',    title: 'Small Cat Photo Session', location: 'Center for Cat Photography' }
        ];

        clndr = $('#full-clndr').clndr({
          template: $('#full-clndr-template').html(),
          events: events,
          forceSixRows: true
        });
      });
    </script>


  <body onload="consecutiveYear();">

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
  <script src="{{ asset ('js/chart-pie.js')}}"></script>
  <script src="{{ asset ('js/chart-bar.js') }}"></script>
  <script src="{{ asset ('js/chart-acceptance.js') }}"></script>
  <script src="{{ asset ('js/chart-bar-kursus.js') }}"></script>


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
  <link rel="stylesheet" href="{{ asset ('css/theme3.css') }}"/>
  <script type="text/javascript" src="{{ asset ('js/caleandar.js') }}"></script>
  <script type="text/javascript" src="{{ asset ('js/Admin_cal.js') }}"></script>




  
 
  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <!--<a class="btn btn-primary" href="{{ route('logout') }}">Logout</a>-->
          <a href="{{ route('logout') }}" class="btn btn-primary" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
            <i class="ni ni-user-run"></i>
            <span>{{ __('Logout') }}</span>
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
        format: 'dd-mm-yyyy'
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


    <!-- Page level plugins -->
  <script src="{{ asset ('vendor/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{ asset ('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

  <!-- Page level custom scripts -->
  <script src="{{ asset ('js/datatables.js')}}"></script>




  
 
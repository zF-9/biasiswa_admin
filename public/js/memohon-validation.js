<script type="text/javascript">
   $(document).ready(function () {

   	$('#course').onchange = function ()
        
    if('{{ $user_data->Gred }}' < 40 ) {
		alert("indak boleh ini memohon}");
    }

   });
</script>
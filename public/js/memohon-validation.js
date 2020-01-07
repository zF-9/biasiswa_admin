//$(document).ready(function () {
//window.onload = function() {
    /*   var gred = '{{ $user_data->Gred }}' ;
       var age = '{{ $user_data->umur }}' ;
   	function course_validation() {

       alert(gred);
    }*/
//}
//});


    function course_validation() {
        var x = document.getElementById("course").value;
        var gred = '{{ $user_data->Gred }}' ;
        var age = '{{ $user_data->umur }}' ;
        //alert('{{ $user_data -> umur}}');
        alert(age);
    }

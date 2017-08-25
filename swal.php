<script src="asset/sweetalert/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="asset/sweetalert/sweetalert.css">
<script>
function swali(a){
	var href = document.getElementById("aaa"+a).href;
	swal({
	  title: "Are you sure?",
	  text: "You will not be able to recover this imaginary file!",
	  type: "warning",
	  showCancelButton: true,
	  confirmButtonColor: "#DD6B55",
	  confirmButtonText: "Yes, delete it!",
	  cancelButtonText: "No, cancel plx!",
	  closeOnConfirm: false,
	  closeOnCancel: false
	},
		function(isConfirm){
		  if (isConfirm) {
		  	window.location = href;
		    return true;
		  } else {
			swal("Cancelled", "Your imaginary file is safe :)", "error");
		  }
	});
	return false;
}
function test(){
	swal("Good job!", "You clicked the button!", "error");
}
</script>
<a href="aaa" onclick="return swali(11)" id="aaa11">Test</a>
<br/>
<button onclick="test()">Hapus</button>

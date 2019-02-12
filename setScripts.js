function myFunction() {

var set_id = document.getElementById("set_ID").value;
var barcode = document.getElementById("barcode").value;
var radio_check = document.querySelector('input[name="radio"]:checked').value;

var dataString = 'set_id1=' + set_id + '&barcode1=' + barcode + '&enviro=' + radio_check;
if (set_id == '' || barcode == '') {
  $('.alert.info').show();
//alert("Please Fill All Fields");
} else {

$.ajax({
            type: "POST",
            url:"remove_set_item.php",
			data: dataString,
            success: function(html){
               if (html.indexOf("error") !== -1) {
			       $('.alert.warning').show();
			   
			   }else{
			       $('.alert.success').show();
			   	}	
		}
		
		
});	
}


}
function closeAlerts(){
     
	$('.alert').hide();
}


function clearForm(){

document.getElementById("form").reset(); 
}

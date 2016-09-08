 $(document).ready(function(){  
 	$('#formLog').submit(function(){  
 		var msg   = $('#formLog').serialize();
        $.ajax({
	          type: 'POST',
	          url: 'target.php',
	          data: msg,
	          success: function(data) {
	            $('#result').html(data);
	          }
         });  
      	 return false;  
	});              
});  
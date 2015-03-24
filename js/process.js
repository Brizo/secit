$("#submit").click(function(){
               
         $("#ack").empty();   
         if  ($("#user_name").val() == "" && $("#user_pass").val() == ""){
               	$("#ack_un").html("Mandatory field");
		$("#ack_pwd").html("Mandatory field");

         }elseif ($("#user_name").val() == ""){
                              $("#ack_un").html("Mandatory field");

         }elseif ($("#user_pass").val() == "") {
                              $("#ack_pwd").html("Mandatory field");
         }
         }else
               $.post( $("#login_form").attr("action"),$("#login_form :input").serializeArray(),function(info){
                    
		    $("#ack").html(info);
                    clear();});

         $("#login_form").submit(function(){
               return false;
          });
         
        
               			
});

function clear(){
               $("#login_form :input").each(function(){
		     $(this).val("");
	});
        $("#ack_un").html("");
        $("#ack_pwd").html("");
}

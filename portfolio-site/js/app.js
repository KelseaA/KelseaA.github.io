// click listener
$(".contact-area").on("click", ".submit-button", function(event){
	if($('.required').val() == ""){
		event.preventDefault();
		alert("Please fill out the required fields!");
	}
});
/**
	Author: Gentian Nuka
	Description: Mailchimp custom functionality via API
*/

$(document).ready(function () {
	$("#subscribe-form").submit(function () {
		$.when(
		$.ajax({
            url: 'mailchimp.php', 
            type: 'POST', 
            data: $('#subscribe-form').serialize() + '&ajax=post',
            success: function(msg) {			                
	                $('#message').html("It works!"); 
            }
        })).then(function () {
			setTimeout(function() {
				$.ajax({
				url: 'mailchimp.php', 
	            type: 'POST', 
	            data: $('#subscribe-form').serialize()+'&ajax=put'
	        	});
			}, 1000);
        });
        return false;
	});
});
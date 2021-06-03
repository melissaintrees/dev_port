
$(function()
{
    // when form is submitted
	$('#reused_form').submit(function(e)
      {
        e.preventDefault();
        //clear inputs
  
        // $('#success_message').show();
        $form = $(this);
            // send via ajax
            $.ajax({
            type: "POST",
            url: 'handler.php',
            data: $form.serialize(),
            // success: after_form_submitted,
            dataType: 'json' ,
            success: (data) => {
                // alert("form was submitted successfully");
                console.log(data)
                resetForm();
                $('#success_message').show();
            }, 
            // handle errors
            error: (req, status, error) => {
                // alert('An error occurred...');
                console.log(req)
                console.log(status)
                resetForm();
                $('#error_message').show();
            }
            });   
            resetForm = () => {
                $('form :input').val('');
                $('form#reused_form').hide();
                $('#intial_message').hide();
                setTimeout(function() {
                    location.reload();
                }, 10000);
            }     
      });	
});

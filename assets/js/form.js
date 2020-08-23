$(function () {


    function after_form_submitted(data) {
        console.log("this is data: ", data);
        if (data.result == 'success') {
            $('form#contact_form').hide();
            $('#success_message').show();
            $('#error_message').hide();
        }
        else {
            $('#error_message').append('<ul></ul>');

            jQuery.each(data.errors, function (key, val) {
                $('#error_message ul').append('<li>' + key + ':' + val + '</li>');
            });
            $('#success_message').hide();
            $('#error_message').show();

            //reverse the response on the button
            $('button[type="button"]', $form).each(function () {
                $btn = $(this);
                label = $btn.prop('orig_label');
                if (label) {
                    $btn.prop('type', 'submit');
                    $btn.text(label);
                    $btn.prop('orig_label', '');
                }
            });

        }//else
    }
    $(document.body).append();
    $('#contact_form').submit(function (e) {
        
        e.preventDefault();
        $(".contact-initial").empty();
        $(".contact-initial").append('<h1 class="contact-title text center">Thank you for Your Message!</h1>');
        $(".contact-initial").append('<p class="contact-text text center">I will get back to you shortly!</p>');
        $('form#contact_form').hide();
     

        $.ajax({
            type: "POST",
            url: 'contact.php',
            data: $form.serialize(),
            success: after_form_submitted,
            dataType: 'json'
        });

    });
});
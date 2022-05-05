$(function () {
    $('#sign_in').validate({
        rules: {
            user_email: {
              required: true,
              email: true,
              remote: {
                    url: baseUrl+"affiliate/ajax/register-email-exists",
                    type: "post",
                    data: {
                        user_email: function(){ return $("#user_email").val(); }
                    }
                }
            },
            user_confirm_password : {
                equalTo : "#user_password"
            },
            user_phone: 'number',
            zip: {
              remote: {
                    url:baseUrl+"affiliate/ajax/register-pincode-check",
                    type: "post",
                    data: {
                        zip: function(){ return $("#zip").val(); }
                    }
                }
            },
            referral_code:{
                remote:{
                    url: baseUrl+"affiliate/ajax/check-referral",
                    type: "post",
                    data: {
                        referral_code: function(){ return $("#referral_code").val(); }
                    }
                }
            }
        },
        messages: {
           user_confirm_password : "Confirm Password and Password does not same.",
           user_email: {
                required: 'Email address is required',
                email: 'Please enter a valid email address',
                remote: 'Email already exist.'
            },
            zip:{
                remote: 'Maximum Affiliate has been reach in this pincode. You can not register!'
            },
            referral_code:{
                remote: 'Referral Code does not exist!'
            },
        },
        highlight: function (input) {
            $(input).parents('.form-line').addClass('error');
        },
        unhighlight: function (input) {
            $(input).parents('.form-line').removeClass('error');
        },
        errorPlacement: function (error, element) {
            $(element).parents('.input-group').append(error);
        },
        submitHandler: function(form) { 
            var $this = $(form);
            $this.find("button").button("loading");
            $.ajax({
                url: baseUrl+"affiliate/ajax/register-affiliate-person",
                type: "post",
                dataType: "json",
                data: $this.serialize(),
                success: function (response) {
                    //console.log(response);

                    $this.find("button").button("reset");            

                    if (response.status) {
                        $('.card .body').html('');
                        $('.card .body').html(response.html);                        
                    } else {                        
                        if (response.errors) {
                            $.each(response.errors, function (index, item) {
                                $("#" + index + "-error").text(item);
                                $("#" + index + "-error").show();
                            })
                        }
                        
                    }
                },
                error: function (response) {                    
                    swal('Error', 'An error occurred while Registration.','error');            
                    $this.find("button").button("reset");
                }
            });
        }
    });

});
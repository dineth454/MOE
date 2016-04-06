/**
 * Created by chamathsilva on 11/26/15.
 */
$(document).ready(function() {

    $("#regitser_now").click(function(){
        $("#login_area").slideUp();
        $("#registration_area").hide().removeClass("hidden").slideDown();

    });

    $("#back_login").click(function(){
        $("#login_area").slideDown();
        $("#registration_area").slideUp();

    });



    $("#login_button").click(function() {

        $("#login-form").validate({
            rules:{
                username:{
                    required: true

                },
                password: {
                    required: true
                }


            },



            //if form is valid do this
            submitHandler: function(form) {



                //get input field values data to be sent to server
                var m_data = new FormData();
                m_data.append( 'user_name',  document.getElementById("username").value);
                m_data.append( 'user_password', document.getElementById("password").value);

               // var user_name = document.getElementById("username").value;
               // var password = document.getElementById("password").value;


                //Ajax post data to server
                $.ajax({
                    url: '../controllers/login.php',
                    data: m_data,
                    processData: false,
                    contentType: false,
                    type: 'POST',
                    dataType:'json',
                    success: function(response){
                        //load json data from server and output message
                        if (response.type == "text"){
                            $("#results").html(response.text);
                            $("#login_area").slideUp();
                            window.location.replace("userHome.php");
                        }else{
                            $("#results").html(response.text);


                        }


                    }
                });


            }
        });


    });



    $("#submit_button").click(function() {

        $("#register-form").validate({
            rules:{
                email:{
                    required: true,
                    email: true
                },
                password1: {
                    required: true,
                    strongPassword: true

                } ,
                password2: {
                    required: true,
                    equalTo: "#password1"
                },
                firstname:{
                    required: true,
                    nowhitespace: true,
                    lettersonly: true
                },

                lastname:{
                    required: true,
                    nowhitespace: true,
                    lettersonly: true
                },

                username:{
                    required: true,
                    nowhitespace: true

                },
                nic:{
                    required:true,
                    nowhitespace:true
                },
                contact:{
                    required:true,
                    nowhitespace:true,
                    integer: true
                }

            },
            messages: {
                email: {
                    required: 'Please enter an email address.',
                    email:'Please enter a <em>valid</em> email address.'
                },
                password2: {
                    equalTo: "Please enter the same password again."
                },
                terms:{
                    required:"You must agree to the terms and conditions"
                }


            },



            //if form is valid do this
            submitHandler: function(form) {
                $("#results").html("hello");



                //get input field values data to be sent to server
                var m_data = new FormData();
                m_data.append( 'username',  document.getElementById("usernamee").value);
                m_data.append( 'firstname', document.getElementById("firstname").value);
                m_data.append( 'lastname',  document.getElementById("lastname").value);
                m_data.append( 'password', document.getElementById("password1").value);
                m_data.append( 'email',  document.getElementById("email").value);
                m_data.append( 'nic', document.getElementById("nic").value);
                m_data.append( 'contact', document.getElementById("contact").value);


                // var user_name = document.getElementById("username").value;
                // var password = document.getElementById("password").value;


                //Ajax post data to server
                $.ajax({
                    url: '../controllers/registration_pro.php',
                    data: m_data,
                    processData: false,
                    contentType: false,
                    type: 'POST',
                    dataType:'json',
                    success: function(response){
                        //load json data from server and output message
                        if (response.type == "text"){
                            $("#results").html(response.text);
                            $("#registration_area").slideUp();
                            document.getElementById("login-form").reset();
                            $("#login_area").slideDown("slow");
                        }else{
                            $("#results").html(response.text);


                        }


                    }
                });


            }
        });


    });







});



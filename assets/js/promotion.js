/**
 * Created by chamathsilva on 11/27/15.
 */
$(document).ready(function() {


    $("#publish_offer").click(function() {

        $("#promotion_form").validate({
            rules:{
                offername:{
                    required: true

                },
                valid: {
                    required: true
                },
                Info: {
                    required: true
                }


            },

            //if form is valid do this
            submitHandler: function(form) {



                //get input field values data to be sent to server
                var m_data = new FormData();
                m_data.append( 'offername',  document.getElementById("offername").value);
                m_data.append( 'valid', document.getElementById("valid").value);
                m_data.append( 'Info', document.getElementById("Info").value);

                // var user_name = document.getElementById("username").value;
                // var password = document.getElementById("password").value;


                //Ajax post data to server
                $.ajax({
                    url: '../controllers/promomotion_pro.php',
                    data: m_data,
                    processData: false,
                    contentType: false,
                    type: 'POST',
                    dataType:'json',
                    success: function(response){
                        //load json data from server and output message
                        if (response.type == "text"){
                            $("#results").html(response.text);
                            document.getElementById("promotion_form").reset();
                            $("#promotion_form").slideUp("slow");

                            //$("#login_area").slideUp();
                        }else{
                            $("#results").html(response.text);


                        }


                    }
                });


            }
        });


    });

});
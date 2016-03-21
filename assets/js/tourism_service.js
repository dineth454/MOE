/**
 * Created by chamathsilva on 11/21/15.
 */
$(document).ready(function() {
    $("#submit_btn").click(function() {

        var proceed = true;
        //simple validation at client's end
        //loop through each field and we simply change border color to red for invalid fields
        $("#contact_form input[required=true], #contact_form textarea[required=true]").each(function(){
            $(this).css('border-color','');
            if(!$.trim($(this).val())){ //if this field is empty
                $(this).css('border-color','red'); //change border color to red
                proceed = false; //set do not proceed flag
            }
            //check invalid email
            var email_reg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
            if($(this).attr("type")=="email" && !email_reg.test($.trim($(this).val()))){
                $(this).css('border-color','red'); //change border color to red
                proceed = false; //set do not proceed flag
            }
        });

        if(proceed) //everything looks good! proceed...
        {
            //get input field values data to be sent to server
            var m_data = new FormData();
            m_data.append( 'user_name', $('input[name=name]').val());
            m_data.append( 'user_email', $('input[name=email]').val());
            m_data.append( 'country_code', $('input[name=phone1]').val());
            m_data.append( 'phone_number', $('input[name=phone2]').val());
            m_data.append( 'subject', $('select[name=subject]').val());
            m_data.append( 'msg', $('textarea[name=message]').val());

            //Ajax post data to server
            $.ajax({
                url: 'contact_me.php',
                data: m_data,
                processData: false,
                contentType: false,
                type: 'POST',
                dataType:'json',
                success: function(response){
                    //load json data from server and output message
                    if(response.type == 'error'){ //load json data from server and output message
                        output = '<div class="error">'+response.text+'</div>';
                    }else{
                        output = '<div class="success">'+response.text+'</div>';
                    }
                    $("#contact_form #contact_results").hide().html(output).slideDown();
                }
            });




        }
    });

    //reset previously set border colors and hide all message on .keyup()
    $("#contact_form  input[required=true], #contact_form textarea[required=true]").keyup(function() {
        $(this).css('border-color','');
        $("#result").slideUp();
    });



    //////////////////////
    $(".dropdown-menu li a").click(function(){
        var selText = $(this).text();
        $(this).parents('.btn-group').find('.dropdown-toggle').html(selText+' <span class="caret"></span>');
    });
    $("#btnSearch").click(function(){
        alert($('.btn-select').text());
    });

});
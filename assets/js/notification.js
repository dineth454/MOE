//Notification JS
$(document).ready(function () {
    $("#notificationLink").click(function () {
        $("#notificationContainer").fadeToggle(300);
        $("#notification_count").fadeOut("slow");
        return false;
    });

    //Document Click
    $(document).click(function () {
        $("#notificationContainer").hide();
    });
    //Popup Click
    $("#notificationContainer").click(function () {
        return false
    });
});

//Notification link click function
$(".notification").click(function () {
    //alert(this.id);
    window.location.assign("viewNotification.php?id=" + this.id);
});

$(".notificationAll").click(function () {
    //alert(this.id);
    window.location.assign("messageview.php?id=" + this.id);
});
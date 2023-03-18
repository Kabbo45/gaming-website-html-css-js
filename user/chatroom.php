<?php
require('top.inc.php');
isActive();
$email = $_SESSION['email'];
$query = "SELECT name FROM user WHERE email = '$email'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
$name = $row["name"];
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        $.ajax({
            url: "get_messages.php",
            method: "GET",
            dataType: "json",
            success: function(data) {
                for (var i = 0; i < data.length; i++) {
                    $("#chat").append("<div><b>" + data[i].name + ": </b>" + data[i].message + "</div>");
                }
            }
        });


        $("#send").click(function() {
            var email = <?php echo json_encode($email); ?>;
            var name = <?php echo json_encode($name); ?>;
            var message = $("#message").val();
            $.ajax({
                url: "send_message.php",
                method: "POST",
                data: {
                    email: email,
                    name: name,
                    message: message
                },
                success: function() {
                    $("#message").val("");
                }
            });
        });

        setInterval(function() {
            $.ajax({
                url: "get_messages.php",
                method: "GET",
                dataType: "json",
                success: function(data) {
                    $("#chat").empty();
                    for (var i = 0; i < data.length; i++) {
                        $("#chat").append("<div><b>" + data[i].name + ": </b>" + data[i].message + "</div>");
                    }
                }
            });
        }, 1000);
    });
</script>

<div class="content pb-0">
    <div class="orders">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div id="rr" class="card-body">
                        <h4 class="-title" style="color: white; font-size: 20px;text-align: center;">Chatroom</h4>
                    </div>
                    <div class="card-body--">
                        <div class="cc" id="chat"></div>
                        <div class="bb">
                            <br>
                            <input placeholder="Enter your message here" type="text" style=" text-align: center; width:300px;" id="message" name="message">
                            <button class="btn btn-success" id="send"> Send <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                                </svg></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<style>
    .bb {
        background-color: #001440;
        height: 70px;
        text-align: center;
    }

    #rr {
        background-color: #001440;
        height: 70px;
        margin-bottom: 20px;

    }

    .cc {
        margin-left: 50px;
    }

    #chat {
        height: 300px;
        overflow: scroll;
    }
</style>
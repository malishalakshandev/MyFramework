<?php 

include './common/sessionhandling.php';

?>

<html>
    <head>
        <title>Admin - Home</title>
        <link rel="stylesheet" type="text/css" href="../assets/dist/css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="../assets/dist/js/bootstrap.bundle.min.js"/>
        
    </head>
    <body>
                    
        <div class='container-fluid'>
            <!-- header nav bar -->
            <div class='row'>
                <?php include './common/top_navbar.php'; ?>
            </div>
            <!-- end - header nav bar -->

            <!-- body -->
            <div class='row'>
                <h3>Admin - Home</h3>
            </div>
            <!-- end - body -->
        </div>

        <script type="text/javascript" src="../assets/dist/js/jquery.min.js"></script>
    
    </body>
</html>

<script>
    $(document).ready( function(){

        $('#login-form').submit( function(e){
            e.preventDefault();

            var data = {
                username: $('#username').val(),
                password: $('#password').val(),
            }
            
            $.ajax({
                url: 'controllers.php?action=admin_login',
                method:'POST',
                data:data,
                success:function(res){
                    if(res==1) {
                        location.href = 'home.php';
                    }else if(res==2){
                        alert("Invalid Username or Password!");
                        $('#username').val('');
                        $('#password').val('');
                        $('#username').focus();
                    }
                },
                error:function (err){
                console.log(err);
                }
            });
        });

    });
</script>
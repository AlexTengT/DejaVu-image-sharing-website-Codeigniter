

<?php
//session_start();
//if (!isset($_SESSION['user_id'])) {
//    echo "please log in first";
//    header('Location: needlogin.php');
//}
//
//?>

<div class="container">
    <div class="py-5 text-center">
        <h1>Deja Vu Profile</h1>
        <h2>Your prosonal info</h2>
        <p class="lead">Here you can change your personal information</p>
    </div>

    <div class="">

        <div class="mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Profile</span>

            </h4>

            <ul class="list-group mb-3">

                <?php echo '
            <li class="list-group-item d-flex justify-content-between lh-condensed">
                <div>
                    <small class="my-0 text-muted">User ID</small>
                    <h6 class="my-0">' . $_SESSION['user_id'] . '</h6>
                </div>
            </li>

            <li class="list-group-item d-flex justify-content-between lh-condensed">
                <div>
                    <small class="my-0 text-muted">eamil address</small>
                    <h6 class="my-0"> ' . $_SESSION['email'] . '</h6>
                     
                </div>
                <div>
                <input type="email" id="edit_email" placeholder="Change email address">
                <button type="button" id = "emailChangeConfirmButton" class="btn btn-secondary my-1 py-1">Edit</button>
                <p id = "edit_email_state"></p>
                </div>
            </li>

            <li class="list-group-item d-flex justify-content-between lh-condensed">
                <div>
                    <small class="my-0 text-muted">Name</small>
                    <h6 class="my-0">' . $_SESSION['first_name'] . ' ' . $_SESSION['last_name'] . '</h6>
                </div>
                
                <div>
                <input id="edit_first_name" placeholder="Change first name">
                <input id="edit_last_name" placeholder="Change last name">
                <button type="button" id = "nameChangeConfirmButton" class="btn btn-secondary my-1 py-1">Edit</button>
                <p id ="edit_name_state"></p>
               
                </div>
            </li>

            <li class="list-group-item d-flex justify-content-between lh-condensed">
                <div>
                    <small class="my-0 text-muted">Data of Birth</small>
                    <h6 class="my-0">' . $_SESSION['date_of_birth'] . '</h6>
                </div>
               
            </li>
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                <div>
                    <small class="my-0 text-muted">Signup Date</small>
                    <h6 class="my-0">' . date('Y/d/m H:i:s', $_SESSION['created_timestamp']) . '</h6>
                </div>
            </li>
            
                        </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
                <div>
                    <small class="my-0 text-muted">Email verification</small>
                    <h6 class="my-0">'. ($_SESSION['is_activated']==1 ? "Verified": "Not Verified, Please log in your email to verify.") .'</h6>
                </div>
                
                
                
                
            </li>
            
             <li class="list-group-item d-flex justify-content-between lh-condensed">
                <div>
    
            
                    <a href="change_password" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Change Password</a>
                </div>
                
                
                
                
            </li>
            

';
                ?>


        </div>

    </div>
</div>




    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>

    <script src="public/js/profile.js"></script>


</body>
</html>

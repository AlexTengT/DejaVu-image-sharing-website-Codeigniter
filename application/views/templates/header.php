

<header>
    <!-- the navigation bar -->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top nav-relatives">

        <a class="navbar-brand" href="#"><i>Deja Vu</i></a>
        <a class="nav-link text-light" href="homepage">HOME <span class="sr-only">(current)</span></a>

        <button aria-controls="navbar1" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler"
                data-target="#navbar1" data-toggle="collapse" type="button">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse " id="navbar1">
            <ul class="navbar-nav  ml-auto">

                <div class="form-inline my-2 my-md-0">
                    <input class="form-control" type="text" placeholder="Search" onkeydown="request_to_search_by_enter(this)" id="header_search_input" >


                    <div class="input-group-append">
                    </div>
                </div>

                <?php if (!isset($_SESSION["user_id"])): ?>
                    <li class="nav-item active">
                        <a class="nav-link" href="login">Log in <span class="sr-only">(current)</span></a>
                    </li>
                <?php endif ?>

                <?php if (isset($_SESSION["user_id"])) {
                    echo
                        '<li class="nav-item active" >
                        <a class="nav-link" href = "profile" >'. $_SESSION["first_name"] .'<span class="sr-only" > (current)</span ></a ></li >
                    ';};
                ?>




                <?php if (!isset($_SESSION["user_id"])): ?>
                    <li class="nav-item">
                        <a class=" btn btn-primary" href="signup" style="color:'white">Sign Up</a>
                    </li>
                <?php endif ?>

                <?php if (isset($_SESSION["user_id"])): ?>

                <li class="nav-item dropdown ">
                    <a class="nav-link dropdown-toggle =" href="#" id="dropdownuser" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false"><i class="far fa-user"></i> </a>

                    <div class="dropdown-menu dropdown-menu-right nav-relatives  " aria-labelledby="dropdownuser">




                        <!--

                        <div>
                            <a class="dropdown-item person-dropdown nav-relatives" href="login"><i
                                        class="fas fa-upload"></i> Upload</a>

                        </div>
                        -->

                        <div>

                            <a class="dropdown-item  person-dropdown nav-relatives" href="profile"><i class="fas fa-cog"></i>
                                profile</a>
                        </div>


                            <div>
                                <a class="dropdown-item  person-dropdown nav-relatives" href="api/logout"><i class="fas fa-cog"></i>
                                    Log out</a>
                            </div>




                    </div>
                </li>
                <?php endif ?>

            </ul>
        </div>
    </nav>
</header>



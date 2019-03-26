


<div class="container-fluid px-0">
    <div id="carouselControls" class="carousel slide" data-ride="carousel" data-pause="false">


        <div class="carousel-caption" id="mainpart-parent">

            <div class="loader mx-auto mt-5 pt-5" id="loader" style="display:none"></div>

            <div id="mainpart">
                <form class="form-signup" id="signupForm" style="display:block">

                    <div class="text-center mb-2">


                        <h1 class="h3 mb-3 font-weight-normal"><i class="fas fa-user"></i></h1>
                        <h1 class="h3 mb-3 font-weight-normal">Sign up</h1>
                        <p>Sign in Deja Vu to see more</p>
                    </div>


                    <div class="form-group row  mb-2">

                        <p></p>
                        <label for="inputEmail" class="mb-0"><i class="fas fa-envelope"></i> Email address</label>
                        <input type="email" id="inputEmail" class="form-control" placeholder="dejavu@dejavu.com"
                               required=""
                               autofocus="">

                    </div>

                    <div class="form-group row mb-2">
                        <label for="inputPassword" class="mb-0"><i class="fas fa-key"></i> Password</label>
                        <input type="password" id="inputPassword" class="form-control" placeholder="Password"
                               required=""
                               data-toggle="popover" title="Password Strength" data-placement="right" data-html="true">


                    </div>


                    <label for="inputFirstName" class="mb-0 row">Name</label>
                    <div class="form-row mb-2">
                        <div class="row">
                            <input type="text" class="form-control  mr-3" id="inputFirstName"
                                   placeholder="Your First Name">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control ml-3" id="inputLastName"
                                   placeholder="Your Last name">
                        </div>
                    </div>

                    <div class="form-group row mb-2">
                        <label for="inputBirthday" class="mb-0">Birthday</label>
                        <input type="date" id="inputDateOfBirth" min="1900-12-31" class="form-control"
                               placeholder="Password"
                               required="">


                    </div>


                    <div class="checkbox mb-1">
                        <label>
                            <input type="checkbox" value="understand"> Understand the policy
                        </label>
                    </div>
                    <div id="resultToUser">
                    </div>

                    <button class="btn btn-lg btn-primary btn-block" id="signup-submit" type="submit" disabled><i
                            class="fas fa-check"></i> Sign Up
                    </button>

                </form>

            </div>
        </div>


        <div class="carousel-inner bg-info" role="listbox">

            <div class="carousel-item active">
                <div class="d-flex align-items-center justify-content-center min-vh-100" id="bg">


                </div>
            </div>

            <div class="carousel-item">
                <div class="d-flex align-items-center justify-content-center min-vh-100" id="bg2">

                </div>
            </div>

            <div class="carousel-item">
                <div class="d-flex align-items-center justify-content-center min-vh-100" id="bg3">

                </div>
            </div>

        </div>

    </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>

<script src="public/js/signup.js"></script>


<div class="container mt-5 pt-5">
    <div class="text-center">
        <div>
            <h2>Change/Forget Password</h2>
            <p class="lead">Enter your email address</p>
            <input id="email" type="text" class="form-control" placeholder="" aria-label=""
                   aria-describedby="basic-addon1">
            <p class="lead">Enter your first name and last name</p>
            <div>
                <input class="form-control" id="first_name" placeholder="Enter your firstname">
                <input class="form-control" id="last_name" placeholder="Enter your last name">
            </div>

            <br>
            <br>
            <p class="lead">New Password</p>
            <input class="form-control" type="password" id="new_password" placeholder="New Password">


        </div>
        <br>
        <br>
        <button type="button" id="submit" class="btn btn-secondary my-1 py-1">Edit</button>
        <p id="result_state"></p>

    </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>

<script src="public/js/change_password.js"></script>


</body>
</html>

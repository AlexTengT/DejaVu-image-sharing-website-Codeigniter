let emailChangeConfirmButton = document.getElementById("emailChangeConfirmButton");
let nameChangeConfirmButton = document.getElementById("nameChangeConfirmButton");

let emailChangeInput = document.getElementById("edit_email");
let firstNameChangeInput = document.getElementById("edit_first_name");
let lastNameChangeInput = document.getElementById("edit_last_name");

let editNameStateP = document.getElementById("edit_name_state");
let editEmailStateP = document.getElementById("edit_email_state");


emailChangeConfirmButton.addEventListener("click", editEmail);
nameChangeConfirmButton.addEventListener("click", editName);


function editEmail(e) {
    e.preventDefault(); // prevent from reloading
    let data = {"type": "email", "email": emailChangeInput.value};
    post_data(data, "/api/profile_update", "editEmail");

}

function editName(e) {
    e.preventDefault(); // prevent from reloading
    console.log("Edit Name Button Clicked");
    let result;

    let data = {"type": "name", "first_name": firstNameChangeInput.value, "last_name": lastNameChangeInput.value};
    post_data(data, "/api/profile_update", "editName");



}


function post_data(given_data, given_url, given_fun) {

    // Verify account
    let base_url = window.location.origin;

    let xmlhttp = new XMLHttpRequest();
    let url = base_url + given_url;
    //let url = base_url+"/api/login_verify";
    //var data = "email=" + emailaddress.value +"&password=" + Password.value;

    let data = JSON.stringify(given_data);
    //let data = JSON.stringify({"email": emailAddress.value, "password": password.value});

    let response_result = '';
    let result;


    xmlhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {


            response_result = this.responseText;
            console.log(response_result);

            result = JSON.parse(response_result);


            if (given_fun === "editName"){
                editNameStateP.innerHTML = "Success, Redirecting in 5 secs...";
                setTimeout("leave()", 5000);



            } else if (given_fun === "editEmail"){
                editEmailStateP.innerHTML = "Success, redirecting in 5 secs...";
                setTimeout("leave()", 5000);


            }


            return result;


            // document.getElementById("demo").innerHTML =
            //     this.responseText;
        }
    };


    xmlhttp.open("POST", url, true);
    xmlhttp.setRequestHeader("Content-Type", "application/json");
    xmlhttp.send(data);

}


function leave() {
    let base_url = window.location.origin;
    window.location = base_url + "/api/logout";
}
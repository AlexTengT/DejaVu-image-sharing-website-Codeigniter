
let email = document.getElementById("email");
let firstName = document.getElementById("first_name");
let lastName = document.getElementById("last_name");
let newPassword = document.getElementById("new_password");
let submit = document.getElementById("submit");
let result_state = document.getElementById("result_state")


submit.addEventListener("click", change_password);



function change_password(e) {
    e.preventDefault(); // prevent from reloading
    let data = {"type": "pwd", "email": email.value, "first_name":firstName.value,
                "last_name": lastName.value, "new_password": newPassword.value};
    post_data(data, "/api/profile_update", "change_password");


   // console.log(data);

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


            console.log(result['result']);
            if (result['result'] === '0'){
                result_state.innerHTML= "Email doesn't exist or person information is wrong";
            } else if (result['result'] === '1'){
                result_state.innerHTML= "Success, redirecting in 3 second";
                setTimeout("leave()", 3000);
            }





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
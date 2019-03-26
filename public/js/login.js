let loginForm = document.getElementById("loginForm");
let resultToUser = document.getElementById("resultToUser");
let emailAddress = document.getElementById("inputEmail");
let password = document.getElementById("inputPassword");
let remember = document.getElementById("remember-me");


loginForm.addEventListener("submit", loginVerify);


if (readCookie('email') !== null){
    console.log("read cookie")
    console.log(readCookie('email'));
    console.log(emailAddress.innerHTML);
    emailAddress.value = readCookie('email');

}


console.log("hello");

function loginVerify(e) {
    e.preventDefault(); // prevent from reloading

    // set cookie to save

    //console.log(remember.checked);


    if (remember.checked) {
        createCookie('email', emailAddress.value, 7);
    } else{
        eraseCookie('email');
    }


    // Verify account
    let base_url = window.location.origin;

    let xmlhttp = new XMLHttpRequest();
    let url = base_url+"/api/login_verify";
    //var data = "email=" + emailaddress.value +"&password=" + Password.value;
    let data = JSON.stringify({"email": emailAddress.value, "password": password.value});
    let response_result = '';
    let result;


    xmlhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {


            response_result = this.responseText;
            console.log(response_result);

            result = JSON.parse(response_result);


            if (result['login_result'] === 'emailfail') {
                resultToUser.innerHTML = "Cannot found the email address";
            } else if (result['login_result'] === 'pwdfail') {

                resultToUser.innerHTML = "Password doesn't match";
            } else if (result['login_result'] === 'match') {

                resultToUser.innerHTML = "Success, will redirect to homepage.";

                //todo: start a session
                window.location.replace("homepage");

                //TODO: resultToUser.innerHTML = ""
            } else {
                resultToUser.innerHTML = "An un-excepted error happened";

            }


            // document.getElementById("demo").innerHTML =
            //     this.responseText;
        }
    };


    xmlhttp.open("POST", url, true);
    xmlhttp.setRequestHeader("Content-Type", "application/json");
    xmlhttp.send(data);

}


function createCookie(name, value, days) {
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        var expires = "; expires=" + date.toUTCString();
    } else var expires = "";
    document.cookie = name + "=" + value + expires + "; path=/";
}

function readCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) === ' ') c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) === 0) return c.substring(nameEQ.length, c.length);
    }
    return null;
}

function eraseCookie(name) {
    createCookie(name, "", -1);
}


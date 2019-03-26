// popover to show the password strength


/**
 *  show a popover to show the current password strength
 */



$(document).ready(function(){


    let submitButton = $('#signup-submit');
    let instruction = "<br>Password must contain at <br> least one upper case letter,<br> one lower case letter and one <br>number OR one special char.";
    $('#inputPassword').on('keyup', function () {
        let inputPassword = $(this);
        let pass = inputPassword.val();
        let strength = 'Weak';

        let strength_level = checkStrengthPassword(pass);

        switch (strength_level){
            case 0:
                submitButton.attr("disabled", true);
                strength = "Very Weak";
                break;
            case 1:
                submitButton.attr("disabled", true);
                strength = "Weak";
                break;

            case 2:
                submitButton.attr("disabled", false);
                strength = "Almost Strong";
                break;
            case 3:
                submitButton.attr("disabled", false);
                strength = "Strong";
                break;
            case 4:
                submitButton.attr("disabled", false);
                strength = "Very Strong";
                break;


        }



        let popover = inputPassword.attr('data-content', "<b>" + strength + "</b>" + instruction).data('bs.popover');
        popover.setContent();


    });

    $('input[data-toggle="popover"]').popover({
        placement: 'right',
        trigger: 'focus',
    });

});


/**
 *  Check the strength of the password
 * @param password
 * @returns {number} strength from very week to very strong form 0 to 4
 */
function checkStrengthPassword(password){
    //minimum 8 characters
    let bad = /(?=.{8,}).*/;
//Alpha Numeric plus minimum 8
    let good = /^(?=\S*?[a-z])(?=\S*?[0-9])\S{8,}$/;
//Must contain at least one upper case letter, one lower case letter and (one number OR one special char).
    let better = /^(?=\S*?[A-Z])(?=\S*?[a-z])((?=\S*?[0-9])|(?=\S*?[^\w\*]))\S{8,}$/;
//Must contain at least one upper case letter, one lower case letter and (one number AND one special char).
    let best = /^(?=\S*?[A-Z])(?=\S*?[a-z])(?=\S*?[0-9])(?=\S*?[^\w\*])\S{8,}$/;

    let strength;

    if (best.test(password) === true) {
        strength = 4;

    } else if (better.test(password) === true) {
        strength = 3;
    } else if (good.test(password) === true) {
        strength = 2;
    } else if (bad.test(password) === true) {
        strength = 1;

    } else {
        strength = 0;
    }

    return strength;
}


// loader






// below is the js for the form sumbit
let signupForm = document.getElementById("signupForm");
let emailAddress = document.getElementById('inputEmail');
let password = document.getElementById('inputPassword');
let firstName = document.getElementById('inputFirstName');
let lastName = document.getElementById('inputLastName');
let dateOfBirth = document.getElementById('inputDateOfBirth');
let resultToUser = document.getElementById('resultToUser');

let loader = document.getElementById('loader');




signupForm.addEventListener("submit", signUpVerify);



/**
 * Verify the signup state from services
 * @param e Event
 */
function signUpVerify(e) {

    //console.log(dateOfBirth.value);

    e.preventDefault();


    let base_url = window.location.origin;
    let xmlhttp = new XMLHttpRequest();
    let url = base_url+"/api/signup";

    let data = JSON.stringify({
        "email": emailAddress.value,
        "password": password.value,
        "first_name": firstName.value,
        "last_name": lastName.value,
        'date_of_birth': dateOfBirth.value
    });

    let response_result = '';
    let result;
    //console.log(data);


    xmlhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            response_result = this.responseText;
			console.log(response_result);
            result = JSON.parse(response_result)['signup_result'];


            if (result === "success") {
                //TODO: jump to another window
                console.log('success yes');
                resultToUser.innerHTML = 'Sign-up success, sending verification email to you... ';
                let postArray = {'last_name':lastName.value, 'email': emailAddress.value}

                post(base_url+"/email_verify", postArray)
                //console.log('there yes');


                // hidden the signup from and load the loader
                signupForm.style.display="none";
                loader.style.display="block";




            } else if (result === "email_existed") {
                resultToUser.innerHTML = 'Email existed';
                console.log('emailexisted yes')
                //TODO: DELETE the input window
            } else {
                //an unexceptied error
                resultToUser.innerHTML = 'un-excepted error, connect us for help';
                console.log('an unexceptied error')
            }

            //result = JSON.parse(response_result);
        }
    };


    xmlhttp.open("post", url, true);
    xmlhttp.setRequestHeader("Content-Type", "application/json");
    xmlhttp.send(data);

}


/**
 * sends request to the specified url from a form, window will redirect
 * use: post('/contact/', {name: 'Johnny Bravo'});
 * @param path String path to the request
 * @param params Object params the paramiters to add to the url
 * @param method default=post the method to use on the form
 */
function post(path, params, method) {
    method = method || "post"; // Set method to post by default if not specified.

    // The rest of this code assumes you are not using a library.
    // It can be made less wordy if you use one.
    var form = document.createElement("form");
    form.setAttribute("method", method);
    form.setAttribute("action", path);

    for(var key in params) {
        if(params.hasOwnProperty(key)) {
            var hiddenField = document.createElement("input");
            hiddenField.setAttribute("type", "hidden");
            hiddenField.setAttribute("name", key);
            hiddenField.setAttribute("value", params[key]);

            form.appendChild(hiddenField);
        }
    }

    document.body.appendChild(form);
    form.submit();
}
let comment_form = document.getElementById('comment_form');
let comment_msg = document.getElementById('comment_msg');
let image = document.getElementById('image');
var comments = document.getElementById('comments');


comment_form.addEventListener("submit", write_comment);


function write_comment(e) {
    e.preventDefault();

    console.log(image.getAttribute("image_id"));
    // console.log(user_id);


    let base_url = window.location.origin;
    let xmlhttp = new XMLHttpRequest();
    let url = base_url + "/api/write_comment";
    let data = JSON.stringify({"comment": comment_msg.value, "image_id": image.getAttribute("image_id")});
    let response_result = '';
    let result;


    xmlhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {


            response_result = this.responseText;
            //console.log(response_result);

            result = JSON.parse(response_result);

            console.log(result['state']);

            if (result['state'] === '1'){
                comments.innerHTML += 'Me';
                comments.innerHTML += ':      ';
                comments.innerHTML += comment_msg.value;
                comments.innerHTML += '<hr class="my-3">';

            } else {
                return '';
            }



            // document.getElementById("demo").innerHTML =
            //     this.responseText;
        }
    };


    xmlhttp.open("POST", url, true);
    xmlhttp.setRequestHeader("Content-Type", "application/json");
    xmlhttp.send(data);

}
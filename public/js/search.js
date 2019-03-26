

function request_to_search_by_enter(ele){

    if(event.keyCode === 13) {


        let base_url = window.location.origin;

        let keywords_raw = ele.value;

        var keywords_array = keywords_raw.split(" ");

        var command = '';

        keywords_array.forEach(function(value){
            //console.log(value);
            command = command.concat('keyword[]=' + value + '&');
        });

        let link = base_url+'/search?'+encodeURI(command);

        // alert(link);
        //console.log(link);
        window.location.replace(link);
        // return false;
    }
}


function request_to_search_by_button(ele){




        let base_url = window.location.origin;

        let keywords_raw = document.getElementById("homepage-search-input").value;

        var keywords_array = keywords_raw.split(" ");

        var command = '';

        keywords_array.forEach(function(value){
            //console.log(value);
            command = command.concat('keyword[]=' + value + '&');
        });

        let link = base_url+'/search?'+encodeURI(command);

        // alert(link);
        //console.log(link);
        window.location.replace(link);
        // return false;

}

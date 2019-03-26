<!DOCTYPE html>


<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">




    <!--<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">-->
    <meta name="description" content="This is a picture sharing website">

    <meta name="author" content="Shaoming Teng s4466014">


    <!-- Jquery, bootstrap, fontawesome and own css, js file-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
          integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="public/css/image_hover.css">
    <link rel="stylesheet" type="text/css" href="public/css/waterfall_cards.css">

    <script src="public/js/waterfall_cards.js"></script>
    <script src="public/js/search.js"></script>




    <?php if ($page_type === "homepage") {
    echo '<title>' . $title . '</title>';

        echo "



    <link rel=\"stylesheet\" type=\"text/css\" href=\"public/css/index.css\">
    <link rel=\"stylesheet\" type=\"text/css\" href=\"public/css/nav.css\">

        <style>
        .bg1 {
    background-image: url(" . base_url() . "public/img/p1.jpg' );
    background-position: 50%;
    background-size: cover;

    position: absolute;
    width: 100%;
    height: 100%;


}


.bg2 {
    background-image: url(" . base_url() . "public/img/p2.jpg' );
    background-position: 50%;

    position: absolute;
    width: 100%;
    height: 100%;



}

.bg3 {
    background-image: url(" . base_url() . "public/img/p3.jpg' );
    background-position: 50%;

    position: absolute;
    width: 100%;
    height: 100%;

}
        </style>
    ";
    } else if ($page_type === "login") {


        echo '
<title>' . $title . '</title>


        <link rel="stylesheet" type="text/css" href="public/css/login.css">
    <link rel="stylesheet" type="text/css" href="public/css/nav.css">

        ';
    } else if ($page_type === "signup") {
        echo '
        <link rel="stylesheet" type="text/css" href="public/css/signup.css">
    <link rel="stylesheet" type="text/css" href="public/css/nav.css">
    <link rel="stylesheet" type="text/css" href="public/css/central_layout.css">
    <title>' . $title . '</title>
    
    
 

    <!--<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">-->



    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    
    
    
    
    
    
    
    
        ';
    } else if ($page_type === "profile") {
        echo '<link rel="stylesheet" type="text/css" href="public/css/nav.css">';



        echo '<title>' . $title . '</title>';
    } else if ($page_type === "change_password"){
    echo '<title>' . $title . '</title>';
           echo '    <link rel="stylesheet" type="text/css" href="public/css/nav.css">

        <link rel="stylesheet" type="text/css" href="public/css/central_layout.css">';



    }
    else if ($page_type === "email_sent") {
        echo '    <link rel="stylesheet" type="text/css" href="public/css/nav.css">
    echo \'<title>\'.$title.\'</title>\';
    <link rel="stylesheet" type="text/css" href="public/css/central_layout.css">';
    } else if ($page_type === "search") {

        echo '<link rel="stylesheet" type="text/css" href="public/css/nav.css">';
        echo '<title>' . $title . '</title>';
    } else if ($page_type === "upload"){
        echo '<link rel="stylesheet" type="text/css" href="public/css/nav.css">
                <link rel="stylesheet" type="text/css" href="public/css/central_layout.css">\';
';
        echo '<title>' . $title . '</title>';


    } else if ($page_type === "pic_detail"){

        echo '<link rel="stylesheet" type="text/css" href="public/css/nav.css">';
    } else if ($page_type === "upload_pics"){
        echo '<link rel="stylesheet" type="text/css" href="public/css/nav.css">';
        echo '<script src="public/dropzone/dropzone.js"></script>';
        echo '<link rel="stylesheet" type="text/css" href="public/dropzone/dropzone.css">';
    }

    ?>


</head>

<body>

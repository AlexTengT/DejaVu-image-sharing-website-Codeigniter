<p hidden></p>

<div class="container center-div">

    <div class="jumbotron">
        <h1 class="display-4">picture</h1>

        <? echo '<img id="image" image_id="' . $pic_id . '" class="card-img-top img-fluid pre-pic" alt="Card image cap" src="public/img/p' . $pic_id . '.jpg"> ' ?>

        <p class="lead">description</p>


        <hr class="my-4">

        <div id="comments">
            <h1>Comments</h1>
            <? foreach ($comments as $comment) {



                if (isset($_SESSION['user_id']) && $comment['user_id'] === $_SESSION['user_id']) {
                    echo 'me';
                } else {
                    echo $comment['user_id'];
                }

                echo ":      ";
                echo $comment['content'];
                echo '<hr class="my-3">';
            } ?>
        </div>
        <form id="comment_form">

            <div class="form-group">
                <label for="message-text" class="col-form-label">Leave a message:</label>
                <textarea id="comment_msg" class="form-control" id="comment_msg"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">submit</button>
        </form>


    </div>
    <script src="public/js/pic_detail.js"></script>

</div>

</body>
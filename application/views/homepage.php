

<!-- Carousel 100% Fullscreen -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">


    <div class="carousel-caption ">

        <div class="container ">
            <h1 class="text-light">Deja Vu</h1>

            <p class="lead text-secondary text-info">Find what inspired you</p>

            <input class="form-control text-dark" type="text" placeholder="Search for what inspired you" onkeydown="request_to_search_by_enter(this)" id="homepage-search-input">
            <p>
                <a class="btn btn-primary my-2 mr-2" onclick="request_to_search_by_button(this)" ><i class="fas fa-search"></i> Search</a>
                <a href="#" class="btn btn-secondary my-2 ml-2"><i class="fas fa-fire-alt"></i> Trending</a>
            </p>
        </div>
    </div>

    <div class="carousel-inner bg-info" role="listbox">

        <div id="carousel" class="carousel slide" data-ride="carousel">
            <!-- Note the `embed-responsive embed-responsive-21by9` classes on the items wrapper -->
            <div class="carousel-inner embed-responsive embed-responsive-21by9">
                <!-- Carousel items have `.embed-responsive-item` -->
                <div class="carousel-item embed-responsive-item active bg1">
                </div>

                <div class="carousel-item embed-responsive-item bg2">
                </div>

                <div class="carousel-item embed-responsive-item bg3">
                </div>
            </div>
        </div>

    </div>
</div>



    <div class="jumbotron d-flex align-items-center pb-1 mb-1 pt-0 bg-white">
        <div class="container text-center text-dark ">
            <a href="#" class="badge ml-2 text-dark">Wild Lives</a>
            <a href="#" class="badge ml-2  text-dark">People</a>
            <a href="#" class="badge ml-2 text-dark">Architecture</a>
            <a href="#" class="badge ml-2 text-dark">City</a>

            <button class="btn dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                More
            </button>
            <div class="dropdown-menu " aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
            </div>
        </div>


    </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
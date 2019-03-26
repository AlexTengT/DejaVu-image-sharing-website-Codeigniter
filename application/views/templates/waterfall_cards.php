<div class="card-columns no-gutter-card-deck">


    <?php foreach ($img_pics as $p) {

        echo "





 
 
 
 
 
 
 

 
<div class=\"card mx-0 my-0 px-0 py-0 zoom\" >
                <a href='".base_url()."/pic_detail?pic_id=".$p['image_id']."' >
                <img class=\"card-img-top img-fluid pre-pic\" src='public/".$p['path']."' alt=\"Card image cap\" data-toggle=\"modal\" data-target=\"#see_picture\" >
                </a>
</div>  
               
<!-- Modal -->
<!-- Modal -->

  
              
               
             
             
             
             
             
             
               
               ";
    }
    ?>


</div>

<!-- index.php for shop -->
<?php include('header.php'); ?>


    <div class='container' style="padding-bottom:5em">
        <a href='product_view.php'>View All Products </a>
    </div>
    
    <div class='container photo_gallery'>
        <section class="pin col-sm-8 col-md-6 col-lg-3">
                <div class='panel panel-default'>
                     <div class='panel-heading'>
                       <!-- <img src='image/IMG_8015.JPG'>  -->
                       <img src="https://static.independent.co.uk/s3fs-public/thumbnails/image/2019/04/10/16/online-clothes-shops-hero.jpg?w968h681" width="100%"/>
                     </div>
                    <div class='panel-body'>
                        <h5>Fashion &#38; Jewelry  <button class='btn btn-warning moreBtn' data-toggle='modal' data-target='#Recipe'>See More &raquo; </button></h5>
                    </div>
                </div>    
        </section>

        <section class="pin col-sm-8 col-md-6 col-lg-3">
                <div class='panel panel-default'>
                     <div class='panel-heading'>
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQdMaeMyOzGZzL-4j3F35qPu8g5khm__ecIlJp7rexnwuAZ3z3Ogw" width="100%" height="280"/>
                     </div>
                    <div class='panel-body'>
                        <h5>Cosmetic Product <button class='btn btn-warning moreBtn' data-toggle='modal' data-target='#Recipe'>See More &raquo; </button></h5>
                    </div>
                </div>    
        </section>
        <section class="pin col-sm-8 col-md-6 col-lg-3">
                <div class='panel panel-default'>
                     <div class='panel-heading'>
                        <img src='https://secureservercdn.net/198.71.233.254/f52.52b.myftpupload.com/wp-content/uploads/2018/03/natural-healing-center-cleaning-products.jpg' width="100%" >
                     </div>
                    <div class='panel-body'>
                        <h5>Household Supply  <button class='btn btn-warning moreBtn' data-toggle='modal' data-target='#Recipe'>See More &raquo; </button></h5>
                    </div>
                </div>    
        </section>
        <section class="pin col-sm-8 col-md-6 col-lg-3">
                <div class='panel panel-default'>
                     <div class='panel-heading'>
                        <img src='https://images-na.ssl-images-amazon.com/images/I/91RT0nrMwdL._SX466_.jpg' height='275' width="100%">
                     </div>
                    <div class='panel-body'>
                        <h5>School Supply <button class='btn btn-warning moreBtn' data-toggle='modal' data-target='#Recipe'>See More &raquo; </button></h5>
                    </div>
                </div>    
        </section>
        </div>

<?php 
    echo '<center>';
    include('footer.php'); 
    echo '</center>';
?>

</body>
</html>
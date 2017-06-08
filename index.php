<?php
require 'includes/config.php';

$listings = getListings($dbh);


if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if ($_POST["_method"] == "delete") {
    $id=e($_POST['id']);
    deleteListing($id, $dbh);
    redirect('index.php');
  }

  if ($_POST["_method"] == "edit") {
    $id=e($_POST['editid']);
            // editProject($id, $dbh);
    redirect('edit.php?id=' . $id);
  }

  if ($_POST["_method"] == "view") {
    $id=$_POST['viewid'];
            // editProject($id, $dbh);
    redirect('view.php?id=' . $id);
  }
}
require 'partials/header.php';
require 'partials/navigation.php';

?>

    
    <!-- Page Content -->
    <div class="container">

      <div><?= showMessages(); ?></div>

        <!-- Jumbotron Header -->
        <header class="col-lg-12 pic">
            <img src="img/bannerhome.jpg" class="img-responsive bannerhome">
        </header>
       

        <!-- Page Features -->
        <div class="row text-center">

        <div class="row search">
          <div class="col-xs-4">
            <div class="form-group">
            <h5 class="location">Location:</h5>
              <select class="selectpicker form-control">
                <option>No Preference</option>
                <option>North Island</option>
                <option>South Island</option>
              </select>
            </div>
          </div>
          <div class="col-xs-4">
            <div class="form-group">
            <h5 class="gender">Gender:</h5>
              <select class="selectpicker form-control">
                <option>No Preference</option>
                <option>Male</option>
                <option>Female</option>
              </select>
            </div>
          </div>
          <div class="col-xs-4">
            <div class="form-group">
            <h5 class="age">Age:</h5>
              <select class="selectpicker form-control">
                <option>No Preference</option>
                <option>Puppy</option>
                <option>Adult</option>
                <option>Senior</option>
              </select>
            </div>
          </div>
          <a href="index.php" class="btn btn-default col-md-2 search">Search</a>
        </div>

            <!-- Start foreach loop here -->
            <?php foreach ($listings as $listing):?>

            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img class="img-responsive" src="<?= $listing['image'] ?>" alt="">
                    <div class="caption">
                        <h3><?= $listing['title'] ?></h3>
                        <p><?= substr ($listing['content'], 0, 50) ?>...</p>
                        <p>
                            <a href="view.php?id=<?= $listing['id'] ?>" class="btn btn-default">More Info</a>
                        </p>
                    </div>
                </div>
            </div>

            <!-- End for each loop here --><?php endforeach; ?>


        </div>
        
<?php
require 'partials/footer.php';
?>     

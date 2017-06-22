<?php
require 'includes/config.php';

// die(var_dump($_SESSION));

// $listings = getListings($dbh);
// 

$locationOptions = getLocationOptions($dbh);
// $genderOptions = getGenderOptions($dbh);
// $ageOptions = getAgeOptions($dbh);      

$data = getPaginatedListings($dbh);   

// dd($listings);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if ($_POST["_method"] == "delete") {
    $id=e($_POST['id']);
    deleteListing($id, $dbh);
    redirect('index.php');
  }

  if ($_POST["_method"] == "edit") {
    $id=e($_POST['editid']);

    redirect('edit.php?id=' . $id);
  }

}

$location = (isset($_GET['location']))?e($_GET['location']):'';
$gender = (isset($_GET['gender']))?e($_GET['gender']):'';
$age = (isset($_GET['age']))?e($_GET['age']):'';


if(!empty($location) || !empty($gender) || !empty($age) ){

    $data = getPaginatedSearchListings($dbh, 8, $location, $gender, $age);  
}else{

  $data = getPaginatedListings($dbh, 8);
}



$listings = $data['listings'];


require 'partials/header.php';
require 'partials/navigation.php';

?>


<!-- Page Content -->
<div class="container">

  <div><?= showMessages(); ?></div>

  <!-- Jumbotron Header -->
  <header class="col-lg-12 pic">
    <img src="img/bannerhome.jpg" alt="bannerhome" class="img-responsive center-block bannerhome">
  </header>


  <!-- Page Features -->
  <div class="row text-center">


    <form method="GET" action="index.php">
      <div class="col-xs-4">
        <div class="form-group">
          <h5 class="location">Location:</h5>
          <select name="location" class="selectpicker form-control">
            <option value="">No Preference</option>
            <?php foreach($locationOptions as $option):?>
              <option value="<?= $option['id'] ?>" <?=(!empty($_GET['location']) && $_GET['location'] == $option['id'])?'selected':'';?>><?= $option['name'] ?></option>
            <?php endforeach; ?>

          </select>
        </div>
      </div>

      <div class="col-xs-4">
        <div class="form-group">
          <h5 class="gender">Gender:</h5>
          <select name="gender" class="selectpicker form-control">
              <option value="" <?=(empty($_GET['age']))?'selected':'';?>>No Preference</option>
             <option value="2" <?=(!empty($_GET['gender']) && $_GET['gender'] == 2)?'selected':'';?>>Male</option>
             <option value="1" <?=(!empty($_GET['gender']) && $_GET['gender'] == 1)?'selected':'';?>>Female</option>
         
         </select>
       </div>
     </div>
     <div class="col-xs-4">
      <div class="form-group">
        <h5 class="age">Age:</h5>
        <select name="age" class="selectpicker form-control">

          <option value="" <?=(empty($_GET['age']))?'selected':'';?>>No Preference</option>
         <option value="2" <?=(!empty($_GET['age']) && $_GET['age'] == 2)?'selected':'';?>>Puppy</option>
         <option value="1" <?=(!empty($_GET['age']) && $_GET['age'] == 1)?'selected':'';?>>Adult</option>

        </select>
      </div>
    </div>
    
    <div class="col-md-12 text-center">
      <button type="submit" class="btn btn-default col-md-2 search">Search</button>
    </div>
  </form>
  <!-- </div> -->

</div>

<?php if (!empty($listings)): ?>

<?php foreach ($listings as $key => $listing):?>
  <?php if (($key + 1) % 4 === 0 || $key === 0): ?>

   <div class="row">
   <?php endif; ?>
   <!-- Start foreach loop here -->

   <div class="col-md-3 col-sm-6 hero-feature">

    <div class="thumbnail">

      <img alt="listings" class="img-responsive imgindex" src="<?= $listing['image'] ?>">

      <div class="caption">

        <h3><?= $listing['title'] ?></h3>
        <p><?= substr ($listing['content'], 0, 50) ?>...</p>
        <a href="view.php?id=<?= $listing['id'] ?>" class="btn btn-default">More Info</a>
        <div class="pull-right">

          <?php if(isAdmin() || userOwns($listing['user_id'])) : ?>

            <form method="POST" action="index.php" style="display: inline-block;">
              <input name="_method" type="hidden" value="edit">
              <input name="editid" type="hidden" value="<?= $listing['id'] ?>">
              <button type="submit" class="btn btn-inverse btn-xs">
               <i class="icon ion-edit">
               </i> Edit
             </button>
           </form>
           <!-- delete button -->
           <form method="POST" action="index.php" style="display: inline-block;">
             <input name="_method" type="hidden" value="delete">
             <input name="id" type="hidden" value="<?= $listing['id'] ?>">
             <button onclick="return confirm('Are you sure you want to delete this item?');" type="submit" class="btn btn-inverse-xs btn-xs">
               <i class="icon ion-ios-close-outline">
               </i> Delete
             </button>
           </form>
         <?php endif; ?>

       </div>

     </div>

     <?php if (($key + 1) % 4 === 0): ?>
     </div>

   <?php endif; ?>
     </div>
   </div>
<!-- End for each loop here -->
<?php endforeach; ?>




<div class="row">
  <div class="pagination col-md-12 text-center">


    <?= $data['paginationLinks'] ?>  
  </div>
</div>
<?php else: ?>

  <div class="row">
    <div class="pagination col-md-12 text-center">
    No Listings found.
    </div>
  </div>
  <?php endif; ?>

</div>

<?php
require 'partials/footer.php';
?>     

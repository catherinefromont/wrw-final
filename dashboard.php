<?php
require 'includes/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $title = $content = $image = $location = $age = $gender = $desexed = $vaccinated = $wormed = $flead = $registered = $microchipped = '';
    
    $title = e($_POST['title']);
    $content = e($_POST['content']);
    $image = e($_POST['image']);
    $location = e($_POST['location']);
    $age = e($_POST['age']);
    $gender = e($_POST['gender']);
    $desexed = e($_POST['desexed']);
    $vaccinated = e($_POST['vaccinated']);
    $wormed = e($_POST['wormed']);
    $flead = e($_POST['flead']);
    $registered = e($_POST['registered']);
    $microchipped = e($_POST['microchipped']);
    $errors['title'] = validateTitle($title);
    $errors['content'] = validateContent($content);
    

    if (!$errors['title'] && !$errors['content']) {
        $didInsertWork = addListing($dbh, $title, $content, $image,  $location, $age, $gender, $desexed, $vaccinated, $wormed, $flead, $registered, $microchipped);

        addMessage('success', "You have successfully added a listing");
        redirect("index.php");

    }

    





}

require 'partials/header.php';
require 'partials/navigation.php';



?>
<div id="app">



    <!-- Start of Dashboard form -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-inverse">
                    <div class="panel-heading">
                        Add New Post 
                    </div>
                    <div class="panel-body">

                        <form class="form-horizontal" role="form" method="POST" action="dashboard.php">

                            <div class="row">
                                <div class="form-group">
                                    <label for="title" class="col-md-4 control-label">Title</label>

                                    <div class="col-md-6">
                                        <input id="title" type="text" class="form-control" name="title" value="" autofocus="">
                                    </div>
                                    <span class="text-danger"><?= !empty($errors['title']) ? $errors['title'] : ''  ?></span>
                                </div>
                            </div>

                            <div class="row">  
                                <div class="form-group">
                                    <label for="content" class="col-md-4 control-label">Content</label>

                                    <div class="col-md-6">
                                        <textarea id="content" type="text" class="form-control" name="content" value="" autofocus="" ></textarea>
                                    </div>
                                    <span class="text-danger"><?= !empty($errors['content']) ? $errors['content'] : ''  ?></span>
                                </div>
                            </div> 
                            <div class="row">
                                <div class="form-group">
                                    <label for="image" class="col-md-4 control-label">Image Address</label>

                                    <div class="col-md-6">
                                        <input id="image" type="text" class="form-control" name="image" autofocus="">
                                    </div>
                                    <span class="text-danger"><?= !empty($errors['image']) ? $errors['image'] : ''  ?></span>
                                </div>
                            </div>




                            <!-- Location -->
                            <div class="row">
                                <div class="form-group">
                                  <label for="image" class="col-md-4 control-label">Location:</label>
                                  <div class="col-md-3">
                                      <select class="form-control" name="location">
                                        <option value="0">North Island</option>
                                        <option value="1">South Island</option>
                                    </select>
                                </div>
                            </div>
                        </div>


                        <!-- Age -->
                        <div class="row">
                            <div class="form-group">
                              <label for="image" class="col-md-4 control-label">Age:</label>
                              <div class="col-md-3">
                                  <select class="form-control" name="age">
                                    <option value="0">Puppy</option>
                                    <option value="1">Adult</option>
                                </select>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="form-group">
                          <label for="image" class="col-md-4 control-label">Gender:</label>
                          <div class="col-md-3">
                              <select class="form-control" name="gender">
                                <option value="0">Male</option>
                                <option value="1">Female</option>
                            </select>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="form-group">
                        <label for="image" class="col-md-4 control-label">Desexed:</label>
                        <div class="col-md-3">
                          <select class="form-control" name="desexed">
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="form-group">
                    <label for="image" class="col-md-4 control-label">Vaccinated:</label>
                    <div class="col-md-3">
                      <select class="form-control" name="vaccinated">
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group">
                <label for="image" class="col-md-4 control-label">Wormed:</label>
                <div class="col-md-3">
                  <select class="form-control" name="wormed">
                    <option value="0">No</option>
                    <option value="1">Yes</option>
                </select>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="form-group">
            <label for="image" class="col-md-4 control-label">Flead:</label>
            <div class="col-md-3">
              <select class="form-control" name="flead">
                <option value="0">No</option>
                <option value="1">Yes</option>
            </select>
        </div>
    </div>
</div>

<div class="row">
    <div class="form-group">
    <label for="image" class="col-md-4 control-label">Registered:</label>
      <div class="col-md-3">
          <select class="form-control" name="registered">
            <option value="0">No</option>
            <option value="1">Yes</option>
        </select>
    </div>
</div>
</div>

    <div class="row">
        <div class="form-group">
          <label for="image" class="col-md-4 control-label">Microchipped:</label>
          <div class="col-md-3">
              <select class="form-control" name="microchipped">
                <option value="0">No</option>
                <option value="1">Yes</option>
            </select>
        </div>
    </div>
</div>


<div class="form-group">
    <div class="col-md-8 col-md-offset-4">
        <button type="submit" class="btn btn-default col-md-3 search">
            Add
        </button>
    </div>
</div>

</form>
</div>
</div>
</div>

<div class="col-md-4">

    <div class="form-group">

    </div>
</div>

</div>
</div>
<!-- End of Content -->
</div>

<?php
require 'partials/footer.php';
?>


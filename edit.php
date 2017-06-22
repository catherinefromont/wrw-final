<?php
require 'includes/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST"){

  updateListing (e($_POST['id']), $dbh, e($_POST['title']), e($_POST['content']), e($_POST['image']), e($_POST['location']), e($_POST['age']), e($_POST['gender']), e($_POST['desexed']), e($_POST['vaccinated']), e($_POST['wormed']), e($_POST['flead']), e($_POST['registered']), e($_POST['microchipped']));
  redirect('index.php');

}

$editListing = editListing($_GET['id'], $dbh);



require 'partials/header.php';
require 'partials/navigation.php';
?>


<div class="container">

  <!-- <div class="row">
    <div class="col-md-12">
    </div>
  </div> -->

  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-inverse">
        <div class="panel-heading">
          Edit
        </div>
        <div class="panel-body">
          <form class="form-horizontal" role="form" method="POST" action="edit.php">
            <input id="id" type="hidden" name="id" value="<?= $editListing['id'] ?>">




           

            <div class="form-group">
              <label for="projectName" class="col-md-4 control-label">Title</label>

              <div class="col-md-6">
                <input id="title" type="text" class="form-control" name="title" value="<?= $editListing['title'] ?>" required="" autofocus="">
              </div>
            </div>


            <div class="form-group">
              <label for="content" class="col-md-4 control-label">Content</label>

              <div class="col-md-6">
                <input id="content" type="text" class="form-control" name="content" value="<?= $editListing['content'] ?>" autofocus="">
              </div>
            </div>

            <div class="row">
              <div class="form-group">
                <label for="image" class="col-md-4 control-label">Image Address</label>

                <div class="col-md-6">
                  <input id="image" type="text" class="form-control" name="image" value="<?= $editListing['image'] ?>"autofocus="">
                </div>
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
                  Update
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


<?php
require 'partials/footer.php';
?>
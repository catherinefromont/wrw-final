<?php
require 'includes/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && loggedIn()) {


  $content = $listing_id = '';
  


  $listing_id = e($_POST['listing_id']);



  if ($_POST['_method'] == 'ADD') {


    $content = e($_POST['content']);
    $errors['content'] = validateContent($content);


    if ($errors['content']) {
addMessage('error', "Please enter a comment");
    redirect("view.php?id=" . $listing_id);
  }
else{

  

    addComment($dbh, $listing_id, $content);
    addMessage('success', "You have successfully added a comment");
    redirect("view.php?id=" . $listing_id);

  }
  }

  if ($_POST["_method"] == "delete") {
    $id= $_POST['id'];
    deleteComment($dbh, $id);
    addmessage('success', "You have successfully deleted a comment");
    redirect("view.php?id=" . $listing_id);
  }
}




$viewListing = viewListing($_GET['id'], $dbh);
$comments = getComments($_GET['id'], $dbh);

$page['title'] = 'View';

require 'partials/header.php';
require 'partials/navigation.php';
?>


<div class="container">
  <div class="row">
    <div class="col-md-12"><?= showMessages() ?>
    </div>
  </div>


  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-inverse">
      <div class="panel-body">
      <h1 class="col-md-1 title"><?= $viewListing['title'] ?></h1>
        <a href="contact.php" class="col-md-3 btn btn-default contactus">Contact Us about <?= $viewListing['title'] ?>!</a>
        </div>
      </div>
    </div>
  </div>

  <div class="row">

    <!-- Image column -->
    <div class="col-md-8">
      <div class="panel panel-inverse">
        <div class="panel-body">
        <img class="img-responsive" src="<?= $viewListing['image'] ?>">

        </div>
      </div>
    </div>

    <!-- Details column -->
    

      
      <div class="col-md-4">

        <div class="panel panel-inverse">
        <div class="panel-heading">
          <div class="col-md-12">
            <h3 class="title pull-left">Information:</h3> 
          </div>
        </div>
        

          <div class="panel-body">

          
            <br>
            <br>

            <div class="col-md-6 details">
              <strong>Location:</strong>
            </div>
            <div class="col-md-6 details">
              <?php if ($viewListing['location'] == 0): ?>

              North Island

              <?php else: ?>

              South Island

              <?php endif; ?>
            </div>



            <div class="col-md-6 details">
              <strong>Age:</strong>
            </div>
            <div class="col-md-6 details">
              <?php if ($viewListing['age'] == 0): ?>

              Puppy

              <?php else: ?>

              Adult

              <?php endif; ?>
            </div>



            <div class="col-md-6 details">
              <strong>Gender:</strong>
            </div>
            <div class="col-md-6 details">
              <?php if ($viewListing['gender'] == 0): ?>

              Male

              <?php else: ?>

                Female

              <?php endif; ?>
            </div>



            <div class="col-md-6 details">
              <strong>Desexed:</strong>
            </div>
            <div class="col-md-6 details">
              <?php if ($viewListing['desexed'] == 0): ?>

                 No

               <?php else: ?>

                Yes
                 
               <?php endif; ?>
            </div>



            <div class="col-md-6 details">
              <strong>Vaccinated:</strong>
            </div>
            <div class="col-md-6 details">
              
              <?php if ($viewListing['vaccinated'] == 0): ?>

                No

              <?php else: ?>

                Yes
                            
              <?php endif; ?>
            </div>



            <div class="col-md-6 details">
              <strong>Wormed:</strong>
            </div>
            <div class="col-md-6 details">
              <?php if ($viewListing['wormed'] == 0): ?>

               No

              <?php else: ?>

               Yes
                            
              <?php endif; ?>
            </div>



            <div class="col-md-6 details">
              <strong>Flead:</strong>
            </div>
            <div class="col-md-6 details">
              <?php if ($viewListing['flead'] == 0): ?>

                No

              <?php else: ?>

                Yes
                            
              <?php endif; ?>
            </div>



            <div class="col-md-6 details">
              <strong>Registered:</strong>
            </div>
            <div class="col-md-6 details">
              <?php if ($viewListing['registered'] == 0): ?>

                No

              <?php else: ?>

                Yes
                            
              <?php endif; ?>
            </div>



            <div class="col-md-6 details">
              <strong>Microchipped:</strong>
            </div>
            <div class="col-md-6 details">
             <?php if ($viewListing['microchipped'] == 0): ?>

               No

             <?php else: ?>

               Yes
                           
             <?php endif; ?>
            </div>

            


          </div>
        </div>
      </div>
      
  </div>



  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-inverse">
        
        
        <div class="panel-heading">
        <div class="col-md-12">
        <h2 class="title pull-left">Description</h2> 
        </div>
        </div><br>
        <br>
        
        <div class="panel-body">
        <div class="col-md-12">
        <p class="title"><?= $viewListing['content'] ?></p> 
        </div>
        </div>
        

      </div>
    </div>
  </div>
  


  <div class="row">
  <div class="col-md-12">

    
      
      <div id="comments" class="panel panel-inverse">

        <div class="panel-heading">
        <div class="col-md-12">

          <h3 class="title pull-left">
            Recent Comments
          </h3>
        </div>
        </div><br>
        <br>

        <div class="panel-body">
        <div class="col-md-12">

          <?php if(loggedIn()): ?>
            <ul class="media-list">
              <li class="media">
                <div class="media-left">
                  <img class="comments-profile-photo" src="<?= get_gravatar($_SESSION['email']) ?>">
                </div>


                <div class="media-body">
                  <div class="form-group" style="padding:12px;">
                    <form method="POST" action="view.php">

                      <input name="_method" type="hidden" value="ADD">
                      <input name="listing_id" value="<?= $viewListing['id'] ?>" type="hidden" >

                      <textarea name="content" class="form-control animated" placeholder="Leave a comment"></textarea>
                      <span class="text-danger"><?= !empty($errors['content']) ? $errors['content'] : ''  ?></span>
                      <button class="btn btn-default pull-right search" style="margin-top:10px" type="submit">
                        Post
                      </button>
                    </form>
                  </div>
                </div>
              </li>
            </ul>
            <hr>
          <?php endif; ?>


          <?php 
          if(!empty($comments)):
            foreach ($comments as $comment):
              ?>

            <ul class="media-list">
              <li class="media">
                <div class="media-left">
                  <img src="<?= get_gravatar($comment['email']) ?>" class="comments-profile-photo">
                </div>
                <div class="media-body">
                  <h4 class="media-heading"> <?= $comment['first_name'] ?>                   <br>
                    <div class="pull-right">
                      <small><?= formatTime(strtotime($comment['created_at'])) ?>
                      </small>

                      &nbsp;


                 
                      <?php if(userOwns($comment['user_id'])): ?>
                        <form method="POST" action="view.php" style="display: inline-block;">

                          <input name="_method" type="hidden" value="delete">

                          <input name="id" type="hidden" value="<?= $comment['id']?>">
                          <input name="listing_id" value="<?= $viewListing['id'] ?>" type="hidden" >
                          <button onclick="return confirm('Are you sure you want to delete this item?');" type="submit" class="btn btn-default btn-danger">Delete</button>

                        </form>
                      <?php endif; ?>

                    </div>
                  </h4>
                  <p>
                    <?= $comment['content'] ?>
                  </p>
                </div>
              </li>
            </ul>
            <?php 
            endforeach;
            else:  ?>

            <ul class="media-list">
              <li class="media">
                <div class="media-body">
                  <p>
                    No Comments
                  </p>
                </div>
              </li>
            </ul>
          <?php endif; ?>
        </div>
      </div>
      </div>
    </div>
  </div>
  </div>

</div>





<?php
require 'partials/footer.php';
?>

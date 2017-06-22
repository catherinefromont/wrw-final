<!-- Navigation -->

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
        <a class="logo" href="index.php"><img src="logo.png" class="logo" alt="logo"></a>
        </div>
    
      <!--  <div class="navbar-header">
           <button type="button" class="navbar-toggle first" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
               <span class="sr-only">Toggle navigation</span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
           </button>
       
       </div> -->
        
        <!-- Collect the nav links, forms, and other content for toggling -->
    
        <div>
       
            <ul class="nav navbar-nav navbar-right">
                <?php if(loggedIn()): ?>


                    <li>
                    <div class="dropdown">
                      <a class="btn btn-secondary dropdown-toggle" href="https://example.com" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="nav-profile-photo" src="<?= get_gravatar($_SESSION['email']) ?>" alt="gravatar">
                        <?= $_SESSION['first_name'] ?>
                        
                        <span class="caret"></span>
                      </a>

                       <ul role="menu" class="dropdown-menu panel">

                          <li>
                              <a href="index.php" class="item" aria-hidden="true">Home</a>
                          </li>
                          <li>
                              <a href="dashboard.php" class="item" aria-hidden="true">Add New Post</a>
                          </li>
                          <li>
                              <a href="logout.php" class="item" aria-hidden="true">Logout</a>
                          </li>
                      </ul>

                    </div>
                    </li>
           
            <?php else: ?>
                <li><a href="register.php" class="btn btn-default btn-sm register" aria-hidden="true">Register</a></li>
                <li><a href="login.php" class="btn btn-default btn-sm register" aria-hidden="true">Login</a></li>
            <?php endif; ?>
            </ul>
        </div>
        
    </div>
    <!-- /.container -->
</nav>
    
<nav class="navbar navbar-second navbar-inverse navbar-fixed">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        
       <div class="navbar-header">
           <button type="button" class="navbar-toggle first" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
               <span class="sr-only">Toggle navigation</span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
           </button>
       
       </div>
            
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>
                    <a href="index.php">Home<i class="fa fa-paw" aria-hidden="true"></i></a>
                </li>
                <li>
                    <a href="about.php">About Us<i class="fa fa-paw" aria-hidden="true"></i></a>
                </li>
                <li>
                    <a href="contact.php">Contact<i class="fa fa-paw" aria-hidden="true"></i></a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->


    </div>
    <!-- /.container -->
</nav>



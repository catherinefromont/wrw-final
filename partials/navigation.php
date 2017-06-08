<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
        <a class="logo" href="index.php"><img src="logo.png" width="150px" height="150px"></a>
        </div>
    
        <!-- Brand and toggle get grouped for better mobile display -->
        
        <!-- Collect the nav links, forms, and other content for toggling -->
    
        <div class="collapse navbar-collapse">
            
            <ul class="nav navbar-nav">
                &nbsp;
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <?php if(loggedIn()): ?>
                    <li class="dropdown">
                        
                     <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="dropdown-toggle">
                         <img class="nav-profile-photo" src="<?= get_gravatar($_SESSION['email']) ?>" width="20px" height="20px">
                         <?= $_SESSION['first_name'] ?>
                         
                         <span class="caret"></span>
                     </a>
                     <ul role="menu" class="dropdown-menu panel">

                        <li>
                            <a href="index.php" class="item">Home</a>
                        </li>
                        <li>
                            <a href="dashboard.php" class="item">Add New Post</a>
                        </li>
                        <li>
                            <a href="logout.php" class="item">Logout</a>
                        </li>
                    </ul>
                    </li>
            </ul>
            <?php else: ?>
                <a href="register.php" class="btn btn-default register">Register</a>
                <a href="login.php" class="btn btn-default register">Login</a>
            <?php endif; ?>
        </div>
        
    </div>
    <!-- /.container -->
</nav>
<nav class="navbar navbar-inverse navbar-fixed" role="navigation">
    
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
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
                    <a href="index.php">Home</a>
                </li>
                <li>
                    <a href="about.php">About Us</a>
                </li>
                <li>
                    <a href="contact.php">Contact</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->


    </div>
    <!-- /.container -->
</nav>



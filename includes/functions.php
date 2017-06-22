<?php

function dd($data)
{
  die(var_dump($data));
}


function loggedIn() {
  return !empty($_SESSION['first_name']);
}

// -----------------------------------------------------------------------------
// user specific function for editing and deleting
// -----------------------------------------------------------------------------

function userOwns($id) {
  if (loggedIn() && $_SESSION['id'] === $id){
   return true;
 }
 return false;
}

function isAdmin() {
  if (loggedIn() && $_SESSION['admin'] == 1){
    return true;
  }
}



function redirect($url)
{
  header ('Location: ' . $url);
  die();
}

// -----------------------------------------------------------------------------
// showing htmlspecialchars function
// -----------------------------------------------------------------------------

function e($value)
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

function validateTitle($title) {

  if (empty($title)) {
    return "Title is required";
  }
  
  else if(strlen ($title) >= 40){
    return "Title cannot be longer than 40 characters";
  }
  
  return false;
}

function validateContent($content) {

  if (empty($content)) {
    return "Content is required";
  }
  
  return false;
}


function validateName($name) {

  if (empty($name)) {
    return "Name is required";
  }
  
  else if(strlen ($name) >= 40){
    return "Name cannot be longer than 40 characters";
  }
  
  return false;
}

function validatePhone($phone) {

  if (empty($phone)) {
    return "Phone Number is required";
  }
  
  return false;
}




function validateLastName($last_name) {

  if (empty($last_name)) {
    return "Last Name is required";
  }
  
  else if(strlen ($last_name) >= 40){
    return "Name cannot be longer than 40 characters";
  }
  
  return false;
}

function validateFirstName($first_name) {

  if (empty($first_name)) {
    return "First Name is required";
  }
  
  else if(strlen ($first_name) >= 40){
    return "Name cannot be longer than 40 characters";
  }
  
  return false;
}



function ValidateEmail($email) {
  if (empty($email)) {
  return "Email is required";
  }
  else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      return "Please enter a correct Email Address";
  }
  else if($email > 100){
  return "Email cannot be longer than 100 characters";
  }
  return false;
}


function ValidatePassword($password) {
  if (empty($password)) {
  return "Password is required";
  }
}


// function ValidateAddress($address) {
//   if (empty($address)) {
//   return "Address is required";
//   }
//   else if (!preg_match("/^[0-9]+\ +[a-zA-Z]/", $address)) {
//      return "Please enter a correct address";
//   }
//   else if(strlen($address) > 200){
//   return "Address cannot be longer than 200 characters";
//   }
//   return false;
// }

// -----------------------------------------------------------------------------
// showing timestamp function
// -----------------------------------------------------------------------------
/**
 * Returns a human-readable time from a timestamp
 * @param timestamp $timestamp
 * @return string
 */
function formatTime($timestamp)
{
  // Get time difference and setup arrays
  $difference = time() - $timestamp;
  $periods = array("second", "minute", "hour", "day", "week", "month", "years");
  $lengths = array("60","60","24","7","4.35","12");

  // Past or present
  if ($difference === 0) {
    return 'Just now';
  }
  if ($difference >= 0)
  {
    $ending = "ago";
  }
  else
  {
    $difference = -$difference;
    $ending = "to go";
  }

  
  $arr_len = count($lengths);
  for($j = 0; $j < $arr_len && $difference >= $lengths[$j]; $j++)
  {
    $difference /= $lengths[$j];
  }

  
  $difference = round($difference);

  if($difference != 1)
  {
    $periods[$j].= "s";
  }

  $text = "$difference $periods[$j] $ending";

  
  if($j > 2)
  {
  
    if($ending == "to go")
    {
      if($j == 3 && $difference == 1)
      {
        $text = "Tomorrow at ". date("g:i a", $timestamp);
      }
      else
      {
        $text = date("F j, Y \a\\t g:i a", $timestamp);
      }
      return $text;
    }

    if($j == 3 && $difference == 1) 
    {
      $text = "Yesterday at ". date("g:i a", $timestamp);
    }
    else if($j == 3) 
    {
      $text = date("l \a\\t g:i a", $timestamp);
    }
    else if($j < 6 && !($j == 5 && $difference == 12)) 
    {
      $text = date("F j \a\\t g:i a", $timestamp);
    }
    else 
    {
      $text = date("F j, Y \a\\t g:i a", $timestamp);
    }
  }

  return $text;
}

// -----------------------------------------------------------------------------
// connect to database function
// -----------------------------------------------------------------------------


function connectDatabase($host,$database,$user,$pass){
    try{
        $dbh = new PDO('mysql:host=' . $host . ';dbname=' . $database, $user, $pass, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

        return  $dbh;

    } catch (PDOException $e){
        print('Error! ' . $e->getMessage() . '<br>');
        die();
    }
}



/**
 * Insert into "users" table
 * @param type $dbh 
 * @param type $username 
 * @param type $email 
 * @param type $password 
 * @return type
 */
function addUser($dbh, $first_name, $last_name, $email, $password) {


    $sth = $dbh->prepare("INSERT INTO users VALUES (NULL, :first_name, :last_name, :email, :password, 0)");




    $sth->bindValue(':first_name', $first_name, PDO::PARAM_STR);
    $sth->bindValue(':last_name', $last_name, PDO::PARAM_STR);
    $sth->bindValue(':email', $email , PDO::PARAM_STR);
    $sth->bindValue(':password', $password , PDO::PARAM_STR);
    


    $success = $sth->execute();    
    return true;
}



// -----------------------------------------------------------------------------
// show success or error messages
// -----------------------------------------------------------------------------

function showMessages($type = null)
{
  $messages = '';
  if(!empty($_SESSION['flash'])) {
    foreach ($_SESSION['flash'] as $key => $message) {
      if(($type && $type === $key) || !$type) {
        foreach ($message as $k => $value) {
          unset($_SESSION['flash'][$key][$k]);
          $key = ($key == 'error') ? 'danger': $key;
          $messages .= '<div class="alert alert-' . $key . '">' . $value . '</div>' . "\n";
        }
      }
    }
  }
  return $messages;
}


/**
 * Add a message to the session
 * @param string $type
 * @param string $message
 * @return void
 */
function addMessage($type, $message) {
  $_SESSION['flash'][$type][] = $message;
}


// -----------------------------------------------------------------------------
// insert into "listings" table
// -----------------------------------------------------------------------------


function addListing($dbh, $title, $content, $image, $location, $age, $gender, $desexed, $vaccinated, $wormed, $flead, $registered, $microchipped) {


    $sth = $dbh->prepare("INSERT INTO listings VALUES (NULL, :title, :content, :image, :location, :age, :gender, :desexed,  :vaccinated, :wormed, :flead, :registered, :microchipped, :user_id, NOW(), NOW())");



    $sth->bindValue(':title', $title, PDO::PARAM_STR);
    $sth->bindValue(':content', $content , PDO::PARAM_STR);
    $sth->bindValue(':image', $image, PDO::PARAM_STR);
    $sth->bindValue(':location', $location, PDO::PARAM_STR);
    $sth->bindValue(':age', $age, PDO::PARAM_STR);
    $sth->bindValue(':gender', $gender, PDO::PARAM_INT);
    $sth->bindValue(':desexed', $desexed, PDO::PARAM_INT);
    $sth->bindValue(':vaccinated', $vaccinated, PDO::PARAM_INT);
    $sth->bindValue(':wormed', $wormed, PDO::PARAM_INT);
    $sth->bindValue(':flead', $flead, PDO::PARAM_INT);
    $sth->bindValue(':registered', $registered, PDO::PARAM_INT);
    $sth->bindValue(':microchipped', $microchipped, PDO::PARAM_INT);
    $sth->bindValue(':user_id', $_SESSION['id'] , PDO::PARAM_INT);



    $success = $sth->execute();    
    return $success;
}





function getUser($dbh, $email) {
  $sth = $dbh->prepare('SELECT * FROM `users` WHERE email = :email');

  $sth->bindValue(':email', $email, PDO::PARAM_STR);

  


  $sth->execute();

  $row = $sth->fetch();

  if (!empty($row)) {
    return $row;
  }
  return false;
}

function getLocationOptions($dbh){

  $sth = $dbh->prepare('SELECT * FROM `location`');
  $sth->execute();

  $options = $sth->fetchAll();

  if (!empty($options)) {
    return $options;
  }
  return false;
}




function getAgeOptions($dbh){

  $sth = $dbh->prepare('SELECT * FROM `age`');
  $sth->execute();

  $options = $sth->fetchAll();

  if (!empty($options)) {
    return $options;
  }
  return false;
}

function getListings($dbh) {
   
  $sth = $dbh->prepare('SELECT listings.id, listings.title, listings.content, listings.image, listings.location, listings.age, listings.gender, listings.desexed, listings.vaccinated, listings.wormed, listings.flead, listings.registered, listings.microchipped, listings.user_id, listings.updated_at, listings.created_at, users.first_name, users.last_name FROM listings INNER JOIN users ON listings.user_id = users.id ORDER BY listings.created_at DESC');

    
    $sth->execute();

    $row = $sth->fetchAll();

    if (!empty($row)) {
      return $row;
    }
    return false;
}

// -----------------------------------------------------------------------------
// edit and delete topics function
// -----------------------------------------------------------------------------


function editListing($id, $dbh) {
    
    $sth = $dbh->prepare("SELECT * FROM listings WHERE id = :id LIMIT 1");
    $sth->bindParam(':id', $id, PDO::PARAM_STR);
    $sth->execute();

    $result = $sth->fetch();
    return $result;
}

function updateListing($id, $dbh, $title, $content, $image, $location, $age, $gender, $desexed, $vaccinated, $wormed, $flead, $registered, $microchipped) {
    $sth = $dbh->prepare("UPDATE listings SET title = :title, content = :content, image = :image, location = :location, age = :age, gender = :gender, desexed = :desexed, vaccinated = :vaccinated, wormed = :wormed, flead = :flead, registered = :registered, microchipped = :microchipped WHERE id = :id LIMIT 1");
    
    $sth->bindParam(':id', $id, PDO::PARAM_STR);
    
    $sth->bindParam(':title', $title, PDO::PARAM_STR);
    
    $sth->bindParam(':content', $content, PDO::PARAM_STR);

    $sth->bindParam(':image', $image, PDO::PARAM_STR);

    $sth->bindParam(':location', $location, PDO::PARAM_STR);

    $sth->bindParam(':age', $age, PDO::PARAM_STR);

    $sth->bindParam(':gender', $gender, PDO::PARAM_STR);

    $sth->bindParam(':desexed', $desexed, PDO::PARAM_STR);

    $sth->bindParam(':vaccinated', $vaccinated, PDO::PARAM_STR);

    $sth->bindParam(':wormed', $wormed, PDO::PARAM_STR);

    $sth->bindParam(':flead', $flead, PDO::PARAM_STR);

    $sth->bindParam(':registered', $registered, PDO::PARAM_STR);

    $sth->bindParam(':microchipped', $microchipped, PDO::PARAM_STR);

     
    $result = $sth->execute();
    return $result;
}

function deleteListing($id, $dbh) {
    
    $result = $dbh->prepare("DELETE FROM listings WHERE id= :id LIMIT 1");
    $result->bindParam(':id', $id);
    $result->execute();
}

// -----------------------------------------------------------------------------
// view topics functions
// -----------------------------------------------------------------------------

function viewListing($id, $dbh) {
    
    $sth = $dbh->prepare("SELECT * FROM listings WHERE id = :id LIMIT 1");
    $sth->bindParam(':id', $id, PDO::PARAM_STR);
    $sth->execute();

    $result = $sth->fetch();
    return $result;
}


// -----------------------------------------------------------------------------
// Gravatar Image Profile function
// -----------------------------------------------------------------------------

function get_gravatar( $email, $s = 80, $d = 'mm', $r = 'g', $img = false, $atts = array() ) {
  $url = 'https://www.gravatar.com/avatar/';
  $url .= md5( strtolower( trim( $email ) ) );
  $url .= "?s=$s&d=$d&r=$r";
  if ( $img ) {
    $url = '<img src="' . $url . '"';
    foreach ( $atts as $key => $val )
      $url .= ' ' . $key . '="' . $val . '"';
    $url .= ' />';
  }
  return $url;
}

// -----------------------------------------------------------------------------
// get Comments functions
// -----------------------------------------------------------------------------
function getComments($id, $dbh) {
  $sth = $dbh->prepare("SELECT comments.id, comments.content, comments.listing_id, comments.user_id, comments.updated_at, comments.created_at, users.first_name, users.last_name, users.email  FROM comments INNER JOIN users ON comments.user_id = users.id WHERE comments.listing_id = :id ORDER BY comments.created_at DESC");

    
  $sth->bindParam(':id', $id, PDO::PARAM_STR);
  $sth->execute();
  $row = $sth->fetchAll();

  if (!empty($row)) {
    return $row;
  }
  return false;
}

// -----------------------------------------------------------------------------
// add Comments function
// -----------------------------------------------------------------------------



function addComment($dbh, $listing_id, $content) {
 $sth = $dbh->prepare("INSERT INTO comments (content, user_id, listing_id, created_at, updated_at) VALUES (:content, :user_id, :listing_id, NOW(), NOW())");
 $sth->bindParam(':content', $content, PDO::PARAM_STR);
 $sth->bindParam(':user_id', $_SESSION['id'], PDO::PARAM_INT);
 $sth->bindParam(':listing_id', $listing_id, PDO::PARAM_INT);
 $success = $sth->execute();
 return $success;
}

// -----------------------------------------------------------------------------
// delete Comments function
// -----------------------------------------------------------------------------



function deleteComment($dbh, $id) {
  // prepare statement that will be executed
  $result = $dbh->prepare("DELETE FROM comments WHERE id= :id LIMIT 1");
  $result->bindParam(':id', $id);
  $result->execute();
}



function getPaginatedSearchListings($dbh, $perPage = 8, $location, $gender, $age) // Set a default amount of projects to show per page.
{

    if (empty($location)) {
      # code...
    }
    // Find out how many items are in the table
    $total = $dbh->query('SELECT COUNT(*) FROM listings')->fetchColumn();

    // How many items to list per page
    $limit = $perPage;

    // How many pages will there be
    $pages = ceil($total / $limit);

    // What page are we currently on?
    $page = min($pages, filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT, array(
        'options' => array(
            'default'   => 1,
            'min_range' => 1,
        ),
    )));
    // Calculate the offset for the query
    $offset = ($page - 1)  * $limit;

    // Some information to display to the user
    $start = $offset + 1;
    $end = min(($offset + $limit), $total);

    // The "back" link
    $prevlink = ($page > 1) ? '<a class="btn btn-default" href="?page=1" title="First page">&laquo;</a> <a class="btn btn-default" href="?page=' . ($page - 1) . '" title="Previous page">&lsaquo;</a>' : '<span class="disabled btn btn-default">&laquo;</span> <span class="disabled btn btn-default">&lsaquo;</span>';

    // The "forward" link
    $nextlink = ($page < $pages) ? '<a class="btn btn-default" href="?page=' . ($page + 1) . '" title="Next page">&rsaquo;</a> <a class="btn btn-default" href="?page=' . $pages . '" title="Last page">&raquo;</a>' : '<span class="disabled btn btn-default">&rsaquo;</span> <span class="disabled btn btn-default">&raquo;</span>';

    $paginationLinks = '<div id="paging"><p>' . $prevlink . ' Page ' . $page . ' of ' . $pages . ' pages, displaying ' . $start . '-' . $end . ' of ' . $total . ' results ' . $nextlink . ' </p></div>';

    // Prepare the paged query
    $stmt = $dbh->prepare('SELECT location.name, gender.name, age.name FROM location WHERE 1 = 1 AND location = :location DESC LIMIT :limit OFFSET :offset');

    // Bind the query params
    $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
    $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();

    // Get the results of the query
    $result = $stmt->fetchAll();

    // If there are no rows, set the variable to false
    if (empty($result)) {
        $result = false;
    }

    // Return the results (projects) along with the pagination links via an associative array
    return ['listings' => $result, 'paginationLinks' => $paginationLinks];
}





function getPaginatedListings($dbh, $perPage = 8) // Set a default amount of projects to show per page.
{
    // Find out how many items are in the table
    $total = $dbh->query('SELECT COUNT(*) FROM listings')->fetchColumn();

    // How many items to list per page
    $limit = $perPage;

    // How many pages will there be
    $pages = ceil($total / $limit);

    // What page are we currently on?
    $page = min($pages, filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT, array(
        'options' => array(
            'default'   => 1,
            'min_range' => 1,
        ),
    )));
    // Calculate the offset for the query
    $offset = ($page - 1)  * $limit;

    // Some information to display to the user
    $start = $offset + 1;
    $end = min(($offset + $limit), $total);

    // The "back" link
    $prevlink = ($page > 1) ? '<a class="btn btn-default" href="?page=1" title="First page">&laquo;</a> <a class="btn btn-default" href="?page=' . ($page - 1) . '" title="Previous page">&lsaquo;</a>' : '<span class="disabled btn btn-default">&laquo;</span> <span class="disabled btn btn-default">&lsaquo;</span>';

    // The "forward" link
    $nextlink = ($page < $pages) ? '<a class="btn btn-default" href="?page=' . ($page + 1) . '" title="Next page">&rsaquo;</a> <a class="btn btn-default" href="?page=' . $pages . '" title="Last page">&raquo;</a>' : '<span class="disabled btn btn-default">&rsaquo;</span> <span class="disabled btn btn-default">&raquo;</span>';

    $paginationLinks = '<div id="paging"><p>' . $prevlink . ' Page ' . $page . ' of ' . $pages . ' pages, displaying ' . $start . '-' . $end . ' of ' . $total . ' results ' . $nextlink . ' </p></div>';

    // Prepare the paged query
    $stmt = $dbh->prepare('SELECT listings.id, title, content, image, listings.location, age, gender, desexed, vaccinated, wormed, flead, registered, microchipped, created_at, updated_at, user_id, first_name, last_name, email, admin FROM listings INNER JOIN users ON listings.user_id = users.id ORDER BY created_at DESC LIMIT :limit OFFSET :offset');

    // Bind the query params
    $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
    $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();

    // Get the results of the query
    $result = $stmt->fetchAll();

    // If there are no rows, set the variable to false
    if (empty($result)) {
        $result = false;
    }

    // Return the results (projects) along with the pagination links via an associative array
    return ['listings' => $result, 'paginationLinks' => $paginationLinks];
}
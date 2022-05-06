<?php
//require_once "../config/session.php";
session_start();
$page_title = "Home"; 
require_once "../templates/header.php";
require_once "../config/connection.php";

$query = "SELECT * FROM users WHERE required_profile = 1 ORDER BY date_registered DESC";
$data = mysqli_query($dbs, $query) or die ("Error in query!");

?>

<div class="row">
  <div class="col">
    <p>
      <h1>
        <b><?php echo $page_title;?></b>
      </h1>
      <span>
        Latest Members
      </span>
    </p>
  </div>
</div>
<?php
$count = 0;
while ($user = mysqli_fetch_array($data) or die ()){?>

<div class="row">
  <div class="col">
    <div class = "card-deck">
      <div class="card" style="width: 20rem;">
        <img class="card-img-top" src="<?php echo IMAGEPATH.$user["profile_picture"];?>" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title"><?php echo $user["username"];?></h5>
          <p class="card-text"><?php echo $user["bio"];?></p>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">Name: <?php echo $user["first_name"]." ".$user["last_name"];?></li>
            <!-- <li class="list-group-item">City: <?php //echo $user["city"];?></li> -->
            <li class="list-group-item">Date Registered: <?php echo $user["date_registered"];?></li>
          </ul>
          <a href="viewprofile.php?user=<?php echo $user["username"]?>" class="btn btn-primary">View Profile</a>
        </div>
      </div>
    </div>
  </div>
</div>


<?php
$count++;
}
?>


<?php include_once "../templates/footer.php"; ?>
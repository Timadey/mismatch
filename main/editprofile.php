<?php
$page_title = "Edit Profile"; 
require_once "../config/session.php";
require_once "../templates/header.php";
require_once "../config/connection.php";
// echo '<pre>';
// var_dump($_FILES);
// echo '</pre>';
$edit_user = $_SESSION["user_id"];
$query = "SELECT * FROM users WHERE user_id = '$edit_user'";
$data = mysqli_query($dbs, $query) or die ("Error in query!");
$user = mysqli_fetch_array($data) or die ("No such profile!");

if (isset($_POST["editprofile"])){
    $first_name = trim($_POST["first_name"]);
    $last_name = trim($_POST["last_name"]);
    $phone_number = trim($_POST["phone_number"]);
    $work = trim($_POST["work"]);
    $profile_picture = $_FILES["profile_picture"]["name"];

    //move uploaded file
    $target = IMAGEPATH.$profile_picture;
    move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $target);

    $query = "UPDATE users SET first_name='$first_name', last_name='$last_name', phone_number='$phone_number', profile_picture='$profile_picture', work='$work', required_profile='1' WHERE user_id=$edit_user ";
	$data = mysqli_query($dbs, $query) or die("Error fetching data!");
    $_SESSION["required_profile"] = 1;
    // unset($_POST["editprofile"]);
    // header("Location: viewprofile.php");
    echo "<script> alert('Profile has been edited successfully');
window.location.href = 'viewprofile.php';
</script>";
};

?>

<div class="container emp-profile">
            <form method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <img src="<?php echo IMAGEPATH.$user["profile_picture"];?>" alt=""/>
                            <div class="file btn btn-lg btn-primary">
                                Change Photo
                                <input type="file" name="profile_picture" value="<?php echo $user["profile_picture"];?>"required/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h5>
                                        <?php echo $user["first_name"]." ".$user["last_name"];?>
                                        <br>
                                        <?php if (isset($_SESSION["required_profile"]) && $_SESSION["required_profile"] == 0){
                                            echo "Update your profile to view other people's profile on Mismatch";}?>
                                    </h5>
                                    <h6>
                                        <p><?php echo $user["work"];?></p>
                                    </h6>
                                    <p class="proile-rating">RANKINGS : <span>8/10</span></p>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Timeline</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- <div class="col-md-2">
                        <button class="profile-edit-btn" name="btnAddMore" value="Edit Profile">Edit Profile</button>
                    </div> -->
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-work">
                            <p>WORK LINK</p>
                            <a href="">Website Link</a><br/>
                            <a href="">LinkedIn Profile</a><br/>
                            <a href="">GitHub Profile</a>
                            <p>SKILLS</p>
                            <a href="">Web Designer</a><br/>
                            <a href="">Web Developer</a><br/>
                            <a href="">WordPress</a><br/>
                            <a href="">WooCommerce</a><br/>
                            <a href="">PHP, .Net</a><br/>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Username</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?php echo $user["username"];?> (Edit username in settings)</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Name</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <!-- <label for="first_name">First Name</label> -->
                                            <input id="first_name" type="name" class="form-control" name="first_name" placeholder="First Name" value="<?php echo $user["first_name"];?>" required autofocus>
                                            <div class="invalid-feedback">
                                                First name is required
                                            </div>
                                        </div><br>

                                        <div class="form-group">
                                            <!-- <label for="last_name">Last Name</label> -->
                                            <input id="last_name" type="name" class="form-control" name="last_name" placeholder="Last Name" value="<?php echo $user["last_name"];?>" required>
                                            <div class="invalid-feedback">
                                                Last name is required
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Email</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?php echo $user["email_address"];?> (Edit email in settings)</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Phone</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p> <input id="phone_number" type="phone" class="form-control" name="phone_number" value="<?php echo $user["phone_number"];?>" required></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Profession</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input id="work" type="work" class="form-control" name="work" value="<?php echo $user["work"];?>" autofocus>
                                    </div>
                                </div><hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        
                                    </div>
                                    <div class="col-md-6">
                                        <button type="submit" class="profile-edit-btn"  value="saveprofile" name="editprofile">Save</button>
                                    </div>
                                </div>
                                        
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Experience</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>Expert</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Hourly Rate</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>10$/hr</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Total Projects</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>230</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>English Level</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>Expert</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Availability</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>6 months</p>
                                            </div>
                                        </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Your Bio</label><br/>
                                        <p>Your detail description</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>           
        </div>
<?php include_once "../templates/footer.php";?>
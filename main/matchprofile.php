<?php
$page_title = "Topics";
require_once "../config/session.php";
require_once "../templates/header.php";
require_once "../config/connection.php";


// echo '<pre>';
// var_dump($_POST);
// echo '</pre>';

$user_id = $_SESSION['user_id'];
//check if the user has open the page before
$query = "SELECT * FROM response WHERE user_id='$user_id'";
$result = mysqli_query($dbs, $query) or die("Error passing query");

if (mysqli_num_rows($result) == 0){
    //fill the response with blank responses
    $query = "SELECT * FROM topic ORDER BY category, name";
    $result = mysqli_query($dbs, $query);
    $topicId = array();
    while ($row = mysqli_fetch_array($result)){
        array_push($topicId, $row['topic_id']);
    };
    foreach ($topicId as $tid) {
        $query = "INSERT INTO response (user_id, topic_id) VALUES ('$user_id', '$tid')";
        mysqli_query($dbs, $query);
    };
};
if (isset($_POST["submit-response"])){
    //submit response by user
    foreach ($_POST as $response_id => $response) {

        $query = "UPDATE response SET response='$response' WHERE response_id='$response_id' AND user_id='$user_id'";
        mysqli_query($dbs, $query) or die("Unable to pass insert response query");
    };
echo "<script> alert('Response has been recorded successfully');
window.location.href = window.location.href;
</script>";
};

//generate the response field on the page with user response
$query = "SELECT * FROM topic";
$result = mysqli_query($dbs, $query) or die ("Couldn't fetch user responses"); ?>

<form method='post'>
<div class="row" style="padding:50px">
    <div class="card">
    <h5 class="card-header">What do you feel about this topics?</h5>
        <div class="card-body"><div>
<?php
$curr_category = "";
$loop_category = "";
while ($topic = mysqli_fetch_array($result)){
    $topic_id = $topic['topic_id'];
    $resQuery = "SELECT * FROM response WHERE user_id='$user_id'AND topic_id='$topic_id'";
    $resResult = mysqli_query($dbs, $resQuery) or die("Unable to fecth response");
    $response = mysqli_fetch_array($resResult);
    if (mysqli_num_rows($resResult) == 1){

        $loop_category = $topic['category'];
        if ($loop_category != $curr_category){?>
        </div><hr>
        <h5 class="card-title"><?php echo $topic['category'];?></h5>
        <p class="card-text">Select Love or Hate</p>
            <div class="row">
            <?php }; $curr_category = $loop_category; ?>
    
                <div class="col-sm-3">
                    <div class="card-title"><?php echo $topic['name']; ?></div>
                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                        <input type="radio" class="btn-check" name="<?php echo $response['response_id'];?>" id="<?php echo $topic['topic_id']."1";?>" value=1 <?php echo $response['response'] == 1 ? "checked='checked'" : '';?>>
                        <label class="btn btn-outline-primary" for="<?php echo $topic['topic_id']."1";?>">Love</label>
                        <input type="radio" class="btn-check" name="<?php echo $response['response_id']?>" id="<?php echo $topic['topic_id']."2"?>" value=2 <?php echo $response['response'] == 2 ? "checked='checked'" : '';?>>
                        <label class="btn btn-outline-primary" for="<?php echo $topic['topic_id']."2";?>">Hate</label>
                        <input type="radio" class="btn-check" name="<?php echo $response['response_id']?>" id="<?php echo $topic['topic_id']."0"?>" value=0>
                        <label class="btn btn-outline-primary" for="<?php echo $topic['topic_id']."0";?>">Undecided</label>
                    </div>
                </div>
   <?php };

    
}; ?>
            </div>
        </div>
        <div class="row">
            <button type="submit" class="btn btn-primary btn-large btn-block"  value="submit-response" name="submit-response">Submit Response</button>
        </div>
    </div>
</form>


<?php include_once "../templates/footer.php";?>
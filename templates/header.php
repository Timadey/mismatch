<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
        <!-- <link rel="stylesheet" href="../assets/js/sweet_alert/package/dist/sweetalert2.min.css"> -->
        <link rel="stylesheet" href="../assets/css/style.css">
        
        <title><?php echo $page_title;?></title>
    </head>
    <body style = "padding: 10px">
        <header class="p-3 bg-white text-dark fixed-top">
            <div class="container">
                <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                    <a href="#" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
                    <img src="../assets/img/bootstrap/bootstrap.svg" alt="Bootstrap" width="32" height="32"><span><i>...MISMATCH...where opposites attract</i></span></a>

                    <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                        <li><a href="../main/index.php" class="nav-link px-2 text-dark">Home</a></li>
                        <?php if (isset($_SESSION["username"]) && isset($_SESSION["user_id"])){?>
                        <li><a href="viewprofile.php" class="nav-link px-2 text-dark">Profile</a></li>
                        <li><a href="editprofile.php" class="nav-link px-2 text-dark">Edit Profile</a></li>
                        <li><a href="matchprofile.php" class="nav-link px-2 text-dark">Topics</a></li>
                        <li><a href="mismatch.php" class="nav-link px-2 text-dark">Find Mismatch</a></li>
                        <li><a href="logout.php" class="nav-link px-2 text-dark">Sign Out</a></li>
                        <li><a href="#" class="nav-link px-2 text-dark">About</a></li>
                        <?php }; ?>
                    </ul>

                    <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
                        <input type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
                    </form>
                    <?php if (!isset($_SESSION["username"]) && !isset($_SESSION["user_id"])){?>
                        <div class="text-end">
                            <a href = "authenticate/login.php"><button type="button" class="btn btn-outline-dark me-2">Login</button></a>
                            <a href = "authenticate/register.php"><button type="button" class="btn btn-primary">Sign-up</button></a>
                        </div>
                    <?php }else{ ?>
                    

                    <!-- <div class="dropdown text-end">
                        <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="../assets/img/bootstrap/person-fill.svg" alt="Bootstrap" width="32" height="32" class="rounded-circle">
                        </a>
                        <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                        <li><a class="dropdown-item" href="#">New project...</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Sign out</a></li>
                        </ul>
                    </div> -->
                    <?php }; ?>
                </div>
            </div>
        </header>
        <div class = "container" style = "padding-top: 180px">

        
    




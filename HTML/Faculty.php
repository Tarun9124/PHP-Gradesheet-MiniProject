<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Faculty - Home</title>
    <style>
        .card-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 80vh;
        }
    </style>
</head>

<body>

    <body>
        <div class="container">
            <nav class="navbar navbar-light bg-light">
                <span class="navbar-brand mb-0 mx-auto h1">
                    <h1>FACULTY VIEW</h1>
                </span>
            </nav>
            <div class="card-container">
                <div class="row">
                    <div class="col-sm-6 col-md-5">
                        <div class="card w-100 ml-2">
                            <img class="card-img-top" src="../assets/img/admin.svg" alt="Card image cap">
                            <div class="card-body text-center">
                                <h5 class="card-title">Admin</h5>
                                <p class="card-text">Here For Add Marks.</p>
                                <a href="HomeFaculty.php" class="btn btn-primary card-link">ADD MARKS</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-5">
                        <div class="card w-100 ml-2">
                            <img class="card-img-top" src="../assets/img/edit.png" alt="Card image cap">
                            <div class="card-body text-center">
                                <h5 class="card-title">Faculty</h5>
                                <p class="card-text">Here For Remove/Update Marks.</p>
                                <a href="ShowMarks.php" class="btn btn-primary card-link">EDIT MARKS</a>
                            </div>
                        </div>
                    </div>
                    <div class="fixed-bottom container text-center">
                        <a class='btn btn-link' href='../index.php'>Go to HomePage</a>
                        <a class='btn btn-link' href='../HTML/Login_User.php'>Go to Login</a>
                    </div>
                </div>
            </div>
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
            <!-- <a href="HomeFaculty.php">ADD MARKS</a>
                    <a href="ShowMarks.php">EDIT MARKS</a> -->
    </body>

</html>
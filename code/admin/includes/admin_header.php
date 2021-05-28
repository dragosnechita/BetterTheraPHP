<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1 maximum-scale=1, user-scalable = no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" 
    crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/977f1de1a7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./styles/admin_style.css">
<!-- link chosen fonts when found <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;300;500;700&display=swap" rel="stylesheet"> -->
 <!-- take care of the recaptcha <script src="https://www.google.com/recaptcha/api.js"></script> -->
</head>
<body>
<div class="container test">
    <div class="row">
        <a class="col-1" href="./index.php">
            <img src="../content/images/logo.png" class="logo">
        </a>
        <div class="col-6 title">
            <h4 style="color:darkslateblue">Better Therapy - admin section</h4>
        </div>
        <div class="col-3"></div>
        <div class="col-2 dropdown">
            <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                User Menu
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="#"><i class="fa fa-fw fa-user"></i>Profile</li>
                <li><a class="dropdown-item" href="#"><i class="fa fa-fw fa-gear"></i>Settings</li>
                <li><a class="dropdown-item" href="#"><i class="fa fa-fw fa-power-off"></i>Logout</a></li>
            </ul>
        </div>
        </div>

</div>
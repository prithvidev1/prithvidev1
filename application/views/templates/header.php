<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewpioint" content="width=device-width, initial-scale=1.0" >
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">	
	 <title>CodeIgniter Tutorial</title>
</head>
<body>
     <h1></h1>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">System Login</a>
    
    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
     <?php if( (isset($_SESSION['user_logged'])) && ($_SESSION['user_logged'] == TRUE)){ ?>
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item active">
          <a class="nav-link " aria-current="page" href="<?php echo base_url(); ?>index.php/client/dashboard">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url(); ?>index.php/client/profile">Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url(); ?>index.php/income/income">Add Income</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url(); ?>index.php/income/client_income">View Income</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url(); ?>index.php/income/report">View Income Report</a>
        </li>

         <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url(); ?>index.php/expense/expense">Add Expense</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url(); ?>index.php/expense/client_expense">View Expense</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url(); ?>index.php/expense/report">View Expense Report</a>
        </li>


        
       
      </ul>
      <ul class="navbar-nav my-2 my-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url(); ?>index.php/auth/logout">Logout</a>
        </li>
        
      </ul>
    <?php } else { ?>
    
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?php echo base_url(); ?>index.php/auth/login">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url(); ?>index.php/auth/register">Register</a>
        </li>
       
      </ul>
      <?php } ?>
    </div>
  </div>
</nav>

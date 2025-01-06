<?php
	session_start();
	include("../Assets/Connection/Connection.php");
	$selQuery="select * from tbl_admin where admin_id='".$_SESSION['aid']."'";
	$result=$con->query($selQuery);
	$data=$result->fetch_assoc();
	
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>
    <!-- Favicon -->
    <link
      rel="shortcut icon"
      href="../Assets/Templates/Admin/img/svg/logo.svg"
      type="image/x-icon"
    />
    <!-- Custom styles -->
    <link rel="stylesheet" href="../Assets/Templates/Admin/css/style.min.css" />
  </head>

  <body>
    <div class="layer"></div>
    <!-- ! Body -->
    <div class="page-flex">
      <!-- ! Sidebar -->
      <aside class="sidebar">
        <div class="sidebar-start">
          <div class="sidebar-head">
            <a href="HomePage.php" class="logo-wrapper" title="Home">
              <span class="sr-only">Home</span>
              <span class="icon logo" aria-hidden="true"></span>
              <div class="logo-text">
                <span class="logo-title">Welcome</span>
                <span class="logo-subtitle"><?php echo $data['admin_name'] ?></span>
              </div>
            </a>
            <button
              class="sidebar-toggle transparent-btn"
              title="Menu"
              type="button"
            >
              <span class="sr-only">Toggle menu</span>
              <span class="icon menu-toggle" aria-hidden="true"></span>
            </button>
          </div>
          <div class="sidebar-body">
            <ul class="sidebar-body-menu">
              <li>
                <a class="active" href="HomePage.php"
                  ><span class="icon home" aria-hidden="true"></span
                  >Home</a
                >
              </li>
              <li>
                <a class="show-cat-btn" href="##">
                  <span class="icon paper" aria-hidden="true"></span>Verification
                  <span class="category__btn transparent-btn" title="Open list">
                    <span class="sr-only">Open list</span>
                    <span class="icon arrow-down" aria-hidden="true"></span>
                  </span>
                </a>
                <ul class="cat-sub-menu">
                  <li>
                    <a href="CoachVerification.php  ">Coach Verification</a>
                  </li>
                  <li>
                    <a href="StudentVerification.php">Student Verification</a>
                  </li>
                </ul>
              </li>

              <li>
                <a class="show-cat-btn" href="##">
                  <span class="icon paper" aria-hidden="true"></span>View Complaint 
                  <span class="category__btn transparent-btn" title="Open list">
                    <span class="sr-only">Open list</span>
                    <span class="icon arrow-down" aria-hidden="true"></span>
                  </span>
                </a>
                <ul class="cat-sub-menu">
                  <li>
                    <a href="Complaint.php">Complaints </a>
                  </li>
                </ul>
              </li>

              
                
            

              <li>
                <a class="show-cat-btn" href="##">
                  <span class="icon paper" aria-hidden="true"></span>View Feedback
                  <span class="category__btn transparent-btn" title="Open list">
                    <span class="sr-only">Open list</span>
                    <span class="icon arrow-down" aria-hidden="true"></span>
                  </span>
                </a>
                <ul class="cat-sub-menu">
                  <li>
                    <a href="Feedback.php">Feedbacks </a>
                  </li>
                </ul>
              </li>
              

              <li>
                <a class="show-cat-btn" href="##">
                  <span class="icon paper" aria-hidden="true"></span>Add New Data
                  <span class="category__btn transparent-btn" title="Open list">
                    <span class="sr-only">Open list</span>
                    <span class="icon arrow-down" aria-hidden="true"></span>
                  </span>
                </a>
                <ul class="cat-sub-menu">
                  <li>
                    <a href="AddGame.php"><span class="icon edit" aria-hidden="true"></span>Add Game</a>
                  </li>
                  <li>
                    <a href="Positions.php"><span class="icon edit" aria-hidden="true"></span>Add Position</a>
                  </li>
                  <li>
                    <a href="Action.php"><span class="icon edit" aria-hidden="true"></span>Add Action</a>
                  </li>
                  <li>
                    <a href="AcademicYear.php"><span class="icon edit" aria-hidden="true"></span>Add Academic Year</a>
                  </li>
                </ul>
              </li>
              <li>
              <li>
    <a href="../index.php">
        <span class="icon paper" aria-hidden="true"></span>Sign out
    </a>
</li>


              </li>
            </ul>
          </div>
        </div>
      </aside>
      <div class="main-wrapper">
        <!-- ! Main nav -->
        <nav class="main-nav--bg">
          <div class="container main-nav">
            <div class="main-nav-start">
              
            </div>
            <div class="main-nav-end">
              <button
                class="sidebar-toggle transparent-btn"
                title="Menu"
                type="button"
              >
                <!-- <span class="sr-only">Toggle menu</span>
                <span class="icon menu-toggle--gray" aria-hidden="true"></span>
              </button>
              
              <button
                class="theme-switcher gray-circle-btn"
                type="button"
                title="Switch theme" -->
              >
                <!-- <span class="sr-only">Switch theme</span>
                <i class="sun-icon" data-feather="sun" aria-hidden="true"></i>
                <i class="moon-icon" data-feather="moon" aria-hidden="true"></i>
              </button> -->
              
              <!-- <div class="nav-user-wrapper">
                <button
                  href=""
                  class="nav-user-btn dropdown-btn"
                  title="My profile"
                  type="button"
                >
                  <span class="sr-only">My profile</span>
                  <span class="nav-user-img">
                    <picture
                      ><source
                        srcset="
                          ../Assets/Templates/Admin/img/avatar/avatar-illustrated-02.webp
                        "
                        type="image/webp" />
                      <img
                        src="../Assets/Templates/Admin/img/avatar/avatar-illustrated-02.png"
                        alt="User name"
                    /></picture>
                  </span>
                </button>
                <ul class="users-item-dropdown nav-user-dropdown dropdown">
                  <li>
                    <a href="##">
                      <i data-feather="user" aria-hidden="true"></i>
                      <span>Profile</span>
                    </a>
                  </li>
                  <li>
                    <a class="danger" href="##">
                      <i data-feather="log-out" aria-hidden="true"></i>
                      <span>Log out</span>
                    </a>
                  </li>
                </ul>
              </div> -->
            </div>
          </div>
        </nav>
        <!-- ! Main -->
        <main class="main users chart-page" id="skip-target">
          <div class="container">
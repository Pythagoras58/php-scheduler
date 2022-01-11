<?php 

    // connect to db codes
    include('assets/database/db.php');
    // create new lecturrer
    if(isset($_POST['submit'])){

        // Get the form data
        $lecturer_name = $_POST['lecturer_name'];

         //simple validation checks
         if(empty($lecturer_name)){
            echo '<script>window.alert("Lecturer Name Is Required")</script>';
        }

        // insert new lecturer
        $SQL = "INSERT INTO lecturer(lecturer_name)
        VALUES(:lecturer_name)";

        // Prepare the statement
        $registerStmt = $conn->prepare($SQL);

        //bind the variables
        $registerStmt->bindParam('s', $lecturer_name, PDO::PARAM_STR);

        $registerStmt->execute(['lecturer_name' => $lecturer_name]);

        echo '<script>window.alert("Lecturer Registered Successfully")</script>';
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Create New Lecturer || Admin Panel</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.png" />
        <script data-search-pseudo-elements defer src="js/all.min.js"></script>
        <script src="js/feather.min.js"></script>
    </head>
    <body class="nav-fixed">
        <nav class="topnav navbar navbar-expand shadow navbar-light bg-white" id="sidenavAccordion">
            <a class="navbar-brand d-none d-sm-block" href="index.html">Admin Panel</a><button class="btn btn-icon btn-transparent-dark order-1 order-lg-0 mr-lg-2" id="sidebarToggle" href="#"><i data-feather="menu"></i></button>
            <ul class="navbar-nav align-items-center ml-auto">
                
                <!--User Registration + New Comment Notification-->
                <li class="nav-item dropdown no-caret mr-3 dropdown-notifications">
                    <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownAlerts" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i data-feather="bell"></i>
                        <span class="badge badge-red">1</span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownAlerts">
                        <h6 class="dropdown-header dropdown-notifications-header">
                            <i class="mr-2" data-feather="bell"></i>
                            Notification
                        </h6>

                        <a class="dropdown-item dropdown-notifications-item" href="#!">
                            <div class="dropdown-notifications-item-icon bg-warning"><i data-feather="activity"></i></div>
                            <div class="dropdown-notifications-item-content">

                                <div class="dropdown-notifications-item-content-details">
                                    June 29, 2021
                                </div>
                                <div class="dropdown-notifications-item-content-text">
                                    No Task Scheduled Yet. &apos; Kindly Add A Schedule
                                </div>
                            </div>
                        </a>

                        <a class="dropdown-item dropdown-notifications-footer" href="#">
                            View All Alerts
                        </a>
                    </div>
                </li>
                <!--User Registration + New Comment Notification-->

                <!--Message Notification-->
                
                <!--Message Notification-->

                <li class="nav-item dropdown no-caret mr-3 dropdown-user">
                    <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownUserImage" href="javascript:void(0);" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="img-fluid" src="./assets/img/user.png"/></a>
                    <div class="dropdown-menu dropdown-menu-right border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownUserImage">
                        <h6 class="dropdown-header d-flex align-items-center">
                            <img class="dropdown-user-img" src="./assets/img/user.png" alt="Photo" />
                            <div class="dropdown-user-details">
                                <div class="dropdown-user-details-name">
                                    Final Year Project
                                </div>
                                <div class="dropdown-user-details-email">
                                    kofi@pentvars.edu.gh
                                </div>
                            </div>
                        </h6>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="profile.php">
                            <div class="dropdown-item-icon">
                                <i data-feather="settings"></i>
                            </div>
                            Profile
                        </a>
                        <a class="dropdown-item" href="../index.php"
                            ><div class="dropdown-item-icon">
                                <i data-feather="log-out"></i>
                            </div>
                            Logout
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
        

        <!--Side Nav-->
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sidenav shadow-right sidenav-light">
                    <div class="sidenav-menu">
                        <div class="nav accordion" id="accordionSidenav">
                            <a class="nav-link collapsed pt-4" href="index.html">
                                <div class="nav-link-icon"><i data-feather="activity"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link collapsed" href="javascript:void(0);" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts"><div class="nav-link-icon"><i data-feather="layout"></i></div>
                                Lecturer
                                <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" data-parent="#accordionSidenav">
                                <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavLayout">
                                    <a class="nav-link" href="all-lecturers.php">All Lecturers</a>
                                    <a class="nav-link" href="new-lecturer.php">Add New Lecturer</a>
                                </nav>
                            </div>

                            <a class="nav-link collapsed" href="javascript:void(0);" data-toggle="collapse" data-target="#collapseFaculty" aria-expanded="false" aria-controls="collapseCourses"><div class="nav-link-icon"><i data-feather="layout"></i></div>
                                Faculty
                                <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseFaculty" data-parent="#accordionSidenav">
                                <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavLayout">
                                    <a class="nav-link" href="all-post.php">All Faculty</a>
                                    <a class="nav-link" href="add-new.php">Add New Faculty</a>
                                </nav>
                            </div>

                            <a class="nav-link collapsed" href="javascript:void(0);" data-toggle="collapse" data-target="#collapseCourses" aria-expanded="false" aria-controls="collapseCourses"><div class="nav-link-icon"><i data-feather="layout"></i></div>
                                Courses
                                <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseCourses" data-parent="#accordionSidenav">
                                <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavLayout">
                                    <a class="nav-link" href="all-post.php">All Courses</a>
                                    <a class="nav-link" href="add-new.php">Add New Courses</a>
                                </nav>
                            </div>

                            <a class="nav-link collapsed" href="javascript:void(0);" data-toggle="collapse" data-target="#collapseHalls" aria-expanded="false" aria-controls="collapseCourses"><div class="nav-link-icon"><i data-feather="layout"></i></div>
                                Halls
                                <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseHalls" data-parent="#accordionSidenav">
                                <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavLayout">
                                    <a class="nav-link" href="all-post.php">All Halls</a>
                                    <a class="nav-link" href="add-new.php">Add New Halls</a>
                                </nav>
                            </div>

                            <a class="nav-link" href="profile.php" ><div class="nav-link-icon"><i data-feather="user"></i></div>
                                Schedules
                            </a>


                            <a class="nav-link" href="profile.html" ><div class="nav-link-icon"><i data-feather="user"></i></div>
                                Profile
                            </a>
                        </div>
                    </div>

                    

                </nav>
            </div>


            <div id="layoutSidenav_content">
                <main>
                    <div class="page-header pb-10 page-header-dark bg-gradient-primary-to-secondary">
                        <div class="container-fluid">
                            <div class="page-header-content">
                                <h1 class="page-header-title">
                                    <div class="page-header-icon"><i data-feather="edit-3"></i></div>
                                    <span>Create New Lecturer</span>
                                </h1>
                            </div>
                        </div>
                    </div>

                    <!--Start Table-->
                    <div class="container-fluid mt-n10">
                        <div class="card mb-4">
                            <div class="card-header">Create New Lecturer</div>
                            <div class="card-body">
                                <form method="POST">
                                    <div class="form-group">
                                        <label for="user-name">Lecturer Name:</label>
                                        <input class="form-control" id="lecturer_name" name="lecturer_name" type="text" placeholder="Lecturer Name..." />
                                    </div>
                                    
                                    <button class="btn btn-primary " type="submit" name="submit">Create now!</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--End Table-->
                </main>

                <!--start footer-->
                <footer class="footer mt-auto footer-light">
                    <div class="container-fluid">
                        <div class="row">
                           
                        </div>
                    </div>
                </footer>
                <!--end footer-->
            </div>
        </div>

        <!--Script JS-->
        <script src="js/jquery-3.4.1.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>

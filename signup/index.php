<?php
    
    session_start();
    require_once('vendor/function.php');

    if (isset($_SESSION['logged_in'])) {
        header('location: ../admin/profile.php');

        die();
    }

    if (isset($_POST['register'])) {
        
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $father_name = $_POST['father_name'];
        $mother_name = $_POST['mother_name'];
        $guardian_name = $_POST['guardian_name'];
        $home_address = $_POST['home_address'];
        $email = $_POST['email'];
        $phone_number = $_POST['phone_number'];
        $password = $_POST['password'];
        $comfrim_password = $_POST['comfrim_password'];


        $error = array();

        if (empty($first_name)) {
            $error['frist_name'] = "Frist name field is empty.";
        }
        if (empty($last_name)) {
            $error['last_name'] = "Last name field is empty.";
        }
        if (empty($father_name)) {
            $error['father_name'] = "This field is empty.";
        }
        if (empty($mother_name)) {
            $error['mother_name'] = "This field is empty.";
        }
        if (empty($guardian_name)) {
            $error['guardian_name'] = "This field is empty.";
        }
        if (empty($home_address)) {
            $error['home_address'] = "This field is empty.";
        }
        if (empty($phone_number)) {
            $error['phone_number'] = "This field is empty.";
        }
        if (empty($email)) {
            $error['email'] = "email field is empty";
        }
        elseif (email_exists()) {
           $error['email'] = "email already exists in database. Please try again email.";
        }

        if (empty($password)) {
            $error['password'] = "This field is empty.";
        }
        elseif (strlen($password) <= 8) {
            $error['password'] = "password must be 8 (eight) characters.";
        }

        if (empty($comfrim_password)) {
            $error['comfrim_password'] = "This field is empty.";
        }
        elseif (!($password == $comfrim_password)) {
            $error['comfrim_password'] = "Comfrim password doesn't match.";
        }


        if (count($error) == 0) {
            $insert_data = "INSERT INTO users (frist_name, last_name, father_name, mother_name, guardian_name, home_address, phone_number, email, password ) VALUES ('$first_name', '$last_name', '$father_name', '$mother_name', '$guardian_name', '$home_address','$phone_number', '$email', '$password')";
            $insert = mysqli_query($base_connect, $insert_data);


        }
       
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Register Form</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
</head>
<style>
    .error {
        color: red;
        font-style: italic;
    }
    .success {
        color: green;
        font-style: italic;
    }
    span {
      font-size: 10px;
      color: red;
    }
</style>
<body>
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title">Registration Form</h2>
                    <form method="POST">
                        <div class="row row-space">

                            <!-- first name field -->
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">first name</label>
                                    <span>(required)</span><br>
                                    <input class="input--style-4" type="text" name="first_name">
                                    <br>
                                    <div class="error">
                                        <?php

                                            if (isset($error['frist_name'])) {
                                                echo $error['frist_name'];
                                            }

                                        ?>
                                    </div>  
                                </div>
                            </div>

                            <!-- last name field -->
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">last name</label>
                                    <span>(required)</span>
                                    <input class="input--style-4" type="text" name="last_name">
                                    <br>
                                    <div class="error">
                                        <?php

                                            if (isset($error['last_name'])) {
                                                echo $error['last_name'];
                                            }

                                        ?>
                                    </div>  
                                </div>
                            </div>

                            <!-- father name field -->
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Father's Name</label>
                                    <span>(required)</span>
                                    <input class="input--style-4" type="text" name="father_name">
                                    <br>
                                    <div class="error">
                                        <?php

                                            if (isset($error['father_name'])) {
                                                echo $error['father_name'];
                                            }

                                        ?>
                                    </div>  
                                </div>
                            </div>

                            <!-- mother name field -->
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Mother's Name</label>
                                    <span>(required)</span>
                                    <input class="input--style-4" type="text" name="mother_name">
                                    <br>
                                    <div class="error">
                                        <?php

                                            if (isset($error['mother_name'])) {
                                                echo $error['mother_name'];
                                            }

                                        ?>
                                    </div>  
                                </div>
                            </div> 

                            <!-- guardian name field -->
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Guardian Name</label>
                                    <span>(required)</span>
                                    <input class="input--style-4" type="text" name="guardian_name"> <br>
                                    <div class="error">
                                        <?php

                                            if (isset($error['guardian_name'])) {
                                                echo $error['guardian_name'];
                                            }

                                        ?>
                                    </div>  
                                </div>
                            </div>

                            <!-- Home address -->
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Home Address</label>
                                    <span>(required)</span>
                                    <input class="input--style-4" type="text" name="home_address">
                                    <br>
                                    <div class="error">
                                        <?php

                                            if (isset($error['home_address'])) {
                                                echo $error['home_address'];
                                            }

                                        ?>
                                    </div>  
                                </div>
                            </div>

                            <!-- phone number field -->
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Phone Number</label>
                                    <span>(required)</span>
                                    <input class="input--style-4" type="text" name="phone_number">                                    <br>
                                    <div class="error">
                                        <?php

                                            if (isset($error['phone_number'])) {
                                                echo $error['phone_number'];
                                            }

                                        ?>
                                    </div>  
                                </div>
                            </div>

                            <!-- email field -->
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Email</label>
                                    <span>(required)</span>
                                    <input class="input--style-4" type="email" name="email">
                                    <br>
                                    <div class="error">
                                        <?php

                                            if (isset($error['email'])) {
                                                echo $error['email'];
                                            }

                                        ?>
                                    </div>  
                                </div>
                            </div>

                            <!-- password field -->
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Password</label>
                                    <span>(required)</span>
                                    <input class="input--style-4" type="password" name="password">
                                     <br>
                                    <div class="error">
                                        <?php

                                            if (isset($error['password'])) {
                                                echo $error['password'];
                                            }

                                        ?>
                                    </div>  
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Comfrim Password</label>
                                    <span>(required)</span>
                                    <input class="input--style-4" type="password" name="comfrim_password">
                                    <br>
                                    <div class="error">
                                        <?php

                                            if (isset($error['comfrim_password'])) {
                                                echo $error['comfrim_password'];
                                            }

                                        ?>
                                    </div>  
                                </div>
                            </div>
                        </div>


                       


                       <!--  <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Birthday</label>
                                    <div class="input-group-icon">
                                        <input class="input--style-4 js-datepicker" type="text" name="birthday">
                                        <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Gender</label>
                                    <div class="p-t-10">
                                        <label class="radio-container m-r-45">Male
                                            <input type="radio" checked="checked" name="gender">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-container">Female
                                            <input type="radio" name="gender">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Email</label>
                                    <input class="input--style-4" type="email" name="email">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Phone Number</label>
                                    <input class="input--style-4" type="text" name="phone">
                                </div>
                            </div>
                        </div>
                        <div class="input-group">
                            <label class="label">Subject</label>
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="subject">
                                    <option disabled="disabled" selected="selected">Choose option</option>
                                    <option>Subject 1</option>
                                    <option>Subject 2</option>
                                    <option>Subject 3</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div> -->
                        <div class="p-t-15">
                            <button class="btn btn--radius-2 btn--blue" type="submit" name = "register">register</button>
                        </div>
                    </form>
                        <br>
                    <div class="success">
                        <?php

                            if (isset($insert)) {
                                echo "Your information has been submit successfully.";
                            }

                        ?>
                    </div>  

                    <br><br>
                    <p> Already have an account? Please <a href="../index.php">Log In</a></p>
                </div>

            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->
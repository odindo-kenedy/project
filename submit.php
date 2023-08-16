<?php ob_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="assets/css/style.css">
<title>submit </title>
<link rel="stylesheet" href="./assets/css/style.css">
</head>
<body class="body">
    <div class="navigation">
        <ul>
            <a href="./index.html"><li>Home</li></a>
            <a href="./index.html"><li>login</li></a>
            <a href="./signup.html"><li>sign up</li></a>
        </ul>
    </div>
    <div>
        <h1 style="text-align: center;">Data Submission</h1>
        <?php
        include_once "./include/db.php";
        include_once "./include/functions.php";//to use the redirect_to function which I defined
        include_once "./include/session.php";
        include_once "./include/datetime.php";
        global $conn;
        global $DateTime;
        if(isset($_POST['login'])){
            $username = $_POST['username'];
            $password = $_POST['password'];
            
            $query = "SELECT * FROM students WHERE student_id='${username}'";
            $execute = mysqli_query($conn, $query);
            while($DataRows = mysqli_fetch_array($execute)){
                $Id =$DataRows['id'];
                $DateTime1 = $DataRows['datetime'];
                $firstname = $DataRows['first_name'];
                $lastname = $DataRows['last_name'];
                $studentid = $DataRows['student_id'];
                $upassword = $DataRows['password'];
                $balance = $DataRows['balance'];
                $user = $DataRows['user'];
            }
            if(empty($studentid)){
                $_SESSION["ErrorMessage"]="user doesn't exist create account in the signup form!";
                echo Message();
                
            }
            elseif($password == $upassword){

                
                $_SESSION["SuccessMessage"]="login success";
                echo SuccessMessage();
                
                //to redirect user to the dashboard/ adminpage based on the user value 0 for normal 1 for admin
                if($user == 1){
                    
                     
                    redirect_to("./admin.php?userid=${Id}");
                }else{
                    redirect_to("./dashboard.php?userid=${Id}");
                }
            
            }else{
                $_SESSION["ErrorMessage"]="incorrect password, if password is forgotten press";
                echo Message();
                echo "<a href='./forgot.html'>forgot password </a>";
            }
        
        }
        elseif (isset($_POST['forgot'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $query = "UPDATE students SET password='${password}',datetime='${DateTime}' WHERE student_id ='${username}'";
            $execute = mysqli_query($conn, $query);
            
            $_SESSION["SuccessMessage"]="password reset successful";
            echo SuccessMessage();
            echo "new password ${password}";

        }
        elseif (isset($_POST['signup'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $firstname = $_POST['fname'];
            $lastname = $_POST['lname'];
            $course = $_POST['course'];
            $query = "insert into students(first_name,last_name,student_id,password, course,datetime)value('${firstname}', '${lastname}','${username}','${password}','${course}','${DateTime}')";
            $execute = mysqli_query($conn, $query);
            
            $_SESSION["SuccessMessage"]="account created successfuly";
            
            echo SuccessMessage();
            
            echo "student ID <b>:${username} </b><br>";
            echo "firstname: <b>${firstname} </b><br>";
            echo "lastname: <b>${lastname} </b><br>";

            echo "registered course : ${course} <br>";
        }
        ?>
    </div>


</body>
</html>
<?php ob_end_flush();?>
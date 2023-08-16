<?php
ob_start();
include_once './include/db.php';
include_once './include/session.php';
include_once './include/functions.php';
include_once './include/datetime.php';
//incase someone tries to access the admin page without login in
if(empty($_GET['userid'])){
    redirect_to("./index.html");
}

if (isset($_GET['userid'])) {
    $userid = $_GET['userid'];
    global $conn;
    $query = "select * from students where id='${userid}'";
    $data = mysqli_query($conn, $query);
    while ($DataRows = mysqli_fetch_array($data)) {
        $Id = $DataRows['id'];
        $DateTime1 = $DataRows['datetime'];
        $firstname = $DataRows['first_name'];
        $lastname = $DataRows['last_name'];
        $studentid = $DataRows['student_id'];
        $upassword = $DataRows['password'];
        $balance = $DataRows['balance'];
        $course = $DataRows['course'];
        $semester = $DataRows['semester'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<title>dashboard</title>
<style>
     body {
        background-color: rgb(36, 104, 104);
     }.footer{
        columns: 2;
     }
     hr{
        background:yellow;
     }a{
        color: blueviolet;
     }
     a:hover{
        color: rgb(141, 212, 7);
     }
            
</style>
</head>
<body>
    <div class="container text-light">
        <div class="row">
        <div class="navigation bg-white navbar navbar-expand-sm position-fixed" style="width: 100%;z-index:999;">
                <ul class="nav ">
                    
                    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#top-nav" aria-controls="collapsibleNavId"
                        aria-expanded="false" aria-label="Toggle navigation"><i style="color:blue;" class="fa fa-arrow-down" aria-hidden="true"></i></button>
                        <a href="#"  class="navbar-brand">Kisumu poly</a>
                    <div class="collapse navbar-collapse" id="top-nav">
                        <li class="nav-link"><a href="./dashboard.php"><i class="fa fa-home" aria-hidden="true"></i>home</a></li>
                        <li class="nav-link"><a href="./index.html"><i class="fas fa-door-open    "></i> logout</a></li>
                        <li class="nav-link"><a href="#abtus"><i class="fa fa-book" aria-hidden="true"></i>about us</a></li>
                    </div>
                </ul>
            </div>
        <div class="row" style="margin-top:70px;">
            <div class="main col-sm-10">
                
                <h1>Student Dashboard</h1>
                <hr>
                
                <p>name:<b> <?php echo "${firstname}  ${lastname}"; ?></b></p>
                <p>course:<b> <?php echo $course;?></b></p>
                <p>student_id:<b><?php echo $studentid;?></b></p>
                <p>balance:<b> <?php echo'Kshs. ', $balance; ?></b></p>
                <hr>
                <h2>Grade</h2>
                <table border="1">
                    <tr>
                        <th>unit name</th>
                        <th>grade</th>
                        <th>pass/fail</th>
                        <th>semester</th>
                    </tr><?php
                    $query = "select * from course where student_id='${studentid}'";
                    $data1 = mysqli_query($conn, $query);
                    
                    while ($DataRows = mysqli_fetch_array($data1)) {
                        $Id = $DataRows['id'];
                        $unit = $DataRows['unit'];
                        $grade = $DataRows['grade'];
                        $studentid1 = $DataRows['student_id'];
                        $DateTime1 = $DataRows['datetime'];
                        
        
                        ?>
                    <tr>
                        <td><?php echo $unit;?></td>
                        <td><?php echo $grade?></td>
                        <td><?php if ($grade >= 70) {
                        echo "distinction";
                        }elseif($grade >= 50) {
                        echo "pass";
                    } else {
                        echo "fail";
                    }?></td>
                        <td><?php echo $semester;?></td>
                    </tr>
                    <?php }?>
                    
                </table>
                <hr>
                <h2>Edit your details</h2>
                <div>
                    <?php
                    if(isset($_POST['edit'])){
                        $firstname =$_POST['fname'];
                        $lastname =$_POST['lname'];
                        $course= $_POST['course'];
                        $stage = $_POST['stage'];
        
                        $query = "UPDATE `students` SET `first_name` = '${firstname}', `last_name` = '${lastname}', `course` = '${course}', `semester` = '${stage}', `datetime` = '${DateTime}' where id='${userid}'";
                        $execute = mysqli_query($conn, $query);
                        $_SESSION["SuccessMessage"]="data edited successfully";
                        echo SuccessMessage();
                    }
                    ?>
                    <form action="#" method="post">
                        <label for="fname">firstName</label>
                        <input  type="text" class="form-control" name="fname" id="fname" value="<?php echo $firstname;?>">
                        <label for="lname">lastname</label>
                        <input  type="text" class="form-control" name="lname" id="lname" value="<?php echo $lastname;?>">
                        <label for="course">course</label>
                        <input  type="text" class="form-control" name="course" id="course" value="<?php echo $course;?>">
                        <label for="stage">Stage</label>
                        <select name="stage" id="stage"  class="form-control">
                            <option value="Y1S1">Y1S1</option>
                            <option value="Y1S2">Y1S2</option>
                            <option value="Y2S2">Y2S1</option>
                            <option value="Y2S2">Y2S2</option>
        
                        </select>
                       
        
                        
                        <input type="submit" name="edit" value="edit" class="btn">
                    </form>
                </div>
                <br>
                
            </div>
            <div class="row">
            <div class="footer bg-dark text-light text-left col-sm-12" style="width: 100%;" >
                    <h2 id="aboutus">About us</h2>
                    <p>Access college offers the best courses in eastern and central Africa, since 1970</p>
                    <h2 id="contactus">contact us</h2>
                    <p>for further information you can reach us through 
                        Email:accesscollege@gmail.com
                        tel:+254712345678
                        we are located in kisumu , near moi stadium
                    </p>
        
                </div><hr><br>
            </div>
        </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>
<?php ob_end_flush();?>
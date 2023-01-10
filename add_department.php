<!DOCTYPE html>
<html lang="en">

<?php
//including the database connection file
include_once("config.php");

if (isset($_POST['Submit'])) {
    $dept_id = mysqli_real_escape_string($mysqli, $_POST['dept_id']);
    $dept_tname = mysqli_real_escape_string($mysqli, $_POST['dept_tname']);
    $dept_status = mysqli_real_escape_string($mysqli, $_POST['dept_status']);
    $dept_blind = mysqli_real_escape_string($mysqli, $_POST['dept_blind']);
    $subject_id = mysqli_real_escape_string($mysqli, $_POST['subject_id']);


    //Insert data to Department	
    $result = mysqli_query($mysqli, "INSERT INTO department(dept_id,dept_tname,dept_status,dept_blind) 
            VALUES('$dept_id','$dept_tname','$dept_status','$dept_blind')");
    $result2 = mysqli_query($mysqli, "INSERT INTO department_subject(dept_id,subject_id) 
        VALUES('$dept_id','$subject_id')");
    $result3 = mysqli_query($mysqli, "  INSERT INTO department_subject(dept_id,subject_id) 
    VALUES('$dept_id','$subject_id')");

    header("Location: info_department.php");
}

?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
    <title>เพิ่มบัญชีผู้ใช้</title>
</head>

<body class="container">
    <div>
        <img src="https://www.engineer.rmutt.ac.th/wp-content/uploads/2022/02/heading-1.jpg" alt="head_logo" class="rounded mx-auto d-block">
        <div class="topnav container">
            <ul>
                <a href="homepage.php">หน้าหลัก</a>
                <a href="info.php">ข้อมูลนักศึกษา</a>
                <a href="add.php">เพิ่มบัญชีผู้ใช้งาน</a>
                <a href="info_select.php " class="active nav-link dropdown-toggle" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">ข้อมูลการเลือกสาขา</a>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                    <li><a class="dropdown-item" href="info_select.php">ข้อมูลการเลือกสาขา</a></li>
                    <li><a class="dropdown-item" href="info_department.php">ข้อมูลสาขาวิชาต่างๆ</a></li>
                </ul>
                <a href="info_gread.php">ข้อมูลผลการเรียน</a>
                <a href="login.php">ออกจากระบบ</a>
            </ul>
        </div>
    </div>
    <br>
    <!-- form เดี๋ยวลืม DIV -->
    <form action="add_department.php" method="post" name="form1" class="container-sm box"><br>
        <img src="https://cdn-icons-png.flaticon.com/512/1089/1089305.png " alt="" width="200" class="center"><br><br>
        <div class="c">
            <h3>เพิ่มบัญชีข้อมูลนักศึกษาคณะวิศวกรรมศาสตร์ชั้นปีที่ 1</h3><br>
        </div>
        <div class="row">
            <div class="col">
                <label for="dept_id" class="center">รหัสสาขาวิชา</label>
                <input type="text" name="dept_id" id="dept_id"> <br><br>
            </div>
            <div class="col">
                <label for="dept_tname" class="center">ชื่อสาขาวิชา</label>
                <input type="text" name="dept_tname" id="dept_tname"> <br><br>
            </div>
            <div class="col">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="dept_status" class="center">สถานะสาขาวิชา</label>
                <select name="dept_status" id="dept_status">
                    <option value="เปิด">เปิด</option>
                    <option value="ปิด">ปิด</option>
                </select>
                <br><br>
            </div>
            <div class="col">
                <label for="dept_blind" class="center">อ้างอิงกับผลการทดสอบอาการตาบอดสี</label>
                <select name="dept_blind" id="dept_blind">
                    <option value="จำเป็น">จำเป็น</option>
                    <option value="ไม่จำเป็น">ไม่จำเป็น</option>
                </select>
            </div>
            <div class="col">
            </div>
            <div class="row">
                <div class="col">
                    <label for="subject_id" class="center">เพิ่มวิชาเงื่อนไขสำหรับการเลือกสาขา</label>
                    <select name="subject_id" id="subject_id">
                        <option value="00100101"></option>
                        <option value="00100101">00100101</option>
                        <option value="01110004">01110004</option>
                        <option value="01210020">01210020</option>
                        <option value="01610014">01610014</option>
                        <option value="04313101">04313101</option>
                        <option value="04411101">04411101</option>
                        <option value="04411102">04411102</option>
                        <option value="04621101">04621101</option>
                        <option value="04711101">04711101</option>
                        <option value="04720101">04720101</option>
                        <option value="09111141">09111141</option>
                        <option value="09111142">09111142</option>
                        <option value="09410142">09410142</option>
                        <option value="09410143">09410143</option>
                        <option value="09410144">09410144</option>
                    </select>
                </div>
                <div class="col">
                </div>
            </div>
        </div>
        <input type="submit" name="Submit" value="เพิ่มสาขา" class="button_log rounded mx-auto d-block">
        <br><br>
    </form>
    <!-- start Bootstrp -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <!-- start PHP -->

</body>

</html>
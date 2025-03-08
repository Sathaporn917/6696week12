<!DOCTYPE html>
<html lang="en">
<?php
//เชื่อมต่อฐานข้อมูล
include("conn.php");
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- เพิ่ม ส่วน Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <!-- เพิ่มฟอนต์ -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: "Kanit", sans-serif;
            background-color: #f8f9fa;
        }
        
        .container {
            margin-top: 50px;
        }
        
        .card {
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        
        .card-header {
            background-color: #0d6efd;
            color: white;
            border-radius: 10px 10px 0 0 !important;
            padding: 15px;
        }
        
        .alert {
            border-radius: 8px;
        }
        
        .footer {
            margin-top: 30px;
            padding: 15px;
            text-align: center;
            color: #6c757d;
            font-size: 14px;
        }
    </style>

    <title>แก้ไขข้อมูล</title>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">
                        <h1 class="mb-0"><i class="bi bi-pencil-square me-2"></i>แก้ไขข้อมูลพนักงาน</h1>
                    </div>
                    <div class="card-body p-4">
                        <?php
                        //เริ่มเก็บข้อมูล
                        $employee_id = $_POST['employee_id'];
                        $first_name = $_POST['first_name'];
                        $last_name = $_POST['last_name'];
                        $department = $_POST['department'];
                        $gender = $_POST['gender'];
                        $age = $_POST['age'];
                        $salary = $_POST['salary'];

                        //เขียนคำสั่ง SQL
                        $sql = "UPDATE employees SET first_name='$first_name',last_name='$last_name',department='$department',gender='$gender',age='$age',salary='$salary' WHERE employee_id=$employee_id";

                        // รับคำสั่ง sql
                        if ($conn->query($sql) === TRUE) {
                            echo '<div class="alert alert-success text-center">
                                <i class="bi bi-check-circle-fill me-2"></i>ยินดีด้วยครับคุณได้ทำการแก้ไขข้อมูลเรียบร้อย !!!
                            </div>';
                            
                            echo '<div class="text-center mt-4">
                                <a href="show.php" class="btn btn-primary">
                                    <i class="bi bi-arrow-left me-2"></i>กลับหน้าแสดงข้อมูล
                                </a>
                            </div>';
                        } else {
                            echo '<div class="alert alert-danger text-center">
                                <i class="bi bi-exclamation-triangle-fill me-2"></i>มีข้อผิดพลาด: ' . $sql . '<br>' . $conn->error . '
                            </div>';
                        }
                        // ปิดการเชื่อมต่อ
                        $conn->close();
                        ?>
                    </div>
                </div>
                
                <div class="footer">
                    <p>พัฒนาโดย 664485025 นายสถาพร ทิพย์ไปรยา หมู่เรียน 66/96</p>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
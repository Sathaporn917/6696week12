<!DOCTYPE html>
<html lang="th">
<?php
//เชื่อมต่อฐานข้อมูล
include("conn.php");
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <!-- Font Kanit -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@200;300;400;500;600&display=swap" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <!-- Custom CSS -->
    <style>
        body {
            font-family: "Kanit", sans-serif;
            background-color: #f8f9fa;
            padding: 40px 0;
        }
        
        .main-container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-bottom: 20px;
        }
        
        .page-title {
            color: #0d6efd;
            text-align: center;
            margin-bottom: 30px;
            font-weight: 500;
        }
        
        .form-label {
            font-weight: 500;
        }
        
        .button-group {
            text-align: center;
            margin-top: 30px;
        }
        
        .action-button {
            min-width: 140px;
            margin: 0 10px;
        }
        
        .footer {
            text-align: center;
            margin-top: 20px;
            color: #6c757d;
            font-size: 0.9rem;
        }
    </style>
    
    <title>แก้ไขข้อมูลพนักงาน</title>
</head>

<body>
    <?php
    if(isset($_GET['action_even'])=='edit'){
        $employee_id=$_GET['employee_id'];
        $sql="SELECT * FROM employees WHERE employee_id=$employee_id";
        $result=$conn->query($sql);
        if($result->num_rows>0){
            $row=$result->fetch_assoc();
        }else{
            echo"<div class='alert alert-danger text-center' role='alert'>ไม่พบข้อมูลที่ต้องการแก้ไข กรุณาตรวจสอบ</div>";
        }
        //$conn->close();
    }
    ?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">
                <div class="main-container">
                    <h1 class="page-title">
                        <i class="bi bi-pencil-square me-2"></i>แก้ไขข้อมูลพนักงาน
                    </h1>
                    
                    <form action="edit_1.php" method="POST">
                        <input type="hidden" name="employee_id" value="<?php echo $row['employee_id']; ?>">
                        
                        <div class="row mb-4">
                            <label class="col-md-3 col-form-label">รหัสพนักงาน</label>
                            <div class="col-md-9">
                                <div class="form-control-plaintext"><?php echo $row['employee_id']; ?></div>
                            </div>
                        </div>
                        
                        <div class="row mb-4">
                            <label class="col-md-3 col-form-label">ชื่อ</label>
                            <div class="col-md-9">
                                <input type="text" name="first_name" class="form-control" maxlength="50" value="<?php echo $row['first_name']; ?>" required>
                            </div>
                        </div>
                        
                        <div class="row mb-4">
                            <label class="col-md-3 col-form-label">นามสกุล</label>
                            <div class="col-md-9">
                                <input type="text" name="last_name" class="form-control" maxlength="50" value="<?php echo $row['last_name']; ?>" required>
                            </div>
                        </div>
                        
                        <div class="row mb-4">
                            <label class="col-md-3 col-form-label">แผนก</label>
                            <div class="col-md-9">
                                <select name="department" class="form-select">
                                    <option disabled>กรุณาระบุแผนก</option>
                                    <option value="ฝ่ายไอที" <?php if ($row['department']=='ฝ่ายไอที'){ echo "selected";} ?>>ฝ่ายไอที</option>
                                    <option value="ฝ่ายบุคคล" <?php if ($row['department']=='ฝ่ายบุคคล'){ echo "selected";} ?>>ฝ่ายบุคคล</option>
                                    <option value="ฝ่ายการตลาด" <?php if ($row['department']=='ฝ่ายการตลาด'){ echo "selected";} ?>>ฝ่ายการตลาด</option>
                                    <option value="ฝ่ายบัญชี" <?php if ($row['department']=='ฝ่ายบัญชี'){ echo "selected";} ?>>ฝ่ายบัญชี</option>
                                    <option value="ฝ่ายผลิต" <?php if ($row['department']=='ฝ่ายผลิต'){ echo "selected";} ?>>ฝ่ายผลิต</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="row mb-4">
                            <label class="col-md-3 col-form-label">เพศ</label>
                            <div class="col-md-9">
                                <select name="gender" class="form-select">
                                    <option disabled>กรุณาระบุเพศ</option>
                                    <option value="ชาย" <?php if ($row['gender']=='ชาย'){ echo "selected";} ?>>เพศชาย</option>
                                    <option value="หญิง" <?php if ($row['gender']=='หญิง'){ echo "selected";} ?>>เพศหญิง</option>
                                    <option value="อื่นๆ" <?php if ($row['gender']=='อื่นๆ'){ echo "selected";} ?>>LGBTQ+</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="row mb-4">
                            <label class="col-md-3 col-form-label">อายุ</label>
                            <div class="col-md-9">
                                <input type="number" name="age" class="form-control" value="<?php echo $row['age']; ?>" required>
                            </div>
                        </div>
                        
                        <div class="row mb-4">
                            <label class="col-md-3 col-form-label">เงินเดือน</label>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <span class="input-group-text">฿</span>
                                    <input type="text" name="salary" class="form-control" value="<?php echo $row['salary']; ?>" required>
                                </div>
                            </div>
                        </div>
                        
                        <div class="button-group">
                            <button type="submit" class="btn btn-primary action-button">
                                <i class="bi bi-save me-2"></i>บันทึกข้อมูล
                            </button>
                            <button type="reset" class="btn btn-outline-danger action-button">
                                <i class="bi bi-x-circle me-2"></i>ยกเลิก
                            </button>
                        </div>
                    </form>
                </div>
                
                <div class="footer">
                    <p>พัฒนาโดย 664485025 นายสถาพร ทิพย์ไปรยา</p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
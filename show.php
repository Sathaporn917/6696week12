<?php
include("conn.php");
//session_start(); //เริ่มใช้งานตัวเเปร session
include("clogin.php");
?>

<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ข้อมูลพนักงาน</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@200;300;400;500;600&display=swap" rel="stylesheet">
    
    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Kanit', sans-serif;
            background-color: #f8f9fa;
            padding-top: 2rem;
            padding-bottom: 2rem;
        }
        
        .page-header {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
            padding: 1.5rem;
            margin-bottom: 2rem;
            text-align: center;
        }
        
        .page-title {
            color: #0d6efd;
            font-weight: 500;
            margin-bottom: 0.5rem;
        }
        
        .user-info {
            color: #6c757d;
            font-size: 1.1rem;
            margin-bottom: 0;
        }
        
        .data-card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
            padding: 1.5rem;
            margin-bottom: 2rem;
        }
        
        .action-buttons .btn {
            margin: 0.2rem;
        }
        
        .btn-delete {
            background-color: #dc3545;
            border-color: #dc3545;
        }
        
        .btn-edit {
            background-color: #0d6efd;
            border-color: #0d6efd;
        }
        
        .btn-add {
            background-color: #198754;
            border-color: #198754;
            margin-bottom: 1rem;
        }
        
        .footer {
            text-align: center;
            color: #6c757d;
            font-size: 1rem;
            margin-top: 2rem;
        }
        
        .alert {
            text-align: center;
            margin-bottom: 2rem;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php
        if (isset($_GET['action_even']) == 'delete') {
            $employee_id = $_GET['employee_id'];
            $sql = "SELECT * FROM employees WHERE employee_id=$employee_id";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                // sql to delete a record
                $sql = "DELETE FROM employees WHERE employee_id=$employee_id";

                if ($conn->query($sql) === TRUE) {
                    echo "<div class='alert alert-success'><i class='bi bi-check-circle-fill me-2'></i>ลบข้อมูลสำเร็จ</div>";
                } else {
                    echo "<div class='alert alert-danger'><i class='bi bi-exclamation-triangle-fill me-2'></i>ลบข้อมูลมีข้อผิดพลาด กรุณาตรวจสอบ !!! " . $conn->error . "</div>";
                }
            } else {
                echo "<div class='alert alert-warning'><i class='bi bi-exclamation-circle-fill me-2'></i>ไม่พบข้อมูล กรุณาตรวจสอบ</div>";
            }
        }
        ?>

        <div class="page-header">
            <h1 class="page-title">ข้อมูลพนักงาน</h1>
            <p class="user-info">ผู้เข้าสู่ระบบ: <strong><?php echo $_SESSION["u_name"]; ?></strong> | หน่วยงาน: <strong><?php echo $_SESSION["u_department"]; ?></strong></p>
        </div>

        <div class="data-card">
            <!-- เพิ่มปุ่มเชื่อมไปที่หน้า add.php -->
            <a href="add.php" class="btn btn-add">
                <i class="bi bi-person-plus-fill me-2"></i>เพิ่มข้อมูลพนักงาน
            </a>
            
            <div class="table-responsive">
                <table id="example" class="table table-striped table-hover" style="width:100%">
                    <thead class="table-primary">
                        <tr>
                            <th class="text-center">รหัส</th>
                            <th>ชื่อพนักงาน</th>
                            <th>นามสกุล</th>
                            <th>ตำแหน่ง</th>
                            <th class="text-center">เพศ</th>
                            <th class="text-center">อายุ</th>
                            <th class="text-end">เงินเดือน</th>
                            <th class="text-center">จัดการข้อมูล</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM employees";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // output data of each row
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td class='text-center'>" . $row["employee_id"] . "</td>";
                                echo "<td>" . $row["first_name"] . "</td>";
                                echo "<td>" . $row["last_name"] . "</td>";
                                echo "<td>" . $row["department"] . "</td>";
                                echo "<td class='text-center'>" . $row["gender"] . "</td>";
                                echo "<td class='text-center'>" . $row["age"] . "</td>";
                                echo "<td class='text-end'>" . number_format($row["salary"], 2) . "</td>";

                                echo '<td class="text-center action-buttons">
                                        <a href="edit.php?action_even=edit&employee_id=' . $row['employee_id'] . '" 
                                            title="แก้ไขข้อมูล" 
                                            onclick="return confirm(\'ต้องการจะแก้ไขข้อมูลรายชื่อ ' . $row['employee_id'] . ' ' . $row['first_name'] . ' ' . $row['last_name'] . '?\')" 
                                            class="btn btn-edit btn-sm">
                                            <i class="bi bi-pencil-square me-1"></i>แก้ไข
                                        </a>
                                        <a href="show.php?action_even=del&employee_id=' . $row['employee_id'] . '" 
                                            title="ลบข้อมูล" 
                                            onclick="return confirm(\'ต้องการจะลบข้อมูลรายชื่อ ' . $row['employee_id'] . ' ' . $row['first_name'] . ' ' . $row['last_name'] . '?\')" 
                                            class="btn btn-delete btn-sm">
                                            <i class="bi bi-trash me-1"></i>ลบ
                                        </a>
                                    </td>';
                                echo "</tr>";
                            }
                        } else {
                            echo '<tr><td colspan="8" class="text-center">ไม่พบข้อมูล</td></tr>';
                        }
                        $conn->close();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="footer">
            <p>พัฒนาโดย 664485025 นายสถาพร ทิพย์ไปรยา</p>
        </div>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/th.json',
                },
                responsive: true
            });
        });
    </script>
</body>
</html>
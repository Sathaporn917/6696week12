<!DOCTYPE html>
<html lang="th">

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
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        
        .error-container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 40px;
            text-align: center;
            width: 100%;
            max-width: 500px;
        }
        
        .error-icon {
            color: #dc3545;
            font-size: 4rem;
            margin-bottom: 20px;
        }
        
        .error-title {
            color: #dc3545;
            font-weight: 500;
            margin-bottom: 15px;
        }
        
        .error-message {
            color: #6c757d;
            margin-bottom: 30px;
        }
        
        .back-button {
            padding: 10px 30px;
            font-size: 1.1rem;
        }
        
        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 0.9rem;
            color: #6c757d;
        }
    </style>
    
    <title>ตรวจสอบ login</title>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="error-container">
                    <div class="error-icon">
                        <i class="bi bi-exclamation-circle-fill"></i>
                    </div>
                    
                    <h1 class="error-title">เข้าสู่ระบบผิดพลาด</h1>
                    
                    <p class="error-message">กรุณาตรวจสอบชื่อผู้ใช้และรหัสผ่านของคุณอีกครั้ง</p>
                    
                    <a href="index.html" class="btn btn-primary back-button">
                        <i class="bi bi-arrow-left me-2"></i>กลับสู่หน้าเข้าสู่ระบบ
                    </a>
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
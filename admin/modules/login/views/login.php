<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=$this->session->userdata('name');?> Admin Panel <?=date("D d M Y")?></title>
    
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="<?=base_url()?>assets/images/logo/favicon.webp"/>
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Outfit', sans-serif;
            background: url('<?=base_url("assets/images/slider/gardenia_hero.png")?>') center center / cover no-repeat;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        /* Dark Overlay Theme Colors */
        body::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            z-index: 1;
        }

        .login-wrapper {
            position: relative;
            z-index: 2;
            width: 100%;
            max-width: 450px;
            padding: 20px;
        }

        .login-card {
            background: rgba(255, 255, 255, 0.96);
            border: 1px solid rgba(168, 138, 74, 0.3);
            border-radius: 24px;
            padding: 45px 35px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
            animation: slideUp 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        }

        @keyframes slideUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .logo-container {
            text-align: center;
            margin-bottom: 25px;
        }

        .logo-container img {
            max-height: 85px;
            width: auto;
            object-fit: contain;
            filter: drop-shadow(0 4px 6px rgba(0,0,0,0.1));
            transition: transform 0.3s ease;
        }
        
        .logo-container img:hover {
            transform: scale(1.04);
        }

        .welcome-text {
            text-align: center;
            color: #062315;
            margin-bottom: 30px;
        }

        .welcome-text h2 {
            font-size: 26px;
            font-weight: 700;
            margin-bottom: 6px;
            letter-spacing: -0.5px;
            color: #094B32;
        }

        .welcome-text p {
            color: #556b62;
            font-size: 14px;
            font-weight: 500;
        }

        .alert {
            border-radius: 12px;
            padding: 12px 16px;
            margin-bottom: 22px;
            font-size: 13px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 10px;
            border: 1px solid transparent;
        }

        .alert-danger {
            background: #fef2f2;
            color: #991b1b;
            border-color: #fecaca;
        }

        .alert-info {
            background: #f0fdf4;
            color: #166534;
            border-color: #bbf7d0;
        }

        .alert-warning {
            background: #fffbeb;
            color: #92400e;
            border-color: #fef3c7;
        }

        .form-group {
            margin-bottom: 20px;
            position: relative;
        }

        .form-group label {
            display: block;
            color: #26352F;
            font-size: 13px;
            font-weight: 700;
            margin-bottom: 8px;
            letter-spacing: 0.5px;
        }

        .input-wrapper {
            position: relative;
        }

        .input-wrapper i {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #094B32;
            font-size: 18px;
            transition: color 0.3s ease;
        }

        .form-control {
            width: 100%;
            background: #f8faf9;
            border: 1.5px solid #d2e0d7;
            border-radius: 12px;
            padding: 14px 15px 14px 45px;
            color: #111827;
            font-family: 'Outfit', sans-serif;
            font-size: 15px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .form-control::placeholder {
            color: #9ca3af;
        }

        .form-control:focus {
            outline: none;
            background: #ffffff;
            border-color: #094B32;
            box-shadow: 0 0 0 4px rgba(9, 75, 50, 0.15);
        }

        .form-control:focus + i {
            color: #A88A4A;
        }

        .btn-submit {
            width: 100%;
            background: linear-gradient(135deg, #094B32 0%, #062315 100%);
            color: white;
            border: none;
            border-radius: 12px;
            padding: 15px;
            font-family: 'Outfit', sans-serif;
            font-size: 15px;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 8px 20px rgba(9, 75, 50, 0.3);
            margin-top: 10px;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 25px rgba(168, 138, 74, 0.4);
            background: linear-gradient(135deg, #A88A4A 0%, #856a33 100%);
        }

        .btn-submit:active {
            transform: translateY(0);
        }

        .security-footer {
            margin-top: 25px;
            text-align: center;
            font-size: 12px;
            font-weight: 600;
            color: #556b62;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
        }

        .security-footer i {
            color: #094B32;
        }

        /* Loading state */
        .btn-submit.loading {
            pointer-events: none;
            opacity: 0.8;
            position: relative;
            color: transparent;
        }
        
        .btn-submit.loading::after {
            content: "";
            position: absolute;
            width: 20px;
            height: 20px;
            top: 0; left: 0; right: 0; bottom: 0;
            margin: auto;
            border: 3px solid transparent;
            border-top-color: #ffffff;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        @media (max-width: 480px) {
            .login-card {
                padding: 35px 22px;
            }
            .welcome-text h2 {
                font-size: 22px;
            }
        }
    </style>
</head>
<body>
    
    <div class="login-wrapper">
        <div class="login-card">
            
            <div class="logo-container">
                <img src="<?=base_url("assets/images/logo/logo.webp")?>" alt="The Gardenia Estate Admin Panel Logo" loading="lazy">
            </div>

            <div class="welcome-text">
                <h2>Welcome Back</h2>
                <p>Secure Admin Panel Access</p>
            </div>

            <form action="<?=site_url('login/check');?>" method="post" id="loginForm">
                
                <?php 
                $error = validation_errors();
                if(isset($msg)) {
                    echo '<div class="alert alert-danger"><i class="bi bi-exclamation-circle"></i> '.$msg.'</div>';
                } else if(!$error) {
                    echo '<div class="alert alert-info"><i class="bi bi-info-circle"></i> Please login to continue.</div>';
                } else { 
                    echo '<div class="alert alert-warning"><i class="bi bi-exclamation-triangle"></i> '.$error.'</div>';
                }
                ?>
            
                <div class="form-group">  
                    <label for="username">Username</label>  
                    <div class="input-wrapper">
                        <input type="text" class="form-control" name="user" id="username" autofocus value="<?=set_value('username');?>" placeholder="Enter your username" required/> 
                        <i class="bi bi-person"></i>
                    </div>  
                </div>  
                
                <div class="form-group">  
                    <label for="password">Password</label>  
                    <div class="input-wrapper">
                        <input type="password" class="form-control" name="pass" id="password" placeholder="Enter your password" required/> 
                        <i class="bi bi-lock"></i>
                    </div>  
                </div> 
                
                <button type="submit" class="btn-submit" id="submitBtn">Sign In</button>
                
            </form>

            <div class="security-footer">
                <i class="bi bi-shield-check"></i> 256-bit Encrypted Secure Connection
            </div>         
        </div>
    </div>

    <script>
        document.getElementById('loginForm').addEventListener('submit', function() {
            var btn = document.getElementById('submitBtn');
            btn.classList.add('loading');
        });
    </script>
</body>
</html>

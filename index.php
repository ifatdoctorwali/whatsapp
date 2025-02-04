<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WhatsApp Web</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
        }

        body {
            background-color: #111b21;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            background-color: #202c33;
            width: 100%;
            max-width: 400px;
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .logo-section {
            text-align: center;
            margin-bottom: 30px;
        }

        .logo {
            width: 90px;
            height: 90px;
            margin-bottom: 15px;
        }

        h1 {
            color: #e9edef;
            font-size: 24px;
            margin-bottom: 8px;
            font-weight: normal;
        }

        .subtitle {
            color: #8696a0;
            font-size: 14px;
            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        input {
            width: 100%;
            padding: 14px;
            background-color: #2a3942;
            border: 1px solid #374045;
            border-radius: 8px;
            color: #e9edef;
            font-size: 15px;
            transition: all 0.3s ease;
        }

        input::placeholder {
            color: #8696a0;
        }

        input:focus {
            outline: none;
            border-color: #00a884;
        }

        button {
            width: 100%;
            padding: 14px;
            background-color: #00a884;
            color: #e9edef;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            font-weight: 500;
        }

        button:hover {
            background-color: #008f72;
        }

        .links {
            margin-top: 20px;
            text-align: center;
            color: #8696a0;
        }

        .links a {
            color: #00a884;
            text-decoration: none;
            margin: 0 5px;
            transition: text-decoration 0.3s ease;
        }

        .links a:hover {
            text-decoration: underline;
        }

        .divider {
            border-top: 1px solid #374045;
            margin: 20px 0;
        }

        .error-msg {
            background-color: #392e2e;
            color: #ff7070;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 15px;
            display: none;
        }

        @media (max-width: 480px) {
            .container {
                margin: 20px;
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo-section">
            <img src="/api/placeholder/90/90" alt="WhatsApp Logo" class="logo">
            <h1>WhatsApp Web</h1>
            <p class="subtitle">Sign in to start chatting</p>
        </div>

        <div class="error-msg" id="errorMsg">
            Invalid username or password
        </div>

        <form action="login.php" method="POST">
            <div class="form-group">
                <input type="text" 
                       name="username" 
                       placeholder="Phone number or email" 
                       required 
                       autocomplete="username">
            </div>
            
            <div class="form-group">
                <input type="password" 
                       name="password" 
                       placeholder="Password" 
                       required 
                       autocomplete="current-password">
            </div>

            <button type="submit">Sign in</button>
        </form>

        <div class="divider"></div>

        <div class="links">
            <p>
                <a href="forgot-password.php">Forgot password?</a>
            </p>
            <p style="margin-top: 10px;">
                Don't have an account? <a href="register.php">Sign up</a>
            </p>
        </div>
    </div>
</body>
</html>

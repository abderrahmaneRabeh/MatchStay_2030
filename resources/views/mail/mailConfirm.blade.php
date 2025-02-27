<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>World Cup 2030 Morocco - Confirm Password Update</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Inter', sans-serif;
            background-color: #F9FAFB;
            color: #1F2937;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }

        .header {
            padding: 40px 0;
            background-color: #34D399;
            text-align: center;
            color: #ffffff;
        }

        .content {
            padding: 40px 30px;
            line-height: 1.6;
        }

        .footer {
            background-color: #F9FAFB;
            padding: 30px;
            text-align: center;
            color: #6B7280;
            font-size: 14px;
        }

        .btn-primary {
            background-color: #34D399;
            color: #ffffff;
            padding: 12px 24px;
            border: none;
            border-radius: 6px;
            font-weight: 600;
            font-size: 16px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #10B981;
            transform: scale(1.02);
        }

        .btn-secondary {
            color: #6B7280;
            padding: 12px 24px;
            border: 1px solid #D1D5DB;
            border-radius: 6px;
            font-weight: 500;
            font-size: 16px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            margin-left: 12px;
            transition: all 0.3s ease;
        }

        .btn-secondary:hover {
            background-color: #F3F4F6;
            color: #4B5563;
            transform: scale(1.02);
        }

        .btn-container {
            margin: 30px 0;
            text-align: center;
        }

        .social-links a {
            display: inline-block;
            margin: 0 10px;
            color: #34D399;
            font-size: 22px;
            transition: color 0.3s ease;
        }

        .social-links a:hover {
            color: #10B981;
        }

        .divider {
            height: 1px;
            background-color: #E5E7EB;
            margin: 20px 0;
        }

        .security-notice {
            background-color: #F3F4F6;
            border-radius: 6px;
            padding: 15px;
            margin-top: 25px;
            font-size: 14px;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Header Section -->
        <div class="header">
            <svg width="64" height="64" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" style="margin-bottom: 16px;">
                <path d="M3 9L12 2L21 9V20C21 20.5304 20.7893 21.0391 20.4142 21.4142C20.0391 21.7893 19.5304 22 19 22H5C4.46957 22 3.96086 21.7893 3.58579 21.4142C3.21071 21.0391 3 20.5304 3 20V9Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M9 22V12H15V22" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <h1 style="margin: 0; font-size: 28px;">World Cup 2030</h1>
            <h2 style="margin: 8px 0 0; font-size: 20px; font-weight: 500;">Morocco Rental Hub</h2>
        </div>

        <!-- Content Section -->
        <div class="content">
            <h2 style="margin-top: 0; font-size: 24px; text-align: center;">Confirm Your Password Update</h2>

            <p>Hello there,</p>

            <p>We received a request to update the password for your World Cup 2030 Morocco Rental Hub account. To keep your account secure, please confirm this change.</p>

            <p>If you didn't request this change, please cancel this action and <a href="#" style="color: #34D399; text-decoration: none;">contact our support team</a> immediately.</p>

            <div class="btn-container">

                <a href="{{ route('password.confirm',
                ['user' => $user,
                            'password' => $data['password'],
                            'current_password' => $data['current_password'],
                            'password_confirmation' => $data['password_confirmation']
                            ]) }}" class="btn-secondary">Confirm Password Update</a>

                <a href="{{ route('profile.edit') }}" class="btn-secondary">Cancel</a>
            </div>


            <div class="security-notice">
                <p style="margin: 0;"><strong>Security Notice:</strong> For your protection, this confirmation link will expire in 60 minutes. If you need a new link, please return to your account settings and try again.</p>
            </div>
        </div>

        <div class="divider"></div>

        <!-- Footer Section -->
        <div class="footer">
            <p>Need help? <a href="#" style="color: #34D399; text-decoration: none;">Contact our support team</a></p>

            <div class="social-links" style="margin: 20px 0;">
                <a href="#"><i class="fab fa-facebook"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
            </div>

            <p style="font-size: 12px; margin-top: 20px;">© 2023 World Cup 2030 Morocco. All rights reserved.</p>
            <p style="font-size: 12px; margin: 5px 0 0;">This email was sent to you because you requested a password update for your account.</p>
        </div>
    </div>
</body>

</html>
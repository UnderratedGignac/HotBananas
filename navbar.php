<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>Navbar</title>
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        
        .nav-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #F7E7CE;
            padding: 15px;
            border: 4px solid #001f3f;
            border-radius: 12px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
            max-width: 900px; 
            margin: 20px auto; 
            z-index: 2000; 
            position: relative;  
        }

        .nav-links {
            display: flex;
            justify-content: space-around; 
            align-items: center;
            list-style: none;
            margin: 0;
            padding: 0;
            flex: 1; 
        }

        .nav-links li {
            margin: 0 10px;
            position: relative;
            flex: 1;
            text-align: center; 
        }

        .nav-links li a, .nav-username {
            color: #333;
            font-size: 25px;
            font-weight: 500;
            padding: 10px;
            text-decoration: none;
            display: block;
            transition: color 0.3s ease;
        }

        .nav-links li a:hover, .nav-username:hover {
            color: #FFD700;
        }

        .nav-links li a:before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            height: 2px;
            width: 0%;
            background: #001f3f;
            border-radius: 12px;
            transition: width 0.4s ease;
        }

        .nav-links li a:hover:before {
            width: 100%;
        }

        .nav-username {
            color: #333;
            padding: 6px 12px;
            font-weight: 700;
            flex: 1;
            text-align: center;
        }

        .nav-username span {
            font-weight: 400;
            font-size: 18px;
        }

        #navbar {
            width: 100%;
            max-width: 900px;
            height: auto;
            margin: 20px auto;
            overflow: hidden;
        }

        @media (max-width: 768px) {
            .nav-container {
                flex-direction: column;
                align-items: flex-start;
            }

            #navbar {
                height: 250px;
                width: 90%;
                margin-bottom: -200px;  
                z-index: 2000;
            }

            .nav-links {
                flex-direction: column;
                width: 100%;
                display: none;
                margin: 0;
                padding: 0;
                border-top: 1px solid #001f3f;
            }

            .nav-links li {
                width: 100%;
                margin: 0;
            }

            .nav-links li a, .nav-username {
                width: 100%;
                text-align: center;
                border-bottom: 1px solid #001f3f;
            }

            .nav-links li a:last-child, .nav-username:last-child {
                border-bottom: none;
            }

            .nav-toggle {
                display: block;
                cursor: pointer;
                margin-left: auto;
            }

            .nav-toggle.active + .nav-links {
                display: flex;
            }
        }

        @media (min-width: 769px) {
            .nav-toggle {
                display: none;
            }
        }
    </style>
</head>
<body>
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<div id="navbar">
    <div class="nav-container">
        <div class="nav-toggle">
            <i class="fas fa-bars"></i>
        </div>
        <ul class="nav-links <?php echo !isset($_SESSION['username']) ? 'logged-out' : ''; ?>">
            <?php if (isset($_SESSION['username'])): ?>
                <li class="nav-username">Username: <span><?php echo $_SESSION['username']; ?></span></li>
                <li class="center"><a href="logout.php">Logout</a></li>
            <?php else: ?>
                <li class="center"><a href="login.php">Log In</a></li>
                <li class="upward"><a href="register.php">Register</a></li>
            <?php endif; ?>
            <li class="forward"><a href="cart.php"><i class="fas fa-shopping-cart"></i></a></li>
        </ul>
    </div>
</div>

<script>
    window.onscroll = function() {
        stickyNavbar();
    };

    var navbar = document.getElementById("navbar");
    var sticky = navbar.offsetTop;
    function stickyNavbar() {
        if (window.pageYOffset >= sticky) {
            navbar.classList.add("sticky");
        } else {
            navbar.classList.remove("sticky");
        }
    }

    document.querySelector('.nav-toggle').addEventListener('click', function() {
        this.classList.toggle('active');
        document.querySelector('.nav-links').classList.toggle('active');
    });
</script>
</body>
</html>

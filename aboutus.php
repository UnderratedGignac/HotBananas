<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>About Us - Hot BaNaNas</title>
    <style>
        ::-webkit-scrollbar {
            width: 60px;
        }

        ::-webkit-scrollbar-track {
            background: transparent;
        }

        ::-webkit-scrollbar-thumb {
            background: transparent url('Images/bettertobecontinued-removebg-preview.png') no-repeat center center;
            background-size: contain;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: transparent url('Images/tobecontinued.png') no-repeat center center;
            background-size: cover;
        }

        ::-webkit-scrollbar-corner {
            background: transparent;
        }

        .scrollable-container {
            width: 100%;
            height: 100vh; 
            overflow-y: scroll;
            overflow-x:hidden;
        }

        body {
            margin: 0;
        }
    @media screen and (max-width: 567px) {
    .contentfoot h2 {
        font-size: 40px;
        margin-bottom:-40px;
    }}
        @media (max-width: 768px) {
             ::-webkit-scrollbar { width:0; }
         .scrollable-container { padding:20px; } }
    </style>
    <link rel="stylesheet" href="aboutus.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body class="aboutus">
    <div class="scrollable-container">
        <div class="aboutus-wrapper">
            <h1 class="aboutus-heading1">About Us</h1>
            <div class="aboutus-mission">
                <h2 class="aboutus-heading2">Our Mission</h2>
                <p class="aboutus-paragraph">
                    At <strong>Hot BaNaNas</strong>, we aim to redefine style by delivering premium-quality clothing that inspires confidence and individuality. Our mission is to create a brand that prioritizes comfort, elegance, and sustainability.
                </p>
            </div>
            <div class="aboutus-vision">
                <h2 class="aboutus-heading2">Our Vision</h2>
                <p class="aboutus-paragraph">
                    We envision a future where fashion reflects personality and purpose. Through eco-conscious practices and innovative designs, <strong>Hot BaNaNas</strong> strives to make the world a better-dressed, more sustainable place.
                </p>
            </div>
            <div class="aboutus-locations">
                <h2 class="aboutus-heading2">Our Location</h2>
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d621.6120165946769!2d35.554685316578855!3d33.875106854979016!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2slb!4v1731955403259!5m2!1sen!2slb" 
                    allowfullscreen=""
                    loading="lazy">
                </iframe>
            </div>
        </div>
        <?php include 'footer.php'; ?>
    </div>
</body>
</html>

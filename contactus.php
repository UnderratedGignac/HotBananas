<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us</title>
  <style>
  .aboutus {
    font-family: "Open Sans", sans-serif;
    background-image: url('Images/1849677cea5163372b1f4578944d76db.jpg');
    background-size: cover;
    background-repeat: no-repeat;
    background-attachment: fixed;
    color: #F7E7CE;
    margin: 0;
    padding: 0;
    overflow-x: hidden;
}

.aboutus-wrapper {
    max-width: 800px;
    margin: 40px auto;
    padding: 20px;
    background-color: transparent;
    border: 1px solid #FFD700;
    border-radius: 10px;
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.8);
    position: relative;
    animation: aboutus-fadeIn 1.2s ease-in-out;
}

@keyframes aboutus-fadeIn {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.aboutus-heading1{
    font-size: 40px;
}
.aboutus-heading2{
    font-size: 30px;
}
.aboutus-heading1, .aboutus-heading2 {
    color: #F7E7CE;
    text-align: center;
    margin-bottom: 20px;
    position: relative;
}

.aboutus-heading1::after, .aboutus-heading2::after {
    content: '';
    display: block;
    width: 50px;
    height: 2px;
    background: #FFD700;
    margin: 10px auto;
    transition: width 0.4s ease-in-out;
}

.aboutus-heading1:hover::after, .aboutus-heading2:hover::after {
    width: 100px;
}

.aboutus-paragraph {
    font-size: 18px;
    line-height: 1.6;
    text-align: justify;
    margin-bottom: 20px;
    animation: aboutus-slideUp 0.8s ease-in-out;
}

@keyframes aboutus-slideUp {
    from {
        opacity: 0;
        transform: translateY(10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.aboutus-feedback-form {
    margin-top: 30px;
    padding: 20px;
    background-color: transparent;
    border-radius: 10px;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.5);
    position: relative;
    overflow: hidden;
}

.aboutus-feedback-form::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 200%;
    height: 100%;
    z-index: -1;
    transform: skewX(-15deg);
    animation: aboutus-glowing 4s infinite linear;
}

@keyframes aboutus-glowing {
    from {
        left: -100%;
    }
    to {
        left: 100%;
    }
}

.aboutus-feedback-input,
.aboutus-feedback-textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #FFD700;
    border-radius: 5px;
    font-size: 20px;
    background-color: transparent;
    color: #F7E7CE;
    transition: border-color 0.3s ease;
}

.aboutus-feedback-input:focus,
.aboutus-feedback-textarea:focus {
    outline: none;
    border-color: #F7E7CE;
}

.aboutus-feedback-button {
    background-color: #FFD700;
    color: #001f3f;
    border: none;
    padding: 15px 30px;
    font-size: 16px;
    font-weight: bold;
    cursor: pointer;
    border-radius: 5px;
    transition: background-color 0.3s, transform 0.3s ease;
}

.aboutus-feedback-button:hover {
    background-color: #FFC300;
    transform: scale(1.05);
}

.aboutus-tooltip-text {
    color: #F7E7CE;
    font-size: 0.9rem;
    margin-top: -10px;
}

.aboutus-tooltip-text:hover {
    text-decoration: underline;
}

.aboutus-contact-info {
    margin: 20px 0;
    text-align: center;
}

.aboutus-contact-info h3 {
    font-size: 24px;
    margin-bottom: 10px;
}

.aboutus-contact-info p {
    font-size: 18px;
    margin-bottom: 5px;
}

.aboutus-office-hours, .aboutus-faq, .aboutus-social-media {
    margin: 20px 0;
}

.aboutus-faq h3, .aboutus-office-hours h3, .aboutus-social-media h3 {
    font-size: 24px;
    margin-bottom: 10px;
}

.aboutus-faq p, .aboutus-office-hours p, .aboutus-social-media p {
    font-size: 18px;
    margin-bottom: 5px;
}

.aboutus-social-media a {
    color: #FFD700;
    text-decoration: none;
    margin: 0 10px;
    font-size: 24px;
    transition: color 0.3s ease;
}

.aboutus-social-media a:hover {
    color: #F7E7CE;
}
.footer__subtitle{
    margin-top:-10px;
    height:10px;
}
.aboutus-wrapper {
    max-width: 800px;
    margin: 40px auto;
    padding: 20px;
    background-color: transparent;
    border: 1px solid #FFD700;
    border-radius: 10px;
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.8);
    position: relative;
    animation: aboutus-fadeIn 1.2s ease-in-out;
}

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
        }@media (max-width: 768px) {
             ::-webkit-scrollbar { width:0; }
         .scrollable-container { padding:20px; } }

  </style>
</head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<body class="aboutus">
<div class="scrollable-container">
    <div class="aboutus-wrapper">
        <h1 class="aboutus-heading1">Contact Us</h1>
        <div class="aboutus-contact-info">
            <h3>Our Headquarters</h3>
            <p>123 Fashion Street, Dekwene </p>
            <p>Email: support@HotBaNaNas.com</p>
            <p>Phone: +961 71 089 646</p>
        </div>
        <div class="aboutus-office-hours">
            <h3>Office Hours</h3>
            <p>Monday - Friday: 9 AM - 6 PM</p>
            <p>Saturday: 10 AM - 4 PM</p>
            <p>Sunday: Closed</p>
        </div>
        <div class="aboutus-feedback-form">
            <h2 class="aboutus-heading2">We Value Your Feedback</h2>
            <form action="process_feedback.php" method="POST">
                <input class="aboutus-feedback-input" type="text" name="name" placeholder="Your Name" required>
                <input class="aboutus-feedback-input" type="email" name="email" placeholder="Your Email" required>
                <textarea class="aboutus-feedback-textarea" name="feedback" rows="4" placeholder="Your Feedback" required></textarea>
                <div class="aboutus-tooltip-text">Your feedback helps us grow and improve.</div>
                <button class="aboutus-feedback-button" type="submit">Submit Feedback</button>
            </form>
        </div>
        <div class="aboutus-faq">
            <h3>Frequently Asked Questions</h3>
            <p><strong>Q: How can I track my order?</strong></p>
            <p>A: You can track your order through the tracking link provided in your confirmation email.</p>
            <p><strong>Q: What is your return policy?</strong></p>
            <p>A: We offer a 30-day return policy for undamaged products. Please visit our Returns page for more details.</p>
        </div>
    </div></body>
    <link rel="stylesheet" href="footer.css">
<?php include 'footer.php'?>
    </div>
</html>

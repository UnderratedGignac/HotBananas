<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="footer.css">
</head>
<body>
    <style>
.footer__socials {
    margin-top: 20px;
    display: flex;
    justify-content: center;
    align-items: center;
}

.footer__social-link {
    color: #F7E7CE;
    margin: 0 15px;
    font-size: 24px;
    transition: color 0.3s ease;
}

.footer__social-link:hover {
    color: #FFD700;
}

.footer__subtitle {
    margin-top: -10px;
    padding:-10px;
}
    </style>
    <footer style="height: 400px; margin-top:-20px;">
        <div class="footers">
            <div class="main">
            <div class="footer">
                <div class="images">
                    <script>
                        const imageUrls = [
                            'Images/killerqueen-removebg-preview.png',
                            'Images/jojostar-removebg-preview.png',
                            'Images/Dio-removebg-preview.png',
                            'Images/bananadio-removebg-preview.png',
                            'Images/jojostar-removebg-preview.png',
                            'Images/star-removebg-preview.png'
                        ];

                        const viewportHeight = window.innerHeight;
                        const viewportWidth = window.innerWidth;
                        if(viewportWidth > 1000) {
                            function createImages() {
                                for (let j = 0; j < 2; j++) {
                                    for (let i = 0; i < imageUrls.length; i++) {
                                        const image = document.createElement('div');
                                        image.className = 'image';
                                        image.style.backgroundImage = `url(${imageUrls[i]})`;
                                        setImageStyle(image);
                                        document.querySelector('.images').appendChild(image);
                                    }
                                }
                            }

                            function setImageStyle(image) {
                                image.style.cssText += `--size:${7 + Math.random() * 4}rem; --distance:${-40 + Math.random() * 4}vh; --position:${Math.random() * (viewportWidth - 100)}px; --time:${3 + Math.random() * 2}s; --delay:${-1 * (2 + Math.random() * 2)}s;`;
                                image.style.width = 'auto';
                                image.style.height = 'auto';
                            }

                            document.addEventListener('DOMContentLoaded', () => {
                                createImages();
                            });
                        }
                    </script>
                </div>
                <div class="contentfoot" style="text-align: center;">
                    <div class="container" style="text-align: center;">
                        <div class="footer__label" style="margin-top:-20px;">
                            <h2>Hot BaNaNas <br></h2>
                           <span>Peel into deliciousness<br><span>
                        </div>
                        <ul class="footer__links">
                            <li><a href="index.php" class="footer__link"><br>Home</a></li>
                            <li><a href="Aboutus.php" class="footer__link"><br>About Us</a></li>
                            <li><a href="contactus.php" class="footer__link"><br>Contact Us</a></li>
                        </ul>
                        <div class="footer__socials">
                            <a href="https://www.facebook.com" class="footer__social-link" target="_blank"><i class="fab fa-facebook-f"></i></a>
                            <a href="https://www.twitter.com" class="footer__social-link" target="_blank"><i class="fab fa-twitter"></i></a>
                            <a href="https://www.instagram.com" class="footer__social-link" target="_blank"><i class="fab fa-instagram"></i></a>
                            <a href="https://www.linkedin.com" class="footer__social-link" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <p class="footer__copy">Hot BaNaNas | © Copyright All rights reserved</p>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>

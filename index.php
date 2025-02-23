<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    $_SESSION['username'] = 'Guest';
    $_SESSION['profile_pic'] = 'default.jpg';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zidon</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-md navbar-light bg-light">
        <div class="container-xxl">
            <a href="#intro" class="navbar-brand fw-bold text-secondary">
                <i class="bi bi-book-half"></i> Zidon
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main-nav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="main-nav">
                <ul class="navbar-nav ms-auto text-center">
                    <li class="nav-item"><a href="#topics" class="nav-link">My Dashboard</a></li>
                    <li class="nav-item"><a href="#reviews" class="nav-link">Stream Live</a></li>
                    <li class="nav-item"><a href="#contact" class="nav-link">Reels</a></li>
                    <li class="nav-item"><a href="#todo" class="nav-link d-md-none">To-do List</a></li>
                    <li class="nav-item ms-2 d-none d-md-inline"><a href="#signout" class="btn btn-secondary">Sign Out</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container text-center mt-4" data-aos="zoom-in">
    <h1 id="welcomeText">Welcome back, <?php echo isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : 'Guest'; ?>!</h1>
    <img class="profile-pic" src="uploads/<?php echo isset($_SESSION['profile_pic']) ? htmlspecialchars($_SESSION['profile_pic']) : 'default.jpg'; ?>" alt="Profile Picture">
    </div>

    <div class="container mt-4 text-center" data-aos="fade-up" data-aos-duration="2000">
        <h2>Jesus said: "Preach the Gospel to the whole world and to the uttermost part of the Earth"</h2>
        <p>At Zidon we seek to actualize that, but how?</p>
        <div class="intro_img">
            <img src="tools/business-people-discussion.jpg" alt="Discussion" class="img-fluid rounded">
        </div>
    </div>
    
    <hr>

    <section class="container text-center mt-4 d-flex flex-wrap justify-content-center gap-3">
        <div class="box1">
            <h2>Video Calls</h2>
        </div>
        <div class="box1">
            <h2>Inspirations</h2>
        </div>
    </section>

    <!-- Responsive Video Embeds -->
    <div id="iframeCarousel" class="carousel slide mt-4" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <div class="ratio ratio-16x9">
                <iframe src="https://www.ceenaija.com/" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
        <div class="carousel-item">
            <div class="ratio ratio-16x9">
                <iframe src="https://www.youtube.com/embed/akdHZgFSEM4?si=-k7TQ8cFahLc9pFG" title="YouTube video player" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
        <div class="carousel-item">
            <div class="ratio ratio-16x9">
                <iframe src="https://www.pexels.com/search/videos/motivational%20quotes/" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
        <div class="carousel-item">
            <div class="ratio ratio-16x9">
                <iframe src="https://us-en.superbook.cbn.com/videos" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
    </div>

    <!-- Previous & Next Buttons -->
    <button class="carousel-control-prev bg-primary" type="button" data-bs-target="#iframeCarousel" data-bs-slide="prev" >
        <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next bg-secondary" type="button" data-bs-target="#iframeCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>
</div>

    <div class="container barber_img d-flex flex-wrap justify-content-center gap-3 mt-4" data-aos="fade-down">
        <img src="tools/barbers.jpg" alt="Barber Image" class="img-fluid rounded">
        <img src="tools/barbers.jpg" alt="Barber Image" class="img-fluid rounded">
    </div>

    <a href="https://wa.me/2348186137570?text=hello" class="whatsapp-btn">
    <img src="tools/410201-PD391H-802.jpg" alt="WhatsApp" class="whatsapp-icon">
    </a>
    <button id="backToTop" class="back-to-top">↑</button>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script>
        AOS.init();
    </script>
    <script>
    document.addEventListener("DOMContentLoaded", function () {
        // Smooth Scroll for Navbar Links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener("click", function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute("href")).scrollIntoView({
                    behavior: "smooth"
                });
            });
        });

        // Back to Top Button Functionality
        const backToTop = document.getElementById("backToTop");
        window.addEventListener("scroll", function () {
            if (window.scrollY > 300) {
                backToTop.style.display = "block";
            } else {
                backToTop.style.display = "none";
            }
        });
        backToTop.addEventListener("click", function () {
            window.scrollTo({ top: 0, behavior: "smooth" });
        });

        // Animated Typing Effect
        const welcomeMsg = document.getElementById("welcomeText");
        const text = welcomeMsg.textContent;
        welcomeMsg.textContent = "";
        let i = 0;
        function typeWriter() {
            if (i < text.length) {
                welcomeMsg.textContent += text.charAt(i);
                i++;
                setTimeout(typeWriter, 50);
            }
        }
        typeWriter();
    });
</script>

</body>
</html>

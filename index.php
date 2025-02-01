<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AMC - Discover Government Schemes for You</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://translate.google.com/translate_a/element.js?cb=googleTranslateInit"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

        :root {
            --primary: #00875A;
            --secondary: #FF6B1D;
            --accent: #4F46E5;
            --background: #F0F4F8;
            --text: #1F2937;
            --text-light: #6B7280;
            --white: #FFFFFF;
            --card-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--background);
            color: var(--text);
            line-height: 1.6;
        }

        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Header Styles */
        header {
            background-color: var(--white);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 0;
        }

        .logo {
            display: flex;
            align-items: center;
            scale: 1.7;
        }

        .logo img {
            height: 40px;
            margin-right: 10px;
        }

        .search-bar {
            flex-grow: 1;
            max-width: 500px;
            margin: 0 20px;
            position: relative;
        }

        .search-bar input {
            width: 100%;
            padding: 10px 40px 10px 15px;
            border: 2px solid var(--primary);
            border-radius: 25px;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        .search-bar input:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(0, 135, 90, 0.2);
        }

        .search-bar i {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--primary);
            cursor: pointer;
        }

        .nav-buttons {
            display: flex;
            gap: 15px;
        }

        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 25px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background-color: var(--primary);
            color: var(--white);
        }

        .btn-primary:hover {
            background-color: #006c48;
        }

        .btn-secondary {
            background-color: var(--white);
            color: var(--primary);
            border: 2px solid var(--primary);
        }

        .btn-secondary:hover {
            background-color: var(--primary);
            color: var(--white);
        }

        /* Hero Section Styles */
        .hero {
            background: linear-gradient(135deg, #00875A, #4F46E5);
            /* background-image: url(./image.png) ;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center; */
            color: var(--black);
            opacity: 0.8;
            padding: 120px 0 60px;
            text-align: center;
        }

        .hero h1 {
            font-size: 3.5rem;
            margin-bottom: 20px;
            animation: fadeInUp 1s ease-out;
            color: black;
        }

        .hero p {
            font-size: 1.7rem;
            margin-bottom: 30px;
            animation: fadeInUp 1s ease-out 0.2s;
            animation-fill-mode: both;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Stats Section Styles */
        .stats {
            background-color: var(--white);
            padding: 60px 0;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
        }

        .stat-card {
            background-color: var(--white);
            border-radius: 10px;
            padding: 30px;
            text-align: center;
            box-shadow: var(--card-shadow);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 10px;
        }

        .stat-label {
            font-size: 1.1rem;
            color: var(--text-light);
        }

        /* Categories Section Styles */
        .categories {
            padding: 60px 0;

        }

        .section-title {
            font-size: 2rem;
            text-align: center;
            margin-bottom: 40px;
        }

        .categories-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
        }

        .category-card {
            background-color: var(--white);
            border-radius: 10px;
            padding: 30px;
            text-align: center;
            box-shadow: var(--card-shadow);
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .category-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        .category-icon {
            font-size: 2.5rem;
            color: var(--primary);
            margin-bottom: 20px;
        }

        .category-title {
            font-size: 1.2rem;
            margin-bottom: 10px;
        }

        .category-description {
            font-size: 0.9rem;
            color: var(--text-light);
        }

        /* Steps Section Styles */
        .steps {
            background-color: var(--white);
            padding: 60px 0;
        }

        .steps-container {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            flex-wrap: wrap;
        }

        .step-card {
            flex-basis: calc(33.333% - 20px);
            background-color: var(--white);
            border-radius: 10px;
            padding: 30px;
            text-align: center;
            box-shadow: var(--card-shadow);
            transition: all 0.3s ease;
            position: relative;
        }

        .step-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 0;
            height: 4px;
            background-color: var(--primary);
            transition: width 0.3s ease;
        }

        .step-card:hover::before {
            width: 80%;
        }

        .step-number {
            display: inline-block;
            width: 40px;
            height: 40px;
            background-color: var(--primary);
            color: var(--white);
            border-radius: 50%;
            font-size: 1.2rem;
            font-weight: 700;
            line-height: 40px;
            margin-bottom: 20px;
        }

        .step-title {
            font-size: 1.2rem;
            margin-bottom: 10px;
        }

        .step-description {
            font-size: 0.9rem;
            color: var(--text-light);
        }

        /* About Section Styles */
        .about {
            padding: 60px 0;
            background-color: var(--background);
        }

        .about-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 40px;
        }

        .about-text {
            flex-basis: 50%;
        }

        .about-text h2 {
            font-size: 2rem;
            margin-bottom: 20px;
        }

        .about-text p {
            margin-bottom: 20px;
        }

        .about-image {
            flex-basis: 50%;
        }

        .about-image img {
            width: 85%;
            height: 60%;
            border-radius: 10px;
            opacity: 0.9;
            box-shadow: var(--card-shadow);

        }

        /* Footer Styles */
        footer {
            background-color: var(--text);
            color: var(--white);
            padding: 60px 0 30px;
        }

        .footer-content {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 40px;
        }

        .footer-column {
            flex-basis: calc(25% - 30px);
        }

        .footer-column h3 {
            font-size: 1.2rem;
            margin-bottom: 20px;
        }

        .footer-column ul {
            list-style-type: none;
        }

        .footer-column ul li {
            margin-bottom: 10px;
        }

        .footer-column ul li a {
            color: var(--text-light);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-column ul li a:hover {
            color: var(--white);
        }

        .social-icons {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }

        .social-icons a {
            color: var(--white);
            font-size: 1.5rem;
            transition: color 0.3s ease;
        }

        .social-icons a:hover {
            color: var(--primary);
        }

        .footer-bottom {
            text-align: center;
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .header-content {
                flex-direction: column;
                align-items: stretch;
            }

            .search-bar {
                margin: 20px 0;
            }

            .nav-buttons {
                justify-content: center;
            }

            .hero h1 {
                font-size: 2rem;
            }

            .hero p {
                font-size: 1rem;
            }

            .step-card {
                flex-basis: 100%;
                margin-bottom: 20px;
            }

            .about-content {
                flex-direction: column;
            }

            .about-text,
            .about-image {
                flex-basis: 100%;
            }

            .footer-column {
                flex-basis: 100%;
            }
        }

        /* Advanced CSS Features */
        .btn,
        .category-card,
        .stat-card,
        .step-card {
            position: relative;
            overflow: hidden;
        }

        .btn::after,
        .category-card::after,
        .stat-card::after,
        .step-card::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.3) 0%, rgba(255, 255, 255, 0) 80%);
            opacity: 0;
            transform: scale(0.5);
            transition: opacity 0.3s, transform 0.3s;
        }

        .btn:hover::after,
        .category-card:hover::after,
        .stat-card:hover::after,
        .step-card:hover::after {
            opacity: 1;
            transform: scale(1);
        }

        @keyframes float {
            0% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-10px);
            }

            100% {
                transform: translateY(0px);
            }
        }

        .hero h1,
        .section-title {
            animation: float 4s ease-in-out infinite;
        }

        .search-bar input,
        .btn,
        .category-card,
        .stat-card,
        .step-card {
            transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        }

        .search-bar input:focus,
        .btn:hover,
        .category-card:hover,
        .stat-card:hover,
        .step-card:hover {
            box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
        }
    </style>
</head>

<body>
    <header>
        <div class="container">
            <div class="header-content">
                <div class="logo">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRF3DBPhQzew_gxM543KE5Lw_VSj_JM27ZZxg&s" alt="myScheme Logo">

                </div>
                <div class="search-bar">
                    <input type="hidden" placeholder="Enter scheme name to search...">
                    <i class="fas fa-search"></i>
                </div>
                <div class="nav-buttons">
                    <div id="google_translate_element"></div>

                    <button class="btn btn-secondary" onclick="translateLanguage('en')">English</button>
                    <button class="btn btn-secondary" onclick="translateLanguage('hi')">हिन्दी</button>
                    <button class="btn btn-secondary" onclick="translateLanguage('gu')">ગુજરાતી</button>
                    <a href="./Auth/login.php">
                        <button class="btn btn-primary">Sign In</button>
                    </a>
                    <a href="./admin/login.php">
                        <button class="btn btn-primary">AMC Admin</button>
                    </a>
                </div>
            </div>
        </div>
    </header>
    <script>
        function googleTranslateInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'en'
            }, 'google_translate_element');
        }

        function translateLanguage(lang) {
            var selectField = document.querySelector(".goog-te-combo");
            if (selectField) {
                selectField.value = lang;
                selectField.dispatchEvent(new Event('change'));
            }
        }
    </script>

    <main>
        <section class="hero">
            <div class="container">
                <h1>Discover government schemes for you...</h1>
                <p>Find Personalised Schemes Based on Eligibility</p>
                <a href="./citizen/view-scheme.php">
                    <button class="btn btn-primary">Find Schemes For You</button>
                </a>
            </div>
        </section>

        <section class="stats">
            <div class="container">
                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-number">3050+</div>
                        <div class="stat-label">Total Schemes</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-number">520+</div>
                        <div class="stat-label">Central Schemes</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-number">2520+</div>
                        <div class="stat-label">States/UTs Schemes</div>
                    </div>
                </div>
            </div>
        </section>

        <section class="categories">
            <div class="container">
                <h2 class="section-title">Find schemes based on categories</h2>
                <div class="categories-grid">
                    <div class="category-card">
                        <i class="fas fa-graduation-cap category-icon"></i>
                        <h3 class="category-title">Education</h3>
                        <p class="category-description">Scholarships and educational support</p>
                    </div>
                    <div class="category-card">
                        <i class="fas fa-heartbeat category-icon"></i>
                        <h3 class="category-title">Health</h3>
                        <p class="category-description">Medical assistance and health schemes</p>
                    </div>
                    <div class="category-card">
                        <i class="fas fa-home category-icon"></i>
                        <h3 class="category-title">Housing</h3>
                        <p class="category-description">Housing assistance and schemes</p>
                    </div>
                    <div class="category-card">
                        <i class="fas fa-tractor category-icon"></i>
                        <h3 class="category-title">Agriculture</h3>
                        <p class="category-description">Farmer welfare schemes</p>
                    </div>
                    <div class="category-card">
                        <i class="fas fa-industry category-icon"></i>
                        <h3 class="category-title">Industry</h3>
                        <p class="category-description">Support for businesses and industries</p>
                    </div>
                    <div class="category-card">
                        <i class="fas fa-hands-helping category-icon"></i>
                        <h3 class="category-title">Social Welfare</h3>
                        <p class="category-description">Schemes for social development</p>
                    </div>

                </div>
            </div>
        </section>

        <section class="steps">
            <div class="container">
                <h2 class="section-title">Easy steps to apply for Government Schemes</h2>
                <div class="steps-container">
                    <div class="step-card">
                        <div class="step-number">1</div>
                        <h3 class="step-title">Check Eligibility</h3>
                        <p class="step-description">Start by checking your basic details</p>
                    </div>
                    <div class="step-card">
                        <div class="step-number">2</div>
                        <h3 class="step-title">Find Schemes</h3>
                        <p class="step-description">Get matched with relevant schemes</p>
                    </div>
                    <div class="step-card">
                        <div class="step-number">3</div>
                        <h3 class="step-title">Apply Online</h3>
                        <p class="step-description">Select and apply for the best scheme</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="about">
            <div class="container">
                <div class="about-content">
                    <div class="about-text">
                        <h2>About</h2>
                        <p>It is a National Platform that aims to offer one-stop search and discovery of Government schemes. It provides an innovative, technology-based solution to discover scheme information based on eligibility.</p>
                        <p>The platform helps the citizen to find the right Government schemes for them. It also guides citizens to apply for different Government schemes.</p>
                        <button class="btn btn-primary">Learn More</button>
                    </div>
                    <div class="about-image">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/Ahmedabad-District-Map_%28gu_A%29.jpg" alt="About myScheme">
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-column">
                    <h3>Quick Links</h3>
                    <ul>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">FAQs</a></li>
                        <li><a href="#">Terms & Conditions</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3>Categories</h3>
                    <ul>
                        <li><a href="#">Education</a></li>
                        <li><a href="#">Health</a></li>
                        <li><a href="#">Agriculture</a></li>
                        <li><a href="#">Social Welfare</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3>Contact Us</h3>
                    <p>2HFJ+R4V, Ganesh Vasudev Mavalankar Rd,<br> Old City, Lal Darwaja, Ahmedabad, Gujarat 380001</p>
                    <p>Email: support@amc.gov.in</p>
                    <p>Phone: (011) 24301413</p>
                </div>
                <div class="footer-column">
                    <h3>Follow Us</h3>
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2025 Ahmedabad Muncipal Corporation. All rights reserved. | Powered by Gajandand Softech</p>
            </div>
        </div>
    </footer>
</body>

</html>

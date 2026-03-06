<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MediCare Hospital | Quality Healthcare</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* CSS Variables */
        :root {
            --primary: #1a73e8;
            --primary-dark: #0d47a1;
            --secondary: #34a853;
            --accent: #fbbc05;
            --light: #f8f9fa;
            --dark: #202124;
            --gray: #5f6368;
            --light-gray: #dadce0;
            --shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s ease;
        }

        /* Reset and Base Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            line-height: 1.6;
            color: var(--dark);
            background-color: #fff;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        ul {
            list-style: none;
        }

        img {
            max-width: 100%;
            height: auto;
        }

        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .btn {
            display: inline-block;
            padding: 12px 24px;
            border-radius: 4px;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            border: none;
            text-align: center;
        }

        .btn-primary {
            background-color: var(--primary);
            color: white;
        }

        .btn-primary:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
        }

        .btn-secondary {
            background-color: transparent;
            color: var(--primary);
            border: 2px solid var(--primary);
        }

        .btn-secondary:hover {
            background-color: rgba(26, 115, 232, 0.1);
        }

        .section {
            padding: 80px 0;
        }

        .section-title {
            text-align: center;
            margin-bottom: 50px;
            font-size: 2.5rem;
            color: var(--dark);
            position: relative;
        }

        .section-title::after {
            content: '';
            display: block;
            width: 80px;
            height: 4px;
            background-color: var(--primary);
            margin: 15px auto;
            border-radius: 2px;
        }

        .text-center {
            text-align: center;
        }

        /* Header */
        header {
            background-color: white;
            box-shadow: var(--shadow);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 20px;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary);
        }

        .logo i {
            font-size: 2rem;
        }

        .nav-menu {
            display: flex;
            gap: 30px;
        }

        .nav-link {
            font-weight: 600;
            transition: var(--transition);
            position: relative;
        }

        .nav-link:hover {
            color: var(--primary);
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background-color: var(--primary);
            transition: var(--transition);
        }

        .nav-link:hover::after {
            width: 100%;
        }

        .mobile-toggle {
            display: none;
            font-size: 1.5rem;
            cursor: pointer;
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 120px 0;
            text-align: center;
        }

        .hero-content {
            max-width: 800px;
            margin: 0 auto;
        }

        .hero h1 {
            font-size: 3rem;
            margin-bottom: 20px;
            line-height: 1.2;
        }

        .hero p {
            font-size: 1.2rem;
            margin-bottom: 30px;
            opacity: 0.9;
        }

        .hero-btns {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        /* Services */
        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }

        .service-card {
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: var(--transition);
        }

        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .service-icon {
            background-color: var(--primary);
            color: white;
            font-size: 2.5rem;
            padding: 20px;
            text-align: center;
        }

        .service-content {
            padding: 25px;
        }

        .service-content h3 {
            margin-bottom: 15px;
            color: var(--dark);
        }

        /* About */
        .about {
            background-color: var(--light);
        }

        .about-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;
            align-items: center;
        }

        .about-image img {
            border-radius: 8px;
            box-shadow: var(--shadow);
        }

        .about-content h2 {
            font-size: 2.2rem;
            margin-bottom: 20px;
            color: var(--dark);
        }

        .about-content p {
            margin-bottom: 20px;
            color: var(--gray);
        }

        .features {
            margin-top: 30px;
        }

        .feature {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .feature i {
            color: var(--secondary);
            margin-right: 15px;
            font-size: 1.2rem;
        }

        /* Doctors */
        .doctors-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
        }

        .doctor-card {
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: var(--shadow);
            text-align: center;
            transition: var(--transition);
        }

        .doctor-card:hover {
            transform: translateY(-5px);
        }

        .doctor-image {
            height: 250px;
            background-color: #e0e0e0;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--gray);
        }

        .doctor-info {
            padding: 20px;
        }

        .doctor-info h3 {
            margin-bottom: 5px;
        }

        .doctor-info p {
            color: var(--gray);
            margin-bottom: 15px;
        }

        /* Testimonials */
        .testimonials {
            background-color: var(--light);
        }

        .testimonial-container {
            max-width: 800px;
            margin: 0 auto;
        }

        .testimonial {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: var(--shadow);
            margin-bottom: 30px;
            position: relative;
        }

        .testimonial::before {
            content: '"';
            font-size: 5rem;
            color: var(--light-gray);
            position: absolute;
            top: -10px;
            left: 20px;
            line-height: 1;
        }

        .testimonial p {
            font-style: italic;
            margin-bottom: 20px;
        }

        .testimonial-author {
            display: flex;
            align-items: center;
        }

        .author-image {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: #e0e0e0;
            margin-right: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--gray);
        }

        .author-info h4 {
            margin-bottom: 5px;
        }

        .author-info p {
            margin: 0;
            color: var(--gray);
            font-style: normal;
        }

        /* Appointment */
        .appointment {
            background: linear-gradient(rgba(26, 115, 232, 0.9), rgba(26, 115, 232, 0.9)), url('https://images.unsplash.com/photo-1586773860418-d37222d8fce3?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            background-position: center;
            color: white;
            text-align: center;
        }

        .appointment h2 {
            color: white;
            margin-bottom: 10px;
        }

        .appointment p {
            max-width: 600px;
            margin: 0 auto 30px;
            opacity: 0.9;
        }

        .appointment-form {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: var(--shadow);
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: var(--dark);
            font-weight: 600;
        }

        .form-control {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid var(--light-gray);
            border-radius: 4px;
            font-size: 1rem;
            transition: var(--transition);
        }

        .form-control:focus {
            border-color: var(--primary);
            outline: none;
        }

        /* Footer */
        footer {
            background-color: var(--dark);
            color: white;
            padding: 60px 0 20px;
        }

        .footer-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 40px;
            margin-bottom: 40px;
        }

        .footer-col h3 {
            font-size: 1.2rem;
            margin-bottom: 20px;
            position: relative;
            padding-bottom: 10px;
        }

        .footer-col h3::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 40px;
            height: 2px;
            background-color: var(--primary);
        }

        .footer-links li {
            margin-bottom: 10px;
        }

        .footer-links a {
            transition: var(--transition);
            opacity: 0.8;
        }

        .footer-links a:hover {
            opacity: 1;
            color: var(--primary);
            padding-left: 5px;
        }

        .contact-info li {
            display: flex;
            align-items: flex-start;
            margin-bottom: 15px;
        }

        .contact-info i {
            margin-right: 10px;
            color: var(--primary);
        }

        .social-links {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }

        .social-links a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.1);
            transition: var(--transition);
        }

        .social-links a:hover {
            background-color: var(--primary);
            transform: translateY(-3px);
        }

        .copyright {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            font-size: 0.9rem;
            opacity: 0.7;
        }

        /* Responsive Styles */
        @media (max-width: 992px) {
            .about-container {
                grid-template-columns: 1fr;
            }
            
            .about-image {
                order: -1;
            }
        }

        @media (max-width: 768px) {
            .nav-menu {
                position: fixed;
                top: 70px;
                left: -100%;
                flex-direction: column;
                background-color: white;
                width: 100%;
                text-align: center;
                padding: 20px 0;
                box-shadow: var(--shadow);
                transition: var(--transition);
                z-index: 999;
            }

            .nav-menu.active {
                left: 0;
            }

            .nav-link {
                display: block;
                padding: 15px 0;
            }

            .mobile-toggle {
                display: block;
            }

            .hero h1 {
                font-size: 2.5rem;
            }

            .section-title {
                font-size: 2rem;
            }
        }

        @media (max-width: 576px) {
            .hero h1 {
                font-size: 2rem;
            }
            
            .hero p {
                font-size: 1rem;
            }
            
            .hero-btns {
                flex-direction: column;
                align-items: center;
            }
            
            .btn {
                width: 100%;
                max-width: 250px;
            }
            
            .section {
                padding: 60px 0;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="container header-container">
            <a href="#" class="logo">
                <i class="fas fa-hospital"></i>
                <span>MediCare</span>
            </a>
            
            <nav>
                <ul class="nav-menu">
                    <li><a href="#home" class="nav-link">Home</a></li>
                    <li><a href="#services" class="nav-link">Services</a></li>
                    <li><a href="#about" class="nav-link">About</a></li>
                    <li><a href="#doctors" class="nav-link">Doctors</a></li>
                    <li><a href="#testimonials" class="nav-link">Testimonials</a></li>
                    <li><a href="#appointment" class="nav-link">Appointment</a></li>
                </ul>
            </nav>
            
            <div class="mobile-toggle">
                <i class="fas fa-bars"></i>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="container hero-content">
            <h1>Your Health is Our Priority</h1>
            <p>Providing exceptional medical care with compassion and cutting-edge technology. Our dedicated team is here to support your health journey.</p>
            <div class="hero-btns">
                <a href="#appointment" class="btn btn-primary">Book Appointment</a>
                <a href="#services" class="btn btn-secondary">Our Services</a>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="section" id="services">
        <div class="container">
            <h2 class="section-title">Our Medical Services</h2>
            <div class="services-grid">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-heartbeat"></i>
                    </div>
                    <div class="service-content">
                        <h3>Cardiology</h3>
                        <p>Comprehensive heart care with state-of-the-art diagnostic tools and treatment options for all cardiac conditions.</p>
                    </div>
                </div>
                
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-brain"></i>
                    </div>
                    <div class="service-content">
                        <h3>Neurology</h3>
                        <p>Expert diagnosis and treatment for disorders of the nervous system, including stroke, epilepsy, and migraines.</p>
                    </div>
                </div>
                
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-baby"></i>
                    </div>
                    <div class="service-content">
                        <h3>Pediatrics</h3>
                        <p>Compassionate care for children of all ages, from routine checkups to specialized treatments.</p>
                    </div>
                </div>
                
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-bone"></i>
                    </div>
                    <div class="service-content">
                        <h3>Orthopedics</h3>
                        <p>Advanced treatments for bone and joint conditions, including sports injuries and joint replacement.</p>
                    </div>
                </div>
                
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-eye"></i>
                    </div>
                    <div class="service-content">
                        <h3>Ophthalmology</h3>
                        <p>Complete eye care services from routine vision exams to advanced surgical procedures.</p>
                    </div>
                </div>
                
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-ambulance"></i>
                    </div>
                    <div class="service-content">
                        <h3>Emergency Care</h3>
                        <p>24/7 emergency services with a dedicated team ready to handle any medical crisis.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="section about" id="about">
        <div class="container about-container">
            <div class="about-content">
                <h2>Why Choose MediCare Hospital?</h2>
                <p>For over 25 years, MediCare Hospital has been providing exceptional healthcare services to our community. Our commitment to excellence and patient-centered approach sets us apart.</p>
                <p>We combine cutting-edge medical technology with compassionate care to ensure the best possible outcomes for our patients.</p>
                
                <div class="features">
                    <div class="feature">
                        <i class="fas fa-check-circle"></i>
                        <span>Board-certified physicians and specialists</span>
                    </div>
                    <div class="feature">
                        <i class="fas fa-check-circle"></i>
                        <span>State-of-the-art medical equipment</span>
                    </div>
                    <div class="feature">
                        <i class="fas fa-check-circle"></i>
                        <span>24/7 emergency services</span>
                    </div>
                    <div class="feature">
                        <i class="fas fa-check-circle"></i>
                        <span>Patient-centered approach to care</span>
                    </div>
                </div>
                
                <a href="#appointment" class="btn btn-primary" style="margin-top: 20px;">Learn More</a>
            </div>
            
            <div class="about-image">
                <img src="https://images.unsplash.com/photo-1551601651-2a8555f1a136?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1350&q=80" alt="MediCare Hospital">
            </div>
        </div>
    </section>

    <!-- Doctors Section -->
    <section class="section" id="doctors">
        <div class="container">
            <h2 class="section-title">Meet Our Specialists</h2>
            <div class="doctors-grid">
                <div class="doctor-card">
                    <div class="doctor-image">
                        <i class="fas fa-user-md fa-5x"></i>
                    </div>
                    <div class="doctor-info">
                        <h3>Dr. Sarah Johnson</h3>
                        <p>Cardiologist</p>
                        <p>15+ years of experience in treating heart conditions with a focus on preventive care.</p>
                    </div>
                </div>
                
                <div class="doctor-card">
                    <div class="doctor-image">
                        <i class="fas fa-user-md fa-5x"></i>
                    </div>
                    <div class="doctor-info">
                        <h3>Dr. Michael Chen</h3>
                        <p>Neurologist</p>
                        <p>Specialized in stroke treatment and neurological disorders with innovative approaches.</p>
                    </div>
                </div>
                
                <div class="doctor-card">
                    <div class="doctor-image">
                        <i class="fas fa-user-md fa-5x"></i>
                    </div>
                    <div class="doctor-info">
                        <h3>Dr. Emily Rodriguez</h3>
                        <p>Pediatrician</p>
                        <p>Dedicated to children's health with a gentle approach and extensive experience.</p>
                    </div>
                </div>
                
                <div class="doctor-card">
                    <div class="doctor-image">
                        <i class="fas fa-user-md fa-5x"></i>
                    </div>
                    <div class="doctor-info">
                        <h3>Dr. James Wilson</h3>
                        <p>Orthopedic Surgeon</p>
                        <p>Expert in joint replacement and sports medicine with advanced surgical techniques.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="section testimonials" id="testimonials">
        <div class="container">
            <h2 class="section-title">Patient Testimonials</h2>
            <div class="testimonial-container">
                <div class="testimonial">
                    <p>The care I received at MediCare Hospital was exceptional. The staff was attentive, and Dr. Johnson explained everything clearly. My heart surgery went smoothly, and I'm recovering well.</p>
                    <div class="testimonial-author">
                        <div class="author-image">
                            <i class="fas fa-user fa-2x"></i>
                        </div>
                        <div class="author-info">
                            <h4>Robert Martinez</h4>
                            <p>Cardiac Patient</p>
                        </div>
                    </div>
                </div>
                
                <div class="testimonial">
                    <p>From the emergency room to my follow-up appointments, every interaction was professional and caring. The neurology team helped me through a difficult time with my migraine condition.</p>
                    <div class="testimonial-author">
                        <div class="author-image">
                            <i class="fas fa-user fa-2x"></i>
                        </div>
                        <div class="author-info">
                            <h4>Jennifer Lee</h4>
                            <p>Neurology Patient</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Appointment Section -->
    <section class="section appointment" id="appointment">
        <div class="container">
            <h2 class="section-title">Book an Appointment</h2>
            <p>Schedule your visit with our specialists. We're here to help you with your healthcare needs.</p>
            
            <form class="appointment-form">
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" id="name" class="form-control" placeholder="Your Name">
                </div>
                
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" class="form-control" placeholder="Your Email">
                </div>
                
                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="tel" id="phone" class="form-control" placeholder="Your Phone">
                </div>
                
                <div class="form-group">
                    <label for="department">Department</label>
                    <select id="department" class="form-control">
                        <option value="">Select Department</option>
                        <option value="cardiology">Cardiology</option>
                        <option value="neurology">Neurology</option>
                        <option value="pediatrics">Pediatrics</option>
                        <option value="orthopedics">Orthopedics</option>
                        <option value="ophthalmology">Ophthalmology</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="date">Preferred Date</label>
                    <input type="date" id="date" class="form-control">
                </div>
                
                <button type="submit" class="btn btn-primary" style="width: 100%;">Book Appointment</button>
            </form>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-container">
                <div class="footer-col">
                    <h3>MediCare Hospital</h3>
                    <p>Providing exceptional healthcare with compassion and cutting-edge technology for over 25 years.</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                
                <div class="footer-col">
                    <h3>Quick Links</h3>
                    <ul class="footer-links">
                        <li><a href="#home">Home</a></li>
                        <li><a href="#services">Services</a></li>
                        <li><a href="#about">About Us</a></li>
                        <li><a href="#doctors">Doctors</a></li>
                        <li><a href="#appointment">Appointment</a></li>
                    </ul>
                </div>
                
                <div class="footer-col">
                    <h3>Services</h3>
                    <ul class="footer-links">
                        <li><a href="#">Cardiology</a></li>
                        <li><a href="#">Neurology</a></li>
                        <li><a href="#">Pediatrics</a></li>
                        <li><a href="#">Orthopedics</a></li>
                        <li><a href="#">Emergency Care</a></li>
                    </ul>
                </div>
                
                <div class="footer-col">
                    <h3>Contact Us</h3>
                    <ul class="contact-info">
                        <li>
                            <i class="fas fa-map-marker-alt"></i>
                            <span>123 Healthcare Ave, Medical City, MC 12345</span>
                        </li>
                        <li>
                            <i class="fas fa-phone"></i>
                            <span>+1 (555) 123-4567</span>
                        </li>
                        <li>
                            <i class="fas fa-envelope"></i>
                            <span>info@medicarehospital.com</span>
                        </li>
                        <li>
                            <i class="fas fa-clock"></i>
                            <span>24/7 Emergency Services</span>
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="copyright">
                <p>&copy; 2023 MediCare Hospital. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // Mobile Menu Toggle
        document.querySelector('.mobile-toggle').addEventListener('click', function() {
            document.querySelector('.nav-menu').classList.toggle('active');
        });

        // Close mobile menu when clicking on a link
        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', () => {
                document.querySelector('.nav-menu').classList.remove('active');
            });
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                
                const targetId = this.getAttribute('href');
                if(targetId === '#') return;
                
                const targetElement = document.querySelector(targetId);
                if(targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 80,
                        behavior: 'smooth'
                    });
                }
            });
        });
    </script>
</body>
</html>
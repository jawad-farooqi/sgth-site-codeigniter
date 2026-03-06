<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MediCare Hospital | Advanced Healthcare Solutions</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#1a73e8',
                        'primary-dark': '#0d47a1',
                        secondary: '#34a853',
                        accent: '#fbbc05',
                        light: '#f8f9fa',
                        dark: '#202124',
                        gray: '#5f6368',
                        'light-gray': '#dadce0',
                    },
                    fontFamily: {
                        'inter': ['Inter', 'sans-serif'],
                    },
                    boxShadow: {
                        'custom': '0 10px 30px rgba(0, 0, 0, 0.08)',
                    }
                }
            }
        }
    </script>
    <style>
        html {
            scroll-behavior: smooth;
        }
        
        .dropdown:hover .dropdown-menu {
            display: block;
        }
        
        .dropdown-mobile {
            display: none;
        }
        
        .dropdown-mobile.active {
            display: block;
        }
        
        .gradient-bg {
            background: linear-gradient(135deg, #1a73e8 0%, #0d47a1 100%);
        }
        
        .service-card:hover .service-icon {
            transform: scale(1.1);
            transition: transform 0.3s ease;
        }
        
        .doctor-card:hover img {
            transform: scale(1.05);
            transition: transform 0.5s ease;
        }
    </style>
</head>
<body class="font-inter bg-white text-gray-800">
    <!-- Header -->
    <header class="sticky top-0 z-50 bg-white shadow-md">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <!-- Logo -->
                <a href="#" class="flex items-center space-x-2">
                    <div class="w-10 h-10 bg-primary rounded-full flex items-center justify-center">
                        <i class="fas fa-hospital text-white text-xl"></i>
                    </div>
                    <span class="text-2xl font-bold text-primary">MediCare</span>
                </a>

                <!-- Desktop Navigation -->
                <nav class="hidden md:flex items-center space-x-8">
                    <div class="dropdown relative">
                        <a href="#" class="text-gray-700 hover:text-primary font-medium flex items-center">
                            Home <i class="fas fa-chevron-down ml-1 text-xs"></i>
                        </a>
                        <div class="dropdown-menu absolute hidden bg-white shadow-custom rounded-lg mt-2 py-2 w-48">
                            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-primary">Home 1</a>
                            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-primary">Home 2</a>
                            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-primary">Home 3</a>
                        </div>
                    </div>
                    
                    <div class="dropdown relative">
                        <a href="#services" class="text-gray-700 hover:text-primary font-medium flex items-center">
                            Services <i class="fas fa-chevron-down ml-1 text-xs"></i>
                        </a>
                        <div class="dropdown-menu absolute hidden bg-white shadow-custom rounded-lg mt-2 py-2 w-48">
                            <a href="#services" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-primary">All Services</a>
                            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-primary">Cardiology</a>
                            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-primary">Neurology</a>
                            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-primary">Pediatrics</a>
                            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-primary">Orthopedics</a>
                        </div>
                    </div>
                    
                    <div class="dropdown relative">
                        <a href="#doctors" class="text-gray-700 hover:text-primary font-medium flex items-center">
                            Doctors <i class="fas fa-chevron-down ml-1 text-xs"></i>
                        </a>
                        <div class="dropdown-menu absolute hidden bg-white shadow-custom rounded-lg mt-2 py-2 w-48">
                            <a href="#doctors" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-primary">Our Team</a>
                            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-primary">Cardiologists</a>
                            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-primary">Neurologists</a>
                            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-primary">Pediatricians</a>
                        </div>
                    </div>
                    
                    <a href="#about" class="text-gray-700 hover:text-primary font-medium">About</a>
                    <a href="#testimonials" class="text-gray-700 hover:text-primary font-medium">Testimonials</a>
                    <a href="#appointment" class="text-gray-700 hover:text-primary font-medium">Appointment</a>
                </nav>

                <!-- CTA Button -->
                <div class="hidden md:block">
                    <a href="#appointment" class="bg-primary hover:bg-primary-dark text-white font-medium py-2 px-6 rounded-lg transition duration-300">Emergency: (555) 123-4567</a>
                </div>

                <!-- Mobile menu button -->
                <button id="mobile-menu-button" class="md:hidden text-gray-700 focus:outline-none">
                    <i class="fas fa-bars text-xl"></i>
                </button>
            </div>

            <!-- Mobile Navigation -->
            <div id="mobile-menu" class="hidden md:hidden pb-4">
                <a href="#" class="block py-2 text-gray-700 hover:text-primary font-medium">Home</a>
                
                <div class="dropdown-mobile">
                    <button class="flex items-center justify-between w-full py-2 text-gray-700 hover:text-primary font-medium">
                        Services <i class="fas fa-chevron-down text-xs"></i>
                    </button>
                    <div class="dropdown-mobile-menu pl-4 hidden">
                        <a href="#services" class="block py-2 text-gray-700 hover:text-primary">All Services</a>
                        <a href="#" class="block py-2 text-gray-700 hover:text-primary">Cardiology</a>
                        <a href="#" class="block py-2 text-gray-700 hover:text-primary">Neurology</a>
                        <a href="#" class="block py-2 text-gray-700 hover:text-primary">Pediatrics</a>
                    </div>
                </div>
                
                <div class="dropdown-mobile">
                    <button class="flex items-center justify-between w-full py-2 text-gray-700 hover:text-primary font-medium">
                        Doctors <i class="fas fa-chevron-down text-xs"></i>
                    </button>
                    <div class="dropdown-mobile-menu pl-4 hidden">
                        <a href="#doctors" class="block py-2 text-gray-700 hover:text-primary">Our Team</a>
                        <a href="#" class="block py-2 text-gray-700 hover:text-primary">Cardiologists</a>
                        <a href="#" class="block py-2 text-gray-700 hover:text-primary">Neurologists</a>
                    </div>
                </div>
                
                <a href="#about" class="block py-2 text-gray-700 hover:text-primary font-medium">About</a>
                <a href="#testimonials" class="block py-2 text-gray-700 hover:text-primary font-medium">Testimonials</a>
                <a href="#appointment" class="block py-2 text-gray-700 hover:text-primary font-medium">Appointment</a>
                <a href="#appointment" class="block mt-2 bg-primary text-white font-medium py-2 px-4 rounded-lg text-center">Emergency: (555) 123-4567</a>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="relative bg-gradient-to-r from-primary to-primary-dark text-white py-20 md:py-28">
        <div class="container mx-auto px-4 flex flex-col md:flex-row items-center">
            <div class="md:w-1/2 mb-10 md:mb-0">
                <h1 class="text-4xl md:text-5xl font-bold leading-tight mb-6">Your Health is Our <span class="text-accent">Priority</span></h1>
                <p class="text-xl mb-8 opacity-90">Providing exceptional medical care with compassion and cutting-edge technology. Our dedicated team is here to support your health journey.</p>
                <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
                    <a href="#appointment" class="bg-white text-primary hover:bg-gray-100 font-bold py-3 px-6 rounded-lg text-center transition duration-300">Book Appointment</a>
                    <a href="#services" class="bg-transparent border-2 border-white hover:bg-white hover:bg-opacity-10 font-bold py-3 px-6 rounded-lg text-center transition duration-300">Our Services</a>
                </div>
            </div>
            <div class="md:w-1/2 flex justify-center">
                <div class="relative">
                    <div class="bg-white rounded-full w-80 h-80 flex items-center justify-center shadow-2xl">
                        <img src="https://images.unsplash.com/photo-1586773860418-d37222d8fce3?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" alt="Doctor with patient" class="rounded-full w-72 h-72 object-cover">
                    </div>
                    <div class="absolute -bottom-4 -left-4 bg-accent text-dark font-bold py-2 px-6 rounded-lg shadow-lg">
                        24/7 Emergency Care
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-dark mb-4">Our Medical Services</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">We offer a comprehensive range of medical services to meet all your healthcare needs with state-of-the-art facilities and expert care.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Service Card 1 -->
                <div class="service-card bg-white rounded-xl shadow-custom overflow-hidden transition duration-300 hover:shadow-xl">
                    <div class="p-6">
                        <div class="service-icon w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mb-6">
                            <i class="fas fa-heartbeat text-primary text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-dark mb-3">Cardiology</h3>
                        <p class="text-gray-600 mb-4">Comprehensive heart care with state-of-the-art diagnostic tools and treatment options for all cardiac conditions.</p>
                        <a href="#" class="text-primary font-medium flex items-center">Learn More <i class="fas fa-arrow-right ml-2 text-sm"></i></a>
                    </div>
                </div>

                <!-- Service Card 2 -->
                <div class="service-card bg-white rounded-xl shadow-custom overflow-hidden transition duration-300 hover:shadow-xl">
                    <div class="p-6">
                        <div class="service-icon w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mb-6">
                            <i class="fas fa-brain text-secondary text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-dark mb-3">Neurology</h3>
                        <p class="text-gray-600 mb-4">Expert diagnosis and treatment for disorders of the nervous system, including stroke, epilepsy, and migraines.</p>
                        <a href="#" class="text-primary font-medium flex items-center">Learn More <i class="fas fa-arrow-right ml-2 text-sm"></i></a>
                    </div>
                </div>

                <!-- Service Card 3 -->
                <div class="service-card bg-white rounded-xl shadow-custom overflow-hidden transition duration-300 hover:shadow-xl">
                    <div class="p-6">
                        <div class="service-icon w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mb-6">
                            <i class="fas fa-baby text-accent text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-dark mb-3">Pediatrics</h3>
                        <p class="text-gray-600 mb-4">Compassionate care for children of all ages, from routine checkups to specialized treatments.</p>
                        <a href="#" class="text-primary font-medium flex items-center">Learn More <i class="fas fa-arrow-right ml-2 text-sm"></i></a>
                    </div>
                </div>

                <!-- Service Card 4 -->
                <div class="service-card bg-white rounded-xl shadow-custom overflow-hidden transition duration-300 hover:shadow-xl">
                    <div class="p-6">
                        <div class="service-icon w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mb-6">
                            <i class="fas fa-bone text-purple-500 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-dark mb-3">Orthopedics</h3>
                        <p class="text-gray-600 mb-4">Advanced treatments for bone and joint conditions, including sports injuries and joint replacement.</p>
                        <a href="#" class="text-primary font-medium flex items-center">Learn More <i class="fas fa-arrow-right ml-2 text-sm"></i></a>
                    </div>
                </div>

                <!-- Service Card 5 -->
                <div class="service-card bg-white rounded-xl shadow-custom overflow-hidden transition duration-300 hover:shadow-xl">
                    <div class="p-6">
                        <div class="service-icon w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mb-6">
                            <i class="fas fa-eye text-indigo-500 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-dark mb-3">Ophthalmology</h3>
                        <p class="text-gray-600 mb-4">Complete eye care services from routine vision exams to advanced surgical procedures.</p>
                        <a href="#" class="text-primary font-medium flex items-center">Learn More <i class="fas fa-arrow-right ml-2 text-sm"></i></a>
                    </div>
                </div>

                <!-- Service Card 6 -->
                <div class="service-card bg-white rounded-xl shadow-custom overflow-hidden transition duration-300 hover:shadow-xl">
                    <div class="p-6">
                        <div class="service-icon w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mb-6">
                            <i class="fas fa-ambulance text-red-500 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-dark mb-3">Emergency Care</h3>
                        <p class="text-gray-600 mb-4">24/7 emergency services with a dedicated team ready to handle any medical crisis.</p>
                        <a href="#" class="text-primary font-medium flex items-center">Learn More <i class="fas fa-arrow-right ml-2 text-sm"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="flex flex-col lg:flex-row items-center">
                <div class="lg:w-1/2 mb-12 lg:mb-0 lg:pr-12">
                    <h2 class="text-3xl md:text-4xl font-bold text-dark mb-6">Why Choose <span class="text-primary">MediCare</span> Hospital?</h2>
                    <p class="text-gray-600 mb-6">For over 25 years, MediCare Hospital has been providing exceptional healthcare services to our community. Our commitment to excellence and patient-centered approach sets us apart.</p>
                    <p class="text-gray-600 mb-8">We combine cutting-edge medical technology with compassionate care to ensure the best possible outcomes for our patients.</p>

                    <div class="space-y-4 mb-8">
                        <div class="flex items-center">
                            <i class="fas fa-check-circle text-secondary mr-3"></i>
                            <span class="text-gray-700">Board-certified physicians and specialists</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-check-circle text-secondary mr-3"></i>
                            <span class="text-gray-700">State-of-the-art medical equipment</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-check-circle text-secondary mr-3"></i>
                            <span class="text-gray-700">24/7 emergency services</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-check-circle text-secondary mr-3"></i>
                            <span class="text-gray-700">Patient-centered approach to care</span>
                        </div>
                    </div>

                    <a href="#appointment" class="bg-primary hover:bg-primary-dark text-white font-medium py-3 px-6 rounded-lg inline-flex items-center transition duration-300">
                        Learn More <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>

                <div class="lg:w-1/2">
                    <div class="grid grid-cols-2 gap-4">
                        <div class="rounded-xl overflow-hidden shadow-custom">
                            <img src="https://images.unsplash.com/photo-1551601651-2a8555f1a136?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" alt="Hospital facility" class="w-full h-64 object-cover">
                        </div>
                        <div class="rounded-xl overflow-hidden shadow-custom mt-8">
                            <img src="https://images.unsplash.com/photo-1532938911079-1b06ac7ceec7?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" alt="Medical equipment" class="w-full h-64 object-cover">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Doctors Section -->
    <section id="doctors" class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-dark mb-4">Meet Our Specialists</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Our team of experienced doctors and specialists are dedicated to providing you with the highest quality medical care.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Doctor 1 -->
                <div class="doctor-card bg-white rounded-xl shadow-custom overflow-hidden transition duration-300 hover:shadow-xl">
                    <div class="overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1612349317150-e413f6a5b16d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" alt="Dr. Sarah Johnson" class="w-full h-64 object-cover transition duration-500">
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-dark mb-1">Dr. Sarah Johnson</h3>
                        <p class="text-primary font-medium mb-3">Cardiologist</p>
                        <p class="text-gray-600 text-sm mb-4">15+ years of experience in treating heart conditions with a focus on preventive care.</p>
                        <div class="flex space-x-3">
                            <a href="#" class="text-gray-500 hover:text-primary"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#" class="text-gray-500 hover:text-primary"><i class="fab fa-twitter"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Doctor 2 -->
                <div class="doctor-card bg-white rounded-xl shadow-custom overflow-hidden transition duration-300 hover:shadow-xl">
                    <div class="overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1559839734-2b71ea197ec2?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" alt="Dr. Michael Chen" class="w-full h-64 object-cover transition duration-500">
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-dark mb-1">Dr. Michael Chen</h3>
                        <p class="text-primary font-medium mb-3">Neurologist</p>
                        <p class="text-gray-600 text-sm mb-4">Specialized in stroke treatment and neurological disorders with innovative approaches.</p>
                        <div class="flex space-x-3">
                            <a href="#" class="text-gray-500 hover:text-primary"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#" class="text-gray-500 hover:text-primary"><i class="fab fa-twitter"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Doctor 3 -->
                <div class="doctor-card bg-white rounded-xl shadow-custom overflow-hidden transition duration-300 hover:shadow-xl">
                    <div class="overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1594824947933-d0501ba2fe65?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" alt="Dr. Emily Rodriguez" class="w-full h-64 object-cover transition duration-500">
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-dark mb-1">Dr. Emily Rodriguez</h3>
                        <p class="text-primary font-medium mb-3">Pediatrician</p>
                        <p class="text-gray-600 text-sm mb-4">Dedicated to children's health with a gentle approach and extensive experience.</p>
                        <div class="flex space-x-3">
                            <a href="#" class="text-gray-500 hover:text-primary"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#" class="text-gray-500 hover:text-primary"><i class="fab fa-twitter"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Doctor 4 -->
                <div class="doctor-card bg-white rounded-xl shadow-custom overflow-hidden transition duration-300 hover:shadow-xl">
                    <div class="overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1612349317150-e413f6a5b16d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" alt="Dr. James Wilson" class="w-full h-64 object-cover transition duration-500">
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-dark mb-1">Dr. James Wilson</h3>
                        <p class="text-primary font-medium mb-3">Orthopedic Surgeon</p>
                        <p class="text-gray-600 text-sm mb-4">Expert in joint replacement and sports medicine with advanced surgical techniques.</p>
                        <div class="flex space-x-3">
                            <a href="#" class="text-gray-500 hover:text-primary"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#" class="text-gray-500 hover:text-primary"><i class="fab fa-twitter"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials" class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-dark mb-4">Patient Testimonials</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Hear what our patients have to say about their experience at MediCare Hospital.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Testimonial 1 -->
                <div class="bg-gray-50 rounded-xl p-8 shadow-custom">
                    <div class="flex items-center mb-6">
                        <div class="w-16 h-16 bg-primary rounded-full flex items-center justify-center text-white font-bold text-xl mr-4">
                            RM
                        </div>
                        <div>
                            <h4 class="font-bold text-dark">Robert Martinez</h4>
                            <p class="text-gray-600">Cardiac Patient</p>
                        </div>
                    </div>
                    <p class="text-gray-700 italic mb-4">"The care I received at MediCare Hospital was exceptional. The staff was attentive, and Dr. Johnson explained everything clearly. My heart surgery went smoothly, and I'm recovering well."</p>
                    <div class="flex text-yellow-400">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>

                <!-- Testimonial 2 -->
                <div class="bg-gray-50 rounded-xl p-8 shadow-custom">
                    <div class="flex items-center mb-6">
                        <div class="w-16 h-16 bg-secondary rounded-full flex items-center justify-center text-white font-bold text-xl mr-4">
                            JL
                        </div>
                        <div>
                            <h4 class="font-bold text-dark">Jennifer Lee</h4>
                            <p class="text-gray-600">Neurology Patient</p>
                        </div>
                    </div>
                    <p class="text-gray-700 italic mb-4">"From the emergency room to my follow-up appointments, every interaction was professional and caring. The neurology team helped me through a difficult time with my migraine condition."</p>
                    <div class="flex text-yellow-400">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Appointment Section -->
    <section id="appointment" class="py-20 gradient-bg text-white">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <div class="text-center mb-12">
                    <h2 class="text-3xl md:text-4xl font-bold mb-4">Book an Appointment</h2>
                    <p class="text-xl opacity-90">Schedule your visit with our specialists. We're here to help you with your healthcare needs.</p>
                </div>

                <form class="bg-white rounded-2xl shadow-2xl p-8 md:p-10">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-gray-700 font-medium mb-2" for="name">Full Name</label>
                            <input type="text" id="name" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" placeholder="Your Name">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-2" for="email">Email Address</label>
                            <input type="email" id="email" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" placeholder="Your Email">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-2" for="phone">Phone Number</label>
                            <input type="tel" id="phone" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" placeholder="Your Phone">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-2" for="department">Department</label>
                            <select id="department" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                                <option value="">Select Department</option>
                                <option value="cardiology">Cardiology</option>
                                <option value="neurology">Neurology</option>
                                <option value="pediatrics">Pediatrics</option>
                                <option value="orthopedics">Orthopedics</option>
                                <option value="ophthalmology">Ophthalmology</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-2" for="date">Preferred Date</label>
                            <input type="date" id="date" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-2" for="time">Preferred Time</label>
                            <select id="time" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                                <option value="">Select Time</option>
                                <option value="09:00">09:00 AM</option>
                                <option value="10:00">10:00 AM</option>
                                <option value="11:00">11:00 AM</option>
                                <option value="12:00">12:00 PM</option>
                                <option value="14:00">02:00 PM</option>
                                <option value="15:00">03:00 PM</option>
                                <option value="16:00">04:00 PM</option>
                            </select>
                        </div>
                    </div>
                    <div class="mt-6">
                        <label class="block text-gray-700 font-medium mb-2" for="message">Message (Optional)</label>
                        <textarea id="message" rows="4" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" placeholder="Any additional information..."></textarea>
                    </div>
                    <div class="mt-8">
                        <button type="submit" class="w-full bg-primary hover:bg-primary-dark text-white font-bold py-4 px-6 rounded-lg transition duration-300">Book Appointment</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white pt-16 pb-8">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
                <!-- Column 1 -->
                <div>
                    <div class="flex items-center space-x-2 mb-6">
                        <div class="w-10 h-10 bg-primary rounded-full flex items-center justify-center">
                            <i class="fas fa-hospital text-white text-xl"></i>
                        </div>
                        <span class="text-2xl font-bold text-white">MediCare</span>
                    </div>
                    <p class="text-gray-400 mb-6">Providing exceptional healthcare with compassion and cutting-edge technology for over 25 years.</p>
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-primary transition duration-300">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-primary transition duration-300">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-primary transition duration-300">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-primary transition duration-300">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>

                <!-- Column 2 -->
                <div>
                    <h3 class="text-xl font-bold mb-6">Quick Links</h3>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Home</a></li>
                        <li><a href="#services" class="text-gray-400 hover:text-white transition duration-300">Services</a></li>
                        <li><a href="#about" class="text-gray-400 hover:text-white transition duration-300">About Us</a></li>
                        <li><a href="#doctors" class="text-gray-400 hover:text-white transition duration-300">Doctors</a></li>
                        <li><a href="#appointment" class="text-gray-400 hover:text-white transition duration-300">Appointment</a></li>
                    </ul>
                </div>

                <!-- Column 3 -->
                <div>
                    <h3 class="text-xl font-bold mb-6">Services</h3>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Cardiology</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Neurology</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Pediatrics</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Orthopedics</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Emergency Care</a></li>
                    </ul>
                </div>

                <!-- Column 4 -->
                <div>
                    <h3 class="text-xl font-bold mb-6">Contact Us</h3>
                    <ul class="space-y-4">
                        <li class="flex items-start">
                            <i class="fas fa-map-marker-alt text-primary mt-1 mr-3"></i>
                            <span class="text-gray-400">123 Healthcare Ave, Medical City, MC 12345</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-phone text-primary mr-3"></i>
                            <span class="text-gray-400">+1 (555) 123-4567</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-envelope text-primary mr-3"></i>
                            <span class="text-gray-400">info@medicarehospital.com</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-clock text-primary mr-3"></i>
                            <span class="text-gray-400">24/7 Emergency Services</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="pt-8 border-t border-gray-800 text-center">
                <p class="text-gray-400">&copy; 2023 MediCare Hospital. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // Mobile menu functionality
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.toggle('hidden');
        });

        // Mobile dropdown functionality
        const mobileDropdownButtons = document.querySelectorAll('.dropdown-mobile button');
        mobileDropdownButtons.forEach(button => {
            button.addEventListener('click', function() {
                const dropdownMenu = this.nextElementSibling;
                dropdownMenu.classList.toggle('hidden');
                this.parentElement.classList.toggle('active');
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
                        top: targetElement.offsetTop - 100,
                        behavior: 'smooth'
                    });
                }
            });
        });
    </script>
</body>
</html>
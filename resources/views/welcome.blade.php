<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Global Placements Manpower Agency</title>
    <!-- Inter Font from Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        :root {
            --gold: #D4AF37; /* A rich, classic gold */
        }
        body {
            font-family: 'Inter', sans-serif;
            scroll-behavior: smooth;
        }
        /* Custom gold color for Tailwind CSS */
        .gold-text { color: var(--gold); }
        .gold-bg { background-color: var(--gold); }
        .gold-border { border-color: var(--gold); }

        /* Custom scrollbar for a modern look */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #111827; /* Dark background */
        }
        ::-webkit-scrollbar-thumb {
            background-color: var(--gold);
            border-radius: 4px;
            border: 2px solid #1f2937; /* Border to separate from track */
        }
        ::-webkit-scrollbar-thumb:hover {
            background-color: #e5b95d; /* Lighter gold on hover */
        }
        
        .hero-bg {
            background-image: url('https://placehold.co/1920x1080/000000/D4AF37?text=Secure+Global+Placements');
            background-size: cover;
            background-position: center;
        }
    </style>
</head>
<body class="bg-gray-900 text-gray-300">

    <!-- Header & Navigation -->
    <header class="bg-gray-900 bg-opacity-90 sticky top-0 z-50 shadow-lg">
       <nav class="container mx-auto px-4 py-4 flex justify-between items-center">
            <a href="#" class="flex items-center text-xl font-semibold gold-text">
                <img src="{{ asset('images/sgplogo.png') }}" alt="SGP Logo" class="h-14 w-auto mr-1">
                SGP
            </a>
            <div class="hidden md:flex space-x-4 items-center">
                <a href="#about" class="hover:gold-text transition duration-300">Hiring</a>
                <a href="#services" class="hover:gold-text transition duration-300">About Us</a>
                <a href="#contact" class="hover:gold-text transition duration-300">Contact</a>

                @if (Route::has('login'))
                    <nav class="flex items-center justify-end gap-4">
                        @auth
                            <a href="{{ route('login') }}" class="inline-block px-4 py-1.5 rounded-lg border gold-border hover:gold-bg hover:text-gray-900 transition duration-300">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="inline-block px-4 py-1.5 rounded-lg border gold-border hover:gold-bg hover:text-gray-900 transition duration-300">Log in</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="inline-block px-4 py-1.5 rounded-lg gold-bg text-gray-900 font-bold hover:bg-yellow-400 transition duration-300">Register</a>
                            @endif
                        @endauth
                    </nav>
                @endif                
            </div>
            <!-- Mobile Menu Button -->
            <button id="menu-btn" class="md:hidden text-gray-300 focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>
        </nav>
        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-gray-800 bg-opacity-90 py-4">
            <a href="#about" class="block px-4 py-2 hover:gold-text transition duration-300 border-b border-gray-700">About Us</a>
            <a href="#services" class="block px-4 py-2 hover:gold-text transition duration-300 border-b border-gray-700">Services</a>
            <a href="#contact" class="block px-4 py-2 hover:gold-text transition duration-300 border-b border-gray-700">Contact</a>
            <div class="flex flex-col items-center mt-4 space-y-2">
                <a href="#" class="block px-4 py-2 rounded-lg border gold-border text-center w-3/4 hover:gold-bg hover:text-gray-900 transition duration-300">Log in</a>
                <a href="#" class="block px-4 py-2 rounded-lg gold-bg text-gray-900 font-bold text-center w-3/4 hover:bg-yellow-400 transition duration-300">Register</a>
            </div>
        </div>
    </header>

    <main>
        <!-- Hero Section -->
        <section id="hero" 
            class="relative h-screen" 
            style="background-image: url('{{ asset('images/background.png') }}'); background-size: cover; background-position: center;">

            <style>
                @media (max-width: 768px) {
                    #hero {
                        background-image: url('{{ asset('images/mobile.png') }}') !important;
                    }
                }
            </style>

            <a href="{{ route('register') }}" 
            class="absolute bottom-[2%] left-[25%] gold-bg text-gray-900 font-bold py-3 px-8 rounded-full shadow-lg hover:bg-yellow-400 transition duration-300 transform hover:scale-105">
                Apply Now
            </a>
        </section>


        <section id="about" class="flex justify-center">
            <img src="images/hiring.png" alt="Now Hiring" class="w-full">
        </section>

        <section id="services" class="py-20 md:py-32 bg-gray-800">
            <div class="w-[90%] mx-auto">
                <h2 class="text-3xl md:text-4xl font-bold gold-text mb-8 text-center">
                    About Our Agency
                </h2>

                <div class="flex flex-col md:flex-row items-stretch bg-gray-800 rounded-lg shadow-xl border gold-border overflow-hidden">
                    <!-- Left Image -->
                    <div class="md:w-1/4 h-60 md:h-auto">
                        <img src="{{ asset('images/company.png') }}" alt="Company" class="w-full h-full object-cover">
                    </div>

                    <!-- Right Content -->
                    <div class="md:w-3/4 p-8 flex flex-col justify-center">
                        <p class="text-lg mb-4 text-gray-300 leading-relaxed">
                            <strong>Confederal Project Manpower Services, Inc.</strong> (CPMSI) is a trusted manpower agency located at 
                            <strong>1653-A Taft Avenue, Malate, Manila, Philippines</strong>, proudly holding 
                            <strong>POEA License No. 100-LB-090722-R</strong>. For several years, we have successfully deployed 
                            qualified applicants abroad, helping them achieve their dreams and improve their lives.
                        </p>

                        <p class="text-lg mb-4 text-gray-300 leading-relaxed">
                            <strong>SGP</strong> (Secure Global Placement) is an innovative initiative by <strong>CPMSI</strong> (Confederal Project Manpower Services Inc.) aimed at streamlining the search for aspiring applicants across the Philippines. Through SGP, we connect them with global opportunities faster and more efficiently.
                        </p>
                        <p class="text-lg mb-4 text-gray-300 leading-relaxed">
                            We conduct the <strong>initial interviews</strong> to ensure only qualified candidates proceed to the next stages, saving both applicants and employers valuable time.
                        </p>
                        <p class="text-lg text-gray-300 leading-relaxed">
                            We provide complete assistance to our applicants — from passport processing, travel fare to Manila, 
                            accommodation, daily allowance, and training, all the way until they successfully fly abroad. 
                            And the best part — <strong>everything is FREE</strong>.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact Section -->
        <section id="contact" class="py-20 md:py-32 bg-gray-900 text-white">
            <div class="w-[90%] max-w-6xl mx-auto text-center">
                <h2 class="text-3xl md:text-4xl font-bold text-yellow-500 mb-12">Contact Us</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-10">

                    <div class="space-y-6">
                        <a href="https://facebook.com/YOUR_PAGE" target="_blank" class="block">
                            <div class="flex items-center p-6 bg-gray-800 rounded-lg shadow-xl border border-yellow-500 transition duration-300 ease-in-out hover:bg-gray-700">
                                <div class="w-12 h-12 flex items-center justify-center bg-yellow-500 text-gray-900 rounded-full flex-shrink-0">
                                    <i class="fab fa-facebook-f text-xl"></i>
                                </div>
                                <a href="https://www.facebook.com/profile.php?id=61579126607618" target="_blank" class="ml-6 text-left"> 
                                    <h3 class="text-lg font-semibold text-yellow-500">Facebook</h3>
                                    <p class="text-gray-300">Secure Global Placements</p>
                                </a>
                            </div>
                        </a>

                        <a href="tel:+639271550757" class="block">
                            <div class="flex items-center p-6 bg-gray-800 rounded-lg shadow-xl border border-yellow-500 transition duration-300 ease-in-out hover:bg-gray-700">
                                <div class="w-12 h-12 flex items-center justify-center bg-yellow-500 text-gray-900 rounded-full flex-shrink-0">
                                    <i class="fas fa-phone-alt text-xl"></i>
                                </div>
                                <div class="ml-6 text-left">
                                    <h3 class="text-lg font-semibold text-yellow-500">Phone</h3>
                                    <p class="text-gray-300">09271550757</p>
                                </div>
                            </div>
                        </a>

                        <a href="mailto:youremail@example.com" class="block">
                            <div class="flex items-center p-6 bg-gray-800 rounded-lg shadow-xl border border-yellow-500 transition duration-300 ease-in-out hover:bg-gray-700">
                                <div class="w-12 h-12 flex items-center justify-center bg-yellow-500 text-gray-900 rounded-full flex-shrink-0">
                                    <i class="fas fa-envelope text-xl"></i>
                                </div>
                                <div class="ml-6 text-left">
                                    <h3 class="text-lg font-semibold text-yellow-500">Email</h3>
                                    <p class="text-gray-300">sgp.cpmsi@gmail.com</p>
                                </div>
                            </div>
                        </a>

                        <div class="flex items-center p-6 bg-gray-800 rounded-lg shadow-xl border border-yellow-500">
                            <div class="w-12 h-12 flex items-center justify-center bg-yellow-500 text-gray-900 rounded-full flex-shrink-0">
                                <i class="fas fa-map-marker-alt text-xl"></i>
                            </div>
                            <div class="ml-6 text-left">
                                <h3 class="text-lg font-semibold text-yellow-500">Address</h3>
                                <p class="text-gray-300">Confederal Project Manpower Services Inc., 1653-A Taft Avenue, Malate, Manila</p>
                            </div>
                        </div>
                    </div>

                    <div class="w-full h-120 rounded-lg overflow-hidden border border-yellow-500 shadow-xl">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3861.4145989020053!2d120.98591567515177!3d14.575435685907955!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c9876ffc33ad%3A0xf26432bb3952784a!2sConfederal%20Project!5e0!3m2!1sen!2sph!4v1755045087899!5m2!1sen!2sph" width="600" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <div class="flex justify-center mt-8">
        <a href="{{ route('register') }}" 
            class="gold-bg text-gray-900 font-bold py-3 px-8 rounded-full shadow-lg hover:bg-yellow-400 transition duration-300 transform hover:scale-105">
            Apply Now
        </a>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-900 py-8 text-center text-gray-400">
        <div class="container mx-auto px-4">
            <p>&copy; 2025 Secure Global Placements. All rights reserved.</p>
        </div>
    </footer>

    <!-- JavaScript for Mobile Menu and Form -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const menuBtn = document.getElementById('menu-btn');
            const mobileMenu = document.getElementById('mobile-menu');
            const navLinks = document.querySelectorAll('header a');
            const contactForm = document.getElementById('contact-form');
            const formMessage = document.getElementById('form-message');

            // Toggle mobile menu visibility
            menuBtn.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });

            // Smooth scroll for navigation links
            navLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    if (this.hash !== "") {
                        e.preventDefault();
                        const hash = this.hash;
                        const targetElement = document.querySelector(hash);
                        if (targetElement) {
                            window.scrollTo({
                                top: targetElement.offsetTop,
                                behavior: 'smooth'
                            });
                            // Close mobile menu if it's open
                            if (!mobileMenu.classList.contains('hidden')) {
                                mobileMenu.classList.add('hidden');
                            }
                        }
                    }
                });
            });

            // Handle contact form submission (basic example)
            contactForm.addEventListener('submit', function(e) {
                e.preventDefault();
                // In a real application, you would send this data to a server
                // using `fetch()` or `XMLHttpRequest`.
                
                // Show success message
                formMessage.classList.remove('hidden');
                
                // Clear the form fields after a delay
                setTimeout(() => {
                    contactForm.reset();
                    formMessage.classList.add('hidden');
                }, 3000);
            });
        });
    </script>
</body>
</html>

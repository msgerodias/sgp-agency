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
                <a href="#about" class="hover:gold-text transition duration-300">About Us</a>
                <a href="#services" class="hover:gold-text transition duration-300">Services</a>
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
            
            <a href="{{ route('register') }}" 
            class="absolute bottom-[2%] left-[25%] gold-bg text-gray-900 font-bold py-3 px-8 rounded-full shadow-lg hover:bg-yellow-400 transition duration-300 transform hover:scale-105">
                Apply Now
            </a>
        </section>

        <section id="about" class="py-20 md:py-32 container mx-auto px-4">
            <h2 class="text-3xl md:text-4xl font-bold gold-text mb-8 text-center">About Our Agency</h2>

            <div class="flex flex-col md:flex-row items-stretch bg-gray-800 rounded-lg shadow-xl border gold-border overflow-hidden">
                <!-- Left Image (smaller width) -->
                <div class="md:w-1/3 h-60 md:h-auto">
                    <img src="{{ asset('images/company.png') }}" alt="Company" class="w-full h-full object-cover">
                </div>

                <!-- Right Content (more space) -->
                <div class="md:w-2/3 p-8 flex flex-col justify-center">
                    <p class="text-lg mb-4 text-gray-300 leading-relaxed">
                        <strong>SGP</strong> (Secure Global Placement) is an innovative initiative by <strong>CPMSI</strong> (Confederal Project Manpower Services Inc.) aimed at streamlining the search for aspiring applicants across the Philippines. Through SGP, we connect them with global opportunities faster and more efficiently.
                    </p>
                    <p class="text-lg mb-4 text-gray-300 leading-relaxed">
                        We conduct the <strong>initial interviews</strong> to ensure only qualified candidates proceed to the next stages, saving both applicants and employers valuable time.
                    </p>
                    <p class="text-lg text-gray-300 leading-relaxed">
                        Using our secure online platform, we make sure applicants’ information is stored safely and they are updated in real-time about their application status — never leaving them hanging.
                    </p>
                </div>

            </div>
        </section>


<!-- Services Section -->
<section id="services" class="py-20 md:py-32 bg-gray-800">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl md:text-4xl font-bold gold-text mb-12">Our Services</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto">
            
            <!-- Service 1 -->
            <div class="bg-gray-900 p-8 rounded-lg shadow-xl border gold-border transform hover:scale-105 transition duration-300">
                <svg class="w-16 h-16 gold-text mx-auto mb-4" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"></path>
                </svg>
                <h3 class="text-xl font-semibold gold-text mb-2">Applicant Screening & Initial Interviews</h3>
                <p class="text-gray-300">
                    We conduct thorough initial interviews to ensure only qualified and prepared applicants move forward, helping both candidates and employers save valuable time.
                </p>
            </div>
            
            <!-- Service 2 -->
            <div class="bg-gray-900 p-8 rounded-lg shadow-xl border gold-border transform hover:scale-105 transition duration-300">
                <svg class="w-16 h-16 gold-text mx-auto mb-4" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm0 13c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2z"></path>
                </svg>
                <h3 class="text-xl font-semibold gold-text mb-2">Real-Time Application Tracking</h3>
                <p class="text-gray-300">
                    Our online platform securely stores applicant information and provides real-time updates, ensuring no candidate is left wondering about their status.
                </p>
            </div>
            
            <!-- Service 3 -->
            <div class="bg-gray-900 p-8 rounded-lg shadow-xl border gold-border transform hover:scale-105 transition duration-300">
                <svg class="w-16 h-16 gold-text mx-auto mb-4" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M20 6h-2.18c.11-.31.18-.65.18-1 0-1.66-1.34-3-3-3s-3 1.34-3 3c0 .35.07.69.18 1H8c.11-.31.18-.65.18-1 0-1.66-1.34-3-3-3s-3 1.34-3 3c0 .35.07.69.18 1H4c-1.11 0-1.99.89-1.99 2L2 19c0 1.11.89 2 2 2h16c1.11 0 2-.89 2-2V8c0-1.11-.89-2-2-2zm-5-3c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1zM5 5c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1zm15 14H4V8h16v11z"></path>
                </svg>
                <h3 class="text-xl font-semibold gold-text mb-2">Overseas Placement & Support</h3>
                <p class="text-gray-300">
                    From matching applicants with international employers to assisting with visa and travel requirements, we ensure a smooth journey to global opportunities.
                </p>
            </div>

        </div>
    </div>
</section>


        <!-- Contact Section -->
        <section id="contact" class="py-20 md:py-32 container mx-auto px-4">
            <div class="max-w-xl mx-auto text-center">
                <h2 class="text-3xl md:text-4xl font-bold gold-text mb-12">Contact Us</h2>
                <div class="bg-gray-800 p-8 rounded-lg shadow-xl border gold-border">
                    <form id="contact-form" class="space-y-6">
                        <div>
                            <input type="text" id="name" placeholder="Your Name" class="w-full p-3 rounded-lg bg-gray-700 text-gray-200 focus:outline-none focus:ring-2 focus:ring-yellow-400 border border-gray-600" required>
                        </div>
                        <div>
                            <input type="email" id="email" placeholder="Your Email" class="w-full p-3 rounded-lg bg-gray-700 text-gray-200 focus:outline-none focus:ring-2 focus:ring-yellow-400 border border-gray-600" required>
                        </div>
                        <div>
                            <textarea id="message" rows="5" placeholder="Your Message" class="w-full p-3 rounded-lg bg-gray-700 text-gray-200 focus:outline-none focus:ring-2 focus:ring-yellow-400 border border-gray-600" required></textarea>
                        </div>
                        <button type="submit" class="w-full gold-bg text-gray-900 font-bold py-3 rounded-lg shadow-lg hover:bg-yellow-400 transition duration-300 transform hover:scale-105">
                            Send Message
                        </button>
                    </form>
                    <div id="form-message" class="mt-6 hidden text-center p-4 rounded-lg gold-bg text-gray-900 font-bold">
                        Thank you for your message! We will get back to you shortly.
                    </div>
                </div>
            </div>
        </section>
    </main>

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

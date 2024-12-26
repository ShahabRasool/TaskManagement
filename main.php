<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Management System</title>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Continuous upward animation */
        @keyframes continuousUp {
            0% {
                transform: translateY(0);
            }
            100% {
                transform: translateY(-20px);
            }
        }
        /* Apply the animation */
        .animate-up {
            animation: continuousUp 2s ease-in-out infinite alternate;
        }
        .logo {
    transition: transform 0.3s ease-in-out; 
}

    </style>
</head>

<body class="bg-gray-900 text-white">
    <!-- Navigation Bar -->
    <nav class="container mx-auto relative  flex justify-between lg:flex lg:justify-between lg:px-20 items-center lg:px-14 p-4 md:p-6 bg-teal-500 rounded-md shadow-md">
        <div class="text-2xl font-bold text-yellow-300">SAAS</div>
        <div class="logo hidden bg-green-400 absolute  lg:bg-transparent lg:rounded-0 lg:shadow-0 translate-y-[-2000px] top-[80px] w-full lg:top-0  left-0 p-6 xl:p-0 rounded-lg shadow-lg xl:shadow-none xl:rounded-0 md:relative md:translate-y-0 md:flex md:items-center md:justify-between md:bg-green-500  md:space-x-6">
    <div class="flex flex-col md:flex-row md:gap-4 gap-6 xl:justify-center xl:w-[60%] ">
        <a href="#home" class=" text-white py-2 px-4 rounded hover:bg-blue-700 md:py-3 md:px-6">
            Home
        </a>
        <a href="#features" class=" text-white py-2 px-4 rounded hover:bg-blue-700 md:py-3 md:px-6">
            Features
        </a>
        <a href="#cta" class=" text-white py-2 px-4 rounded hover:bg-blue-700 md:py-3 md:px-6">
            Get Started
        </a>
    </div>
    <div class="flex flex-col md:flex-row md:gap-4 gap-6 mt-4 md:mt-0">
        <a href="admin.php?page=login" class="bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700 md:py-3 md:px-6">
            Sign In
        </a>
        <a href="#" class="bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700 md:py-3 md:px-6">
            Sign Up
        </a>
    </div>
</div>

        <div class="hamburger  w-[25px] h-[20px] flex justify-between flex-col justify-self-end  col-start-3 col-span-2 xl:hidden "> 
        <div class="line top w-full bg-[#000000] h-[3px]  rounded-full "></div>
        <!-- rotate-45 translate-y-[8px] -->
        <div class="line middle w-full bg-[#000000] h-[3px] rounded-full"></div>
        <!-- scale-0 -->
        <div class="line buttom w-full bg-[#000000] h-[3px] rounded-full"></div>
        <!-- rotate-[-45deg] translate-y-[-8px] -->
    </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="container mx-auto grid grid-cols-1 md:grid-cols-2 gap-8 items-center p-8 lg:p-16">
        <!-- Text Content -->
        <div class="text-center md:text-left space-y-6 max-w-lg mx-auto md:mx-0">
            <h1 class="text-4xl md:text-5xl font-bold text-yellow-300">Better Solutions For Your Website</h1>
            <p class="text-lg text-blue-200">We help companies achieve ambitious goals with innovative solutions.</p>
            <div class="space-x-4 mt-4">
                <!-- <a href="#cta" class="bg-yellow-400 text-gray-900 py-2 px-6 rounded-lg hover:bg-yellow-500">Get Started</a> -->
                <a href="#" class="bg-transparent border-2 border-yellow-400 text-yellow-400 py-2 px-6 rounded-lg hover:bg-yellow-500 hover:text-gray-900">Get in Touch</a>
            </div>
        </div>

        <!-- Image -->
        <div class="shadow-lg" style="box-shadow: 0 10px 15px -3px rgba(255, 255, 0, 0.4);">
    <div data-aos="fade-down">
        
        <img src="why-us.png" alt="Hero Image" class="w-full animate-up h-auto object-cover rounded-lg transform transition-transform duration-300 hover:scale-110">
    </div>
</div>


    </section>

    <!-- Features Section -->
    <section id="features" class="container mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 p-8 lg:p-16">
        <div class="bg-gray-800 p-6 rounded-lg shadow-lg text-center">
            <!-- <img src="feature1.png" alt="Feature 1" class="mx-auto mb-4 w-16 h-16"> -->
            <h2 class="text-xl font-semibold text-yellow-300">Feature 1</h2>
            <p class="text-blue-200 mt-2">Description of feature 1 that highlights its benefits and why it’s great.</p>
        </div>
        <div class="bg-gray-800 p-6 rounded-lg shadow-lg text-center">
            <!-- <img src="feature2.png" alt="Feature 2" class="mx-auto mb-4 w-16 h-16"> -->
            <h2 class="text-xl font-semibold text-yellow-300">Feature 2</h2>
            <p class="text-blue-200 mt-2">Description of feature 2 that highlights its benefits and why it’s great.</p>
        </div>
        <div class="bg-gray-800 p-6 rounded-lg shadow-lg text-center">
            <!-- <img src="feature3.png" alt="Feature 3" class="mx-auto mb-4 w-16 h-16"> -->
            <h2 class="text-xl font-semibold text-yellow-300">Feature 3</h2>
            <p class="text-blue-200 mt-2">Description of feature 3 that highlights its benefits and why it’s great.</p>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section id="cta" class="bg-teal-600 text-white text-center py-12">
        <div class="container mx-auto">
            <h2 class="text-3xl font-bold">Ready to take your Website to the next level?</h2>
            <p class="text-lg text-gray-100 mt-4">Join thousands of companies that trust us to drive their success.</p>
            <a href="#" class="mt-6 inline-block bg-yellow-400 text-gray-900 py-3 px-8 rounded-lg hover:bg-yellow-500">Start Free Trial</a>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="cta" class="container mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 p-8 lg:p-16">
        <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
            <p class="text-lg text-blue-200">"This management system transformed the way we handle our projects. Highly recommend!"</p>
            <div class="mt-4 text-yellow-300 font-bold">- Azmat shah, CEO</div>
        </div>
        <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
            <p class="text-lg text-blue-200">"A game-changer for our team. It has everything we need in one place."</p>
            <div class="mt-4 text-yellow-300 font-bold">- Naveed khan, Project Manager</div>
        </div>
        <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
            <p class="text-lg text-blue-200">"Incredibly easy to use and has streamlined our workflow significantly."</p>
            <div class="mt-4 text-yellow-300 font-bold">- Alanoor khan, Operations Director</div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-gray-400 text-center py-6">
        <div class="container mx-auto">
            <p>&copy; 2024 Your Company. All rights reserved.</p>
            <div class="flex justify-center space-x-4 mt-4">
                <a href="#" class="hover:text-white">Privacy Policy</a>
                <a href="#" class="hover:text-white">Terms of Service</a>
                <a href="#" class="hover:text-white">Contact Us</a>
            </div>
        </div>
    </footer>

    <!-- AOS Library JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script>
let logo = document.querySelector('.hamburger');
let top1 = document.querySelector('.top');
let middle = document.querySelector('.middle');
let bottom = document.querySelector('.buttom');
let menu = document.querySelector('.logo');

logo.addEventListener('click', function(event){
    event.stopPropagation();  // Prevent the event from bubbling up to the document
    top1.classList.toggle('translate-y-[8px]');
    top1.classList.toggle('rotate-[45deg]');
    middle.classList.toggle('scale-0');
    bottom.classList.toggle('translate-y-[-8px]');
    bottom.classList.toggle('rotate-[-45deg]');
    
    // Toggle visibility of the menu
    menu.classList.toggle('hidden');
    menu.classList.toggle('translate-y-[-2000px]');
});

// Close the menu if clicking outside
document.addEventListener('click', function(event) {
    if (!menu.classList.contains('hidden')) {
        // Check if the click is outside the hamburger and menu
        if (!menu.contains(event.target) && !logo.contains(event.target)) {
            top1.classList.remove('translate-y-[8px]', 'rotate-[45deg]');
            middle.classList.remove('scale-0');
            bottom.classList.remove('translate-y-[-8px]', 'rotate-[-45deg]');
            menu.classList.add('hidden');
            menu.classList.add('translate-y-[-2000px]');
        }
    }
});



</script>
</body>

</html>

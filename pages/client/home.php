<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cental - Car Rent</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#EA001E',
                    }
                }
            }
        }
    </script>
</head>
<body class="font-sans">
    <!-- Navbar Start -->
    <nav class="bg-white shadow px-4 py-2">
        <div class="container mx-auto flex items-center justify-between">
            <a href="#" class="flex items-center space-x-3">
                <h1 class="text-2xl text-primary font-bold flex items-center">
                    <i class="fas fa-car-alt mr-3"></i>Cental
                </h1>
            </a>
            <div class="flex items-center space-x-6">
                <a href="#" class="text-gray-700 hover:text-primary">Home</a>
                <a href="/pages/cars.php" class="text-gray-700 hover:text-primary">Cars</a>
                <a href="#" class="text-gray-700 hover:text-primary">Service</a>
                <a href="#" class="text-gray-700 hover:text-primary">Blog</a>
                <a href="#" class="text-gray-700 hover:text-primary">Contact</a>
                <a href="#" class="bg-primary text-white rounded-full py-2 px-4">Get Started</a>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    <!-- Hero Section Start -->
    <div class="relative h-screen">
        <img src="https://via.placeholder.com/1920x1080" alt="Hero Image" class="w-full h-full object-cover">
    </div>
    <!-- Hero Section End -->

    <!-- Features Start -->
    <div class="container mx-auto py-16">
        <div class="text-center mx-auto pb-5 max-w-2xl">
            <h1 class="text-4xl font-bold mb-3">Cental <span class="text-primary">Features</span></h1>
            <p class="text-gray-600">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut amet nemo expedita asperiores commodi accusantium at cum harum, excepturi, quia tempora cupiditate!</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="flex flex-col space-y-8">
                <div class="flex items-start space-x-4 transition duration-300 ease-in-out hover:scale-105">
                    <div class="text-primary text-3xl"><i class="fas fa-trophy"></i></div>
                    <div>
                        <h5 class="text-xl font-semibold mb-2">First Class Services</h5>
                        <p class="text-gray-600">Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur, in illum aperiam ullam magni eligendi?</p>
                    </div>
                </div>
                <div class="flex items-start space-x-4 transition duration-300 ease-in-out hover:scale-105">
                    <div class="text-primary text-3xl"><i class="fas fa-road"></i></div>
                    <div>
                        <h5 class="text-xl font-semibold mb-2">24/7 Road Assistance</h5>
                        <p class="text-gray-600">Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur, in illum aperiam ullam magni eligendi?</p>
                    </div>
                </div>
            </div>
            <div class="flex justify-center items-center">
                <img src="https://via.placeholder.com/400x400" alt="Features Image" class="max-w-full h-auto">
            </div>
            <div class="flex flex-col space-y-8">
                <div class="flex items-start space-x-4 transition duration-300 ease-in-out hover:scale-105">
                    <div class="text-primary text-3xl"><i class="fas fa-tag"></i></div>
                    <div>
                        <h5 class="text-xl font-semibold mb-2">Quality at Minimum</h5>
                        <p class="text-gray-600">Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur, in illum aperiam ullam magni eligendi?</p>
                    </div>
                </div>
                <div class="flex items-start space-x-4 transition duration-300 ease-in-out hover:scale-105">
                    <div class="text-primary text-3xl"><i class="fas fa-map-pin"></i></div>
                    <div>
                        <h5 class="text-xl font-semibold mb-2">Free Pick-Up & Drop-Off</h5>
                        <p class="text-gray-600">Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur, in illum aperiam ullam magni eligendi?</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Features End -->

    <!-- Services Start -->
    <div class="bg-gray-100 py-16">
        <div class="container mx-auto">
            <div class="text-center mx-auto pb-5 max-w-2xl">
                <h1 class="text-4xl font-bold mb-3">Cental <span class="text-primary">Services</span></h1>
                <p class="text-gray-600">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut amet nemo expedita asperiores commodi accusantium at cum harum, excepturi, quia tempora cupiditate!</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-lg shadow-lg transition-transform transform hover:scale-105">
                    <div class="text-primary text-3xl mb-4"><i class="fas fa-phone-alt"></i></div>
                    <h5 class="text-xl font-semibold mb-3">Phone Reservation</h5>
                    <p class="text-gray-600">Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit ipsam quasi quibusdam ipsa perferendis iusto?</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg transition-transform transform hover:scale-105">
                    <div class="text-primary text-3xl mb-4"><i class="fas fa-money-bill-alt"></i></div>
                    <h5 class="text-xl font-semibold mb-3">Special Rates</h5>
                    <p class="text-gray-600">Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit ipsam quasi quibusdam ipsa perferendis iusto?</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg transition-transform transform hover:scale-105">
                    <div class="text-primary text-3xl mb-4"><i class="fas fa-road"></i></div>
                    <h5 class="text-xl font-semibold mb-3">One Way Rental</h5>
                    <p class="text-gray-600">Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit ipsam quasi quibusdam ipsa perferendis iusto?</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg transition-transform transform hover:scale-105">
                    <div class="text-primary text-3xl mb-4"><i class="fas fa-umbrella"></i></div>
                    <h5 class="text-xl font-semibold mb-3">Life Insurance</h5>
                    <p class="text-gray-600">Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit ipsam quasi quibusdam ipsa perferendis iusto?</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg transition-transform transform hover:scale-105">
                    <div class="text-primary text-3xl mb-4"><i class="fas fa-building"></i></div>
                    <h5 class="text-xl font-semibold mb-3">City to City</h5>
                    <p class="text-gray-600">Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit ipsam quasi quibusdam ipsa perferendis iusto?</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg transition-transform transform hover:scale-105">
                    <div class="text-primary text-3xl mb-4"><i class="fas fa-car-alt"></i></div>
                    <h5 class="text-xl font-semibold mb-3">Free Rides</h5>
                    <p class="text-gray-600">Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit ipsam quasi quibusdam ipsa perferendis iusto?</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Services End -->

    <!-- Process Start -->
    <div class="bg-gray-900 py-16">
        <div class="container mx-auto">
            <div class="text-center mx-auto pb-5 max-w-2xl">
                <h1 class="text-4xl font-bold text-white mb-3">Cental <span class="text-primary">Process</span></h1>
                <p class="text-gray-300 mb-8">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut amet nemo expedita asperiores commodi accusantium at cum harum, excepturi, quia tempora cupiditate!</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-lg shadow-lg text-center transition-transform transform hover:scale-105">
                    <div class="text-6xl font-bold text-primary mb-4">01.</div>
                    <h4 class="text-xl font-semibold mb-3">Come In Contact</h4>
                    <p class="text-gray-600">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad, dolorem!</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg text-center transition-transform transform hover:scale-105">
                    <div class="text-6xl font-bold text-primary mb-4">02.</div>
                    <h4 class="text-xl font-semibold mb-3">Choose A Car</h4>
                    <p class="text-gray-600">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad, dolorem!</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg text-center transition-transform transform hover:scale-105">
                    <div class="text-6xl font-bold text-primary mb-4">03.</div>
                    <h4 class="text-xl font-semibold mb-3">Enjoy Driving</h4>
                    <p class="text-gray-600">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad, dolorem!</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Process End -->

    <!-- Footer Start -->
    <footer class="bg-gray-800 text-white py-12">
        <div class="container mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div>
                <h4 class="text-xl font-semibold mb-4">About Us</h4>
                <p class="mb-4">Dolor amet sit justo amet elitr clita ipsum elitr est. Lorem ipsum dolor sit amet, consectetur adipiscing elit consectetur adipiscing elit.</p>
                <div class="relative">
                    <input type="email" placeholder="Enter your email" class="w-full py-2 px-4 rounded-full">
                    <button class="absolute right-0 top-0 bg-primary text-white rounded-full py-2 px-4">Subscribe</button>
                </div>
            </div>
            <div>
                <h4 class="text-xl font-semibold mb-4">Quick Links</h4>
                <ul class="space-y-2">
                    <li><a href="#" class="hover:text-primary"><i class="fas fa-angle-right mr-2"></i>About</a></li>
                    <li><a href="#" class="hover:text-primary"><i class="fas fa-angle-right mr-2"></i>Cars</a></li>
                    <li><a href="#" class="hover:text-primary"><i class="fas fa-angle-right mr-2"></i>Car Types</a></li>
                    <li><a href="#" class="hover:text-primary"><i class="fas fa-angle-right mr-2"></i>Team</a></li>
                    <li><a href="#" class="hover:text-primary"><i class="fas fa-angle-right mr-2"></i>Contact us</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-xl font-semibold mb-4">Business Hours</h4>
                <ul class="space-y-2">
                    <li>
                        <span class="text-gray-400">Mon - Friday:</span>
                        <p>09.00 am to 07.00 pm</p>
                    </li>
                    <li>
                        <span class="text-gray-400">Saturday:</span>
                        <p>10.00 am to 05.00 pm</p>
                    </li>
                    <li>
                        <span class="text-gray-400">Vacation:</span>
                        <p>All Sunday is our vacation</p>
                    </li>
                </ul>
            </div>
            <div>
                <h4 class="text-xl font-semibold mb-4">Contact Info</h4>
                <ul class="space-y-2">
                    <li><i class="fa fa-map-marker-alt mr-2"></i>123 Street, New York, USA</li>
                    <li><i class="fa fa-phone-alt mr-2"></i>+012 345 67890</li>
                    <li><i class="fa fa-envelope mr-2"></i>info@example.com</li>
                </ul>
                <div class="flex space-x-2 mt-4">
                    <a href="#" class="bg-primary text-white p-2 rounded-full"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="bg-primary text-white p-2 rounded-full"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="bg-primary text-white p-2 rounded-full"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="bg-primary text-white p-2 rounded-full"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="fixed bottom-4 right-4 bg-primary text-white p-3 rounded-full shadow-lg">
        <i class="fas fa-arrow-up"></i>
    </a>
</body>
</html>


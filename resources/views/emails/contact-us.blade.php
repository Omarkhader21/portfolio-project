<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form Submission</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 font-sans">
    <div class="max-w-lg mx-auto mt-10 bg-white rounded-lg shadow-lg">
        <!-- Header -->
        <div class="bg-red-600 text-white text-center p-6 rounded-t-lg">
            <h1 class="text-2xl font-bold">New Contact Us Submission</h1>
            <p class="text-sm mt-1">You have a new message from the contact form!</p>
        </div>

        <!-- Body -->
        <div class="p-6">
            <p class="text-gray-700 text-lg font-semibold">Hello, Admin</p>
            <p class="text-gray-600 mt-2">
                A new "Contact Us" form submission has been received. Here are the details:
            </p>
            <div class="mt-4 text-gray-700">
                <p><strong>Name:</strong> {{ $data['name'] }}</p>
                <p><strong>Email:</strong> {{ $data['email'] }}</p>
                <p><strong>Subject:</strong> {{ $data['subject'] }}</p>
                <p><strong>Message:</strong></p>
                <p class="bg-gray-100 p-3 mt-1 rounded-lg">{{ $data['message'] }}</p>
            </div>
            <p class="text-gray-600 mt-4">
                You can respond to the user by emailing them at
                <a href="mailto:{{ $data['email'] }}" class="text-blue-600 underline">{{ $data['email'] }}</a>.
            </p>
        </div>

        <!-- Footer -->
        <div class="bg-gray-100 text-center p-4 rounded-b-lg">
            <p class="text-gray-600 text-sm mb-2">Thank you for managing customer inquiries.</p>
            <div class="flex justify-center space-x-4">
                <a href="#" class="text-blue-600 text-lg" aria-label="Facebook"><i
                        class="fab fa-facebook"></i></a>
                <a href="#" class="text-blue-500 text-lg" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                <a href="#" class="text-blue-700 text-lg" aria-label="LinkedIn"><i
                        class="fab fa-linkedin"></i></a>
                <a href="#" class="text-pink-500 text-lg" aria-label="Instagram"><i
                        class="fab fa-instagram"></i></a>
            </div>
            <p class="text-gray-500 text-xs mt-3">
                &copy; 2024 Your Company. All rights reserved.<br>
                <i class="fas fa-phone-alt"></i> +1 234 567 890 |
                <i class="fas fa-envelope"></i> support@example.com
            </p>
        </div>
    </div>
</body>

</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- font awesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="dark:bg-slate-900 dark:text-gray-200">
    <header class="fixed w-full py-4 lg:px-0 px-5 z-[999] duration-300">
        <nav class="flex justify-between items-center max-w-6xl mx-auto px-2">
            <div class="flex gap-4 items-center">
                <div class="bg-primary text-white rounded-full size-10 text-xl flex-center">O</div>
                <div>
                    <h4 class="fon-bold text-lg uppercase">Omar</h4>
                    <p class="text-xs">Profile</p>
                </div>
            </div>
            <ul class="md:flex hidden gap-10 hover:*:text-primary *:duration-200">
                <li>
                    <a href="#home">Home</a>
                </li>
                <li>
                    <a href="#about">About</a>
                </li>
                <li>
                    <a href="#projects">Projects</a>
                </li>
                <li>
                    <a href="#contact">Contact us</a>
                </li>
                <span class="theme-switch hidden md:block">
                    <i class="fa-solid fa-circle-half-stroke"></i>
                </span>
            </ul>
            <div class="flex items-center gap-6">
                <a href="#contact">
                    <button class="btn btn-outline md:!flex !hidden ">
                        <i class="fa-solid fa-paper-plane"></i>
                        Let's Talk
                    </button>
                </a>
                <span class="theme-switch md:hidden">
                    <i class="fa-solid fa-circle-half-stroke"></i>
                </span>
                <span id="menubar" class="cursor-pointer md:hidden text-xl">
                    <i class="fa-solid fa-bars"></i>
                </span>
            </div>
        </nav>
    </header>
    <!-- backdrop -->
    <span id="backdrop" class="fixed h-screen bg-black/10 inset-0 backdrop-blur-sm z-[997] hidden"></span>

    <!-- mobile nav -->
    <ul id="mobile-nav"
        class="flex-center flex-col gap-10 fixed w-full bottom-0 duration-200 left-0 z-[998] text-xl bg-primary text-white rounded-t-3xl h-0 overflow-hidden">
        <li>
            <a href="#home">Home</a>
        </li>
        <li>
            <a href="#about">About</a>
        </li>
        <li>
            <a href="#projects">Projects</a>
        </li>
        <li>
            <a href="#contact">Contact us</a>
        </li>
    </ul>
    <!-- Home -->
    <section id="home"
        class="min-h-screen container grid place-items-center relative overflow-hidden before:absolute before:top-0 before:start-1/2 before:bg-heroLight before:bg-no-repeat before:bg-top before:size-full before:-z-[1] before:transform before:-translate-x-1/2 dark:before:bg-heroDark">
        <div class="w-full pt-20 grid md:grid-cols-6 h-full items-center max-w-6xl justify-around">
            <div class="lg:col-span-2 sm:pl-2 md:col-span-3 md:text-left text-center">
                <div>
                    <h5 class="font-medium text-gray-600 dark:text-gray-200">Hello welcome</h5>
                    <h1 class="sm:text-5xl text-4xl dark:text-white !leading-normal relative font-medium">
                        I'm <span class="text-primary">Omar</span> <br>
                        Web Developer
                    </h1>
                    <button class="btn btn-filled mt-5 ">
                        <i class="fa-regular fa-envelope"></i>
                        Hire me
                    </button>
                    <button class="font-semibold dark:text-gray-200 border-b-2 border-gray-700 ml-4">
                        <i class="fa-solid fa-up-right-from-square"></i>
                        See Resume
                    </button>
                </div>
                <div class="md:w-96 md:ml-auto flex mt-9 gap-2 dark:text-gray-300">
                    <i class="fa-solid fa-border-all mt-0.5 md:inline-block hidden"></i>
                    <p class="text-sm text-balance leading-5 max-w-md px-2 mx-auto">
                        I am a web developer. I love to create beautiful and performant websites.
                    </p>
                </div>
                <div
                    class="flex items-center md:justify-end justify-center mt-9 gap-6 dark:text-gray-200 text-gray-600">
                    <p class="text-xs">
                        Follow Us
                    </p>
                    <div class="flex gap-3">
                        <a href="#" class="soical-icon">
                            <i class="fa-brands fa-github"></i>
                        </a>
                        <a href="#" class="soical-icon">
                            <i class="fa-brands fa-linkedin"></i>
                        </a>
                        <a href="#" class="soical-icon">
                            <i class="fa-brands fa-facebook"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="lg:col-span-2 md:col-span-3">
                <img src="{{ asset('assets/person.png') }}" alt=""
                    class="md:w-full max-w-96 md:mt-0 mt-5 w-2/3 mx-auto">
            </div>
            <div
                class="lg:col-span-2 md:col-span-6 lg:bg-gradient-to-l md:bg-none mt-2 bg-gradient-to-l dark:from-slate-800 from-gray-100 lg:h-96 md:h-auto h-96 w-full">
                <ul
                    class="text-2xl leading-[3.14rem] text-center pt-5 lg:block md:flex items-center justify-between data-[slot=count]:*:text-3xl data-[slot=count]:*:font-bold">
                    <li data-slot="count">3+</li>
                    <li>Years of <span class="text-primary">Experience</span></li>
                    <li data-slot="count">3+</li>
                    <li>Completed <span class="text-primary">Projects</span></li>
                    <li>
                        <button class="btn btn-outline lg:mt-10 md:mt-0 mt-10">
                            <i class="fa-solid fa-download"></i>
                            Download CV</button>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <!-- About -->
    <section id="about" class="container min-h-screen flex-center">
        <div>
            <div class="text-center text-balance">
                <h3>What I Know</h3>
                <p class="px-2 mt-3 text-gray-500">
                    Lorem ipsum, dolor quam recusandae molestias a consectetur illum aut
                    iste dolore. sit amet consectetur adipisicing elit. Dicta eligendi
                    voluptate eos rem maiores voluptas mollitia debitis natus impedit
                    excepturi quasi, quam recusandae molestias a consectetur illum aut
                    iste dolore.
                </p>
            </div>
            <div
                class="max-w-2xl grid md:grid-cols-1 sm:grid-cols-3 gap-6 px-2 mt-10 mx-auto *:text-lg *:bg-gray-100 *:dark:bg-slate-800 *:p-7 *:flex *:items-center *:gap-12 *:md:flex-row *:flex-col *:rounded-xl *:max-w-sm *:sm:max-w-full *:mx-auto *:text-center *:sm:text-left hover:*:brightness-90 *:shadow-sm *:cursor-pointer">
                <div>
                    <div class="*:text-primary">
                        <i class="fa-regular fa-object-ungroup"></i>
                        <h6 class="font-semibold whitespace-nowrap mt-3">
                            Full Stack Developer
                        </h6>
                        <div>
                            <p class="text-xs text-gray-600 dark:text-gray-400 leading-5 text-balance">
                                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dicta
                                corporis tempora possimus?
                            </p>
                        </div>
                        <i class="fa-solid fa-arrow-up-long text-primary cursor-pointer rotate-45"></i>
                    </div>
                </div>
                <div>
                    <div class="*:text-primary">
                        <i class="fa-solid fa-pen-nib"></i>
                        <h6 class="font-semibold whitespace-nowrap mt-3">
                            PHP Developer
                        </h6>
                        <div>
                            <p class="text-xs text-gray-600 dark:text-gray-400 leading-5 text-balance">
                                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dicta
                                corporis tempora possimus?
                            </p>
                        </div>
                        <i class="fa-solid fa-arrow-up-long text-primary cursor-pointer rotate-45"></i>
                    </div>
                </div>
                <div>
                    <div class="*:text-primary">
                        <i class="fa-solid fa-people-group"></i>
                        <h6 class="font-semibold whitespace-nowrap mt-3">
                            Team Play
                        </h6>
                        <div>
                            <p class="text-xs text-gray-600 dark:text-gray-400 leading-5 text-balance">
                                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dicta
                                corporis tempora possimus?
                            </p>
                        </div>
                        <i class="fa-solid fa-arrow-up-long text-primary cursor-pointer rotate-45"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Projects -->
    <section id="projects" class="container min-h-screen flex-center">
        <div class="text-center text-balance">
            <h3>My Projects</h3>
            <p class="px-2 mt-3 text-gray-500">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime itaque
                totam, ut asperiores placeat saepe earum molestias deleniti,
                repudiandae animi sit laudantium aliquam delectus assumenda numquam
                ab. Dolorum, illo laborum!
            </p>
            <br>
            <div class="flex-center gap-4">
                <button class="btn btn-filled">Website</button>
                <button class="btn btn-outline">Mobile App</button>
                <button class="btn btn-outline">Desktop App</button>
            </div>
            <br>
            <div
                class="*:w-full grid mx-auto md:grid-rows-2 md:grid-cols-2 max-w-4xl md:px-0 px-10 *:h-full *:object-cover *:border-4 *:dark:border-white *:rounded-md gap-4 *:cursor-pointer group hover:*:!grayscale-0 *:hover:grayscale *:duration-1000">
                <img src="{{ asset('assets/pro1.jpg') }}" alt="">
                <img src="{{ asset('assets/pro2.jpg') }}" class="row-span-2" alt="">
                <img src="{{ asset('assets/pro3.jpg') }}" alt="">
            </div>
        </div>
    </section>

    <!-- Contact -->
    <section id="contact" class="container relative max-w-4xl mx-auto min-h-screen flex-center px-5">
        <div class="pb-10">
            <div class="text-center">
                <h3>Contact Me</h3>
                <p class="px-2 mt-3 text-gray-500">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime
                    itaque totam, ut asperiores placeat saepe earum molestias deleniti,
                    repudiandae animi sit laudantium aliquam delectus assumenda numquam
                    ab. Dolorum, illo laborum!
                </p>
            </div>
            <div class="mt-12 md:relative flex flex-col gap-5 sm:max-w-full mx-auto max-w-xs">
                <div
                    class="dark:bg-slate-800 bg-slate-50 dark:text-gray-100 text-gray-800 rounded-lg shadow-xl mx-auto md:w-2/3 py-14 px-7 w-full">
                    <h3 class="font-semibold">
                        Send Us A <br>
                        <span>Message</span>
                    </h3>
                    <form action="" class="*:flex *:flex-col *:gap-1 mt-5 md:w-2/3 w-full">
                        <div>
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" placeholder="Enter your name" class="input">
                        </div>
                        <div>
                            <label for="email">Email Address</label>
                            <input type="email" name="email" id="email" placeholder="Enter your email address"
                                class="input">
                        </div>
                        <div>
                            <label for="message">Message</label>
                            <textarea name="message" id="message" placeholder="Enter your message"
                                class="input"></textarea>
                        </div>
                        <button class="btn btn-filled ml-auto">Send to Us</button>
                    </form>
                </div>
                <div
                    class="dark:bg-gray-700 bg-white py-12 px-7 md:absolute lg:-right-9 right-28 rounded-xl shadow-xl md:w-2/5 h-5/6 top-28 w-full mx-auto">
                    <h3 class="font-semibold text-2xl border-b pb-4 border-gray-600">Drop In Our <br>
                        Office <span class="text-primary">.</span></h3>
                    <div class="py-4">
                        <p class="text-xs text-gray-400 leading-5">
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                            Accusamus nihil expedita voluptate corporis doloremque id,
                            facilis
                        </p>
                        <ul class="*:flex *:gap-4 *:items-center *:mt-4">
                            <li>
                                <i class="fa-solid fa-location-dot"></i>
                                <div>
                                    <h2>Amman Jordan</h2>
                                    <address>Amman Hey Nazzal</address>
                                </div>
                            </li>
                            <li>
                                <i class="sa-solid fa-envelope"></i>
                                <p>omar.work21@outlook.com</p>
                            </li>
                            <li>
                                <i class="fa-solid fa-phone"></i>
                                <p>+962 775 966 466</p>
                            </li>
                        </ul>
                        <div
                            class="flex items-center md:justify-end justify-center mt-9 gap-6 dark:text-gray-200 text-gray-600">
                            <p class="text-xs">
                                Follow Us
                            </p>
                            <div class="flex gap-3">
                                <a href="#" class="soical-icon">
                                    <i class="fa-brands fa-github"></i>
                                </a>
                                <a href="#" class="soical-icon">
                                    <i class="fa-brands fa-linkedin"></i>
                                </a>
                                <a href="#" class="soical-icon">
                                    <i class="fa-brands fa-facebook"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="dark:bg-slate-700 bg-slate-100 text-center py-2">
        Copyright &copy; 2024 <span class="text-primary">Omar</span>
        <ul class="flex-center gap-5 py-4 text-sm">
            <li>
                <a href="#home">Home</a>
            </li>
            <li>
                <a href="#about">About</a>
            </li>
            <li>
                <a href="#projects">Projects</a>
            </li>
            <li>
                <a href="#contact">Contact us</a>
            </li>
        </ul>
    </footer>

    <!-- sticky nav script -->
    <script>
        const header = document.querySelector("header");

        const toggleClasses = (element, classes, condition) => {
            classes.forEach((className) => {
                element.classList.toggle(className, condition);
            });
        };

        window.addEventListener("scroll", () => {
            toggleClasses(
                header,
                [
                    "shadow-lg",
                    "dark:sm:bg-slate-900",
                    "dark:bg-slate-800",
                    "dark:text-white",
                    "bg-white",
                ],
                window.scrollY > 0
            );
        });
    </script>
</body>

</html>

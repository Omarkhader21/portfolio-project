document.addEventListener("DOMContentLoaded", () => {
    const ELE = document.documentElement;
    const mobileNav = document.getElementById("mobile-nav");
    const mobileNavItems = document.querySelectorAll("#mobile-nav li");
    const menubar = document.getElementById("menubar");
    const backDrop = document.getElementById("backdrop");
    const menuBarIcon = document.querySelector("#menubar i");

    // Apply saved theme from localStorage on load
    const savedTheme = localStorage.getItem("theme");
    if (savedTheme) {
        ELE.classList.add(savedTheme);
    }

    // Theme toggle functionality
    document.querySelectorAll(".theme-switch").forEach((element) => {
        element.addEventListener("click", () => {
            ELE.classList.toggle("dark");
            const theme = ELE.classList.contains("dark") ? "dark" : "light";
            localStorage.setItem("theme", theme);
        });
    });

    // Menu toggle functionality
    const toggleMenu = () => {
        mobileNav.classList.toggle("h-0");
        mobileNav.classList.toggle("h-96");
        menuBarIcon.classList.toggle("fa-bars");
        menuBarIcon.classList.toggle("fa-xmark");
        ELE.classList.toggle("overflow-hidden");
        backDrop.classList.toggle("hidden");
    };

    const menuOptions = [menubar, backDrop, ...mobileNavItems];
    menuOptions.forEach((option) => {
        option.addEventListener("click", toggleMenu);
    });
});

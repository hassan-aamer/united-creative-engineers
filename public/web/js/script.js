document.addEventListener('DOMContentLoaded', function() {
    // Initialize Bootstrap tooltips
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    });

    // Chat button functionality
    const chatBtn = document.getElementById('chatBtn');
    const chatContainer = document.getElementById('chatContainer');
    const closeChat = document.getElementById('closeChat');

    if (chatBtn && chatContainer && closeChat) {
        // Track if we're in the process of closing the chat
        let isClosing = false;
        
        chatBtn.addEventListener('click', function(event) {
            // Prevent event from bubbling to document click handler
            event.stopPropagation();
            
            // Only toggle if not in closing state
            if (!isClosing) {
                if (chatContainer.classList.contains('show')) {
                    // If chat is already open, close it
                    isClosing = true;
                    chatContainer.classList.remove('show');
                    
                    // Reset the closing state after animation completes
                    setTimeout(() => {
                        isClosing = false;
                    }, 300); // Match the transition duration in CSS (0.3s)
                } else {
                    // If chat is closed, open it
                    chatContainer.classList.add('show');
                }
            }
        });

        closeChat.addEventListener('click', function() {
            isClosing = true;
            chatContainer.classList.remove('show');
            
            // Reset the closing state after animation completes
            setTimeout(() => {
                isClosing = false;
            }, 300); // Match the transition duration in CSS (0.3s)
        });

        // Close chat when clicking outside
        document.addEventListener('click', function(event) {
            if (!chatContainer.contains(event.target) && event.target !== chatBtn && chatContainer.classList.contains('show')) {
                isClosing = true;
                chatContainer.classList.remove('show');
                
                // Reset the closing state after animation completes
                setTimeout(() => {
                    isClosing = false;
                }, 300); // Match the transition duration in CSS (0.3s)
            }
        });
    }

    

    // Enable horizontal scrolling with mouse drag for the services container
    const servicesContainer = document.querySelector('.services-container');
    if (servicesContainer) {
        let isDown = false;
        let startX;
        let scrollLeft;

        servicesContainer.addEventListener('mousedown', (e) => {
            isDown = true;
            servicesContainer.style.cursor = 'grabbing';
            startX = e.pageX - servicesContainer.offsetLeft;
            scrollLeft = servicesContainer.scrollLeft;
        });

        servicesContainer.addEventListener('mouseleave', () => {
            isDown = false;
            servicesContainer.style.cursor = 'grab';
        });

        servicesContainer.addEventListener('mouseup', () => {
            isDown = false;
            servicesContainer.style.cursor = 'grab';
        });

        servicesContainer.addEventListener('mousemove', (e) => {
            if (!isDown) return;
            e.preventDefault();
            const x = e.pageX - servicesContainer.offsetLeft;
            const walk = (x - startX) * 2; // Scroll speed
            servicesContainer.scrollLeft = scrollLeft - walk;
        });
    }

    // Toggle buttons in project cards
    const toggleBtns = document.querySelectorAll('.toggle-btn');
    toggleBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const icon = this.querySelector('i');
            const text = this.querySelector('span');
            
            if (icon.classList.contains('fa-toggle-off')) {
                icon.classList.remove('fa-toggle-off');
                icon.classList.add('fa-toggle-on');
                text.textContent = 'إخفاء التفاصيل';
            } else {
                icon.classList.remove('fa-toggle-on');
                icon.classList.add('fa-toggle-off');
                text.textContent = 'تفاصيل أكثر';
            }
            
            // Find the parent card and toggle additional content
            const card = this.closest('.project-card');
            const hiddenContent = card.querySelector('.hidden-content');
            if (hiddenContent) {
                hiddenContent.classList.toggle('d-none');
            }
        });
    });

    // Animate "Why Choose Us" section cards
    const animateWhyUsCards = function() {
        const cards = document.querySelectorAll('.why-us-card');
        
        cards.forEach(card => {
            const cardPosition = card.getBoundingClientRect().top;
            const windowHeight = window.innerHeight;
            
            if (cardPosition < windowHeight - 100) {
                card.style.animationPlayState = 'running';
            }
        });
    };

    // Animate elements when they come into view
    const animateOnScroll = function() {
        const elements = document.querySelectorAll('.animate-on-scroll');
        
        elements.forEach(element => {
            const elementPosition = element.getBoundingClientRect().top;
            const windowHeight = window.innerHeight;
            
            if (elementPosition < windowHeight - 50) {
                const animation = element.dataset.animation || 'fadeIn';
                element.classList.add('animate__animated', `animate__${animation}`);
            }
        });

        // Call the Why Choose Us animation function
        animateWhyUsCards();
    };

    // Run animation check on scroll
    window.addEventListener('scroll', animateOnScroll);
    
    // Run once on page load
    animateOnScroll();
    
    // Counter animation for stats
    const counterElements = document.querySelectorAll('.stat-item h3');
    
    const startCounters = function() {
        counterElements.forEach(counter => {
            const target = parseInt(counter.textContent.replace('+', ''));
            let count = 0;
            const duration = 2000; // 2 seconds
            const increment = target / (duration / 16); // 60fps
            
            const updateCounter = function() {
                count += increment;
                if (count < target) {
                    counter.textContent = '+' + Math.floor(count);
                    requestAnimationFrame(updateCounter);
                } else {
                    counter.textContent = '+' + target;
                }
            };
            
            updateCounter();
        });
    };
    
    // Start counters when they come into view
    const statsSection = document.querySelector('.stats-container');
    if (statsSection) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    startCounters();
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });
        
        observer.observe(statsSection);
    }
    
    // // Mobile menu toggle
    // const navbarToggler = document.querySelector('.navbar-toggler');
    // if (navbarToggler) {
    //     navbarToggler.addEventListener('click', function() {
    //         document.querySelector('.navbar-collapse').classList.toggle('show');
    //     });
    // }

    // Countdown Timer
    function updateCountdown() {
        const hoursElement = document.getElementById('hours');
        const minutesElement = document.getElementById('minutes');
        const secondsElement = document.getElementById('seconds');
        
        if (!hoursElement || !minutesElement || !secondsElement) return;

        let hours = parseInt(hoursElement.textContent);
        let minutes = parseInt(minutesElement.textContent);
        let seconds = parseInt(secondsElement.textContent);

        seconds--;
        
        if (seconds < 0) {
            seconds = 59;
            minutes--;
            
            if (minutes < 0) {
                minutes = 59;
                hours--;
                
                if (hours < 0) {
                    // Reset to initial values when countdown reaches zero
                    hours = 23;
                    minutes = 58;
                    seconds = 46;
                }
            }
        }
        
        hoursElement.textContent = hours.toString().padStart(2, '0');
        minutesElement.textContent = minutes.toString().padStart(2, '0');
        secondsElement.textContent = seconds.toString().padStart(2, '0');
    }

    // Update countdown every second
    setInterval(updateCountdown, 1000);

    // Form submission handler
    const productForm = document.querySelector('.contact-form form');
    if (productForm) {
        productForm.addEventListener('submit', function(e) {
            e.preventDefault();
            // Add your form submission logic here
            alert('شكراً لك! سنتواصل معك قريباً.');
            productForm.reset();
        });
    }
});

// Add resize event listener to handle responsiveness
window.addEventListener('resize', function() {
    // Reset all card transforms when screen size changes
    document.querySelectorAll('.service-card').forEach(function(card) {
        card.style.transform = '';
    });
    
    // Reset opacity for mobile view cards
    if (window.innerWidth <= 767) {
        document.querySelectorAll('.service-card-front, .service-card-back').forEach(function(face) {
            if (face.classList.contains('service-card-front')) {
                face.style.opacity = '1';
                face.style.zIndex = '2';
            } else {
                face.style.opacity = '0';
                face.style.zIndex = '1';
            }
        });
    }
});
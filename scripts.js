document.addEventListener('DOMContentLoaded', function() {
    // Navigation menu toggle
    const navToggle = document.querySelector('.nav-toggle');
    const navMenu = document.querySelector('nav ul');

    navToggle.addEventListener('click', function() {
        navMenu.classList.toggle('active');
    });

    // Form validation
    const contactForm = document.querySelector('#contact-form');
    const emailInput = document.querySelector('#email');
    const messageInput = document.querySelector('#message');

    contactForm.addEventListener('submit', function(event) {
        event.preventDefault();
        let isValid = true;

        if (!emailInput.value) {
            isValid = false;
            emailInput.classList.add('error');
        } else {
            emailInput.classList.remove('error');
        }

        if (!messageInput.value) {
            isValid = false;
            messageInput.classList.add('error');
        } else {
            messageInput.classList.remove('error');
        }

        if (isValid) {
            // Handle form submission
            console.log('Form submitted successfully!');
        }
    });

    // Dynamic content updates
    const eventsSection = document.querySelector('#events');
    const eventsList = [
        { date: '2023-05-01', title: 'Spring Fly-In' },
        { date: '2023-06-15', title: 'Summer Competition' },
        { date: '2023-09-10', title: 'Autumn Airshow' }
    ];

    eventsList.forEach(function(event) {
        const eventItem = document.createElement('div');
        eventItem.classList.add('event-item');
        eventItem.innerHTML = `<strong>${event.date}</strong>: ${event.title}`;
        eventsSection.appendChild(eventItem);
    });
});

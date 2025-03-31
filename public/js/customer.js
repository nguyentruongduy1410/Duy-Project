// Fashion Nova Account Page JavaScript

document.addEventListener('DOMContentLoaded', function() {
    // Mobile Menu Toggle
    const mobileMenuBtn = document.getElementById('mobileMenuBtn');
    const mobileMenu = document.getElementById('mobileMenu');

    if (mobileMenuBtn && mobileMenu) {
        mobileMenuBtn.addEventListener('click', function() {
            mobileMenu.style.display = mobileMenu.style.display === 'block' ? 'none' : 'block';
        });
    }

    // Account Tab Navigation
    const accountNavItems = document.querySelectorAll('.account-nav-item[data-target]');
    const accountSections = document.querySelectorAll('.account-section');

    accountNavItems.forEach(navItem => {
        navItem.addEventListener('click', function(e) {
            e.preventDefault();

            const targetId = this.getAttribute('data-target');

            // Remove active class from all nav items and sections
            accountNavItems.forEach(item => item.classList.remove('active'));
            accountSections.forEach(section => section.classList.remove('active'));

            // Add active class to clicked nav item and corresponding section
            this.classList.add('active');
            document.getElementById(targetId).classList.add('active');

            // Scroll to top of the section
            window.scrollTo({
                top: document.querySelector('.account-container').offsetTop - 20,
                behavior: 'smooth'
            });
        });
    });

    // Form Validation for Profile Section
    const accountForm = document.querySelector('.account-form');

    if (accountForm) {
        accountForm.addEventListener('submit', function(e) {
            // e.preventDefault();

            const currentPassword = document.getElementById('currentPassword').value;
            const newPassword = document.getElementById('newPassword').value;
            const confirmPassword = document.getElementById('confirmPassword').value;

            let isValid = true;

            // Simple email validation

            // Password matching validation if trying to change password
            if (newPassword || confirmPassword) {
                if (!currentPassword) {
                    alert('Please enter your current password to change your password.');
                    isValid = false;
                } else if (newPassword !== confirmPassword) {
                    alert('New password and confirmation do not match.');
                    isValid = false;
                }
            }

            if (isValid) {
                // In a real application, this would submit the form to the server
                // location.href = '/customer';

                // Clear password fields
                document.getElementById('currentPassword').value = '';
                document.getElementById('newPassword').value = '';
                document.getElementById('confirmPassword').value = '';
            }
        });
    }

    // Address Card Functionality
    const addAddressCard = document.querySelector('.add-card');

    if (addAddressCard) {
        addAddressCard.addEventListener('click', function() {
            alert('This would open an address form in a real application.');
        });
    }
    
});

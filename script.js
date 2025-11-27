function toggleNav() {
    const nav = document.querySelector('nav');
    nav.classList.toggle('active');
}
// Toggle the FAQ answers on click
const questions = document.querySelectorAll('.faq-question');

questions.forEach((question) => {
    question.addEventListener('click', () => {
        const answer = question.nextElementSibling;
        const isOpen = answer.style.display === 'block';

        // Toggle display
        answer.style.display = isOpen ? 'none' : 'block';

        // Add animation effect
        if (!isOpen) {
            answer.style.opacity = 0;
            setTimeout(() => {
                answer.style.opacity = 1;
            }, 0);
        } else {
            answer.style.opacity = 1;
            setTimeout(() => {
                answer.style.opacity = 0;
            }, 0);
        }
    });
});
document.addEventListener("DOMContentLoaded", function() {
    // Fade-in effect
    const privacyPolicyContainer = document.querySelector('.privacy-policy-container');
    privacyPolicyContainer.style.opacity = 1;
    privacyPolicyContainer.style.transform = 'translateY(0)';
});


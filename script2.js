 // Toggle mobile navigation menu
 function toggleMenu() {
    const navLinks = document.querySelector('.nav-links');
    navLinks.classList.toggle('nav-active');
}

// Change header background color on scroll
window.addEventListener('scroll', () => {
    const header = document.getElementById('header');
    if (window.scrollY > 50) {
        header.classList.add('header-scrolled');
    } else {
        header.classList.remove('header-scrolled');
    }
});
const videos = document.querySelectorAll('#videoCarousel video');
const progressBars = document.querySelectorAll('.progress-bar');

// Play video when it comes into view
function playVideoOnScroll() {
    videos.forEach((video, index) => {
        const rect = video.getBoundingClientRect();
        if (rect.top >= 0 && rect.bottom <= window.innerHeight) {
            video.play(); // Play the video if it's in the viewport
            updateProgressBar(video, progressBars[index]);
        } else {
            video.pause(); // Pause if it's out of view
        }
    });
}

// Update progress bar based on video duration
function updateProgressBar(video, progressBar) {
    const duration = video.duration;
    video.ontimeupdate = () => {
        const percentage = (video.currentTime / duration) * 100;
        progressBar.style.width = percentage + '%';
        progressBar.setAttribute('aria-valuenow', percentage);
    };
}

// Pause the previous video and play the current one when the carousel slides
$('#videoCarousel').on('slide.bs.carousel', (e) => {
    const video = $(e.relatedTarget).find('video')[0];
    videos.forEach(v => v.pause()); // Pause all videos
    video.play(); // Play the next video
});

window.addEventListener('scroll', playVideoOnScroll);
window.addEventListener('load', playVideoOnScroll); // Check on load as wel

    // Function to add animation class when the element is visible in viewport
    function addAnimationOnScroll() {
        const containers = document.querySelectorAll('.container');
        containers.forEach(container => {
          if (isInViewport(container)) {
            container.classList.add('animate-visible');
          }
        });
      }
  
      // Listen for scroll events and trigger the animation
      window.addEventListener('scroll', addAnimationOnScroll);
      // Trigger the animation on load as well, in case the element is already in view
      window.addEventListener('load', addAnimationOnScroll);
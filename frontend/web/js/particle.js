        // Floating particles generator
        function createParticles() {
            const particleContainer = document.querySelector('.floating-particles');
            
            for (let i = 0; i < 15; i++) {
                const particle = document.createElement('div');
                particle.className = 'particle';
                particle.style.left = Math.random() * 100 + '%';
                particle.style.animationDelay = Math.random() * 8 + 's';
                particle.style.animationDuration = (Math.random() * 4 + 6) + 's';
                particleContainer.appendChild(particle);
            }
        }
   
        // Animate carton on click
        function animateCarton() {
            const carton = document.querySelector('.milk-carton');
            carton.style.animation = 'none';
            setTimeout(() => {
                carton.style.animation = 'float 6s ease-in-out infinite';
            }, 100);
            
            // Add rotation effect
            carton.style.transform = 'perspective(1000px) rotateY(360deg) scale(1.1)';
            setTimeout(() => {
                carton.style.transform = 'perspective(1000px) rotateY(-10deg)';
            }, 600);
        }
   
        // Add hover effects to stat cards
        document.querySelectorAll('.stat-card').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.querySelector('.stat-icon').style.animation = 'bounce 0.5s ease';
            });
        });
   
        // Initialize particles when page loads
        document.addEventListener('DOMContentLoaded', function() {
            createParticles();
        });
   
        // Add interactive effects
        document.querySelectorAll('.info-item').forEach(item => {
            item.addEventListener('click', function() {
                this.style.background = 'rgba(0, 134, 209, 0.15)';
                setTimeout(() => {
                    this.style.background = 'rgba(0, 134, 209, 0.05)';
                }, 300);
            });
        });
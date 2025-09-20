<?php 

use yii\helpers\Html;
use yii\helpers\Url;

?>
    <style>
        
        .wrapper{
            margin-top: 50px;
        }
        
        /* Yulduzlar animatsiyasi */
        .stars {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 1;
        }

        .star {
            position: absolute;
            width: 2px;
            height: 2px;
            background: white;
            border-radius: 50%;
            animation: twinkle 2s infinite;
        }

        @keyframes twinkle {
            0%, 100% { opacity: 0.3; transform: scale(1); }
            50% { opacity: 1; transform: scale(1.2); }
        }

        /* Asosiy konteyner */
        .my-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;

            padding: 20px;
            position: relative;
            z-index: 2;
        }

        /* 404 raqami */
        .error-code {
            font-size: 8rem;
            font-weight: 900;
            background: linear-gradient(45deg, #ff6b6b, #4ecdc4, #45b7d1, #96ceb4);
            background-size: 400% 400%;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: gradientShift 3s ease-in-out infinite, float 6s ease-in-out infinite;
            text-shadow: 0 0 50px rgba(255, 107, 107, 0.5);
            /* margin-bottom: 2rem; */
            position: relative;
        }

        @keyframes gradientShift {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        /* Astronavt */
        .astronaut {
            width: 150px;
            height: 150px;
            /* margin: 2rem 0; */
            position: relative;
            animation: astronautFloat 4s ease-in-out infinite;
        }

        .astronaut-body {
            width: 120px;
            height: 150px;
            background: linear-gradient(135deg, #e8e8e8, #d0d0d0);
            border-radius: 40px 40px 20px 20px;
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
        }

        .astronaut-helmet {
            width: 100px;
            height: 100px;
            background: linear-gradient(135deg, #87ceeb, #4682b4);
            border-radius: 50%;
            position: absolute;
            left: 50%;
            top: 20%;
            transform: translate(-50%, -50%);
            border: 8px solid #c0c0c0;
            box-shadow: inset 0 0 20px rgba(255,255,255,0.3);
        }

        .astronaut-face {
            width: 60px;
            height: 80px;
            background: #fdbcb4;
            border-radius: 30px;
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
        }

        .eye {
            width: 8px;
            height: 12px;
            background: #333;
            border-radius: 50%;
            position: absolute;
            top: 25%;
        }

        .eye.left { left: 30%; }
        .eye.right { right: 30%; }

        @keyframes astronautFloat {
            0%, 100% { transform: translateY(0px) rotate(-5deg); }
            50% { transform: translateY(-15px) rotate(5deg); }
        }

        /* Matn */
        .error-message {
            text-align: center;
            color: #fff;
            margin: 2rem 0;
        }

        .error-title {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 1rem;
            background: linear-gradient(45deg, #ff6b6b, #4ecdc4);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .error-subtitle {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            opacity: 0.8;
            animation: pulse 2s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 0.8; }
            50% { opacity: 1; }
        }

        /* Tugmalar */
        .buttons {
            display: flex;
            gap: 2rem;
            flex-wrap: wrap;
            justify-content: center;
        }

        .btn {
            padding: 15px 30px;
            border: none;
            border-radius: 50px;
            font-family: 'Orbitron', monospace;
            font-weight: 700;
            font-size: 1.1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
            position: relative;
            overflow: hidden;
        }

        .btn-primary {
            background: linear-gradient(45deg, #ff6b6b, #ff8e53);
            color: white;
            box-shadow: 0 10px 25px rgba(255, 107, 107, 0.4);
        }

        .btn-secondary {
            background: linear-gradient(45deg, #4ecdc4, #44a08d);
            color: white;
            box-shadow: 0 10px 25px rgba(78, 205, 196, 0.4);
        }

        .btn:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.3);
        }

        .btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            transition: left 0.5s;
        }

        .btn:hover::before {
            left: 100%;
        }

        /* Sayyoralar */
        .planet {
            position: absolute;
            border-radius: 50%;
            opacity: 0.7;
            animation: orbit 20s linear infinite;
        }

        .planet-1 {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #ff9a9e, #fecfef);
            top: 20%;
            left: 10%;
            animation-duration: 25s;
        }

        .planet-2 {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #a8edea, #fed6e3);
            top: 70%;
            right: 15%;
            animation-duration: 30s;
            animation-direction: reverse;
        }

        @keyframes orbit {
            0% { transform: rotate(0deg) translateX(50px) rotate(0deg); }
            100% { transform: rotate(360deg) translateX(50px) rotate(-360deg); }
        }

        /* Mobil responsivlik */
        @media (max-width: 768px) {
            .error-code {
                font-size: 8rem;
            }
            
            .error-title {
                font-size: 2rem;
            }
            
            .astronaut {
                width: 150px;
                height: 150px;
            }
            
            .buttons {
                flex-direction: column;

            }
            
            .btn {
                padding: 12px 25px;
                font-size: 1rem;
            }
        }
    </style>
<div class="wrapper">
    <div class="stars" id="stars"></div>
    
    <div class="planet planet-1"></div>
    <div class="planet planet-2"></div>
    
    <div class="my-container">
        <div class="error-code">404</div>
        
        <div class="astronaut">
            <div class="astronaut-body"></div>
            <div class="astronaut-helmet">
                <div class="astronaut-face">
                    <div class="eye left"></div>
                    <div class="eye right"></div>
                </div>
            </div>
        </div>
        
        <div class="error-message">
            <h1 class="error-title"><?= Yii::t('app', "Sahifa topilmadi!") ?></h1>
            <!-- <p class="error-subtitle">Siz qidirayotgan sahifa galaktikaning chuqurliklarida yo'qolgan...</p> -->
        </div>
        
        <div class="buttons">
            <a href="<?= Url::to(['/']); ?>" class="btn btn-secondary"><?= Yii::t('app', "Bosh sahifa") ?></a>
            
        </div>
    </div>
</div>

    <script>
        // Yulduzlarni yaratish
        function createStars() {
            const starsmy-container = document.getElementById('stars');
            const numberOfStars = 100;
            
            for (let i = 0; i < numberOfStars; i++) {
                const star = document.createElement('div');
                star.className = 'star';
                star.style.left = Math.random() * 100 + '%';
                star.style.top = Math.random() * 100 + '%';
                star.style.animationDelay = Math.random() * 2 + 's';
                star.style.animationDuration = (Math.random() * 3 + 1) + 's';
                starsmy-container.appendChild(star);
            }
        }

        // Galaktikani qidirish funksiyasi
        function searchGalaxy() {
            const button = event.target;
            const originalText = button.textContent;
            
            button.textContent = 'Qidirilmoqda...';
            button.style.background = 'linear-gradient(45deg, #667eea, #764ba2)';
            
            // 3 soniyadan keyin
            setTimeout(() => {
                button.textContent = 'Hech narsa topilmadi 🛸';
                
                setTimeout(() => {
                    button.textContent = originalText;
                    button.style.background = 'linear-gradient(45deg, #4ecdc4, #44a08d)';
                }, 2000);
            }, 3000);
        }

        // Kursorni kuzatuvchi effekt
        document.addEventListener('mousemove', function(e) {
            const astronaut = document.querySelector('.astronaut');
            const rect = astronaut.getBoundingClientRect();
            const centerX = rect.left + rect.width / 2;
            const centerY = rect.top + rect.height / 2;
            
            const deltaX = e.clientX - centerX;
            const deltaY = e.clientY - centerY;
            
            const rotateX = deltaY / window.innerHeight * -10;
            const rotateY = deltaX / window.innerWidth * 10;
            
            astronaut.style.transform = `rotateX(${rotateX}deg) rotateY(${rotateY}deg)`;
        });

        // Sahifa yuklanganda yulduzlarni yaratish
        window.addEventListener('load', createStars);

        // Klaviatura hodisalari
        document.addEventListener('keydown', function(e) {
            if (e.code === 'Space') {
                e.preventDefault();
                const errorCode = document.querySelector('.error-code');
                errorCode.style.animation = 'none';
                errorCode.offsetHeight; // Reflow
                errorCode.style.animation = 'gradientShift 0.5s ease-in-out, float 6s ease-in-out infinite';
            }
        });

        // Konami kodi (chup sirli funksiya)
        let konamiCode = [];
        const konamiSequence = ['ArrowUp', 'ArrowUp', 'ArrowDown', 'ArrowDown', 'ArrowLeft', 'ArrowRight', 'ArrowLeft', 'ArrowRight'];
        
        document.addEventListener('keydown', function(e) {
            konamiCode.push(e.code);
            if (konamiCode.length > konamiSequence.length) {
                konamiCode.shift();
            }
            
            if (JSON.stringify(konamiCode) === JSON.stringify(konamiSequence)) {
                // Maxfiy animatsiya
                document.body.style.animation = 'hue-rotate 2s linear infinite';
                setTimeout(() => {
                    document.body.style.animation = '';
                }, 5000);
            }
        });

        // Hue rotate animatsiyasini qo'shish
        const style = document.createElement('style');
        style.textContent = `
            @keyframes hue-rotate {
                0% { filter: hue-rotate(0deg); }
                100% { filter: hue-rotate(360deg); }
            }
        `;
        document.head.appendChild(style);
    </script>

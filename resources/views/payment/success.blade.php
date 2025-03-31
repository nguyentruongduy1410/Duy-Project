<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh toán thành công</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(135deg, #4facfe, #00f2fe);
            overflow: hidden;
            margin: 0;
        }
        .container {
            text-align: center;
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            transform: scale(0.8);
            opacity: 0;
            animation: fadeInScale 0.5s ease-out forwards;
        }
        @keyframes fadeInScale {
            from {
                opacity: 0;
                transform: scale(0.8);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }
        .success-icon {
            font-size: 50px;
            color: #2ecc71;
            animation: popIn 0.5s ease-out;
        }
        @keyframes popIn {
            0% { transform: scale(0); opacity: 0; }
            60% { transform: scale(1.2); opacity: 1; }
            100% { transform: scale(1); }
        }
        .message {
            font-size: 22px;
            color: #333;
            margin-top: 10px;
        }
        .button {
            margin-top: 20px;
            padding: 10px 20px;
            background: #4facfe;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: transform 0.2s, background 0.3s;
        }
        .button:hover {
            background: #00c6fb;
            transform: scale(1.05);
        }
        .confetti {
            position: fixed;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 100%;
            height: 100%;
            pointer-events: none;
        }
    </style>
</head>
<body>
    <canvas class="confetti"></canvas>
    <div class="container">
        <i class="fa fa-check-circle success-icon"></i>
        <p class="message">Thanh toán thành công!</p>
        <button class="button" onclick="window.location.href='/';">Quay lại cửa hàng</button>
    </div>
    
    <script>
        // Confetti animation
        const canvas = document.querySelector('.confetti');
        const ctx = canvas.getContext('2d');
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;
        let particles = [];

        class Particle {
            constructor(x, y, size, speedX, speedY, color) {
                this.x = x;
                this.y = y;
                this.size = size;
                this.speedX = speedX;
                this.speedY = speedY;
                this.color = color;
            }
            update() {
                this.y += this.speedY;
                this.x += this.speedX;
                if (this.y > canvas.height) {
                    this.y = 0;
                    this.x = Math.random() * canvas.width;
                }
            }
            draw() {
                ctx.fillStyle = this.color;
                ctx.fillRect(this.x, this.y, this.size, this.size);
            }
        }

        function createParticles() {
            for (let i = 0; i < 100; i++) {
                let size = Math.random() * 10 + 5;
                let x = Math.random() * canvas.width;
                let y = Math.random() * canvas.height;
                let speedX = (Math.random() - 0.5) * 2;
                let speedY = Math.random() * 2 + 1;
                let colors = ['#ff4757', '#1e90ff', '#2ed573', '#f9ca24', '#e84393'];
                let color = colors[Math.floor(Math.random() * colors.length)];
                particles.push(new Particle(x, y, size, speedX, speedY, color));
            }
        }

        function animateParticles() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            particles.forEach(p => {
                p.update();
                p.draw();
            });
            requestAnimationFrame(animateParticles);
        }

        createParticles();
        animateParticles();
    </script>
</body>
</html>

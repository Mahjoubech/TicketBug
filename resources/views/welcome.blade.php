<!DOCTYPE html>
<html>
<head>
  <style>
    body {
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background: linear-gradient(to bottom, #87CEEB, #1E90FF);
      overflow: hidden;
      font-family: Arial, sans-serif;
    }

    .scene {
      position: relative;
      width: 600px;
      height: 400px;
    }

    .ground {
      position: absolute;
      bottom: 0;
      width: 100%;
      height: 100px;
      background: linear-gradient(to bottom, #8B4513, #A0522D);
      border-radius: 50% 50% 0 0 / 10% 10% 0 0;
    }

    .person {
      position: absolute;
      bottom: 100px;
    }

    .man {
      left: 150px;
      z-index: 1;
    }

    .woman {
      left: 350px;
      z-index: 2;
    }

    .head {
      position: relative;
      width: 50px;
      height: 60px;
      background-color: #F5DEB3;
      border-radius: 50% 50% 45% 45%;
    }

    .man .head {
      background-color: #DEB887;
    }

    .eye {
      position: absolute;
      width: 8px;
      height: 8px;
      background-color: #000;
      border-radius: 50%;
      top: 25px;
    }

    .eye.left {
      left: 12px;
    }

    .eye.right {
      right: 12px;
    }

    .mouth {
      position: absolute;
      width: 20px;
      height: 8px;
      bottom: 15px;
      left: 15px;
      border-bottom: 2px solid #000;
      border-radius: 0 0 50% 50%;
    }

    .hair {
      position: absolute;
      top: -10px;
      width: 54px;
      left: -2px;
      height: 25px;
      border-radius: 50% 50% 0 0;
    }

    .man .hair {
      background-color: #4A3314;
      height: 15px;
    }

    .woman .hair {
      background-color: #8B4513;
      height: 30px;
      border-radius: 50% 50% 40% 40%;
    }

    .body {
      position: relative;
      width: 60px;
      height: 100px;
      background-color: #1E90FF;
      border-radius: 10px 10px 0 0;
      margin-top: -5px;
      left: -5px;
    }

    .man .body {
      background-color: #4682B4;
    }

    .woman .body {
      background-color: #FF69B4;
    }

    .arm {
      position: absolute;
      width: 15px;
      height: 70px;
      background-color: #F5DEB3;
      top: 10px;
      border-radius: 5px;
    }

    .man .arm {
      background-color: #DEB887;
    }

    .arm.left {
      left: -10px;
      transform-origin: top center;
    }

    .arm.right {
      right: -10px;
      transform-origin: top center;
    }

    .leg {
      position: absolute;
      width: 20px;
      height: 80px;
      background-color: #000;
      bottom: -80px;
      border-radius: 5px;
    }

    .leg.left {
      left: 10px;
    }

    .leg.right {
      right: 10px;
    }

    .heart {
      position: absolute;
      width: 40px;
      height: 40px;
      background-color: #FF1493;
      transform: rotate(45deg);
      top: 80px;
      left: 280px;
      opacity: 0;
      z-index: 3;
    }

    .heart:before, .heart:after {
      content: "";
      position: absolute;
      width: 40px;
      height: 40px;
      background-color: #FF1493;
      border-radius: 50%;
    }

    .heart:before {
      top: -20px;
      left: 0;
    }

    .heart:after {
      top: 0;
      left: -20px;
    }

    .shadow {
      position: absolute;
      width: 80px;
      height: 20px;
      background-color: rgba(0, 0, 0, 0.3);
      bottom: -10px;
      left: -10px;
      border-radius: 50%;
    }

    .sun {
      position: absolute;
      width: 80px;
      height: 80px;
      background: radial-gradient(circle, #FFD700, #FFA500);
      border-radius: 50%;
      top: 40px;
      right: 40px;
      box-shadow: 0 0 20px 10px rgba(255, 215, 0, 0.7);
    }

    .tree {
      position: absolute;
      bottom: 100px;
      left: 50px;
    }

    .trunk {
      width: 20px;
      height: 100px;
      background: linear-gradient(to right, #8B4513, #A0522D);
      margin-left: 40px;
    }

    .leaves {
      width: 100px;
      height: 100px;
      background: radial-gradient(circle, #228B22, #006400);
      border-radius: 50%;
      position: absolute;
      bottom: 80px;
    }

    .bird {
      position: absolute;
      top: 60px;
      left: 150px;
    }

    .bird-body {
      width: 30px;
      height: 20px;
      background-color: #4169E1;
      border-radius: 50% 50% 50% 50%;
    }

    .bird-wing {
      position: absolute;
      width: 20px;
      height: 15px;
      background-color: #1E90FF;
      top: -5px;
      left: 5px;
      border-radius: 50% 50% 0 50%;
      transform-origin: bottom right;
    }

    .message {
      position: absolute;
      top: 20px;
      width: 100%;
      text-align: center;
      font-size: 24px;
      color: white;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
      opacity: 0;
    }
  </style>
</head>
<body>
  <div class="scene">
    <div class="sun"></div>
    <div class="message">Together Forever</div>

    <div class="tree">
      <div class="trunk"></div>
      <div class="leaves"></div>
    </div>

    <div class="bird">
      <div class="bird-body"></div>
      <div class="bird-wing"></div>
    </div>

    <div class="heart"></div>

    <div class="person man">

      <div class="head"> Mazine
        <div class="hair"></div>
        <div class="eye left"></div>
        <div class="eye right"></div>
        <div class="mouth"></div>
      </div>
      <div class="body">
        <div class="arm left"></div>
        <div class="arm right"></div>
        <div class="leg left"></div>
        <div class="leg right"></div>
      </div>
      <div class="shadow"></div>
    </div>

    <div class="person woman">

      <div class="head"> Salma
        <div class="hair"></div>
        <div class="eye left"></div>
        <div class="eye right"></div>
        <div class="mouth"></div>
      </div>
      <div class="body">
        <div class="arm left"></div>
        <div class="arm right"></div>
        <div class="leg left"></div>
        <div class="leg right"></div>
      </div>
      <div class="shadow"></div>
    </div>

    <div class="ground"></div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const man = document.querySelector('.man');
      const woman = document.querySelector('.woman');
      const manRightArm = document.querySelector('.man .arm.right');
      const womanLeftArm = document.querySelector('.woman .arm.left');
      const heart = document.querySelector('.heart');
      const message = document.querySelector('.message');
      const birdWing = document.querySelector('.bird-wing');
      const sun = document.querySelector('.sun');

      // Initial positions
      let manPosition = 150;
      let womanPosition = 350;

      // Animate people coming together
      const moveInterval = setInterval(() => {
        manPosition += 1;
        womanPosition -= 1;

        man.style.left = manPosition + 'px';
        woman.style.left = womanPosition + 'px';

        if (manPosition >= 230 && womanPosition <= 270) {
          clearInterval(moveInterval);

          // Animate arms to hold hands
          setTimeout(() => {
            manRightArm.style.transform = 'rotate(-30deg)';
            womanLeftArm.style.transform = 'rotate(30deg)';

            // Show heart animation
            setTimeout(() => {
              heart.style.transition = 'opacity 1s, transform 2s';
              heart.style.opacity = '1';
              heart.style.transform = 'rotate(45deg) scale(1.2)';

              // Pulse heart animation
              setInterval(() => {
                heart.style.transform = 'rotate(45deg) scale(1.2)';
                setTimeout(() => {
                  heart.style.transform = 'rotate(45deg) scale(1)';
                }, 500);
              }, 1000);

              // Show message
              setTimeout(() => {
                message.style.transition = 'opacity 2s';
                message.style.opacity = '1';
              }, 1000);
            }, 1000);
          }, 500);
        }
      }, 20);

      // Animate bird wing
      setInterval(() => {
        birdWing.style.transition = 'transform 0.2s';
        birdWing.style.transform = 'rotate(30deg)';

        setTimeout(() => {
          birdWing.style.transform = 'rotate(0deg)';
        }, 200);
      }, 400);

      // Animate sun glow
      setInterval(() => {
        sun.style.transition = 'box-shadow 2s';
        sun.style.boxShadow = '0 0 30px 15px rgba(255, 215, 0, 0.8)';

        setTimeout(() => {
          sun.style.boxShadow = '0 0 20px 10px rgba(255, 215, 0, 0.7)';
        }, 1000);
      }, 2000);
    });
  </script>
</body>
</html>

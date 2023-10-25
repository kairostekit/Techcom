// * Author: Pornkanok Tantewee 103503476
// * Target: What html file are reference by the JS file.
// * Purpose: Checking Form DatawithJavaScriptand Transferring data between HTML pages.
// * Created: 24/09/2023
// * last updated: 25/09/2023


// Confetti Effect
function startConfetti() {
    //create container for confetti
    var confettiContainer = document.createElement('div');
    confettiContainer.style.position = 'fixed';
    confettiContainer.style.top = '0';
    confettiContainer.style.left = '0';
    confettiContainer.style.width = '100%';
    confettiContainer.style.height = '100%';
    confettiContainer.style.pointerEvents = 'none';
    document.body.appendChild(confettiContainer);

    var colors = ['#FF6633', '#FFB399', '#FF33FF', '#FFFF99', '#00B3E6', '#E6B333', '#3366E6', '#999966'];


    function createConfetti() {
        //create confetti div
        var confetti = document.createElement('div');
        confetti.style.width = '20px';
        confetti.style.height = '20px';
        confetti.style.backgroundColor = colors[Math.floor(Math.random() * colors.length)];
        confetti.style.position = 'absolute';
        confetti.style.left = Math.random() * 100 + '%';
        confetti.style.animation = 'fall 2s linear infinite';
        //Add confetti to the container
        confettiContainer.appendChild(confetti);
        // Remove confetti after 2 seconds
        setTimeout(() => {
            confetti.remove();
        }, 2000);
    }

    setInterval(createConfetti, 100); // Gennerate confetti every 100 ms.
}


// moving picture

function myMove() {
    var id = null;
    var elem = document.getElementById("dog");
    var posX = 0; // Initialize the horizontal position.
    var posY = 0; // Initialize the vertical position.
    var moveRight = true; // Initialize the direction to right.

    clearInterval(id);

    id = setInterval(frame, 5);

    function frame() {
        if (posX == 350) { // If horizontal position reaches 350 pixels.
            moveRight = false; // Change direction to move left.
        }

        if (posY == 350) { // If vertical position reaches 350 pixels.
            moveRight = true; // Change direction to move right.
        }

        if (moveRight) {
            posX++; // Move right.
        } else {
            posY++; // Move down.
        }

        elem.style.right = posX + "px"; // Set the horizontal position.
        elem.style.top = posY + "px"; // Set the vertical position.
    }
}
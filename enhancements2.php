<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="description" content="Creating Web Applications" />
    <meta name="keywords" content="HTML, CSS, Assignment1" />
    <meta name="author" content="PORNKANOK" />
    <title>Enhancements</title>
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>
    <?php include_once("header.inc"); ?>
    <?php include_once("menu.inc"); ?>

    <h2 class="confetti">Confetti Effect 🎊</h2>
    <p><img src="./images/Confetti.png" alt="confetti" width="150" id="con"></p>


    <p class="hl">How it goes beyond the basic requirement</p>


    <p>Confetti appear on top of webpage</p>
    <p>The variety of color will be random</p>


    <p class="hl">what code is needed to implement the feature</p>
    <ul>
        <li>setTimeout(): to call the stopConfetti</li>
        <li>remove all confetti container from DOM</li>
        <li>confetti-container is used to select the container div</li>
    </ul>
    <p class="hl">References</p>
    <ul>
        <li>www.w3schools.com</li>
    </ul>
    <p class="h1"><a href="apply.html#button">Go to see</a></p>




    <h2>jQuery Water Ripple Effect on Click & Hover</h2>

    <p class="hl">How it goes beyond the basic requirement</p>
    <ul>
        <li>create water ripple effect on hover</li>
    </ul>
    <p class="hl">what code is needed to implement the feature</p>
    <ul>
        <li> using jQuery JavaScript library </li>


    </ul>


    <p> 1.Load the jQuery JavaScript library into your HTML document.</p>
    <br>

    <p><img src="./images/21.png" alt="html"></p>
    <p> 2.Load the ripples.js by adding the following CDN link in the head tag of your HTML page.</p>
    <br>
    <p><img src="./images/22.png" alt="html"></p>
    <p>3. After that, create an HTML element on which the ripple effect will be applied.
        Usually, you can use a ripple effect on buttons, background images, and other elements.
        However, the following div element contains a background image with the ripples effect.</p>
    <br>
    <p><img src="./images/23.png" alt="html"></p>


    <p>4.Define some CSS styles for div and add a background image.</p>
    <br>
    <p><img src="./images/24.png" alt="html"></p>

    <p>5. call the plugin in jQuery document ready function to integrated with Ripples JS.</p>
    <br>
    <p><img src="./images/25.png" alt="html"></p>





    <p class="h1"><a href="about.html#bk">Go to see</a></p>
    <p class="hl">References</p>

    <ul>
        <li>www.codehim.com</li>
    </ul>



    <h2 class="confetti">Object Moving</h2>



    <p class="hl">How it goes beyond the basic requirement</p>

    <ul>
        <li>Dog picture move when click button my dog</li>

    </ul>

    <p class="hl">what code is needed to implement the feature</p>
    <ul>
        <li><img src="./images/move.png" alt="confetti"></li>

    </ul>
    <p class="hl">References</p>
    <ul>
        <li>www.w3schools.com</li>
    </ul>
    <p class="h1"><a href="about.html#dog">Go to see</a></p>

	<?php include_once("footer.inc"); ?>

</body>

</html>
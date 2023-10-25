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


    <figure>
        <h2>Responsive web Design </h2>
        <p>Media querie for 2 different screen size.</p>

        <!-- <figure class="a">  <img src="./styles/images/fade.jpg" alt="fade" width="100"></figure>     -->
        <p class="hl">How it goes beyond the basic requirement</p>
        <ul>
            <li class="re">Tablet: 627px</li>
            <li class="re">Mobile: 375px</li>
        </ul>
        <p class="h1">Tablet</p>
        <ul>
            <li>Font color change to red</li>
            <li>Image width decrease</li>
            <li>Font size decrease</li>
            <li>Background colour change from black to green in hometown part.</li>
            <li>Navigation Bar chage from vertical direction to horizontal</li>
        </ul>
        <p class="h1">mobile</p>
        <ul>
            <li>Size skill image decrease</li>
            <li>Font size decrease</li>
            <li>Background colour change from green to yellow in hometown part.</li>
            <li>Navigation Bar chage from vertical direction to horizontal</li>
        </ul>
        <p class="hl">what code is needed to implement the feature</p>
        <ul>
            <li>@media (min-width: 640px) { body {font-size:1rem;} }</li>
        </ul>
        <p class="hl">References</p>
        <ul>
            <li>www.w3schools.com</li>
        </ul>
        <p class="h1"><a href="./about.html#sk" id="web">Go to see</a></p>

    </figure>

    <figure>
        <h2>Image Overlay Fade</h2>

        <p class="hl">How it goes beyond the basic requirement</p>
        <ul>
            <li>create a fading overlay effect to an image, on hover</li>
        </ul>
        <p class="hl">what code is needed to implement the feature</p>
        <p class="part">HTML PART</p>
        <ul>
            <li><img src="./images/html.png" alt="html"></li>
        </ul>
        <p class="part">CSS PART</p>
        <ul>
            <li><img src="./images/1.png" alt="1"></li>
            <li><img src="./images/2.png" alt="2"></li>
            <li><img src="./images/3.png" alt="3"></li>
            <li><img src="./images/4.png" alt="4"></li>
        </ul>
        <p class="hl">References</p>


        <ul>
            <li>www.w3schools.com</li>
        </ul>
        <p class="h1"> <a id="see" href="./index.html#image">Go to see</a></p>

    </figure>


	<?php include_once("footer.inc"); ?>

</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="description" content="Creating Web Applications" />
    <meta name="keywords" content="HTML, CSS, Assignment1" />
    <meta name="author" content="PORNKANOK" />
    <title>HomePage</title>
    <link rel="stylesheet" href="styles/style.css">
    <script src="scripts/enhancements.js"></script>
</head>

<body>

    <?php include_once("header.inc"); ?>
    <?php include_once("menu.inc"); ?>

    <figure>
        <h2>Our Service</h2>
        <ul>
            <li>
                <p>IT Consulting Our IT consulting services: help you navigate through complex and strategic IT
                    decisions and strategies</p>
            </li>
            <li>
                <p>IT Strategy Planning:We develop IT strategy plans to help you realise your business goals</p>
            </li>
            <li>
                <p>IT Audit:An IT Audit by Cogenesis delivers a clear view of the state of your IT services and systems.
                </p>
            </li>

        </ul>
    </figure>


    <section>
        <div class="info">
            <p id="big">Our Experts are Ready to Help You</p>
            <h2>Leadership of technology lead team to expert skill</h2>
        </div>
    </section>
    <div class="container">
        <img src="./images/job2.png" alt="job2" id="image">
        <div class="overlay">
            <div class="tex"> Welcome to Techcom</div>
        </div>
    </div>

	<?php include_once("footer.inc"); ?>

</body>

</html>
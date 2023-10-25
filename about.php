<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="description" content="Creating Web Applications" />
  <meta name="keywords" content="HTML, CSS, Assignment1" />
  <meta name="author" content="PORNKANOK" />
  <title>About</title>
  <link rel="stylesheet" href="styles/style.css">
  <script src="scripts/enhancements.js"></script>
</head>

<body>
  <?php include_once("header.inc"); ?>
  <?php include_once("menu.inc"); ?>

  <dl>
    <dt>Name:</dt>
    <dd>Pornkanok Tantewee</dd>
    <dt>Student number:</dt>
    <dd>103503476</dd>
    <dt>You tutor's name:</dt>
    <dd>Jeff Dunn</dd>
    <dt>Course you doing:</dt>
    <dd>Master of Data Science</dd>
  </dl>
  <figure>
    <img class="mypic" src="./images/Mypic.png" alt="mypic" width="150">
  </figure>
  <h1>Swinburne Timtable</h1>
  <table class="center">
    <tr>
      <th> Unit number</th>
      <th>Unit</th>
      <th>Type</th>
      <th> Day</th>
      <th> Time</th>
    </tr>
    <tr>
      <td>COS60010</td>
      <td> Technology Inquiry Project</td>
      <td>Workshop</td>
      <td>Monday</td>
      <td>10:30-12:30</td>
    </tr>
    <tr>
      <td>COS60010</td>
      <td> Technology Inquiry Project</td>
      <td>Online Lecture</td>
      <td>Monday</td>
      <td>17:30-18:30</td>
    </tr>
    <tr>
      <td>COS60004</td>
      <td> Creating Web Applications</td>
      <td>Online Lecture</td>
      <td>Tuesday</td>
      <td>12:30-14:30</td>
    </tr>
    <tr>
      <td>COS80025</td>
      <td>Data Visualisation</td>
      <td>Workshop</td>
      <td>Tuesday</td>
      <td> 14:30-15:30</td>
    </tr>
    <tr>
      <td>COS60004</td>
      <td> Creating Web Applications</td>
      <td>Workshop</td>
      <td>Tuesday</td>
      <td>16:30-18:30</td>
    </tr>
    <tr>
      <td>COS80025</td>
      <td>Data Visualisation</td>
      <td>Workshop</td>
      <td>Wednesday</td>
      <td> 16:30-16:30</td>
    </tr>
    <tr>
      <td>COS60009</td>
      <td>Data Management for the Big Data Age</td>
      <td>Online Lecture</td>
      <td>Wednesday</td>
      <td> 16:30-18:30</td>
    </tr>
    <tr>
      <td>COS60009</td>
      <td>Data Management for the Big Data Age</td>
      <td>Workshop</td>
      <td>Wednesday</td>
      <td>18:30-19:30 </td>
    </tr>
  </table>
  <dl>
    <dt>Email:</dt>
    <dd><a href="mailto:103503476@student.swin.edu.au">103503476@student.swin.edu.au</a></dd>
  </dl>
  <aside>
    <h2>My Skills</h2>
    <p><img id="sk" src="./images/skillchart.png" alt="skillchart"></p>
  </aside>
  <section>
    <div class="hometown">
      <h2>My Homtown</h2>
      <h2>Ranong</h2>
      <p><img src="./images/ranong.png" alt="ranong" width="300"></p>

      <p>Ranong is one of Thailand's southern provinces,on the west coast along the Andaman sea which is a large number
        of Island. This is one of the best destination that tourist people travel to there.</p>

    </div>
  </section>

  <div id="bk" class="bkima"></div>

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

  <!-- jQuery Ripples JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.ripples/0.5.3/jquery.ripples.min.js"></script>
  <script src="scripts/enhancements.js"></script>

  <script>
    $(document).ready(function() {
      $(".bkima").ripples({
        resolution: 200,
        perturbance: .004,
      });
    });
  </script>

  <h2>My favorite type of dog</h2>
  <p><button onclick="myMove()">My dog</button></p>
  <div id="condog">
    <div><img src='./images/corki.jpg' alt="dogs" id="dog"></div>
  </div>
  <?php include_once("footer.inc"); ?>

</body>

</html>
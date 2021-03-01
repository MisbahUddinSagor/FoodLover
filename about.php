<?php
	require_once('db/connect.php');
?>

<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta charset="utf-8">
    <link rel="shortcut icon" href="img/fav.png" type="image/gif" />
    <title>About Us</title>
    <!-- CSS -->
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/topmenu.css" rel="stylesheet" type="text/css">
    <link href="themes/1/js-image-slider.css" rel="stylesheet" type="text/css" />

    <!-- JS -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scrollup.js"></script>
    <script src="themes/1/js-image-slider.js" type="text/javascript"></script>

</head>

<body>
    <header class="header_home_p">
        <?php require_once('menu_top.php'); ?>
    </header>
    <br>

    <div class="wel">
        <h2>Order food from the best restaurants with foodlover Bangladesh</h2>
        <p>Are you hungry? Did you have a long and stressful day? Interested in getting a cheesy pizza delivered to your
            home or office? Then foodlover Bangladesh is the right destination for you! foodlover offers you a long and
            detailed list of the best restaurants and local favourites near you to help satisfy your hunger through our
            online food delivery service. Cuisines are diverse: whether you fancy a juicy burger from Takeout, fresh
            sushi from Samdado or peri peri chicken from Nando's, foodlover Bangladesh has a wide range of 650+
            restaurants available from Dhaka, to Chittagong through to Sylhet. From a healthy lunch to evening snacks to
            a hearty dinner, foodlover provides you with the means to satisfy your cravings throughout the day. Sit back
            and relax - let foodlover Bangladesh take the pressure off your shoulders.</p>

    </div>

    <div id="sliderFrame">
        <div id="slider">

            <img src="#" alt="Esrat Jahan" />
            <img src="img/misbah.png" alt="Misbah Uddin Sagor" />
            <img src="img/nayeem.png" alt="Mehedi Hasan Nayeem" />
        </div>
        <div id="htmlcaption" style="display: none;">
        </div>
    </div>

    <br>
    <br>
    <br>

    <table align="center" width="70%" border="3" cellpadding="10" cellspacing="5">
        <tbody>
            <tr>
                <th width="16%" align="center" valign="middle">NO.</th>
                <th width="56%" align="center" valign="middle">Name</th>
                <th width="28%" align="center" valign="middle">ID</th>
            </tr>
            <tr>
                <td align="center">01</td>
                <td align="center">Esrat Jahan </td>
                <td align="center">17101538</td>
            </tr>
            <tr>
                <td align="center">02</td>
                <td align="center">Misbah Uddin Sagor</td>
                <td align="center">17101283</td>
            </tr>
            <tr>
                <td align="center">03</td>
                <td align="center">Mehedi Hasan Nayeem </td>
                <td align="center">17101261</td>
            </tr>
        </tbody>
    </table>

    <br>
    <br>

    <?php require_once('footer.php'); ?>
</body>

</html>
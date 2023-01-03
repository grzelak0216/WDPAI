<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/bars.css">
    <script src="https://kit.fontawesome.com/bbd5fb75aa.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./public/js/bars_buttons.js" defer></script>
    <script type="text/javascript" src="./public/js/recipients.js" defer></script>
    <title>PROJECTS</title>
</head>

<body>
<?php include "header_bar.php"; ?>

<main>
    <!-- Recipient selection form -->
    <form id="recipient-form">
        <!-- Recipient selection dropdown -->
        <select id="recipient-select">
            <!-- Options will be generated dynamically with JavaScript -->
        </select>
        <!-- Submit button -->
        <button type="submit">Select</button>
    </form>

</main>

<?php include "footer_bar.php"; ?>
</body>
</html>

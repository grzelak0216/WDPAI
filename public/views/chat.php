<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <script src="https://kit.fontawesome.com/bbd5fb75aa.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./public/js/bars_buttons.js" defer></script>
    <script type="text/javascript" src="./public/js/chat.js" defer></script>
    <title>PROJECTS</title>
</head>

    <body>
        <?php include "header_bar.php"; ?>

        <main class="wallpaper">
            <!-- Chat interface -->
            <div id="chat-interface">

                <!-- Recipient selection dropdown -->
                <select id="recipient-select">
                    <!-- Options will be generated dynamically with JavaScript -->
                </select>

                <!-- Display messages -->
                <div id="messages">
                    <!-- Messages will be displayed here -->
                </div>
                <!-- Message input form -->
                <form id="message-form">

                    <div>
                        <i class="fa-solid fa-list-ul"></i>
                        <i class="fa-solid fa-camera"></i>
                        <i class="fa-solid fa-message"></i>
                    </div>
                    <!-- Message input field -->
                    <input type="text" id="message-input" placeholder="Enter your message here">
                    <!-- Submit button -->
                    <button type="submit"><i class="fa-solid fa-paper-plane"></i></button>
                </form>
            </div>
        </main>

        <?php include "footer_bar.php"; ?>
    </body>
</html>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Login</title>
        <meta charset="UTF-8">
        <script src="togglepwd.js" defer></script>
        <link rel="stylesheet" href="library.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    </head>
    <body>
        <h2>Login</h2>
        <?php
        if (isset($_GET["user"])) {
            echo "<p>Your username is: <strong>" . htmlspecialchars($_GET["user"]) . "</strong></p>";
        }
        ?>
        <form>
            <input type="text" name="username" placeholder="username" required><br>
            <div class="password-container">
                <input type="password" name="password" id="password" placeholder="Password" required>
                <button type="button" id="togglePasswordButton" class="toggle-password" onclick="togglePassword()">
                    <i id="eyeIcon" class="fa-solid fa-eye"></i>
                </button>
            </div>
            <br>
            <input type="submit">
        </form>
    </body>
</html>
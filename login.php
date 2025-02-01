<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Login</title>
        <meta charset="UTF-8">
        <script src="login.js" defer></script>
        <link rel="stylesheet" href="library.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    </head>
    <body>
        <h2>Login</h2>
        <form>
            <input type="text" name="username" placeholder="Username" required><br>
            <div>
                <input type="password" id="loginPassword" placeholder="Password" required>
                <i class="fa-solid fa-eye" id="toggleLoginPassword" style="cursor: pointer;"></i>
            </div>
            <br>
            <input type="submit">
        </form>
    </body>
</html>

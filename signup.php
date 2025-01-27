<!DOCTYPE html>
<html>
    <head>
        <title>Sign Up</title>
        <meta charset="UTF-8">
        <script src="signup.js" defer></script>
    </head>
    <body>
        <h2>Sign Up</h2>
        <div>
            <form action="signup_logic.php" method="POST">
                
                <h4>Name</h4>
                <input type="text" placeholder="Forename" name="forename" maxlength="20" required><br>
                <input type="text" placeholder="Surname" name="surname" maxlength="20" required><br>
                <input type="text" placeholder="Title" name="title" maxlength="4" required><br>
                <br>
                <h4>Date Of Birth</h4><br>
                <input type="number" id="day" name="day" placeholder="Day" min="1" max="31" required>
                <select id="month" name="month" placeholder="Month">
                    <option value="01">January</option>
                    <option value="02">Febuary</option>
                    <option value="03">March</option>
                    <option value="04">April</option>
                    <option value="05">May</option>
                    <option value="06">June</option>
                    <option value="07">July</option>
                    <option value="08">August</option>
                    <option value="09">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                </select>
                <input type="number" id="year" name="year" placeholder="year" min="1900" max="2100" required>
                <input type="submit" id="submit">
            </form>
        </div>
    </body>
</html>
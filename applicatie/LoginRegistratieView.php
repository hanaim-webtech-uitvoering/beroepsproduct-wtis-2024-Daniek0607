<main>
    <h2>Login</h2>

    <form action="php/login.php" method="POST">
        <label for="username">Gebruikersnaam:</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Wachtwoord:</label>
        <input type="password" id="password" name="password" required>

        <button type="submit" name="login_button">Inloggen</button>
    </form>

    <h2>Registreren</h2>
    <form action="php/registreren.php" method="POST">
        <label for="username">Gebruikersnaam:</label>
        <input type="text" id="username" name="username" required>

        <label for="first_name">Voornaam:</label>
        <input type="text" id="first_name" name="first_name" required>

        <label for="last_name">Achternaam:</label>
        <input type="text" id="last_name" name="last_name" required>

        <label for="address">Adres:</label>
        <input type="text" id="address" name="address" required>

        <label for="password">Wachtwoord:</label>
        <input type="password" id="password" name="password" required>

        <button type="submit" name="register_button">Registreren</button>
    </form>
</main>
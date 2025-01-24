<header>
    <h1>Pizzeria Sole Machina</h1>
    <nav>
        <ul>
            <li><a href="index.php?pagina=HomeView">Home</a></li>
            <li><a href="index.php?pagina=MenuView">Menu</a></li>
            <li><a href="index.php?pagina=WinkelmandjeView">Winkelmandje</a></li>

            <?php if (isset($_SESSION['ingelogd'])): ?>
                <?php if ($_SESSION['role'] !== 'Personnel'): ?>
                    <li><a href="index.php?pagina=ProfielView">Profiel</a></li>
                <?php endif; ?>

                <?php if ($_SESSION['role'] === 'Personnel'): ?>
                    <li><a href="index.php?pagina=BestellingenView">Bestellingoverzicht</a></li>
                <?php endif; ?>

                <li><a href="php/logout.php">Uitloggen (<?= htmlspecialchars($_SESSION['username']) ?>)</a></li>
            <?php else: ?>
                <li><a href="index.php?pagina=LoginRegistratieView">Inloggen/Registreren</a></li>
            <?php endif; ?>

            <li><a href="index.php?pagina=PrivacyView">Privacyverklaring</a></li>
        </ul>
    </nav>
</header>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Connexion - Jeu de l'espace</title>
    <link rel="stylesheet" href="./css/style_connexion.css">
</head>
<body>
    <video autoplay muted loop>
        <source src="./ressources/login-register_background.mp4">
    </video>
    <div class="login-box">
        <h2>Connexion</h2>
        <form action="../api/process/login-process.php" method="POST">
            <div class="user-box">
                <input type="text" name="username" required="">
                <label>Nom d'utilisateur</label>
            </div>
            <div class="user-box">
                <input type="password" name="password" required="">
                <label>Mot de passe</label>
            </div>
            <button href="#">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                Se connecter
            </button>
        </form>
        <a href="./register.php" class="create-account-link">Vous n'avez pas de compte ? Créer un compte</a>
    </div>        
</body>
</html>
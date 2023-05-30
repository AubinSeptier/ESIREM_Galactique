<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Création de compte - Jeu de l'espace</title>
    <link rel="stylesheet" href="./css/style_connexion.css">
</head>
<body>
    <video autoplay muted loop>
        <source src="./ressources/login-register_background.mp4">
    </video>
    <div class="login-box">
        <h2>Connexion</h2>
        <form action="../api/process/register-process.php" method="POST">
            <div class="user-box">
                <input type="email" name="email" required="">
                <label>Email</label>
            </div>
            <div class="user-box">
                <input type="text" name="username" required="">
                <label>Nom d'utilisateur</label>
            </div>
            <div class="user-box">
                <input type="password" name="password" required="">
                <label>Mot de passe</label>
            </div>
            <div class="user-box">
                <input type="password" name="password-repeat" required="">
                <label>Saisissez à nouveau votre mot de passe</label>
            </div>
            <button href="#">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                Se connecter
                </button>
            <a href="./login.php" class="create-account-link">J'ai déjà un compte</a>

        </form>
    </div>

</body>
</html>
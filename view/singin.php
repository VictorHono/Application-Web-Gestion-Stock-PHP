<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="POS - Bootstrap Admin Template">
    <meta name="keywords"
        content="admin, estimates, bootstrap, business, corporate, creative, invoice, html5, responsive, Projects">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title> Login</title>

    <link rel="shortcut icon" type="image/x-icon" href="./public/img/favicon.png">

    <link rel="stylesheet" href="./public/css/bootstrap.min.css">

    <link rel="stylesheet" href="./public/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="./public/plugins/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="./public/css/style2.css">
</head>

<body class="account-page">

<div class="main-wrapper">
        <div class="account-content">
            <div class="login-wrapper">
                <div class="login-content">
                    <form class="login-userset" method="post" action="./index.php?action=login">
                        <div class="login-logo">
                            <img src="./public/img/logo.png" alt="img">
                        </div>
                        <div class="login-userheading">
                            <h3>connexion</h3>
                            <h4>veuillez vous connecter à votre compte</h4>
                        </div>
                        <div class="form-login">
                            <label>Email</label>
                            <div class="form-addons">
                                <input type="text" placeholder="Enter your email address" name="email">
                                <img src="assets/img/icons/mail.svg" alt="img">
                                <?php if (isset($resultat) && $resultat === 'FAUX_EMAIL'): ?>
                                    <p style="color:red; text-align: center">Invalid email</p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-login">
                            <label>Password</label>
                            <div class="pass-group">
                                <input type="password" class="pass-input" placeholder="Enter your password" name="password">
                                <span class="fas toggle-password fa-eye-slash"></span>
                            </div>
                            <div>
                                <?php if (isset($resultat) && $resultat === 'FAUX_MDP'): ?>
                                    <p style="color:red; text-align: center">Incorrect password</p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-login">
                            <button class="btn btn-login" type="submit" name="conectee" value="conectee">Sign in</button>
                        </div>
                    </form>
                </div>
                <div class="login-img">
                    <img src="./public/img/login.jpg" alt="img">
                </div>
            </div>
        </div>
    </div>


    <script src="./public/js/jquery-3.6.0.min.js"></script>

    <script src="./public/js/feather.min.js"></script>

    <script src="./public/js/bootstrap.bundle.min.js"></script>

    <script src="./public/js/script.js"></script>
</body>

</html>

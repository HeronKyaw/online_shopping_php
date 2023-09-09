<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../resources/style/main.css">
</head>

<body>
    <section class="login-bg">
        <div class="login-body">
            <div class="login-card">
                <div class="login-card-body">
                    <small>
                        <a href="../index.php">
                            << Back to Shopping 
                        </a>
                    </small>
                    <h1 class="login-title">
                        Sign in to your account
                    </h1>
                    <?php if (isset($_GET['login']) and $_GET['login'] == 'failed') : ?>
                        <div class="login-alert-banner" role="alert">
                            <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <span class="sr-only">Info</span>
                            <div>
                                <span class="banner-title">Login Failed!</span> Username or password is incorrect.
                            </div>
                        </div>
                    <?php elseif (isset($_GET['login']) and $_GET['login'] == 'not-found') : ?>
                        <div class="login-alert-banner" role="alert">
                            <svg class="banner-icon" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <span class="icon-sr">Info</span>
                            <div>
                                <span class="banner-title">User not found!</span> Please create one.
                            </div>
                        </div>
                    <?php endif; ?>
                    <form class="login-form" action="../auth/login.php" method="POST">
                        <div>
                            <label for="nameOrEmail" class="input-title">Username (or) Email</label>
                            <input type="nameOrEmail" name="nameOrEmail" id="nameOrEmail" class="input-field" placeholder="John Doe" required="">
                        </div>
                        <div>
                            <label for="password" class="input-title">Password</label>
                            <input type="password" name="password" id="password" placeholder="••••••••" class="input-field" required="">
                        </div>
                        <div class="action-box">
                            <div class="remember-me-box">
                                <div class="rem-cb-container">
                                    <input id="remember" aria-describedby="remember" type="checkbox" class="rem-cb">
                                </div>
                                <div class="rem-text-container">
                                    <label for="remember" class="">Remember me</label>
                                </div>
                            </div>
                            <a href="#" class="fg-psw">Forgot password?</a>
                        </div>
                        <button type="submit" class="sign-in-form-btn">Sign in</button>
                        <p class="signup-action">
                            Don’t have an account yet? <a href="#" class="signup-text">Sign up</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
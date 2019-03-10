<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Home page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="screen" href="css/main.css" />
</head>
<body>
    <header>
        <nav>
            <ul>
                <div>
                    <li class="header-i"><i class="fas fa-graduation-cap"></i></li>
                    <li><a class="nav-a" href="index.php">Discite</a></li>
                </div>
                <div>
                <?php if (guest()): ?>
                    <li id="registro"><a class="nav-a" href="register.php">Register</a></li>
                    <p>|</p>
                    <li id="registro"><a class="nav-a" href="login.php">Login</a></li>
                <?php else: ?>
                    <li id="registro"><a class="nav-a" href="profile.php"><?= user()->getUsername() ?></a></li>   
                    <p>|</p>
                    <li id="registro"><a class="nav-a" href="logout.php">Cerrar sesión</a></li> 
                <?php endif; ?>
                </div>
            </ul>
        </nav>
    </header>
    <main>
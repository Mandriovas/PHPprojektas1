<?php

   session_start();


   if($_SERVER['QUERY_STRING']=='noname'){
      unset($_SESSION['name']);
   }
   $name = $_SESSION['name'] ?? 'Svecias';


?>



<head>
    <title>E~M picos</title>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <style type="text/css">
        .brand {
            background: #cbb09c !important;
        }

        .brand-text {
            color: #cbb09c !important;
        }

        form {
            max-width: 460px;
            margin: 20px auto;
            padding: 20px;
        }

        .pizza {
            width: 300px margin-top: 140px;
            margin-left: auto;
            margin-right: auto;
            display: block;
            position: relative;
            top: 10px;
        }

    </style>
</head>

<body class="grey lighten-4">
    <nav class="white z-depth-0">
        <div class="container">
            <a href="index.php" class="brand-logo brand-text">E~M picos</a>
            <ul id="nav-mobile" class="right hide-on-small-and-down">
                <li class="grey-text">Sveika(-s) <?php echo htmlspecialchars($name); ?></li>
                <?php if(isset($_SESSION['name'])){ ?>
                <a href='logout.php' class="btn brand z-depth-0">Atsijungti</a>;
                <?php }else{ ?>
                <a href="login.php" class="btn brand z-depth-0">Prisijungti</a>;
                <?php } ?>
                                
                <li><a href="add.php" class="btn brand z-dept-0">Prideti pica</a></li>
            </ul>
        </div>
    </nav>

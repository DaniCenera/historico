<!DOCTYPE html>
<html lang="<?=SITE_LANGUAGE; //es lo mismo que un echo ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo TITULO.' - '.SITE_TITLE ?></title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <?php
        navMenu(MENUPRINCIPAL);
        ?>
    </header>
    <main>

    
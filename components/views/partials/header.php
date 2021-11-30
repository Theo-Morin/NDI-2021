<header>
    <title><?=$title?></title>
	<meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />

    <!-- FONT AWESOME v5.6.3 init -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <!-- STYLESHEETS init -->
<?php foreach($stylesheets as $style) { ?>
    <link rel="stylesheet" href="<?= $style ?>.css">
<?php } ?>
</header>
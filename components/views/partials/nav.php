<?php if(!empty($_SESSION['alert'])) { ?>
<div style="background:var(--<?=$_SESSION['alert_code']?>);color:black;"><?= $_SESSION['alert_code'] ?></div>
<?php } Alert::delete(); ?>
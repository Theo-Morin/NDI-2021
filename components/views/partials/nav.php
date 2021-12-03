<nav>
    <div class="name title"><?= APP_NAME ?></div>
    <div class="search-bar"><span><i class="fas fa-search pl-3"></i></span><span style="margin-left:10px;"><i class="fas fa-user"></i></span></div>
</nav>
<div class="container">
    <?php if(!empty($_SESSION['alert'])) { ?>
    <div class="alert alert-<?= $_SESSION['alert_code'] ?>"><?= $_SESSION['alert'] ?></div>
    <?php } Notifications::delete(); ?>
</div>
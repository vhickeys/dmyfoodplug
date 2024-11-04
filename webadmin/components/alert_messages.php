<?php
if (isset($_SESSION['errorMessage'])) {
?>

    <div class="alert alert-danger solid alert-dismissible fade show">
        <svg viewBox="0 0 24 24" width="24 " height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2">
            <polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon>
            <line x1="15" y1="9" x2="9" y2="15"></line>
            <line x1="9" y1="9" x2="15" y2="15"></line>
        </svg>
        <strong>Error!</strong> <?php echo $_SESSION['errorMessage']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
        </button>
    </div>

<?php
    unset($_SESSION['errorMessage']);
}

if (isset($_SESSION['successMessage'])) {
?>
    <div class="alert alert-success solid alert-dismissible fade show">
        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2">
            <polyline points="9 11 12 14 22 4"></polyline>
            <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
        </svg>
        <strong>Success!</strong> Hey, <?php echo $_SESSION['successMessage']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
        </button>
    </div>

<?php
    unset($_SESSION['successMessage']);
}
?>

<?php
if (isset($_SESSION['message'])) {
?>

    <div class="alert alert-warning solid alert-dismissible fade show">
        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2">
            <path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z">
            </path>
            <line x1="12" y1="9" x2="12" y2="13"></line>
            <line x1="12" y1="17" x2="12.01" y2="17"></line>
        </svg>
        <strong>Warning!</strong> <?php echo $_SESSION['message']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
        </button>
    </div>

<?php
    unset($_SESSION['message']);
}
?>

<?php
if (isset($_SESSION['userErrorMessage'])) {
?>

    <div class="alert alert--large alert-danger" role="alert">
        <div class="alert-icon">
            <svg class="woox-icon icon-del">
                <use xlink:href="#icon-close-cross"></use>
            </svg>
        </div>
        <div class="alert-content">
            <strong>Error Message!</strong>
            <?php echo $_SESSION['userErrorMessage']; ?>
        </div>
        <a href="#" class="icon-close">
            <svg class="woox-icon icon-del">
                <use xlink:href="#icon-close-cross"></use>
            </svg>
        </a>
    </div>

<?php
    unset($_SESSION['userErrorMessage']);
}
?>

<?php
if (isset($_SESSION['userNotifyMessage'])) {
?>

    <div class="alert alert--large alert-success" role="alert">
        <div class="alert-icon">
            <svg class="woox-icon icon-check-mark-2">
                <use xlink:href="#icon-check-mark-2"></use>
            </svg>
        </div>
        <div class="alert-content">
            <strong>Hey James,</strong> littera gothica, nunc putamus claram, anteposuerit litterarum
            humanitatis.
        </div>
        <a href="#" class="icon-close">
            <svg class="woox-icon icon-del">
                <use xlink:href="#icon-close-cross"></use>
            </svg>
        </a>
    </div>

<?php
    unset($_SESSION['userNotifyMessage']);
}
?>
<div class="adminPanel">
<?php // main admin component for include all dashboard elements

    // warnning box
    if (!$dashboardController->isWarninBoxEmpty()) {
        include($_SERVER['DOCUMENT_ROOT'].'/../site/admin/elements/WarningBox.php');
    }

    // services status element
    include($_SERVER['DOCUMENT_ROOT'].'/../site/admin/elements/ServiceStatusBox.php');

    // system info element
    include($_SERVER['DOCUMENT_ROOT'].'/../site/admin/elements/SystemInfoBox.php');

    // card element
    include($_SERVER['DOCUMENT_ROOT'].'/../site/admin/elements/DashboardCards.php');
?>
</div>
<div class="adminPanel ooverflow-x-hiden">
<?php // main admin component for include all dashboard elements

    // warnning box
    if (!$dashboardManager->isWarninBoxEmpty()) {
        include($_SERVER['DOCUMENT_ROOT'].'/../site/admin/elements/WarningBox.php');
    }

    // services status element
    include($_SERVER['DOCUMENT_ROOT'].'/../site/admin/elements/ServiceStatusBox.php');

    // system info element
    include($_SERVER['DOCUMENT_ROOT'].'/../site/admin/elements/SystemInfoBox.php');

    // card element
    include($_SERVER['DOCUMENT_ROOT'].'/../site/admin/elements/DashboardCards.php');
?>
<style>
    .wrapper .section .top_navbar {
        width: calc(100% - 240px);
    }
</style>
</div>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="#"><?= __('Dashboard') ?></a>
            <i class="fa fa-angle-right"></i>
        </li>
    </ul>
</div>
<div class="col-md-12">
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat green-meadow">
            <div class="visual">
                <i class="fa fa-land"></i>
            </div>
            <div class="details">
                <div class="number">
                    <?= $total_plots; ?>
                </div>
                <div class="desc">
                     Plots
                </div>
            </div>
            <a class="more" href="#">
                View more <i class="m-icon-swapright m-icon-white"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat dashboard-stat-v2 purple">
            <div class="visual">
                <i class="fa fa-globe"></i>
            </div>
            <div class="details">
                <div class="number">
                    <?= $total_dohs; ?>
                </div>
                <div class="desc">
                     DOHS
                </div>
            </div>
            <a class="more" href="#">
                View more <i class="m-icon-swapright m-icon-white"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat yellow-casablanca">
            <div class="visual">
                <i class="fa fa-home"></i>
            </div>
            <div class="details">
                <div class="number">
                    <?= $total_buildings; ?>
                </div>
                <div class="desc">
                    Buildings
                </div>
            </div>
            <a class="more" href="#">
                View more <i class="m-icon-swapright m-icon-white"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat dashboard-stat-v2 green">
            <div class="visual">
                <i class="fa fa-delicious"></i>
            </div>
            <div class="details">
                <div class="number">
                   <?= $total_apartments ?>
                </div>
                <div class="desc">
                    Apartments
                </div>
            </div>
            <a class="more" href="#">
                View more <i class="m-icon-swapright m-icon-white"></i>
            </a>
        </div>
    </div>

    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat red-flamingo">
            <div class="visual">
                <i class="fa fa-home"></i>
            </div>
            <div class="details">
                <div class="number">
                    <?= $total_houses ?>
                </div>
                <div class="desc">
                   Houses
                </div>
            </div>
            <a class="more" href="#">
                View more <i class="m-icon-swapright m-icon-white"></i>
            </a>
        </div>
    </div>

    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat dashboard-stat-v2 green">
            <div class="visual">
                <i class="fa fa-delicious"></i>
            </div>
            <div class="details">
                <div class="number">

                </div>
                <div class="desc">
                    Markets
                </div>
            </div>
            <a class="more" href="#">
                View more <i class="m-icon-swapright m-icon-white"></i>
            </a>
        </div>
    </div>

    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat red-thunderbird">
            <div class="visual">
                <i class="fa fa-shopping-cart"></i>
            </div>
            <div class="details">
                <div class="number">

                </div>
                <div class="desc">
                    Shops
                </div>
            </div>
            <a class="more" href="#">
                View more <i class="m-icon-swapright m-icon-white"></i>
            </a>
        </div>
    </div>
</div>
<div class="col-md-12">
    <div class="portlet solid grey-cararra bordered">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-bullhorn"></i>
            </div>

        </div>
        <div class="portlet-body">
            <div id="site_activities_loading">
                <img src="../../assets/admin/layout/img/loading.gif" alt="loading"/>
            </div>
            <div id="site_activities_content" class="display-none">
                <div id="site_activities" style="height: 228px;">
                </div>
            </div>
            <div style="margin: 20px 0 10px 30px">

            </div>
        </div>
    </div>
</div>
<script src="<?php echo $this->request->webroot; ?>assets/global/plugins/flot/jquery.flot.min.js"
        type="text/javascript"></script>
<script src="<?php echo $this->request->webroot; ?>assets/global/plugins/flot/jquery.flot.categories.min.js"
        type="text/javascript"></script>
<!--demo chart-->
<script src="<?php echo $this->request->webroot; ?>assets/admin/pages/scripts/index.js" type="text/javascript"></script>
<script>
    jQuery(document).ready(function () {
        Index.initCharts(); // init index page's custom scripts
    });
</script>
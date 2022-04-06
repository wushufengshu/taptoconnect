<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>Tap to Connect</title>


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="/assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/img/favicons/favicon-16x16.png">
    <!-- <link rel="shortcut icon" type="image/x-icon" href="/assets/img/favicons/favicon.ico"> -->

    <link rel="shortcut icon" type="image/x-icon" href="/ttc/favicon.ico" />
    <link rel="manifest" href="/assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="/assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">
    <?= $this->Html->script('falcon/config.js') ?>
    <?= $this->Html->script('vendors/overlayscrollbars/OverlayScrollbars.min.js') ?>

    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <?= $this->Html->css('legend.css'); ?>

    <link href="/vendors/flatpickr/flatpickr.min.css" rel="stylesheet">
    <link href="/vendors/dropzone/dropzone.min.css" rel="stylesheet">
    <?= $this->Html->css('https://fonts.gstatic.com', ['rel' => 'preconnect']) ?>
    <?= $this->Html->css('https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:300,400,500,600,700,800,900&amp;display=swap') ?>
    <?= $this->Html->css('vendors/overlayscrollbars/OverlayScrollbars.min.css') ?>
    <?= $this->Html->css('falcon/theme-rtl.min.css', ['id' => 'style-rtl']) ?>
    <?= $this->Html->css('falcon/theme.min.css', ['id' => 'style-default']) ?>
    <?= $this->Html->css('falcon/user-rtl.min.css', ['id' => 'user-style-rtl']) ?>
    <?= $this->Html->css('falcon/user.min.css', ['id' => 'user-style-default']) ?>

    <script>
        var isRTL = JSON.parse(localStorage.getItem('isRTL'));
        if (isRTL) {
            var linkDefault = document.getElementById('style-default');
            var userLinkDefault = document.getElementById('user-style-default');
            linkDefault.setAttribute('disabled', true);
            userLinkDefault.setAttribute('disabled', true);
            document.querySelector('html').setAttribute('dir', 'rtl');
        } else {
            var linkRTL = document.getElementById('style-rtl');
            var userLinkRTL = document.getElementById('user-style-rtl');
            linkRTL.setAttribute('disabled', true);
            userLinkRTL.setAttribute('disabled', true);
        }
    </script>
</head>


<body>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <?php if (isset($identity) && $identity->role_id === 1) { ?>
        <main class="main" id="top">
            <div class="container" data-layout="container">
                <?= $this->Html->script('falconfluid') ?>
                <nav class="navbar navbar-light navbar-vertical navbar-expand-xl">
                    <script>
                        var navbarStyle = localStorage.getItem("navbarStyle");
                        if (navbarStyle && navbarStyle !== 'transparent') {
                            document.querySelector('.navbar-vertical').classList.add(`navbar-${navbarStyle}`);
                        }
                    </script>
                    <?php include("sidebar.php"); ?>
                </nav>
                <div class="content">
                    <?php include("topbar.php"); ?>

                    <?= $this->Flash->render() ?>
                    <?= $this->fetch('content') ?>


                    <?php include("footer.php"); ?>

                </div>

            </div>
        </main>

    <?php } else { ?>

        <main class="main" id="top">
            <div class="container" data-layout="container">
                <?= $this->Html->script('falconfluid') ?>


                <?= $this->fetch('content') ?>
            </div>
        </main>

    <?php } ?>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->


    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="/vendors/popper/popper.min.js"></script>
    <script src="/vendors/bootstrap/bootstrap.min.js"></script>
    <script src="/vendors/anchorjs/anchor.min.js"></script>
    <script src="/vendors/is/is.min.js"></script>
    <script src="/assets/js/flatpickr.js"></script>
    <script src="/vendors/dropzone/dropzone.min.js"></script>
    <script src="/vendors/lottie/lottie.min.js"></script>
    <script src="/vendors/validator/validator.min.js"></script>
    <script src="/vendors/fontawesome/all.min.js"></script>
    <script src="/vendors/lodash/lodash.min.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="/vendors/list.js/list.min.js"></script>
    <script src="/assets/js/theme.js"></script>

</body>

</html>
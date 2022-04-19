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

    <script src="/assets/js/config.js"></script>
    <script src="/vendors/overlayscrollbars/OverlayScrollbars.min.js"></script>
    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <?= $this->Html->css('legend.css'); ?>

    <link href="/vendors/flatpickr/flatpickr.min.css" rel="stylesheet">
    <link href="/vendors/dropzone/dropzone.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">
    <link href="/vendors/overlayscrollbars/OverlayScrollbars.min.css" rel="stylesheet">
    <link href="/assets/css/theme-rtl.min.css" rel="stylesheet" id="style-rtl">
    <link href="/assets/css/theme.min.css" rel="stylesheet" id="style-default">
    <link href="/assets/css/user-rtl.min.css" rel="stylesheet" id="user-style-rtl">
    <link href="/assets/css/user.min.css" rel="stylesheet" id="user-style-default">
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

    <style type="text/css">
        .bell {
            color: #A8192C;
            animation: ring 5s .7s ease-in-out infinite;
        }

        @-webkit-keyframes ring {
            0% {
                -webkit-transform: rotateZ(0);
            }

            1% {
                -webkit-transform: rotateZ(30deg);
            }

            3% {
                -webkit-transform: rotateZ(-28deg);
            }

            5% {
                -webkit-transform: rotateZ(34deg);
            }

            7% {
                -webkit-transform: rotateZ(-32deg);
            }

            9% {
                -webkit-transform: rotateZ(30deg);
            }

            11% {
                -webkit-transform: rotateZ(-28deg);
            }

            13% {
                -webkit-transform: rotateZ(26deg);
            }

            15% {
                -webkit-transform: rotateZ(-24deg);
            }

            17% {
                -webkit-transform: rotateZ(22deg);
            }

            19% {
                -webkit-transform: rotateZ(-20deg);
            }

            21% {
                -webkit-transform: rotateZ(18deg);
            }

            23% {
                -webkit-transform: rotateZ(-16deg);
            }

            25% {
                -webkit-transform: rotateZ(14deg);
            }

            27% {
                -webkit-transform: rotateZ(-12deg);
            }

            29% {
                -webkit-transform: rotateZ(10deg);
            }

            31% {
                -webkit-transform: rotateZ(-8deg);
            }

            33% {
                -webkit-transform: rotateZ(6deg);
            }

            35% {
                -webkit-transform: rotateZ(-4deg);
            }

            37% {
                -webkit-transform: rotateZ(2deg);
            }

            39% {
                -webkit-transform: rotateZ(-1deg);
            }

            41% {
                -webkit-transform: rotateZ(1deg);
            }

            43% {
                -webkit-transform: rotateZ(0);
            }

            100% {
                -webkit-transform: rotateZ(0);
            }
        }

        @-moz-keyframes ring {
            0% {
                -moz-transform: rotate(0);
            }

            1% {
                -moz-transform: rotate(30deg);
            }

            3% {
                -moz-transform: rotate(-28deg);
            }

            5% {
                -moz-transform: rotate(34deg);
            }

            7% {
                -moz-transform: rotate(-32deg);
            }

            9% {
                -moz-transform: rotate(30deg);
            }

            11% {
                -moz-transform: rotate(-28deg);
            }

            13% {
                -moz-transform: rotate(26deg);
            }

            15% {
                -moz-transform: rotate(-24deg);
            }

            17% {
                -moz-transform: rotate(22deg);
            }

            19% {
                -moz-transform: rotate(-20deg);
            }

            21% {
                -moz-transform: rotate(18deg);
            }

            23% {
                -moz-transform: rotate(-16deg);
            }

            25% {
                -moz-transform: rotate(14deg);
            }

            27% {
                -moz-transform: rotate(-12deg);
            }

            29% {
                -moz-transform: rotate(10deg);
            }

            31% {
                -moz-transform: rotate(-8deg);
            }

            33% {
                -moz-transform: rotate(6deg);
            }

            35% {
                -moz-transform: rotate(-4deg);
            }

            37% {
                -moz-transform: rotate(2deg);
            }

            39% {
                -moz-transform: rotate(-1deg);
            }

            41% {
                -moz-transform: rotate(1deg);
            }

            43% {
                -moz-transform: rotate(0);
            }

            100% {
                -moz-transform: rotate(0);
            }
        }

        @keyframes ring {
            0% {
                transform: rotate(0);
            }

            1% {
                transform: rotate(30deg);
            }

            3% {
                transform: rotate(-28deg);
            }

            5% {
                transform: rotate(34deg);
            }

            7% {
                transform: rotate(-32deg);
            }

            9% {
                transform: rotate(30deg);
            }

            11% {
                transform: rotate(-28deg);
            }

            13% {
                transform: rotate(26deg);
            }

            15% {
                transform: rotate(-24deg);
            }

            17% {
                transform: rotate(22deg);
            }

            19% {
                transform: rotate(-20deg);
            }

            21% {
                transform: rotate(18deg);
            }

            23% {
                transform: rotate(-16deg);
            }

            25% {
                transform: rotate(14deg);
            }

            27% {
                transform: rotate(-12deg);
            }

            29% {
                transform: rotate(10deg);
            }

            31% {
                transform: rotate(-8deg);
            }

            33% {
                transform: rotate(6deg);
            }

            35% {
                transform: rotate(-4deg);
            }

            37% {
                transform: rotate(2deg);
            }

            39% {
                transform: rotate(-1deg);
            }

            41% {
                transform: rotate(1deg);
            }

            43% {
                transform: rotate(0);
            }

            100% {
                transform: rotate(0);
            }
        }
    </style>

</head>


<body>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <?php
    $nosidebartemplate = ['activatecard', 'login', 'token', 'register', 'activateandregister', 'serial'];
    if (!$identity &&  in_array($this->request->getParam('action'), $nosidebartemplate)) {
    ?>
        <main class="main" id="top">
            <div class="container" data-layout="container">
                <?= $this->Html->script('falconfluid') ?>


                <?= $this->fetch('content') ?>
            </div>
        </main>


    <?php } else {
    ?>

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

    <?php }
    ?>
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
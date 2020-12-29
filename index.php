<!DOCTYPE html>
<!--[if IE 9]> <html class="ie9 no-js" lang="en"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Perpustakaan</title>
    <link rel="stylesheet" href="polished/polished.min.css">
    <link rel="stylesheet" href="polished/iconic/css/open-iconicbootstrap.min.css">
    <style>
        .grid-highlight {
            padding-top: 1rem;
            padding-bottom: 1rem;
            background-color: #5c6ac4;
            border: 1px solid #202e78;
            color: #fff;
        }

        hr {
            margin: 6rem 0;
        }

        hr+.display-3,
        hr+.display-2+.display-3 {
            margin-bottom: 2rem;
        }
    </style>
    <script type="text/javascript">
        document.documentElement.className =
            document.documentElement.className.replace('no-js', 'js') +
            (document.implementation.hasFeature("http://www.w3.org/TR/SVG11/feature#BasicStructure ", "1.1 ") ? ' svg' : ' no-svg');
    </script>
</head>

<body>
    <nav class="navbar navbar-expand p-0">
        <a class="navbar-brand text-center col-xs-12 col-md-3 col-lg-2 mr-0" href="index.html"> Perpustakaan </a>
        <button class="btn btn-link d-block d-md-none" datatoggle="collapse" data-target="#sidebar-nav" role="button">
            <span class="oi oi-menu"></span>
        </button>
    </nav>
    <div class="container-fluid h-100 p-0">
        <div style="min-height: 100%" class="flex-row d-flex align-itemsstretch m-0">
            <div class="col-lg-12 col-md-12 p-4">
                <?php
                if (isset($_GET['pesan'])) {
                    if ($_GET['pesan'] == "gagal") {
                        echo "Login gagal! username dan password salah!";
                    } else if ($_GET['pesan'] == "logout") {
                        echo "Anda telah berhasil logout";
                    } else if ($_GET['pesan'] == "belum_login") {
                        echo "Login terlebih Dahulu untuk mengakses halaman admin";
                    }
                }
                ?>
                <br><br><br><br>
                <div class="container">
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <div class="card bg-white border">
                                <div class="card-body">
                                    <form method="post" action="login.php">
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <br>
                                                <label for="username" class="col-sm-12 colform-label pl-0">User Name</label>
                                                <br>
                                                <input id="username" type="text" class="form-control" name="username">
                                                <br>
                                                <label for="password" class="col-sm-12 colform-label pl-0">Password</label>
                                                <br>
                                                <input id="password" name="password" type="password" class="form-control">
                                                <br>

                                                <button type="submit" class="btn-block btn btn-primary">Login</button>

                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.
min.js" integrity="sha384-
cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min
.js" integrity="sha384-
uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>


</body>

</html>
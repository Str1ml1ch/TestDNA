<html>

<head>
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="/public/loginstyle.css">
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <!-- JavaScript and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width; initial-scale=1.0">

    <link rel="icon" href="/public/icon.png" />
</head>

<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand">Test</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
                    <?php if(!isset($_SESSION['authorize']['name'])) :?>
                    <li class="nav-item">
                        <a class="nav-link <?php if($this->path == "account/login") { echo  "active"; }?>" aria-current="page" href="/account/login">Sing in</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if($this->path == "account/register") { echo  "active"; }?>" href="/account/register">Register</a>
                    </li>
                    <?php elseif(isset($_SESSION['authorize']['name'])): ?>
                        <li class="nav-item">
                        <a class="nav-link <?php if($this->path == "page/about") { echo  "active"; }?>" href="/page/about">Main</a>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

</header>


<body>

<?php echo $content;?>

</body>


</html>
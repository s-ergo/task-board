<!DOCTYPE html>
<html lang="ru-RU" prefix="og: http://ogp.me/ns#">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="keywords" content="Tasks">
    <meta name="description" content="Tasks">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <title>Tasks</title>
</head>

<body>
    <header>
    </header>

    <main class="d-flex vh-100 mx-auto my-5">
        <div class="container">

            <?= (isset($_SESSION['notice'])) ? $_SESSION['notice'] : '' ?>           
            <?= $content ?>
 
        </div>
    </main>

    <footer>
    </footer>

    <script src="\js\app.js"></script>

</body>

</html>
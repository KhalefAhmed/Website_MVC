<!doctype html>
<head>
    <title>Contact</title>
    <?php include_once 'views/includes/head.php'?>
</head>
<div class="container">
    <?php include_once 'views/includes/header.php'?>
<main role="main" class="container">

    <h1>Contact</h1>
    <form action="" method="post">
        <div class="form-group">
            <label for="exampleFormControlInput1">Email</label>
            <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect2">Prénom</label>
            <input type="text" name="firstname" class="form-control" id="exampleFormControlSelect2" placeholder="John">

        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Message</label>
            <textarea class="form-control" name="message" id="exampleFormControlTextarea1" rows="8"></textarea>
        </div>
    <button type="submit" class="btn btn-primary mb-2" name="btnContact">Envoyer Mon Message</button>
    </form>
</main><!-- /.container -->
</div>
<div>
<?php include_once 'views/includes/footer.php'?>
</div>
</body>
</html>

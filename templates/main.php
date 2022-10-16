<!doctype html>
<html lang="en">
<head>

    <title>Accored</title>

    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php echo $data['css']; ?>

</head>
<body>
	<div class="app" id="app">
        <div class="container">
            <div class="app__inner">
                <div class="app__name">Accored</div>
                <?php echo $data['content']; ?>
            </div>
        </div>
    </div>
<?php echo $data['js']; ?>
</body>
</html>

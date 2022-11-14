<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../css/main.css">
    <link rel="stylesheet" href="../../css/forms.css">
<body>

<div class="topnav">
    <a href="/">Home</a>
    <a class="active" href="/movies">Movies</a>
</div>

<div style="padding-left:16px">
    <h2>Update Movie</h2>
</div>

<div class="container">
    <form action="/movies/update/<?php echo $movie['id'] ?>" method="POST">
        <div class="row">
            <div class="col-25">
                <label for="id">Title</label>
            </div>
            <div class="col-75">
                <input type="text" id="title" required name="title" placeholder="Title.." value="<?php echo $movie['title'] ?>">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="description">Description</label>
            </div>
            <div class="col-75">
                <textarea id="description" name="description" placeholder="Description.." style="height:200px"><?php echo $movie['description'] ?></textarea>
            </div>
        </div>
        <br>
        <div class="row">
            <input type="submit" value="Submit">
        </div>
    </form>
</div>
<div class="footer">
    <p>© Elison Kaloshi</p>
</div>

</body>
</html>

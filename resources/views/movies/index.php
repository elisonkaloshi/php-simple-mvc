<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>

<div class="topnav">
    <a href="/">Home</a>
    <a class="active" href="/movies">Movies</a>
</div>

<div style="padding-left:16px">
    <h2>Movies list</h2>
</div>

<div class="container-table">
    <a class='action-button-create' href='/movies/create'>Create +</a>
    <br>
    <br>
    <table>
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($movies as $movie)
            echo "<tr>
                <td>" . $movie['id'] . "</td>
                  <td>" . $movie['title'] . "</td>
                 <td>" . $movie['description'] . "</td>
                 <td> <a class='action-button-edit' href='/movies/edit/". $movie['id'] . "' >Edit</a>
                  <a class='action-button-delete' href='/movies/destroy/". $movie['id'] . "' >Delete</a>
                  </td>
            </tr>";
        ?>

    </table>
</div>


<div class="footer">
    <p>© Elison Kaloshi</p>
</div>

</body>
</html>

<!DOCTYPE html>
<html lang="de" xmlns="http://www.w3.org/1999/html">
<head>
    <title>Reise eines AirBnB Hosts :: Blog über Gäste hosten & finanzielle Freiheit</title>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script>
    <script type="text/javascript">
        //<![CDATA[
        bkLib.onDomLoaded(function () {
            new nicEditor({fullPanel: true}).panelInstance('blogpostarea');
        });
        //]]>
    </script>
</head>
<body>
<div id="editor">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="title">Überschrift des Eintrags: </label><input id="title" type="text" size="150" name="title"
                                                                    required><br>
        <label for="blogpostarea">Trage deinen Blogtext ein:</label>
        <textarea cols="200" rows="45" id="blogpostarea" name="body" required></textarea>
        <input type="text" name="username" value="Valerian" required>
        <input type="button" name="postToBlog" value="Post it to Blog!">
    </form>
</div>
<?php
if (!empty($_POST)) {
    if (isset($_POST['title']) && isset($_POST['body']) && isset($_POST['username'])) {
        mysqli_connect();
        mysqli_close();
    }
}
//post to self and save to db
?>
</body>
</html>

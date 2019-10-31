<html>
<body>

<h1>Show all websites</h1>
<form action="read.php" method="GET">
  <input type="submit" value="All Websites">
</form>

<h1>Show single website</h1>
<form action="read_single.php" method="GET">
  ID: <input type="number" name="id"><br>
  <input type="submit" value="Show Website">
</form>

<h1>Edit an website</h1>
<form action="update.php" method="PUT">
  ID: <input type="number" name="id"><br>
  Title: <input type="text" name="title"><br>
  Url: <input type="text" name="url"><br>
  Description: <input type="text" name="description"><br>
  <input type="submit" value="Send">
</form>

<h1>Delete an website</h1>
<form action="delete.php" method="DELETE">
  ID: <input type="number" name="id"><br>
<input type="submit" value="Send">
</form>

<h1>Add an website</h1>
<form action="create.php" method="POST">
  Title: <input type="text" name="title"><br>
  Url: <input type="text" name="url"><br>
  Description: <input type="text" name="description"><br>
  <input type="submit" value="Send">
</form>

</body>
</html>

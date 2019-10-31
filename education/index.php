<html>
<body>

<h1>Show all educations</h1>
<form action="read.php" method="GET">
  <input type="submit" value="All Educations">
</form>

<h1>Show single education</h1>
<form action="read_single.php" method="GET">
  ID: <input type="number" name="id"><br>
  <input type="submit" value="Show Education">
</form>

<h1>Edit an education</h1>
<form action="update.php" method="PUT">
  ID: <input type="number" name="id"><br>
  School: <input type="text" name="school"><br>
  Course: <input type="text" name="course"><br>
  Start date: <input type="text" name="start_date"><br>
  End date: <input type="text" name="end_date"><br>
  <input type="submit" value="Send">
</form>

<h1>Delete an education</h1>
<form action="delete.php" method="DELETE">
  ID: <input type="number" name="id"><br>
<input type="submit" value="Send">
</form>

<h1>Add an education</h1>
<form action="create.php" method="PUT">
  School: <input type="text" name="school"><br>
  Course: <input type="text" name="course"><br>
  Start date: <input type="text" name="start_date"><br>
  End date: <input type="text" name="end_date"><br>
  <input type="submit" value="Send">
</form>

</body>
</html>

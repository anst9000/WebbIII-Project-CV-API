<html>
<body>

<h1>Show all jobs</h1>
<form action="read.php" method="GET">
  <input type="submit" value="All Jobs">
</form>

<h1>Show single job</h1>
<form action="read_single.php" method="GET">
  ID: <input type="number" name="id"><br>
  <input type="submit" value="Show Job">
</form>

<h1>Edit a job</h1>
<form action="update.php" method="PUT">
  ID: <input type="number" name="id"><br>
  Company: <input type="text" name="company"><br>
  Title: <input type="text" name="title"><br>
  Start date: <input type="text" name="start_date"><br>
  End date: <input type="text" name="end_date"><br>
  <input type="submit" value="Send">
</form>

<h1>Delete a job</h1>
<form action="delete.php" method="DELETE">
  ID: <input type="number" name="id"><br>
<input type="submit" value="Send">
</form>

<h1>Add a job</h1>
<form action="create.php" method="POST">
  Company: <input type="text" name="company"><br>
  Title: <input type="text" name="title"><br>
  Start date: <input type="text" name="start_date"><br>
  End date: <input type="text" name="end_date"><br>
  <input type="submit" value="Send">
</form>

</body>
</html>

<html>

<body>
  <h4>Receive form data and process it</h4>

  <form action="formProcess.php" method="post">
    <br>
    <br>
    Username <input name="username" type="text" required />
    Password <input name="password" type="text" required />
    Name <input name="name" type="text" /><br>
    Query 1 to run?<input type="checkbox" id="query1" name="query1" value="TRUE">
    <label for="query1"></label><br>
    Query 2 to run?<input type="checkbox" id="query2" name="query2" value="TRUE">
    <label for="query2"></label><br>
    <input type="submit" />
  </form>
</body>

</html>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form class="" action="{{url('/staf/add')}}" method="post">
      @csrf
      Nama : <input type="text" name="name" value="">
      <br>
      Username : <input type="text" name="email" value="">
      <br>
      password : <input type="text" name="password" value="">
      <br>
      Level : <input type="text" name="level" value="">
      <br>
      <input type="submit" name="submit" value="Tambah">
      <br>
    </form>
  </body>
</html>

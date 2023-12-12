<!DOCTYPE html>
<html lang="en">
<head>
  <title>trashed cars</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>trashed</h2>
  <p>The .table-hover class enables a hover state on table rows:</p>            
  <table class="table table-hover">
    <thead>
      <tr>
        <th>image</th>
        <th>title</th>
        <th>from</th>
        <th>to</th>
        <th>description</th> 
        <th>Restore</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
     @foreach($places as $place)
      <tr>
        <td>{{ $place->image }}</td>
        <td>{{ $place->exploreTitle }}</td>      
        <td>{{ $place->from }}</td>      
        <td>{{ $place->to }}</td>      
        <td>{{ $place->description }}</td>      


        <td><a href="restorePlace/{{ $place->id }}" >Restore</a></td>
        <td><a href="placeDeleted/{{ $place->id }}" >Delete</a></td>

       </tr>
       @endforeach
      <!-- <tr>
        <td>Mary</td>
        <td>Moe</td>
        <td>mary@example.com</td>
      </tr>
      <tr>
        <td>July</td>
        <td>Dooley</td>
        <td>july@example.com</td>
      </tr> -->
    </tbody>
  </table>
</div>

</body>
</html>

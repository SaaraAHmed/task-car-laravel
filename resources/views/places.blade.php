<!DOCTYPE html>
<html lang="en">
<head>
  <title>cars</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>list</h2>
  <p>The .table-hover class enables a hover state on table rows:</p>            
  <table class="table table-hover">
    <thead>
      <tr>
        <th>image</th>
        <th>title</th>
        <th>from</th>
        <th>to</th>
        <th>description</th> 
        <th>Edit</th> 
        <th>show</th>
        <th>delete</th>
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

         
        
        <td><a href="editImage/{{ $place->id }}" >edit Image</a></td>
        <td><a href="editplace/{{ $place->id }}" >Edit</a></td> 
        <td><a href="placeDetail/{{ $place->id }}" >show</a></td>
        <td><a href="deletePlace/{{ $place->id }}" >delete</a></td>
        
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

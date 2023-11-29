<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>update Car</h2>
  <form action="{{route('updateCar',$car->id)}}"  method="POST" >
     @csrf
     @method('put') 
     <label for="title">Title:</label>
      <input type="text" class="form-control" id="carTitle" placeholder="Enter title" name="title" value="{{$car->carTitle}}">
    </div>
    
    <div class="form-group">
        <label for="description">Description:</label>
        <textarea class="form-control" rows="5" id="description" name="description"  >{{$car->description}}</textarea>
      </div> 
    <div class="checkbox">
      <label><input type="checkbox" name="published" @checked($car->published)> Published </label>
    </div>
    
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>

</body>
</html>

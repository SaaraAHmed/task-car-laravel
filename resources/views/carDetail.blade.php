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
  <h2>Car html</h2>
  car Title : "{{$car->carTitle}}" <br>
  car Description : "{{$car->description}}" <br>
  car Published : "{{$car->Published}}" <br>
  <form action="{{ route('storeCar')}}" method="POST">
      @csrf
    <div class="form-group">
      <label for="title"></label>
      <input type="text" class="form-control" id="carTitle" placeholder="Enter title" name="title" >
    </div>
    
    <div class="form-group">
        <label for="description"></label>
        <textarea class="form-control" rows="5" id="description" name="description"></textarea>
      </div> 
    <div class="checkbox">
      <label><input type="checkbox" name="published"> </label>
    </div>
    <button type="submit" class="btn btn-default">Add</button>
  </form>
</div>

</body>
</html>


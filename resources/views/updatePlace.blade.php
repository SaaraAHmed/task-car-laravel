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
  <h2>Add Explore </h2>
  <form class="form-horizontal" action="{{route('updatePlace',$place->id)}}" method="POST" enctype="multipart/form-data" >
  @csrf
     @method('put') 
        <div class="form-group">
            <label for="image">Image:</label>
            <input type="file" class="form-control" id="image" name="image" value="{{ old('image') }}">
            @error('image')
                {{ $message }}
            @enderror
            </div>
     <label for="title">Title:</label>
      <input type="text" class="form-control" id="exploreTitle" placeholder="Enter title" name="exploreTitle" value="{{ old('exploreTitle') }}">
    </div>
    <div class="form-group">
      <label for="pwd">from:</label>
      <input type="number" class="form-control" id="pwd" placeholder="Enter password" name="from" value="{{ old('from') }}">
    </div>
    <div class="form-group">
      <label for="pwd">to:</label>
      <input type="number" class="form-control" id="pwd" placeholder="Enter password" name="to" value="{{ old('to') }}" >
    </div>
    <div class="form-group">
        <label for="text">text</label>
        <textarea class="form-control" rows="5" id="text" name="description"  >{{old('description')}}</textarea>
      </div> 
      <select name="category_id" id="">description
              <option value="">select caregory</option>
              
              @foreach ($categories as $category)
              <option value="{{  $category->id  }}">{{ $category->categoryName }}</option>
              @endforeach

        </select> 

    <button type="submit" class="btn btn-default">submit</button>

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add Explore</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
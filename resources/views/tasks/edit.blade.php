<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">


	<title>Todo List App</title>
</head>
<body>
	<div class="container">
     
		<div class="row">
				<h1>My To Do List</h1>
			</div>


       @if (Session::has('success'))
      <div class="alert alert-success">
        <strong>Success:</strong> {{ Session::get('success') }}
      </div>
    @endif


@if (count($errors) > 0)
      <div class="alert alert-danger">
        <strong>Error:</strong>
        <ul>
          @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
@endif

<div class="row">
  <form action="{{ route('tasks.update', [$taskUnderEdit->task]) }}" method='POST'>
  <input type="hidden" name='_method' value='PUT'>

    <div class="form-group">
    <input type="text" name='updatedTask' class='form-control input-lg' value='{{ $taskUnderEdit->name }}'>
  </div>

  <div class="form-group">
    <input type="submit" value='Save Changes' class='btn btn-success btn-lg'>
    <a href="" class='btn btn-success btn-lg pull-right'>Back</a>
    </div>
  </form>
</div>

</div>
</body>
</html>
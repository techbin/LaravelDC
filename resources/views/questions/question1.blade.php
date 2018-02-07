<html>
<head>
  <title>Aligent::Questions</title>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"
        rel="stylesheet">


<link rel="stylesheet" type="text/css" href="{{ URL::asset('datetime/jquery.datetimepicker.min.css') }}"/ >
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="{{ URL::asset('datetime/jquery.datetimepicker.full.min.js') }}"></script>
     
</head>
<body>
  <div class="container">
    <h1>Competition Form</h1><p align="right"><a href="{{ url('/') }}/questions">Back to Questions</a></p>
    <hr>
    





{!! Form::open(['route' => 'questions.answer1']) !!}

<div class="form-group">
    {!! Form::label('date1', 'Select start date') !!}
    {!! Form::text('date1', null, ['id' => 'datepicker1', 'class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('date2', 'Select end date') !!}
    {!! Form::text('date2', null, ['id' => 'datepicker2','class' => 'form-control']) !!}
</div>
<hr>
<div class="form-group">
    {!! Form::label('thirdparamlabel', 'Enter the third parameter') !!}
    {!! Form::text('thirdparam', null, ['id' => 'thirdparam','class' => 'form-control']) !!}<p>For Point 4: Type any character to see detailed result as mentioned in Point 4.</p>
</div>
<hr>
<div class="form-group">
    {!! Form::label('date2', 'Select a timezone') !!}
   <select name="timezone" id="timezone" class="form-control">
    <option value="" selected="selected">Select Timezone</option>
    @foreach (timezone_identifiers_list() as $timezone)
        <option value="{{ $timezone }}"{{ $timezone == old('timezone') ? ' selected' : '' }}>{{ $timezone }}</option>
    @endforeach

</select>
<p>For point 5: Select a timezone to compare the results of points 1, 2 , 3 and 4 for the default and selected timezone</p>
</div>


{!! Form::submit('Submit', ['class' => 'btn btn-info']) !!}

{!! Form::close() !!}





  </div>




  <script>
  jQuery(function() {
    jQuery( "#datepicker1" ).datetimepicker();
    jQuery( "#datepicker2" ).datetimepicker();
  });
  </script>
</body>
</html>
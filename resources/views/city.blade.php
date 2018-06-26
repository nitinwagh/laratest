<!DOCTYPE html>
<html lang="en">
<head>
  <title>Laravel Test</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
  
<div class="container">
    <div class="row" style="padding-bottom: 15px;">
        <p>
            <h3>City</h3>
            <button type="button" class="btn btn-info pull-right" data-toggle="modal" data-target="#myModal">Add City</button>
        </p>        
    </div>
    <div class="row">
        <div class="table-responsive">          
            <table class="table table-striped table-bordered table-hover table-condensed">
              <thead>
                <tr>
                  <th>City Name</th>
                  <th>State</th>
                  <th>Active</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
                  @if(count($cities) > 0)
                  @foreach($cities as $city)
                  <tr>
                    <td>{{ $city->name }}</td>
                    <td>{{ $city->state->name }}</td>
                    <td>{{ $city->active ? 'Active': 'De-active' }}</td>
                    <td><a href="{{ route('edit.city', $city->id) }}" class="edit">Edit</a></td>
                    <td><a href="{{ route('delete.city', $city->id) }}" class="delete">Delete</a></td>
                  </tr>
                  @endforeach
                  @endif                
              </tbody>
            </table>
          </div>
    </div>
  
  <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">New City</h4>
      </div>
      <div class="modal-body">
          <form id="addCityForm" action="{{ route('add.city') }}" method="post">
              {{ csrf_field() }}
            <div class="form-group">
              <label for="state">State:</label>
              <select class="form-control" name="state" id="state">
                  <option value="">--Select State--</option>
                  @foreach($states as $key => $value)
                  <option value="{{ $key }}">{{ $value }}</option>
                  @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="city">City:</label>
              <input type="text" class="form-control" name="city" id="city">
            </div>                     
          </form>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-default" id="addCity">Save</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
  
</div>

<script>
$(document).ready(function(){
    
    $('#addCity').click(function(){
        var form = $('#addCityForm');
        var stateId = $("#state").val();
        var city = $("#city").val();
        
        if(stateId == 0){
            alert('Please select state');
        } else if(city == ''){
            alert('Please enter city');
        } else{
            $.ajax({
                url: form.attr('action'),
                data: form.serialize(),
                method: form.attr('method'),
                success:function(res){                    
                    alert(res.message);
                    if(res.status){
                        window.location.reload();
                    }
                }
            });
        }
    });
    
    $('.delete').click(function(e){
        var self = this;
        var isDelete = confirm('Are you sure! To Delete');
        if(isDelete == false){
            e.preventDefault();            
        }
    });
});
</script>
</body>
</html>



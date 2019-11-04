
<!DOCTYPE html>
<html>
 <head>
  <title>Import Excel File in Laravel</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" >

 </head>
 <body>
  <br />
  
  <div class="container">
   <h3 align="center">Import Excel File in Laravel</h3>
    <br />
   @if(count($errors) > 0)
    <div class="alert alert-danger">
     Upload Validation Error<br><br>
     <ul>
      @foreach($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
     </ul>
    </div>
   @endif

   @if($message = Session::get('success'))
   <div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
           <strong>{{ $message }}</strong>
   </div>
   @endif
   <form method="post" enctype="multipart/form-data" action="{{ url('/import_excel/import') }}">
    {{ csrf_field() }}
    <div class="form-group">
     <table class="table">
      <tr>
       <td width="40%" align="right"><label>Select File for Upload</label></td>
       <td width="30">
        <input type="file" name="select_file" />
       </td>
       <td width="30%" align="left">
        <input type="submit" name="upload" class="btn btn-primary" value="Upload">
       </td>
      </tr>
      <tr>
       <td width="40%" align="right"></td>
       <td width="30"><span class="text-muted">.xls, .xslx</span></td>
       <td width="30%" align="left"></td>
      </tr>
     </table>
    </div>  

   </form>

    <div class="panel panel-primary">

              <div class="panel-heading"></div>

        <div class="panel-body"> 

                <div class="row">

                                <div class="col-xs-12 col-sm-12 col-md-12">

                                        <a href="{{ route('export.file',['type'=>'xls']) }}">Download Excel xls</a> |

                                        <a href="{{ route('export.file',['type'=>'xlsx']) }}">Download Excel xlsx</a> |

                                        <a href="{{ route('export.file',['type'=>'csv']) }}">Download CSV</a>

                                </div>

                </div>     

       
        </div>

    </div>
   
   <br />
   <div class="panel panel-default">
    <div class="panel-heading">
     <h3 class="panel-title">Customer Data</h3>
    </div>
    <div class="panel-body">
     <div class="table-responsive">
      <table class="table table-bordered table-striped">
       <tr>
        <th>Customer Name</th>
        <th>Gender</th>
        <th>Address</th>
        <th>City</th>
        <th>Postal Code</th>
        <th>Country</th>
       </tr>
       @foreach($data as $row)
       <tr>
        <td>{{ $row->customer_name }}</td>
        <td>{{ $row->gender }}</td>
        <td>{{ $row->addresse }}</td>
        <td>{{ $row->city }}</td>
        <td>{{ $row->postal_code }}</td>
        <td>{{ $row->country }}</td>
       </tr>
       @endforeach
      </table>
     </div>
    </div>
   </div>
  </div>
 </body>
</html>

@extends('admin.pages.layout')


@section('style')
    
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('/css/admin/dataTables.bootstrap.min.css')}}">
  
@endsection

@section('content')
    <section class="content-header">
        <h1>
            Liste des marques
            <small>auto moto</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Liste Marque</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-6">
                <div class="box">
                    <div class="box-header">
                    <h3 class="box-title">Marques Auto</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                    <table id="marqueAutoData" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Alias</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($marques_auto as $marque)
                                <tr>
                                    <td>{{$marque->title}}</td>
                                    <td>{{$marque->alias}}</td>
                                    <td>-</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Nom</th>
                                <th>Alias</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                    </div>
                    <!-- /.box-body -->
                </div>                            
            </div>
            <div class="col-xs-6">
                <div class="box">
                    <div class="box-header">
                    <h3 class="box-title">Marques Moto</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                    <table id="marqueMotoData" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Alias</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($marques_moto as $marque)
                                <tr>
                                    <td>{{$marque->title}}</td>
                                    <td>{{$marque->alias}}</td>
                                    <td>-</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Nom</th>
                                <th>Alias</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                    </div>
                    <!-- /.box-body -->
                </div>                            
            </div>
        </div>
    </section>
@endsection

@section('script')
    <!-- DataTables -->
    <script src="{{ asset('js/admin/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('js/admin/dataTables.bootstrap.min.js')}}"></script>
    <!-- SlimScroll -->
    <script src="{{ asset('js/admin/jquery.slimscroll.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{ asset('js/admin/fastclick.js')}}"></script>


    <script>
        $(function () {
            $('#marqueAutoData').DataTable()
            $('#marqueMotoData').DataTable()
        })
    </script>
@endsection
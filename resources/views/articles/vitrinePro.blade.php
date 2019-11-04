@extends('site')

@section('title')
Sn-TopAuto.com - Autothèque information
@endsection

@section('css')

@endsection

@section('content')
<!-- control panel -->
    @include('assets.controlPanel')
<ol class = "breadcrumb">
    <li><a href = "{{ url('/')}}">Accueil</a></li>
    <li><a href = "{{ url('/autotheque/info/'.$articles->rubrique)}}">{{$articles->nom_rubrique}}</a></li>
    <li class="active">{{ (substr($articles->nom_article,0,80))."..."}}</li>
</ol>
<div style="padding-bottom:10px;">
    <div class="panel panel-danger">
        <div class="panel-heading" style="background:#900;color:#fff;">
            <strong> {{$articles->nom_article}}</strong>
        </div>
        <!-- Go to www.addthis.com/dashboard to customize your tools -->
        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5a073cb0f32954b5"></script>
        <div class="panel-body">
            <?php  echo $articles->contenue."</div>"; ?>
        </div>
    </div>
</div>
@endsection
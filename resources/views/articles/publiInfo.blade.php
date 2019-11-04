@extends('site')

@section('title')
Sn-TopAuto.com - Publi-Info
@endsection

@section('css')

@endsection

@section('content')

    @include('assets.controlPanel')
    <ol class = "breadcrumb">
        <li><a href = "{{ url('/')}}">Accueil</a></li>
        <li><a href = "{{ url('publiInfo')}}">Publi-Info</a></li>
    </ol>
    <div style="padding-bottom:10px;">
        <div class="panel panel-danger">
            <div class="panel-heading" style="background:#900;color:#fff;">
                <strong>Publi-Info</strong>
            </div>
            <!-- Go to www.addthis.com/dashboard to customize your tools -->
            <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5a073cb0f32954b5"></script>
            <div class="panel-body">
                <div >
                    <video width="800" height="400" controls autoplay>
                        <source src="videos/Istanbul_Turkey.m4v" type="video/mp4" />
                        <source src="videos/Istanbul_Turkey.webm" type="video/webm" />
                        <source src="videos/Istanbul_Turkey.m4v.ogv" type="video/ogg"  />
                    </video>
                </div>
                @if(count($articles) <= 0)
                    <div class="panel panel-danger">
                        <div class="panel-body text-muted">
                            <img src="{{ asset('/images/error_icon.png')}}"> 
                            <span class="aac"> Aucune Publi Info </span> 
                        </div>  
                    </div>
                @else
                    @foreach ($articles as $key => $value) 
                        <div class="row" style="margin:5px">
                            <h5 class="text- text-muted">
                                <strong> {{$value->nom_article}}</strong> 
                            </h5>
                            <div class="col-sm-4">
                                <img src="{{ asset('images/actu/'.$value->photo_actu)}}" class="img-thumbnail img-responsive" > 
                            </div>
                            <div class="col-sm-8"> {{$value->text_intro}}</div>
                            <a href="{{ url($value->titre)}}" class='pull-right'>
                                <button class="btn btn-xs btn-danger">Lire l'article</button>
                            </a>
                        </div>
                        <hr style="margin:4px;background-color:#900;">	
                    @endforeach
                @endif
            </div>
        </div>
    </div>

@endsection
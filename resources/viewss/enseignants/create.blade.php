@extends('templates.master')

@section('content')


    <h2>Ajouter un Enseignant</h2>
    <hr/>
    <a class="btn btn-primary" href="/enseignants" style="margin-bottom: 15px;">Revenir à la liste</a>
    
    
     
    
    <form method="post" action="{{route('enseignants.store')}}" enctype="multipart/form-data" style="width:350px; text-align:center; margin-left:430px;">

  {{csrf_field()}}
   <div class="form-group" >
        {!! Form::label('prenom', 'Prenom'); !!}  
        {!! Form::text('prenom', null, ['class' => 'form-control']); !!}
    </div>
    <div class="form-group">
        {!! Form::label('nom', 'Nom'); !!}
        {!! Form::text('nom', null, ['class' => 'form-control']); !!}
    </div>
    <div class="form-group">
        {!! Form::label('age', 'Age'); !!}
        {!! Form::text('age', null, ['class' => 'form-control']); !!}
    </div>
    <div class="form-group">
        {!! Form::label('mobile', 'Telephone'); !!}
        {!! Form::text('mobile', null, [ 'class' => 'form-control']); !!}
    </div>

    <div class="form-group">
        {!! Form::label('email', 'Email') !!}
        {!! Form::email('email', null, ['class' => 'form-control']); !!}
    </div>
      
    <div class="form-group">
        {!! Form::label('region', 'Région'); !!}
       
    <select class="form-control m-bot15" name="region">
        
      <option >Dakar</option> 
      <option >Thies</option>  
      <option >Louga</option> 
      <option >Saint-louis</option>  
      <option >Fatick</option>
      <option >Kaolack</option>
      <option >Ziguinchor</option>
     </select>
</div>
<div class="form-group">
        {!! Form::label('ville', 'Ville') !!}
        <select class="form-control m-bot15" name="ville">
        
        <option id="dakar">Dakar</option>
        <option id="thies">Thies</option>  
        <option id="louga">Louga</option> 
        <option id="saint-l">Saint-louis</option>  
        <option id="fatick">Fatick</option>
        <option id="kaolack">Kaolack</option>
        <option id="zig">Ziguinchor</option>
       </select>   
       <p id="dak">Guediawaye, Pikine, Parcelle, Rufisque, Dakar</p>
       <p id="thie">keur cheikh, angle laobé, mbour</p>
       <p id="loug">louga, niambour, keur mor</p>
       <p id="saint">ndar, rue 18, keur ndiaye</p>
       <p id="fatik">sine, koumpentoum, bourou</p>
       <p id="kaol">saloum, ndiobene, galobe</p>
       <p id="zi">casamance, sediou, wilingara</p>
</div>

   <div class="form-group">
        {!! Form::label('renseigner votre derniere diplome', 'Renseigner votre derniere Diplôme'); !!}
       
    <select class="form-control m-bot15" name="deniere_diplome">
        
      <option>CAEM</option> 
      <option>CAES</option>  
      <option>Doctorat</option> 
     
     </select>
</div>
<div class="form-group" >
        {!! Form::label('combien d année d expérience', 'Combien d année d expérience'); !!}
       
        {!! Form::text('année_exper', null, ['class' => 'form-control']); !!}

</div>

<div class="form-group" >
        {!! Form::label('Avez-vous une expérience en fos, fle, français professionel: oui ou non', 'Avez-vous une expérience en FOS, FLE, Français professionel: Oui ou Non'); !!}
       <div style="display:flex; margin-left:120px;">
     <p> Oui:<input type="radio" style="width:25px" id="ocp" name="experience" class="myfrm form-control" value="Oui"></p>
      <p style="margin-left:20px;"> Non:<input type="radio"  style="width:25px" ocp="opc" name="experience" class="myfrm form-control" Value="Non"></p>
       </div>
</div>

    <div class="form-group" >
{!! Form::label('numéro de la carte d identité national', 'Numéro de la carte d identité national'); !!}

<input type="number" name="num_cni" class="myfrm form-control"><br>


</div>

<div class="form-group">
{!! Form::label('votre cv en pdf', 'Votre CV en PDF'); !!}
        <input type="file" name="cv_file" class="myfrm form-control">
    </div>



    

   
   <button type="submit" class="btn btn-success" style="margin-top:10px">S'inscrire</button>
    </form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

    <script>


  $(".btn-success").click(function(){ 

      var lsthmtl = $(".clone").html();

      $(".increment").after(lsthmtl);  

  });

  $("body").on("click",".btn-danger",function(){ 

     
      $('#removed').remove();

  });


</script>

<script>
    $('#dak').hide();
    $('#thie').hide();
    $('#loug').hide();
    $('#saint').hide();
    $('#fatik').hide();
    $('#kaol').hide();
    $('#zi').hide();

$('#dakar').click(function(){
        $('#dak').show();
        $('#thie').hide();
        $('#loug').hide();
        $('#saint').hide();
        $('#fatik').hide();
        $('#kaol').hide();
        $('#zi').hide();
        });
$('#thies').click(function(){
        $('#dak').hide();
        $('#thie').show();
        $('#loug').hide();
        $('#saint').hide();
        $('#fatik').hide();
        $('#kaol').hide();
        $('#zi').hide();
});
$('#louga').click(function(){
        $('#dak').hide();
        $('#thie').hide();
        $('#loug').show();
        $('#saint').hide();
        $('#fatik').hide();
        $('#kaol').hide();
        $('#zi').hide();
});
$('#saint-l').click(function(){
        $('#dak').hide();
        $('#thie').hide();
        $('#loug').hide();
        $('#saint').show();
        $('#fatik').hide();
        $('#kaol').hide();
        $('#zi').hide();
});
$('#fatick').click(function(){
        $('#dak').hide();
        $('#thie').hide();
        $('#loug').hide();
        $('#saint').hide();
        $('#fatik').show();
        $('#kaol').hide();
        $('#zi').hide();
});
$('#kaolack').click(function(){
        $('#dak').hide();
        $('#thie').hide();
        $('#loug').hide();
        $('#saint').hide();
        $('#fatik').hide();
        $('#kaol').show();
        $('#zi').hide();
});
$('#zig').click(function(){
        $('#dak').hide();
        $('#thie').hide();
        $('#loug').hide();
        $('#saint').hide();
        $('#fatik').hide();
        $('#kaol').hide();
        $('#zi').show();
});

</script>
@endsection()
	
	
	

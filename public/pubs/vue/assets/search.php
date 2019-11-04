<style type="text/css">
  .input-group{
    padding:0px;
  }
</style>
<div class="row" style="margin-right:13px;">
    <form class="form-inline pull-right" action="<?php echo $address;?>recherche/" method="post">
          <div class="form-group" align="right">
            <div class="input-group">
               <input type="text" name="rqt" id="rqt" size="30" class="form-control" data-provide="typeahead" id="recherche" placeholder="Recherche par modele-marque" autocomplete="off" >
             <span class="input-group-btn">
            <button type="submit" name="recherche" id="recherche" class="btn form-control btn-danger"><span class="glyphicon glyphicon-search"><span/></button></span>
            </div>
         </div> 
       </form>
</div> 
<script type="text/javascript" src="<?php echo $address;?>js/typeahead.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
   
     $('#rqt').typeahead({
       ajax:{
         url:'<?php echo $address;?>classes/get_marque.php',
         loadingClass: "loading-circle",
         triggerLength: 1 

           }

     });
         
  });
</script>
   
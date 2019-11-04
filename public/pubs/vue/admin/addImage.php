           <form id="upload" enctype="multipart/form-data">
              <div class="form-group">
                  <div class="row">
                  <div class="col-sm-4">
                  <input type="file" name ="photo"  class="form-control" required=""></input>
                  </div>
                  <div class="col-sm-4"> 
                  <input type="text" name ="nom_photo"  class="form-control" placeholder="nom de la photo" required=""></input>
                  </div>
                  <div class="col-sm-3"> 
                  <button  type="button ajouterPhoto" class="btn btn-sm btn-danger" >Ajouter une image</button>
                  </div>
                 </div>
               </div>
            </form>
            <div class="panel panel-danger" id="photos" style="height:150px;padding:5px;white-space:nowrap;overflow-x:scroll;background-color:#555; "><p class='text-primary text-center'> <br><br>
            Cliquez sur le bouton (Afficher les photos de la galerie) pour charger les images. </div>
               <center>
                 <button type="button" class="btn btn-danger btn-xs" id="charger">Afficher les photos de la galerie</button></center>
            </div>
         </div>
         <script type="text/javascript">
        $("#upload").submit(function(e){
          e.preventDefault();
           $.ajax({
              url: '../../vue/admin/uploadImage.php',
              type: "POST",             
              data: new FormData(this), 
              contentType: false,       
              cache: false,            
              processData:false,       
              }).done(function(data){
                alert(data);
              }).fail(function(){
                alert('impossible')
              });
        });
        $("#charger").click(function(){
           $.get("../../vue/admin/uploadImage.php" , { action:"getImages" 
         }).done(function(data ){
            $("#photos").html(data);
         }).fail(function(){
          alert("Impossible");
         })

        });
         </script>
$(document).ready(function(){
    
    $(".link1").click(function(e){
      
    var status = $(this).attr("id");

	$.ajax({
            method: "POST",
            url: "./ajax/ajax_statusDossiers.php",
            data: { status: status }
            })
            .done(function( res ) {
            if (res.status == "success"){
                var collection= res.collection;
   
				$( "#dospak div" ).remove();
                
                //loop over collection van dossiers
                for(var x=0 ; x<collection.length; x++){
                     
					var newLoad= `<div class="dossier">
            <img src="${collection[x].icon_url}" alt="icon" class="dossier_rubicon">
            <div class="dossier_info">
                <img src="images/dossier_klok.png" alt="icon">
                <div id="${collection[x].status_id}">${collection[x].status_name}</div>
            </div>
            <div class="dossier_info">
                <img src="images/dossier_pin.png" alt="icon">
                <div>${collection[x].name}</div>
            </div>
            <div class="dossier_info">
                <img src="images/dossier_locatie.png" alt="icon">
                <div>${collection[x].streetname+' '+ collection[x].house_nr}</div>
            </div>
            <div class="dossier_info">
                <img src="images/dossier_kalender.png" alt="icon">
                <div>${(collection[x].date + "").slice(8,-9)+"/"+(collection[x].date + "").slice(5,-12)+"/"+(collection[x].date + "").slice(0,-15)}</div>
            </div>				
        </div>`
                    
			$("#dospak").prepend(newLoad);
			$("#dospak div").first().slideDown();
                   
				}
			
				
               }
              
         });   
    
    e.preventDefault();
	});
});
    
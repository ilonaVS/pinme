function filePreview(input){
    
    if(input.files && input.files[0]){
        var reader = new FileReader();
        reader.onload = function (e){

            if($('#no_image').length){
            $('#no_image').remove();
            $('#first_input').before('<img src="'+e.target.result+'" class="preview"/>');
            console.log("foto");
            
            $('.center').removeClass('center').addClass('hidden');
            $('#first_input').removeClass('visible').addClass('hidden');
            $('#zonder_foto').removeClass('visible').addClass('hidden');
            $('#foto_toevoegen').removeClass('hidden').addClass('visible');
            console.log("button geklikt");
            
            }
            else if($('.preview').length){
                $('.preview').attr('src',e.target.result);
                
            }
  
        }
        reader.readAsDataURL(input.files[0]);
    }
}
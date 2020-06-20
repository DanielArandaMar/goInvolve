$(document).ready(function(){
   
    const btnImage = $('#btnImage');
    const box = $('#imagePost');
    
    btnImage.click(() => {
       box.fadeToggle();
    });
    
});


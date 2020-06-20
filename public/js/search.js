$(document).ready(function(){
    
   var btnSearch = $('#btnSearch');
   var searchInput = $('#searchTextarea').val();
   
   const form = $('#formSearch');
   const box = $('#searchSection');
   const url = 'http://go-involve.com.devel/';
   
   
   /** ENVOCAR LAS FUNCIONES  */
    search();
    showBoxSearch();
    
    
   
    
    /** DEFINICIÓN DEL LAS FUNCIONES */
   
    function showBoxSearch() {
        btnSearch.unbind('click').click((e) => {
            e.preventDefault();
            box.slideToggle();
        });
    }
    
    function search(){
        form.submit(function(){
            $(this).attr('action', url + 'index/' + $('#searchTextarea').val());
            $(this).submit();
        });
    }
    
   
    


});



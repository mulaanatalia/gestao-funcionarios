var paginaClickHandler = function(e) {
    e.preventDefault();
    var pagina = $(this).data('page');
    list(pagina);
};
<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>PHP com AJAX</title>
        <link href="estilo.css" rel="stylesheet">
    </head>

    <body>
        <main>
            <div id="janela_formulario">
                <form id="pesquisarProdutos">

                    <label for="categorias">Categorias</label>
                    <select id="categorias">                       
                    </select>

                    <label for="produtos">Categorias</label>
                    <select id="produtos">                       
                    </select>
                </form>
            </div>
        </main>
        
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script>

            function retornarCategorias(data){
                var categorias ="";
                $.each(data, function(chave,valor){
                    categorias += '<option value="'+ valor.categoriaID +'">' + valor.nomecategoria + '</option>';

                });

                $('#categorias').html(categorias);
            }
            $('#categorias').change(function(e) {
               var categoriaID = $(this).val();

               $.ajax({
                    url: 'http://localhost/Aulas/Aulas-json-php/unidade_11/retornar_produtos.php',
                    type: 'GET',                    
                    data: 'categoriaID=' + categoriaID
                })
                .done(function(data) {
                    var produtos ="";
                   $.each(JSON.parse(data),function(chave,valor){
                    produtos +='<option value="'+ valor.produtoID +'">' + valor.nomeproduto + '</option>';
                   });
                   $('#produtos').html(produtos);
                })
                          
            });
        </script>
        <script src="http://localhost/aulas/Aulas-json-php/unidade_11/retornar_categorias.php?callback=retornarCategorias"></script>
    </body>
</html>
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
                   console.log(JSON.parse(data));
                })
                .fail(function() {
                    console.log("erro");
                })
                .always(function() {
                    console.log("complete");
                });
                
            });
        </script>
        <script src="http://localhost/aulas/Aulas-json-php/unidade_11/retornar_categorias.php?callback=retornarCategorias"></script>
    </body>
</html>
<h1>Listagem de Produtos</h1>
<p><a href="<?=url('/imoveis/novo')?>">Cadastrar novo imóvel</a></p>

<?php

//var_dump($properties);

if(!empty($properties)){

    echo "<table>
            <tr>
                <td>Título</td>
                <td>Preço de Aluguel</td>
                <td>Preço de Venda</td>
                <td>Ações</td>
            </tr>";

    foreach($properties as $property){

        $linkReadMore = url('imoveis/'.$property->id);
        $linkEditItem = url('imoveis/editar/'.$property->id);
        $linkRemoveItem = url('imoveis/remover/'.$property->id);

        //var_dump($property);
        echo "<tr>
                <td>{$property->title}</td>
                <td>R$ ".number_format($property->rental_price,2,',','.')."</td>
                <td>R$ ".number_format($property->sale_price,2,',','.')."</td>
                <td><a href='{$linkReadMore}'>Ver Mais</a> | <a href='{$linkEditItem}'>Editar</a> | <a href='{$linkRemoveItem}'>Remover</a> </td>
              </tr>";
    }

    echo "</table>";
}
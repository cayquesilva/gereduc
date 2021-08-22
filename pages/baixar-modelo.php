<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baixar Modelo de Importação</title>
</head>
<body>
    <?php 
    //cria arquivo que será salvo
        $arquivo = 'modelo_importacao.xls';
    //cria modelo da planilha
        //titulo da coluna
        $html = '';
        $html .= '<table border="1">';
        $html .= '<tr>';
        $html .= '<td><b>INEP</b></td>';
        $html .= '<td><b>nome_unidade</b></td>';
        $html .= '<td><b>nome_gestor</b></td>';
        $html .= '<td><b>contato_gestor</b></td>';
        $html .= '<td><b>endereco</b></td>';
        $html .= '<td><b>nucleo</b></td>';
        $html .= '<td><b>bairro</b></td>';
        $html .= '<td><b>qtdturmas</b></td>';
        $html .= '<td><b>qtdturmasadapt</b></td>';
        $html .= '<td><b>qtdturmasaee</b></td>';
        $html .= '<td><b>qtdestudantes</b></td>';
        $html .= '<td><b>qtdestudantesaee</b></td>';
        $html .= '<td><b>qtdprofmanha</b></td>';
        $html .= '<td><b>qtdproftarde</b></td>';
        $html .= '<td><b>qtdprofnoite</b></td>';
        $html .= '<td><b>qtdprofintegral</b></td>';
        $html .= '<td><b>qtdprofaee</b></td>';
        $html .= '<td><b>quadra</b></td>';
        $html .= '<td><b>biblioteca</b></td>';
        $html .= '<td><b>labinfo</b></td>';
        $html .= '</tr>';
    //confs para forçar o download
        header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        header ("Last-Modified: ".gmdate("D,d M< YH:i:s")." GMT");
        header ("Cache-Control: no-cache, must-revalidade");
        header ("Pragma: no-cache");
        header ("Content-type: application/x-msexcel");
        header ("Content-Disposition: attachment; filename=\"{$arquivo}\"");
        header ("Content-Description: PHP Generated Data");
    //enviar conteudo do arquivo
        echo $html;
        exit;
    ?>
</body>
</html>
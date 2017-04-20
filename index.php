<?php
$headlines = array(
    "Ué, vocês ainda estão aqui",
    "Mi casa, su casa: relembre os 11 lares mais bonitos dos famosos que receberam o EGO",
    "'Beijo, haters': relembre famosos que leram comentários ácidos no EGO",
    "Nossa vez de 'quebrar a web' e 'gerar memes'",
    "Sentiremos falta de vocês também... Bye, bye",
    "Seguidora de Kelly Key critica foto dela amamentando e marido responde",
    "Munik Nunes curte domingo de Páscoa na praia e mostra corpaço",
    "Vem ver as novas fotos da Marinalva no #Paparazzo",
    "Rodrigo Santoro e Mel Fronckowiak fazem chá de bebê no Rio",
    "Ator grego fará estreia na TV aberta na supersérie 'Os Dias Eram Assim'",
    "Dia difícil para os haters! Ex-BBB Vivian Amorim é recebida por multidão em aeroporto de Manaus",
    "Oeee! Cauã Reymond e Mariana Goldfarb esquentam o clima em praia do Rio com direito à mão boba",
    "12 pack: Caio Castro e Felipe Tito ostentam o tanquinho sarado no Coachella",
    "Stênio Garcia comemora melhora da mulher, Marilene Saade: 'Está lúcida'",
    "Fina! Ex-BBB Mayara Motti usa bolsa de R$ 4 mil para ir a praia no Rio",
    "Novo visual de Wesley Safadão gera memes: 'A cara do David Brazil'",
    "Wesley Safadão muda o visual e adota cabelo curto em gravação de DVD",
    "Emilly Araújo curte passeio de iate no Rio: 'Continuo em um sonho'",
    "Lulu Santos rebate críticas ao novo visual: 'Tá cheio de grisalhos levando o pais à ruina'",
    "Ex-BBB Roberta perde voo após ida à delegacia no Rio",
    "Ana Carolina troca carinhos com a namorada Leticia Lima",
    "Sophia Abrahão, Sérgio Malheiros e mais vão à festa fantasia",
    "Giulia Costa curte viagem com amigas em Arraial do Cabo e posa ao lado de estátua da mãe",
    "Candidatas ao título de 'Mais Bela Gordinha do Rio' falam de preconceito",
    "Virada! Emilly agradece a fãs: 'Não dormi um minuto ainda'",
    "Atores do seriado '13 Reasons Why' curtem feriado em Recife",
    "Musa fitness Bella Falconi dá dica de bebida para quem exagerar no chocolate de Páscoa",
    "Famoso mostra veias saltadas e fã elogia: 'Tá maravilhoso'",
    "Coachella 2017: Thaila Ayala usa maiô em festival de música na Califórnia",
    "Doce época! 10 recordações de infância dos famosos na Páscoa",
    "Larissa Manoela fala a Giovanna Ewbank sobre virgindade: 'Tem o momento certo. Sem atropelar'",
    "Saiba tudo o que rolou nas festas após a final do #BBB17",
    "Emilly diz que criou um Marcos que não existe: 'Não quero saber dele'",
    "Acabou! Pai de Emilly sobre Marcos: 'Quero ele longe da minha filha'",
    "Na festa do #BBB17, Emilly usou look de quase R$3 mil dado por fãs",
    "Temporada 17 do 'BBB' quebrou recorde de comentários no Twitter; veja dados da rede social",
    "Felipe Araújo homenageia o irmão, Cristiano, durante lançamento de DVD",
    "Irmã de Marcos faz desabafo: 'Vivi um reality sem nunca ter sequer me inscrito'",
    "Além de atuar, Lorena Comparato dá aulas de física em inglês: 'Adoro'",
    "Emilly fala sobre Marcos no 'Mais Você': 'Não muda o que senti por ele'",
    "Vem conferir as novas fotos do #paparazzo da Gracyanne Barbosa com a irmã Giovanna",
    "Micaela Góes, do 'Santa Ajuda', abre sua casa e mostra a organização",
    "Leigh-Anne, do 'Little Mix', usa biquíni estilo fio-dental",
    "Ex-BBB Maria Claudia, a Cacau, beija muito em festa após a final do ‘BBB 17’",
    "Ex-BBBs Emilly e Mayla curtem festa com o pai e as filhas de Fátima Bernardes e Bonner",
    "Marcos Harter evita Emilly e não vai a festas após a final do ‘Big Brother Brasil 17’",
    "Ex-BBB Mayara chega com Antônio a festa pós-‘BBB’: 'Muito amigos'",
    "Ieda deixa 'BBB 17' em terceiro lugar e comenta falta de atenção a Emilly na final: 'Me surpreendi'",
    "Vivian, segundo lugar no ‘BBB 17’, não descarta namoro com Manoel e diz: Sofri muito, mas me fortaleci",
    "Emilly vence o BBB 17 e fala sobre ex-affair: 'Eu criei um Marcos que não existe'",
);

function func_explode($needle)
{
    return function ($string) use ($needle)
    {
        return explode($needle, $string);
    };
}

function head($array)
{
    return (is_array($array) AND isset($array[0])) ? $array[0] : null;
}

function tail($array)
{
    if(!is_array($array)) return null;

    $tmp = $array;
    array_shift($tmp);

    return (count($tmp) > 0) ? $tmp : null;
}

function orderer($array) // TODO: Tornar mais puro
{
    $return = array();
    $tmp = $array;
    foreach ($tmp as $key) {
        $return[$key] = head(tail($tmp));
        $tmp = tail($tmp);
    }
    return $return;
}

function flatter($array) // TODO: Tornar mais puro
{
    $return = array();
    foreach ($array as $value) {
        foreach($value as $k => $v) {
            $return[$k][] = "$v";
        }
    }
    return $return;
}

function percent($array) // TODO: Tornar mais puro
{
    $return = array();
    foreach($array as $k => $v) {
        $per =  $v / array_sum($array);
        $return[$k] = $per;
    }
    return $return;
}

function get_chance($array) // TODO: Tornar mais puro
{
    $return = array();
    $last = 0;
    foreach($array as $k => $v) {
        $return[$k] = $v + $last;
        $last = $return[$k];
    }
    return $return;
}

function get_by_percent($array, $per)
{
    return array_filter($array, function($value) use ($per) {
        return  $per < $value;
    });
}

function build($letter, $array)
{
    if($letter == "") return $letter;

    $next = head_key(get_by_percent($array[$letter], rand(1, 1000) / 1000));
    return $letter . " " . build($next, $array);
}

function head_key($array)
{
    if(!is_array($array)) return null;

    $tmp = $array;
    reset($tmp);
    return key($tmp);
}

function func_str_replace($search, $replace)
{
    return function ($string) use ($search, $replace)
    {
        return str_replace($search, $replace, $string);
    };
}

// MAIN
$rand = rand(1, 1000) / 1000;

$starters = array_map(func_explode(' '), $headlines);
$starters = array_map('head', $starters);
$starters = array_count_values($starters);
$starters = percent($starters);
$starters = get_chance($starters);
$starters = get_by_percent($starters, $rand);

$start    = head_key($starters);

$headlines = array_map(func_explode(' '), $headlines);
$headlines = array_map('orderer', $headlines);
$headlines = flatter($headlines);
$headlines = array_map('array_count_values', $headlines);
$headlines = array_map('percent', $headlines);
$headlines = array_map('get_chance', $headlines);

echo "<pre>";
echo str_replace("'", "", build($start, $headlines));
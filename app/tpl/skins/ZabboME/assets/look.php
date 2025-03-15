<?php                                                                
$fig		= strtolower($_GET["figure"]);
$action		= isset($_GET["action"]) ? strtolower($_GET["action"]) : 'std';
$direction		= isset($_GET["direction"]) ? (int)$_GET["direction"] : 2;
$head_direction	= isset($_GET["head_direction"]) ? (int)$_GET["head_direction"] : 3;
$gesture		= isset($_GET["gesture"]) ? strtolower($_GET["gesture"]) : 'sml';
$size			= isset($_GET["size"]) ? strtolower($_GET["size"]) : 'n';
$img_format		= isset($_GET["img_format"]) ? strtolower($_GET["img_format"]) : 'gif';
$frame			= isset($_GET["frame"]) ? strtolower($_GET["frame"]) : '0';
$effect			= isset ($_GET["effect"]) ? strtolower($_GET["effect"]) : '';
$headonly		= isset($_GET["headonly"]) ? (bool)$_GET["headonly"] : false;

$ch = curl_init("https://www.habbo.com/habbo-imaging/avatarimage?figure=" . $fig . "&action=" . $action . "&direction=" . $direction . "&head_direction=" . $head_direction . "&gesture=" . $gesture . "&size=" . $size . "&headonly=" . $headonly . "&frame=" . $frame . "&effect=" . $effect . "&img_format=" . $img_format . "");
    curl_setopt_array($ch, array(
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HEADER         => false,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_ENCODING       => "",
        CURLOPT_USERAGENT      => "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.75 Safari/537.36",
        CURLOPT_AUTOREFERER    => true,
        CURLOPT_SSL_VERIFYPEER => false
    ));

    $content = curl_exec($ch);
    $type = curl_getinfo($ch, CURLINFO_CONTENT_TYPE);

    curl_close($ch);

    if(!isset($content) || empty($content) || strpos($content, 'Not Found') !== false) {
        echo "Not found!";
        exit;
    }
   
    header("Content-Type: {$type}");

    echo $content;
?>
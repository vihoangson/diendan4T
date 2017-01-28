<?php
phpinfo();
    require("vendor/autoload.php");
    use Devristo\BBCode\BBCode;
    use Devristo\BBCode\Parser\RenderContext;
    use Devristo\BBCode\Parser\BBDomElement;
    require_once "vendor/jbbcode/Parser.php";

    $parser = new JBBCode\Parser();
    $parser->addCodeDefinitionSet(new JBBCode\DefaultCodeDefinitionSet());

    $bbcode = new Devristo\BBCode\BBCode();

    $bbcode->getRenderContext()->setDecorator(
        'center',
        function(RenderContext $context, BBDomElement $element){
            return '<div style="text-align:center">'.$context->render($element).'</div>';
        }
    );
    $bbcode->getRenderContext()->setDecorator(
        'size',
        function(RenderContext $context, BBDomElement $element){
            return '<div style="">'.$context->render($element).'</div>';
        }
    );
    $bbcode->getRenderContext()->setDecorator(
        'color',
        function(RenderContext $context, BBDomElement $element){
            return '<div style="">'.$context->render($element).'</div>';
        }
    );
    $bbcode->getRenderContext()->setDecorator(
        'font',
        function(RenderContext $context, BBDomElement $element){
            return '<div style="">'.$context->render($element).'</div>';
        }
    );

    $servername = "localhost";
    $username = "root";
    $password = "";
    $mysqli = new mysqli("localhost", "root", "", "tttt4r");
    $mysqli->set_charset("utf8");
?>
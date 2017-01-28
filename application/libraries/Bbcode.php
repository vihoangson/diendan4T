<?php

class Bbcode {
    public function __construct()
    {

        $this->data = new Devristo\BBCode\BBCode();

        $this->data->getRenderContext()->setDecorator(
            'center',
            function(Devristo\BBCode\Parser\RenderContext $context, Devristo\BBCode\Parser\BBDomElement $element){
                return '<div style="text-align:center">'.$context->render($element).'</div>';
            }
        );
        $this->data->getRenderContext()->setDecorator(
            'size',
            function(Devristo\BBCode\Parser\RenderContext $context, Devristo\BBCode\Parser\BBDomElement $element){
                return '<div style="">'.$context->render($element).'</div>';
            }
        );
        $this->data->getRenderContext()->setDecorator(
            'color',
            function(Devristo\BBCode\Parser\RenderContext $context, Devristo\BBCode\Parser\BBDomElement $element){
                return '<div style="">'.$context->render($element).'</div>';
            }
        );
        $this->data->getRenderContext()->setDecorator(
            'font',
            function(Devristo\BBCode\Parser\RenderContext $context, Devristo\BBCode\Parser\BBDomElement $element){
                return '<div style="">'.$context->render($element).'</div>';
            }
        );
    }
}
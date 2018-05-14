<?php
namespace Core\Form;

use Phalcon\Forms\Element\Check;
use Phalcon\Forms\Element\Hidden;


abstract class FormApp extends \Phalcon\Forms\Form
{


    public function renderDecoratedInline($name)
    {
        if (!$this->has($name)) {
            return "form element '$name' not found<br />";
        }

        $element = $this->get($name);
        $messages = $this->getMessagesFor($element->getName());

        $html = '';
        if (count($messages)) {
            $html .= '<div class="ui error message">';
            $html .= '<div class="header"></div>';
            foreach ($messages as $message) {
                $html .= '<p>' . $message . '</p>';
            }
            $html .= '</div>';
        }

        if ($element instanceof Hidden) {
            echo $element;
        } else {
            switch (true) {
                case $element instanceof Check:
                    $ele = $element->getAttribute('text');
                    $html .= "<div class=\"form-group m-form__group row\">
                                {$this->makeLabelInline($element)}
                                <div class=\"col-9\">
                                    <span class='m-switch m-switch--outline m-switch--icon m-switch--success'>
                                       <label>
                                            {$element}
                                            <span></span>
                                        </label>
                                    </span>
                                </div>
                            </div>";

                    break;

                default:
                    $html .= "<div class=\"form-group m-form__group row\">
                                {$this->makeLabelInline($element)}
                                <div class=\"col-9\">
                                    {$element}
                                </div>
                            </div>";
            }
        }

        return $html;

    }

    public function renderAll()
    {
        $html = '';
        if ($this->getElements()) {
            foreach ($this->getElements() as $element) {
                $html .= $this->renderDecoratedInline($element->getName());
            }
        }
        return $html;
    }

    private function makeLabel($element)
    {
        if ($element->getLabel()) {
            return '<label class="control-label" for="' . $element->getName() . '">' . $element->getLabel() . '</label>';
        } else {
            return '';
        }
    }

    private function makeLabelInline($element)
    {
        if ($element->getLabel()) {
            return '<label class="col-3 col-form-label" for="' . $element->getName() . '">' . $element->getLabel() . '</label>';
        } else {
            return '';
        }
    }
}

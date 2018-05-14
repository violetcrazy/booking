<?php
namespace Orders\Form;


use Core\Form\FormApp;
use Phalcon\Forms\Element\Check;
use Phalcon\Forms\Element\Hidden;
use Phalcon\Forms\Element\Text;
use Phalcon\Validation\Validator\PresenceOf;

class OrderForm extends FormApp
{
    public function initialize()
    {
        $field = new Text('payment_title', array('class' => 'form-control', 'required' => true));
        $field->setLabel('Phương thức');
        $this->add($field);

        $field = new Check('payment_status', array(
            'class' => 'form-control',
            'value' => 'paid'
        ));

        $field->setLabel('Đã thanh toán');
        $this->add($field);

    }
}
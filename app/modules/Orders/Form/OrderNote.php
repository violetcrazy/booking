<?php

namespace Orders\Form;

use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Form;
use Phalcon\Validation\Validator\PresenceOf;

class OrderNote extends Form {

    public function initialize($model, $options){
        $field = new Text('note_content');
        $field->addValidators(array(
            new PresenceOf(array(
                'message' => 'Yêu cầu nhập nội dung ghi chú'
            ))
        ));
        $field->setFilters(array('trim'));
        $this->add($field);
    }
}
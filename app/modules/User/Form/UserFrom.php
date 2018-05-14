<?php
namespace User\Form;


use Core\Form\FormApp;
use Phalcon\Forms\Element\Hidden;
use Phalcon\Forms\Element\Text;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Email;

class UserFrom extends FormApp
{
    public function initialize()
    {
        $field = new Hidden('ID');
        $this->add($field);

        $field = new Text('user_nicename', array('disabled' => true, 'class' => 'form-control'));
        $field->setLabel('Slug');
        $this->add($field);

        $field = new Text('user_login', array('disabled' => true, 'class' => 'form-control'));
        $field->setLabel('Tên đăng nhập');
        $this->add($field);

        $field = new Text('display_name', ['required' => true, 'class' => 'form-control']);
        $field->addValidator(new PresenceOf([
            'message' => 'Tên người dùng không đươc bỏ trống'
        ]));
        $field->setLabel('Họ và tên');
        $this->add($field);


        $field = new Text('user_phone', ['required' => true, 'class' => 'form-control']);
        $field->addValidator(new PresenceOf([
            'message' => 'Tên người dùng không đươc bỏ trống'
        ]));
        $field->setLabel('Số điện thoại');
        $this->add($field);


        $field = new Text('user_email', ['required' => true, 'class' => 'form-control']);
        $field->addValidator(new PresenceOf([
            'message' => 'Nhập vào Email của người dùng'
        ]));
        $field->addValidator(new Email([
            'message' => 'Email người dùng chưa đúng định dạng'
        ]));
        $field->setLabel('Email');
        $this->add($field);


        $field = new Text('user_address', ['required' => true, 'class' => 'form-control']);
        $field->addValidator(new PresenceOf([
            'message' => 'Địa chỉ là bắt buộc'
        ]));
        $field->setLabel('Địa chỉ');
        $this->add($field);
    }
}
<?php

namespace Orders\Controller;

use Common\Constant;
use Core\Controller\BaseController;
use Orders\Form\OrderNote;
use Orders\Model\OrdersNote;

class AjaxController extends BaseController {

    public function initialize()
    {
        parent::initialize();
    }

    public function orderNotesAction()
    {
        $notes = array();

        $order_id = $this->request->getQuery('order_id', array('int'), 0);
        $notesM = OrdersNote::find(array(
            "conditions" => "order_id = '{$order_id}'",
            "order" => "created_at DESC"
        ));

        if ($notesM) {
            foreach ($notesM as $note) {
                $notes[] = $note->getSchemaApi();
            }
        }

        $this->view->notes = $notes;
        $this->view->pick('ajax/notes_list');
    }
    public function addnoteAction()
    {
        $output = array(
            'status' => 200,
            'message' => 'Success',
            'result' => ''
        );

        $post = $this->request->getPost();

        $order_id = $this->request->getPost('order_id', array('int'), '');
        $type = $this->request->getPost('note_type', array('striptags', 'trim'), '');
        $user_id = $this->userCurrent->ID;

        $noteM = new OrdersNote();
        $form = new OrderNote($noteM);

        $form->bind($post, $noteM);
        if (!$form->isValid()) {
            $output = array(
                'status' => 400,
                'message' => 'Error. Lỗi thông tin nhập vào',
                'result' => ''
            );
        } else {
            $noteM->order_id = $order_id;
            $noteM->created_by = $user_id;
            $noteM->created_at = time();
            $noteM->content = $form->getValue('note_content');

            if($type != 'on') {
                $noteM->type = Constant::ORDER_NOTE_TYPE_PRIVATE;
            } else {
                $noteM->type = Constant::ORDER_NOTE_TYPE_SHARE;
            }

            if ($noteM->create()) {
                $output = array(
                    'status' => 200,
                    'message' => 'Success',
                    'result' => $noteM->getSchemaApi()
                );
            } else {
                $output = array(
                    'status' => 400,
                    'message' => 'Error. Lỗi khi thêm ghi chú',
                    'result' => ''
                );

                foreach ($noteM->getMessages() as $mess) {
                    $output['result'][] = $mess->getMessage();
                }
            }
        }


        parent::outputJSON($output);
        return true;
    }
}
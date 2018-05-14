<?php
namespace User\Controller;

use Common\Datatable;
use Core\Controller\BaseController;
use User\HelperModel\UserHelper;
use User\HelperModel\UserSetupData;
use User\Model\User;

class AjaxController extends BaseController
{
    public function initialize()
    {
        parent::initialize();

        if (ENV == 'prod') {
            if (!$this->request->isAjax()) {
                $this->outputJSON(array(
                    'status' => 200,
                    'message' => 'Request not allow'
                ));
            }
        }
    }

    public function listAction()
    {

        $page = $this->request->getQuery('page', array('int'), 1);
        $type = $this->request->getQuery('datatable', array('striptags', 'trim'), false);
        $q = $this->request->getQuery('q', array('striptags', 'trim'), '');
        $phone = $this->request->getQuery('phone', array('striptags', 'trim'), '');

        $userHelper = new UserHelper();
        $users = $userHelper->getUsersPagination(array(
            'page' => $page,
            'search' => array(
                'key' => $q,
                'fields' => array(
                    'display_name',
                    'user_phone',
                    'user_address'
                )
            ),
            'user_phone' => $phone
        ));

        $output = array();
        if (count($users->items) > 0)
        {
            foreach ($users->items as $user) {
                $_user = new UserSetupData();
                $_user = $_user->setup_user_class($user);
                $_user = $_user->getSchemaApi();

                if ($type == 'datatable') {
                    $output[] = Datatable::schemaStatic($_user, array(
                        'id' => 'ID',
                        'text' => array(
                            'name', 'phone', 'address'
                        )
                    ));
                } else {
                    $output[] = $_user;
                }

            }
        }
        $users->items = $output;

        if ($type == 'datatable') {
            $output = array(
                'pagination' => array(
                    'more' => true
                ),
                'results' => $output
            );
        } else {
            $output = $users;
        }

        $this->outputJSON($output);
    }
}
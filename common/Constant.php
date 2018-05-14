<?php

namespace Common;

class Constant {
    const ORDER_STATUS_DEFAULT = 'new_order';
    const ORDER_STATUS_KIOTVIETTRANS = 'kiotviet';
    const ORDER_STATUS_COMPLETE = 'complete';
    const ORDER_STATUS_CANCEL = 'cancel';
    const ORDER_STATUS_PROCESSING = 'processing';
    const ORDER_STATUS_SHIPPING= 'shipping';
    const LIMIT_LISTING = 5;

    const ORDER_NOTE_TYPE_SHARE = 1;
    const ORDER_NOTE_TYPE_PRIVATE = 2;
    const ORDER_NOTE_TYPE_SYSTEM = 3;

    const DATE_FORMAT = 'H:i d/m/Y';

    const USER_MEMBER_CUSTOMER = 'customer';
    const USER_MEMBER_BOSS = 'boss';
    const USER_MEMBER_MANAGER = 'manager';
    const USER_MEMBER_LEADER = 'leader';
    const USER_MEMBER_SELLER = 'seller';
    const USER_MEMBER_SUPPORTER = 'supporter';
    const USER_MEMBER_STAFF = 'staff';


    public static function getUserLabel($key = '', $onlyLabel = false){
        $status = array(
            self::USER_MEMBER_BOSS => array(
                'label' => 'Boss',
                'class' => 'm-badge m-badge--wide m-badge--info',
                'color' => 'info'
            ),
            self::USER_MEMBER_MANAGER => array(
                'label' => 'Quản lý',
                'class' => 'm-badge m-badge--wide m-badge--success',
                'color' => 'success'
            ),
            self::USER_MEMBER_LEADER => array(
                'label' => 'Trưởng nhóm',
                'class' => 'm-badge m-badge--wide m-badge--primary',
                'color' => 'primary'
            ),
            self::USER_MEMBER_SUPPORTER => array(
                'label' => 'Chăm sóc khách hàng',
                'class' => 'm-badge m-badge--wide m-badge--secondary',
                'color' => 'secondary'
            ),
            self::USER_MEMBER_SELLER => array(
                'label' => 'Bán hàng',
                'class' => 'm-badge m-badge--wide m-badge--secondary',
                'color' => 'secondary'
            ),
            self::USER_MEMBER_CUSTOMER => array(
                'label' => 'Khách hàng',
                'class' => 'm-badge m-badge--wide m-badge--danger',
                'color' => 'danger'
            ),
            self::USER_MEMBER_STAFF => array(
                'label' => 'Nhân viên nội bộ',
                'class' => 'm-badge m-badge--wide m-badge--secondary',
                'color' => 'secondary'
            )
        );

        if ($key == '') {
            return $status;
        } elseif (isset($status[$key])) {
            if($onlyLabel) {
                return $status[$key]['label'];
            } else {
                return $status[$key];
            }

        } else {
            return '';
        }
    }

    public static function getStatus($key = '', $onlyLabel = false){
        $status = array(
            self::ORDER_STATUS_DEFAULT => array(
                'label' => 'Đơn hàng mới',
                'class' => 'm-badge m-badge--wide m-badge--danger',
                'color' => 'danger'
            ),
            self::ORDER_STATUS_KIOTVIETTRANS => array(
                'label' => 'Chuyển qua KiotVIET',
                'class' => 'm-badge m-badge--wide m-badge--danger',
                'color' => 'danger'
            ),
            self::ORDER_STATUS_PROCESSING => array(
                'label' => 'Đã xác nhận',
                'class' => 'm-badge m-badge--wide m-badge--info',
                'color' => 'info'
            ),
            self::ORDER_STATUS_SHIPPING => array(
                'label' => 'Vận chuyển',
                'class' => 'm-badge m-badge--wide m-badge--warning',
                'color' => 'warning'
            ),
            self::ORDER_STATUS_COMPLETE => array(
                'label' => 'Hoàn thành',
                'class' => 'm-badge m-badge--wide m-badge--success',
                'color' => 'success'
            ),
            self::ORDER_STATUS_CANCEL => array(
                'label' => 'Đã hủy',
                'class' => 'm-badge m-badge--wide m-badge--primary',
                'color' => 'primary'
            ),
            'delete' => array(
                'label' => 'Đã xóa',
                'class' => 'm-badge m-badge--wide m-badge--secondary',
                'color' => 'secondary'
            ),
        );

        if ($key == '') {
            return $status;
        } elseif (isset($status[$key])) {
            if($onlyLabel) {
                return $status[$key]['label'];
            } else {
                return $status[$key];
            }

        } else {
            return array();
        }
    }
}
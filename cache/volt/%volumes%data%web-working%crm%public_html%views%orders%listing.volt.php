<?php $this->_macros['formGroupText'] = function($__p = null) { if (isset($__p[0])) { $name = $__p[0]; } else { if (isset($__p["name"])) { $name = $__p["name"]; } else {  throw new \Phalcon\Mvc\View\Exception("Macro 'formGroupText' was called without parameter: name");  } } if (isset($__p[1])) { $data = $__p[1]; } else { if (isset($__p["data"])) { $data = $__p["data"]; } else {  throw new \Phalcon\Mvc\View\Exception("Macro 'formGroupText' was called without parameter: data");  } }  ?>
    <div class="form-group m-form__group row">
        <label for="<?= $data['id'] ?>" class="col-3 col-form-label">
            <?= $data['label'] ?>
        </label>

        <div class="col-9">
            <input class="form-control m-input" name="<?= $name ?>" type="text" value="<?= (isset($data['value']) ? $data['value'] : '') ?>" id="<?= $data['id'] ?>">
        </div>
    </div><?php }; $this->_macros['formGroupText'] = \Closure::bind($this->_macros['formGroupText'], $this); ?><?php $this->_macros['formGroupInputVertical'] = function($__p = null) { if (isset($__p[0])) { $name = $__p[0]; } else { if (isset($__p["name"])) { $name = $__p["name"]; } else {  throw new \Phalcon\Mvc\View\Exception("Macro 'formGroupInputVertical' was called without parameter: name");  } } if (isset($__p[1])) { $data = $__p[1]; } else { if (isset($__p["data"])) { $data = $__p["data"]; } else {  throw new \Phalcon\Mvc\View\Exception("Macro 'formGroupInputVertical' was called without parameter: data");  } }  ?>
    <div class="form-group">
        <label for="<?= $data['id'] ?>" class="col-form-label">
            <?= $data['label'] ?>
        </label>
        <?php if ($data['type'] == 'text') { ?>
            <input class="form-control m-input <?= (isset($data['class']) ? $data['class'] : '') ?>" name="<?= $name ?>" type="text" value="<?= (isset($data['value']) ? $data['value'] : '') ?>" id="<?= $data['id'] ?>">
        <?php } elseif ($data['type'] == 'number') { ?>
            <input class="form-control m-input" name="<?= $name ?>" type="number" value="<?= (isset($data['value']) ? $data['value'] : '') ?>" id="<?= $data['id'] ?>">
        <?php } elseif ($data['type'] == 'textarea') { ?>
            <textarea name="<?= $name ?>" id="<?= $data['id'] ?>" class="form-control" rows="3"></textarea>
        <?php } ?>

    </div><?php }; $this->_macros['formGroupInputVertical'] = \Closure::bind($this->_macros['formGroupInputVertical'], $this); ?><?php $this->_macros['formGroupInputGroup2Text'] = function($__p = null) { if (isset($__p[0])) { $name = $__p[0]; } else { if (isset($__p["name"])) { $name = $__p["name"]; } else {  throw new \Phalcon\Mvc\View\Exception("Macro 'formGroupInputGroup2Text' was called without parameter: name");  } } if (isset($__p[1])) { $data = $__p[1]; } else { if (isset($__p["data"])) { $data = $__p["data"]; } else {  throw new \Phalcon\Mvc\View\Exception("Macro 'formGroupInputGroup2Text' was called without parameter: data");  } }  ?>
    <div class="form-group m-form__group">
        <div class="input-group">
            <div class="input-group-append">
                <span class="input-group-text" id="basic-addon2">
                    <?= $data['label'] ?>
                </span>
            </div>

            <input type="text" class="form-control m-input" placeholder="" aria-describedby="basic-addon2">

            <div class="input-group-append">
                <span class="input-group-text" id="basic-addon2">
                    <?= $data['label_after'] ?>
                </span>
            </div>
        </div>
    </div><?php }; $this->_macros['formGroupInputGroup2Text'] = \Closure::bind($this->_macros['formGroupInputGroup2Text'], $this); ?>



<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


	<title>

	</title>
	<link href="<?= $this->url->get() ?>/assets/vendors/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css"
	/>
	<link href="<?= $this->url->get() ?>/assets/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />
	<link href="<?= $this->url->get() ?>/assets/demo/default/base/style.bundle.css" rel="stylesheet" type="text/css" />
	<link href="<?= $this->url->get() ?>/assets/css/main.css" rel="stylesheet" type="text/css" />
	<link rel="shortcut icon" href="<?= $this->url->get() ?>/assets/demo/default/media/img/logo/favicon.ico" />


	<!--begin::Base Scripts -->
	<script src="<?= $this->url->get() ?>assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
	<script src="<?= $this->url->get() ?>assets/demo/default/base/scripts.bundle.js" type="text/javascript"></script>
	<!--end::Base Scripts -->
	<!--begin::Page Vendors -->
	<script src="<?= $this->url->get() ?>assets/vendors/custom/fullcalendar/fullcalendar.bundle.js" type="text/javascript"></script>
	<!--end::Page Vendors -->
	<!--begin::Page Snippets -->
	<script src="<?= $this->url->get() ?>assets/app/js/dashboard.js" type="text/javascript"></script>
	<!--end::Page Snippets -->
	<script src="<?= $this->url->get() ?>assets/demo/default/custom/components/forms/widgets/select2.js" type="text/javascript"></script>
	<script src="<?= $this->url->get() ?>assets/js/app.js"></script>
	<script src="<?= $this->url->get() ?>assets/js/nano.js"></script>
	<script src="<?= $this->url->get() ?>assets/js/jquery.number.min.js"></script>
	<script src="<?= $this->url->get() ?>assets/js/wnumb-1.1.03/wNumb.js"></script>
	<script>
        var numberFormat = wNumb({
            mark: '.',
            thousand: ','
        });
	</script>
</head>

<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">
<!-- begin:: Page -->
<div class="m-grid m-grid--hor m-grid--root m-page">
	<!-- BEGIN: Header -->
	<header class="m-grid__item    m-header " data-minimize-offset="200" data-minimize-mobile-offset="200">
		<div class="m-container m-container--fluid m-container--full-height">
			<div class="m-stack m-stack--ver m-stack--desktop">
				<!-- BEGIN: Brand -->
				<div class="m-stack__item m-brand  m-brand--skin-dark ">
					<div class="m-stack m-stack--ver m-stack--general">
						<div class="m-stack__item m-stack__item--middle m-brand__logo">
							<a href="<?= $this->url->get() ?>" class="m-brand__logo-wrapper">
								<img alt="" src="<?= $this->url->get() ?>assets/demo/default/media/img/logo/logo_default_dark.png" />
							</a>
						</div>
						<div class="m-stack__item m-stack__item--middle m-brand__tools">
							<!-- BEGIN: Left Aside Minimize Toggle -->
							<a href="javascript:;" id="m_aside_left_minimize_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-desktop-inline-block ">
								<span></span>
							</a>
							<!-- END -->
							<!-- BEGIN: Responsive Aside Left Menu Toggler -->
							<a href="javascript:;" id="m_aside_left_offcanvas_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-tablet-and-mobile-inline-block">
								<span></span>
							</a>
							<!-- END -->
							<!-- BEGIN: Responsive Header Menu Toggler -->
							<a id="m_aside_header_menu_mobile_toggle" href="javascript:;" class="m-brand__icon m-brand__toggler m--visible-tablet-and-mobile-inline-block">
								<span></span>
							</a>
							<!-- END -->
							<!-- BEGIN: Topbar Toggler -->
							<a id="m_aside_header_topbar_mobile_toggle" href="javascript:;" class="m-brand__icon m--visible-tablet-and-mobile-inline-block">
								<i class="flaticon-more"></i>
							</a>
							<!-- BEGIN: Topbar Toggler -->
						</div>
					</div>
				</div>
				<!-- END: Brand -->
				<div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">
					<!-- BEGIN: Horizontal Menu -->
					<button class="m-aside-header-menu-mobile-close  m-aside-header-menu-mobile-close--skin-dark " id="m_aside_header_menu_mobile_close_btn">
						<i class="la la-close"></i>
					</button>

					<!-- END: Horizontal Menu -->
					<!-- BEGIN: Topbar -->
					<div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general">
						<div class="m-stack__item m-topbar__nav-wrapper">
							<ul class="m-topbar__nav m-nav m-nav--inline">

    <li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img  m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light"
        data-dropdown-toggle="click">
        <a href="#" class="m-nav__link m-dropdown__toggle">
										<span class="m-topbar__userpic">
											<img src="<?= $userCurrent->getAvatar() ?>" class="m--img-rounded m--marginless m--img-centered" alt="" />
										</span>
            <span class="m-topbar__username m--hide">
											<?= $userCurrent->getName() ?>
										</span>
        </a>
        <div class="m-dropdown__wrapper">
            <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
            <div class="m-dropdown__inner">
                <div class="m-dropdown__header m--align-center" style="background: url(assets/app/media/img/misc/user_profile_bg.jpg); background-size: cover;">
                    <div class="m-card-user m-card-user--skin-dark">
                        <div class="m-card-user__pic">
                            <img src="<?= $userCurrent->getAvatar() ?>" class="m--img-rounded m--marginless" alt="" />
                        </div>
                        <div class="m-card-user__details">
                                                            <span class="m-card-user__name m--font-weight-500">
                                                                <?= $userCurrent->getName() ?>
                                                            </span>
                            <a href="" class="m-card-user__email m--font-weight-300 m-link">
                                <?= $userCurrent->user_email ?>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="m-dropdown__body">
                    <div class="m-dropdown__content">
                        <ul class="m-nav m-nav--skin-light">
                            <li class="m-nav__section m--hide"><span class="m-nav__section-text">Section</span></li>

                            <li class="m-nav__item">
                                <a href="#" class="m-nav__link">
                                    <i class="m-nav__link-icon flaticon-share"></i>
                                    <span class="m-nav__link-text">
																	Chỉnh sửa thông tin
																</span>
                                </a>
                            </li>

                            <li class="m-nav__separator m-nav__separator--fit"></li>

                            <li class="m-nav__item">
                                <a href="<?= $this->url->get(['for' => 'auth_logout']) ?>" class="btn m-btn--pill    btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder">
                                    Thoát
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </li>
</ul>
						</div>
					</div>
					<!-- END: Topbar -->
				</div>
			</div>
		</div>
	</header>
	<!-- END: Header -->


	<!-- begin::Body -->
	<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
		<!-- BEGIN: Left Aside -->
		<button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn">
			<i class="la la-close"></i>
		</button>

		<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">
			<div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark " data-menu-vertical="true"
     data-menu-scrollable="false" data-menu-dropdown-timeout="500">
    <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
        <?php foreach ($main_menu[0] as $menuItem) { ?>
            <?php $hasSub = (isset($main_menu[$menuItem['name']]) ? true : false); ?>
            <li class="m-menu__item <?= ($hasSub ? 'm-menu__item--submenu' : '') ?> " aria-haspopup="true"  data-menu-submenu-toggle="hover">
                
                <a href="<?= (isset($main_menu[$menuItem['name']]) ? 'javascript:;' : $menuItem['url']) ?>"
                   class="m-menu__link <?= ($hasSub ? 'm-menu__toggle' : '') ?>"
                    <?= ($hasSub ? 'data-menu-submenu-toggle="click" data-redirect="true" aria-haspopup="true"' : '') ?>
                >
                    <i class="m-menu__link-icon <?= $menuItem['icon_menu'] ?>"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">
                                <?= $menuItem['title_menu'] ?>
                            </span>

                            <?php if ($hasSub) { ?>
                                <i class="m-menu__hor-arrow la la-angle-down"></i>
                                <i class="m-menu__ver-arrow la la-angle-right"></i>
                            <?php } ?>
                        </span>
                    </span>
                </a>

                <?php if (isset($main_menu[$menuItem['name']])) { ?>
                    <div class="m-menu__submenu m-menu__submenu m-menu__submenu--classic m-menu__submenu--left">
                        <span class="m-menu__arrow m-menu__arrow--adjust"></span>
                        <ul class="m-menu__subnav">
                            <li class="m-menu__item" aria-haspopup="true">
                                <a href="<?= $menuItem['url'] ?>" class="m-menu__link ">
                                    <i class="m-menu__link-icon <?= $menuItem['icon_menu'] ?>"></i>
                                    <span class="m-menu__link-title">
                                        <span class="m-menu__link-wrap">
                                            <span class="m-menu__link-text">
                                                <?= $menuItem['title_menu'] ?>
                                            </span>
                                        </span>
                                    </span>
                                </a>
                            </li>
                            <?php foreach ($main_menu[$menuItem['name']] as $menuSubItem) { ?>
                            <li class="m-menu__item" aria-haspopup="true">
                                <a href="<?= $menuSubItem['url'] ?>" class="m-menu__link ">
                                    <i class="m-menu__link-icon <?= $menuSubItem['icon_menu'] ?>"></i>
                                    <span class="m-menu__link-title">
                                        <span class="m-menu__link-wrap">
                                            <span class="m-menu__link-text">
                                                <?= $menuSubItem['title_menu'] ?>
                                            </span>
                                        </span>
                                    </span>
                                </a>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                <?php } ?>
            </li>
        <?php } ?>

        <li class="m-menu__section">
            <h4 class="m-menu__section-text">
                Quick Action
            </h4>
            <i class="m-menu__section-icon flaticon-more-v3"></i>
        </li>

        <li class="m-menu__item">
            <a href="#" class="m-menu__link ">
                <i class="m-menu__link-icon flaticon-user-add"></i>
                <span class="m-menu__link-title">
                    <span class="m-menu__link-wrap">
                        <span class="m-menu__link-text">
                            Tạo Tài khoản
                        </span>
                    </span>
                </span>
            </a>
        </li>

    </ul>
</div>
		</div>
		<!-- END: Left Aside -->

		<div class="m-grid__item m-grid__item--fluid m-wrapper">
			<div class="m-content">
				<?= $this->flashSession->output() ?>
                

    <?= $this->template->openPortlet(['body_nopadding' => true]) ?>
<table class="table m-table m-table--head-bg-success text-left">
    <thead>
    <th>Đơn hàng mơi</th>
    <th>Đang xử lý</th>
    <th>Đang Ship</th>
    <th>Đã hoàn thành</th>
    <th>Đã hủy</th>
    </thead>

    <tr class="">
        <td>
            <b class="text-danger m--icon-font-size-lg1">
                <?php if ((isset($statistic['count'][constant('\Common\Constant::ORDER_STATUS_DEFAULT')]))) { ?>
                    <?= $this->util->currencyFormat($statistic['count'][constant('\Common\Constant::ORDER_STATUS_DEFAULT')]) ?>
                <?php } else { ?>
                    0
                <?php } ?>
            </b>
            order
        </td>
        <td>
            <b class="text-info m--icon-font-size-lg1">
                <?php if ((isset($statistic['count'][constant('\Common\Constant::ORDER_STATUS_PROCESSING')]))) { ?>
                    <?= $this->util->currencyFormat($statistic['count'][constant('\Common\Constant::ORDER_STATUS_PROCESSING')]) ?>
                <?php } else { ?>
                    0
                <?php } ?>
            </b>
            order
        </td>
        <td>
            <b class="text-warning m--icon-font-size-lg1">
                <?php if ((isset($statistic['count'][constant('\Common\Constant::ORDER_STATUS_SHIPPING')]))) { ?>
                    <?= $this->util->currencyFormat($statistic['count'][constant('\Common\Constant::ORDER_STATUS_SHIPPING')]) ?>
                <?php } else { ?>
                    0
                <?php } ?>
            </b>
            order
        </td>
        <td>
            <b class="text-success m--icon-font-size-lg1">
                <?php if ((isset($statistic['count'][constant('\Common\Constant::ORDER_STATUS_COMPLETE')]))) { ?>
                    <?= $this->util->currencyFormat($statistic['count'][constant('\Common\Constant::ORDER_STATUS_COMPLETE')]) ?>
                <?php } else { ?>
                    0
                <?php } ?>
            </b>
            order
        </td>
        <td>
            <b class="text-primary m--icon-font-size-lg1">
                <?php if ((isset($statistic['count'][constant('\Common\Constant::ORDER_STATUS_CANCEL')]))) { ?>
                    <?= $this->util->currencyFormat($statistic['count'][constant('\Common\Constant::ORDER_STATUS_CANCEL')]) ?>
                <?php } else { ?>
                    0
                <?php } ?>
            </b>
            order
        </td>
    </tr>

    <tr class="">
        <td>
            <b class="text-danger m--icon-font-size-lg1">
                <?php if ((isset($statistic['sum'][constant('\Common\Constant::ORDER_STATUS_DEFAULT')]))) { ?>
                    <?= $this->util->currencyFormat($statistic['sum'][constant('\Common\Constant::ORDER_STATUS_DEFAULT')]) ?>
                <?php } else { ?>
                    0
                <?php } ?>
            </b> đ
        </td>
        <td>
            <b class="text-info m--icon-font-size-lg1">
                <?php if ((isset($statistic['sum'][constant('\Common\Constant::ORDER_STATUS_PROCESSING')]))) { ?>
                    <?= $this->util->currencyFormat($statistic['sum'][constant('\Common\Constant::ORDER_STATUS_PROCESSING')]) ?>
                <?php } else { ?>
                    0
                <?php } ?>
            </b> đ
        </td>
        <td>
            <b class="text-warning m--icon-font-size-lg1">
                <?php if ((isset($statistic['sum'][constant('\Common\Constant::ORDER_STATUS_SHIPPING')]))) { ?>
                    <?= $this->util->currencyFormat($statistic['sum'][constant('\Common\Constant::ORDER_STATUS_SHIPPING')]) ?>
                <?php } else { ?>
                    0
                <?php } ?>
            </b> đ
        </td>
        <td>
            <b class="text-success m--icon-font-size-lg1">
                <?php if ((isset($statistic['sum'][constant('\Common\Constant::ORDER_STATUS_COMPLETE')]))) { ?>
                    <?= $this->util->currencyFormat($statistic['sum'][constant('\Common\Constant::ORDER_STATUS_COMPLETE')]) ?>
                <?php } else { ?>
                    0
                <?php } ?>
            </b> đ
        </td>
        <td>
            <b class="text-primary m--icon-font-size-lg1">
                <?php if ((isset($statistic['sum'][constant('\Common\Constant::ORDER_STATUS_CANCEL')]))) { ?>
                    <?= $this->util->currencyFormat($statistic['sum'][constant('\Common\Constant::ORDER_STATUS_CANCEL')]) ?>
                <?php } else { ?>
                    0
                <?php } ?>
            </b> đ
        </td>
    </tr>

</table>
<?= $this->template->closePortlet() ?>

    <?= $this->template->openPortlet(['title' => 'Các đơn hàng', 'sub_title' => 'Tổng cộng <b>' . $result->total_items . '</b> đơn hàng']) ?>

        <div class="topFilter m--margin-bottom-20">
            <form action="" class="">
                <div class="row">
                    <div class="col-md-4 col-lg-3">
                        <input type="number" value="<?= $this->request->getQuery('order_id', ['int'], '') ?>" name="order_id" class="form-control" placeholder="ID đơn hàng">
                    </div>
                    <div class="col-md-4 col-lg-3">
                        <select name="date_range" id="" class="form-control" onchange="form.submit()">
                            <option <?= ($this->request->getQuery('date_range', ['striptags', 'trim'], '') == '' ? 'selected' : '') ?> value="">Chọn ngày</option>
                            <option <?= ($this->request->getQuery('date_range', ['striptags', 'trim'], '') == 'now' ? 'selected' : '') ?> value="now">Trong ngày</option>
                            <option <?= ($this->request->getQuery('date_range', ['striptags', 'trim'], '') == 'star_week' ? 'selected' : '') ?> value="star_week">Từ thứ 2</option>
                            <option <?= ($this->request->getQuery('date_range', ['striptags', 'trim'], '') == 'star_month' ? 'selected' : '') ?> value="star_month">Từ đầu tháng (ngày 1)</option>
                            <option <?= ($this->request->getQuery('date_range', ['striptags', 'trim'], '') == '7dayago' ? 'selected' : '') ?> value="7dayago">7 ngày trước</option>
                            <option <?= ($this->request->getQuery('date_range', ['striptags', 'trim'], '') == '15dayago' ? 'selected' : '') ?> value="15dayago">15 ngày trước</option>
                            <option <?= ($this->request->getQuery('date_range', ['striptags', 'trim'], '') == '30dayago' ? 'selected' : '') ?> value="30dayago">30 ngày trước</option>
                        </select>
                    </div>
                    <div class="col-md-4 col-lg-3">
                        <select name="status" id="" class="form-control" onchange="form.submit()">
                            <?= $this->template->optionsStatusOrder($this->request->getQuery('status')) ?>
                        </select>
                    </div>
                    <div class="col-md-4 col-lg-3">
                        <select name="sort" id="" class="form-control" onchange="form.submit()">
                            <option value="">Sắp xếp</option>
                            <option <?= ($this->request->getQuery('sort', ['striptags', 'trim'], '') == 'create' ? 'selected' : '') ?> value="create">Ngày tạo</option>
                            <option <?= ($this->request->getQuery('sort', ['striptags', 'trim'], '') == 'update' ? 'selected' : '') ?> value="update">Ngày cập nhật</option>
                        </select>
                    </div>
                </div>

                <div class="row m--margin-top-15">
                    <div class="col-md-4 col-lg-3">
                        <div>Người phụ trách</div>
                        <select class="form-control selectCskh" id="" name="seller_id" data-url="<?= $this->url->get(['for' => 'user_ajax_list']) ?>">
                            <?php if ((isset($seller))) { ?>
                                <option value="<?= $seller['ID'] ?>"><?= $seller['name'] ?> - <?= $seller['phone'] ?> - <?= $seller['address'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-4 col-lg-3">
                        <div>Khách hàng</div>
                        <select class="form-control selectCskh" id="" name="customer_id" data-url="<?= $this->url->get(['for' => 'user_ajax_list']) ?>">
                            <?php if ((isset($customer))) { ?>
                                <option value="<?= $customer['ID'] ?>"><?= $customer['name'] ?> - <?= $customer['phone'] ?> - <?= $customer['address'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-4 col-lg-3">
                        <div>Nhân viên tiếp thị</div>
                        <select class="form-control selectCskh" id="" name="aff_id" data-url="<?= $this->url->get(['for' => 'user_ajax_list']) ?>">
                            <?php if ((isset($aff))) { ?>
                                <option value="<?= $aff['ID'] ?>"><?= $aff['name'] ?> - <?= $aff['phone'] ?> - <?= $aff['address'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-4 col-lg-3">
                        <div>&#06</div>
                        <button class="btn-block btn btn-primary">Áp dụng</button>
                    </div>
                </div>

                <div class="clearfix"></div>
            </form>
            <div class="clearfix"></div>
        </div>



        <div class="table-responsive">
            <table class="table table-bordered">
                <?php if ($result->total_items > 0) { ?>
                    <?php foreach ($result->items as $order) { ?>
                        <tr data-row="0" class="">

                            <td style="width: 1%">
                                <label class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand">
                                    <input type="checkbox" value="15">
                                    <span></span>
                                </label>
                            </td>
                            <td width="1%">
                                <span class="noenter"><?= $order->getStatusHtml() ?></span>
                            </td>
                            <td>
                                <span style="width: 150px;">
                                    <a href="<?= $this->url->get(['for' => 'order_edit', 'id' => $order->order_id]) ?>">
                                        <b class="m--icon-font-size-lg1">#<?= $order->order_id ?></b> 
                                        <?= $order->getIp() ?>
                                        <br>
                                        #<?= $order->get_meta('kiotviet_id') ?>
                                    </a>
                                </span>
                            </td>
                            <td>
                                <b class="m--font-danger m--icon-font-size-lg1">
                                    <?= $this->util->currencyFormat($order->total_price) ?>
                                </b>
                                (<b class="m--icon-font-size-sm2"><?= $order->total_qty ?></b> sản phẩm)
                            </td>
                            <td>
                                <a href=""><span>#<?= $order->customer_id ?> <?= $order->customer_name ?></span></a>
                            </td>
                            <td>
                                <span><?= $this->util->formatDat($order->created_at) ?></span>
                            </td>
                            <td class="text-right noenter" width="1%">
                                
                            </td>
                        </tr>
                    <?php } ?>
                <?php } ?>
            </table>
        </div>

        <?= $this->template->pagination($result->total_pages, $result->current, 3) ?>

    <?= $this->template->closePortlet() ?>


			</div>
		</div>
		<div class="clearfix"></div>

	</div>
	<!-- end:: Body -->

</div>
<!-- end:: Page -->
<!-- end::Body -->
</body>

</html>
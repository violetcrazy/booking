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
                Components
            </h4>
            <i class="m-menu__section-icon flaticon-more-v3"></i>
        </li>

    </ul>
</div>
		</div>
		<!-- END: Left Aside -->

		<div class="m-grid__item m-grid__item--fluid m-wrapper">
			<div class="m-content">
				<?= $this->flashSession->output() ?>
                
    <form action="" class="formMain" method="post">
        <div class="actionButton">
            <button class="btn btn-success">Lưu đơn hàng</button>
        </div>
        <hr>
        <div class="row">


            <div class="col-lg-5">
                <div class="m-portlet">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">
                                    Thông tin người mua hàng
                                </h3>
                            </div>
                        </div>
                    </div>

                    <div class="m-portlet__body ">
                        <h5><b>Người mua</b></h5>
                        <?= $this->callMacro('formGroupText', ['billing[name]', ['label' => 'Họ & tên', 'value' => '', 'id' => 'user_name']]) ?>
                        <?= $this->callMacro('formGroupText', ['billing[phone]', ['label' => 'Điện thoại', 'value' => '', 'id' => 'user_phone']]) ?>
                        <?= $this->callMacro('formGroupText', ['billing[email]', ['label' => 'Email', 'value' => '', 'id' => 'user_email']]) ?>
                        <?= $this->callMacro('formGroupText', ['billing[address]', ['label' => 'Địa chỉ', 'value' => '', 'id' => 'user_address']]) ?>
                    </div>

                    <div class="m-portlet__body">
                        <h5><b>Người nhận (nếu có)</b> </h5>
                        <?= $this->callMacro('formGroupText', ['shipping[name]', ['label' => 'Họ & tên', 'value' => '', 'id' => 'user_name']]) ?>
                        <?= $this->callMacro('formGroupText', ['shipping[phone]', ['label' => 'Điện thoại', 'value' => '', 'id' => 'user_phone']]) ?>
                        <?= $this->callMacro('formGroupText', ['shipping[email]', ['label' => 'Email', 'value' => '', 'id' => 'user_email']]) ?>
                        <?= $this->callMacro('formGroupText', ['shipping[address]', ['label' => 'Địa chỉ', 'value' => '', 'id' => 'user_address']]) ?>
                    </div>
                </div>
            </div>


            <div class="col-lg-7">
                <div class="m-portlet">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">
                                    Sản phẩm
                                </h3>
                            </div>
                        </div>
                    </div>

                    <div class="m-portlet__body">
                       <input type="hidden" id="order_detail" name="order_detail">
<div class="groupTotal alert m-alert m-alert--default">
    <table class="table">
        <tbody></tbody>
    </table>
</div>

<div class="table tableItems">
    <div class="pull-left">
        <h5 class="m-portlet__head-text">
            <b>Các Sản phẩm</b>
        </h5>
    </div>
    <div class="pull-right">
        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#model_discount">
            Thêm giảm giá
        </button>
        <button type="button" class="btn btn-focus btn-sm" data-toggle="modal" data-target="#model_fee">
            Thêm phí
        </button>

    </div>
    <div class="clearfix"></div>
    <br>

    <table class="table tableExcel">
        <thead>
        <tr>
            <th>Tên sản phẩm</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
            <th></th>
        </tr>
        </thead>

        <tbody id="itemsLine">
        </tbody>
    </table>

    <table class="table tableExcel">
        <tbody id="">
        <tr class="rowExcel">
            <td colspan="2">
                <input type="text" class="js_product_name" placeholder="Tên sản phẩm"></td>
            <td width="20%">
                <input type="text" class="js_product_price formatCurrency" placeholder="Giá"></td>
            <td width="10%">
                <input type="number" class="js_product_qty" value="1">
                <button
                        type="button"
                        class="btn btn-add-row" onclick="order.addProduct(event, '#itemsLine')">
                    <span class="fa fa-plus"></span>
                </button>
            </td>
        </tr>
        </tbody>
    </table>
</div>



<div style="display: none">
    <table id="temlateItemLine">
        <tbody>
        <tr>
            <td>
                <b>{name}</b>
                <input type="hidden" name="line_item[{index}][name]" value="{name}">
                <input type="hidden" name="line_item[{index}][price]" value="{price}">
                <input type="hidden" name="line_item[{index}][qty]" value="{qty}">
            </td>
            <td><b>{price_format}</b></td>
            <td>
                x {qty}
                <div class="noenter">
                    <button type="button" class="btn btn-metal btn-xs" onclick="order.changeQty(event, '{index}', '-')">Trừ</button>
                    <button type="button" class="btn btn-warning btn-xs" onclick="order.changeQty(event, '{index}', '+')">Cộng</button>
                </div>
            </td>
            <td>
                <b class="">{total_format}</b>
            </td>
            <td width="1%">
                <button class="m-portlet__nav-link btn m-btn m-btn--hover-primary m-btn--icon m-btn--icon-only m-btn--pill"
                        onclick="order.deleteItem(event, '{index}')"
                        type="button"
                        title="Delete">
                    <i class="la la-close"></i>
                </button>
            </td>
        </tr>
        </tbody>
    </table>
</div>
                    </div>
                </div>
            </div>
        </div>
    </form>



    
<div class="modal fade" id="model_fee" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">
                    Thêm chi phí của đơn hàng
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">
                            ×
                        </span>
                </button>
            </div>
            <div class="modal-body">

                <div class="feePlusList" id="feePlusList">
                    <table class="table table-bordered">

                    </table>
                </div>
                <table class="table tableExcel">
                    <tbody id="">
                    <tr class="rowExcel">
                        <td colspan="2">
                            <input type="text" class="js_fee_name" placeholder="Tên, ghi chú khoản phí"></td>
                        <td width="20%">
                            <input type="text" class="formatCurrency js_fee_price" placeholder="Giá trị"></td>
                        <td width="10%">
                            <button type="button"
                                    class="btn btn-add-row"
                                    data-note=".js_fee_name"
                                    data-value=".js_fee_price"
                                    onclick="order.addFee(event, this, '#feePlusList')">
                                <span class="fa fa-plus"></span>
                            </button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    Đóng lại
                </button>
            </div>
        </div>
    </div>
</div>



    
<div class="modal fade" id="model_discount" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="">
                    Giảm giá đơn hàng này
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">
                            ×
                        </span>
                </button>
            </div>
            <div class="modal-body">
                <?= $this->callMacro('formGroupInputVertical', ['discount[value]', ['label' => 'Giảm', 'value' => '', 'id' => 'discount_value', 'type' => 'text', 'class' => 'formatCurrency']]) ?>
                <?= $this->callMacro('formGroupInputVertical', ['discount[note]', ['label' => 'Lý do, Ghi chú', 'value' => '', 'id' => 'discount_note', 'type' => 'textarea']]) ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    Đóng lại
                </button>
                <button type="button" class="btn btn-success"
                        data-value="#discount_value"
                        data-note="#discount_note"
                        data-dismiss="modal"
                        onclick="$(document).trigger('changeDiscount', this)">
                    Lưu thay đổi.
                </button>
            </div>
        </div>
    </div>
</div>


    <script src="<?= $this->url->get() ?>/assets/js/add_order.js"></script>
    <script>
        $(document).ready(function(){
            order.init();
        });
        $(document).on('addFee', function(event, el){
            order.addFee(event, el);
        });
        $(document).on('changeDiscount', function(event, el){
            order.changeDiscount(event, el);
        });
        $(document).on('refreshTotal', function(){
            order.reload();
        });
        $(document).on('input', '#coupon', function(){
            $(document).trigger('updateCoupon')
        });
    </script>

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
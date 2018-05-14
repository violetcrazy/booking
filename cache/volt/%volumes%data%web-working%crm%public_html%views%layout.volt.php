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
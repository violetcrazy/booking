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
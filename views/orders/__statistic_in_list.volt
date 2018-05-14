{{ template.openPortlet({"body_nopadding": true}) }}
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
                {% if (statistic['count'][constant('\Common\Constant::ORDER_STATUS_DEFAULT')] is defined) %}
                    {{ util.currencyFormat(statistic['count'][constant('\Common\Constant::ORDER_STATUS_DEFAULT')]) }}
                {% else  %}
                    0
                {% endif %}
            </b>
            order
        </td>
        <td>
            <b class="text-info m--icon-font-size-lg1">
                {% if (statistic['count'][constant('\Common\Constant::ORDER_STATUS_PROCESSING')] is defined) %}
                    {{ util.currencyFormat(statistic['count'][constant('\Common\Constant::ORDER_STATUS_PROCESSING')]) }}
                {% else  %}
                    0
                {% endif %}
            </b>
            order
        </td>
        <td>
            <b class="text-warning m--icon-font-size-lg1">
                {% if (statistic['count'][constant('\Common\Constant::ORDER_STATUS_SHIPPING')] is defined) %}
                    {{ util.currencyFormat(statistic['count'][constant('\Common\Constant::ORDER_STATUS_SHIPPING')]) }}
                {% else  %}
                    0
                {% endif %}
            </b>
            order
        </td>
        <td>
            <b class="text-success m--icon-font-size-lg1">
                {% if (statistic['count'][constant('\Common\Constant::ORDER_STATUS_COMPLETE')] is defined) %}
                    {{ util.currencyFormat(statistic['count'][constant('\Common\Constant::ORDER_STATUS_COMPLETE')]) }}
                {% else  %}
                    0
                {% endif %}
            </b>
            order
        </td>
        <td>
            <b class="text-primary m--icon-font-size-lg1">
                {% if (statistic['count'][constant('\Common\Constant::ORDER_STATUS_CANCEL')] is defined) %}
                    {{ util.currencyFormat(statistic['count'][constant('\Common\Constant::ORDER_STATUS_CANCEL')]) }}
                {% else  %}
                    0
                {% endif %}
            </b>
            order
        </td>
    </tr>

    <tr class="">
        <td>
            <b class="text-danger m--icon-font-size-lg1">
                {% if (statistic['sum'][constant('\Common\Constant::ORDER_STATUS_DEFAULT')] is defined) %}
                    {{ util.currencyFormat(statistic['sum'][constant('\Common\Constant::ORDER_STATUS_DEFAULT')]) }}
                {% else  %}
                    0
                {% endif %}
            </b> đ
        </td>
        <td>
            <b class="text-info m--icon-font-size-lg1">
                {% if (statistic['sum'][constant('\Common\Constant::ORDER_STATUS_PROCESSING')] is defined) %}
                    {{ util.currencyFormat(statistic['sum'][constant('\Common\Constant::ORDER_STATUS_PROCESSING')]) }}
                {% else  %}
                    0
                {% endif %}
            </b> đ
        </td>
        <td>
            <b class="text-warning m--icon-font-size-lg1">
                {% if (statistic['sum'][constant('\Common\Constant::ORDER_STATUS_SHIPPING')] is defined) %}
                    {{ util.currencyFormat(statistic['sum'][constant('\Common\Constant::ORDER_STATUS_SHIPPING')]) }}
                {% else  %}
                    0
                {% endif %}
            </b> đ
        </td>
        <td>
            <b class="text-success m--icon-font-size-lg1">
                {% if (statistic['sum'][constant('\Common\Constant::ORDER_STATUS_COMPLETE')] is defined) %}
                    {{ util.currencyFormat(statistic['sum'][constant('\Common\Constant::ORDER_STATUS_COMPLETE')]) }}
                {% else  %}
                    0
                {% endif %}
            </b> đ
        </td>
        <td>
            <b class="text-primary m--icon-font-size-lg1">
                {% if (statistic['sum'][constant('\Common\Constant::ORDER_STATUS_CANCEL')] is defined) %}
                    {{ util.currencyFormat(statistic['sum'][constant('\Common\Constant::ORDER_STATUS_CANCEL')]) }}
                {% else  %}
                    0
                {% endif %}
            </b> đ
        </td>
    </tr>

</table>
{{ template.closePortlet() }}
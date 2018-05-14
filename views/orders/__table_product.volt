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
        <tbody id="">
        <tr class="rowExcel">
            <td colspan="2">
                <input type="text"
                       class="js_product_name "
                       placeholder="Tên sản phẩm"
                       onblur="setTimeout(function(){$('.resultProducts').html('')}, 100)"
                       oninput="order.findProduct(event, this)"
                       data-url="{{ url.get({'for': 'wp_ajax_list'}) }}"
                       data-result=".resultProducts">

                <div class="resultProducts">

                </div>

            </td>
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

    <table class="table table-bordered tableExcel m-table m-table--head-bg-accent">
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


</div>





<div style="display: none">
    <table id="temlateItemLine">
        <tbody>
        <tr>
            <td>
                <b><a href="{url}" target="_blank">
                    {name}
                </a></b>
                <input type="hidden" name="line_item[{index}][name]" value="{name}">
                <input type="hidden" name="line_item[{index}][price]" value="{price}">
                <input type="hidden" name="line_item[{index}][qty]" value="{qty}">
                <input type="hidden" name="line_item[{index}][sku]" value="{sku}">
            </td>
            <td><b><a onclick="order.changePriceOfProductPopup(event, '{index}')" href="javascript:;" class="linkPrice">{price_format}</a></b></td>
            <td>
                <input type="number" value="{qty}" class="inputqtyproduct" oninput="order.changeQty(event, '{index}', 'input')">
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


    <div id="templateWidget4">



            <a href="javascript:;" class="m-widget4__item" onclick="order.addProductByJson(event, this)">
                <div class="m-widget4__img m-widget4__img--logo" style="width: 50px; min-height: 40px;">
                    <img src="{image}" alt="" >
                </div>
                <div class="m-widget4__info">
                                <span class="m-widget4__title">
                                    {name}
                                </span>
                    <span class="jsondata m--hide">{jsondata}</span>
                    <br>
                    <span class="m-widget4__sub">
                                    {desc}
                                </span>
                </div>
                <span class="m-widget4__ext">
                                <span class="m-widget4__number m--font-danger">
                                    {price}
                                </span>
                            </span>
            </a>
    </div>



</div>
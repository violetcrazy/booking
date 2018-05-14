{% extends 'main_layout.volt' %}

{% block content %}

    <form action="" class="formMain" method="post">
        <div class="m-portlet--head-solid-bg m-portlet m-portlet--mobile m-portlet--{{ template.getColorStatusOrder(orderDetail.status) }}">

            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">

                        <h3 class="m-portlet__head-text">
                            Chi tiết đơn hàng #{{ orderDetail.order_id }}
                            <small>
                                <b>IP: </b>{{ orderDetail.getIp() }}
                            </small>
                        </h3>

                    </div>
                    <div>
                        <b class="m--icon-font-size-lg1">{{ util.currencyFormat(orderDetail.total_price) }}</b>
                        <span class="m--icon-font-size-sm2"> - {{ orderDetail.payment_title }}</span>
                    </div>
                </div>

                <div class="m-portlet__head-tools">
                    {% if orderDetail.order_id > 0 %}
                        <select onchange="form.submit()" class="form-control m-input m-input--square" id="" name="order_status">
                            {{ template.optionsStatusOrder(orderDetail.status) }}
                        </select>
                    {% endif %}
                </div>

            </div>

            <div class="m-portlet__body">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="form-group m-form__group row">
                            <label for="user_name" class="col-3 col-form-label">
                                Kiotviet
                            </label>

                            <div class="col-9">
                                <b>{{ orderDetail.get_meta('kiotviet_id') }}</b>
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label for="user_name" class="col-3 col-form-label">
                                CSKH
                            </label>

                            <div class="col-9">
                                <select {{ canEditable == false ? 'disabled' : '' }} class="form-control selectCskh" id="" name="seller_id" data-url="{{ url.get({'for': 'user_ajax_list'}) }}">
                                    {% if (seller) %}
                                        <option value="{{ seller['ID'] }}">{{ seller['name'] }} - {{ seller['phone'] }} - {{ seller['address'] }}</option>
                                    {% endif %}
                                </select>
                            </div>
                        </div>

                        <div class="form-group m-form__group row">
                            <label for="user_name" class="col-3 col-form-label">
                                <b>Người mua</b>
                            </label>

                            <div class="col-9">
                                <select {{ canEditable == false ? 'disabled' : '' }}  class="form-control selectCskh" id="" name="customer_id" data-url="{{ url.get({'for': 'user_ajax_list'}) }}">
                                    {% if (customer) %}
                                        <option value="{{ customer['ID'] }}">{{ customer['name'] }} - {{ customer['phone'] }} - {{ customer['address'] }}</option>
                                    {% endif %}
                                </select>

                                <ul class="boxAddress">
                                    <li><input {{ canEditable == false ? 'disabled' : '' }} type="text" name="billing[customer_name]" value="{{ orderDetail.customer_name }}"></li>
                                    <li><input {{ canEditable == false ? 'disabled' : '' }} type="text" name="billing[customer_email]" value="{{ orderDetail.customer_email }}"></li>
                                    <li><input {{ canEditable == false ? 'disabled' : '' }} type="text" name="billing[customer_phone]" value="{{ orderDetail.customer_phone }}"></li>
                                    <li>
                                        <textarea {{ canEditable == false ? 'disabled' : '' }} name="billing[customer_address]" rows="2">{{ orderDetail.customer_address }}</textarea>
                                    </li>
                                </ul>
                            </div>
                        </div>



                        <hr>
                        <h5 class="text-right"><b>Thanh toán</b></h5>
                        {{ orderForm.renderDecoratedInline('payment_title') }}
                        {{ orderForm.renderDecoratedInline('payment_status') }}
                        <hr>
                        <h5 class="text-right"><b>Người nhận</b></h5>
                        {{ formGroupText('shipping[name]', {'label': 'Họ & tên', 'value': orderDetail.getShipping('name'), 'id': 'user_name'}) }}
                        {{ formGroupText('shipping[phone]', {'label': 'Điện thoại', 'value': orderDetail.getShipping('phone'), 'id': 'user_phone'}) }}
                        {{ formGroupText('shipping[email]', {'label': 'Email', 'value': orderDetail.getShipping('email'), 'id': 'user_email'}) }}
                        {{ formGroupText('shipping[address]', {'label': 'Địa chỉ', 'value': orderDetail.getShipping('address'), 'id': 'user_address'}) }}
                    
                        {% if aff_name is defined and aff_name is not empty %}
                            <hr>
                            <div>Người giới thiệu: <b>{{ aff_name }}</b></div>
                        {% endif %}
                    </div>

                    <div class="col-lg-7">
                        {% include 'orders/__table_product.volt' %}
                    </div>
                </div>
            </div>

            <div class="m-form m-portlet__foot m-portlet__foot--fit">
                <div class="m-form__actions m-form__actions text-right">
                    <button type="submit" class="btn btn-lg btn-success" style="width: 200px;">
                        Lưu thay đổi
                    </button>
                </div>
            </div>
        </div>
    </form>

    {% if orderDetail.order_id > 0 %}
        <form action="" onsubmit="order.saveNote(event, '{{ url.get({'for': 'order_addnote_ajax'}) }}')">
            <div class="m-portlet m-portlet--full-height " id="formNote">

                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                Ghi chú đơn hàng
                            </h3>
                        </div>
                    </div>
                </div>

                <div class="m-portlet__body">

                    <div class="form-group m-form__group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <label class="m-checkbox m-checkbox--single">
                                        <input type="checkbox" name="note_type" value="on">
                                        <span></span>
                                    </label>
                                </span>
                                <span class="input-group-text" id="basic-addon1">
                                    Chung
                                </span>
                            </div>

                            <input type="text" class="form-control" placeholder="Ghi chú đơn hàng" name="note_content">
                            <input type="hidden" name="order_id" value="{{ orderDetail.order_id }}">
                            <div class="input-group-append">
                                <button class="btn btn-primary loading-click" type="submit" data-target="#formNote">
                                    Thêm ghi chú
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="m-widget3" id="orderNotes">

                    </div>
                </div>
            </div>
        </form>
    {% endif %}

    {% include 'orders/__popup_template.volt' %}
    
    <script type="text/javascript">
        var urls = {
            'add_note': '{{ url.get({'for': 'order_addnote_ajax'}) }}'
        }
    </script>
    <script src="{{ url.get() }}/assets/js/add_order.js"></script>
    <script>
        $(document).ready(function(){
            order.itemsline = {{ orderDetail.getItems('JSON') }};
            order.discount = '{{ orderDetail.get_meta('discount') }}';
            order.order_id = '{{ orderDetail.order_id }}';
            order.discount_note = '{{ orderDetail.get_meta('discount_note') }}';
            order.fee = {{ orderDetail.get_meta('fee_plus')|json_encode }};
            order.init();

            $(document).trigger('loadNotes');
        });
        $(document).on('loadNotes', function(event, el){
            $('#orderNotes').load('{{ url.get({'for': 'order_notes_ajax'}) }}?order_id={{ orderDetail.order_id }}');
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
{% endblock %}
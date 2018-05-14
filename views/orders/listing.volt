{% extends 'main_layout.volt' %}

{% block content %}

    {% include 'orders/__statistic_in_list.volt' %}

    {{ template.openPortlet({"title": "Các đơn hàng", "sub_title": "Tổng cộng <b>" ~ result.total_items ~ "</b> đơn hàng"}) }}

        <div class="topFilter m--margin-bottom-20">
            <form action="" class="">
                <div class="row">
                    <div class="col-md-4 col-lg-3">
                        <input type="number" value="{{ request.getQuery('order_id', ['int'], '') }}" name="order_id" class="form-control" placeholder="ID đơn hàng">
                    </div>
                    <div class="col-md-4 col-lg-3">
                        <select name="date_range" id="" class="form-control" onchange="form.submit()">
                            <option {{ request.getQuery('date_range', ['striptags', 'trim'], '') == "" ? "selected" : "" }} value="">Chọn ngày</option>
                            <option {{ request.getQuery('date_range', ['striptags', 'trim'], '') == "now" ? "selected" : "" }} value="now">Trong ngày</option>
                            <option {{ request.getQuery('date_range', ['striptags', 'trim'], '') == "star_week" ? "selected" : "" }} value="star_week">Từ thứ 2</option>
                            <option {{ request.getQuery('date_range', ['striptags', 'trim'], '') == "star_month" ? "selected" : "" }} value="star_month">Từ đầu tháng (ngày 1)</option>
                            <option {{ request.getQuery('date_range', ['striptags', 'trim'], '') == "7dayago" ? "selected" : "" }} value="7dayago">7 ngày trước</option>
                            <option {{ request.getQuery('date_range', ['striptags', 'trim'], '') == "15dayago" ? "selected" : "" }} value="15dayago">15 ngày trước</option>
                            <option {{ request.getQuery('date_range', ['striptags', 'trim'], '') == "30dayago" ? "selected" : "" }} value="30dayago">30 ngày trước</option>
                        </select>
                    </div>
                    <div class="col-md-4 col-lg-3">
                        <select name="status" id="" class="form-control" onchange="form.submit()">
                            {{ template.optionsStatusOrder(request.getQuery('status')) }}
                        </select>
                    </div>
                    <div class="col-md-4 col-lg-3">
                        <select name="sort" id="" class="form-control" onchange="form.submit()">
                            <option value="">Sắp xếp</option>
                            <option {{ request.getQuery('sort', ['striptags', 'trim'], '') == "create" ? "selected" : "" }} value="create">Ngày tạo</option>
                            <option {{ request.getQuery('sort', ['striptags', 'trim'], '') == "update" ? "selected" : "" }} value="update">Ngày cập nhật</option>
                        </select>
                    </div>
                </div>

                <div class="row m--margin-top-15">
                    <div class="col-md-4 col-lg-3">
                        <div>Người phụ trách</div>
                        <select class="form-control selectCskh" id="" name="seller_id" data-url="{{ url.get({'for': 'user_ajax_list'}) }}">
                            {% if (seller is defined) %}
                                <option value="{{ seller['ID'] }}">{{ seller['name'] }} - {{ seller['phone'] }} - {{ seller['address'] }}</option>
                            {% endif %}
                        </select>
                    </div>
                    <div class="col-md-4 col-lg-3">
                        <div>Khách hàng</div>
                        <select class="form-control selectCskh" id="" name="customer_id" data-url="{{ url.get({'for': 'user_ajax_list'}) }}">
                            {% if (customer is defined) %}
                                <option value="{{ customer['ID'] }}">{{ customer['name'] }} - {{ customer['phone'] }} - {{ customer['address'] }}</option>
                            {% endif %}
                        </select>
                    </div>
                    <div class="col-md-4 col-lg-3">
                        <div>Nhân viên tiếp thị</div>
                        <select class="form-control selectCskh" id="" name="aff_id" data-url="{{ url.get({'for': 'user_ajax_list'}) }}">
                            {% if (aff is defined) %}
                                <option value="{{ aff['ID'] }}">{{ aff['name'] }} - {{ aff['phone'] }} - {{ aff['address'] }}</option>
                            {% endif %}
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
                {% if result.total_items > 0 %}
                    {% for order in result.items %}
                        <tr data-row="0" class="">

                            <td style="width: 1%">
                                <label class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand">
                                    <input type="checkbox" value="15">
                                    <span></span>
                                </label>
                            </td>
                            <td width="1%">
                                <span class="noenter">{{ order.getStatusHtml() }}</span>
                            </td>
                            <td>
                                <span style="width: 150px;">
                                    <a href="{{ url.get({'for': 'order_edit', 'id': order.order_id}) }}">
                                        <b class="m--icon-font-size-lg1">#{{ order.order_id }}</b> 
                                        {{ order.getIp() }}
                                        <br>
                                        #{{ order.get_meta('kiotviet_id') }}
                                    </a>
                                </span>
                            </td>
                            <td>
                                <b class="m--font-danger m--icon-font-size-lg1">
                                    {{ util.currencyFormat(order.total_price) }}
                                </b>
                                (<b class="m--icon-font-size-sm2">{{ order.total_qty }}</b> sản phẩm)
                            </td>
                            <td>
                                <a href=""><span>#{{ order.customer_id }} {{ order.customer_name }}</span></a>
                            </td>
                            <td>
                                <span>{{ util.formatDat(order.created_at) }}</span>
                            </td>
                            <td class="text-right noenter" width="1%">
                                {#
                                <button class="m-portlet__nav-link btn m-btn m-btn--hover-{{ template.getColorStatusOrder(constant('\Common\Constant::ORDER_STATUS_PROCESSING')) }} m-btn--icon m-btn--icon-only m-btn--pill"
                                        title="Delete">
                                    <i class="la 	la-spinner"></i>
                                </button>
                                <button class="m-portlet__nav-link btn m-btn m-btn--hover-{{ template.getColorStatusOrder(constant('\Common\Constant::ORDER_STATUS_COMPLETE')) }} m-btn--icon m-btn--icon-only m-btn--pill"
                                        title="Edit details">
                                    <i class="la 	la-chevron-down"></i>
                                </button>
                                <button class="m-portlet__nav-link btn m-btn m-btn--hover-{{ template.getColorStatusOrder(constant('\Common\Constant::ORDER_STATUS_CANCEL')) }} m-btn--icon m-btn--icon-only m-btn--pill"
                                        title="Delete">
                                    <i class="la la-close"></i>
                                </button>
                                #}
                            </td>
                        </tr>
                    {% endfor %}
                {% endif %}
            </table>
        </div>

        {{ template.pagination(result.total_pages , result.current, 3) }}

    {{ template.closePortlet() }}

{% endblock %}
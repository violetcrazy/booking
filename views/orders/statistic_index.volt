{% extends 'main_layout.volt' %}

{% block content %}

    <div class="row">
        <div class="col-lg-6">
            {{ template.openPortlet({"title": "Doanh số", "body_nopadding": true}) }}
            <div class="m-widget1">
                <div class="m-widget1__item">
                    <div class="row m-row--no-padding align-items-center">
                        <div class="col">
                            <h3 class="m-widget1__title">
                                Đơn hoàn thành
                            </h3>
                            <span class="m-widget1__desc">
															Tổng doanh số đơn hàng đã hoàn thành
														</span>
                        </div>
                        <div class="col m--align-right">
														<span class="m-widget1__number m--font-brand">
															500.000.000
														</span>
                        </div>
                    </div>
                </div>
                <div class="m-widget1__item">
                    <div class="row m-row--no-padding align-items-center">
                        <div class="col">
                            <h3 class="m-widget1__title">
                                Tổng đơn
                            </h3>
                            <span class="m-widget1__desc">
															Weekly Customer Orders
														</span>
                        </div>
                        <div class="col m--align-right">
														<span class="m-widget1__number m--font-danger">
															1.000.000.000
														</span>
                        </div>
                    </div>
                </div>

            </div>
            {{ template.closePortlet() }}
        </div>
        <div class="col-lg-6">
            {{ template.openPortlet({"title": "Số lượng", "body_nopadding": true}) }}
            <div class="m-widget1">
                <div class="m-widget1__item">
                    <div class="row m-row--no-padding align-items-center">
                        <div class="col">
                            <h3 class="m-widget1__title">
                                Tổng đơn
                            </h3>
                        </div>
                        <div class="col m--align-right">
                            <span class="m-widget1__number m--font-brand">
                                5000
                            </span>
                        </div>
                    </div>
                </div>
                <div class="m-widget1__item">
                    <div class="row m-row--no-padding align-items-center">
                        <div class="col">
                            <h3 class="m-widget1__title">
                                Đã hoàn thành
                            </h3>
                        </div>
                        <div class="col m--align-right">
                            <span class="m-widget1__number m--font-danger">
                                250
                            </span>
                        </div>
                    </div>
                </div>
                <div class="m-widget1__item">
                    <div class="row m-row--no-padding align-items-center">
                        <div class="col">
                            <h3 class="m-widget1__title">
                                Đang xử lý
                            </h3>
                        </div>
                        <div class="col m--align-right">
                            <span class="m-widget1__number m--font-danger">
                                100
                            </span>
                        </div>
                    </div>
                </div>

            </div>
            {{ template.closePortlet() }}
        </div>
    </div>



{% endblock %}

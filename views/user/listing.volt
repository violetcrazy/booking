{% extends 'main_layout.volt' %}

{% block content %}



    <div class=" m--margin-bottom-20">
        <a href="" class="btn btn-accent m-btn m-btn--icon">
            <span>
                <i class="fa flaticon-add-circular-button"></i>
                <span>Thêm người dùng</span>
            </span>
        </a>
    </div>
    <div class="m-portlet m-portlet--full-height ">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        Danh sách người dùng ({{ users.total_items }})
                    </h3>
                </div>
            </div>
            <div class="m-portlet__head-tools">
                <form action="">
                    <ul class="nav nav-pills nav-pills--brand m-nav-pills--align-right m-nav-pills--btn-pill m-nav-pills--btn-sm" role="tablist">
                        <li class="nav-item m-tabs__item">
                            <input type="text" style="width: 150px;" class="form-control">
                        </li>
                        <li class="nav-item m-tabs__item">
                            <select name="role" style="width: 150px" id="" class="form-control" onchange="form.submit()">
                                <option value="">Chọn vai trò</option>
                                {{ template.optionsStatusUser(request.getQuery('role', ['striptags', 'trim'], '')) }}
                            </select>
                        </li>
                        <li class="nav-item m-tabs__item">
                            <select name="" style="width: 150px" id="" class="form-control">
                                <option value="">Chọn Nhãn khách hàng</option>
                            </select>
                        </li>
                        <li class="nav-item m-tabs__item">
                            <button class="btn btn-success">Tìm kiếm</button>
                        </li>
                    </ul>
                </form>
            </div>
        </div>
        <div class="m-portlet__body">
            <div class="tab-content">
                <div class="tab-pane active" id="m_widget4_tab1_content">
                    <!--begin::Widget 14-->
                    <div class="m-widget4">
                        {% for user in users.result %}
                            <!--begin::Widget 14 Item-->

                            <div class="m-widget4__item">
                                <div class="m-widget4__img m-widget4__img--pic">
                                    <a href="{{ url.get({'for': 'user_profile_edit', 'id': user.ID}) }}">
                                        <img src="{{ user.getAvatar() }}" alt="">

                                    </a>
                                </div>
                                <div class="m-widget4__info">
                                    <a href="{{ url.get({'for': 'user_profile_edit', 'id': user.ID}) }}">
                                        <span class="m-widget4__title">
                                        #{{ user.ID }} {{ user.getName() }}
                                        </span>
                                    </a>
                                    <br>
                                    <span class="m-widget4__sub">
                                    {{ user.getEmail() }}
                                </span>
                                </div>
                                <div class="m-widget4__ext">
                                    {{ user.getLabelHtml() }}
                                </div>
                            </div>
                            <!--end::Widget 14 Item-->
                        {% endfor %}

                        <hr>

                        {{ template.pagination(users.total_pages , users.current, 3) }}
                    </div>
                    <!--end::Widget 14-->
                </div>
            </div>
        </div>
    </div>
{% endblock %}
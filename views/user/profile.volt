{% extends 'main_layout.volt' %}

{% block content %}

    <div class="m-content">
        <div class="row">
            {% if user is not empty %}
                <div class="col-xl-3 col-lg-4">
                <div class="m-portlet m-portlet--full-height  ">
                    <div class="m-portlet__body">

                        <div class="m-card-profile">
                            <div class="m-card-profile__title m--hide">
                                Thông tin tài khoản
                            </div>
                            <div class="m-card-profile__pic">
                                <div class="m-card-profile__pic-wrapper">
                                    <img src="{{ user.getAvatar() }}" alt=""/>
                                </div>
                            </div>
                            <div class="m-card-profile__details">
                                <span class="m-card-profile__name">
                                    {{ user.getName() }}
                                </span>
                                <a href="mailto:{{ user.getEmail() }}" class="m-card-profile__email m-link">
                                    {{ user.getEmail() }}
                                </a>

                                <b class="m-badge m-badge--danger m-badge--wide">
                                    {{ user.getPhone() }}
                                </b>
                            </div>
                        </div>

                        <ul class="m-nav m-nav--hover-bg m-portlet-fit--sides">
                            <li class="m-nav__separator m-nav__separator--fit"></li>
                            <li class="m-nav__section m--hide">
                                <span class="m-nav__section-text">
                                    Section
                                </span>
                            </li>
                            <li class="m-nav__item">
                                <a href="" class="m-nav__link">
                                    <i class="m-nav__link-icon flaticon-profile-1"></i>
                                    <span class="m-nav__link-text">
                                        Thông tin tài khoản
                                    </span>
                                </a>
                            </li>
                            <li class="m-nav__item">
                                <a href="" class="m-nav__link">
                                    <i class="m-nav__link-icon flaticon-cart"></i>
                                    <span class="m-nav__link-text">
                                        Lịch sử mua hàng
                                    </span>
                                </a>
                            </li>
                        </ul>
                        <div class="m-portlet__body-separator"></div>
                        <div class="m-widget1 m-widget1--paddingless">
                            <!-- <div class="m-widget1__item">
                                <div class="row m-row--no-padding align-items-center">
                                    <div class="col">
                                        <h3 class="m-widget1__title">
                                            Doanh số
                                        </h3>
                                        <span class="m-widget1__desc">
                                            Tổng giá trị các đơn hàng đã mua thành công
                                        </span>
                                    </div>
                                    <div class="col m--align-right">
                                        <span class="m-widget1__number m--font-brand">
                                            +$17,800
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="m-widget1__item">
                                <div class="row m-row--no-padding align-items-center">
                                    <div class="col">
                                        <h3 class="m-widget1__title">
                                            Đơn hàng
                                        </h3>
                                        <span class="m-widget1__desc">
                                            Tổng số đơn hàng đã mua thành công
                                        </span>
                                    </div>
                                    <div class="col m--align-right">
                                        <span class="m-widget1__number m--font-danger">
                                            +1,800
                                        </span>
                                    </div>
                                </div>
                            </div> -->

                        </div>
                    </div>
                </div>
            </div>
            {% endif %}

            <div class="col-xl-9 col-lg-8">
                <div class="m-portlet m-portlet--full-height m-portlet--tabs  ">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-tools">
                            <ul class="nav nav-tabs m-tabs m-tabs-line   m-tabs-line--left m-tabs-line--primary" role="tablist">
                                <li class="nav-item m-tabs__item">
                                    <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_user_profile_tab_1" role="tab">
                                        <i class="flaticon-share m--hide"></i>
                                        Thông tin tài khoản
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane active" id="m_user_profile_tab_1">
                            <form class="m-form m-form--fit m-form--label-align-right" method="post">
                                <div class="m-portlet__body">
                                    {{ form.renderDecoratedInline('ID') }}
                                    {{ form.renderDecoratedInline('user_login') }}
                                    {{ form.renderDecoratedInline('display_name') }}
                                    {{ form.renderDecoratedInline('user_nicename') }}
                                    {{ form.renderDecoratedInline('user_phone') }}
                                    {{ form.renderDecoratedInline('user_email') }}
                                    {{ form.renderDecoratedInline('user_address') }}

                                    <hr>

                                    <div class="form-group m-form__group row">
                                        <label class="col-3 col-form-label" for="user_phone">Vai trò / Chức vụ</label>
                                        <div class="col-9">
                                            <select name="role[]" id="" class="form-control enSelect2" multiple>
                                                {{ template.optionsStatusUser( user is defined ? user.getMeta('role', false) : '' ) }}
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="m-portlet__foot m-portlet__foot--fit">
                                    <div class="m-form__actions">
                                        <div class="row">
                                            <div class="col-3"></div>
                                            <div class="col-8">
                                                <button type="submit" class="btn btn-accent m-btn m-btn--air m-btn--custom">
                                                    Lưu thay đổi
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
{% endblock %}
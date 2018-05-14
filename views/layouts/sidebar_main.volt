<div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark " data-menu-vertical="true"
     data-menu-scrollable="false" data-menu-dropdown-timeout="500">
    <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
        {% for menuItem in main_menu[0] %}
            {% set hasSub = main_menu[menuItem['name']] is defined ? true : false  %}
            <li class="m-menu__item {{ hasSub ? 'm-menu__item--submenu' : '' }} " aria-haspopup="true"  data-menu-submenu-toggle="hover">
                {#m-menu__item--active#}
                <a href="{{ main_menu[menuItem['name']] is defined ? 'javascript:;' : menuItem['url'] }}"
                   class="m-menu__link {{ hasSub ? 'm-menu__toggle' : '' }}"
                    {{ hasSub ? 'data-menu-submenu-toggle="click" data-redirect="true" aria-haspopup="true"' : '' }}
                >
                    <i class="m-menu__link-icon {{ menuItem['icon_menu'] }}"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">
                                {{ menuItem['title_menu'] }}
                            </span>

                            {% if hasSub %}
                                <i class="m-menu__hor-arrow la la-angle-down"></i>
                                <i class="m-menu__ver-arrow la la-angle-right"></i>
                            {% endif %}
                        </span>
                    </span>
                </a>

                {% if main_menu[menuItem['name']] is defined %}
                    <div class="m-menu__submenu m-menu__submenu m-menu__submenu--classic m-menu__submenu--left">
                        <span class="m-menu__arrow m-menu__arrow--adjust"></span>
                        <ul class="m-menu__subnav">
                            <li class="m-menu__item" aria-haspopup="true">
                                <a href="{{ menuItem['url'] }}" class="m-menu__link ">
                                    <i class="m-menu__link-icon {{ menuItem['icon_menu'] }}"></i>
                                    <span class="m-menu__link-title">
                                        <span class="m-menu__link-wrap">
                                            <span class="m-menu__link-text">
                                                {{ menuItem['title_menu'] }}
                                            </span>
                                        </span>
                                    </span>
                                </a>
                            </li>
                            {% for menuSubItem in main_menu[menuItem['name']] %}
                            <li class="m-menu__item" aria-haspopup="true">
                                <a href="{{ menuSubItem['url'] }}" class="m-menu__link ">
                                    <i class="m-menu__link-icon {{ menuSubItem['icon_menu'] }}"></i>
                                    <span class="m-menu__link-title">
                                        <span class="m-menu__link-wrap">
                                            <span class="m-menu__link-text">
                                                {{ menuSubItem['title_menu'] }}
                                            </span>
                                        </span>
                                    </span>
                                </a>
                            </li>
                            {% endfor %}
                        </ul>
                    </div>
                {% endif %}
            </li>
        {% endfor %}

        <li class="m-menu__section">
            <h4 class="m-menu__section-text">
                Quick Action
            </h4>
            <i class="m-menu__section-icon flaticon-more-v3"></i>
        </li>

        <li class="m-menu__item">
            <a href="#" class="m-menu__link ">
                <i class="m-menu__link-icon flaticon-user-add"></i>
                <span class="m-menu__link-title">
                    <span class="m-menu__link-wrap">
                        <span class="m-menu__link-text">
                            Tạo Tài khoản
                        </span>
                    </span>
                </span>
            </a>
        </li>

    </ul>
</div>
<div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark " data-menu-vertical="true"
     data-menu-scrollable="false" data-menu-dropdown-timeout="500">
    <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
        <?php foreach ($main_menu[0] as $menuItem) { ?>
            <?php $hasSub = (isset($main_menu[$menuItem['name']]) ? true : false); ?>
            <li class="m-menu__item <?= ($hasSub ? 'm-menu__item--submenu' : '') ?> " aria-haspopup="true"  data-menu-submenu-toggle="hover">
                
                <a href="<?= (isset($main_menu[$menuItem['name']]) ? 'javascript:;' : $menuItem['url']) ?>"
                   class="m-menu__link <?= ($hasSub ? 'm-menu__toggle' : '') ?>"
                    <?= ($hasSub ? 'data-menu-submenu-toggle="click" data-redirect="true" aria-haspopup="true"' : '') ?>
                >
                    <i class="m-menu__link-icon <?= $menuItem['icon_menu'] ?>"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">
                                <?= $menuItem['title_menu'] ?>
                            </span>

                            <?php if ($hasSub) { ?>
                                <i class="m-menu__hor-arrow la la-angle-down"></i>
                                <i class="m-menu__ver-arrow la la-angle-right"></i>
                            <?php } ?>
                        </span>
                    </span>
                </a>

                <?php if (isset($main_menu[$menuItem['name']])) { ?>
                    <div class="m-menu__submenu m-menu__submenu m-menu__submenu--classic m-menu__submenu--left">
                        <span class="m-menu__arrow m-menu__arrow--adjust"></span>
                        <ul class="m-menu__subnav">
                            <li class="m-menu__item" aria-haspopup="true">
                                <a href="<?= $menuItem['url'] ?>" class="m-menu__link ">
                                    <i class="m-menu__link-icon <?= $menuItem['icon_menu'] ?>"></i>
                                    <span class="m-menu__link-title">
                                        <span class="m-menu__link-wrap">
                                            <span class="m-menu__link-text">
                                                <?= $menuItem['title_menu'] ?>
                                            </span>
                                        </span>
                                    </span>
                                </a>
                            </li>
                            <?php foreach ($main_menu[$menuItem['name']] as $menuSubItem) { ?>
                            <li class="m-menu__item" aria-haspopup="true">
                                <a href="<?= $menuSubItem['url'] ?>" class="m-menu__link ">
                                    <i class="m-menu__link-icon <?= $menuSubItem['icon_menu'] ?>"></i>
                                    <span class="m-menu__link-title">
                                        <span class="m-menu__link-wrap">
                                            <span class="m-menu__link-text">
                                                <?= $menuSubItem['title_menu'] ?>
                                            </span>
                                        </span>
                                    </span>
                                </a>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                <?php } ?>
            </li>
        <?php } ?>

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
<?
use Prymery\App;

$isMainPage = CSite::InDir('/index.php');

$headCssClass = $isMainPage ? ' header_homepage' : '';
?>

<header class="header<?= $headCssClass ?>">
    <div class="header-top">
        <div class="container header-top-container">
            <div class="header-top-item header-top-social">
                <?App::Include('header/socials')?>
            </div>
            <div class="header-top-item header-top__text">
                <?App::Include('header/mode', true, [], false)?>
            </div>
            <div class="header-top-item header-top-contacts">
                <?App::Include('header/tel', true, [], false)?>
            </div>
        </div>
    </div>
    <div class="header-float">
        <div class="container header-container">
            <div class="header-toggle-container">
                <button class="header__toggle" type="button">
                    <span class="header-burger">
                        <span class="header-burger__line"></span>
                    </span>
                    <span class="header__toggle-text">Каталог</span>
                </button>
            </div>
            <div class="header-logo">
                <svg xmlns="http://www.w3.org/2000/svg" width="90" height="37" fill="none" viewBox="0 0 90 37">
                    <path fill="#242424"
                          d="M0 .256h7.781V1.63H1.543v5.495h6.013V8.5H1.543v6.966H0V.255ZM10.61.256h1.512v35.019h6.335v1.406H10.61V.256ZM31.768 7.828c0 1.438-.353 2.748-1.093 3.962s-1.704 2.173-2.958 2.876a8.121 8.121 0 0 1-4.02 1.054 8.003 8.003 0 0 1-3.986-1.054c-1.254-.703-2.251-1.63-2.99-2.844a7.247 7.247 0 0 1-1.126-3.898c0-1.406.353-2.78 1.093-3.962.74-1.214 1.704-2.173 2.958-2.876C20.9.383 22.251 0 23.698 0a7.83 7.83 0 0 1 3.987 1.054c1.254.703 2.25 1.63 2.99 2.844a7.275 7.275 0 0 1 1.126 3.93h-.032Zm-8.07-6.358c-1.19 0-2.283.287-3.28.862a6.815 6.815 0 0 0-2.412 2.365 6.313 6.313 0 0 0-.868 3.227c0 1.15.29 2.205.9 3.163a6.742 6.742 0 0 0 2.444 2.3c1.03.576 2.09.863 3.216.863a6.18 6.18 0 0 0 2.508-.51 6.246 6.246 0 0 0 2.09-1.375c.61-.575 1.06-1.278 1.415-2.045.321-.798.514-1.63.514-2.492 0-1.15-.29-2.205-.9-3.163a6.387 6.387 0 0 0-2.412-2.3 6.385 6.385 0 0 0-3.215-.863V1.47ZM32.797.256h1.576l3.762 13.26L41.801.255h1.447l3.665 13.228L50.675.256h1.576L47.91 15.465h-2.026L42.54 2.97l-3.376 12.494h-2.026L32.798.255ZM55.37.256h8.36V1.63h-6.817v5.463h6.592v1.374h-6.592v5.624h6.817v1.374h-8.36V.255ZM67.814.256h3.633c.965 0 1.8.032 2.476.127.675.096 1.318.288 1.865.608.772.447 1.35 1.022 1.768 1.757.418.735.611 1.565.611 2.46 0 .799-.193 1.566-.61 2.269a4.79 4.79 0 0 1-1.64 1.661 4.746 4.746 0 0 1-2.284.671l4.31 5.688h-1.898l-5.209-6.902h.45c.74 0 1.383 0 1.897-.064.515-.032.997-.16 1.447-.351a3.335 3.335 0 0 0 1.48-1.246c.353-.544.514-1.15.514-1.854 0-.543-.129-1.054-.386-1.533a3.358 3.358 0 0 0-1.029-1.183 3.594 3.594 0 0 0-1.447-.607 16 16 0 0 0-1.993-.127h-2.412v13.835h-1.543V.255ZM82.219 11.183c0 .543.16 1.055.418 1.534.257.479.643.83 1.093 1.118.45.288.965.415 1.543.415a3.41 3.41 0 0 0 1.608-.383 2.902 2.902 0 0 0 1.158-1.086c.289-.448.418-.959.418-1.534 0-.415-.097-.799-.29-1.182a2.833 2.833 0 0 0-.772-.959 4.827 4.827 0 0 0-1.028-.607 11.631 11.631 0 0 0-1.35-.415c-.644-.16-1.19-.352-1.576-.48a4.037 4.037 0 0 1-1.126-.67c-.868-.735-1.286-1.662-1.286-2.844 0-.799.193-1.502.579-2.141.386-.607.9-1.118 1.575-1.438C83.858.16 84.566 0 85.37 0c.804 0 1.479.192 2.122.543a4.083 4.083 0 0 1 1.543 1.502c.386.639.58 1.31.58 2.077h-1.609a2.87 2.87 0 0 0-.418-1.374 2.6 2.6 0 0 0-.996-.959 2.864 2.864 0 0 0-1.383-.351 2.62 2.62 0 0 0-1.318.351c-.418.256-.708.575-.965.959a2.762 2.762 0 0 0-.354 1.31c0 .575.129 1.022.418 1.374.29.351.611.607 1.03.799.417.16.932.351 1.575.51.804.224 1.415.416 1.8.544.386.16.772.383 1.158.735.45.383.804.863 1.061 1.438.257.575.386 1.15.386 1.757 0 .83-.225 1.566-.643 2.237a4.537 4.537 0 0 1-1.704 1.597 4.78 4.78 0 0 1-2.315.575c-.836 0-1.64-.191-2.38-.575-.74-.383-1.286-.926-1.736-1.63a4.464 4.464 0 0 1-.643-2.332h1.64v.096ZM37.813 29.108c0 1.438-.353 2.748-1.093 3.962s-1.704 2.173-2.958 2.876A8.033 8.033 0 0 1 29.742 37c-1.446 0-2.732-.351-3.986-1.054-1.254-.703-2.251-1.63-2.99-2.844a7.247 7.247 0 0 1-1.126-3.898c0-1.406.354-2.78 1.093-3.962.74-1.214 1.704-2.173 2.958-2.876a8.12 8.12 0 0 1 4.02-1.054c1.414 0 2.765.351 3.987 1.054 1.254.703 2.25 1.63 2.99 2.844.74 1.214 1.125 2.492 1.125 3.93v-.032Zm-8.07-6.358c-1.19 0-2.283.287-3.28.862a6.814 6.814 0 0 0-2.412 2.365 6.313 6.313 0 0 0-.868 3.227c0 1.15.29 2.204.9 3.163a6.743 6.743 0 0 0 2.444 2.3c1.03.576 2.09.863 3.216.863a6.18 6.18 0 0 0 2.508-.511 6.244 6.244 0 0 0 2.09-1.374c.61-.575 1.06-1.278 1.415-2.077.321-.799.514-1.63.514-2.492 0-1.15-.29-2.205-.9-3.163-.611-.959-1.415-1.758-2.412-2.3a6.385 6.385 0 0 0-3.215-.863ZM38.553 21.535h1.672l5.37 13.292 5.402-13.292h1.672l-6.335 15.21h-1.479l-6.302-15.21ZM55.37 21.535h8.392v1.374h-6.849v5.464h6.592v1.374h-6.592v5.623h6.85v1.374H55.37V21.535ZM67.814 21.535h3.633c.965 0 1.8.032 2.476.128.675.096 1.318.288 1.865.607.772.448 1.35 1.023 1.768 1.758.418.735.611 1.565.611 2.46 0 .799-.193 1.566-.61 2.268a4.79 4.79 0 0 1-1.64 1.662 4.746 4.746 0 0 1-2.284.67l4.31 5.688h-1.898l-5.209-6.901h.45c.74 0 1.383 0 1.897-.064.515-.064.997-.16 1.447-.352a3.335 3.335 0 0 0 1.48-1.246c.353-.543.514-1.15.514-1.853 0-.543-.129-1.054-.386-1.534a3.358 3.358 0 0 0-1.029-1.182 3.595 3.595 0 0 0-1.447-.607 16 16 0 0 0-1.993-.128h-2.412v13.835h-1.543V21.535ZM82.219 32.463c0 .543.16 1.054.418 1.533.257.48.643.831 1.093 1.119.45.287.965.415 1.543.415a3.41 3.41 0 0 0 1.608-.383 2.901 2.901 0 0 0 1.158-1.087c.289-.447.418-.99.418-1.533 0-.416-.097-.799-.29-1.182a2.832 2.832 0 0 0-.772-.959 4.83 4.83 0 0 0-1.028-.607 11.652 11.652 0 0 0-1.35-.416c-.644-.16-1.19-.35-1.576-.479a4.037 4.037 0 0 1-1.126-.67c-.868-.736-1.286-1.662-1.286-2.844 0-.8.193-1.502.579-2.141.386-.607.9-1.119 1.575-1.438.675-.352 1.383-.511 2.187-.511.804 0 1.479.191 2.122.543a4.083 4.083 0 0 1 1.543 1.502c.386.639.58 1.31.58 2.076h-1.609a2.87 2.87 0 0 0-.418-1.373 2.6 2.6 0 0 0-.996-.959 2.864 2.864 0 0 0-1.383-.351c-.482 0-.933.127-1.318.351-.418.256-.708.575-.965.959a2.762 2.762 0 0 0-.354 1.31c0 .575.129 1.022.418 1.374.29.351.611.607 1.03.798.417.16.932.352 1.575.512.804.223 1.415.415 1.8.543.386.16.772.383 1.158.735.45.383.804.862 1.061 1.438.257.575.386 1.15.386 1.757 0 .83-.225 1.565-.643 2.236a4.537 4.537 0 0 1-1.704 1.598 4.78 4.78 0 0 1-2.315.575c-.836 0-1.64-.192-2.38-.575-.74-.383-1.286-.927-1.736-1.63a4.464 4.464 0 0 1-.643-2.332h1.64v.096Z" />
                </svg>
                <? if (!$isMainPage) : ?>
                    <a href="/" class="link-as-card"></a>
                <? endif; ?>
            </div>
            <div class="header-menu-and-toolbar">
                <?App::Include('header/menu')?>
                <div class="header-toolbar">
                    <?App::Include('header/search-toggle')?>
                    <?App::Include('header/personal', true, [], false)?>
                    <?App::Include('header/cart', true, [], false)?>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="header-modal-overlay"></div>
<div class="header-modal">
    <div class="container header-modal-container">
        <div class="header-modal-top">
            <div class="header-modal__title">Каталог</div>
            <button class="header-modal__close" type="button">
                <svg xmlns="http://www.w3.org/2000/svg" width="27" height="26" fill="none" viewBox="0 0 27 26">
                    <path stroke="#242424" stroke-linecap="round" stroke-width=".7"
                          d="M6.707 4.04 26 23.335M26 3.743 6.707 23.036" />
                </svg>
            </button>
        </div>
        <div class="header-modal-content">
            <div class="header-modal-menu-wrapper">
                <div class="header-modal-menu">
                    <div class="header-modal-menu-col">
                        <div class="header-modal-menu-section">
                            <div class="header-modal-menu-section-top">
                                <div class="header-modal-menu-section-top__title">Всегда актуальные</div>
                                <div class="header-modal-menu-section-top__icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="9" fill="none" viewBox="0 0 17 9">
                                        <path stroke="#242424" stroke-linecap="round" stroke-miterlimit="10" stroke-width=".6"
                                              d="m1 .829 7.229 7.229c.15.15.391.15.542 0L16 .829" />
                                    </svg>
                                </div>
                            </div>
                            <div class="header-modal-menu-section-hidden">
                                <div class="header-modal-menu-list">
                                    <div class="header-modal-menu-item">
                                        <a href="#" class="header-modal-menu-item__link">Express-доставка</a>
                                    </div>
                                    <div class="header-modal-menu-item">
                                        <a href="#" class="header-modal-menu-item__link">Бестселлеры</a>
                                    </div>
                                    <div class="header-modal-menu-item">
                                        <a href="#" class="header-modal-menu-item__link">Авторские</a>
                                    </div>
                                    <div class="header-modal-menu-item">
                                        <a href="#" class="header-modal-menu-item__link">Монобукеты</a>
                                    </div>
                                    <div class="header-modal-menu-item">
                                        <a href="#" class="header-modal-menu-item__link">Миксы моно цветов</a>
                                    </div>
                                    <div class="header-modal-menu-item">
                                        <a href="#" class="header-modal-menu-item__link">Дуо и трио букеты</a>
                                    </div>
                                    <div class="header-modal-menu-item">
                                        <a href="#" class="header-modal-menu-item__link">Букеты с гортензиями</a>
                                    </div>
                                    <div class="header-modal-menu-item">
                                        <a href="#" class="header-modal-menu-item__link">Цветочные корзины</a>
                                    </div>
                                    <div class="header-modal-menu-item">
                                        <a href="#" class="header-modal-menu-item__link">Шляпные коробки</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="header-modal-menu-col">
                        <div class="header-modal-menu-section">
                            <div class="header-modal-menu-section-top">
                                <div class="header-modal-menu-section-top__title">Цветы-хиты</div>
                                <div class="header-modal-menu-section-top__icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="9" fill="none" viewBox="0 0 17 9">
                                        <path stroke="#242424" stroke-linecap="round" stroke-miterlimit="10" stroke-width=".6"
                                              d="m1 .829 7.229 7.229c.15.15.391.15.542 0L16 .829" />
                                    </svg>
                                </div>
                            </div>
                            <div class="header-modal-menu-section-hidden">
                                <div class="header-modal-menu-list">
                                    <div class="header-modal-menu-item">
                                        <a href="#" class="header-modal-menu-item__link">Пионовидные розы</a>
                                    </div>
                                    <div class="header-modal-menu-item">
                                        <a href="#" class="header-modal-menu-item__link">Ранункулюсы</a>
                                    </div>
                                    <div class="header-modal-menu-item">
                                        <a href="#" class="header-modal-menu-item__link">Тюльпаны</a>
                                    </div>
                                    <div class="header-modal-menu-item">
                                        <a href="#" class="header-modal-menu-item__link">Гвоздики</a>
                                    </div>
                                    <div class="header-modal-menu-item">
                                        <a href="#" class="header-modal-menu-item__link">Кустовые розы</a>
                                    </div>
                                    <div class="header-modal-menu-item">
                                        <a href="#" class="header-modal-menu-item__link">Орхидеи</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="header-modal-menu-col">
                        <div class="header-modal-menu-section">
                            <div class="header-modal-menu-section-top">
                                <div class="header-modal-menu-section-top__title">По случаю</div>
                                <div class="header-modal-menu-section-top__icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="9" fill="none" viewBox="0 0 17 9">
                                        <path stroke="#242424" stroke-linecap="round" stroke-miterlimit="10" stroke-width=".6"
                                              d="m1 .829 7.229 7.229c.15.15.391.15.542 0L16 .829" />
                                    </svg>
                                </div>
                            </div>
                            <div class="header-modal-menu-section-hidden">
                                <div class="header-modal-menu-list">
                                    <div class="header-modal-menu-item">
                                        <a href="#" class="header-modal-menu-item__link">День влюбленных</a>
                                    </div>
                                    <div class="header-modal-menu-item">
                                        <a href="#" class="header-modal-menu-item__link">Свадебные</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="header-modal-menu-section">
                            <div class="header-modal-menu-section-top">
                                <div class="header-modal-menu-section-top__title">Для дома</div>
                                <div class="header-modal-menu-section-top__icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="9" fill="none" viewBox="0 0 17 9">
                                        <path stroke="#242424" stroke-linecap="round" stroke-miterlimit="10" stroke-width=".6"
                                              d="m1 .829 7.229 7.229c.15.15.391.15.542 0L16 .829" />
                                    </svg>
                                </div>
                            </div>
                            <div class="header-modal-menu-section-hidden">
                                <div class="header-modal-menu-list">
                                    <div class="header-modal-menu-item">
                                        <a href="#" class="header-modal-menu-item__link">Наборы цветов для дома</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-modal-menu-link-container">
                    <a href="#" class="header-modal-menu__link">Смотреть все</a>
                </div>
            </div>
            <?App::Include('header/modal/personal', true, [], false)?>
            <div class="header-modal-personal">
                <div class="header-modal-item">
                    <div class="header-modal-item__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path fill="#242424"
                                  d="M12 2.625A9.375 9.375 0 1 0 21.375 12 9.385 9.385 0 0 0 12 2.625ZM6.457 18.602a6.374 6.374 0 0 1 11.086 0 8.606 8.606 0 0 1-11.086 0Zm11.653-.52a7.088 7.088 0 0 0-4.173-3.188 4.125 4.125 0 1 0-3.874 0 7.088 7.088 0 0 0-4.173 3.188 8.625 8.625 0 1 1 12.22 0ZM12 14.625a3.374 3.374 0 1 1 0-6.749 3.374 3.374 0 0 1 0 6.749Z" />
                        </svg>
                    </div>
                    <div class="header-modal-item__text">Личный кабинет</div>
                </div>
            </div>
            <div class="header-modal-delivery">
                <div class="header-modal-item">
                    <div class="header-modal-item__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path fill="#242424"
                                  d="m20.79 6.53-8.25-4.516a1.125 1.125 0 0 0-1.08 0L3.21 6.53a1.125 1.125 0 0 0-.585.986v8.966a1.125 1.125 0 0 0 .585.986l8.25 4.517a1.12 1.12 0 0 0 1.08 0l8.25-4.517a1.125 1.125 0 0 0 .585-.986V7.517a1.125 1.125 0 0 0-.585-.986Zm-8.97-3.858a.37.37 0 0 1 .36 0l8.133 4.453-3.579 1.958a.376.376 0 0 0-.054-.037L8.43 4.529l3.39-1.857Zm.18 9L3.687 7.125l3.96-2.168 8.312 4.55L12 11.672Zm-8.43 5.137a.374.374 0 0 1-.195-.328V7.808l8.25 4.515v8.898L3.57 16.81Zm16.86 0-8.055 4.407v-8.893l3.75-2.052v3.98a.375.375 0 0 0 .75 0V9.86l3.75-2.053v8.675a.375.375 0 0 1-.195.328v-.002Z" />
                        </svg>
                    </div>
                    <div class="header-modal-item__text">Доставка</div>
                </div>
                <div class="header-modal-item">
                    <div class="header-modal-item__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path fill="#242424"
                                  d="M19.5 4.875c-1.203 0-2.39.276-3.469.808-1.331-2.48-3.75-3.715-3.861-3.769a.375.375 0 0 0-.336 0c-.107.054-2.531 1.289-3.861 3.77A7.828 7.828 0 0 0 4.5 4.874a.375.375 0 0 0-.375.375V9a7.884 7.884 0 0 0 7.5 7.866v4.277l-3.957-1.979a.376.376 0 0 0-.336.672l4.5 2.25a.374.374 0 0 0 .336 0l4.5-2.25a.375.375 0 1 0-.336-.672l-3.957 1.98v-4.278A7.884 7.884 0 0 0 19.875 9V5.25a.375.375 0 0 0-.375-.375ZM12 2.678c.554.315 2.344 1.448 3.375 3.368A7.918 7.918 0 0 0 12 10.351a7.918 7.918 0 0 0-3.375-4.305C9.656 4.132 11.447 2.994 12 2.678ZM4.875 9V5.634a7.135 7.135 0 0 1 6.75 7.116v3.366A7.135 7.135 0 0 1 4.875 9Zm14.25 0a7.136 7.136 0 0 1-6.75 7.116V12.75a7.136 7.136 0 0 1 6.75-7.116V9Z" />
                        </svg>
                    </div>
                    <div class="header-modal-item__text">Сертификаты</div>
                </div>
            </div>
            <div class="header-modal-about">
                <div class="header-modal-item">
                    <div class="header-modal-item__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 20 20">
                            <path fill="#242424"
                                  d="M3.975 1h5.01v.907H4.968v3.629H8.84v.907H4.968v4.599h-.993V1ZM11.002 1h.967v16.925h4.054v.927h-5.021V1Z" />
                        </svg>
                    </div>
                    <div class="header-modal-item__text">О нас</div>
                </div>
            </div>
            <div class="header-modal-contacts">
                <div class="header-modal-item">
                    <div class="header-modal-item__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 20 20">
                            <path stroke="#242424" stroke-linecap="round" stroke-linejoin="round" stroke-width=".7"
                                  d="M10 .417A9.583 9.583 0 0 0 2.05 15.35L.415 19.583l4.358-1.558A9.583 9.583 0 1 0 10 .417Z" />
                            <path stroke="#242424" stroke-linecap="round" stroke-linejoin="round" stroke-width=".7"
                                  d="M7.916 12.083c1.083 1.084 3.475 2.5 4.583 2.5a2.108 2.108 0 0 0 2.084-1.666v-.834s-1.025-.5-1.667-.833c-.642-.333-1.667.833-1.667.833a5.434 5.434 0 0 1-2.083-1.25 5.433 5.433 0 0 1-1.25-2.083s1.167-1.025.833-1.667c-.333-.641-.833-1.666-.833-1.666h-.833A2.108 2.108 0 0 0 5.416 7.5c0 1.108 1.417 3.5 2.5 4.583Z" />
                        </svg>
                    </div>
                    <div class="header-modal-item__text">WhatsApp</div>
                </div>
                <div class="header-modal-item">
                    <div class="header-modal-item__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="21" height="20" fill="none" viewBox="0 0 21 20">
                            <path fill="#242424"
                                  d="M18.803 2.283a.391.391 0 0 0-.398-.068L2.572 8.41a.798.798 0 0 0 .137 1.528l4.354.855v4.831a.937.937 0 0 0 1.611.65l2.188-2.266 3.36 2.947a.938.938 0 0 0 1.533-.494l3.173-13.796a.39.39 0 0 0-.125-.383ZM2.688 9.17a.166.166 0 0 1 .111-.177l13.645-5.34-9.14 6.55-4.474-.877a.166.166 0 0 1-.142-.156Zm5.537 6.67a.313.313 0 0 1-.537-.215v-4.398l2.702 2.367-2.165 2.247Zm6.92.48a.313.313 0 0 1-.513.164L7.878 10.56l10.29-7.373-3.022 13.132Z" />
                        </svg>
                    </div>
                    <div class="header-modal-item__text">Telegram</div>
                </div>
                <div class="header-modal-item">
                    <div class="header-modal-item__text">+7 985 911-57-49</div>
                </div>
            </div>
        </div>
    </div>
</div>
<?App::Include('header/search')?>


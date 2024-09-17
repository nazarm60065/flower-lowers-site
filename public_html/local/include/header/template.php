<?
use Prymery\App;

$isMainPage = CSite::InDir('/index.php');

$headCssClass = $isMainPage ? ' header_homepage' : '';
?>
<header class="header<?= $headCssClass ?>">
    <div class="header-top">
        <div class="container header-top-container">
            <div class="header-top-item header-top-social">
                <?App::Include('header/social')?>
                <?//= $mustache->render('social', include $_SERVER['DOCUMENT_ROOT'] . '/context/header/social.php'); ?>
            </div>
            <div class="header-top-item header-top__text">
                Обрабатываем ваши заказы с 9.00 до 21.00
            </div>
            <div class="header-top-item header-top-contacts">
                <div class="header-top-contact">
                    <!--noindex-->
                    <a href="tel:+79859115749" class="header-top-contact__link" rel="nofollow">+7 (985) 911-57-49</a>
                    <!--/noindex-->
                </div>
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
                <? if (!$pageConfig['isMainPage']) : ?>
                    <a href="/" class="link-as-card"></a>
                <? endif; ?>
            </div>
            <div class="header-menu-and-toolbar">
                <div class="header-menu">
                    <div class="header-menu-item">
                        <a href="#" class="header-menu-item__link">О нас</a>
                    </div>
                    <div class="header-menu-item">
                        <a href="#" class="header-menu-item__link">Контакты</a>
                    </div>
                </div>
                <div class="header-toolbar">
                    <button class="header-item header-search-toggle" type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="26" fill="none" viewBox="0 0 25 26">
                            <path stroke="#242424" stroke-miterlimit="10" d="M12 20a8 8 0 1 0 0-16 8 8 0 0 0 0 16Z" />
                            <path stroke="#242424" stroke-miterlimit="10" stroke-linecap="round" d="m23 23-5-5" />
                        </svg>
                    </button>
                    <a href="#" class="header-item header-personal">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="26" fill="none" viewBox="0 0 25 26">
                            <path stroke="#242424" stroke-miterlimit="10" d="M12.5 22a8.5 8.5 0 1 0 0-17 8.5 8.5 0 0 0 0 17Z" />
                            <path stroke="#242424" stroke-miterlimit="10"
                                  d="M7 20s1.923-4 5.638-4C16.354 16 18 20 18 20M12.5 14a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
                        </svg>
                    </a>
                    <a href="#" class="header-item header-cart">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="none" viewBox="0 0 25 25">
                            <path stroke="#242424" stroke-miterlimit="10"
                                  d="m18.992 19.733 2.469-8.913c.187-.664-.323-1.32-1.028-1.32H4.564c-.697 0-1.208.656-1.028 1.32l2.469 8.913c.127.457.548.767 1.028.767h10.931c.48 0 .9-.317 1.028-.767Z" />
                            <path stroke="#242424" stroke-linecap="round" stroke-miterlimit="10" d="m10.5 5.5-5 4M14.5 5.5l5 4" />
                        </svg>
                        <span class="header-cart__count">2</span>
                    </a>
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
<div class="header-search-overlay"></div>
<div class="header-search">
    <div class="container header-search-container">
        <div class="header-search-inner">
            <div class="header-search-logo">
                <svg xmlns="http://www.w3.org/2000/svg" width="102" height="43" fill="none" viewBox="0 0 102 43">
                    <path fill="#242424"
                          d="M0 .297h8.819v1.597h-7.07V8.28h6.815v1.596H1.749v8.095H0V.297ZM12.025.297h1.713v40.698h7.18v1.634h-8.893V.297ZM36.004 9.098c0 1.67-.4 3.193-1.24 4.604-.837 1.411-1.93 2.525-3.352 3.342a9.026 9.026 0 0 1-4.555 1.225c-1.603 0-3.097-.408-4.519-1.225-1.42-.817-2.55-1.894-3.389-3.305a8.58 8.58 0 0 1-1.275-4.53c0-1.634.4-3.23 1.239-4.605.838-1.41 1.931-2.525 3.352-3.341C23.688.446 25.218 0 26.857 0c1.64 0 3.134.408 4.519 1.225 1.421.817 2.55 1.894 3.389 3.305a8.614 8.614 0 0 1 1.275 4.568h-.036Zm-9.147-7.39a7.166 7.166 0 0 0-3.717 1.003c-1.13.668-2.04 1.596-2.733 2.748a7.48 7.48 0 0 0-.984 3.75c0 1.337.328 2.562 1.02 3.676a7.725 7.725 0 0 0 2.77 2.674c1.166.668 2.369 1.002 3.644 1.002.984 0 1.931-.185 2.843-.594a7.066 7.066 0 0 0 2.368-1.597c.693-.668 1.203-1.485 1.604-2.376.364-.928.583-1.894.583-2.896 0-1.337-.328-2.563-1.02-3.677-.693-1.15-1.604-2.042-2.734-2.673a7.098 7.098 0 0 0-3.644-1.003v-.037ZM37.17.297h1.786l4.264 15.41L47.374.297h1.64L53.17 15.67 57.432.297h1.786l-4.92 17.675h-2.295l-3.79-14.519-3.827 14.52H42.09L37.17.296ZM62.752.297h9.475v1.597H64.5v6.35h7.47V9.84h-7.47v6.536h7.726v1.596h-9.475V.297ZM76.856.297h4.117c1.094 0 2.041.037 2.806.149.766.111 1.495.334 2.114.705.875.52 1.53 1.188 2.004 2.042.474.854.693 1.82.693 2.86 0 .928-.219 1.82-.693 2.636a5.502 5.502 0 0 1-1.858 1.931 5.28 5.28 0 0 1-2.588.78l4.884 6.61h-2.15L80.28 9.988h.51c.838 0 1.567 0 2.15-.075a4.85 4.85 0 0 0 1.64-.408 3.806 3.806 0 0 0 1.676-1.448c.401-.631.584-1.337.584-2.154 0-.631-.146-1.225-.438-1.782-.291-.557-.692-1.04-1.166-1.374a4.02 4.02 0 0 0-1.64-.706 17.687 17.687 0 0 0-2.26-.148h-2.732v16.078h-1.75V.297ZM93.18 12.996c0 .632.183 1.226.474 1.783.292.557.73.965 1.24 1.3.51.334 1.093.482 1.749.482.656 0 1.275-.148 1.822-.445a3.324 3.324 0 0 0 1.312-1.263c.328-.52.473-1.114.473-1.782 0-.483-.109-.928-.328-1.374a3.28 3.28 0 0 0-.874-1.114 5.441 5.441 0 0 0-1.166-.706c-.401-.148-.911-.334-1.53-.482-.73-.186-1.35-.409-1.786-.557a4.552 4.552 0 0 1-1.276-.78c-.984-.854-1.458-1.931-1.458-3.305 0-.928.22-1.745.656-2.488.438-.705 1.02-1.3 1.786-1.67C95.039.184 95.841 0 96.752 0a4.75 4.75 0 0 1 2.405.631c.729.409 1.312 1.003 1.749 1.746.438.742.656 1.522.656 2.413H99.74c-.036-.594-.182-1.114-.474-1.597-.291-.482-.655-.854-1.13-1.114a3.183 3.183 0 0 0-1.566-.408c-.547 0-1.057.149-1.494.408-.474.298-.802.669-1.093 1.114a3.273 3.273 0 0 0-.401 1.523c0 .668.145 1.188.473 1.597.328.408.693.705 1.166.928.474.186 1.057.408 1.786.594.911.26 1.604.483 2.04.631.438.186.876.446 1.313.854.51.446.911 1.003 1.202 1.671.292.669.438 1.337.438 2.043a4.89 4.89 0 0 1-.729 2.599 5.2 5.2 0 0 1-1.932 1.857 5.311 5.311 0 0 1-2.623.668 5.694 5.694 0 0 1-2.697-.668c-.838-.446-1.458-1.077-1.968-1.894a5.288 5.288 0 0 1-.729-2.71h1.859v.11ZM42.855 33.828c0 1.671-.4 3.194-1.238 4.605-.839 1.41-1.932 2.525-3.353 3.342A8.93 8.93 0 0 1 33.709 43c-1.64 0-3.098-.408-4.52-1.225-1.42-.817-2.55-1.894-3.388-3.305a8.581 8.581 0 0 1-1.276-4.53c0-1.634.401-3.231 1.24-4.605.838-1.411 1.93-2.525 3.352-3.342a9.027 9.027 0 0 1 4.555-1.225 8.8 8.8 0 0 1 4.519 1.225c1.421.817 2.55 1.894 3.39 3.305.837 1.411 1.274 2.896 1.274 4.567v-.037Zm-9.146-7.39a7.166 7.166 0 0 0-3.717 1.003c-1.13.669-2.041 1.597-2.733 2.748a7.48 7.48 0 0 0-.984 3.75c0 1.337.328 2.563 1.02 3.677a7.725 7.725 0 0 0 2.77 2.673c1.166.669 2.368 1.003 3.644 1.003.984 0 1.931-.186 2.842-.594A7.066 7.066 0 0 0 38.92 39.1c.692-.668 1.202-1.485 1.603-2.414.365-.928.583-1.893.583-2.896 0-1.337-.328-2.562-1.02-3.676-.692-1.114-1.603-2.042-2.733-2.674a7.098 7.098 0 0 0-3.644-1.002ZM43.693 25.028h1.895l6.086 15.447 6.122-15.447h1.895l-7.179 17.675h-1.676l-7.143-17.675ZM62.752 25.028h9.511v1.596h-7.762v6.35h7.47v1.597h-7.47v6.535h7.762v1.597h-9.511V25.028ZM76.856 25.028h4.117c1.094 0 2.041.037 2.806.148.766.112 1.495.334 2.114.706.875.52 1.53 1.188 2.004 2.042.474.854.693 1.82.693 2.86 0 .928-.219 1.819-.693 2.636a5.502 5.502 0 0 1-1.858 1.93 5.28 5.28 0 0 1-2.588.78l4.884 6.61h-2.15l-5.904-8.02h.51c.838 0 1.567 0 2.15-.075.583-.074 1.13-.186 1.64-.408a3.806 3.806 0 0 0 1.676-1.449c.401-.63.584-1.336.584-2.153a3.79 3.79 0 0 0-.438-1.783c-.291-.557-.692-1.04-1.166-1.374a4.02 4.02 0 0 0-1.64-.705 17.683 17.683 0 0 0-2.26-.149h-2.732v16.079h-1.75V25.028ZM93.18 37.727c0 .631.183 1.226.474 1.783.292.556.73.965 1.24 1.3.51.333 1.093.482 1.749.482.656 0 1.275-.149 1.822-.446a3.324 3.324 0 0 0 1.312-1.262c.328-.52.473-1.151.473-1.783 0-.482-.109-.928-.328-1.373a3.28 3.28 0 0 0-.874-1.114 5.44 5.44 0 0 0-1.166-.706c-.401-.149-.911-.334-1.53-.483-.73-.185-1.35-.408-1.786-.557a4.553 4.553 0 0 1-1.276-.78c-.984-.854-1.458-1.93-1.458-3.304 0-.929.22-1.746.656-2.488.438-.706 1.02-1.3 1.786-1.671.765-.409 1.567-.594 2.478-.594a4.75 4.75 0 0 1 2.405.63c.729.41 1.312 1.003 1.749 1.746.438.743.656 1.523.656 2.414H99.74c-.036-.594-.182-1.114-.474-1.597-.291-.483-.655-.854-1.13-1.114a3.183 3.183 0 0 0-1.566-.408c-.547 0-1.057.148-1.494.408-.474.297-.802.668-1.093 1.114a3.273 3.273 0 0 0-.401 1.523c0 .668.145 1.188.473 1.596.328.409.693.706 1.166.928.474.186 1.057.409 1.786.595.911.26 1.604.482 2.04.63.438.187.876.447 1.313.855.51.446.911 1.003 1.202 1.671.292.668.438 1.337.438 2.042a4.89 4.89 0 0 1-.729 2.6 5.2 5.2 0 0 1-1.932 1.856 5.311 5.311 0 0 1-2.623.669 5.694 5.694 0 0 1-2.697-.669c-.838-.445-1.458-1.077-1.968-1.894a5.287 5.287 0 0 1-.729-2.71h1.859v.111Z" />
                </svg>
            </div>
            <form action="" class="search-form">
                <div class="search-form-group">
                    <input type="text" name="q" class="search-form__control" value="розы">
                </div>
                <button class="search-form__submit" type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="none">
                        <path stroke="#242424" stroke-miterlimit="10" d="M12 20a8 8 0 1 0 0-16 8 8 0 0 0 0 16Z" />
                        <path stroke="#242424" stroke-linecap="round" stroke-miterlimit="10" d="m23 23-5-5" />
                    </svg>
                </button>
            </form>
            <button class="header-search__close" type="button">
                <svg xmlns="http://www.w3.org/2000/svg" width="27" height="26" fill="none" viewBox="0 0 27 26">
                    <path stroke="#242424" stroke-linecap="round" d="M3.707 4.04 23 23.335M23 3.743 3.707 23.036" />
                </svg>
            </button>
        </div>
    </div>
</div>

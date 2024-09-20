<?

/** @var CMain $APPLICATION */
$APPLICATION->IncludeComponent("bitrix:catalog.products.viewed", "viewed", Array(
	"ACTION_VARIABLE" => "action_cpv",	// Название переменной, в которой передается действие
		"ADDITIONAL_PICT_PROP_3" => "-",
		"ADD_PROPERTIES_TO_BASKET" => "N",	// Добавлять в корзину свойства товаров и предложений
		"ADD_TO_BASKET_ACTION" => "BUY",	// Показывать кнопку добавления в корзину или покупки
		"BASKET_URL" => "/cart/",	// URL, ведущий на страницу с корзиной покупателя
		"CACHE_GROUPS" => "N",	// Учитывать права доступа
		"CACHE_TIME" => "3600",	// Время кеширования (сек.)
		"CACHE_TYPE" => "A",	// Тип кеширования
		"CART_PROPERTIES_2" => "",
		"CART_PROPERTIES_3" => "",
		"CONVERT_CURRENCY" => "Y",	// Показывать цены в одной валюте
		"CURRENCY_ID" => "RUB",	// Валюта, в которую будут сконвертированы цены
		"DATA_LAYER_NAME" => "dataLayer",
		"DEPTH" => "",	// Максимальная отображаемая глубина разделов
		"DISCOUNT_PERCENT_POSITION" => "top-right",
		"ENLARGE_PRODUCT" => "STRICT",	// Выделять товары в списке
		"ENLARGE_PROP_2" => "NEWPRODUCT",
		"HIDE_NOT_AVAILABLE" => "L",	// Недоступные товары
		"HIDE_NOT_AVAILABLE_OFFERS" => "N",	// Недоступные торговые предложения
		"IBLOCK_ID" => "4",	// Инфоблок
		"IBLOCK_MODE" => "single",	// Показывать товары из
		"IBLOCK_TYPE" => "catalog_type",	// Тип инфоблока
		"LABEL_PROP_2" => array(
			0 => "NEWPRODUCT",
		),
		"LABEL_PROP_MOBILE_2" => "",
		"LABEL_PROP_POSITION" => "top-left",	// Расположение меток товара
		"MESS_BTN_ADD_TO_BASKET" => "В корзину",	// Текст кнопки "Добавить в корзину"
		"MESS_BTN_BUY" => "Купить",	// Текст кнопки "Купить"
		"MESS_BTN_DETAIL" => "Подробнее",	// Текст кнопки "Подробнее"
		"MESS_BTN_SUBSCRIBE" => "Подписаться",	// Текст кнопки "Уведомить о поступлении"
		"MESS_NOT_AVAILABLE" => "Нет в наличии",	// Сообщение об отсутствии товара
		"MESS_RELATIVE_QUANTITY_FEW" => "мало",	// Текст для значения меньше
		"MESS_RELATIVE_QUANTITY_MANY" => "много",	// Текст для значения больше
		"MESS_SHOW_MAX_QUANTITY" => "Наличие",	// Текст для остатка
		"OFFER_TREE_PROPS_3" => array(
			0 => "COLOR_REF",
		),
		"PAGE_ELEMENT_COUNT" => "8",	// Количество элементов на странице
		"PARTIAL_PRODUCT_PROPERTIES" => "N",	// Разрешить добавлять в корзину товары, у которых заполнены не все характеристики
		"PRICE_CODE" => array(	// Тип цены
			0 => "base",
		),
		"PRICE_VAT_INCLUDE" => "Y",	// Включать НДС в цену
		"PRODUCT_BLOCKS_ORDER" => "price,props,quantityLimit,sku,quantity,buttons,compare",	// Порядок отображения блоков товара
		"PRODUCT_ID_VARIABLE" => "id",	// Название переменной, в которой передается код товара для покупки
		"PRODUCT_PROPS_VARIABLE" => "prop",	// Название переменной, в которой передаются характеристики товара
		"PRODUCT_QUANTITY_VARIABLE" => "",	// Название переменной, в которой передается количество товара
		"PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'3','BIG_DATA':false},{'VARIANT':'3','BIG_DATA':false}]",	// Вариант отображения товаров
		"PRODUCT_SUBSCRIPTION" => "Y",	// Разрешить оповещения для отсутствующих товаров
		"PROPERTY_CODE_2" => array(
			0 => "MORE_PHOTO",
		),
		"PROPERTY_CODE_3" => array(
			0 => "ARTNUMBER",
		),
		"PROPERTY_CODE_MOBILE_2" => "",
		"RELATIVE_QUANTITY_FACTOR" => "5",	// Значение, от которого происходит подмена
		"SECTION_CODE" => "",	// Код раздела
		"SECTION_ELEMENT_CODE" => "",	// Символьный код элемента, для которого будет выбран раздел
		"SECTION_ELEMENT_ID" => "",	// ID элемента, для которого будет выбран раздел
		"SECTION_ID" => "",	// ID раздела
		"SHOW_CLOSE_POPUP" => "N",	// Показывать кнопку продолжения покупок во всплывающих окнах
		"SHOW_DISCOUNT_PERCENT" => "N",	// Показывать процент скидки
		"SHOW_FROM_SECTION" => "N",	// Показывать товары из раздела
		"SHOW_MAX_QUANTITY" => "M",	// Показывать остаток товара
		"SHOW_OLD_PRICE" => "N",	// Показывать старую цену
		"SHOW_PRICE_COUNT" => "1",	// Выводить цены для количества
		"SHOW_PRODUCTS_2" => "N",
		"SHOW_SLIDER" => "N",	// Показывать слайдер для товаров
		"SLIDER_INTERVAL" => "3000",
		"SLIDER_PROGRESS" => "Y",
		"TEMPLATE_THEME" => "blue",	// Цветовая тема
		"USE_ENHANCED_ECOMMERCE" => "N",	// Отправлять данные электронной торговли в Google и Яндекс
		"USE_PRICE_COUNT" => "N",	// Использовать вывод цен с диапазонами
		"USE_PRODUCT_QUANTITY" => "Y",	// Разрешить указание количества товара
		"COMPONENT_TEMPLATE" => ".default",
		"DISPLAY_COMPARE" => "N",	// Разрешить сравнение товаров
		"ADDITIONAL_PICT_PROP_4" => "-",	// Дополнительная картинка
		"LABEL_PROP_4" => "",	// Свойство меток товара
		"ADDITIONAL_PICT_PROP_5" => "ADDITIONAL_IMAGE",	// Дополнительная картинка
        "TITLE" => "Вы недавно смотрели",
	),
	false
);
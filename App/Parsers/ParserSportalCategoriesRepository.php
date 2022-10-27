<?php

declare(strict_types=1);

namespace App\Parsers;

use App\Entity\Category;

class ParserSportalCategoriesRepository
{
    public static function getCategories() : array
    {
        return [
            new Category(
                name: 'Беговые лыжи',
                url: 'https://tdsportal.ru/catalog/lyzhi/',
                remoteId: 0
            ),
            new Category(
                name: 'Ботинки лыжные',
                url: 'https://tdsportal.ru/catalog/botinki_lyzhnye/',
                remoteId: 0
            ),
            new Category(
                name: 'Палки лыжные',
                url: 'https://tdsportal.ru/catalog/palki_lyzhnye/',
                remoteId: 0
            ),
            new Category(
                name: 'Крепления лыжные',
                url: 'https://tdsportal.ru/catalog/krepleniya_lyzhnye/',
                remoteId: 0
            ),
            new Category(
                name: 'Аксессуары',
                url: 'https://tdsportal.ru/catalog/aksessuary_3/',
                remoteId: 0
            ),
            new Category(
                name: 'Коньки',
                url: 'https://tdsportal.ru/catalog/konki/',
                remoteId: 0
            ),
            new Category(
                name: 'Хоккейное снарежение',
                url: 'https://tdsportal.ru/catalog/khokkeynoe_snaryazhenie/',
                remoteId: 0
            ),
            new Category(
                name: 'Шайбы',
                url: 'https://tdsportal.ru/catalog/shayby/',
                remoteId: 0
            ),
            new Category(
                name: 'Клюшки',
                url: 'https://tdsportal.ru/catalog/klyushki/',
                remoteId: 0
            ),
            new Category(
                name: 'Тюбинги',
                url: 'https://tdsportal.ru/catalog/tyubingi/',
                remoteId: 0
            ),
            new Category(
                name: 'Санки',
                url: 'https://tdsportal.ru/catalog/sanki/',
                remoteId: 0
            ),
            new Category(
                name: 'Снегокаты',
                url: 'https://tdsportal.ru/catalog/snegokaty/',
                remoteId: 0
            ),
            new Category(
                name: 'Купальники, лосины, шорты',
                url: 'https://tdsportal.ru/catalog/kupalniki_losiny_shorty/',
                remoteId: 0
            ),
            new Category(
                name: 'Кимоно',
                url: 'https://tdsportal.ru/catalog/kimono/',
                remoteId: 0
            ),
            new Category(
                name: 'Чешки',
                url: 'https://tdsportal.ru/catalog/cheshki/',
                remoteId: 0
            ),
            new Category(
                name: 'Балетки',
                url: 'https://tdsportal.ru/catalog/baletki/',
                remoteId: 0
            ),
            new Category(
                name: 'Гимнастическая обувь',
                url: 'https://tdsportal.ru/catalog/polutapochki_dlya_khudozhestvennoy_gimnastiki/',
                remoteId: 0
            ),
            new Category(
                name: 'Кросовки',
                url: 'https://tdsportal.ru/catalog/krossovki/',
                remoteId: 0
            ),
            new Category(
                name: 'Бутсы',
                url: 'https://tdsportal.ru/catalog/butsy/',
                remoteId: 0
            ),
            new Category(
                name: 'Бокс, единобрства',
                url: 'https://tdsportal.ru/catalog/boks_edinoborstva/',
                remoteId: 0
            ),
            new Category(
                name: 'Тенис, бадментон',
                url: 'https://tdsportal.ru/catalog/tennis_badminton/',
                remoteId: 0
            ),
            new Category(
                name: 'Плавание',
                url: 'https://tdsportal.ru/catalog/plavanie/',
                remoteId: 0
            ),
            new Category(
                name: 'Мячи баскетбольные',
                url: 'https://tdsportal.ru/catalog/myachi_basketbolnye/',
                remoteId: 0
            ),
            new Category(
                name: 'Мячи волейбольные',
                url: 'https://tdsportal.ru/catalog/myachi_voleybolnye/',
                remoteId: 0
            ),
            new Category(
                name: 'Мячи футбольные',
                url: 'https://tdsportal.ru/catalog/myachi_futbolnye/',
                remoteId: 0
            ),
            new Category(
                name: 'Мячи гимнастические',
                url: 'https://tdsportal.ru/catalog/myachi_gimnasticheskie/',
                remoteId: 0
            ),
            new Category(
                name: 'Обручи',
                url: 'https://tdsportal.ru/catalog/obruchi_i_aksessuary/',
                remoteId: 0
            ),
            new Category(
                name: 'Скакалки',
                url: 'https://tdsportal.ru/catalog/skakalki/',
                remoteId: 0
            ),
            new Category(
                name: 'Степ-платформы',
                url: 'https://tdsportal.ru/catalog/step_platformy/',
                remoteId: 0
            ),
            new Category(
                name: 'Гантели',
                url: 'https://tdsportal.ru/catalog/ganteli/',
                remoteId: 0
            ),
            new Category(
                name: 'Грифы',
                url: 'https://tdsportal.ru/catalog/grify/',
                remoteId: 0
            ),
            new Category(
                name: 'Утяжелители',
                url: 'https://tdsportal.ru/catalog/utyazheliteli/',
                remoteId: 0
            ),
            new Category(
                name: 'Защита, суппорты',
                url: 'https://tdsportal.ru/catalog/supporty_zashchita/',
                remoteId: 0
            ),
            new Category(
                name: 'Коврики',
                url: 'https://tdsportal.ru/catalog/kovriki/',
                remoteId: 0
            ),
            new Category(
                name: 'Спальный мешок',
                url: 'https://tdsportal.ru/catalog/spalnye_meshki/',
                remoteId: 0
            ),
            new Category(
                name: 'Скандинавская ходьба',
                url: 'https://tdsportal.ru/catalog/palki_dlya_skandinavskoy_khodby/',
                remoteId: 0
            ),
            new Category(
                name: 'Беговые дорожи',
                url: 'https://tdsportal.ru/catalog/begovye_dorozhki/',
                remoteId: 0
            ),
            new Category(
                name: 'Велотренажеры',
                url: 'https://tdsportal.ru/catalog/velotrenazhery/',
                remoteId: 0
            ),
            new Category(
                name: 'Эллиптические тренажеры',
                url: 'https://tdsportal.ru/catalog/ellipticheskie_trenazhery/',
                remoteId: 0
            ),
            new Category(
                name: 'Силовые тренажеры',
                url: 'https://tdsportal.ru/catalog/silovye_trenazhery/',
                remoteId: 0
            ),
            new Category(
                name: 'Гребля',
                url: 'https://tdsportal.ru/catalog/greblya/',
                remoteId: 0
            ),
            new Category(
                name: 'Скамьи',
                url: 'https://tdsportal.ru/catalog/skami/',
                remoteId: 0
            ),
            new Category(
                name: 'Шведская стенка',
                url: 'https://tdsportal.ru/catalog/shvedskie_stenki_i_dsk/',
                remoteId: 0
            ),
            new Category(
                name: 'Турники',
                url: 'https://tdsportal.ru/catalog/turniki/',
                remoteId: 0
            ),
            new Category(
                name: 'Степперы',
                url: 'https://tdsportal.ru/catalog/steppery/',
                remoteId: 0
            ),
        ];

    }

}
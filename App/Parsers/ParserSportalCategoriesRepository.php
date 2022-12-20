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
                remoteId: 415
            ),
            new Category(
                name: 'Ботинки лыжные',
                url: 'https://tdsportal.ru/catalog/botinki_lyzhnye/',
                remoteId: 787
            ),
            new Category(
                name: 'Палки лыжные',
                url: 'https://tdsportal.ru/catalog/palki_lyzhnye/',
                remoteId: 797
            ),
            new Category(
                name: 'Крепления лыжные',
                url: 'https://tdsportal.ru/catalog/krepleniya_lyzhnye/',
                remoteId: 793
            ),
            new Category(
                name: 'Аксессуары',
                url: 'https://tdsportal.ru/catalog/aksessuary_3/',
                remoteId: 743
            ),
            new Category(
                name: 'Коньки',
                url: 'https://tdsportal.ru/catalog/konki/',
                remoteId: 414
            ),
            new Category(
                name: 'Хоккейное снарежение',
                url: 'https://tdsportal.ru/catalog/khokkeynoe_snaryazhenie/',
                remoteId: 800
            ),
            new Category(
                name: 'Шайбы',
                url: 'https://tdsportal.ru/catalog/shayby/',
                remoteId: 798
            ),
            new Category(
                name: 'Клюшки',
                url: 'https://tdsportal.ru/catalog/klyushki/',
                remoteId: 791
            ),
            new Category(
                name: 'Тюбинги',
                url: 'https://tdsportal.ru/catalog/tyubingi/',
                remoteId: 1658
            ),
            new Category(
                name: 'Санки',
                url: 'https://tdsportal.ru/catalog/sanki/',
                remoteId: 1659
            ),
            new Category(
                name: 'Снегокаты',
                url: 'https://tdsportal.ru/catalog/snegokaty/',
                remoteId: 1660
            ),
            new Category(
                name: 'Купальники, лосины, шорты',
                url: 'https://tdsportal.ru/catalog/kupalniki_losiny_shorty/',
                remoteId: 758
            ),
            new Category(
                name: 'Кимоно',
                url: 'https://tdsportal.ru/catalog/kimono/',
                remoteId: 1647
            ),
            new Category(
                name: 'Чешки',
                url: 'https://tdsportal.ru/catalog/cheshki/',
                remoteId: 778
            ),
            new Category(
                name: 'Балетки',
                url: 'https://tdsportal.ru/catalog/baletki/',
                remoteId: 779
            ),
            new Category(
                name: 'Гимнастическая обувь',
                url: 'https://tdsportal.ru/catalog/polutapochki_dlya_khudozhestvennoy_gimnastiki/',
                remoteId: 1648
            ),
            new Category(
                name: 'Кросовки',
                url: 'https://tdsportal.ru/catalog/krossovki/',
                remoteId: 1649
            ),
            new Category(
                name: 'Бутсы',
                url: 'https://tdsportal.ru/catalog/butsy/',
                remoteId: 1650
            ),
            new Category(
                name: 'Бокс, единобрства',
                url: 'https://tdsportal.ru/catalog/boks_edinoborstva/',
                remoteId: 1651
            ),
            new Category(
                name: 'Тенис, бадментон',
                url: 'https://tdsportal.ru/catalog/tennis_badminton/',
                remoteId: 1652
            ),
            new Category(
                name: 'Плавание',
                url: 'https://tdsportal.ru/catalog/plavanie/',
                remoteId: 417
            ),
            new Category(
                name: 'Мячи баскетбольные',
                url: 'https://tdsportal.ru/catalog/myachi_basketbolnye/',
                remoteId: 457
            ),
            new Category(
                name: 'Мячи волейбольные',
                url: 'https://tdsportal.ru/catalog/myachi_voleybolnye/',
                remoteId: 458
            ),
            new Category(
                name: 'Мячи футбольные',
                url: 'https://tdsportal.ru/catalog/myachi_futbolnye/',
                remoteId: 459
            ),
            new Category(
                name: 'Мячи гимнастические',
                url: 'https://tdsportal.ru/catalog/myachi_gimnasticheskie/',
                remoteId: 749
            ),
            new Category(
                name: 'Обручи',
                url: 'https://tdsportal.ru/catalog/obruchi_i_aksessuary/',
                remoteId: 750
            ),
            new Category(
                name: 'Скакалки',
                url: 'https://tdsportal.ru/catalog/skakalki/',
                remoteId: 756
            ),
            new Category(
                name: 'Степ-платформы',
                url: 'https://tdsportal.ru/catalog/step_platformy/',
                remoteId: 762
            ),
            new Category(
                name: 'Гантели',
                url: 'https://tdsportal.ru/catalog/ganteli/',
                remoteId: 746
            ),
            new Category(
                name: 'Грифы',
                url: 'https://tdsportal.ru/catalog/grify/',
                remoteId: 745
            ),
            new Category(
                name: 'Утяжелители',
                url: 'https://tdsportal.ru/catalog/utyazheliteli/',
                remoteId: 757
            ),
            new Category(
                name: 'Защита, суппорты',
                url: 'https://tdsportal.ru/catalog/supporty_zashchita/',
                remoteId: 7700
            ),
            new Category(
                name: 'Коврики',
                url: 'https://tdsportal.ru/catalog/kovriki/',
                remoteId: 1653
            ),
            new Category(
                name: 'Спальный мешок',
                url: 'https://tdsportal.ru/catalog/spalnye_meshki/',
                remoteId: 1655
            ),
            new Category(
                name: 'Скандинавская ходьба',
                url: 'https://tdsportal.ru/catalog/palki_dlya_skandinavskoy_khodby/',
                remoteId: 1656
            ),
            new Category(
                name: 'Беговые дорожки',
                url: 'https://tdsportal.ru/catalog/begovye_dorozhki/',
                remoteId: 727
            ),
            new Category(
                name: 'Велотренажеры',
                url: 'https://tdsportal.ru/catalog/velotrenazhery/',
                remoteId: 728
            ),
            new Category(
                name: 'Эллиптические тренажеры',
                url: 'https://tdsportal.ru/catalog/ellipticheskie_trenazhery/',
                remoteId: 729
            ),
            new Category(
                name: 'Силовые тренажеры',
                url: 'https://tdsportal.ru/catalog/silovye_trenazhery/',
                remoteId: 730
            ),
//            new Category(
//                name: 'Гребля',
//                url: 'https://tdsportal.ru/catalog/greblya/',
//                remoteId: 731
//            ),
            new Category(
                name: 'Скамьи',
                url: 'https://tdsportal.ru/catalog/skami/',
                remoteId: 732
            ),
            new Category(
                name: 'Шведская стенка',
                url: 'https://tdsportal.ru/catalog/shvedskie_stenki_i_dsk/',
                remoteId: 1657
            ),
            new Category(
                name: 'Турники',
                url: 'https://tdsportal.ru/catalog/turniki/',
                remoteId: 735
            ),
            new Category(
                name: 'Степперы',
                url: 'https://tdsportal.ru/catalog/steppery/',
                remoteId: 737
            ),
        ];

    }

}
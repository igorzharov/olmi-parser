<?php

declare(strict_types=1);

namespace App\Parsers;

use App\Entity\Category;

class ParserOvkmCategoriesRepository
{
    public static function getCategories() : array
    {
        return [
            // Водонагреватели
            new Category(
                name: 'Бойлера косвенного нагрева',
                url: 'https://ovkm74.ru/catalog/vodonagrevateli/boylera_kosvennogo_nagreva/',
                remoteId: 1490
            ),
            new Category(
                name: 'Водонагреватели газовые',
                url: 'https://ovkm74.ru/catalog/vodonagrevateli/vodonagrevateli_gazovye/',
                remoteId: 1491
            ),
            new Category(
                name: 'Водонагреватели накопительные',
                url: 'https://ovkm74.ru/catalog/vodonagrevateli/vodonagrevateli_nakopitelnye/',
                remoteId: 1492
            ),
            new Category(
                name: 'Водонагреватели проточные',
                url: 'https://ovkm74.ru/catalog/vodonagrevateli/vodonagrevateli_protochnye/',
                remoteId: 1493
            ),
            // Насосное оборудование
            new Category(
                name: 'Автоматика',
                url: 'https://ovkm74.ru/catalog/nasosnoe_oborudovanie/avtomatika/',
                remoteId: 1494
            ),
            new Category(
                name: 'Гидроаккумуляторы',
                url: 'https://ovkm74.ru/catalog/nasosnoe_oborudovanie/gidroakkumulyatory/',
                remoteId: 1495
            ),
            new Category(
                name: 'Греющий кабель',
                url: 'https://ovkm74.ru/catalog/nasosnoe_oborudovanie/greyushchiy_kabel/',
                remoteId: 1496
            ),
            new Category(
                name: 'Дренажные и фекальные насосы',
                url: 'https://ovkm74.ru/catalog/nasosnoe_oborudovanie/drenazhnye_i_fekalnye_nasosy//',
                remoteId: 1497
            ),
            new Category(
                name: 'Колодезные насосы',
                url: 'https://ovkm74.ru/catalog/nasosnoe_oborudovanie/kolodeznye_nasosy/',
                remoteId: 1498
            ),
            new Category(
                name: 'Мембраны и фланцы',
                url: 'https://ovkm74.ru/catalog/nasosnoe_oborudovanie/membrany_i_flantsy/',
                remoteId: 1499
            ),
            new Category(
                name: 'Насосы повышения давления',
                url: 'https://ovkm74.ru/catalog/nasosnoe_oborudovanie/nasosy_povysheniya_davleniya/',
                remoteId: 1500
            ),
            new Category(
                name: 'Скважинные насосы',
                url: 'https://ovkm74.ru/catalog/nasosnoe_oborudovanie/skvazhinnye_nasosy/',
                remoteId: 1501
            ),
            new Category(
                name: 'Станции и поверхностные насосы',
                url: 'https://ovkm74.ru/catalog/nasosnoe_oborudovanie/stantsii_i_poverkhnostnye_nasosy/',
                remoteId: 1502
            ),
            new Category(
                name: 'Циркуляционные насосы',
                url: 'https://ovkm74.ru/catalog/nasosnoe_oborudovanie/tsirkulyatsionnye_nasosy/',
                remoteId: 1503
            ),
            new Category(
                name: 'Оголовки для скважин',
                url: 'https://ovkm74.ru/catalog/nasosnoe_oborudovanie/ogolovki_dlya_skvazhin/',
                remoteId: 1504
            ),
            new Category(
                name: 'Трос и зажимы',
                url: 'https://ovkm74.ru/catalog/nasosnoe_oborudovanie/tros_i_zazhimy/',
                remoteId: 1505
            ),
            // Водоснабжение
            new Category(
                name: 'Все для сада',
                url: 'https://ovkm74.ru/catalog/vodosnabzhenie/vse_dlya_sada/',
                remoteId: 1506
            ),
            new Category(
                name: 'Комплектующие',
                url: 'https://ovkm74.ru/catalog/vodosnabzhenie/komplektuyushchie/',
                remoteId: 1507
            ),
            new Category(
                name: 'Счетчики воды',
                url: 'https://ovkm74.ru/catalog/vodosnabzhenie/schetchiki_vody/',
                remoteId: 1508
            ),
            new Category(
                name: 'Фильтрация',
                url: 'https://ovkm74.ru/catalog/vodosnabzhenie/filtratsiya/',
                remoteId: 1509
            ),
            // Котлы отопительные
            new Category(
                name: 'Газовые котлы',
                url: 'https://ovkm74.ru/catalog/kotly_otopitelnye/gazovye_kotly/',
                remoteId: 1510
            ),
            new Category(
                name: 'Электрические котлы',
                url: 'https://ovkm74.ru/catalog/kotly_otopitelnye/elektricheskie_kotly/',
                remoteId: 1511
            ),
            new Category(
                name: 'Комплектующие к котлам',
                url: 'https://ovkm74.ru/catalog/kotly_otopitelnye/komplektuyushchie_k_kotlam/',
                remoteId: 1512
            ),
            // Отопление
            new Category(
                name: 'Комплектующие к радиаторам',
                url: 'https://ovkm74.ru/catalog/otoplenie/komplektuyushchie_k_radiatoram/',
                remoteId: 1513
            ),
            new Category(
                name: 'Радиаторы отопления',
                url: 'https://ovkm74.ru/catalog/otoplenie/radiatory_otopleniya/',
                remoteId: 1514
            ),
            new Category(
                name: 'Расширительные баки',
                url: 'https://ovkm74.ru/catalog/otoplenie/rasshiritelnye_baki/',
                remoteId: 1515
            ),
            new Category(
                name: 'Теплоноситель',
                url: 'https://ovkm74.ru/catalog/otoplenie/teplonositel/',
                remoteId: 1516
            ),
            new Category(
                name: 'Электро конвекторы',
                url: 'https://ovkm74.ru/catalog/otoplenie/elektro_konvektory/',
                remoteId: 1517
            ),
            new Category(
                name: 'Теплый пол',
                url: 'https://ovkm74.ru/catalog/otoplenie/teplyy_pol/',
                remoteId: 1518
            ),
            // Трубы, фитинги, теплоизоляция
            new Category(
                name: 'Теплоизоляция для труб',
                url: 'https://ovkm74.ru/catalog/truby_fitingi_teploizolyatsiya/teploizolyatsiya_dlya_trub/',
                remoteId: 1525
            ),
            new Category(
                name: 'Трубы',
                url: 'https://ovkm74.ru/catalog/truby_fitingi_teploizolyatsiya/truby/',
                remoteId: 1526
            ),
            new Category(
                name: 'Фитинги для труб',
                url: 'https://ovkm74.ru/catalog/truby_fitingi_teploizolyatsiya/fitingi_dlya_trub/',
                remoteId: 1527
            ),
            // Смесители
            new Category(
                name: 'Аксессуары',
                url: 'https://ovkm74.ru/catalog/smesiteli/aksessuary_3/',
                remoteId: 1554
            ),
            new Category(
                name: 'Смесители для биде',
                url: 'https://ovkm74.ru/catalog/smesiteli/smesiteli_dlya_bide/',
                remoteId: 1520
            ),
            new Category(
                name: 'Смесители для ванны',
                url: 'https://ovkm74.ru/catalog/smesiteli/smesiteli_dlya_vanny/',
                remoteId: 1521
            ),
            new Category(
                name: 'Смесители для кухни',
                url: 'https://ovkm74.ru/catalog/smesiteli/smesiteli_dlya_kukhni/',
                remoteId: 1522
            ),
            new Category(
                name: 'Смесители для раковины',
                url: 'https://ovkm74.ru/catalog/smesiteli/smesiteli_dlya_rakoviny/',
                remoteId: 1523
            ),
            new Category(
                name: 'Душевые стойки',
                url: 'https://ovkm74.ru/catalog/smesiteli/dushevye_stoyki/',
                remoteId: 1524
            ),
            // Сантехника
            new Category(
                name: 'Аксессуары',
                url: 'https://ovkm74.ru/catalog/santekhnika/aksessuary_1/',
                remoteId: 1536
            ),
            new Category(
                name: 'Арматуры',
                url: 'https://ovkm74.ru/catalog/santekhnika/armatury/',
                remoteId: 1537
            ),
            new Category(
                name: 'Ванны и экраны',
                url: 'https://ovkm74.ru/catalog/santekhnika/vanny_i_ekrany/',
                remoteId: 1538
            ),
            new Category(
                name: 'Душевые кабины',
                url: 'https://ovkm74.ru/catalog/santekhnika/dushevye_kabiny/',
                remoteId: 1539
            ),
            new Category(
                name: 'Зеркала',
                url: 'https://ovkm74.ru/catalog/santekhnika/zerkala/',
                remoteId: 1540
            ),
            new Category(
                name: 'Инсталляции',
                url: 'https://ovkm74.ru/catalog/santekhnika/installyatsii/',
                remoteId: 1541
            ),
            new Category(
                name: 'Карнизы и шторы',
                url: 'https://ovkm74.ru/catalog/santekhnika/karnizy_i_shtory/',
                remoteId: 1542
            ),
            new Category(
                name: 'Коврики',
                url: 'https://ovkm74.ru/catalog/santekhnika/kovriki/',
                remoteId: 1543
            ),
            new Category(
                name: 'Крепеж для фаянса',
                url: 'https://ovkm74.ru/catalog/santekhnika/krepezh_dlya_fayansa/',
                remoteId: 1544
            ),
            new Category(
                name: 'Мойки для кухни',
                url: 'https://ovkm74.ru/catalog/santekhnika/moyki/',
                remoteId: 1545
            ),
            new Category(
                name: 'Писсуары',
                url: 'https://ovkm74.ru/catalog/santekhnika/pissuary/',
                remoteId: 1546
            ),
            new Category(
                name: 'Полотенцесушители',
                url: 'https://ovkm74.ru/catalog/santekhnika/polotentsesushiteli/',
                remoteId: 1547
            ),
            new Category(
                name: 'Прокладки',
                url: 'https://ovkm74.ru/catalog/santekhnika/prokladki_1/',
                remoteId: 1548
            ),
            new Category(
                name: 'Сиденья',
                url: 'https://ovkm74.ru/catalog/santekhnika/sidenya/',
                remoteId: 1549
            ),
            new Category(
                name: 'Тумбы и шкафы',
                url: 'https://ovkm74.ru/catalog/santekhnika/tumby_i_shkafy/',
                remoteId: 1550
            ),
            new Category(
                name: 'Умывальники и пьедесталы',
                url: 'https://ovkm74.ru/catalog/santekhnika/umyvalniki_i_pedestaly/',
                remoteId: 1551
            ),
            new Category(
                name: 'Унитазы, компакты',
                url: 'https://ovkm74.ru/catalog/santekhnika/unitazy_kompakty/',
                remoteId: 1552
            ),
            // Шланги и гибкая подводка - создать категорию внутрки Сантехники
            new Category(
                name: 'Газовая подводка',
                url: 'https://ovkm74.ru/catalog/santekhnika/shlangi_i_gibkaya_podvodka/gazovaya_podvodka/',
                remoteId: 1643
            ),
            new Category(
                name: 'Шланги для стиральных машин',
                url: 'https://ovkm74.ru/catalog/santekhnika/shlangi_i_gibkaya_podvodka/shlangi_dlya_stiralnykh_mashin/',
                remoteId: 1644
            ),
            new Category(
                name: 'Подводка для воды',
                url: 'https://ovkm74.ru/catalog/santekhnika/shlangi_i_gibkaya_podvodka/podvodka_dlya_vody/',
                remoteId: 1645
            ),
            // Бак для воды пластиковый
            new Category(
                name: 'Бак для воды пластиковый',
                url: 'https://ovkm74.ru/catalog/bak_dlya_vody_plastikovyy/',
                remoteId: 1646
            ),
            // Материалы для монтажа
            new Category(
                name: 'Материалы для монтажа',
                url: 'https://ovkm74.ru/catalog/materialy_dlya_montazha/',
                remoteId: 1176
            ),
        ];

    }

}
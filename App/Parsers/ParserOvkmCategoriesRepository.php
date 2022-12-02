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
                remoteId: 0
            ),
            new Category(
                name: 'Водонагреватели газовые',
                url: 'https://ovkm74.ru/catalog/vodonagrevateli/vodonagrevateli_gazovye/',
                remoteId: 0
            ),
            new Category(
                name: 'Водонагреватели накопительные',
                url: 'https://ovkm74.ru/catalog/vodonagrevateli/vodonagrevateli_nakopitelnye/',
                remoteId: 0
            ),
            new Category(
                name: 'Водонагреватели проточные',
                url: 'https://ovkm74.ru/catalog/vodonagrevateli/vodonagrevateli_protochnye/',
                remoteId: 0
            ),
            // Насосное оборудование
            new Category(
                name: 'Автоматика',
                url: 'https://ovkm74.ru/catalog/nasosnoe_oborudovanie/avtomatika/',
                remoteId: 0
            ),
            new Category(
                name: 'Гидроаккумуляторы',
                url: 'https://ovkm74.ru/catalog/nasosnoe_oborudovanie/gidroakkumulyatory/',
                remoteId: 0
            ),
            new Category(
                name: 'Греющий кабель',
                url: 'https://ovkm74.ru/catalog/nasosnoe_oborudovanie/greyushchiy_kabel/',
                remoteId: 0
            ),
            new Category(
                name: 'Дренажные и фекальные насосы',
                url: 'https://ovkm74.ru/catalog/nasosnoe_oborudovanie/drenazhnye_i_fekalnye_nasosy//',
                remoteId: 0
            ),
            new Category(
                name: 'Колодезные насосы',
                url: 'https://ovkm74.ru/catalog/nasosnoe_oborudovanie/kolodeznye_nasosy/',
                remoteId: 0
            ),
            new Category(
                name: 'Мембраны и фланцы',
                url: 'https://ovkm74.ru/catalog/nasosnoe_oborudovanie/membrany_i_flantsy/',
                remoteId: 0
            ),
            new Category(
                name: 'Насосы повышения давления',
                url: 'https://ovkm74.ru/catalog/nasosnoe_oborudovanie/nasosy_povysheniya_davleniya/',
                remoteId: 0
            ),
            new Category(
                name: 'Скважинные насосы',
                url: 'https://ovkm74.ru/catalog/nasosnoe_oborudovanie/skvazhinnye_nasosy/',
                remoteId: 0
            ),
            new Category(
                name: 'Станции и поверхностные насосы',
                url: 'https://ovkm74.ru/catalog/nasosnoe_oborudovanie/stantsii_i_poverkhnostnye_nasosy/',
                remoteId: 0
            ),
            new Category(
                name: 'Циркуляционные насосы',
                url: 'https://ovkm74.ru/catalog/nasosnoe_oborudovanie/tsirkulyatsionnye_nasosy/',
                remoteId: 0
            ),
            new Category(
                name: 'Оголовки для скважин',
                url: 'https://ovkm74.ru/catalog/nasosnoe_oborudovanie/ogolovki_dlya_skvazhin/',
                remoteId: 0
            ),
            new Category(
                name: 'Трос и зажимы',
                url: 'https://ovkm74.ru/catalog/nasosnoe_oborudovanie/tros_i_zazhimy/',
                remoteId: 0
            ),
            // Водоснабжение
            new Category(
                name: 'Все для сада',
                url: 'https://ovkm74.ru/catalog/vodosnabzhenie/vse_dlya_sada/',
                remoteId: 0
            ),
            new Category(
                name: 'Комплектующие',
                url: 'https://ovkm74.ru/catalog/vodosnabzhenie/komplektuyushchie/',
                remoteId: 0
            ),
            new Category(
                name: 'Счетчики воды',
                url: 'https://ovkm74.ru/catalog/vodosnabzhenie/schetchiki_vody/',
                remoteId: 0
            ),
            new Category(
                name: 'Фильтрация',
                url: 'https://ovkm74.ru/catalog/vodosnabzhenie/filtratsiya/',
                remoteId: 0
            ),
            // Котлы отопительные
            new Category(
                name: 'Газовые котлы',
                url: 'https://ovkm74.ru/catalog/kotly_otopitelnye/gazovye_kotly/',
                remoteId: 0
            ),
            new Category(
                name: 'Электрические котлы',
                url: 'https://ovkm74.ru/catalog/kotly_otopitelnye/elektricheskie_kotly/',
                remoteId: 0
            ),
            new Category(
                name: 'Комплектующие к котлам',
                url: 'https://ovkm74.ru/catalog/kotly_otopitelnye/komplektuyushchie_k_kotlam/',
                remoteId: 0
            ),
            // Отопление
            new Category(
                name: 'Комплектующие к радиаторам',
                url: 'https://ovkm74.ru/catalog/otoplenie/komplektuyushchie_k_radiatoram/',
                remoteId: 0
            ),
            new Category(
                name: 'Радиаторы отопления',
                url: 'https://ovkm74.ru/catalog/otoplenie/radiatory_otopleniya/',
                remoteId: 0
            ),
            new Category(
                name: 'Расширительные баки',
                url: 'https://ovkm74.ru/catalog/otoplenie/rasshiritelnye_baki/',
                remoteId: 0
            ),
            new Category(
                name: 'Теплоноситель',
                url: 'https://ovkm74.ru/catalog/otoplenie/teplonositel/',
                remoteId: 0
            ),
            new Category(
                name: 'Электро конвекторы',
                url: 'https://ovkm74.ru/catalog/otoplenie/elektro_konvektory/',
                remoteId: 0
            ),
            new Category(
                name: 'Теплый пол',
                url: 'https://ovkm74.ru/catalog/otoplenie/teplyy_pol/',
                remoteId: 0
            ),
            // Трубы, фитинги, теплоизоляция
            new Category(
                name: 'Теплоизоляция для труб',
                url: 'https://ovkm74.ru/catalog/truby_fitingi_teploizolyatsiya/teploizolyatsiya_dlya_trub/',
                remoteId: 0
            ),
            new Category(
                name: 'Трубы',
                url: 'https://ovkm74.ru/catalog/truby_fitingi_teploizolyatsiya/truby/',
                remoteId: 0
            ),
            new Category(
                name: 'Фитинги для труб',
                url: 'https://ovkm74.ru/catalog/truby_fitingi_teploizolyatsiya/fitingi_dlya_trub/',
                remoteId: 0
            ),
            // Смесители
            new Category(
                name: 'Аксессуары',
                url: 'https://ovkm74.ru/catalog/smesiteli/aksessuary_3/',
                remoteId: 0
            ),
            new Category(
                name: 'Смесители для биде',
                url: 'https://ovkm74.ru/catalog/smesiteli/smesiteli_dlya_bide/',
                remoteId: 0
            ),
            new Category(
                name: 'Смесители для ванны',
                url: 'https://ovkm74.ru/catalog/smesiteli/smesiteli_dlya_vanny/',
                remoteId: 0
            ),
            new Category(
                name: 'Смесители для кухни',
                url: 'https://ovkm74.ru/catalog/smesiteli/smesiteli_dlya_kukhni/',
                remoteId: 0
            ),
            new Category(
                name: 'Смесители для раковины',
                url: 'https://ovkm74.ru/catalog/smesiteli/smesiteli_dlya_rakoviny/',
                remoteId: 0
            ),
            new Category(
                name: 'Душевые стойки',
                url: 'https://ovkm74.ru/catalog/smesiteli/dushevye_stoyki/',
                remoteId: 0
            ),
            // Сантехника
            new Category(
                name: 'Аксессуары',
                url: 'https://ovkm74.ru/catalog/santekhnika/aksessuary_1/',
                remoteId: 0
            ),
            new Category(
                name: 'Арматуры',
                url: 'https://ovkm74.ru/catalog/santekhnika/armatury/',
                remoteId: 0
            ),
            new Category(
                name: 'Ванны и экраны',
                url: 'https://ovkm74.ru/catalog/santekhnika/vanny_i_ekrany/',
                remoteId: 0
            ),
            new Category(
                name: 'Душевые кабины',
                url: 'https://ovkm74.ru/catalog/santekhnika/dushevye_kabiny/',
                remoteId: 0
            ),
            new Category(
                name: 'Зеркала',
                url: 'https://ovkm74.ru/catalog/santekhnika/zerkala/',
                remoteId: 0
            ),
            new Category(
                name: 'Инсталляции',
                url: 'https://ovkm74.ru/catalog/santekhnika/installyatsii/',
                remoteId: 0
            ),
            new Category(
                name: 'Карнизы и шторы',
                url: 'https://ovkm74.ru/catalog/santekhnika/karnizy_i_shtory/',
                remoteId: 0
            ),
            new Category(
                name: 'Коврики',
                url: 'https://ovkm74.ru/catalog/santekhnika/kovriki/',
                remoteId: 0
            ),
            new Category(
                name: 'Крепеж для фаянса',
                url: 'https://ovkm74.ru/catalog/santekhnika/krepezh_dlya_fayansa/',
                remoteId: 0
            ),
            new Category(
                name: 'Мойки',
                url: 'https://ovkm74.ru/catalog/santekhnika/moyki/',
                remoteId: 0
            ),new Category(
                name: 'Писсуары',
                url: 'https://ovkm74.ru/catalog/santekhnika/pissuary/',
                remoteId: 0
            ),
            new Category(
                name: 'Полотенцесушители',
                url: 'https://ovkm74.ru/catalog/santekhnika/polotentsesushiteli/',
                remoteId: 0
            ),
            new Category(
                name: 'Прокладки',
                url: 'https://ovkm74.ru/catalog/santekhnika/prokladki_1/',
                remoteId: 0
            ),
            new Category(
                name: 'Сиденья',
                url: 'https://ovkm74.ru/catalog/santekhnika/sidenya/',
                remoteId: 0
            ),
            new Category(
                name: 'Тумбы и шкафы',
                url: 'https://ovkm74.ru/catalog/santekhnika/tumby_i_shkafy/',
                remoteId: 0
            ),
            new Category(
                name: 'Умывальники и пьедесталы',
                url: 'https://ovkm74.ru/catalog/santekhnika/umyvalniki_i_pedestaly/',
                remoteId: 0
            ),
            new Category(
                name: 'Унитазы, компакты',
                url: 'https://ovkm74.ru/catalog/santekhnika/unitazy_kompakty/',
                remoteId: 0
            ),
            // Шланги и гибкая подводка - создать категорию внутрки Сантехники
            new Category(
                name: 'Газовая подводка',
                url: 'https://ovkm74.ru/catalog/santekhnika/shlangi_i_gibkaya_podvodka/gazovaya_podvodka/',
                remoteId: 0
            ),
            new Category(
                name: 'Шланги для стиральных машин',
                url: 'https://ovkm74.ru/catalog/santekhnika/shlangi_i_gibkaya_podvodka/shlangi_dlya_stiralnykh_mashin/',
                remoteId: 0
            ),
            new Category(
                name: 'Подводка для воды',
                url: 'https://ovkm74.ru/catalog/santekhnika/shlangi_i_gibkaya_podvodka/podvodka_dlya_vody/',
                remoteId: 0
            ),
            // Бак для воды пластиковый
            new Category(
                name: 'Бак для воды пластиковый',
                url: 'https://ovkm74.ru/catalog/bak_dlya_vody_plastikovyy/',
                remoteId: 0
            ),
            // Материалы для монтажа
            new Category(
                name: 'Материалы для монтажа',
                url: 'https://ovkm74.ru/catalog/materialy_dlya_montazha/',
                remoteId: 0
            ),
        ];

    }

}
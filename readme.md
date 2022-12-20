1. Создать таблицы 
php bin/doctrine orm:schema-tool:update --force

2. Запрос удаления товаров по user_id

DELETE p, pd, pi, ptc, ptr, pts FROM oc_product p LEFT JOIN oc_product_description pd ON p.product_id = pd.product_id LEFT JOIN oc_product_image pi ON p.product_id = pi.product_id LEFT JOIN oc_product_to_category ptc ON p.product_id = ptc.product_id LEFT JOIN oc_product_to_renter ptr ON p.product_id = ptr.product_id LEFT JOIN oc_product_to_store pts ON p.product_id = pts.product_id WHERE p.user_id = 162;


DELETE FROM `relations`;
DELETE FROM `categories`;
DELETE FROM `products`;
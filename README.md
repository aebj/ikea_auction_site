# semestereksamen_2




ALL views content:

categories.php:

SELECT auctions.id, items.image, items.title, auctions.expiration, categories.category
FROM auctions
JOIN items
ON auctions.items_id = items.id
JOIN categories
ON categories.id = items.cat_id

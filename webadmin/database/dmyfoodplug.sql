-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2024 at 08:16 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dmyfoodplug`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `user_id` text NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_qty` int(11) NOT NULL,
  `prod_mrsmt_cat` varchar(255) DEFAULT NULL,
  `prod_mrsmt_id` int(11) DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `slug` text DEFAULT NULL,
  `caption` text DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `meta_title` text DEFAULT NULL,
  `meta_keywords` text DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `caption`, `description`, `image`, `meta_title`, `meta_keywords`, `meta_description`, `author`, `status`, `date`) VALUES
(1, 'Fresh Goat Meat', '66ffffc63118f-fresh-goat-meat', 'Fresh Goat Meat', 'Our Fresh Goat Meat provides a versatile and delectable option for any recipe. Carefully sourced from local farms to ensure the highest quality. Enjoy the natural taste and nutritional benefits of goat meat, delivered fresh to your doorstep.', '66ff829a61625.jpeg', 'Goat Meat ', 'Fresh meat, Goat meat, meat sharing, frozen meat, protein ', 'Our Fresh Goat Meat provides a versatile and delectable option for any recipe. Carefully sourced from local farms to ensure the highest quality. Enjoy the natural taste and nutritional benefits of goat meat, delivered fresh to your doorstep.', 'Support Services', 1, '2024-10-01 20:51:47'),
(2, 'All Fresh Meat', '66ffdc97390fc-all-fresh-meat', 'Fresh meat', 'Our premium meat is sourced from grass-fed livestock, ensuring top quality and exceptional taste. Experience the finest selection of fresh meat, including cow meat, goat meat, ram meat, special cuts of cow meat, offals, and more. Perfect for creating hearty, flavorful dishes.\r\n\r\n- 100% Grass-Fed\r\n- No Hormones or Antibiotics\r\n- Rich and Tender\r\n\r\nExperience the best in every bite!', '66ff826858d13.jpeg', 'Fresh Cow meat ', 'Cow meat, fresh meat, meat sharing, Agemawo, cut with skin, Goat meat, Ram meat, Beef ', 'Our premium cow meat is sourced from grass-fed cattle, ensuring top quality and exceptional taste. Enjoy the rich, savory flavor and succulent texture that only high-quality beef can offer.\r\n\r\n- **100% Grass-Fed**\r\n- **No Hormones or Antibiotics**\r\n- **Rich and Tender**\r\n\r\nExperience the best in every bite!', 'Support Services', 0, '2024-10-02 22:14:46'),
(3, 'Fresh Ram meat ', '66ffffa5a715b-fresh-ram-meat', 'Fresh Ram meat ', 'Experience the rich and flavorful taste of our premium ram meat. Sourced from healthy, well-raised rams, our meat is perfect for a variety of dishes. Whether you\'re grilling, roasting, or stewing, our ram meat delivers tenderness and a robust flavor that stands out. Ideal for family meals or special occasions, this high-quality meat promises to elevate your culinary creations.\r\n', '66ff82076fc99.jpeg', 'Fresh Ram meat', 'Ram meat, Agemawo,  lamb meat, meat sharing, fresh, meat', 'Experience the rich and flavorful taste of our premium ram meat. Sourced from healthy, well-raised rams, our meat is perfect for a variety of dishes. Whether you\'re grilling, roasting, or stewing, our ram meat delivers tenderness and a robust flavor that stands out. Ideal for family meals or special occasions, this high-quality meat promises to elevate your culinary creations.\r\n', 'Support Services', 1, '2024-10-02 22:21:48'),
(4, 'Dried Meat Variant', '67050bf32f713-dried-meat-variant', 'Dried Meats', 'Discover the rich taste and convenience of our dried meat/protein. Perfect for snacking, cooking, or as a protein-packed addition to your meals. Enjoy the long shelf life and the intense flavor that comes from careful drying and seasoning.', '66ff025cdcd5d.jpeg', 'Dried Meat', 'Dried cow meat, dried Goat meat, dried Ram meat, export meat ', 'Discover the rich taste and convenience of our dried meat/protein. Perfect for snacking, cooking, or as a protein-packed addition to your meals. Enjoy the long shelf life and the intense flavor that comes from careful drying and seasoning.', 'Support Services', 1, '2024-10-03 20:45:16'),
(5, 'Dried Fish Variants ', '67050c342f81e-dried-fish-variants', 'Dried Fish', 'Savor the unique flavors of our dried fish variant. Perfect for adding a rich, savory taste to your dishes, our dried fish is carefully selected and expertly dried to preserve its natural goodness. Ideal for cooking, snacking, or enhancing your favorite recipes.\r\n', '66ff039bcf0d8.jpeg', 'Dried Fish', 'Dried Fish, Asa fish, Catfish, Bonga fish,  Mangala fish, Panla fish, Crayfish, Sole fish, Inagha fish', 'Savor the unique flavors of our dried fish variant. Perfect for adding a rich, savory taste to your dishes, our dried fish is carefully selected and expertly dried to preserve its natural goodness. Ideal for cooking, snacking, or enhancing your favorite recipes.\r\n', 'Support Services', 1, '2024-10-03 20:50:35'),
(6, 'Frozen Proteins ', '66ff04cfac62b-frozen-proteins', 'Frozen Proteins ', 'Explore our variety of frozen proteins, including Titus fish, shrimp, mackerel fish, chicken sausage, frozen chicken, and turkey. Perfect for any meal, our frozen proteins are carefully selected and frozen to lock in freshness and flavor. Ideal for convenient and nutritious cooking.', '66ff04cfac6b1.jpeg', 'Frozen Proteins ', 'Titus fish, Croaker fish, Chicken, Turkey, Gizzard,  Tilapia fish, Hake Fish, Shrimps, Sausage ', 'Explore our variety of frozen proteins, including Titus fish, shrimp, mackerel fish, chicken sausage, frozen chicken, and turkey. Perfect for any meal, our frozen proteins are carefully selected and frozen to lock in freshness and flavor. Ideal for convenient and nutritious cooking.', 'Support Services', 0, '2024-10-03 20:55:43'),
(7, 'Flour and Grains', '67050d435d572-flour-and-grains', 'Flour and Grains', 'Discover our selection of flours and grains, including yam flour, plantain flour, dried pap, garri, beans, and more. Perfect for diverse culinary needs, our products are carefully processed to ensure quality and taste. Ideal for traditional dishes and everyday cooking.\r\n\r\n', '66ff06e8b122b.jpeg', 'Flour and Grain ', 'Yam flour, Plaintain Flour,  Ijebu Garri, Delta Garri,  Ekiti Garri, White Garri, Honey Beans, Local Rice, Foreign Rice, Peeled Beans ', 'Discover our selection of flours and grains, including yam flour, plantain flour, dried pap, garri, beans, and more. Perfect for diverse culinary needs, our products are carefully processed to ensure quality and taste. Ideal for traditional dishes and everyday cooking.', 'Support Services', 0, '2024-10-03 21:04:40'),
(8, 'Spice and Condiments ', '66ff868e2739d-spice-and-condiments', 'Spice and Condiments ', 'Explore our rich selection of spices and condiments, featuring an array of cooking spices, crayfish, prawns, palm oil, egusi, ogbono, periwinkle, snails, and more. Perfect for adding authentic flavor to your dishes.', '66ff868e27404.jpeg', 'Spice and Condiments ', 'Crayfish, Chili Pepper, Snails, Dried Iru, Locust Beans, Periwinkle, Suya Spice, Cameroon pepper, Palm oil, Kulikuli oil, Egusi, Ogbono, Prawns, Shrimps ', 'Explore our rich selection of spices and condiments, featuring an array of cooking spices, crayfish, prawns, palm oil, egusi, ogbono, periwinkle, snails, and more. Perfect for adding authentic flavor to your dishes.', 'Support Services', 0, '2024-10-04 06:09:18'),
(9, 'Local Snacks and Others', '67050d2d64b95-local-snacks-and-others', 'Local Snacks and Others ', 'Indulge in our delightful range of local snacks, including kulikuli, groundnut, cashew nut, plantain chips, chinchin, and many more. Perfect for satisfying your cravings with a taste of tradition.', '66ff87e8848fb.jpeg', 'Local Snacks ', 'Kulikuli, Groundnut, Cashew nut, Plaintain chips, chinchin', '\"Indulge in our delightful range of local snacks, including kulikuli, groundnut, cashew nut, plantain chips, chinchin, and many more. Perfect for satisfying your cravings with a taste of tradition.\"', 'Support Services', 0, '2024-10-04 06:15:04'),
(10, 'Export Worthy Products', '6714c9a411ee1-export-worthy-products', 'Dried Meat, Fish, Snails, Veggies, Guinea Fowl, Kilishi and more', 'Experience the finest selection of export-worthy foodstuffs, meticulously curated to bring you the authentic taste of home. This package includes an array of high-quality dried meats, fish, vegetables, snails, and a variety of essential food condiments. Each item is carefully processed and packaged to ensure maximum freshness and flavor, making it perfect for anyone who wants to enjoy traditional flavors or share them with loved ones abroad. Our export-worthy foodstuffs are ideal for preparing a wide range of delicious and nutritious meals, ensuring you have everything you need to create a true culinary delight.\r\n\r\n', '6714c9a411f73.png', 'Dried meat, Dried fish, dried snails, dried Veggies ', 'Dried meat, Dried fish, dried snails, dried Veggies ', 'Discover our variety of dried vegetables, including Ugu, Shoko, Ewedu, Utazi, Ukazi, Tete, bitterleaf, and waterleaf. Ideal for enriching your meals with authentic, nutritious flavors.', 'Support Services', 0, '2024-10-04 06:19:51');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `subject` text DEFAULT NULL,
  `message` longtext DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `firstname`, `lastname`, `email`, `phone`, `subject`, `message`, `date`) VALUES
(1, 'Victor', 'Victor', 'victorosaronwafor@gmail.com', '08188059316', 'Nice Products', 'Victor says hi', '2024-10-07 23:19:46'),
(2, 'Alice', 'Ogale', 'alice@gmail.com', '08188059316', 'Grocery Shipping Order', 'Want to confirm Grocery Shipping Order!', '2024-10-07 23:21:22'),
(3, 'Victory', 'Ehikioya', 'victorvictory@gmail.com', '08144345627', 'Invoice Request', 'I demand another Invoice generated for the products I just purchased from your store!', '2024-10-07 23:43:07'),
(4, 'Olaoye', 'Gbemisola', 'olaoyegbemisola46@gmail.com', '08187632426', 'WELDONE', 'Dear my former employee, i am chatting with you from your website, i am loving what i am seeing. \n', '2024-10-21 19:12:50');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `tracking_no` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip_code` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `order_notes` text NOT NULL,
  `total_price` double NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `payment_id` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `tracking_no`, `user_id`, `email`, `first_name`, `last_name`, `country`, `address`, `city`, `state`, `zip_code`, `phone`, `order_notes`, `total_price`, `payment_mode`, `payment_id`, `status`, `date`) VALUES
(1, 'DMY-1q1r5ccs7p4n9pror93suar3o31034', '1q1r5ccs7p4n9pror93suar3o3', 'victorosaronwafor@gmail.com', 'Victory', 'Eseohe', 'Nigeria', 'Kabayi', 'Mararaba', 'Nasarawa State', '911100', '0818805931', '', 68000, 'paystack', '', 'pending', '2024-10-26 14:37:24'),
(2, 'DMY-1q1r5ccs7p4n9pror93suar3o31584', '1q1r5ccs7p4n9pror93suar3o3', 'victorosaronwafor@gmail.com', 'Victory', 'Eseohe', 'Nigeria', 'Kabayi', 'Mararaba', 'Nasarawa State', '911100', '0818805931', '', 68000, 'paystack', '', 'pending', '2024-10-26 14:41:58'),
(3, 'DMY-1q1r5ccs7p4n9pror93suar3o33960', '1q1r5ccs7p4n9pror93suar3o3', 'victorosaronwafor@gmail.com', 'Victory', 'Eseohe', 'Nigeria', 'Kabayi', 'Mararaba', 'Nasarawa State', '911100', '0818805931', '', 68000, 'paystack', '', 'pending', '2024-10-26 14:42:11'),
(4, 'DMY-1q1r5ccs7p4n9pror93suar3o31364', '1q1r5ccs7p4n9pror93suar3o3', 'victorosaronwafor@gmail.com', 'Victory', 'Eseohe', 'Nigeria', 'Kabayi', 'Mararaba', 'Nasarawa State', '911100', '0818805931', '', 68000, 'paystack', '', 'pending', '2024-10-26 14:44:56'),
(5, 'DMY-1q1r5ccs7p4n9pror93suar3o32587', '1q1r5ccs7p4n9pror93suar3o3', 'victorosaronwafor@gmail.com', 'Victory', 'Eseohe', 'Nigeria', 'Kabayi', 'Mararaba', 'Nasarawa State', '911100', '0818805931', '', 142500, 'paystack', '', 'pending', '2024-10-26 14:48:18');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `price`, `date`) VALUES
(1, 1, 1, 2, 22500, '2024-10-26'),
(2, 1, 32, 2, 6000, '2024-10-26'),
(3, 1, 33, 2, 5500, '2024-10-26'),
(4, 2, 1, 2, 22500, '2024-10-26'),
(5, 2, 32, 2, 6000, '2024-10-26'),
(6, 2, 33, 2, 5500, '2024-10-26'),
(7, 3, 1, 2, 22500, '2024-10-26'),
(8, 3, 32, 2, 6000, '2024-10-26'),
(9, 3, 33, 2, 5500, '2024-10-26'),
(10, 4, 1, 2, 22500, '2024-10-26'),
(11, 4, 32, 2, 6000, '2024-10-26'),
(12, 4, 33, 2, 5500, '2024-10-26'),
(13, 5, 1, 5, 22500, '2024-10-26'),
(14, 5, 32, 5, 6000, '2024-10-26');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `tracking_no` varchar(255) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `payment_status` varchar(255) DEFAULT NULL,
  `reference` varchar(255) DEFAULT NULL,
  `channel` varchar(255) DEFAULT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `paid_at` varchar(255) DEFAULT NULL,
  `transaction_date` varchar(255) DEFAULT NULL,
  `customer_code` varchar(255) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `platform` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL COMMENT '0 = Not Paid, 1 = Paid',
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `user_id`, `tracking_no`, `fullname`, `email`, `phone`, `payment_status`, `reference`, `channel`, `ip_address`, `paid_at`, `transaction_date`, `customer_code`, `amount`, `platform`, `status`, `date`) VALUES
(0, '1q1r5ccs7p4n9pror93suar3o3', 'DMY-1q1r5ccs7p4n9pror93suar3o32587', 'Victory Eseohe', 'victorosaronwafor@gmail.com', '0818805931', 'success', 'DMYFoodplug560149383', 'card', '197.211.61.25', '2024-10-27T06:01:54.000Z', '2024-10-27T06:01:48.000Z', 'CUS_y29muz0pepakrty', 145500, 'Paystack', 1, '2024-10-27 08:12:08'),
(0, '1q1r5ccs7p4n9pror93suar3o3', 'DMY-1q1r5ccs7p4n9pror93suar3o32587', 'Victory Eseohe', 'victorosaronwafor@gmail.com', '0818805931', 'success', 'DMYFoodplug899911293', 'card', '197.211.61.25', '2024-10-27T07:13:13.000Z', '2024-10-27T07:13:08.000Z', 'CUS_y29muz0pepakrty', 145500, 'Paystack', 1, '2024-10-27 08:13:16');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `slug` text DEFAULT NULL,
  `caption` text DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `cost_price` int(11) DEFAULT NULL,
  `selling_price` int(11) DEFAULT NULL,
  `price_range` varchar(255) DEFAULT NULL,
  `SKU` varchar(255) DEFAULT NULL,
  `items_in_stock` int(11) DEFAULT NULL,
  `meta_title` text DEFAULT NULL,
  `meta_keywords` text DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `soldout` tinyint(1) NOT NULL DEFAULT 0,
  `trending` tinyint(1) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `slug`, `caption`, `description`, `image`, `cost_price`, `selling_price`, `price_range`, `SKU`, `items_in_stock`, `meta_title`, `meta_keywords`, `meta_description`, `author`, `soldout`, `trending`, `status`, `date`) VALUES
(1, 2, 'Goat Meat Sharing', '6719b1adf3bc2-goat-meat-sharing', 'Full Goat Meat (8-9kg), All part inclusives, Cut with skin.', 'Our Whole Fresh Goat Meat, sourced from trusted local farms. Each goat is processed to preserve its natural taste and quality. Bring home the farm-fresh goodness of goat meat for a nutritious and flavorful meal. Order now for a true culinary delight.', '670d74ef4ccbf.jpg', 0, 45000, 'N45000 - N80000', NULL, 3, 'Goat Meat', 'Goat meat, Ogunfe, meat sharing ', 'Our Whole Fresh Goat Meat, sourced from trusted local farms. Each goat is processed to preserve its natural taste and quality. Bring home the farm-fresh goodness of goat meat for a nutritious and flavorful meal. Order now for a true culinary delight.', 'Victor Osaronwafor', 0, 0, 0, '2024-10-01 21:58:05'),
(2, 7, 'Ijebu Garri ', '6708dce53aaf7-ijebu-garri', 'Ijebu Garri ', 'Ijebu Garri is a premium, finely textured cassava flour known for its distinct sour taste and crispiness. Perfect for making delicious traditional meals or enjoying as a crunchy snack.', '6708dce53ab9b.jpg', NULL, 2500, NULL, NULL, 50, 'Ijebu Garri ', 'Ijebu Garri, White Garri, crunchy Garri, sour taste Garri', 'Ijebu Garri is a premium, finely textured cassava flour known for its distinct sour taste and crispiness. Perfect for making delicious traditional meals or enjoying as a crunchy snack.', 'Support Services', 0, 0, 0, '2024-10-04 08:34:29'),
(3, 8, 'Oron Crayfish ', '670b8c0e41052-oron-crayfish', '600g/Bucket/Clean Crayfish ', 'Oron Akwa-Ibom Crayfish is renowned for its premium quality and rich flavor. Harvested from the pristine waters of Oron, this crayfish is perfect for enhancing the taste of your soups, stews, and sauces with its distinctive aroma and delicious taste.', '6708dc38b1237.jpg', NULL, 7000, NULL, NULL, 100, 'Neat Oron Crayfish ', 'Crayfish, oron crayfish, nembe crayfish, prawns, Shrimps, Periwinkle ', 'Oron Akwa-Ibom Crayfish is renowned for its premium quality and rich flavor. Harvested from the pristine waters of Oron, this crayfish is perfect for enhancing the taste of your soups, stews, and sauces with its distinctive aroma and delicious taste.', 'Support Services', 0, 0, 0, '2024-10-09 10:57:47'),
(4, 8, 'Blended Chilli Pepper ', '670b8bdeab599-blended-chilli-pepper', '200g Chilli Pepper ', 'Blended Chilli Pepper is a finely ground mix of various high-quality chili peppers, offering a balanced heat with a rich, vibrant flavor. Perfect for adding a spicy kick to your favorite dishes, this versatile seasoning enhances the taste of soups, stews, marinades, and more.', '6708de2e7a08e.jpg', NULL, 3000, NULL, NULL, 50, 'Chilli Pepper ', 'Blended Pepper, chilli pepper, pepper  paprika', 'Blended Chilli Pepper is a finely ground mix of various high-quality chili peppers, offering a balanced heat with a rich, vibrant flavor. Perfect for adding a spicy kick to your favorite dishes, this versatile seasoning enhances the taste of soups, stews, marinades, and more.', 'Support Services', 0, 0, 0, '2024-10-11 09:13:34'),
(5, 8, 'Cameroon Pepper ', '670b8bc3103be-cameroon-pepper', '200g Cameroon Pepper ', 'Cameroon pepper is a fiery, aromatic spice native to the West African region. Known for its intense heat and unique smoky flavor, it adds a robust kick to dishes and is a staple in traditional African cuisine. Perfect for seasoning meats, stews, and soups, this spice is a must-have for anyone looking to elevate their cooking with a touch of authentic African heat.', '6708df3a03eae.jpg', NULL, 9000, NULL, NULL, 50, 'Cameroon Pepper ', 'Pepper, Cameroon pepper, nsukka pepper, yellow pepper, red pepper, paprika', 'Cameroon pepper is a fiery, aromatic spice native to the West African region. Known for its intense heat and unique smoky flavor, it adds a robust kick to dishes and is a staple in traditional African cuisine. Perfect for seasoning meats, stews, and soups, this spice is a must-have for anyone looking to elevate their cooking with a touch of authentic African heat.', 'Support Services', 0, 0, 0, '2024-10-11 09:18:02'),
(6, 8, 'Peppersoup Spice ', '670b8b9fd129f-peppersoup-spice', '200g Peppersoup Spice', 'Peppersoup Spice is a flavorful seasoning blend designed to add a rich, aromatic taste to your soups and stews. Perfect for creating authentic Nigerian peppersoup, it combines a variety of herbs and spices for a warm, spicy kick that enhances any dish.', '6708e08414bd9.jpg', NULL, 4000, NULL, NULL, 50, 'Peppersoup Spice ', 'Spice, Peppersoup Spice, pepper, nsuka pepper', 'Peppersoup Spice is a flavorful seasoning blend designed to add a rich, aromatic taste to your soups and stews. Perfect for creating authentic Nigerian peppersoup, it combines a variety of herbs and spices for a warm, spicy kick that enhances any dish.', 'Support Services', 0, 0, 0, '2024-10-11 09:23:32'),
(7, 7, 'Yellow Garri ', '670a1aab84c4e-yellow-garri', 'Agbor/Delta Garri ', 'Delta Yellow Garri is a premium, traditionally processed cassava flour known for its rich yellow color and distinct, slightly tangy flavor. This high-quality garri is perfect for making delicious eba, a popular West African dish, and can also be enjoyed as a crunchy snack or cereal. Ideal for a nutritious and versatile addition to any meal, Delta Yellow Garri is a staple in many homes.', '670a1aab84d26.jpg', NULL, 2500, NULL, NULL, 50, 'Yellow garri', 'Yellow garri, agbor garri, Delta garri, ', 'Delta Yellow Garri is a premium, traditionally processed cassava flour known for its rich yellow color and distinct, slightly tangy flavor. This high-quality garri is perfect for making delicious eba, a popular West African dish, and can also be enjoyed as a crunchy snack or cereal. Ideal for a nutritious and versatile addition to any meal, Delta Yellow Garri is a staple in many homes.', 'Support Services', 0, 0, 0, '2024-10-12 07:43:55'),
(8, 9, 'Roasted Panla Fish ', '6714c76293e05-roasted-panla-fish', '13-15Pcs Panla Fish ', 'Roasted Panla Fish is a savory and flavorful seafood delicacy. The fish is expertly roasted to perfection, offering a crispy outer layer and tender, juicy flesh inside. It\'s seasoned with a blend of spices that enhance its natural taste, making it a delicious choice for seafood lovers. Perfect as a main dish or a tasty addition to any meal, Roasted Panla Fish is a delightful treat that brings the rich flavors of the sea to your table.', '6714c76293efd.jpeg', NULL, 7000, NULL, NULL, 50, 'Roasted Panla ', 'Panla fish, roasted fish, panla kika, dried fish', 'Roasted Panla Fish is a savory and flavorful seafood delicacy. The fish is expertly roasted to perfection, offering a crispy outer layer and tender, juicy flesh inside. It\'s seasoned with a blend of spices that enhance its natural taste, making it a delicious choice for seafood lovers. Perfect as a main dish or a tasty addition to any meal, Roasted Panla Fish is a delightful treat that brings the rich flavors of the sea to your table.', 'Support Services', 0, 0, 0, '2024-10-12 07:54:56'),
(9, 9, 'Groundnut ', '670b8b30adbf7-groundnut', '50cl Bottle Groundnut ', 'Groundnut, commonly known as peanuts, is a type of legume that is rich in protein, healthy fats, and essential nutrients. It is often consumed roasted, boiled, or used in various culinary dishes and snacks. Groundnuts are also a popular ingredient in peanut butter and cooking oils.', '670b8b30adc8b.jpg', NULL, 2000, NULL, NULL, 50, 'Groundnut ', 'Groundnut, Peanut ', 'Groundnut, commonly known as peanuts, is a type of legume that is rich in protein, healthy fats, and essential nutrients. It is often consumed roasted, boiled, or used in various culinary dishes and snacks. Groundnuts are also a popular ingredient in peanut butter and cooking oils.', 'Support Services', 0, 1, 0, '2024-10-13 09:53:37'),
(10, 7, 'Honey Beans ', '670b8d3879c3c-honey-beans', 'Southwest Ewa-Oloyin ', 'Honey Beans are nutritious and rich in protein, fiber, and essential vitamins. Perfect for soups, stews, and traditional recipes.', '670b8d3879cca.jpg', NULL, 5000, NULL, NULL, 50, 'Honey Beans ', 'Honey Beans, Ewa-Oloyin, Beans', 'Honey Beans are nutritious and rich in protein, fiber, and essential vitamins. Perfect for soups, stews, and traditional recipes.', 'Support Services', 0, 0, 0, '2024-10-13 10:04:56'),
(11, 8, 'White Dried Ponmo ', '670b9062023f1-white-dried-ponmo', '100Pcs Medium Size', 'White Dried Ponmo (Cow Skin) is a traditional delicacy made from carefully processed and dried cow skin. It\'s known for its unique texture and is often used in various African dishes. Ponmo is prized for its rich flavor and versatility, adding a distinctive chewiness and depth to soups, stews, and sauces.', '670b9062024aa.jpg', NULL, 6500, NULL, NULL, 50, 'White Dried Ponmo', 'Ponmo, Cow skin', 'White Dried Ponmo (Cow Skin) is a traditional delicacy made from carefully processed and dried cow skin. It\'s known for its unique texture and is often used in various African dishes. Ponmo is prized for its rich flavor and versatility, adding a distinctive chewiness and depth to soups, stews, and sauces.', 'Support Services', 0, 1, 0, '2024-10-13 10:18:26'),
(12, 8, 'Ijebu Dried Ponmo', '670b911b483fe-ijebu-dried-ponmo', '25Pcs Brown Ponmo ', 'Ijebu Ponmo is a premium, carefully processed cow skin delicacy known for its rich, savory flavor and distinct texture. Sourced from the finest cattle, it is a popular ingredient in various traditional Nigerian dishes, adding a unique, chewy consistency that enhances soups, stews, and sauces.', '670b911b48533.jpg', NULL, 10000, NULL, NULL, 50, 'Ijebu Dried Ponmo', 'Ijebu Ponmo, Dried Ponmo, Cow skin ', 'Ijebu Ponmo is a premium, carefully processed cow skin delicacy known for its rich, savory flavor and distinct texture. Sourced from the finest cattle, it is a popular ingredient in various traditional Nigerian dishes, adding a unique, chewy consistency that enhances soups, stews, and sauces.', 'Support Services', 0, 0, 0, '2024-10-13 10:21:31'),
(13, 8, 'Palmoil ', '670b923884e7c-palmoil', 'Akwa-Ibom Palm Oil ', 'Akwa-Ibom Palm Oil is a premium, high-quality palm oil sourced from the fertile lands of Akwa-Ibom in Nigeria. Renowned for its rich, vibrant red color and authentic, natural taste, this palm oil is perfect for traditional cooking, adding depth and flavor to a variety of dishes.', '670b923884ee8.jpg', NULL, 2700, NULL, NULL, 50, 'Palmoil ', 'Palmoil, Virgin oil, unadulterated oil, Akwa-Ibom Palm Oil ', 'Akwa-Ibom Palm Oil is a premium, high-quality palm oil sourced from the fertile lands of Akwa-Ibom in Nigeria. Renowned for its rich, vibrant red color and authentic, natural taste, this palm oil is perfect for traditional cooking, adding depth and flavor to a variety of dishes.', 'Support Services', 0, 0, 0, '2024-10-13 10:26:16'),
(14, 7, 'Yam Flour ', '670b93cec6806-yam-flour', 'Gbodo, Amala dudu', 'Yam Flour (Amala) is a traditional Nigerian food product made from dried and powdered yams. It is commonly used to prepare a thick, smooth, and stretchy dough-like dish called \"Amala,\" which is enjoyed with various soups and stews. Yam Flour (Amala) is known for its rich, earthy flavor and is a staple in many Nigerian households.', '670b93cec6878.jpg', NULL, 3500, NULL, NULL, 50, 'Yam Flour ', 'Yam flour, Gbodo, Amala', 'Yam Flour (Amala) is a traditional Nigerian food product made from dried and powdered yams. It is commonly used to prepare a thick, smooth, and stretchy dough-like dish called \"Amala,\" which is enjoyed with various soups and stews. Yam Flour (Amala) is known for its rich, earthy flavor and is a staple in many Nigerian households.', 'Support Services', 0, 0, 0, '2024-10-13 10:33:02'),
(15, 7, 'Plaintain Flour ', '670b9605bf283-plaintain-flour', 'Plaintain Flour ', 'Plantain Swallow is a traditional West African dish made from plantain flour. It is typically prepared by mixing the flour with hot water to form a smooth, dough-like consistency. Plantain Swallow is often served as a side dish with soups and stews, offering a slightly sweet flavor and a nutritious alternative to other swallows like fufu or garri. It is rich in vitamins and minerals, making it a healthy and delicious addition to any meal.', '670b9605bf376.jpg', NULL, 4500, NULL, NULL, 50, 'Plaintain Flour ', 'Plaintain Flour, Amala, Swallow', 'Plantain Swallow is a traditional West African dish made from plantain flour. It is typically prepared by mixing the flour with hot water to form a smooth, dough-like consistency. Plantain Swallow is often served as a side dish with soups and stews, offering a slightly sweet flavor and a nutritious alternative to other swallows like fufu or garri. It is rich in vitamins and minerals, making it a healthy and delicious addition to any meal.', 'Support Services', 0, 0, 0, '2024-10-13 10:42:29'),
(16, 9, 'Kulikuli ', '670b9705e5dff-kulikuli', 'Spicy & Crunchy Kulikuli ', 'Kulikuli is a traditional West African snack made from groundnut paste. It is typically deep-fried until golden brown, resulting in a crunchy and savory treat. Kulikuli is enjoyed on its own or as a topping for salads and dishes, adding a nutty flavor and satisfying crunch.', '670b9705e5e7f.jpg', NULL, 2000, NULL, NULL, 50, 'Kulikuli ', 'Kulikuli, Groundnut cake, local snacks', 'Kulikuli is a traditional West African snack made from groundnut paste. It is typically deep-fried until golden brown, resulting in a crunchy and savory treat. Kulikuli is enjoyed on its own or as a topping for salads and dishes, adding a nutty flavor and satisfying crunch.', 'Support Services', 0, 0, 0, '2024-10-13 10:46:45'),
(17, 8, 'Yagi Spice ', '670b9882ef4d7-yagi-spice', '200g Suya pepper ', 'Yagi Spice is a unique blend of premium spices designed to elevate your cooking. With a perfect balance of heat and flavor, this versatile seasoning enhances a wide range of dishes, from meats and vegetables to soups and sauces. Made with high-quality ingredients, Yagi Spice brings a delightful kick to your meals, making it a must-have in every kitchen.', '670b9882ef55b.jpg', NULL, 4000, NULL, NULL, 50, 'Yagi Spice', 'Yagi Spice, yaji Spice, suya spice', 'Yagi Spice is a unique blend of premium spices designed to elevate your cooking. With a perfect balance of heat and flavor, this versatile seasoning enhances a wide range of dishes, from meats and vegetables to soups and sauces. Made with high-quality ingredients, Yagi Spice brings a delightful kick to your meals, making it a must-have in every kitchen.', 'Support Services', 0, 0, 0, '2024-10-13 10:53:06'),
(18, 8, 'Dried Locust Beans ', '670b9ab72fc50-dried-locust-beans', 'Dried Iru', 'Locust Beans, also known as carob seeds, are natural legumes harvested from the pods of the carob tree. These beans are commonly used as a flavoring agent, thickening agent, and natural sweetener in various culinary applications. They are rich in dietary fiber and contain beneficial nutrients, making them a popular choice for health-conscious consumers. Locust Beans can be ground into powder for use in baking, smoothies, and snacks or used in their whole form for traditional dishes.', '670b9949bc838.jpg', NULL, 3000, NULL, NULL, 50, 'Dried Iru/Locust Beans ', 'Iru, Locust Beans ', 'Locust Beans, also known as carob seeds, are natural legumes harvested from the pods of the carob tree. These beans are commonly used as a flavoring agent, thickening agent, and natural sweetener in various culinary applications. They are rich in dietary fiber and contain beneficial nutrients, making them a popular choice for health-conscious consumers. Locust Beans can be ground into powder for use in baking, smoothies, and snacks or used in their whole form for traditional dishes.', 'Support Services', 0, 0, 0, '2024-10-13 10:56:25'),
(19, 6, 'Titus Fish ', '670ba85bef73e-titus-fish', '1kg / 3-4Pcs Macherel fish', 'Titus Fish is a healthy and delicious choice for seafood lovers. Enjoy it in a variety of dishes or simply seasoned with herbs and spices for a delightful meal. Ideal for families and gatherings, this versatile fish is sure to impress!', '670ba85bef899.jpg', NULL, 6000, NULL, NULL, 50, 'Titus Fish ', 'Titus Fish, Macherel, fresh fish', 'Titus Fish is a healthy and delicious choice for seafood lovers. Enjoy it in a variety of dishes or simply seasoned with herbs and spices for a delightful meal. Ideal for families and gatherings, this versatile fish is sure to impress!', 'Support Services', 0, 0, 0, '2024-10-13 12:00:43'),
(20, 6, 'Croaker Fish ', '670baa970eb12-croaker-fish', '2kg / 2-4Pcs Croaker Fish ', 'Croaker fish is known for its mild flavor and firm texture. Ideal for grilling, frying, or baking, it offers a healthy source of protein and omega-3 fatty acids. Perfect for any meal, Croaker fish can be seasoned to your taste and served with a variety of sides, making it a favorite for seafood lovers.', '670baa970ec9a.jpg', NULL, 10000, NULL, NULL, 50, 'Croaker Fish', 'Croaker Fish, fresh fish', 'Croaker fish is known for its mild flavor and firm texture. Ideal for grilling, frying, or baking, it offers a healthy source of protein and omega-3 fatty acids. Perfect for any meal, Croaker fish can be seasoned to your taste and served with a variety of sides, making it a favorite for seafood lovers.', 'Support Services', 0, 0, 0, '2024-10-13 12:10:15'),
(21, 6, 'Tilapia Fish ', '670baba4a4079-tilapia-fish', '2kg / 2-4Pcs Tilapia Fish ', 'Our Tilapia fish is a versatile and mild-tasting white fish perfect for various cooking methods. Whether grilled, baked, or sautéed, it\'s rich in protein and low in calories, making it a healthy choice for any meal. Enjoy its flaky texture and light taste, ideal for pairing with your favorite seasonings and sides.', '670baba4a4103.jpg', NULL, 12000, NULL, NULL, 50, 'Tilapia Fish ', 'Tilapia fish', 'Our Tilapia fish is a versatile and mild-tasting white fish perfect for various cooking methods. Whether grilled, baked, or sautéed, it\'s rich in protein and low in calories, making it a healthy choice for any meal. Enjoy its flaky texture and light taste, ideal for pairing with your favorite seasonings and sides.', 'Support Services', 0, 0, 0, '2024-10-13 12:14:44'),
(22, 6, 'Hake Fish ', '670c02c50c7ea-hake-fish', '2kg, 2-4Pcs Hake (Panla) Fish', 'Hake (Panla) fish is a versatile, mild-flavored white fish known for its flaky texture and delicate taste. It is rich in protein and low in fat, making it a healthy choice for a variety of dishes. Hake is ideal for grilling, baking, or frying, and pairs well with a wide range of seasonings and sauces. Enjoy it as a delicious and nutritious addition to your meals.', '670bac987c984.jpg', NULL, 9000, NULL, NULL, 50, 'Hake Fish ', 'Hake fish', 'Hake (Panla) fish is a versatile, mild-flavored white fish known for its flaky texture and delicate taste. It is rich in protein and low in fat, making it a healthy choice for a variety of dishes. Hake is ideal for grilling, baking, or frying, and pairs well with a wide range of seasonings and sauces. Enjoy it as a delicious and nutritious addition to your meals.', 'Support Services', 0, 0, 0, '2024-10-13 12:18:48'),
(23, 6, 'Turkey 306', '670c0244d11a6-turkey-306', '1kg, 3-4Pcs Uncut Frozen Turkey mid wings ', 'This high-quality frozen turkey is perfect for any occasion, offering tender, juicy meat that retains its flavor and moisture during cooking. Available in various sizes to suit your needs, it ensures a delicious, hassle-free dining experience.', '670c0244d1265.jpg', NULL, 9500, NULL, NULL, 50, 'Turkey 306', 'Frozen Turkey 306, Turkey mid wings', 'This high-quality frozen turkey is perfect for any occasion, offering tender, juicy meat that retains its flavor and moisture during cooking. Available in various sizes to suit your needs, it ensures a delicious, hassle-free dining experience.', 'Support Services', 0, 0, 0, '2024-10-13 12:24:45'),
(24, 6, 'Turkey Wings ', '670bb091a6895-turkey-wings', '1kg, 3-4Pcs Uncut Frozen Turkey Wings', 'Tender and juicy turkey wings, individually frozen to lock in freshness. Perfect for roasting, grilling, or adding to your favorite soups and stews. Ideal for family meals or holiday gatherings, these wings are a delicious and versatile addition to any kitchen.', '670baefb5262e.jpg', NULL, 8500, NULL, NULL, 50, 'Turkey Wings ', 'Frozen Turkey Wings', 'Tender and juicy turkey wings, individually frozen to lock in freshness. Perfect for roasting, grilling, or adding to your favorite soups and stews. Ideal for family meals or holiday gatherings, these wings are a delicious and versatile addition to any kitchen.', 'Support Services', 0, 0, 0, '2024-10-13 12:28:59'),
(25, 6, 'Soft Chicken ', '670bb05b173f8-soft-chicken', '1kg,  3-4Pcs Uncut Frozen Chicken mix parts', 'Our Frozen Soft Chicken is expertly sourced, ensuring tender, juicy pieces that are perfect for any dish. Conveniently packaged and frozen to preserve freshness, it\'s ideal for quick meals, whether you\'re grilling, roasting, or adding it to your favorite recipes. Enjoy the wholesome taste of quality chicken any time, right from your freezer!', '670bb05b17647.jpg', NULL, 5000, NULL, NULL, 50, 'Frozen Soft Chicken ', 'Frozen chicken  chicken laps, soft chicken ', 'Our Frozen Soft Chicken is expertly sourced, ensuring tender, juicy pieces that are perfect for any dish. Conveniently packaged and frozen to preserve freshness, it\'s ideal for quick meals, whether you\'re grilling, roasting, or adding it to your favorite recipes. Enjoy the wholesome taste of quality chicken any time, right from your freezer!', 'Support Services', 0, 0, 0, '2024-10-13 12:34:51'),
(26, 6, 'Chicken Sausage ', '670c04bdd270c-chicken-sausage', '10Pcs Pack Chicken sausage ', 'A classic and flavorful sausage made from high-quality meats, seasoned to perfection. Perfect for grilling or boiling, it offers a juicy and savory taste that’s ideal for barbecues, picnics, and quick meals. Enjoy it in a bun with your favorite toppings or as part of various recipes.', '670c04bdd280c.jpg', NULL, 2500, NULL, NULL, 50, 'Chicken Sausage ', 'Sausage, hot dog, chicken sausage ', 'A classic and flavorful sausage made from high-quality meats, seasoned to perfection. Perfect for grilling or boiling, it offers a juicy and savory taste that’s ideal for barbecues, picnics, and quick meals. Enjoy it in a bun with your favorite toppings or as part of various recipes.', 'Support Services', 0, 0, 0, '2024-10-13 18:34:53'),
(27, 6, 'Chicken Gizzard ', '670c05ffbdcf4-chicken-gizzard', '1kg Chicken Gizzard ', 'Chicken gizzards are small, muscular organs found in the digestive tract of chickens. They are known for their rich flavor and chewy texture, often used in various cuisines around the world. Ideal for slow-cooking, frying, or adding to soups and stews, chicken gizzards are a versatile and nutritious addition to your meals.', '670c05ffbdd6f.jpg', NULL, 6500, NULL, NULL, 50, 'Chicken Gizzard ', 'Frozen Gizzard, chicken Gizzard, Turkey Gizzard ', 'Chicken gizzards are small, muscular organs found in the digestive tract of chickens. They are known for their rich flavor and chewy texture, often used in various cuisines around the world. Ideal for slow-cooking, frying, or adding to soups and stews, chicken gizzards are a versatile and nutritious addition to your meals.', 'Support Services', 0, 0, 0, '2024-10-13 18:40:15'),
(28, 6, 'Turkey Gizzard ', '670c06cfcceb1-turkey-gizzard', '1kg Turkey Gizzard ', 'Turkey gizzards are a nutritious and flavorful part of the turkey, often enjoyed for their rich taste and tender texture when cooked properly. These small, muscle-rich organs are perfect for soups, stews, and gravy, offering a delightful addition to various dishes. Packed with protein, vitamins, and minerals, turkey gizzards are a great choice for those seeking a hearty and wholesome ingredient.', '670c06cfccf2a.jpg', NULL, 8000, NULL, NULL, 50, 'Turkey Gizzard ', 'Frozen Gizzard, Turkey Gizzard ', 'Turkey gizzards are a nutritious and flavorful part of the turkey, often enjoyed for their rich taste and tender texture when cooked properly. These small, muscle-rich organs are perfect for soups, stews, and gravy, offering a delightful addition to various dishes. Packed with protein, vitamins, and minerals, turkey gizzards are a great choice for those seeking a hearty and wholesome ingredient.', 'Support Services', 0, 0, 0, '2024-10-13 18:43:43'),
(29, 6, 'Frozen Shrimps ', '670c08a1d301c-frozen-shrimps', '1kg Frozen Shrimps', 'Conveniently packaged and easy to prepare, our frozen shrimps are ideal for seafood lovers looking for quality and convenience.', '670c08a1d3135.jpg', NULL, 6000, NULL, NULL, 50, 'Frozen Shrimps', 'Fresh Shrimps, frozen Shrimps ', 'Conveniently packaged and easy to prepare, our frozen shrimps are ideal for seafood lovers looking for quality and convenience.', 'Support Services', 0, 0, 0, '2024-10-13 18:51:29'),
(30, 2, 'Torso Parts', '670f582ae385c-torso-parts', '1kg Pack of Cow Special Parts', 'Our premium Cow Torso Part is a versatile cut, perfect for a variety of dishes. Expertly butchered and sourced from high-quality beef, this cut is ideal for slow-cooking, roasting, or grilling. Enjoy the rich, succulent flavor and tender texture that will elevate your meals.\r\n\r\n- Weight:** Approx. X lbs/kg\r\n- Cut: Torso and cut with skin\r\n- Quality: Premium, grass-fed\r\n\r\nAdd this to your cart today and experience the taste of quality beef!', '670f582ae3956.png', NULL, 6000, NULL, NULL, 50, 'Cow Torso', 'Torso cut, special part', 'Our premium Cow Torso Part is a versatile cut, perfect for a variety of dishes. Expertly butchered and sourced from high-quality beef, this cut is ideal for slow-cooking, roasting, or grilling. Enjoy the rich, succulent flavor and tender texture that will elevate your meals.\r\n\r\n- Weight:** Approx. X lbs/kg\r\n- Cut: Torso and cut with skin\r\n- Quality: Premium, grass-fed\r\n\r\nAdd this to your cart today and experience the taste of quality beef!', 'Support Services', 0, 0, 0, '2024-10-16 07:07:38'),
(31, 2, 'Muscle Part ', '670f58f040e4e-muscle-part', '1kg of Cow Special Parts', 'Discover the rich, flavorful taste of our premium Cow Muscle Part. Sourced from high-quality, grass-fed cattle, this cut is perfect for slow-cooking, grilling, or braising. Whether you\'re preparing a hearty stew or a savory roast, our Cow Muscle Part delivers tenderness and deliciousness in every bite. Elevate your meals with this versatile and nutritious choice. Order now and experience the difference in quality and taste!', '670f58f040ec7.png', 8000, 6000, NULL, NULL, 50, 'Muscle Part ', 'Cow Muscle parts', 'Discover the rich, flavorful taste of our premium Cow Muscle Part. Sourced from high-quality, grass-fed cattle, this cut is perfect for slow-cooking, grilling, or braising. Whether you\'re preparing a hearty stew or a savory roast, our Cow Muscle Part delivers tenderness and deliciousness in every bite. Elevate your meals with this versatile and nutritious choice. Order now and experience the difference in quality and taste!\r\n\r\n', 'Support Services', 0, 0, 0, '2024-10-16 07:10:56'),
(32, 2, 'Fish Meat Parts', '670f598c835a0-fish-meat-parts', '1kg of Cow Special Parts', 'Discover the rich, flavorful taste of our premium Cow Fish Meat Part. Perfectly cut and prepared, this versatile meat is ideal for a variety of dishes, from hearty stews to delicious grilled entrees. Sourced from the finest quality beef, our Cow Fish Meat Part ensures a tender and juicy experience in every bite. Elevate your meals with this high-quality, protein-packed ingredient. \r\n', '670f598c836ca.png', NULL, 6000, NULL, NULL, 43, 'Fish meat', 'Fish meat part', 'Discover the rich, flavorful taste of our premium Cow Fish Meat Part. Perfectly cut and prepared, this versatile meat is ideal for a variety of dishes, from hearty stews to delicious grilled entrees. Sourced from the finest quality beef, our Cow Fish Meat Part ensures a tender and juicy experience in every bite. Elevate your meals with this high-quality, protein-packed ingredient. \r\n', 'Support Services', 0, 0, 0, '2024-10-16 07:13:32'),
(33, 2, 'Cow Assorted Parts (Offals)', '670f5bdc0e62d-cow-assorted-parts-offals', '1kg Pack of Cow Special Parts ', 'Discover the rich flavors and unique textures of our Cow Assorted Part (Offal). Sourced from high-quality, grass-fed cows, this selection includes a variety of nutritious and delicious offal parts such as liver, heart, kidney, and tripe. Perfect for traditional recipes or adventurous culinary creations, our cow offal promises freshness and quality with every bite. Ideal for those who appreciate the nose-to-tail approach to cooking.\r\n\r\n', '670f5bdc0e69f.png', NULL, 5500, NULL, NULL, 48, 'Cow Assorted ', 'Cow Offals, Cow Assorted ', 'Discover the rich flavors and unique textures of our Cow Assorted Part (Offal). Sourced from high-quality, grass-fed cows, this selection includes a variety of nutritious and delicious offal parts such as liver, heart, kidney, and tripe. Perfect for traditional recipes or adventurous culinary creations, our cow offal promises freshness and quality with every bite. Ideal for those who appreciate the nose-to-tail approach to cooking.\r\n\r\n', 'Support Services', 0, 0, 0, '2024-10-16 07:23:24'),
(34, 9, 'Kilishi ', '6719f63e74a8d-kilishi', 'Spicy and Meaty Kilishi ', 'Nigerian beef jerky, is made from thinly sliced, high-quality beef that is marinated in a special blend of spices and herbs, then slowly dried to perfection. Each bite offers a tantalizing combination of smoky, spicy, and slightly sweet notes that will leave you craving more. Perfect as a snack, appetizer, or protein-packed treat, Kilishi is a delicious way to enjoy a taste of authentic Nigerian cuisine. Savor the taste of tradition with every bite.\r\n\r\n', '6714c65b6f7bd.jpg', 5000, 3000, '', NULL, 50, 'Kilishi ', 'Kilishi ', 'Nigerian beef jerky, is made from thinly sliced, high-quality beef that is marinated in a special blend of spices and herbs, then slowly dried to perfection. Each bite offers a tantalizing combination of smoky, spicy, and slightly sweet notes that will leave you craving more. Perfect as a snack, appetizer, or protein-packed treat, Kilishi is a delicious way to enjoy a taste of authentic Nigerian cuisine. Savor the taste of tradition with every bite.\r\n\r\n', 'Victor Osaronwafor', 0, 0, 0, '2024-10-20 09:53:43');

-- --------------------------------------------------------

--
-- Table structure for table `product_sizes`
--

CREATE TABLE `product_sizes` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `size` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `new_price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `other_info` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `product_sizes`
--

INSERT INTO `product_sizes` (`id`, `product_id`, `size`, `new_price`, `other_info`, `status`, `date`) VALUES
(1, 13, '1L', '2700', '', 0, '2024-10-13 10:27:09'),
(2, 13, '3L', '7500', '', 0, '2024-10-13 10:27:59'),
(3, 13, '5L', '11500', '', 0, '2024-10-13 10:28:40'),
(4, 13, '10L', '23000', '', 0, '2024-10-13 10:29:04');

-- --------------------------------------------------------

--
-- Table structure for table `product_slots`
--

CREATE TABLE `product_slots` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `slot` varchar(255) NOT NULL,
  `new_price` varchar(255) NOT NULL,
  `other_info` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_weights`
--

CREATE TABLE `product_weights` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `weight` varchar(255) NOT NULL,
  `new_price` varchar(255) NOT NULL,
  `other_info` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_weights`
--

INSERT INTO `product_weights` (`id`, `product_id`, `weight`, `new_price`, `other_info`, `status`, `date`) VALUES
(1, 2, '1kg ', '2500', '', 0, '2024-10-12 08:19:04'),
(2, 2, '1kg', '2500', 'Crunchy, Sour taste and Sandfree', 0, '2024-10-12 08:20:15'),
(3, 2, '3kg', '6500', 'Crunchy, Sour taste and Sandfree ', 0, '2024-10-12 08:21:34'),
(4, 2, '5kg', '11000', 'Crunchy, Sour taste and Sandfree ', 0, '2024-10-12 08:22:06'),
(5, 14, '1kg', '3500', '', 0, '2024-10-13 10:33:30'),
(6, 14, '3kg', '9500', '', 0, '2024-10-13 10:33:57'),
(7, 14, '5kg', '16000', '', 0, '2024-10-13 10:34:26'),
(8, 10, '1kg ', '5000', '', 0, '2024-10-13 10:35:29'),
(9, 10, '3kg', '14000', '', 0, '2024-10-13 10:35:58'),
(10, 10, '5kg', '23500', '', 0, '2024-10-13 10:36:40'),
(11, 15, '1kg', '4500', '', 0, '2024-10-13 10:42:54'),
(12, 14, '3kg', '12500', '', 0, '2024-10-13 10:43:22'),
(13, 15, '5kg', '21000', '', 0, '2024-10-13 10:43:51'),
(14, 16, '400g', '2000', '', 0, '2024-10-13 10:48:08'),
(15, 16, '1.2kg', '5500', '', 0, '2024-10-13 10:48:51'),
(16, 16, '1.5kg (Bucket)', '7000', '', 0, '2024-10-13 10:49:25'),
(17, 18, '250g', '3000', '', 0, '2024-10-13 10:56:49'),
(18, 18, '500g', '6000', '', 0, '2024-10-13 10:57:10'),
(19, 18, '1kg ', '12000', '', 0, '2024-10-13 10:57:37'),
(20, 7, '1kg ', '2000', '', 0, '2024-10-13 10:58:30'),
(21, 7, '3kg', '5000', '', 0, '2024-10-13 10:59:06'),
(22, 7, '5kg', '8500', '', 0, '2024-10-13 10:59:29'),
(23, 1, '8kg', '45000', '', 0, '2024-10-14 20:47:05'),
(24, 1, '4kg', '22500', '', 0, '2024-10-14 20:50:54'),
(25, 1, '2kg', '11300', '', 0, '2024-10-14 20:51:52'),
(26, 34, '100g', '3000', '', 0, '2024-10-20 09:54:27'),
(27, 34, '500g', '14000', '', 0, '2024-10-20 09:54:49'),
(28, 34, '1kg ', '28000', '', 0, '2024-10-20 09:55:13'),
(29, 1, '10 KG', '55000', '10 KG', 0, '2024-10-24 03:30:54');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `discount_offer` text DEFAULT NULL,
  `about` longtext DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `office_address` longtext DEFAULT NULL,
  `error_message` text DEFAULT NULL,
  `payment_notice` text DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `linkedIn` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `discount_offer`, `about`, `phone`, `email`, `office_address`, `error_message`, `payment_notice`, `facebook`, `instagram`, `twitter`, `linkedIn`, `youtube`, `logo`, `status`, `date`) VALUES
(1, 'Get 10% Discount Now', 'Welcome to DMY Foodplug, your go-to source for premium fresh and frozen meats. We cater to all your weekly protein needs with high-quality products. As a trusted agrofoods exporter, we serve satisfied clients across Europe and Africa.\r\n\r\nWhat We Offer:\r\n- Fresh and Frozen Meats\r\n- Dried Meat Products\r\n- Reliable Export Services\r\n', '+234 703547 5073', 'dmyfoodplug20@gmail.com', ' Off VON road, Lugbe, Abuja. \r\n\r\n\r\n', 'Unable to receive payments', 'Your order has been received, Go ahead and Make payment for your orders ', 'facebook.com/dmy_foodplug', 'instagram.com/dmy_foodplug', 'twitter.com/dmy_foodplug', '', 'youtube.com', '1727805040.png', 0, '2024-02-23 18:26:51');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` tinyint(1) DEFAULT 0,
  `access` tinyint(1) DEFAULT NULL COMMENT '0 - unrestricted, 1 - restricted\r\n',
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `role`, `access`, `date_created`) VALUES
(1, 'Victor Osaronwafor', 'victorosaronwafor@gmail.com', '$2y$10$thwxjg1y..1YBh4S8HaVBewMPxK2NloJjr1WQHjiCX1x2IJTI73u.', 2, 0, '2024-09-30 08:48:53'),
(2, 'Support Services', 'support@dmyfoodplug.com', '$2y$10$41m2yW6Xi3o81KXuYpxTzeYxDpKFQlVQJFxw.TKIKUHyLnyemYpU2', 2, 0, '2024-10-01 20:35:51');

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(1000) NOT NULL,
  `page_url` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`id`, `ip_address`, `page_url`, `date`) VALUES
(1, '::1', 'http://localhost/dmyfoodplug/index.php', '2024-10-01 17:43:31'),
(2, '::1', 'http://localhost/dmyfoodplug/contact.php', '2024-10-01 17:46:45'),
(3, '197.211.61.27', 'http://dmyfoodplug.com/index.php', '2024-10-01 21:19:36'),
(4, '197.211.61.36', 'http://dmyfoodplug.com/index.php', '2024-10-01 21:32:28'),
(5, '102.89.33.183', 'http://dmyfoodplug.com/index.php', '2024-10-01 21:39:33'),
(6, '66.249.93.3', 'http://dmyfoodplug.com/index.php', '2024-10-01 21:41:18'),
(7, '66.249.93.2', 'http://dmyfoodplug.com/index.php', '2024-10-01 21:41:19'),
(8, '102.89.33.183', 'http://www.dmyfoodplug.com/index.php', '2024-10-01 21:52:15'),
(9, '15.204.142.133', 'http://dmyfoodplug.com/index.php', '2024-10-02 01:05:24'),
(10, '27.79.166.255', 'http://dmyfoodplug.com/index.php', '2024-10-02 02:01:11'),
(11, '5.133.192.138', 'http://dmyfoodplug.com/index.php', '2024-10-02 06:41:57'),
(12, '197.210.53.145', 'http://dmyfoodplug.com/index.php', '2024-10-02 11:15:06'),
(13, '105.112.121.157', 'http://www.dmyfoodplug.com/index.php', '2024-10-02 15:19:39'),
(14, '197.211.61.6', 'http://www.dmyfoodplug.com/index.php', '2024-10-02 17:56:43'),
(15, '137.184.122.40', 'http://dmyfoodplug.com/index.php', '2024-10-02 19:30:42'),
(16, '52.167.144.210', 'http://dmyfoodplug.com/index.php', '2024-10-02 22:14:56'),
(17, '197.210.53.239', 'http://dmyfoodplug.com/index.php', '2024-10-02 23:22:54'),
(18, '197.211.61.20', 'http://dmyfoodplug.com/index.php', '2024-10-03 04:23:29'),
(19, '197.211.61.20', 'http://dmyfoodplug.com/category.php?cat=66fdc5d695319-fresh-cow-meat', '2024-10-03 04:41:03'),
(20, '102.91.71.171', 'http://www.dmyfoodplug.com/index.php', '2024-10-03 07:05:43'),
(21, '102.89.23.237', 'http://www.dmyfoodplug.com/index.php', '2024-10-03 07:35:03'),
(22, '86.172.211.254', 'http://www.dmyfoodplug.com/index.php', '2024-10-03 07:37:24'),
(23, '102.91.71.171', 'http://dmyfoodplug.com/index.php', '2024-10-03 08:10:06'),
(24, '105.112.127.132', 'http://www.dmyfoodplug.com/index.php', '2024-10-03 08:12:28'),
(25, '102.89.42.129', 'http://www.dmyfoodplug.com/index.php', '2024-10-03 08:20:16'),
(26, '102.89.42.129', 'http://www.dmyfoodplug.com/category.php?cat=66fdc5d695319-fresh-cow-meat', '2024-10-03 08:20:58'),
(27, '165.22.231.138', 'http://dmyfoodplug.com/index.php', '2024-10-03 09:21:11'),
(28, '102.89.82.26', 'http://www.dmyfoodplug.com/index.php', '2024-10-03 09:54:39'),
(29, '197.149.94.54', 'http://www.dmyfoodplug.com/index.php', '2024-10-03 10:09:23'),
(30, '197.211.61.6', 'http://www.dmyfoodplug.com/category.php?cat=66fdc77c354e5-fresh-ram-meat', '2024-10-03 10:39:39'),
(31, '34.23.231.79', 'http://dmyfoodplug.com/index.php', '2024-10-03 13:24:59'),
(32, '102.88.81.2', 'http://www.dmyfoodplug.com/index.php', '2024-10-03 14:42:00'),
(33, '174.129.72.193', 'http://dmyfoodplug.com/index.php', '2024-10-03 16:39:10'),
(34, '34.74.196.109', 'http://dmyfoodplug.com/index.php', '2024-10-03 18:03:38'),
(35, '197.210.71.110', 'http://dmyfoodplug.com/index.php', '2024-10-03 19:44:49'),
(36, '102.91.71.206', 'http://dmyfoodplug.com/index.php', '2024-10-03 19:52:10'),
(37, '34.73.223.246', 'http://dmyfoodplug.com/index.php', '2024-10-03 20:03:42'),
(38, '102.88.81.2', 'http://dmyfoodplug.com/index.php', '2024-10-03 20:27:38'),
(39, '105.112.178.144', 'http://www.dmyfoodplug.com/category.php?cat=66fdc77c354e5-fresh-ram-meat', '2024-10-03 21:55:31'),
(40, '35.185.22.245', 'http://dmyfoodplug.com/index.php', '2024-10-03 23:22:57'),
(41, '69.160.160.52', 'http://dmyfoodplug.com/index.php', '2024-10-04 00:09:35'),
(42, '69.160.160.52', 'http://dmyfoodplug.com/category.php?cat=66fdc46610cad-fresh-goat-meat', '2024-10-04 00:10:01'),
(43, '69.160.160.52', 'http://dmyfoodplug.com/category.php?cat=66ff06e8b11a3-flour-and-grain', '2024-10-04 00:10:01'),
(44, '69.160.160.52', 'http://dmyfoodplug.com/category.php?cat=66ff02a7e2817-dried-protein-variant', '2024-10-04 00:10:02'),
(45, '69.160.160.52', 'http://dmyfoodplug.com/category.php?cat=66ff04cfac62b-frozen-proteins', '2024-10-04 00:10:03'),
(46, '69.160.160.52', 'http://dmyfoodplug.com/category.php?cat=66ff039bcf056-dried-fish-variants', '2024-10-04 00:10:03'),
(47, '69.160.160.52', 'http://dmyfoodplug.com/category.php?cat=66fdc5d695319-fresh-cow-meat', '2024-10-04 00:10:03'),
(48, '69.160.160.52', 'http://dmyfoodplug.com/category.php?cat=66fdc77c354e5-fresh-ram-meat', '2024-10-04 00:10:04'),
(49, '102.88.82.94', 'http://dmyfoodplug.com/index.php', '2024-10-04 02:12:50'),
(50, '102.88.82.94', 'http://dmyfoodplug.com/category.php?cat=66ff039bcf056-dried-fish-variants', '2024-10-04 02:13:34'),
(51, '43.155.166.202', 'http://dmyfoodplug.com/index.php', '2024-10-04 04:01:48'),
(52, '43.156.204.134', 'http://dmyfoodplug.com/category.php?cat=66ff039bcf056-dried-fish-variants', '2024-10-04 04:06:02'),
(53, '43.156.204.134', 'http://dmyfoodplug.com/category.php?cat=66fdc46610cad-fresh-goat-meat', '2024-10-04 04:06:03'),
(54, '43.156.204.134', 'http://dmyfoodplug.com/category.php?cat=66ff06e8b11a3-flour-and-grain', '2024-10-04 04:06:03'),
(55, '43.135.142.7', 'http://dmyfoodplug.com/category.php?cat=66fdc77c354e5-fresh-ram-meat', '2024-10-04 04:07:36'),
(56, '123.60.68.42', 'http://dmyfoodplug.com/index.php', '2024-10-04 04:17:23'),
(57, '35.231.144.151', 'http://dmyfoodplug.com/index.php', '2024-10-04 06:27:29'),
(58, '102.89.22.65', 'http://dmyfoodplug.com/index.php', '2024-10-04 06:34:22'),
(59, '102.91.71.122', 'http://dmyfoodplug.com/index.php', '2024-10-04 06:47:50'),
(60, '102.89.23.91', 'http://dmyfoodplug.com/index.php', '2024-10-04 08:01:50'),
(61, '102.89.23.91', 'http://dmyfoodplug.com/category.php?cat=66ff87e884896-local-snacks', '2024-10-04 08:02:51'),
(62, '197.211.61.20', 'http://dmyfoodplug.com/category.php?cat=66ff82076fb84-fresh-ram-meat', '2024-10-04 09:00:58'),
(63, '197.211.61.20', 'http://dmyfoodplug.com/category.php?cat=66ff89076acaf-dried-veggies', '2024-10-04 09:01:06'),
(64, '197.211.61.20', 'http://dmyfoodplug.com/category.php?cat=66ff039bcf056-dried-fish-variants', '2024-10-04 09:01:34'),
(65, '197.211.61.7', 'http://www.dmyfoodplug.com/index.php', '2024-10-04 09:55:27'),
(66, '106.54.200.247', 'http://dmyfoodplug.com/index.php', '2024-10-04 10:39:12'),
(67, '52.167.144.239', 'http://dmyfoodplug.com/index.php', '2024-10-04 10:47:26'),
(68, '52.167.144.190', 'http://dmyfoodplug.com/index.php', '2024-10-04 11:06:38'),
(69, '52.167.144.190', 'http://dmyfoodplug.com/category.php?cat=66ff826858ca7-fresh-cow-meat', '2024-10-04 11:06:38'),
(70, '197.211.58.121', 'http://dmyfoodplug.com/index.php', '2024-10-04 13:02:57'),
(71, '105.112.113.248', 'http://www.dmyfoodplug.com/index.php', '2024-10-04 14:07:40'),
(72, '102.89.68.42', 'http://www.dmyfoodplug.com/index.php', '2024-10-04 14:14:12'),
(73, '102.91.103.203', 'http://www.dmyfoodplug.com/index.php', '2024-10-04 14:15:14'),
(74, '102.91.93.115', 'http://www.dmyfoodplug.com/index.php', '2024-10-04 14:54:00'),
(75, '34.148.211.211', 'http://dmyfoodplug.com/index.php', '2024-10-04 15:20:18'),
(76, '35.237.73.190', 'http://dmyfoodplug.com/category.php?cat=66ff04cfac62b-frozen-proteins', '2024-10-04 15:52:11'),
(77, '35.237.73.190', 'http://dmyfoodplug.com/category.php?cat=66ff87e884896-local-snacks', '2024-10-04 15:52:11'),
(78, '35.237.73.190', 'http://dmyfoodplug.com/category.php?cat=66ff89076acaf-dried-veggies', '2024-10-04 15:52:11'),
(79, '35.237.73.190', 'http://dmyfoodplug.com/category.php?cat=66ffdc97390fc-all-fresh-meat', '2024-10-04 15:52:11'),
(80, '35.237.73.190', 'http://dmyfoodplug.com/index.php', '2024-10-04 15:52:11'),
(81, '104.196.182.86', 'http://dmyfoodplug.com/category.php?cat=66ff87e884896-local-snacks', '2024-10-04 15:59:44'),
(82, '104.196.182.86', 'http://dmyfoodplug.com/category.php?cat=66ff04cfac62b-frozen-proteins', '2024-10-04 15:59:44'),
(83, '104.196.182.86', 'http://dmyfoodplug.com/category.php?cat=66ff89076acaf-dried-veggies', '2024-10-04 15:59:46'),
(84, '104.196.182.86', 'http://dmyfoodplug.com/category.php?cat=66ffdc97390fc-all-fresh-meat', '2024-10-04 15:59:46'),
(85, '104.196.182.86', 'http://dmyfoodplug.com/index.php', '2024-10-04 15:59:46'),
(86, '41.79.67.14', 'http://www.dmyfoodplug.com/index.php', '2024-10-04 16:01:53'),
(87, '104.196.182.86', 'http://dmyfoodplug.com/category.php?cat=66ff039bcf056-dried-fish-variants', '2024-10-04 16:08:05'),
(88, '104.196.182.86', 'http://dmyfoodplug.com/category.php?cat=66ff868e2739d-spice-and-condiments', '2024-10-04 16:12:38'),
(89, '104.196.182.86', 'http://dmyfoodplug.com/category.php?cat=66ff06e8b11a3-flour-and-grain', '2024-10-04 16:18:40'),
(90, '104.196.182.86', 'http://dmyfoodplug.com/category.php?cat=66ff893128226-dried-meat-variant', '2024-10-04 16:18:57'),
(91, '104.196.182.86', 'http://dmyfoodplug.com/category.php?cat=66ff82076fb84-fresh-ram-meat', '2024-10-04 16:20:01'),
(92, '104.196.182.86', 'http://dmyfoodplug.com/category.php?cat=66ff829a615a6-fresh-goat-meat', '2024-10-04 16:24:10'),
(93, '34.138.94.196', 'http://dmyfoodplug.com/index.php', '2024-10-04 17:05:28'),
(94, '105.117.0.243', 'http://www.dmyfoodplug.com/index.php', '2024-10-04 17:30:06'),
(95, '197.210.76.250', 'http://www.dmyfoodplug.com/index.php', '2024-10-04 17:52:55'),
(96, '20.105.137.134', 'http://dmyfoodplug.com/index.php', '2024-10-04 18:40:51'),
(97, '197.210.76.67', 'http://dmyfoodplug.com/index.php', '2024-10-04 19:04:33'),
(98, '105.117.0.238', 'http://dmyfoodplug.com/index.php', '2024-10-04 19:13:34'),
(99, '102.89.82.217', 'http://dmyfoodplug.com/index.php', '2024-10-04 19:14:31'),
(100, '105.117.0.238', 'http://dmyfoodplug.com/category.php?cat=66ffdc97390fc-all-fresh-meat', '2024-10-04 19:15:36'),
(101, '138.197.91.96', 'http://dmyfoodplug.com/index.php', '2024-10-04 19:25:20'),
(102, '35.231.90.164', 'http://dmyfoodplug.com/index.php', '2024-10-04 20:50:33'),
(103, '102.89.47.13', 'http://dmyfoodplug.com/index.php', '2024-10-04 22:05:20'),
(104, '35.243.254.214', 'http://dmyfoodplug.com/index.php', '2024-10-04 22:15:02'),
(105, '104.196.180.62', 'http://dmyfoodplug.com/index.php', '2024-10-04 22:21:47'),
(106, '105.112.114.90', 'http://dmyfoodplug.com/category.php?cat=66ffdc97390fc-all-fresh-meat', '2024-10-05 00:53:45'),
(107, '35.231.37.201', 'http://dmyfoodplug.com/index.php', '2024-10-05 02:46:27'),
(108, '128.90.174.17', 'http://dmyfoodplug.com/index.php', '2024-10-05 05:01:17'),
(109, '43.143.28.57', 'http://dmyfoodplug.com/index.php', '2024-10-05 07:01:06'),
(110, '43.130.32.245', 'http://dmyfoodplug.com/index.php', '2024-10-05 08:14:12'),
(111, '178.254.24.91', 'http://dmyfoodplug.com/index.php', '2024-10-05 08:25:12'),
(112, '34.237.145.247', 'http://dmyfoodplug.com/index.php', '2024-10-05 10:16:39'),
(113, '102.89.68.106', 'http://dmyfoodplug.com/index.php', '2024-10-05 11:39:36'),
(114, '34.215.240.54', 'http://dmyfoodplug.com/index.php', '2024-10-05 12:28:30'),
(115, '34.217.85.4', 'http://dmyfoodplug.com/index.php', '2024-10-05 12:28:30'),
(116, '35.89.113.112', 'http://dmyfoodplug.com/index.php', '2024-10-05 12:28:31'),
(117, '34.210.247.7', 'http://dmyfoodplug.com/index.php', '2024-10-05 12:28:34'),
(118, '34.222.117.90', 'http://dmyfoodplug.com/index.php', '2024-10-05 12:28:35'),
(119, '35.90.173.219', 'http://dmyfoodplug.com/index.php', '2024-10-05 12:28:55'),
(120, '35.88.39.11', 'http://dmyfoodplug.com/index.php', '2024-10-05 12:28:55'),
(121, '34.212.37.7', 'http://dmyfoodplug.com/index.php', '2024-10-05 12:28:56'),
(122, '35.90.106.248', 'http://dmyfoodplug.com/index.php', '2024-10-05 12:34:32'),
(123, '35.90.143.154', 'http://dmyfoodplug.com/index.php', '2024-10-05 12:40:16'),
(124, '43.159.143.187', 'http://dmyfoodplug.com/index.php', '2024-10-05 14:25:26'),
(125, '43.153.93.68', 'http://dmyfoodplug.com/index.php', '2024-10-05 19:10:07'),
(126, '105.112.122.55', 'http://dmyfoodplug.com/category.php?cat=66ffdc97390fc-all-fresh-meat', '2024-10-05 20:46:35'),
(127, '84.17.42.26', 'http://dmyfoodplug.com/index.php', '2024-10-05 22:09:27'),
(128, '49.51.204.74', 'http://dmyfoodplug.com/index.php', '2024-10-05 22:32:51'),
(129, '102.91.92.110', 'http://dmyfoodplug.com/index.php', '2024-10-05 23:29:03'),
(130, '123.207.198.35', 'http://dmyfoodplug.com/index.php', '2024-10-06 00:16:08'),
(131, '3.68.89.5', 'http://dmyfoodplug.com/index.php', '2024-10-06 03:10:31'),
(132, '34.1.22.5', 'http://dmyfoodplug.com/index.php', '2024-10-06 05:43:43'),
(133, '34.1.22.5', 'http://dmyfoodplug.com/category.php?cat=66ff039bcf056-dried-fish-variants', '2024-10-06 05:43:52'),
(134, '34.1.22.5', 'http://dmyfoodplug.com/category.php?cat=66ff868e2739d-spice-and-condiments', '2024-10-06 05:43:52'),
(135, '170.106.197.109', 'http://dmyfoodplug.com/index.php', '2024-10-06 06:45:08'),
(136, '170.106.82.209', 'http://dmyfoodplug.com/index.php', '2024-10-06 12:38:27'),
(137, '54.174.58.232', 'http://dmyfoodplug.com/index.php', '2024-10-06 14:19:15'),
(138, '54.174.58.250', 'http://dmyfoodplug.com/index.php', '2024-10-06 14:19:17'),
(139, '150.109.13.194', 'http://dmyfoodplug.com/index.php', '2024-10-06 16:14:47'),
(140, '205.169.39.226', 'http://dmyfoodplug.com/index.php', '2024-10-06 20:25:45'),
(141, '104.197.69.115', 'http://dmyfoodplug.com/index.php', '2024-10-06 20:25:46'),
(142, '147.182.150.1', 'http://dmyfoodplug.com/index.php', '2024-10-06 20:53:07'),
(143, '34.106.85.54', 'http://dmyfoodplug.com/index.php', '2024-10-06 21:19:40'),
(144, '93.158.90.35', 'http://dmyfoodplug.com/index.php', '2024-10-06 21:50:15'),
(145, '34.133.86.33', 'http://dmyfoodplug.com/index.php', '2024-10-06 22:42:51'),
(146, '199.244.88.231', 'http://dmyfoodplug.com/index.php', '2024-10-06 23:17:27'),
(147, '3.25.98.119', 'http://dmyfoodplug.com/index.php', '2024-10-07 02:43:19'),
(148, '42.236.17.100', 'http://dmyfoodplug.com/index.php', '2024-10-07 12:02:46'),
(149, '197.210.53.240', 'http://dmyfoodplug.com/index.php', '2024-10-07 12:48:00'),
(150, '13.95.133.245', 'http://dmyfoodplug.com/index.php', '2024-10-07 13:14:45'),
(151, '42.236.17.242', 'http://dmyfoodplug.com/index.php', '2024-10-07 13:54:44'),
(152, '197.210.52.178', 'http://dmyfoodplug.com/index.php', '2024-10-07 15:21:45'),
(153, '197.211.61.0', 'http://dmyfoodplug.com/index.php', '2024-10-07 19:55:33'),
(154, '197.211.61.0', 'http://dmyfoodplug.com/category.php?cat=66ff868e2739d-spice-and-condiments', '2024-10-07 19:59:37'),
(155, '44.234.189.244', 'http://dmyfoodplug.com/index.php', '2024-10-08 03:42:38'),
(156, '197.210.54.145', 'http://dmyfoodplug.com/index.php', '2024-10-08 03:47:29'),
(157, '193.233.233.29', 'http://dmyfoodplug.com/index.php', '2024-10-08 09:18:27'),
(158, '5.133.192.133', 'http://dmyfoodplug.com/index.php', '2024-10-08 11:06:10'),
(159, '124.220.171.218', 'http://dmyfoodplug.com/index.php', '2024-10-08 11:30:34'),
(160, '18.201.72.140', 'http://mail.dmyfoodplug.com/index.php', '2024-10-08 11:36:37'),
(161, '87.103.246.30', 'http://dmyfoodplug.com/index.php', '2024-10-08 12:12:13'),
(162, '205.169.39.15', 'http://dmyfoodplug.com/index.php', '2024-10-08 15:11:45'),
(163, '43.130.32.245', 'http://www.dmyfoodplug.com/index.php?option=phpmyadmin2', '2024-10-08 16:22:53'),
(164, '68.183.140.66', 'http://dmyfoodplug.com/index.php', '2024-10-08 20:58:10'),
(165, '34.245.117.61', 'http://mail.dmyfoodplug.com/index.php', '2024-10-08 21:13:52'),
(166, '49.51.243.156', 'http://dmyfoodplug.com/index.php?option=com_fckeditor', '2024-10-09 01:19:36'),
(167, '8.219.233.210', 'http://dmyfoodplug.com/index.php', '2024-10-09 04:27:00'),
(168, '40.88.21.235', 'http://dmyfoodplug.com/index.php', '2024-10-09 04:56:06'),
(169, '47.237.96.150', 'http://dmyfoodplug.com/index.php', '2024-10-09 05:08:40'),
(170, '205.169.39.3', 'http://dmyfoodplug.com/index.php', '2024-10-09 08:10:19'),
(171, '102.90.46.131', 'http://dmyfoodplug.com/index.php', '2024-10-09 10:49:27'),
(172, '42.236.17.107', 'http://dmyfoodplug.com/index.php', '2024-10-09 10:59:26'),
(173, '42.236.12.227', 'http://dmyfoodplug.com/index.php', '2024-10-09 11:47:41'),
(174, '54.174.58.231', 'http://dmyfoodplug.com/index.php', '2024-10-09 16:59:31'),
(175, '113.76.62.176', 'http://dmyfoodplug.com/index.php', '2024-10-10 00:56:15'),
(176, '159.89.27.228', 'http://mail.dmyfoodplug.com/index.php', '2024-10-10 02:09:59'),
(177, '161.35.16.183', 'http://www.dmyfoodplug.com/index.php', '2024-10-10 03:05:48'),
(178, '43.131.44.218', 'http://dmyfoodplug.com/index.php', '2024-10-10 04:30:43'),
(179, '138.68.67.83', 'http://dmyfoodplug.com/index.php', '2024-10-10 21:08:43'),
(180, '34.237.2.198', 'http://dmyfoodplug.com/index.php', '2024-10-11 00:13:25'),
(181, '54.171.202.115', 'http://dmyfoodplug.com/index.php', '2024-10-11 05:14:20'),
(182, '102.91.92.164', 'http://dmyfoodplug.com/index.php', '2024-10-11 07:58:54'),
(183, '197.211.61.28', 'http://www.dmyfoodplug.com/index.php', '2024-10-11 18:22:05'),
(184, '82.196.15.124', 'http://dmyfoodplug.com/index.php', '2024-10-11 21:13:02'),
(185, '197.211.61.48', 'http://dmyfoodplug.com/index.php', '2024-10-11 21:38:10'),
(186, '197.211.61.48', 'http://dmyfoodplug.com/category.php?cat=66ff868e2739d-spice-and-condiments', '2024-10-11 21:47:22'),
(187, '197.211.61.48', 'http://dmyfoodplug.com/products.php', '2024-10-11 21:47:45'),
(188, '197.211.61.48', 'http://dmyfoodplug.com/product.php?prod=6708df3a03e17-cameroon-pepper', '2024-10-11 21:48:07'),
(189, '197.211.61.48', 'http://dmyfoodplug.com/product.php?prod=6708e08414b4b-peppersoup-spice', '2024-10-11 21:48:30'),
(190, '197.211.61.48', 'http://dmyfoodplug.com/shop.php', '2024-10-11 21:48:43'),
(191, '197.211.61.22', 'http://dmyfoodplug.com/index.php', '2024-10-12 01:42:58'),
(192, '197.211.61.22', 'http://dmyfoodplug.com/categories.php', '2024-10-12 01:44:38'),
(193, '68.183.0.27', 'http://mail.dmyfoodplug.com/index.php', '2024-10-12 02:12:48'),
(194, '159.203.58.96', 'http://www.dmyfoodplug.com/index.php', '2024-10-12 02:42:01'),
(195, '102.91.4.113', 'http://dmyfoodplug.com/index.php', '2024-10-12 07:27:46'),
(196, '102.91.4.113', 'http://dmyfoodplug.com/product.php?prod=6708dce53aaf7-ijebu-garri', '2024-10-12 08:22:26'),
(197, '102.91.4.113', 'http://dmyfoodplug.com/product.php?prod=670a1aab84c4e-yellow-garri', '2024-10-12 08:26:45'),
(198, '102.91.4.113', 'http://dmyfoodplug.com/product.php?prod=670a1d40248e5-roasted-panla-fish', '2024-10-12 08:33:48'),
(199, '137.184.161.134', 'http://dmyfoodplug.com/index.php', '2024-10-12 21:35:22'),
(200, '54.174.58.251', 'http://dmyfoodplug.com/index.php', '2024-10-12 22:38:58'),
(201, '102.91.103.66', 'http://dmyfoodplug.com/index.php', '2024-10-12 22:53:42'),
(202, '197.211.61.41', 'http://www.dmyfoodplug.com/index.php', '2024-10-13 08:45:17'),
(203, '197.211.61.41', 'http://www.dmyfoodplug.com/category.php?cat=67050d435d572-flour-and-grains', '2024-10-13 08:45:44'),
(204, '197.211.61.41', 'http://www.dmyfoodplug.com/products.php', '2024-10-13 08:46:14'),
(205, '197.211.61.41', 'http://www.dmyfoodplug.com/category.php?cat=66ff89076acaf-dried-veggies', '2024-10-13 08:47:07'),
(206, '197.211.61.41', 'http://www.dmyfoodplug.com/category.php?cat=67050d2d64b95-local-snacks-and-others', '2024-10-13 08:47:13'),
(207, '197.211.61.41', 'http://www.dmyfoodplug.com/category.php?cat=66ffdc97390fc-all-fresh-meat', '2024-10-13 08:47:30'),
(208, '141.138.213.100', 'http://dmyfoodplug.com/index.php', '2024-10-13 09:24:02'),
(209, '102.91.93.255', 'http://dmyfoodplug.com/index.php', '2024-10-13 09:53:53'),
(210, '102.91.93.255', 'http://dmyfoodplug.com/shop.php', '2024-10-13 09:57:00'),
(211, '102.91.93.255', 'http://dmyfoodplug.com/category.php?cat=66ff868e2739d-spice-and-condiments', '2024-10-13 12:41:42'),
(212, '102.91.93.255', 'http://dmyfoodplug.com/category.php?cat=67050d2d64b95-local-snacks-and-others', '2024-10-13 12:44:10'),
(213, '102.91.93.255', 'http://dmyfoodplug.com/category.php?cat=67050d435d572-flour-and-grains', '2024-10-13 12:44:56'),
(214, '102.91.93.255', 'http://dmyfoodplug.com/category.php?cat=66ff04cfac62b-frozen-proteins', '2024-10-13 12:45:58'),
(215, '102.91.93.255', 'http://dmyfoodplug.com/category.php?cat=66ffdc97390fc-all-fresh-meat', '2024-10-13 12:47:46'),
(216, '34.106.236.78', 'http://dmyfoodplug.com/index.php', '2024-10-13 15:44:26'),
(217, '102.91.93.255', 'http://dmyfoodplug.com/product.php?prod=670a1d40248e5-roasted-panla-fish', '2024-10-13 18:19:31'),
(218, '34.170.5.88', 'http://dmyfoodplug.com/index.php', '2024-10-13 21:22:18'),
(219, '164.92.86.65', 'http://mail.dmyfoodplug.com/index.php', '2024-10-14 01:36:09'),
(220, '164.92.89.189', 'http://www.dmyfoodplug.com/index.php', '2024-10-14 02:08:53'),
(221, '34.75.32.37', 'http://dmyfoodplug.com/index.php', '2024-10-14 10:48:15'),
(222, '104.168.40.28', 'http://dmyfoodplug.com/index.php', '2024-10-14 12:13:36'),
(223, '85.203.49.62', 'http://dmyfoodplug.com/index.php', '2024-10-14 13:40:52'),
(224, '102.91.92.179', 'http://dmyfoodplug.com/index.php', '2024-10-14 13:45:50'),
(225, '102.91.92.179', 'http://dmyfoodplug.com/products.php', '2024-10-14 13:51:47'),
(226, '102.91.92.179', 'http://dmyfoodplug.com/products.php?page=2', '2024-10-14 13:52:03'),
(227, '102.91.92.179', 'http://dmyfoodplug.com/products.php?page=3', '2024-10-14 13:54:11'),
(228, '102.91.92.179', 'http://dmyfoodplug.com/about-us.php', '2024-10-14 13:55:58'),
(229, '102.91.92.179', 'http://dmyfoodplug.com/contact.php', '2024-10-14 13:56:33'),
(230, '102.91.92.179', 'http://dmyfoodplug.com/shop.php', '2024-10-14 13:56:54'),
(231, '102.91.93.220', 'http://dmyfoodplug.com/index.php', '2024-10-14 20:52:11'),
(232, '102.91.93.220', 'http://dmyfoodplug.com/categories.php', '2024-10-14 20:53:34'),
(233, '102.91.93.220', 'http://dmyfoodplug.com/shop.php', '2024-10-14 20:53:47'),
(234, '102.91.93.220', 'http://dmyfoodplug.com/shop.php?page=2', '2024-10-14 20:54:12'),
(235, '102.91.93.220', 'http://dmyfoodplug.com/shop.php?page=3', '2024-10-14 20:55:21'),
(236, '139.59.94.9', 'http://dmyfoodplug.com/index.php', '2024-10-14 21:06:11'),
(237, '38.102.16.5', 'http://dmyfoodplug.com/index.php', '2024-10-15 02:13:36'),
(238, '197.211.61.22', 'http://dmyfoodplug.com/products.php', '2024-10-15 05:26:34'),
(239, '197.211.61.22', 'http://dmyfoodplug.com/products.php?page=2', '2024-10-15 05:26:44'),
(240, '197.211.61.22', 'http://dmyfoodplug.com/product.php?prod=670b911b483fe-ijebu-dried-ponmo', '2024-10-15 05:27:11'),
(241, '197.211.61.22', 'http://dmyfoodplug.com/product.php', '2024-10-15 05:28:01'),
(242, '197.211.61.22', 'http://dmyfoodplug.com/products.php?search=Spice', '2024-10-15 05:28:27'),
(243, '197.211.61.22', 'http://dmyfoodplug.com/category.php?cat=66ff868e2739d-spice-and-condiments', '2024-10-15 05:28:59'),
(244, '197.211.61.22', 'http://dmyfoodplug.com/shop.php', '2024-10-15 05:29:08'),
(245, '102.91.93.220', 'http://dmyfoodplug.com/product.php?prod=670ba85bef73e-titus-fish', '2024-10-15 09:36:45'),
(246, '102.91.93.220', 'http://dmyfoodplug.com/product.php?prod=670baa970eb12-croaker-fish', '2024-10-15 09:37:26'),
(247, '54.174.58.236', 'http://dmyfoodplug.com/index.php', '2024-10-15 10:32:26'),
(248, '43.155.160.173', 'http://dmyfoodplug.com/index.php', '2024-10-16 04:03:15'),
(249, '43.131.39.179', 'http://dmyfoodplug.com/product.php?prod=670c05ffbdcf4-chicken-gizzard', '2024-10-16 04:07:37'),
(250, '43.153.122.30', 'http://dmyfoodplug.com/category.php?cat=66ffdc97390fc-all-fresh-meat', '2024-10-16 04:07:39'),
(251, '43.153.122.30', 'http://dmyfoodplug.com/product.php?prod=670c06cfcceb1-turkey-gizzard', '2024-10-16 04:07:42'),
(252, '152.42.179.157', 'http://dmyfoodplug.com/index.php', '2024-10-16 05:51:29'),
(253, '43.153.122.30', 'http://dmyfoodplug.com/index.php', '2024-10-16 06:04:05'),
(254, '197.210.53.85', 'http://dmyfoodplug.com/product.php?prod=670baa970eb12-croaker-fish', '2024-10-16 07:02:00'),
(255, '197.210.53.85', 'http://dmyfoodplug.com/index.php', '2024-10-16 07:02:10'),
(256, '203.2.64.59', 'http://dmyfoodplug.com/index.php', '2024-10-16 11:47:05'),
(257, '43.135.145.117', 'http://dmyfoodplug.com/index.php', '2024-10-16 13:17:48'),
(258, '34.105.56.145', 'http://dmyfoodplug.com/index.php', '2024-10-16 14:26:56'),
(259, '34.71.70.66', 'http://dmyfoodplug.com/index.php', '2024-10-16 15:00:31'),
(260, '144.126.231.174', 'http://www.dmyfoodplug.com/index.php', '2024-10-16 15:37:04'),
(261, '44.234.125.83', 'http://dmyfoodplug.com/index.php', '2024-10-16 16:10:34'),
(262, '43.130.39.101', 'http://dmyfoodplug.com/index.php', '2024-10-16 16:15:02'),
(263, '43.135.145.117', 'http://dmyfoodplug.com/contact.php', '2024-10-16 16:22:33'),
(264, '43.135.145.117', 'http://dmyfoodplug.com/product.php?prod=670c08a1d301c-frozen-shrimps', '2024-10-16 16:22:51'),
(265, '43.135.145.117', 'http://dmyfoodplug.com/categories.php', '2024-10-16 16:22:53'),
(266, '43.135.145.117', 'http://dmyfoodplug.com/category.php?cat=67050d2d64b95-local-snacks-and-others', '2024-10-16 16:22:54'),
(267, '34.162.246.194', 'http://dmyfoodplug.com/index.php', '2024-10-16 18:04:40'),
(268, '204.15.64.226', 'http://dmyfoodplug.com/index.php', '2024-10-16 18:12:29'),
(269, '43.133.77.208', 'http://dmyfoodplug.com/index.php', '2024-10-16 19:15:14'),
(270, '205.169.39.20', 'http://dmyfoodplug.com/index.php', '2024-10-16 19:28:26'),
(271, '170.106.181.163', 'http://dmyfoodplug.com/product.php?prod=670bb05b173f8-soft-chicken', '2024-10-16 19:30:19'),
(272, '170.106.181.163', 'http://dmyfoodplug.com/product.php?prod=670f58f040e4e-muscle-part', '2024-10-16 19:30:35'),
(273, '170.106.181.163', 'http://dmyfoodplug.com/product.php?prod=670f582ae385c-torso-parts', '2024-10-16 19:30:36'),
(274, '43.135.138.128', 'http://dmyfoodplug.com/category.php?cat=670d1799a3948-export-products', '2024-10-16 19:31:41'),
(275, '43.135.138.128', 'http://dmyfoodplug.com/about-us.php', '2024-10-16 19:31:41'),
(276, '44.222.168.144', 'http://dmyfoodplug.com/index.php', '2024-10-16 19:34:57'),
(277, '104.248.42.112', 'http://dmyfoodplug.com/index.php', '2024-10-16 19:35:50'),
(278, '43.134.142.8', 'http://dmyfoodplug.com/index.php', '2024-10-16 22:18:51'),
(279, '150.109.16.20', 'http://dmyfoodplug.com/index.php', '2024-10-17 01:18:32'),
(280, '43.153.123.4', 'http://dmyfoodplug.com/category.php?cat=66ff04cfac62b-frozen-proteins', '2024-10-17 01:32:20'),
(281, '43.153.123.4', 'http://dmyfoodplug.com/index.php', '2024-10-17 01:32:21'),
(282, '43.153.123.4', 'http://dmyfoodplug.com/category.php?cat=67050d435d572-flour-and-grains', '2024-10-17 01:32:22'),
(283, '43.153.123.4', 'http://dmyfoodplug.com/shop.php', '2024-10-17 01:32:25'),
(284, '43.159.144.16', 'http://dmyfoodplug.com/product.php?prod=670c04bdd270c-chicken-sausage', '2024-10-17 01:33:04'),
(285, '43.133.38.182', 'http://dmyfoodplug.com/index.php', '2024-10-17 04:06:25'),
(286, '43.135.133.194', 'http://dmyfoodplug.com/product.php?prod=670bb091a6895-turkey-wings', '2024-10-17 04:11:05'),
(287, '43.135.133.194', 'http://dmyfoodplug.com/product.php?prod=670f5bdc0e62d-cow-assorted-parts-offals', '2024-10-17 04:11:05'),
(288, '49.51.72.76', 'http://dmyfoodplug.com/category.php?cat=66ff868e2739d-spice-and-condiments', '2024-10-17 04:12:38'),
(289, '49.51.72.76', 'http://dmyfoodplug.com/products.php', '2024-10-17 04:12:39'),
(290, '40.113.118.83', 'http://dmyfoodplug.com/index.php', '2024-10-17 06:13:53'),
(291, '43.159.141.180', 'http://dmyfoodplug.com/index.php', '2024-10-17 07:14:29'),
(292, '111.231.12.66', 'http://dmyfoodplug.com/index.php', '2024-10-17 10:33:58'),
(293, '182.44.8.254', 'http://dmyfoodplug.com/index.php', '2024-10-17 10:34:15'),
(294, '43.163.1.85', 'http://dmyfoodplug.com/index.php', '2024-10-17 14:43:31'),
(295, '43.156.228.27', 'http://dmyfoodplug.com/product.php?prod=670f598c835a0-fish-meat-parts', '2024-10-17 16:16:45'),
(296, '43.156.228.27', 'http://dmyfoodplug.com/category.php?cat=66ffdc97390fc-all-fresh-meat', '2024-10-17 16:16:46'),
(297, '170.106.192.3', 'http://dmyfoodplug.com/product.php?prod=670c06cfcceb1-turkey-gizzard', '2024-10-17 16:20:11'),
(298, '34.205.28.252', 'http://dmyfoodplug.com/index.php', '2024-10-17 16:35:59'),
(299, '135.148.100.196', 'http://mail.dmyfoodplug.com/index.php', '2024-10-17 16:51:13'),
(300, '42.83.147.54', 'http://dmyfoodplug.com/index.php', '2024-10-17 17:05:46'),
(301, '159.223.223.56', 'http://dmyfoodplug.com/index.php', '2024-10-17 17:06:56'),
(302, '66.249.66.83', 'http://www.dmyfoodplug.com/index.php', '2024-10-17 17:14:32'),
(303, '66.249.66.84', 'http://www.dmyfoodplug.com/index.php', '2024-10-17 17:14:32'),
(304, '43.163.8.36', 'http://dmyfoodplug.com/index.php', '2024-10-17 19:16:24'),
(305, '43.130.62.164', 'http://dmyfoodplug.com/contact.php', '2024-10-17 19:30:22'),
(306, '43.130.62.164', 'http://dmyfoodplug.com/category.php?cat=67050d2d64b95-local-snacks-and-others', '2024-10-17 19:30:22'),
(307, '43.159.128.149', 'http://dmyfoodplug.com/product.php?prod=670c08a1d301c-frozen-shrimps', '2024-10-17 19:32:33'),
(308, '43.159.128.149', 'http://dmyfoodplug.com/categories.php', '2024-10-17 19:32:35'),
(309, '104.166.80.205', 'http://dmyfoodplug.com/index.php', '2024-10-17 19:56:59'),
(310, '72.13.62.43', 'http://dmyfoodplug.com/index.php', '2024-10-17 22:30:23'),
(311, '72.13.62.43', 'http://dmyfoodplug.com/about-us.php', '2024-10-17 22:30:24'),
(312, '72.13.62.43', 'http://dmyfoodplug.com/contact.php', '2024-10-17 22:30:25'),
(313, '197.210.77.137', 'http://dmyfoodplug.com/index.php', '2024-10-17 23:25:02'),
(314, '43.135.181.13', 'http://dmyfoodplug.com/index.php', '2024-10-17 23:52:56'),
(315, '104.196.116.189', 'http://dmyfoodplug.com/index.php', '2024-10-18 00:43:42'),
(316, '34.139.235.190', 'http://dmyfoodplug.com/category.php?cat=66ff04cfac62b-frozen-proteins', '2024-10-18 01:14:37'),
(317, '34.139.235.190', 'http://dmyfoodplug.com/product.php?prod=670f5bdc0e62d-cow-assorted-parts-offals', '2024-10-18 01:14:37'),
(318, '34.139.235.190', 'http://dmyfoodplug.com/product.php?prod=670c08a1d301c-frozen-shrimps', '2024-10-18 01:14:37'),
(319, '34.139.235.190', 'http://dmyfoodplug.com/category.php?cat=67050d2d64b95-local-snacks-and-others', '2024-10-18 01:14:37'),
(320, '34.139.235.190', 'http://dmyfoodplug.com/product.php?prod=670c04bdd270c-chicken-sausage', '2024-10-18 01:14:38'),
(321, '34.139.235.190', 'http://dmyfoodplug.com/category.php?cat=66ffdc97390fc-all-fresh-meat', '2024-10-18 01:14:38'),
(322, '34.139.235.190', 'http://dmyfoodplug.com/index.php', '2024-10-18 01:14:39'),
(323, '34.139.235.190', 'http://dmyfoodplug.com/products.php', '2024-10-18 01:14:39'),
(324, '34.139.235.190', 'http://dmyfoodplug.com/product.php?prod=670f598c835a0-fish-meat-parts', '2024-10-18 01:14:54'),
(325, '34.139.235.190', 'http://dmyfoodplug.com/about-us.php', '2024-10-18 01:18:13'),
(326, '34.139.235.190', 'http://dmyfoodplug.com/product.php?prod=670f58f040e4e-muscle-part', '2024-10-18 01:18:14'),
(327, '34.139.235.190', 'http://dmyfoodplug.com/contact.php', '2024-10-18 01:18:23'),
(328, '34.139.235.190', 'http://dmyfoodplug.com/product.php?prod=670f582ae385c-torso-parts', '2024-10-18 01:19:06'),
(329, '34.139.235.190', 'http://dmyfoodplug.com/product.php?prod=670bb05b173f8-soft-chicken', '2024-10-18 01:20:22'),
(330, '34.139.235.190', 'http://dmyfoodplug.com/product.php?prod=670bb091a6895-turkey-wings', '2024-10-18 01:22:13'),
(331, '34.139.235.190', 'http://dmyfoodplug.com/categories.php', '2024-10-18 01:23:06'),
(332, '34.139.235.190', 'http://dmyfoodplug.com/category.php?cat=670d1799a3948-export-products', '2024-10-18 01:23:08'),
(333, '34.139.235.190', 'http://dmyfoodplug.com/product.php?prod=670c06cfcceb1-turkey-gizzard', '2024-10-18 01:23:33'),
(334, '34.139.235.190', 'http://dmyfoodplug.com/category.php?cat=66ff868e2739d-spice-and-condiments', '2024-10-18 01:23:38'),
(335, '34.139.235.190', 'http://dmyfoodplug.com/product.php?prod=670c05ffbdcf4-chicken-gizzard', '2024-10-18 01:26:16'),
(336, '170.106.181.163', 'http://dmyfoodplug.com/category.php?cat=670d1799a3948-export-products', '2024-10-18 01:26:39'),
(337, '43.135.183.82', 'http://dmyfoodplug.com/product.php?prod=670f582ae385c-torso-parts', '2024-10-18 01:29:27'),
(338, '43.135.183.82', 'http://dmyfoodplug.com/product.php?prod=670bb05b173f8-soft-chicken', '2024-10-18 01:29:27'),
(339, '43.135.183.82', 'http://dmyfoodplug.com/product.php?prod=670f58f040e4e-muscle-part', '2024-10-18 01:29:27'),
(340, '43.135.183.82', 'http://dmyfoodplug.com/product.php?prod=670c05ffbdcf4-chicken-gizzard', '2024-10-18 01:29:28'),
(341, '34.139.235.190', 'http://dmyfoodplug.com/shop.php', '2024-10-18 01:33:57'),
(342, '34.139.235.190', 'http://dmyfoodplug.com/category.php?cat=67050d435d572-flour-and-grains', '2024-10-18 01:33:57'),
(343, '34.75.50.37', 'http://dmyfoodplug.com/product.php?prod=670b93cec6806-yam-flour', '2024-10-18 02:59:15'),
(344, '34.75.50.37', 'http://dmyfoodplug.com/product.php?prod=670c0244d11a6-turkey-306', '2024-10-18 02:59:15'),
(345, '34.75.50.37', 'http://dmyfoodplug.com/product.php?prod=670b8bdeab599-blended-chilli-pepper', '2024-10-18 02:59:22'),
(346, '34.75.50.37', 'http://dmyfoodplug.com/product.php?prod=6708dce53aaf7-ijebu-garri', '2024-10-18 02:59:22'),
(347, '34.75.50.37', 'http://dmyfoodplug.com/product.php?prod=670baa970eb12-croaker-fish', '2024-10-18 02:59:23'),
(348, '34.75.50.37', 'http://dmyfoodplug.com/product.php?prod=670d756f6a51a-goat-meat-sharing', '2024-10-18 02:59:23'),
(349, '34.75.50.37', 'http://dmyfoodplug.com/product.php?prod=670b8c0e41052-oron-crayfish', '2024-10-18 02:59:26'),
(350, '34.75.50.37', 'http://dmyfoodplug.com/product.php?prod=670b8b30adbf7-groundnut', '2024-10-18 02:59:26'),
(351, '34.75.50.37', 'http://dmyfoodplug.com/product.php?prod=670b9705e5dff-kulikuli', '2024-10-18 02:59:29'),
(352, '34.75.50.37', 'http://dmyfoodplug.com/shop.php?page=1', '2024-10-18 02:59:29'),
(353, '34.75.50.37', 'http://dmyfoodplug.com/product.php?prod=670b923884e7c-palmoil', '2024-10-18 02:59:29'),
(354, '34.75.50.37', 'http://dmyfoodplug.com/products.php?page=3', '2024-10-18 02:59:29'),
(355, '34.75.50.37', 'http://dmyfoodplug.com/product.php?prod=670b9605bf283-plaintain-flour', '2024-10-18 02:59:29'),
(356, '34.75.50.37', 'http://dmyfoodplug.com/product.php?prod=670ba85bef73e-titus-fish', '2024-10-18 03:02:42'),
(357, '34.75.50.37', 'http://dmyfoodplug.com/product.php?prod=670c02c50c7ea-hake-fish', '2024-10-18 03:03:06'),
(358, '34.75.50.37', 'http://dmyfoodplug.com/product.php?prod=670b9ab72fc50-dried-locust-beans', '2024-10-18 03:03:11'),
(359, '34.75.50.37', 'http://dmyfoodplug.com/product.php?prod=670b8d3879c3c-honey-beans', '2024-10-18 03:04:58'),
(360, '34.75.50.37', 'http://dmyfoodplug.com/products.php?page=2', '2024-10-18 03:05:18'),
(361, '34.75.50.37', 'http://dmyfoodplug.com/shop.php?page=2', '2024-10-18 03:07:57'),
(362, '34.75.50.37', 'http://dmyfoodplug.com/product.php?prod=670b8bc3103be-cameroon-pepper', '2024-10-18 03:08:34'),
(363, '34.75.50.37', 'http://dmyfoodplug.com/product.php?prod=670b9062023f1-white-dried-ponmo', '2024-10-18 03:09:14'),
(364, '34.75.50.37', 'http://dmyfoodplug.com/product.php?prod=670a1aab84c4e-yellow-garri', '2024-10-18 03:09:52'),
(365, '34.75.50.37', 'http://dmyfoodplug.com/product.php?prod=670a1d40248e5-roasted-panla-fish', '2024-10-18 03:11:03'),
(366, '34.75.50.37', 'http://dmyfoodplug.com/products.php?page=1', '2024-10-18 03:11:22'),
(367, '34.75.50.37', 'http://dmyfoodplug.com/product.php?prod=670b911b483fe-ijebu-dried-ponmo', '2024-10-18 03:11:26'),
(368, '34.75.50.37', 'http://dmyfoodplug.com/product.php?prod=670b9882ef4d7-yagi-spice', '2024-10-18 03:13:01'),
(369, '34.75.50.37', 'http://dmyfoodplug.com/product.php?prod=670baba4a4079-tilapia-fish', '2024-10-18 03:13:26'),
(370, '34.75.50.37', 'http://dmyfoodplug.com/shop.php?page=3', '2024-10-18 03:16:01'),
(371, '34.75.50.37', 'http://dmyfoodplug.com/product.php?prod=670b8b9fd129f-peppersoup-spice', '2024-10-18 03:16:01'),
(372, '197.211.61.24', 'http://dmyfoodplug.com/index.php', '2024-10-18 03:49:32'),
(373, '197.211.61.24', 'http://dmyfoodplug.com/product.php?prod=670c0244d11a6-turkey-306', '2024-10-18 03:49:56'),
(374, '43.131.248.209', 'http://dmyfoodplug.com/index.php', '2024-10-18 04:46:57'),
(375, '43.135.130.202', 'http://dmyfoodplug.com/about-us.php', '2024-10-18 04:50:36'),
(376, '104.196.116.189', 'http://dmyfoodplug.com/shop.php?page=2', '2024-10-18 05:09:19'),
(377, '124.220.171.34', 'http://dmyfoodplug.com/index.php', '2024-10-18 09:00:47'),
(378, '170.106.180.246', 'http://dmyfoodplug.com/index.php', '2024-10-18 09:07:55'),
(379, '43.135.134.127', 'http://dmyfoodplug.com/category.php?cat=66ff868e2739d-spice-and-condiments', '2024-10-18 16:19:23'),
(380, '49.51.178.45', 'http://dmyfoodplug.com/index.php', '2024-10-18 16:21:55'),
(381, '49.51.178.45', 'http://dmyfoodplug.com/category.php?cat=66ff04cfac62b-frozen-proteins', '2024-10-18 16:21:56'),
(382, '49.51.178.45', 'http://dmyfoodplug.com/product.php?prod=670f5bdc0e62d-cow-assorted-parts-offals', '2024-10-18 16:21:59'),
(383, '43.130.53.252', 'http://dmyfoodplug.com/index.php', '2024-10-18 16:50:10'),
(384, '125.124.120.34', 'http://www.dmyfoodplug.com/index.php', '2024-10-18 18:35:58'),
(385, '197.211.61.23', 'http://www.dmyfoodplug.com/index.php', '2024-10-18 18:48:45'),
(386, '43.130.37.62', 'http://dmyfoodplug.com/index.php', '2024-10-18 19:15:56'),
(387, '174.138.65.69', 'http://dmyfoodplug.com/index.php', '2024-10-18 19:19:53'),
(388, '49.51.183.220', 'http://dmyfoodplug.com/category.php?cat=67050d435d572-flour-and-grains', '2024-10-18 19:23:37'),
(389, '49.51.183.220', 'http://dmyfoodplug.com/shop.php', '2024-10-18 19:23:37'),
(390, '43.130.16.140', 'http://dmyfoodplug.com/product.php?prod=670c04bdd270c-chicken-sausage', '2024-10-18 19:24:32'),
(391, '43.130.16.140', 'http://dmyfoodplug.com/product.php?prod=670bb091a6895-turkey-wings', '2024-10-18 19:24:33'),
(392, '43.130.16.140', 'http://dmyfoodplug.com/products.php', '2024-10-18 19:24:33'),
(393, '159.223.187.67', 'http://dmyfoodplug.com/index.php', '2024-10-18 20:46:40'),
(394, '185.220.101.39', 'http://dmyfoodplug.com/index.php', '2024-10-18 23:44:21'),
(395, '35.245.238.144', 'http://dmyfoodplug.com/index.php', '2024-10-19 00:15:31'),
(396, '198.235.24.134', 'http://dmyfoodplug.com/index.php', '2024-10-19 01:12:19'),
(397, '43.130.7.211', 'http://dmyfoodplug.com/index.php', '2024-10-19 01:15:28'),
(398, '170.106.148.137', 'http://dmyfoodplug.com/index.php', '2024-10-19 01:43:13'),
(399, '43.131.62.4', 'http://dmyfoodplug.com/index.php', '2024-10-19 04:17:13'),
(400, '43.131.48.214', 'http://dmyfoodplug.com/product.php?prod=670c06cfcceb1-turkey-gizzard', '2024-10-19 04:21:07'),
(401, '49.51.36.179', 'http://dmyfoodplug.com/product.php?prod=670f598c835a0-fish-meat-parts', '2024-10-19 04:23:10'),
(402, '49.51.36.179', 'http://dmyfoodplug.com/category.php?cat=66ffdc97390fc-all-fresh-meat', '2024-10-19 04:23:11'),
(403, '35.171.144.152', 'http://dmyfoodplug.com/index.php', '2024-10-19 04:50:22'),
(404, '35.171.144.152', 'http://www.dmyfoodplug.com/index.php', '2024-10-19 04:50:23'),
(405, '43.156.228.27', 'http://dmyfoodplug.com/index.php', '2024-10-19 10:06:04'),
(406, '202.62.55.199', 'http://dmyfoodplug.com/index.php', '2024-10-19 12:44:06'),
(407, '202.62.55.199', 'http://dmyfoodplug.com/contact.php', '2024-10-19 12:44:09'),
(408, '43.155.136.16', 'http://dmyfoodplug.com/index.php', '2024-10-19 16:16:03'),
(409, '43.156.228.27', 'http://dmyfoodplug.com/category.php?cat=67050d2d64b95-local-snacks-and-others', '2024-10-19 16:22:24'),
(410, '43.159.143.187', 'http://dmyfoodplug.com/categories.php', '2024-10-19 16:23:53'),
(411, '43.159.143.187', 'http://dmyfoodplug.com/contact.php', '2024-10-19 16:23:54'),
(412, '43.130.34.74', 'http://dmyfoodplug.com/product.php?prod=670c08a1d301c-frozen-shrimps', '2024-10-19 16:25:37'),
(413, '129.226.213.145', 'http://dmyfoodplug.com/index.php', '2024-10-19 17:52:43'),
(414, '129.226.146.179', 'http://dmyfoodplug.com/index.php', '2024-10-19 19:17:25'),
(415, '170.106.159.160', 'http://dmyfoodplug.com/product.php?prod=670f582ae385c-torso-parts', '2024-10-19 19:33:45'),
(416, '170.106.104.42', 'http://dmyfoodplug.com/product.php?prod=670bb05b173f8-soft-chicken', '2024-10-19 19:35:02'),
(417, '43.135.129.233', 'http://dmyfoodplug.com/about-us.php', '2024-10-19 19:35:45'),
(418, '43.135.129.233', 'http://dmyfoodplug.com/product.php?prod=670c05ffbdcf4-chicken-gizzard', '2024-10-19 19:35:46'),
(419, '43.135.129.233', 'http://dmyfoodplug.com/product.php?prod=670f58f040e4e-muscle-part', '2024-10-19 19:35:47'),
(420, '197.210.53.111', 'http://dmyfoodplug.com/index.php', '2024-10-19 23:36:10'),
(421, '49.51.206.130', 'http://dmyfoodplug.com/index.php', '2024-10-20 01:17:07'),
(422, '170.106.197.109', 'http://dmyfoodplug.com/category.php?cat=670d1799a3948-export-products', '2024-10-20 01:23:16'),
(423, '43.135.182.43', 'http://dmyfoodplug.com/index.php', '2024-10-20 01:30:58'),
(424, '43.135.182.43', 'http://dmyfoodplug.com/category.php?cat=66ff04cfac62b-frozen-proteins', '2024-10-20 01:30:58'),
(425, '198.235.24.156', 'http://dmyfoodplug.com/index.php', '2024-10-20 01:31:39'),
(426, '43.130.16.140', 'http://dmyfoodplug.com/index.php', '2024-10-20 03:14:17'),
(427, '119.96.24.54', 'http://dmyfoodplug.com/index.php', '2024-10-20 03:22:04'),
(428, '130.255.166.26', 'http://dmyfoodplug.com/index.php', '2024-10-20 03:23:30'),
(429, '8.41.221.49', 'http://dmyfoodplug.com/index.php', '2024-10-20 03:48:16'),
(430, '170.106.140.110', 'http://dmyfoodplug.com/category.php?cat=66ff868e2739d-spice-and-condiments', '2024-10-20 04:29:41'),
(431, '170.106.140.110', 'http://dmyfoodplug.com/product.php?prod=670f5bdc0e62d-cow-assorted-parts-offals', '2024-10-20 04:29:41'),
(432, '170.106.148.137', 'http://dmyfoodplug.com/product.php?prod=670b9882ef4d7-yagi-spice', '2024-10-20 04:33:55'),
(433, '170.106.148.137', 'http://dmyfoodplug.com/product.php?prod=670b9ab72fc50-dried-locust-beans', '2024-10-20 04:33:56'),
(434, '205.169.39.14', 'http://dmyfoodplug.com/index.php', '2024-10-20 05:30:31'),
(435, '205.169.39.179', 'http://dmyfoodplug.com/index.php', '2024-10-20 05:30:41'),
(436, '81.36.128.20', 'http://dmyfoodplug.com/index.php', '2024-10-20 08:29:28'),
(437, '146.190.155.23', 'http://mail.dmyfoodplug.com/index.php', '2024-10-20 09:09:29'),
(438, '197.210.53.229', 'http://dmyfoodplug.com/index.php', '2024-10-20 09:45:10'),
(439, '197.210.53.229', 'http://dmyfoodplug.com/contact.php', '2024-10-20 10:00:29'),
(440, '197.210.53.229', 'http://dmyfoodplug.com/products.php?search=Roasted+Panla+', '2024-10-20 10:04:17'),
(441, '197.210.53.229', 'http://dmyfoodplug.com/category.php?cat=6714c9a411ee1-export-worthy-products', '2024-10-20 10:14:38'),
(442, '43.135.182.95', 'http://dmyfoodplug.com/index.php', '2024-10-20 11:32:29'),
(443, '43.134.190.89', 'http://dmyfoodplug.com/index.php', '2024-10-20 16:22:21'),
(444, '170.106.179.68', 'http://dmyfoodplug.com/category.php?cat=66ffdc97390fc-all-fresh-meat', '2024-10-20 16:29:01'),
(445, '170.106.179.68', 'http://dmyfoodplug.com/category.php?cat=6714c9a411ee1-export-worthy-products', '2024-10-20 16:29:11'),
(446, '170.106.179.68', 'http://dmyfoodplug.com/product.php?prod=6714c65b6f75c-kilishi', '2024-10-20 16:29:13'),
(447, '170.106.179.68', 'http://dmyfoodplug.com/product.php?prod=670c04bdd270c-chicken-sausage', '2024-10-20 16:29:15'),
(448, '43.159.128.149', 'http://dmyfoodplug.com/index.php', '2024-10-20 19:09:29'),
(449, '170.106.192.208', 'http://dmyfoodplug.com/product.php?prod=670c08a1d301c-frozen-shrimps', '2024-10-20 19:19:54'),
(450, '170.106.192.208', 'http://dmyfoodplug.com/contact.php', '2024-10-20 19:19:54'),
(451, '170.106.192.208', 'http://dmyfoodplug.com/category.php?cat=67050d435d572-flour-and-grains', '2024-10-20 19:19:56'),
(452, '170.106.192.208', 'http://dmyfoodplug.com/product.php?prod=670f598c835a0-fish-meat-parts', '2024-10-20 19:19:58'),
(453, '170.106.192.208', 'http://dmyfoodplug.com/shop.php', '2024-10-20 19:19:58'),
(454, '165.232.183.216', 'http://dmyfoodplug.com/index.php', '2024-10-20 20:53:34'),
(455, '206.168.34.36', 'http://dmyfoodplug.com/index.php', '2024-10-20 22:18:59'),
(456, '150.109.253.34', 'http://dmyfoodplug.com/index.php', '2024-10-21 01:19:06'),
(457, '49.51.233.46', 'http://dmyfoodplug.com/category.php?cat=67050d2d64b95-local-snacks-and-others', '2024-10-21 01:33:22'),
(458, '49.51.233.46', 'http://dmyfoodplug.com/categories.php', '2024-10-21 01:33:25'),
(459, '43.128.100.220', 'http://dmyfoodplug.com/index.php', '2024-10-21 04:17:22'),
(460, '170.106.148.137', 'http://dmyfoodplug.com/product.php?prod=670f582ae385c-torso-parts', '2024-10-21 04:22:46'),
(461, '170.106.148.137', 'http://dmyfoodplug.com/product.php?prod=670c06cfcceb1-turkey-gizzard', '2024-10-21 04:22:46'),
(462, '43.159.143.187', 'http://dmyfoodplug.com/products.php', '2024-10-21 04:24:49'),
(463, '43.159.143.187', 'http://dmyfoodplug.com/about-us.php', '2024-10-21 04:24:49'),
(464, '43.159.143.187', 'http://dmyfoodplug.com/product.php?prod=670f58f040e4e-muscle-part', '2024-10-21 04:24:49'),
(465, '49.51.179.103', 'http://dmyfoodplug.com/index.php', '2024-10-21 05:21:23'),
(466, '193.37.254.35', 'http://dmyfoodplug.com/index.php?author=1', '2024-10-21 06:10:53'),
(467, '34.21.33.54', 'http://dmyfoodplug.com/index.php', '2024-10-21 06:41:16'),
(468, '84.32.41.136', 'http://dmyfoodplug.com/index.php', '2024-10-21 07:08:36'),
(469, '84.32.41.136', 'http://dmyfoodplug.com/contact.php', '2024-10-21 07:08:37'),
(470, '121.4.105.222', 'http://dmyfoodplug.com/index.php', '2024-10-21 07:21:29'),
(471, '152.32.164.115', 'http://dmyfoodplug.com/index.php', '2024-10-21 08:45:16'),
(472, '197.210.71.124', 'http://dmyfoodplug.com/index.php', '2024-10-21 16:01:42'),
(473, '43.128.110.17', 'http://dmyfoodplug.com/index.php', '2024-10-21 16:16:58'),
(474, '43.156.228.27', 'http://dmyfoodplug.com/category.php?cat=66ff04cfac62b-frozen-proteins', '2024-10-21 16:26:03'),
(475, '43.134.141.244', 'http://dmyfoodplug.com/category.php?cat=66ff868e2739d-spice-and-condiments', '2024-10-21 16:26:45'),
(476, '43.134.141.244', 'http://dmyfoodplug.com/product.php?prod=670c05ffbdcf4-chicken-gizzard', '2024-10-21 16:26:45'),
(477, '43.134.141.244', 'http://dmyfoodplug.com/index.php', '2024-10-21 16:26:48'),
(478, '42.83.147.55', 'http://dmyfoodplug.com/index.php', '2024-10-21 17:47:41'),
(479, '197.211.61.42', 'http://www.dmyfoodplug.com/index.php', '2024-10-21 19:05:22'),
(480, '197.211.61.42', 'http://www.dmyfoodplug.com/categories.php', '2024-10-21 19:07:13'),
(481, '197.211.61.42', 'http://www.dmyfoodplug.com/shop.php', '2024-10-21 19:07:22'),
(482, '197.211.61.42', 'http://www.dmyfoodplug.com/shop.php?page=2', '2024-10-21 19:07:51'),
(483, '197.211.61.42', 'http://www.dmyfoodplug.com/shop.php?page=3', '2024-10-21 19:10:14'),
(484, '197.211.61.42', 'http://www.dmyfoodplug.com/contact.php', '2024-10-21 19:10:38'),
(485, '43.130.47.136', 'http://dmyfoodplug.com/index.php', '2024-10-21 19:12:37'),
(486, '43.156.228.27', 'http://dmyfoodplug.com/category.php?cat=6714c9a411ee1-export-worthy-products', '2024-10-21 19:18:41'),
(487, '43.156.228.27', 'http://dmyfoodplug.com/product.php?prod=6714c65b6f75c-kilishi', '2024-10-21 19:18:42'),
(488, '43.130.3.122', 'http://dmyfoodplug.com/product.php?prod=670c04bdd270c-chicken-sausage', '2024-10-21 19:20:24'),
(489, '121.5.231.252', 'http://dmyfoodplug.com/index.php', '2024-10-21 21:19:20'),
(490, '43.135.140.225', 'http://dmyfoodplug.com/index.php', '2024-10-21 21:37:52'),
(491, '175.6.217.4', 'http://dmyfoodplug.com/index.php', '2024-10-21 22:48:18'),
(492, '20.229.51.198', 'http://dmyfoodplug.com/index.php', '2024-10-21 23:17:31'),
(493, '43.130.31.48', 'http://dmyfoodplug.com/index.php', '2024-10-22 01:28:17'),
(494, '170.106.140.110', 'http://dmyfoodplug.com/contact.php', '2024-10-22 01:38:51'),
(495, '170.106.140.110', 'http://dmyfoodplug.com/product.php?prod=670c08a1d301c-frozen-shrimps', '2024-10-22 01:38:54'),
(496, '170.106.140.110', 'http://dmyfoodplug.com/product.php?prod=670f598c835a0-fish-meat-parts', '2024-10-22 01:38:55'),
(497, '170.106.140.110', 'http://dmyfoodplug.com/category.php?cat=67050d435d572-flour-and-grains', '2024-10-22 01:38:56'),
(498, '195.211.77.142', 'http://dmyfoodplug.com/index.php', '2024-10-22 03:08:11'),
(499, '43.128.100.206', 'http://dmyfoodplug.com/index.php', '2024-10-22 05:08:34'),
(500, '170.106.82.209', 'http://dmyfoodplug.com/shop.php', '2024-10-22 05:13:03'),
(501, '43.128.67.187', 'http://dmyfoodplug.com/shop.php?page=2', '2024-10-22 05:16:05'),
(502, '43.128.67.187', 'http://dmyfoodplug.com/product.php?prod=670bb091a6895-turkey-wings', '2024-10-22 05:16:07'),
(503, '43.128.67.187', 'http://dmyfoodplug.com/shop.php?page=3', '2024-10-22 05:16:09'),
(504, '43.153.110.177', 'http://dmyfoodplug.com/index.php', '2024-10-22 07:42:14'),
(505, '102.91.93.43', 'http://dmyfoodplug.com/index.php', '2024-10-22 08:56:07'),
(506, '43.135.185.59', 'http://dmyfoodplug.com/index.php', '2024-10-22 15:13:30'),
(507, '43.133.72.69', 'http://dmyfoodplug.com/index.php', '2024-10-22 16:17:11'),
(508, '43.135.142.7', 'http://dmyfoodplug.com/product.php?prod=670c06cfcceb1-turkey-gizzard', '2024-10-22 16:23:42'),
(509, '43.135.142.7', 'http://dmyfoodplug.com/products.php', '2024-10-22 16:23:49'),
(510, '170.106.140.110', 'http://dmyfoodplug.com/category.php?cat=67050d2d64b95-local-snacks-and-others', '2024-10-22 16:29:26'),
(511, '52.31.52.167', 'http://dmyfoodplug.com/index.php', '2024-10-22 19:04:56'),
(512, '37.139.12.33', 'http://dmyfoodplug.com/index.php', '2024-10-22 19:17:54'),
(513, '43.157.22.57', 'http://dmyfoodplug.com/index.php', '2024-10-22 19:26:14'),
(514, '43.157.22.57', 'http://dmyfoodplug.com/product.php?prod=670c05ffbdcf4-chicken-gizzard', '2024-10-22 19:26:14'),
(515, '43.157.22.57', 'http://dmyfoodplug.com/category.php?cat=66ff04cfac62b-frozen-proteins', '2024-10-22 19:26:16'),
(516, '43.157.22.57', 'http://dmyfoodplug.com/product.php?prod=670bb05b173f8-soft-chicken', '2024-10-22 19:26:17'),
(517, '197.211.52.130', 'http://dmyfoodplug.com/index.php', '2024-10-22 19:31:11'),
(518, '197.211.52.130', 'http://dmyfoodplug.com/product.php?prod=670f598c835a0-fish-meat-parts', '2024-10-22 19:41:45'),
(519, '197.211.52.130', 'http://dmyfoodplug.com/cart.php', '2024-10-22 19:43:42'),
(520, '197.211.61.25', 'http://dmyfoodplug.com/index.php', '2024-10-22 20:02:54'),
(521, '197.211.61.25', 'http://dmyfoodplug.com/category.php?cat=66ffdc97390fc-all-fresh-meat', '2024-10-22 20:05:29'),
(522, '197.211.61.25', 'http://dmyfoodplug.com/contact.php', '2024-10-22 20:06:18'),
(523, '197.211.61.25', 'http://dmyfoodplug.com/product.php?prod=670bb091a6895-turkey-wings', '2024-10-22 20:07:06'),
(524, '206.189.132.18', 'http://dmyfoodplug.com/index.php', '2024-10-22 20:49:20'),
(525, '102.91.93.43', 'http://dmyfoodplug.com/product.php?prod=6714c65b6f75c-kilishi', '2024-10-22 21:03:57'),
(526, '102.91.93.43', 'http://dmyfoodplug.com/category.php?cat=67050d435d572-flour-and-grains', '2024-10-22 21:05:59'),
(527, '102.91.93.43', 'http://dmyfoodplug.com/product.php?prod=670b9605bf283-plaintain-flour', '2024-10-22 21:06:05'),
(528, '43.131.243.208', 'http://dmyfoodplug.com/index.php', '2024-10-23 01:21:50');
INSERT INTO `visitors` (`id`, `ip_address`, `page_url`, `date`) VALUES
(529, '170.106.192.3', 'http://dmyfoodplug.com/product.php?prod=670f58f040e4e-muscle-part', '2024-10-23 01:34:40'),
(530, '170.106.192.3', 'http://dmyfoodplug.com/product.php?prod=670f582ae385c-torso-parts', '2024-10-23 01:34:41'),
(531, '170.106.192.3', 'http://dmyfoodplug.com/category.php?cat=66ff868e2739d-spice-and-condiments', '2024-10-23 01:34:43'),
(532, '170.106.192.3', 'http://dmyfoodplug.com/category.php?cat=66ffdc97390fc-all-fresh-meat', '2024-10-23 01:34:43'),
(533, '51.222.253.4', 'http://dmyfoodplug.com/index.php', '2024-10-23 03:48:45'),
(534, '43.155.138.79', 'http://dmyfoodplug.com/index.php', '2024-10-23 04:14:23'),
(535, '170.106.113.159', 'http://dmyfoodplug.com/product.php?prod=6714c65b6f75c-kilishi', '2024-10-23 04:18:17'),
(536, '170.106.113.159', 'http://dmyfoodplug.com/category.php?cat=6714c9a411ee1-export-worthy-products', '2024-10-23 04:18:17'),
(537, '170.106.113.159', 'http://dmyfoodplug.com/product.php?prod=670c04bdd270c-chicken-sausage', '2024-10-23 04:18:18'),
(538, '170.106.113.159', 'http://dmyfoodplug.com/about-us.php', '2024-10-23 04:18:20'),
(539, '43.142.179.19', 'http://dmyfoodplug.com/index.php', '2024-10-23 04:49:46'),
(540, '205.169.39.4', 'http://dmyfoodplug.com/index.php', '2024-10-23 05:28:50'),
(541, '102.91.93.43', 'http://dmyfoodplug.com/product.php?prod=670f5bdc0e62d-cow-assorted-parts-offals', '2024-10-23 06:13:24'),
(542, '111.231.10.88', 'http://dmyfoodplug.com/index.php', '2024-10-23 07:13:29'),
(543, '43.143.60.88', 'http://dmyfoodplug.com/index.php', '2024-10-23 09:17:58'),
(544, '102.91.93.43', 'http://dmyfoodplug.com/shop.php', '2024-10-23 10:29:50'),
(545, '::1', 'http://localhost/dmyfoodplug/products.php', '2022-05-14 11:29:39'),
(546, '::1', 'http://localhost/dmyfoodplug/products.php?page=2', '2022-05-14 11:29:43'),
(547, '::1', 'http://localhost/dmyfoodplug/products.php?page=3', '2022-05-14 11:29:52'),
(548, '::1', 'http://localhost/dmyfoodplug/category.php?cat=6714c9a411ee1-export-worthy-products', '2022-05-14 11:31:20'),
(549, '::1', 'http://localhost/dmyfoodplug/category.php?cat=67050d2d64b95-local-snacks-and-others', '2022-05-14 11:31:25'),
(550, '::1', 'http://localhost/dmyfoodplug/category.php?cat=66ff868e2739d-spice-and-condiments', '2022-05-14 11:31:29'),
(551, '::1', 'http://localhost/dmyfoodplug/category.php?cat=66ff04cfac62b-frozen-proteins', '2022-05-14 11:31:36'),
(552, '::1', 'http://localhost/dmyfoodplug/category.php?cat=67050d435d572-flour-and-grains', '2022-05-14 11:44:35'),
(553, '::1', 'http://localhost/dmyfoodplug/product.php?prod=670c06cfcceb1-turkey-gizzard', '2022-05-14 11:44:58'),
(554, '::1', 'http://localhost/dmyfoodplug/cart.php', '2022-05-14 11:45:13'),
(555, '::1', 'http://localhost/dmyfoodplug/product.php?prod=670f5bdc0e62d-cow-assorted-parts-offals', '2022-05-14 11:51:38'),
(556, '::1', 'http://localhost/dmyfoodplug/shop.php', '2024-10-23 17:33:00'),
(557, '::1', 'http://localhost/dmyfoodplug/category.php?cat=66ffdc97390fc-all-fresh-meat', '2024-10-23 17:36:36'),
(558, '::1', 'http://localhost/dmyfoodplug/product.php?prod=670f598c835a0-fish-meat-parts', '2024-10-23 17:36:41'),
(559, '::1', 'http://localhost/dmyfoodplug/product.php?prod=670b9705e5dff-kulikuli', '2024-10-23 18:22:31'),
(560, '::1', 'http://localhost/dmyfoodplug/product.php?prod=6714c76293e05-roasted-panla-fish', '2024-10-23 18:22:46'),
(561, '::1', 'http://localhost/dmyfoodplug/product.php?prod=670b9882ef4d7-yagi-spice', '2024-10-23 18:25:40'),
(562, '::1', 'http://localhost/dmyfoodplug/product.php?prod=670b8b9fd129f-peppersoup-spice', '2024-10-23 18:25:53'),
(563, '::1', 'http://localhost/dmyfoodplug/product.php?prod=670b8b30adbf7-groundnut', '2024-10-24 02:47:32'),
(564, '::1', 'http://localhost/dmyfoodplug/product.php?prod=670b9062023f1-white-dried-ponmo', '2024-10-24 02:48:13'),
(565, '::1', 'http://localhost/dmyfoodplug/product.php?prod=670b8d3879c3c-honey-beans', '2024-10-24 02:49:22'),
(566, '::1', 'http://localhost/dmyfoodplug/product.php?prod=6708dce53aaf7-ijebu-garri', '2024-10-24 02:49:33'),
(567, '::1', 'http://localhost/dmyfoodplug/product.php?prod=670b8c0e41052-oron-crayfish', '2024-10-24 02:59:52'),
(568, '::1', 'http://localhost/dmyfoodplug/products.php?search=Goat+meat+sharing', '2024-10-24 03:27:36'),
(569, '::1', 'http://localhost/dmyfoodplug/product.php?prod=670d756f6a51a-goat-meat-sharing', '2024-10-24 03:27:39'),
(570, '::1', 'http://localhost/dmyfoodplug/product.php?prod=6719b1adf3bc2-goat-meat-sharing', '2024-10-24 03:32:23'),
(571, '::1', 'http://localhost/dmyfoodplug/about-us.php', '2024-10-24 03:45:15'),
(572, '::1', 'http://localhost/dmyfoodplug/product.php?prod=670b93cec6806-yam-flour', '2024-10-24 07:23:45'),
(573, '::1', 'http://localhost/dmyfoodplug/product.php?prod=670a1aab84c4e-yellow-garri', '2024-10-24 07:26:08'),
(574, '::1', 'http://localhost/dmyfoodplug/product.php?prod=6719f63e74a8d-kilishi', '2024-10-24 08:25:05'),
(575, '::1', 'http://localhost/dmyfoodplug/product.php?prod=670bb05b173f8-soft-chicken', '2024-10-24 10:15:33'),
(576, '::1', 'http://localhost/dmyfoodplug/product.php?prod=670b923884e7c-palmoil', '2024-10-24 12:07:23'),
(577, '::1', 'http://localhost/dmyfoodplug/product.php?prod=670f58f040e4e-muscle-part', '2024-10-24 13:07:36'),
(578, '::1', 'http://localhost/dmyfoodplug/checkout.php', '2024-10-25 07:02:48'),
(579, '::1', 'http://localhost/dmyfoodplug/checkout.php?selector=paystack', '2024-10-25 07:33:00'),
(580, '::1', 'http://localhost/dmyfoodplug/checkout.php?selector=bank_transfer', '2024-10-25 07:41:23'),
(581, '::1', 'http://localhost/dmyfoodplug/checkout.php?payment_mode=paystack', '2024-10-25 07:44:16'),
(582, '::1', 'http://localhost/dmyfoodplug/checkout.php?email=&first_name=&last_name=&country=&address=&city=&state=&zip_code=&phone=&ordernotes=', '2024-10-25 08:31:56'),
(583, '::1', 'http://localhost/dmyfoodplug/checkout.php?email=&first_name=&last_name=&country=&address=&city=&state=&zip_code=&phone=&ordernotes=&payment_mode=bank_transfer', '2024-10-25 08:35:35'),
(584, '::1', 'http://localhost/dmyfoodplug/checkout.php?uid=fcccd490e4fb083cuId=&codId=0c63c9bf9d1b2e84', '2024-10-25 09:22:47'),
(585, '::1', 'http://localhost/dmyfoodplug/checkout.php?uid=cefb85821c48b55auId=&codId=0011e399438dd3ec', '2024-10-25 09:28:42'),
(586, '::1', 'http://localhost/dmyfoodplug/checkout.php?uid=28cfdd670d61071fuId=&codId=7c9678e0a8f40369', '2024-10-25 09:28:45'),
(587, '::1', 'http://localhost/dmyfoodplug/checkout.php?uid=fd22bd6505a104a9uId=&codId=ed2bb114f8c13367', '2024-10-25 09:29:13'),
(588, '::1', 'http://localhost/dmyfoodplug/checkout.php?uid=824f595ee69875c4uId=&codId=a969c9001fc549bf', '2024-10-25 09:57:14'),
(589, '::1', 'http://localhost/dmyfoodplug/checkout.php?uid=mnbta2892hel6cpk2tjuedl66ruId=&codId=74e9c2fcd213148b', '2024-10-25 09:58:47'),
(590, '::1', 'http://localhost/dmyfoodplug/checkout.php?uid=mnbta2892hel6cpk2tjuedl66r&codId=84b886963ead9456', '2024-10-25 09:59:31'),
(591, '::1', 'http://localhost/dmyfoodplug/checkout.php?uId=mnbta2892hel6cpk2tjuedl66r&codId=3a5081c2d4828d7c', '2024-10-25 10:05:32'),
(592, '::1', 'http://localhost/dmyfoodplug/checkout.php?uId=mnbta2892hel6cpk2tjuedl66r&codId=bc5982514cb39b81', '2024-10-25 10:07:10'),
(593, '::1', 'http://localhost/dmyfoodplug/checkout.php?uId=mnbta2892hel6cpk2tjuedl66r&codId=434339b351187f00', '2024-10-25 10:07:32'),
(594, '::1', 'http://localhost/dmyfoodplug/checkout.php?uId=mnbta2892hel6cpk2tjuedl66r&codId=67cd77ddbdc30b3f', '2024-10-25 10:07:58'),
(595, '::1', 'http://localhost/dmyfoodplug/checkout.php?uId=mnbta2892hecpk2tjuedl66r&codId=67cd77ddbdc30b3f', '2024-10-25 10:08:10'),
(596, '::1', 'http://localhost/dmyfoodplug/checkout.php?uId=mnbta289el6cpk2tjuedl66r&codId=67cd77ddbdc30b3f', '2024-10-25 10:08:22'),
(597, '::1', 'http://localhost/dmyfoodplug/checkout.php?uId=mnbta2892hel6cpk2tjuedl66r&codId=67cddbdc30b3f', '2024-10-25 10:08:28'),
(598, '::1', 'http://localhost/dmyfoodplug/checkout.php?uId=mnbta2892hel6cpk2tjuedl66', '2024-10-25 10:08:45'),
(599, '::1', 'http://localhost/dmyfoodplug/checkout.php?uId=mnbta2892hel6cpk2tjuedl66r&codId=', '2024-10-25 10:09:25'),
(600, '::1', 'http://localhost/dmyfoodplug/checkout.php?uId=mnbta2892hel6cpk2tjuedl66r&codId=0b098952aff0aaa1', '2024-10-25 10:09:35'),
(601, '::1', 'http://localhost/dmyfoodplug/checkout.php?uId=mnbta2892hel6cpk2tjuedl66r', '2024-10-25 10:11:33'),
(602, '::1', 'http://localhost/dmyfoodplug/checkout.php?uId=mnbta2892hel6cpk', '2024-10-25 10:11:39'),
(603, '::1', 'http://localhost/dmyfoodplug/checkout.php?uId=0ko8but4p3v08pa115ssv1ioom', '2024-10-26 01:46:43'),
(604, '::1', 'http://localhost/dmyfoodplug/checkout.php?uId=0ko8but4p3v08pa115ssv', '2024-10-26 01:46:48'),
(605, '::1', 'http://localhost/dmyfoodplug/checkout.php?uId=', '2024-10-26 01:46:55'),
(606, '::1', 'http://localhost/dmyfoodplug/shop.php?page=3', '2024-10-26 04:18:27'),
(607, '::1', 'http://localhost/dmyfoodplug/product.php?prod=670c08a1d301c-frozen-shrimps', '2024-10-26 04:32:50'),
(608, '::1', 'http://localhost/dmyfoodplug/checkout.php?uId=gikum6t2ktec96qa56pi31o988', '2024-10-26 11:06:46'),
(609, '::1', 'http://localhost/dmyfoodplug/order-details.php?ord=gikum6t2ktec96qa56pi31o988', '2024-10-26 11:28:06'),
(610, '::1', 'http://localhost/dmyfoodplug/order-details.php?ord=gikum6t2ktec96qa56pi31o988&trkNo=DMY-gikum6t2ktec96qa56pi31o9884320', '2024-10-26 11:31:41'),
(611, '::1', 'http://localhost/dmyfoodplug/order-details.php?ord=gikum6t2ktec96qa56pi31o988&trkNo=DMY-gikum6t2ktec96qa56pi31o988', '2024-10-26 11:44:10'),
(612, '::1', 'http://localhost/dmyfoodplug/order-details.php?ord=gikum6t2ktec96qa56pi31o988&trkNo=DMY-gikum6t2ktec96qa56', '2024-10-26 11:44:15'),
(613, '::1', 'http://localhost/dmyfoodplug/order-details.php?ord=gikum6t2ktec96qa58&trkNo=DMY-gikum6t2ktec96qa56pi31o9884320', '2024-10-26 11:44:18'),
(614, '::1', 'http://localhost/dmyfoodplug/order-details.php', '2024-10-26 11:44:29'),
(615, '::1', 'http://localhost/dmyfoodplug/order-details.php?ord=gikum6t2ktec96qa56pi31o988&', '2024-10-26 11:44:38'),
(616, '::1', 'http://localhost/dmyfoodplug/order-details.php?ord=&trkNo=DMY-gikum6t2ktec96qa56pi31o9884320', '2024-10-26 11:45:36'),
(617, '::1', 'http://localhost/dmyfoodplug/order-details.php?ord=gikum6t2ktec96qa56pi31o988&trkNo=DMY-gikum6t2ktec96qa56pi31o988393', '2024-10-26 11:53:15'),
(618, '::1', 'http://localhost/dmyfoodplug/product.php?prod=670b8bc3103be-cameroon-pepper', '2024-10-26 14:23:13'),
(619, '::1', 'http://localhost/dmyfoodplug/checkout.php?uId=1q1r5ccs7p4n9pror93suar3o3', '2024-10-26 14:24:16'),
(620, '::1', 'http://localhost/dmyfoodplug/order-details.php?ord=1q1r5ccs7p4n9pror93suar3o3&trkNo=DMY-1q1r5ccs7p4n9pror93suar3o31364', '2024-10-26 14:44:59'),
(621, '::1', 'http://localhost/dmyfoodplug/order-details.php?ord=1q1r5ccs7p4n9pror93suar3o3&trkNo=DMY-1q1r5ccs7p4n9pror93suar3o32587', '2024-10-26 14:48:20'),
(622, '::1', 'http://localhost/dmyfoodplug/payment_success.php', '2024-10-27 08:03:45'),
(623, '::1', 'http://localhost/dmyfoodplug/payment_success.php?userID=1q1r5ccs7p4n9pror93suar3o3&trkNo=DMY-1q1r5ccs7p4n9pror93suar3o32587', '2024-10-27 08:13:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_sizes`
--
ALTER TABLE `product_sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_slots`
--
ALTER TABLE `product_slots`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_weights`
--
ALTER TABLE `product_weights`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `product_sizes`
--
ALTER TABLE `product_sizes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_slots`
--
ALTER TABLE `product_slots`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_weights`
--
ALTER TABLE `product_weights`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=624;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2024 at 03:56 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restoran`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) NOT NULL,
  `adminname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `adminname`, `email`, `password`, `created_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '$2y$10$P6pisJYJJYlLEEDLtoUHB.k0lG86S7nQ..lhDlkKaXll3GqQ0narC', '2024-03-22 03:55:32');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `date_booking` varchar(200) NOT NULL,
  `num_people` int(10) NOT NULL,
  `special_request` text NOT NULL,
  `status` varchar(200) NOT NULL,
  `user_id` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `name`, `email`, `date_booking`, `num_people`, `special_request`, `status`, `user_id`, `created_at`) VALUES
(15, 'Priya Patel', 'priya@gmail.com', '03/29/2024 6:49 PM', 4, 'Good evening! Can I book a table for a party of four for dinner tomorrow at 6:30 PM?', 'Done', 6, '2024-03-28 13:20:02'),
(16, 'Priya Patel', 'priya@gmail.com', '03/30/2024 7:03 PM', 1, 'Hi, I\'d like to make a reservation for two on Friday, March 30th, at 7:00 PM.', 'Pending', 6, '2024-03-28 13:33:53'),
(17, 'Nandini Kapoor', 'nandini@gmail.com', '03/28/2024 7:42 PM', 3, 'Hello, I\'d like to reserve a table for a special occasion on Saturday, April 1st, at 8:00 PM for six people.', 'Done', 7, '2024-03-28 14:12:29'),
(18, 'Ananya Reddy', 'ananya@gmail.com', '03/31/2024 7:47 PM', 3, 'Good afternoon! Could you please help me reserve a table for a romantic dinner for two this Saturday at 7:30 PM?', 'Done', 8, '2024-03-28 14:18:01'),
(19, 'Ananya Reddy', 'ananya@gmail.com', '05/02/2024 6:00 PM', 1, 'Hello! I\'d like to make a reservation for a family dinner next Sunday, April 2nd, at 6:00 PM for five people.', 'Pending', 8, '2024-03-28 14:18:47'),
(20, 'Aisha Khan', 'aisha@gmail.com', '04/02/2024 6:00 PM', 3, 'Hello! I\'d like to make a reservation for a family dinner next Sunday, April 2nd, at 6:00 PM for five people', 'Done', 9, '2024-03-28 14:32:06'),
(21, 'Maya Chatterjee', 'maya@gmail.com', '03/30/2024 11:00 AM', 4, 'Good evening! Can you assist me in booking a table for a group of friends for brunch this Sunday at 11:00 AM?', 'Confirmed', 10, '2024-03-28 14:41:18'),
(22, 'Maya Chatterjee', 'maya@gmail.com', '03/29/2024 8:14 PM', 2, 'Hello, I\'d like to make a reservation for a cozy dinner for two on Wednesday, March 29th, at 7:30 PM.', 'Done', 10, '2024-03-28 14:44:43'),
(23, 'Rajesh Khanna', 'rajesh@gmail.com', '03/31/2024 6:30 PM', 3, 'Hi there! Could you help me reserve a table for a family gathering on Saturday, April 1st, at 6:30 PM for six people?', 'Done', 11, '2024-03-28 14:47:26');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(10) NOT NULL,
  `item_id` int(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `price` varchar(10) NOT NULL,
  `image` varchar(200) NOT NULL,
  `user_id` int(10) NOT NULL,
  `created-at` timestamp NOT NULL DEFAULT current_timestamp(),
  `quantity` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `item_id`, `name`, `price`, `image`, `user_id`, `created-at`, `quantity`) VALUES
(41, 75, ' Dal Makhani', '150', 'dinner-1.jpeg', 6, '2024-03-28 13:34:22', 2),
(42, 80, 'Mix Veg Curry', '150', 'dinner-6.jpeg', 6, '2024-03-28 13:34:41', 1),
(43, 40, 'Raspberry Lemonade', '120', 'drink-8.jpeg', 6, '2024-03-28 13:34:56', 1),
(47, 69, 'Butter Chicken', '250', 'lunch-1.jpeg', 8, '2024-03-28 14:25:00', 1),
(51, 66, 'Poha', '70', 'breakfast-4.jpeg', 9, '2024-03-28 14:39:21', 1);

-- --------------------------------------------------------

--
-- Table structure for table `foods`
--

CREATE TABLE `foods` (
  `id` int(100) NOT NULL,
  `name` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `price` varchar(20) NOT NULL,
  `meal_id` int(10) NOT NULL,
  `stock_quantity` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `foods`
--

INSERT INTO `foods` (`id`, `name`, `image`, `description`, `price`, `meal_id`, `stock_quantity`, `created_at`) VALUES
(9, 'Eggs Benedict', 'breakfast-1.jpeg', 'Classic brunch dish featuring poached eggs atop English muffins, Canadian bacon, and hollandaise sauce.', '160', 1, 0, '2024-03-22 06:46:36'),
(10, 'Garlic Bread', 'starter-1.jpeg', 'Indulge in our classic Garlic Bread, freshly baked to perfection with a golden crust and aromatic garlic butter. Perfectly crisp on the outside, soft and warm on the inside.', '150', 4, 97, '2024-03-22 09:02:40'),
(11, 'Bruschetta', 'starter-2.jpeg', 'A classic Italian appetizer featuring toasted bread topped with diced tomatoes, garlic, basil, olive oil, and balsamic vinegar. Bursting with fresh flavors, ideal for starting any meal. ', '150', 4, 100, '2024-03-22 09:14:50'),
(12, 'Chicken Wings', 'starter-3.jpeg', 'Delight your taste buds with our succulent chicken wings, perfectly seasoned and crisped to perfection. Served with your choice of dipping sauce.', '200', 4, 49, '2024-03-22 09:17:41'),
(13, 'Mozzarella Sticks', 'starter-4.jpeg', 'Mozzarella sticks are golden-brown, crispy snacks made with breaded mozzarella cheese. Served with marinara sauce for dipping', '200', 4, 99, '2024-03-22 09:20:21'),
(14, 'Spring Rolls', 'starter-5.jpeg', 'Crispy and flavorful spring rolls filled with vegetables or meat, wrapped in thin pastry sheets and deep-fried to golden perfection.', '150', 4, 0, '2024-03-22 09:31:18'),
(15, 'User Onion Rings', 'starter-6.jpeg', 'Crispy and golden, our onion rings are a delicious starter bursting with flavor. Made from thinly sliced onions coated in a seasoned batter, they\'re perfect for sharing.', '100', 4, 50, '2024-03-22 09:32:59'),
(16, 'Nachos with Cheese and Salsa', 'starter-7.jpeg', 'Nachos with Cheese and Salsa: Crispy corn tortilla chips topped with melted cheese and zesty salsa, creating a flavorful and satisfying appetizer perfect for sharing.', '200', 4, 47, '2024-03-22 09:34:38'),
(17, 'Fried Calamari', 'starter-8.jpeg', 'Crispy, golden rings of tender calamari, lightly seasoned and served with a zesty marinara dipping sauce. A delightful appetizer that tantalizes the taste buds.', '300', 4, 47, '2024-03-22 09:37:51'),
(18, 'Potato Skins with Cream & Chives', 'starter-9.jpeg', 'Potato Skins with Sour Cream and Chives: Crispy potato skins filled with melted cheese, topped with tangy sour cream and fresh chives.', '150', 4, 0, '2024-03-22 09:40:58'),
(19, 'Shrimp Cocktail', 'starter-10.jpeg', ' Succulent shrimp served chilled with tangy cocktail sauce. A classic appetizer bursting with flavor.Perfect for seafood lovers looking for a refreshing start to their meal.', '250', 4, 0, '2024-03-22 09:43:13'),
(20, 'Spaghetti Bolognese', 'main-1.jpeg', 'A classic Italian pasta dish featuring al dente spaghetti tossed in a rich, savory Bolognese sauce made with minced beef, tomatoes, onions, carrots, and herbs.', '300', 5, 50, '2024-03-22 12:47:13'),
(21, 'Margherita Pizza', 'main-2.jpeg', 'Enjoy the classic simplicity of Margherita Pizza, topped with tomato sauce, fresh mozzarella, basil leaves, and a drizzle of olive oil. ', '220', 5, 100, '2024-03-22 12:52:05'),
(22, 'Grilled Salmon with Butter Sauce', 'main-3.jpeg', 'Succulent salmon fillet grilled to perfection, topped with a luscious lemon butter sauce. A delightful blend of flavors that tantalizes the taste buds. ', '400', 5, 100, '2024-03-22 12:54:49'),
(23, 'Classic Beef Burger with Fries', 'main-4.jpeg', ' A juicy patty grilled to perfection and topped with fresh lettuce, tomato, onion, and cheese. Served with crispy golden fries .', '350', 5, 99, '2024-03-22 12:57:27'),
(24, 'Chicken Parmesan with Marinara Sauce', 'main-5.jpeg', 'Tender chicken breast coated in crispy breadcrumbs, topped with marinara sauce and melted mozzarella cheese. Served with spaghetti.', '250', 5, 98, '2024-03-22 13:09:40'),
(25, 'Vegetable Lasagna', 'main-6.jpeg', 'Layers of lasagna noodles, creamy ricotta cheese, mixed vegetables, marinara sauce, and melted mozzarella cheese. ', '300', 5, 0, '2024-03-22 13:10:36'),
(26, 'Grilled Sirloin Steak with Mashed Potatoes', 'main-7.jpeg', 'Juicy sirloin steak, seasoned and grilled to perfection, served with creamy mashed potatoes and a side of sautéed vegetables.', '450', 5, 0, '2024-03-22 13:11:24'),
(27, 'Fish and Chips with Tartar Sauce', 'main-8.jpeg', 'Crispy battered fish fillets served with golden fries, accompanied by tangy tartar sauce for dipping. ', '350', 5, 100, '2024-03-22 13:12:08'),
(28, 'BBQ Pulled Pork Sandwich with Coleslaw', 'main-9.jpeg', 'Slow-cooked pulled pork smothered in tangy barbecue sauce, served on a toasted bun with creamy coleslaw.', '280', 5, 100, '2024-03-22 13:13:29'),
(32, 'Mushroom Risotto', 'main-10.jpeg', 'Mushroom Risotto, featuring Arborio rice cooked to perfection with savory mushrooms, onions, garlic, and Parmesan cheese.', '380', 5, 100, '2024-03-22 15:16:51'),
(33, 'Coke', 'drink-1.jpeg', 'Enjoy the classic and refreshing taste of Coca-Cola, served chilled with ice. Perfect to quench your thirst and complement any meal.', '50', 8, 98, '2024-03-22 15:18:29'),
(34, 'Pepsi', 'drink-2.jpeg', 'Savor the crisp and refreshing taste of Pepsi, served chilled with ice. A perfect choice to accompany your meal or enjoy on its own.', '50', 8, 96, '2024-03-22 15:19:11'),
(35, 'Sprite', 'drink-3.jpeg', 'Quench your thirst with the crisp and refreshing taste of Sprite, served chilled with ice. A perfect beverage choice to complement any meal.', '50', 8, 97, '2024-03-22 15:19:48'),
(36, 'Orange Juice', 'drink-4.jpeg', 'Enjoy the refreshing and tangy taste of freshly squeezed orange juice, bursting with vitamins and flavor.', '100', 8, 99, '2024-03-22 15:20:45'),
(37, 'Apple Juice', 'drink-5.jpeg', 'Savor the crisp and sweet taste of pure apple juice, made from freshly pressed apples for a refreshing and nutritious beverage.', '100', 8, 100, '2024-03-22 15:21:19'),
(38, 'Cranberry Juice', 'drink-6.jpeg', 'Indulge in the tart and tangy flavor of cranberry juice, made from premium cranberries for a refreshing and antioxidant-rich beverage.', '120', 8, 100, '2024-03-22 15:21:53'),
(39, 'Iced Tea', 'drink-7.jpeg', 'Quench your thirst with our refreshing Iced Tea, brewed from premium tea leaves and served chilled over ice. ', '80', 8, 100, '2024-03-22 15:22:27'),
(40, 'Raspberry Lemonade', 'drink-8.jpeg', 'Raspberries and zesty lemons in our Raspberry Lemonade. Made with freshly squeezed lemons and ripe raspberries.', '120', 8, 99, '2024-03-22 15:23:29'),
(41, 'Cappuccino', 'drink-9.jpeg', 'Cappuccino, crafted from freshly ground espresso beans topped with frothy steamed milk and a sprinkle of cocoa powder.', '150', 8, 99, '2024-03-22 15:24:15'),
(42, 'Green Tea', 'drink-10.jpeg', 'soothing and antioxidant-rich flavor of our Green Tea, made from premium tea leaves for a refreshing and invigorating beverage.', '100', 8, 100, '2024-03-22 15:24:50'),
(43, 'Cheesecake with Strawberry Compote', 'dessert-1.jpeg', 'Indulge in creamy, velvety cheesecake topped with a luscious strawberry compote, perfectly balancing sweet and tangy flavors. ', '250', 7, 20, '2024-03-22 15:27:23'),
(44, 'Chocolate Lava Cake with Vanilla Ice Cream', 'dessert-2.jpeg', 'Delight in the decadence of our rich and moist chocolate lava cake, oozing with molten chocolate, accompanied by creamy vanilla ice cream.', '300', 7, 50, '2024-03-22 15:28:51'),
(45, 'Tiramisu with Espresso Soaked Ladyfingers', 'dessert-3.jpeg', 'Classic Italian dessert, Tiramisu, featuring layers of espresso-soaked ladyfingers, creamy mascarpone cheese, and a dusting of cocoa powder.', '300', 7, 0, '2024-03-22 15:39:14'),
(46, 'Warm Apple Pie with Cinnamon Ice Cream', 'dessert-4.jpeg', 'The comforting warmth of our freshly baked apple pie, filled with tender apples and aromatic spices, served with a scoop of creamy cinnamon ice cream.', '300', 7, 49, '2024-03-22 15:39:52'),
(47, 'Crème Brûlée with Fresh Berries', 'dessert-5.jpeg', 'Indulge in the velvety smoothness of our classic Crème Brûlée, featuring a creamy custard base topped with a caramelized sugar crust.', '350', 7, 50, '2024-03-22 15:42:26'),
(48, 'Molten Chocolate Brownie ', 'dessert-6.jpeg', 'Molten Chocolate Brownie, oozing with warm, gooey chocolate and drizzled with decadent salted caramel sauce. ', '150', 7, 0, '2024-03-22 15:43:12'),
(49, 'Key Lime Pie with Whipped Cream', 'dessert-7.jpeg', 'Savor the tangy sweetness of our Key Lime Pie, featuring a zesty lime filling in a buttery graham cracker crust, topped with fluffy whipped cream.', '120', 7, 48, '2024-03-22 15:43:39'),
(50, 'Strawberry Shortcake with Chantilly Cream', 'dessert-8.jpeg', 'Strawberry Shortcake, featuring layers of fluffy sponge cake, fresh strawberries, and luscious Chantilly cream.', '150', 7, 100, '2024-03-22 15:44:12'),
(51, 'Red Velvet Cupcake with Cream Cheese Frosting', 'dessert-9.jpeg', 'Red Velvet Cupcake, topped with velvety cream cheese frosting, perfectly balancing the rich cocoa flavors with a hint of tanginess.', '200', 7, 100, '2024-03-22 15:44:53'),
(52, 'Mixed Berry Cobbler with Vanilla Bean Gelato', 'dessert-10.jpeg', ' Mixed Berry Cobbler, featuring a medley of juicy berries baked to perfection under a golden crust.', '250', 7, 100, '2024-03-22 15:45:31'),
(53, 'Veggie Stir-Fry with Tofu', 'veg-1.jpeg', '\r\nEnjoy a delightful blend of colorful vegetables and tofu stir-fried to perfection, seasoned with aromatic spices, and served with fluffy basmati rice.', '250', 6, 100, '2024-03-22 15:46:28'),
(54, 'Tofu Curry with Basmati Rice', 'veg-2.jpeg', 'Indulge in a creamy and flavorful tofu curry, simmered in a rich blend of Indian spices and coconut milk, served alongside fragrant basmati rice.', '300', 6, 100, '2024-03-22 15:53:15'),
(55, 'Quinoa Salad with Avocado and Cherry Tomatoes', 'veg-3.jpeg', '\r\nSavor the freshness of quinoa combined with creamy avocado and juicy cherry tomatoes in this vibrant salad, drizzled with a zesty dressing.', '350', 6, 100, '2024-03-22 15:55:54'),
(56, 'Falafel Wrap with Hummus and Tahini Sauce', 'veg-4.jpeg', '\r\nExperience the Middle Eastern flavors with our falafel wrap featuring crispy falafel balls, creamy hummus, and tahini sauce, all wrapped in a soft tortilla.', '280', 6, 99, '2024-03-22 15:56:19'),
(57, 'Eggplant Parmesan with Marinara Sauce', 'veg-5.jpeg', 'Delight in layers of breaded eggplant, smothered in marinara sauce, topped with melted mozzarella and Parmesan cheese, baked to perfection. ', '320', 6, 100, '2024-03-22 15:57:28'),
(58, 'Vegan Pad Thai with Tofu and Peanuts', 'veg-6.jpeg', 'Savor the authentic taste of Thailand with our vegan Pad Thai featuring tender rice noodles, crispy tofu, crunchy peanuts, and fresh vegetables.', '290', 6, 100, '2024-03-22 15:57:58'),
(59, 'Lentil Soup with Crusty Bread', 'veg-7.jpg', 'Comforting warmth of our hearty lentil soup, simmered to perfection with aromatic spices and served with a side of freshly baked crusty bread.', '220', 6, 100, '2024-03-22 15:58:35'),
(60, 'Stuffed Bell Peppers with Quinoa', 'veg-8.jpeg', 'Experience a burst of flavors with our stuffed bell peppers filled with a savory mixture of quinoa, black beans, vegetables, and spices, baked to perfection.', '240', 6, 100, '2024-03-22 15:59:04'),
(61, 'Vegan Sushi Rolls with Avocado and Cucumber', 'veg-9.jpeg', 'Vegan sushi rolls featuring creamy avocado and crisp cucumber wrapped in seasoned rice and nori seaweed. Served with soy sauce and pickled ginger.', '350', 6, 100, '2024-03-22 15:59:36'),
(62, 'Veggie Burger with Sweet Potato Fries', 'veg-10.jpeg', 'Veggie burger made from wholesome ingredients like lentils, chickpeas, and veggies, served on a toasted bun with lettuce, tomato, and pickles. ', '220', 6, 100, '2024-03-22 16:00:15'),
(63, 'Masala Dosa', 'breakfast-2.jpeg', 'A South Indian delicacy featuring a thin, crispy rice crepe filled with a savory potato mixture seasoned with aromatic spices.', '150', 1, 98, '2024-03-28 04:27:35'),
(64, 'Aloo Paratha', 'breakfast-3.jpeg', 'A North Indian specialty consisting of a whole wheat flatbread stuffed with spiced mashed potatoes, cooked on a griddle until golden and served with yogurt or pickle.', '120', 1, 100, '2024-03-28 04:31:21'),
(65, 'Aloo Paratha', 'breakfast-3.jpeg', 'A North Indian specialty consisting of a whole wheat flatbread stuffed with spiced mashed potatoes, cooked on a griddle until golden and served with yogurt or pickle.', '120', 1, 100, '2024-03-28 04:32:21'),
(66, 'Poha', 'breakfast-4.jpeg', 'A popular Indian breakfast dish made from flattened rice cooked with onions, mustard seeds, curry leaves, green chilies, and peanuts, garnished with cilantro and lemon juice.', '70', 1, 100, '2024-03-28 04:33:10'),
(67, ' Idli Sambhar', 'breakfast-5.jpeg', 'A classic South Indian breakfast combination featuring steamed rice cakes (idli) served with a flavorful lentil-based stew (sambhar), accompanied by coconut chutney.', '110', 1, 50, '2024-03-28 04:35:16'),
(68, 'Chole Bhature', 'breakfast-6.jpeg', 'A North Indian dish featuring spicy chickpea curry (chole) served with deep-fried bread (bhature), garnished with pickled onions.', '120', 1, 67, '2024-03-28 04:36:00'),
(69, 'Butter Chicken', 'lunch-1.jpeg', 'A beloved Indian dish featuring tender pieces of chicken cooked in a creamy tomato-based gravy with butter and aromatic spices. Served with naan or rice.', '250', 2, 49, '2024-03-28 04:38:16'),
(70, 'Palak Paneer', 'lunch-2.jpeg', 'A classic vegetarian dish from North India made with soft cubes of paneer (Indian cottage cheese) cooked in a creamy spinach gravy with onions, tomatoes, garlic, and spices. ', '200', 2, 50, '2024-03-28 04:39:25'),
(71, 'Vegetable Biryani', 'lunch-3.jpeg', 'A fragrant and flavorful rice dish cooked with mixed vegetables, aromatic spices, and basmati rice, garnished with fried onions and fresh herbs. Served with raita.', '220', 2, 100, '2024-03-28 04:40:09'),
(72, 'Dal Tadka', 'lunch-4.jpeg', 'A comforting Indian lentil dish made with yellow lentils tempered with cumin seeds, garlic, and spices. Served with a drizzle of ghee and garnished with fresh cilantro. ', '120', 2, 100, '2024-03-28 04:40:52'),
(73, 'Chicken Tikka Masala', 'lunch-5.jpeg', 'Tender pieces of marinated chicken cooked in a creamy tomato-based sauce with aromatic spices and served with naan or rice. ', '280', 2, 50, '2024-03-28 04:41:38'),
(74, 'Baingan Bharta', 'lunch-6.jpeg', 'A flavorful Indian dish made with roasted and mashed eggplant cooked with onions, tomatoes, garlic, and spices, garnished with fresh coriander.', '190', 2, 50, '2024-03-28 04:42:22'),
(75, ' Dal Makhani', 'dinner-1.jpeg', 'Creamy black lentils simmered with tomatoes, onions, garlic, and spices, finished with cream and butter. A comforting and flavorful dish. ', '150', 3, 48, '2024-03-28 04:43:55'),
(76, ' Chana Masala', 'dinner-2.jpeg', 'A tangy and aromatic chickpea curry cooked with onions, tomatoes, ginger, garlic, and traditional Indian spices. A hearty and satisfying vegetarian dish.', '120', 3, 50, '2024-03-28 04:44:51'),
(77, 'Aloo Gobi', 'dinner-3.jpeg', 'A classic Indian dish featuring cauliflower and potatoes cooked with onions, tomatoes, ginger, garlic, and fragrant spices. ', '130', 3, 50, '2024-03-28 04:45:30'),
(78, 'Paneer Tikka Masala', 'dinner-4.jpeg', 'Succulent cubes of paneer (Indian cottage cheese) grilled and simmered in a rich tomato-based gravy with onions, bell peppers, and aromatic spices.', '180', 3, 50, '2024-03-28 04:46:21'),
(79, 'Matar Paneer', 'dinner-5.jpeg', 'A delightful vegetarian dish featuring paneer (Indian cottage cheese) and green peas cooked in a flavorful tomato-based gravy with onions, ginger, garlic, and aromatic spices. ', '150', 3, 50, '2024-03-28 04:47:02'),
(80, 'Mix Veg Curry', 'dinner-6.jpeg', 'A colorful medley of mixed vegetables cooked in a rich and flavorful onion-tomato gravy, seasoned with aromatic spices and herbs.', '150', 3, 49, '2024-03-28 04:47:45');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `user_id` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `subject`, `message`, `user_id`, `created_at`) VALUES
(3, 'Priya Patel', 'priya@gmail.com', ' Reservation Inquiry', 'Hello, I\'m interested in making a reservation for dinner this weekend. Could you please provide me with available options?', 6, '2024-03-28 13:38:14'),
(4, 'Priya Patel', 'priya@gmail.com', 'Feedback on Recent Visit', 'Hi there, I recently dined at your restaurant and had a wonderful experience. I wanted to share some feedback with you about my visit.', 6, '2024-03-28 13:38:42'),
(5, 'Nandini Kapoor', 'nandini@gmail.com', 'Catering Services Inquiry', 'Good day! I\'m reaching out to inquire about your catering services for an upcoming event. Could you please provide me with more information?', 7, '2024-03-28 14:14:34'),
(6, 'Nandini Kapoor', 'nandini@gmail.com', 'Employment Opportunities', 'Hello, I\'m interested in joining your team. Do you have any current job openings or opportunities available?', 7, '2024-03-28 14:14:54'),
(7, 'Aisha Khan', 'aisha@gmail.com', 'Event Booking', 'Good afternoon, I\'m looking to host a private event at your restaurant. Could you please provide me with information regarding availability and pricing?', 9, '2024-03-28 14:38:50'),
(8, 'Aisha Khan', 'aisha@gmail.com', 'Dietary Restrictions', 'Hello, I have certain dietary restrictions and would like to know if your restaurant can accommodate them. Could you please provide me with more information?', 9, '2024-03-28 14:39:08'),
(9, 'Maya Chatterjee', 'maya@gmail.com', ' Marketing Collaboration', 'Hi there, I\'m interested in collaborating with your restaurant on a marketing campaign. Could we discuss potential opportunities?', 10, '2024-03-28 14:43:57'),
(10, 'Rajesh Khanna', 'rajesh@gmail.com', 'Special Occasion Request', 'Hello, I\'m planning a special occasion and would like to request a personalized dining experience at your restaurant. Could you please assist me with arrangements?', 11, '2024-03-28 14:48:35'),
(11, 'Rajesh Khanna', 'rajesh@gmail.com', 'Donation Request', 'Hello, I represent a local charity and would like to inquire about the possibility of receiving a donation from your restaurant for an upcoming event.', 11, '2024-03-28 14:48:59');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `town` varchar(200) NOT NULL,
  `country` varchar(200) NOT NULL,
  `zipcode` int(20) NOT NULL,
  `phone_number` bigint(11) NOT NULL,
  `address` text NOT NULL,
  `total_price` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `status` varchar(200) NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `town`, `country`, `zipcode`, `phone_number`, `address`, `total_price`, `user_id`, `status`, `created_at`) VALUES
(52, 'Priya Patel', 'priya@gmail.com', 'Mumbai', 'India', 400001, 2242345224, '123 Main Street, Colaba, Mumbai, Maharashtra', 490, 6, 'Pending', '2024-03-28 13:28:35'),
(53, 'Priya Patel', 'priya@gmail.com', 'Mumbai', 'India', 400001, 22, '123 Main Street, Colaba, Mumbai, Maharashtra', 570, 6, 'Pending', '2024-03-28 13:35:33'),
(54, 'Nandini Kapoor', 'nandini@gmail.com', 'Delhi', 'India', 110001, 1134562344, '456 Khan Market, New Delhi, Delhi', 300, 7, 'Delivered', '2024-03-28 14:09:00'),
(55, 'Ananya Reddy', 'ananya@gmail.com', 'Bangalore', 'India', 560001, 809089002, '789 MG Road, Bangalore, Karnataka', 480, 8, 'Delivered', '2024-03-28 14:23:36'),
(56, 'Ananya Reddy', 'ananya@gmail.com', 'Bangalore', 'India', 560001, 809089002, '789 MG Road, Bangalore, Karnataka', 250, 8, 'Pending', '2024-03-28 14:25:42'),
(57, 'Aisha Khan', 'aisha@gmail.com', 'Kolkata', 'India', 700001, 3343562345, '101 Park Street, Kolkata, West Bengal', 500, 9, 'Delivered', '2024-03-28 14:35:06'),
(58, 'Aisha Khan', 'aisha@gmail.com', 'Kolkata', 'India', 700001, 3343562345, '101 Park Street, Kolkata, West Bengal', 400, 9, 'Delivered', '2024-03-28 14:37:23'),
(59, 'Maya Chatterjee', 'maya@gmail.com', 'Chennai', 'India', 600001, 4034562722, '345 Banjara Hills, Hyderabad, Telangana', 1000, 10, 'Pending', '2024-03-28 14:42:54'),
(60, 'Rajesh Khanna', 'rajesh@gmail.com', 'Hyderabad', 'India', 500001, 4088883456, '345 Banjara Hills, Hyderabad, Telangana', 510, 11, 'Completed', '2024-03-28 14:50:11'),
(61, 'Rajesh Khanna', 'rajesh@gmail.com', 'Hyderabad', 'India', 500001, 4034562722, '345 Banjara Hills, Hyderabad, Telangana', 1400, 11, 'Delivered', '2024-03-28 14:53:15');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `payment_id` varchar(255) NOT NULL,
  `amount_paid` decimal(10,2) NOT NULL,
  `status` varchar(20) DEFAULT 'Success',
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `user_id`, `payment_id`, `amount_paid`, `status`, `timestamp`) VALUES
(1, 2, 'pay_Np2Jx3HPUOHFXR', 50.00, 'Success', '2024-03-21 14:22:03'),
(2, 6, 'pay_NrnAqxtVuiSgWz', 490.00, 'Success', '2024-03-28 13:30:03'),
(4, 7, 'pay_NrnrlQ1GDhd1tx', 300.00, 'Success', '2024-03-28 14:10:58'),
(5, 8, 'pay_Nro6QXkMLfv4Wk', 480.00, 'Success', '2024-03-28 14:24:33'),
(6, 9, 'pay_NroIKLyqMjqfXB', 500.00, 'Success', '2024-03-28 14:35:49'),
(7, 9, 'pay_NroKiTZ1CmHfco', 400.00, 'Success', '2024-03-28 14:38:08'),
(8, 10, 'pay_NroQQvNIYT6RGD', 1000.00, 'Success', '2024-03-28 14:43:30'),
(9, 11, 'pay_NroY8dOL3hHckj', 510.00, 'Success', '2024-03-28 14:50:47'),
(10, 11, 'pay_NrobLFfBLeN4Jh', 1400.00, 'Success', '2024-03-28 14:53:50');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(10) NOT NULL,
  `review` text NOT NULL,
  `username` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `review`, `username`, `created_at`) VALUES
(4, 'Absolutely loved the experience! The food was delicious, the service impeccable, and the ambiance was perfect for a cozy dinner.', 'Priya Patel', '2024-03-28 13:24:51'),
(5, 'Hands down the best Indian restaurant in town! Every dish was bursting with flavor, and the staff made us feel incredibly welcome.', 'Priya Patel', '2024-03-28 13:33:04'),
(6, 'A wonderful dining experience from start to finish! The attention to detail in both the food and service was outstanding.', 'Nandini Kapoor', '2024-03-28 14:13:08'),
(7, 'We had a fantastic time celebrating our anniversary here! The staff went above and beyond to make it a memorable evening.', 'Nandini Kapoor', '2024-03-28 14:13:17'),
(8, 'Highly recommend this restaurant! The authentic Indian cuisine transported me back to the streets of Mumbai. Can\'t wait to come back!', 'Ananya Reddy', '2024-03-28 14:19:54'),
(9, 'Great food, great service! The chef\'s special was divine, and the staff were attentive without being intrusive.', 'Ananya Reddy', '2024-03-28 14:20:02'),
(10, 'Had an amazing dinner here with friends! The menu offers a wide variety of options, and everything we tried was delicious.', 'Aisha Khan', '2024-03-28 14:32:59'),
(11, 'Impressed by the quality of the food and the hospitality of the staff. Will definitely be returning for more!', 'Maya Chatterjee', '2024-03-28 14:45:24'),
(12, 'What a gem! The ambiance was charming, and the food exceeded our expectations. A must-visit for anyone craving authentic Indian flavors.', 'Maya Chatterjee', '2024-03-28 14:45:32'),
(13, 'Absolutely loved the vegetarian options! The flavors were so rich and satisfying. A great find for vegetarians and meat-eaters alike.', 'Rajesh Khanna', '2024-03-28 14:48:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`) VALUES
(6, 'Priya Patel', 'priya@gmail.com', '$2y$10$8aK/lcg14ckXMnWlMuQS0OJQA5sR0epRl4tbl2Ga90VM2q0r2vzCW', '2024-03-28 13:17:04'),
(7, 'Nandini Kapoor', 'nandini@gmail.com', '$2y$10$XD/9aesnAdEu9rkKmzhyTuwQDO877GZRlybm8FRf2apXxDms8NipW', '2024-03-28 14:04:22'),
(8, 'Ananya Reddy', 'ananya@gmail.com', '$2y$10$g/fqNsADkBxbLsN1OjrEB./pY9ggEOfCdHOuE3tZpRJVxZL3xQbZ.', '2024-03-28 14:16:15'),
(9, 'Aisha Khan', 'aisha@gmail.com', '$2y$10$RoNEFv/QXCcmWszk9HyiZuJq/1/CEs7EkwCI/O4MHXOPioAWNV5ve', '2024-03-28 14:28:43'),
(10, 'Maya Chatterjee', 'maya@gmail.com', '$2y$10$bsWbYtAtc/07Vn0nxCp7euKxnGL/gjfVXOtZZ1bTdyQZkDB9VBfsW', '2024-03-28 14:40:08'),
(11, 'Rajesh Khanna', 'rajesh@gmail.com', '$2y$10$4g3i1UxXbQEe6Vxlk5he5u1LkR01muS2ppxyneHmzL9zi9ncqkGf2', '2024-03-28 14:46:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foods`
--
ALTER TABLE `foods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `foods`
--
ALTER TABLE `foods`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

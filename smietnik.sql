SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `votes` int(11) NOT NULL,
  `author` int(11) NOT NULL,
  `comments` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`comments`)),
  `blogImage` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `products` (
  `productCode` varchar(255) NOT NULL,
  `productImage` blob DEFAULT NULL,
  `productInfo` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`productInfo`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `products` (`productCode`, `productImage`, `productInfo`) VALUES
('3502110009357', '', '{\"name\":\"Pepsi max pet 1.5l\",\"image_url\":\"https:\\/\\/images.openfoodfacts.org\\/images\\/products\\/350\\/211\\/000\\/9357\\/front_en.80.400.jpg\",\"rec\":\"\",\"packagingType\":\"\",\"binType\":\"plastik\"}');

CREATE TABLE `trashcans` (
  `id` int(11) NOT NULL,
  `trashCanType` varchar(255) NOT NULL,
  `trashCanLocation` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`trashCanLocation`)),
  `trashCanAcceptance` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `trashcans` (`id`, `trashCanType`, `trashCanLocation`, `trashCanAcceptance`) VALUES
(1, 'kosz', '{\"longitude\":\"21.160277035319\",\"latitude\":\"49.658561087586605\"}', 0),
(2, 'papier', '{\"longitude\":\"21.16017613835676\",\"latitude\":\"49.65863685897847\"}', 0),
(3, 'papier', '{\"longitude\":\"21.160181371805844\",\"latitude\":\"49.658533188314806\"}', 0),
(4, 'szklo', '{\"longitude\":\"21.16027683715176\",\"latitude\":\"49.658522830681704\"}', 0),
(5, 'plastik', '{\"longitude\":\"21.160088716109737\",\"latitude\":\"49.65854981156096\"}', 0),
(6, 'szklo', '{\"longitude\":\"21.160057970625157\",\"latitude\":\"49.658576346663864\"}', 0),
(7, 'baterie', '{\"longitude\":\"21.154484335145153\",\"latitude\":\"49.66141317628259\"}', 0),
(8, 'leki', '{\"longitude\":\"21.160029823865077\",\"latitude\":\"49.65866396323193\"}', 0),
(9, 'leki', '{\"longitude\":\"21.158908131150415\",\"latitude\":\"49.658555665312235\"}', 0),
(10, 'baterie', '{\"longitude\":\"21.15746022668746\",\"latitude\":\"49.65925709686809\"}', 0),
(11, 'szklo', '{\"longitude\":\"21.159895245544593\",\"latitude\":\"49.658927822624236\"}', 0),
(12, 'papier', '{\"longitude\":\"21.168224265147547\",\"latitude\":\"49.6771905362084\"}', 0),
(13, 'plastik', '{\"longitude\":\"21.16810075992967\",\"latitude\":\"49.67701840176218\"}', 0),
(14, 'plastik', '{\"longitude\":\"21.168333519718203\",\"latitude\":\"49.677046066264836\"}', 0),
(15, 'plastik', '{\"longitude\":\"21.168561529290994\",\"latitude\":\"49.677122912088606\"}', 0),
(16, 'plastik', '{\"longitude\":\"21.16841427325534\",\"latitude\":\"49.677159797953095\"}', 0),
(17, 'plastik', '{\"longitude\":\"21.168243266010514\",\"latitude\":\"49.677202831538835\"}', 0),
(18, 'leki ', '{\"longitude\":\"21.159556206648258\",\"latitude\":\"49.65852460151385\"}', 0),
(19, 'leki', '{\"longitude\":\"21.159524483643793\",\"latitude\":\"49.65869012075831\"}', 0);

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `reputation` int(11) NOT NULL,
  `scannedList` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`scannedList`)),
  `creationDate` datetime NOT NULL DEFAULT current_timestamp(),
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `products`
  ADD PRIMARY KEY (`productCode`);

ALTER TABLE `trashcans`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `trashcans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

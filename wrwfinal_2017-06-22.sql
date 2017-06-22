# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.6.35)
# Database: wrwfinal
# Generation Time: 2017-06-22 04:54:33 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table comments
# ------------------------------------------------------------

DROP TABLE IF EXISTS `comments`;

CREATE TABLE `comments` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `content` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `listing_id` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;

INSERT INTO `comments` (`id`, `content`, `user_id`, `listing_id`, `updated_at`, `created_at`)
VALUES
	(1,'hfgjdvnkvsl',1,7,'2017-06-08 12:06:15','2017-06-08 12:06:15'),
	(2,'hjegfkljdajbfds',1,NULL,'2017-06-12 14:28:16','2017-06-12 14:28:16'),
	(3,'ok',1,NULL,'2017-06-12 16:15:26','2017-06-12 16:15:26'),
	(4,'hey',10,NULL,'2017-06-15 10:09:46','2017-06-15 10:09:46'),
	(5,'ajsdgHbjfdnsx',10,NULL,'2017-06-15 10:13:44','2017-06-15 10:13:44'),
	(6,'ghjkjhgvfcvbn',10,5,'2017-06-15 10:16:47','2017-06-15 10:16:47');

/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table listings
# ------------------------------------------------------------

DROP TABLE IF EXISTS `listings`;

CREATE TABLE `listings` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `content` text,
  `image` varchar(255) DEFAULT NULL,
  `location` int(11) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `gender` tinyint(1) DEFAULT NULL,
  `desexed` tinyint(1) DEFAULT NULL,
  `vaccinated` tinyint(11) DEFAULT NULL,
  `wormed` tinyint(4) DEFAULT NULL,
  `flead` tinyint(4) DEFAULT NULL,
  `registered` tinyint(4) DEFAULT NULL,
  `microchipped` tinyint(4) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `listings` WRITE;
/*!40000 ALTER TABLE `listings` DISABLE KEYS */;

INSERT INTO `listings` (`id`, `title`, `content`, `image`, `location`, `age`, `gender`, `desexed`, `vaccinated`, `wormed`, `flead`, `registered`, `microchipped`, `user_id`, `created_at`, `updated_at`)
VALUES
	(1,'Caramel','Meet Caramel, our absolute sweetheart. This guy came to us after his owner threatened to dump him because they no longer wanted him. Caramel; due to being poorly socialised prior to coming into our care, is very nervous of new people. It does take him a wee while to warm up to you but once he knows he\'s safe, you will have a friend for life. Caramel is best suited to a routine lifestyle where he will receive consistency as well as firm but fair rules and boundaries. He is suitable in a home with older dog savvy kids who wont frighten him and he is fantastic with other dogs. Unfortunately he is unable to live with cats. All our dogs need to sleep inside as part of the family, you must be fully fenced and we prefer owner occupied. We ask that an adoption donation of $280 be paid to help us cover our costs.','https://images.pexels.com/photos/56723/pexels-photo-56723.jpeg?w=1260&h=750&auto=compress&cs=tinysrgb',1,1,2,1,1,1,1,0,0,1,'2017-06-01 10:02:01','2017-06-01 10:02:01'),
	(2,'Ruby','Meet Ruby, she\'s one seriously cute pug cross. She loves a good run we usually go for a walk and then a few rounds of ball toss and she\'s happy. She would suit a home with another dog to spend the day with. She loves playing chase and when the days over enjoys snuggling up on the couch next to you or on the floor, as long as she gets some cuddles she\'s more than happy to lay on the floor and sleep the evening away. Very clean dog and easy to bath, she\'s all up to date with vaccines, flea and worm. Would suit someone with a well fenced property and some room to let lose and run out some of the days naps. Loves following you around the yard but wouldn\'t want to be left outside at night alone loves more than anything to be with someone or another dog. ','https://images.pexels.com/photos/133163/pexels-photo-133163.jpeg?w=1260&h=750&auto=compress&cs=tinysrgb',0,1,2,0,1,1,1,0,1,1,'2017-06-01 10:02:01','2017-06-01 10:02:01'),
	(3,'Scout','This guy came to us after his owner threatened to dump him because they no longer wanted him. Caramel is an absolute sweetheart who due to being poorly socialised prior to coming into our care, is very nervous of new people. It does take him a wee while to warm up to you but once he knows he\'s safe, you will have a friend for life. Caramel is best suited to a routine lifestyle where he will receive consistency as well as firm but fair rules and boundaries. He is suitable in a home with older dog savvy kids who wont frighten him and he is fantastic with other dogs. Unfortunately he is unable to live with cats. All our dogs need to sleep inside as part of the family, you must be fully fenced and we prefer owner occupied. We ask that an adoption donation of $280 be paid to help us cover our costs.','https://images.pexels.com/photos/200008/pexels-photo-200008.jpeg?w=1260&h=750&auto=compress&cs=tinysrgb',1,1,2,1,1,1,1,0,0,1,'2017-06-01 10:02:01','2017-06-01 10:02:01'),
	(4,'Millie','This guy came to us after his owner threatened to dump him because they no longer wanted him. Caramel is an absolute sweetheart who due to being poorly socialised prior to coming into our care, is very nervous of new people. It does take him a wee while to warm up to you but once he knows he\'s safe, you will have a friend for life. Caramel is best suited to a routine lifestyle where he will receive consistency as well as firm but fair rules and boundaries. He is suitable in a home with older dog savvy kids who wont frighten him and he is fantastic with other dogs. Unfortunately he is unable to live with cats. All our dogs need to sleep inside as part of the family, you must be fully fenced and we prefer owner occupied. We ask that an adoption donation of $280 be paid to help us cover our costs.','https://images.pexels.com/photos/97082/weimaraner-puppy-dog-snout-97082.jpeg?w=1260&h=750&auto=compress&cs=tinysrgb',0,2,2,1,1,1,1,0,0,1,'2017-06-01 10:02:01','2017-06-01 10:02:01'),
	(5,'Gypsy','Gypsy is a beautiful foxy cross puppy. She is 11 weeks old and will be available after she has been desexed. Gypsy will come vaccinated, wormed, flea treated, desexed as well as microchipped. Approved fully fenced home only - Renters will need signed agreement from landlord. Adoption fee of $250 applies - This helps to cover some of the vet expenses. ','https://images.pexels.com/photos/286301/pexels-photo-286301.jpeg?w=940&h=650&auto=compress&cs=tinysrgb',1,2,1,0,1,1,1,0,0,1,'2017-06-08 16:43:16','2017-06-08 16:43:16'),
	(6,'Samson','Samson’s foster parents say: “He is super smart and loves to learn/work. Lots of talking and very human oriented”. Samson is intelligent and affectionate, and although he can be quite excitable, he’s a fairly medium energy dog. Samson loves playing with a large ball, going for walks and cuddling up with humans. He loves being with people and dogs he knows, and will thrive in a home that has other sociable dogs, or even better has a human at home most of the time. Samson likes small dogs, but can be a little fearful of dogs his size or larger, so he needs time to get to know them at his own pace, with positive reinforcement from his guardian. Samson grew up with children, but he does have the tendency to jump up when excited, so kids will need to be pretty dog savvy. Samson is not used to cats and is likely to chase them. Samson’s family relocated overseas and he has been fostered in South Auckland since the end of last year.','https://images.pexels.com/photos/412465/pexels-photo-412465.jpeg?w=1260&h=750&auto=compress&cs=tinysrgb',0,1,2,1,1,1,1,0,1,1,'2017-06-12 09:10:30','2017-06-12 09:10:30'),
	(7,'Indi','Indi adores people, amazing with kids, and is great with other dogs. She isn\'t suitable in a home with cats or small fluffies. She can be a wee bit shy of new situation but adjusts quickly and gets into the fun. Indi is a very clever girl who will require a home with decent fencing and where she will be given decent mental & physical stimulation to keep her out of mischief. All of our dogs are destined to be family dogs, that will sleep inside. Owner occupied is preferred. The adoption fee of $280 helps us cover the cost of desexing, registration, microchipping, vaccinations & for flea and worm treatment while waiting for their forever homes','https://images.pexels.com/photos/216941/pexels-photo-216941.jpeg?w=1260&h=750&auto=compress&cs=tinysrgb',0,1,1,1,1,1,1,1,1,1,'2017-06-12 09:57:54','2017-06-12 09:57:54'),
	(8,'Ace','Ace is a playful, lovable oaf, loves chasing chewed up rugby balls even more than food. Key thing to know is he is deaf, but very well trained and is very obedient providing he can see you. Has grown up with 3 other dogs, so is well socialised but has been known to get a bit boisterous and be put in his place by the others. Would do well in a loving home with some patience and plenty of old rugby balls.','https://images.pexels.com/photos/9080/night-garden-yellow-animal.jpg?w=1260&amp;h=750&amp;auto=compress&amp;cs=tinysrgb',0,2,2,0,0,0,0,0,0,1,'2017-06-12 15:53:11','2017-06-12 15:53:11'),
	(9,'Boxer','Meet Boxer, he is an absolutely lovely, active, healthy, playful almost three year old dog. He originally came to live with us for the period in which we were looking to find him a forever home, but fell madly in love with him and ended up keeping him for the past 8 months. He’s been the most loyal uplifting companion, a really special dog with a wonderful personality. Sadly, it is time for us to find him an amazing home and someone who will love him and spoil him the same way we do. How does he live? He is an indoor/ outdoor dog with free reign of the house. A massive cuddle bug, he’s been sleeping in our room and is allowed on our couches. He eats a diet of real raw food, mainly lamb/pork bones/offcuts from the butcher (very cheap) and rice. He loves bananas as a snack, and its also a really good way to sneak in his medication – he sometimes needs a pill for skin reactions, short haired dogs often have more sensitive skin. He is an extremely energetic dog, if he had it his way he would be out all the time playing, and would love to go for a run twice a day (very good alongside a bike!). He was brought up around young adults, doesn’t have much experience with children yet but hasn’t shown any worrying behaviour, just still a very curious pup and would prefer to be with a family without young children (8yr old or under), as he loves all the attention. He is highly sociable with most dogs, however he doesn’t get along with small yappy dogs. He doesn’t have much experience with cats – we live with one that he’s getting used to, and highly interested in.. They haven’t had an official introduction. He loves swimming in the river, biking, playing with toys (fetch is fun! Getting the hang of giving the ball back) NOT familiar with farm animals, shouldn’t be left unattended with unfenced livestock (he’s a city boy..) He loves to roam our big yard, we have a partial fence yet he doesn’t wander off the property. He does NOT appreciate being left home alone for long periods of time! Ideally, he wants to be by your side as much as possible. ','https://images.pexels.com/photos/26445/pexels-photo-26445.jpg?w=1260&h=750&auto=compress&cs=tinysrgb',1,1,2,1,1,1,1,0,1,9,'2017-06-12 09:13:40','2017-06-12 09:13:40'),
	(10,'Nala','Through no fault of her own Nala, the gorgeous Samoyed finds herself homeless. We are seeking a loving home for Nala with an experienced dog person. About Nala: • Nala is a friendly medium sized, solid, healthy girl. • She has just been desexed, microchipped, vaccinated and registered ready for adoption. • Nala is walking well on leash, understands a number of commands and is very receptive to learning with positive reinforcement. She does have some fear/anxiety around new situations due to lack of socialisation so does require ongoing help with her training. • She socialises with medium to large sized dogs, but does require ongoing training/socialising with small dogs and cats. Nala requires: • A stable loving home with experienced dog people • A secure outdoor area including high fences (1.8m) • A home with children over 12 years and preferably a dog her size or larger. Nala is currently located in the Auckland area, and we are seeking a home in the greater Auckland area (as far north as Wellsford). (Potential adopters living outside the Auckland area will need to come to Auckland to meet Nala as part of the adoption process.)','https://images.pexels.com/photos/356378/pexels-photo-356378.jpeg?w=1260&amp;h=750&amp;auto=compress&amp;cs=tinysrgb',0,1,1,1,1,1,1,0,1,9,'2017-06-15 09:10:54','2017-06-15 09:10:54'),
	(11,'Skyla','Skyla is very friendly with people and children of all ages. She does need training on how to play more gently with other dogs as she is a little rough, though never bitten another dog. She loves the water, chasing balls, walks and does OK in the car and will calm after 15 minutes. She is young so needs someone committed to train her, and is a very smart and well mannered dog. House trained as she has been an inside dog and enjoyed a large backyard. She is good with leaving food alone and we have not had a problem with her stealing food off the table which makes her a great companion if you enjoy hosting events at home.','https://images.pexels.com/photos/192550/pexels-photo-192550.jpeg?w=1260&amp;h=750&amp;auto=compress&amp;cs=tinysrgb',0,1,1,0,0,0,0,0,0,10,'2017-06-15 09:22:09','2017-06-15 09:22:09'),
	(41,'Ash','Ash is a mixed breed pup who is full of energy and a very loving dog looking for his forever home.','https://images.pexels.com/photos/173127/pexels-photo-173127.jpeg?w=1260&amp;h=750&amp;auto=compress&amp;cs=tinysrgb',5,2,2,0,0,0,0,0,0,10,'2017-06-15 11:14:33','2017-06-15 11:14:33');

/*!40000 ALTER TABLE `listings` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table location
# ------------------------------------------------------------

DROP TABLE IF EXISTS `location`;

CREATE TABLE `location` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `location` WRITE;
/*!40000 ALTER TABLE `location` DISABLE KEYS */;

INSERT INTO `location` (`id`, `name`)
VALUES
	(1,'Auckland'),
	(2,'Northland'),
	(3,'Coromandel'),
	(4,'Bay of Plenty'),
	(5,'Waikato'),
	(7,'Eastland'),
	(8,'Taupo'),
	(9,'Taranaki'),
	(10,'Hawke\'s Bay'),
	(11,'Wanganui'),
	(12,'Manawatu'),
	(13,'Wellington'),
	(14,'Nelson'),
	(15,'Marlborough'),
	(16,'West Coast'),
	(17,'Christchurch'),
	(18,'Wanaka'),
	(19,'Queenstown'),
	(20,'Otago'),
	(21,'Southland');

/*!40000 ALTER TABLE `location` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `admin` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `admin`)
VALUES
	(1,'catherine','fromont','catherinegfromont@gmail.com','$2y$10$o60GLdBpvBDnVmSBIZOjvevX7TJCB5kP5W55Lc6n6UO0QH9l322z.',1),
	(5,'Ciara','Vasquez','duxiwulane@hotmail.com','$2y$10$C/1CIGshf7fEjsLd8FrlqeCQNQ4KUpC8UHXF3z5.5a9ga1AdO5a2q',0),
	(6,'Pascale','Moss','dira@hotmail.com','$2y$10$Gtdo8rEGHBO/9jxzY1L0JuJSS0rq06KNPZdpyJLEyn5nEm0Fq33VC',0),
	(7,'Wade','Flynn','vapixo@gmail.com','$2y$10$0P1YguYvNrvopotvGwifc.iCb/BKOzhLqZdjmbhgVET60syKAuIUG',0),
	(8,'Adena','Gardner','biroci@hotmail.com','$2y$10$cKNHCsbZ8e9BHtfHHrJiUObnrbFktq6qaLXCLZwNwgvEELL6EK7WK',0),
	(9,'Nero','Buckley','nero@gmail.com','$2y$10$23Lr5dIX9MW02mueKOBJi.djGaa5r146kxcTgHGD0aMuEZ6.Oojb.',0),
	(10,'John','Small','john@hotmail.com','$2y$10$hCXHuiEBe97GCVXmLd97RuFINIyBZrC5xb.qLMzeCq9uWCdNVEK6C',0);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

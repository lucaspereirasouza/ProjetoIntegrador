-- MySQL dump 10.13  Distrib 8.0.31, for Win64 (x86_64)
--
-- Host: 10.26.45.244    Database: dbprojeto
-- ------------------------------------------------------
-- Server version	8.0.34

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `wp_usermeta`
--

DROP TABLE IF EXISTS `wp_usermeta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wp_usermeta` (
  `umeta_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_520_ci,
  PRIMARY KEY (`umeta_id`),
  KEY `user_id` (`user_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_usermeta`
--

LOCK TABLES `wp_usermeta` WRITE;
/*!40000 ALTER TABLE `wp_usermeta` DISABLE KEYS */;
INSERT INTO `wp_usermeta` VALUES (1,1,'nickname','senac'),(2,1,'first_name',''),(3,1,'last_name',''),(4,1,'description',''),(5,1,'rich_editing','true'),(6,1,'syntax_highlighting','true'),(7,1,'comment_shortcuts','false'),(8,1,'admin_color','fresh'),(9,1,'use_ssl','0'),(10,1,'show_admin_bar_front','true'),(11,1,'locale',''),(12,1,'wp_capabilities','a:1:{s:13:\"administrator\";b:1;}'),(13,1,'wp_user_level','10'),(14,1,'dismissed_wp_pointers',''),(15,1,'show_welcome_panel','0'),(17,1,'wp_dashboard_quick_press_last_post_id','5'),(18,1,'community-events-location','a:1:{s:2:\"ip\";s:10:\"10.26.45.0\";}'),(19,1,'wp_persisted_preferences','a:4:{s:14:\"core/edit-post\";a:3:{s:26:\"isComplementaryAreaVisible\";b:1;s:12:\"welcomeGuide\";b:0;s:10:\"openPanels\";a:2:{i:0;s:14:\"featured-image\";i:1;s:11:\"post-status\";}}s:9:\"_modified\";s:24:\"2023-10-23T19:40:35.648Z\";s:17:\"core/edit-widgets\";a:2:{s:26:\"isComplementaryAreaVisible\";b:1;s:12:\"welcomeGuide\";b:0;}s:22:\"core/customize-widgets\";a:1:{s:12:\"welcomeGuide\";b:0;}}'),(20,1,'elementor_introduction','a:5:{s:27:\"ai-get-started-announcement\";b:1;s:14:\"ai_get_started\";b:1;s:7:\"exit_to\";b:1;s:20:\"globals_introduction\";b:1;s:16:\"favorites-notice\";b:1;}'),(21,1,'wp_elementor_connect_common_data','a:7:{s:9:\"client_id\";s:32:\"gfTbJnWhO1Om3YpJ5CLeFgWvJbiT6tAs\";s:11:\"auth_secret\";s:32:\"BA7S4gvMh1svl0n9qpbNuPAVCLPjuqnU\";s:12:\"access_token\";s:291:\"eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOjU3NDEzMDksImF1ZCI6Imh0dHA6Ly8xMC4yNi40NS4yNDQ6Njk2OS8iLCJjbGllbnRfaWQiOiJnZlRiSm5XaE8xT20zWXBKNUNMZUZnV3ZKYmlUNnRBcyIsImNvbm5lY3RfdHlwZSI6ImxpYnJhcnkiLCJpYXQiOjE2OTc3MzgwMjcsImV4cCI6MzE3MjQyMTgwNDI3fQ.HLozrROckAsqsrrxI-AtTqhxUKJSMZVpY62J8y4VAu0\";s:19:\"access_token_secret\";s:32:\"xJfTaW9T8KK9YUhd6YLIUTgFfcX1zRB4\";s:10:\"token_type\";s:6:\"bearer\";s:4:\"user\";O:8:\"stdClass\":1:{s:5:\"email\";s:26:\"giovannimorais44@gmail.com\";}s:19:\"data_share_opted_in\";b:1;}'),(22,1,'wp_user-settings','libraryContent=browse&editor=tinymce&hidetb=0'),(23,1,'wp_user-settings-time','1698083460'),(24,1,'managenav-menuscolumnshidden','a:5:{i:0;s:11:\"link-target\";i:1;s:11:\"css-classes\";i:2;s:3:\"xfn\";i:3;s:11:\"description\";i:4;s:15:\"title-attribute\";}'),(25,1,'metaboxhidden_nav-menus','a:3:{i:0;s:28:\"add-post-type-e-landing-page\";i:1;s:12:\"add-post_tag\";i:2;s:15:\"add-post_format\";}'),(26,1,'nav_menu_recently_edited','4'),(27,1,'session_tokens','a:7:{s:64:\"43adfde8302a0f04615746a4463dbe657a6124d639231b9b9e6cc5ad4d7e8d48\";a:4:{s:10:\"expiration\";i:1699296404;s:2:\"ip\";s:11:\"10.26.45.54\";s:2:\"ua\";s:111:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36\";s:5:\"login\";i:1698086804;}s:64:\"8f014655a45012c7fbaa3986a0f5c7f8d65f36f8cf3f9baeec09c13c16ed6c08\";a:4:{s:10:\"expiration\";i:1698340700;s:2:\"ip\";s:11:\"10.26.45.38\";s:2:\"ua\";s:111:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36\";s:5:\"login\";i:1698167900;}s:64:\"32b9951e28604710b49eb0c96878459672d2e936be054e10ac70f12a067d06cf\";a:4:{s:10:\"expiration\";i:1698343673;s:2:\"ip\";s:11:\"10.26.45.38\";s:2:\"ua\";s:111:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36\";s:5:\"login\";i:1698170873;}s:64:\"4ccb0de28a893641560d7ad02fde9e8e995f2038434485aa5977086ace4e438e\";a:4:{s:10:\"expiration\";i:1699380583;s:2:\"ip\";s:11:\"10.26.45.38\";s:2:\"ua\";s:111:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36\";s:5:\"login\";i:1698170983;}s:64:\"5569bfc49af5eb263f2275b480fe4e9f0fcd184d4bd0102d368c1059d7367e51\";a:4:{s:10:\"expiration\";i:1699380681;s:2:\"ip\";s:11:\"10.26.45.54\";s:2:\"ua\";s:111:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36\";s:5:\"login\";i:1698171081;}s:64:\"e9e3918f7cd99cf40b44332b9cce42f4a0332dd1ee611e7b5157f8b4be22adba\";a:4:{s:10:\"expiration\";i:1698347037;s:2:\"ip\";s:11:\"10.26.45.38\";s:2:\"ua\";s:111:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36\";s:5:\"login\";i:1698174237;}s:64:\"f4d10e5bc86043d266bdc58707fa1cf85332eab1d1d5bc83c846eed6f64771ec\";a:4:{s:10:\"expiration\";i:1699466579;s:2:\"ip\";s:11:\"10.26.45.21\";s:2:\"ua\";s:78:\"Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/118.0\";s:5:\"login\";i:1698256979;}}'),(28,1,'elementor_preferences','a:0:{}');
/*!40000 ALTER TABLE `wp_usermeta` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-10-31 14:59:27

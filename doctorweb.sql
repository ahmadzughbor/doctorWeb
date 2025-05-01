-- MySQL dump 10.13  Distrib 8.0.38, for macos14 (arm64)
--
-- Host: localhost    Database: doctorweb
-- ------------------------------------------------------
-- Server version	8.4.2

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
-- Table structure for table `appointments`
--

DROP TABLE IF EXISTS `appointments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `appointments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `doctor_id` bigint unsigned NOT NULL,
  `patient_id` bigint unsigned NOT NULL,
  `starts_at` timestamp NULL DEFAULT NULL,
  `finishes_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feedback` text COLLATE utf8mb4_unicode_ci,
  `rating` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `appointments_doctor_id_foreign` (`doctor_id`),
  KEY `appointments_patient_id_foreign` (`patient_id`),
  CONSTRAINT `appointments_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`),
  CONSTRAINT `appointments_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `appointments`
--

LOCK TABLES `appointments` WRITE;
/*!40000 ALTER TABLE `appointments` DISABLE KEYS */;
INSERT INTO `appointments` VALUES (1,5,1,'2025-01-07 15:11:27',NULL,'scheduled',NULL,NULL,'2024-12-27 09:24:43','2024-12-27 09:24:43'),(2,4,1,'2024-12-26 16:47:10',NULL,'completed','Velit est officiis et dolore. Fugiat ut ab dignissimos dolorum id blanditiis. Et voluptas ipsum voluptatem non.',2,'2024-12-27 09:24:43','2024-12-27 09:24:43'),(3,4,2,'2025-01-03 11:11:47',NULL,'scheduled',NULL,NULL,'2024-12-27 09:24:43','2024-12-27 09:24:43'),(4,2,3,'2024-12-25 10:03:34',NULL,'completed','Rem cupiditate rerum odit aut velit. Dolores ea dolorem dolores ab repellendus et. Est officiis illum velit perferendis nisi fuga.',2,'2024-12-27 09:24:43','2024-12-27 09:24:43'),(5,4,3,'2025-01-12 20:00:38',NULL,'scheduled',NULL,NULL,'2024-12-27 09:24:43','2024-12-27 09:24:43'),(6,2,3,'2025-01-02 03:06:56',NULL,'scheduled',NULL,NULL,'2024-12-27 09:24:43','2024-12-27 09:24:43'),(7,3,4,'2025-01-15 12:52:28',NULL,'scheduled',NULL,NULL,'2024-12-27 09:24:43','2024-12-27 09:24:43'),(8,3,5,'2025-01-15 18:28:24',NULL,'scheduled',NULL,NULL,'2024-12-27 09:24:43','2024-12-27 09:24:43'),(9,1,5,'2024-12-28 13:19:54',NULL,'scheduled',NULL,NULL,'2024-12-27 09:24:43','2024-12-27 09:24:43'),(10,3,6,'2025-01-04 20:34:37',NULL,'scheduled',NULL,NULL,'2024-12-27 09:24:43','2024-12-27 09:24:43'),(11,4,6,'2025-01-07 07:12:30',NULL,'scheduled',NULL,NULL,'2024-12-27 09:24:43','2024-12-27 09:24:43'),(12,5,6,'2025-01-03 10:54:03',NULL,'scheduled',NULL,NULL,'2024-12-27 09:24:43','2024-12-27 09:24:43'),(13,3,7,'2025-01-01 03:39:57',NULL,'scheduled',NULL,NULL,'2024-12-27 09:24:43','2024-12-27 09:24:43'),(14,4,8,'2025-01-10 19:50:53',NULL,'scheduled',NULL,NULL,'2024-12-27 09:24:43','2024-12-27 09:24:43'),(15,1,8,'2024-12-31 23:00:06',NULL,'scheduled',NULL,NULL,'2024-12-27 09:24:43','2024-12-27 09:24:43'),(16,1,8,'2024-12-27 14:00:01',NULL,'scheduled',NULL,NULL,'2024-12-27 09:24:43','2024-12-27 09:24:43'),(17,4,9,'2024-12-30 18:31:30',NULL,'scheduled',NULL,NULL,'2024-12-27 09:24:43','2024-12-27 09:24:43'),(18,3,9,'2025-01-10 13:42:19',NULL,'scheduled',NULL,NULL,'2024-12-27 09:24:43','2024-12-27 09:24:43'),(19,4,9,'2025-01-10 19:45:29',NULL,'scheduled',NULL,NULL,'2024-12-27 09:24:43','2024-12-27 09:24:43'),(20,1,10,'2025-01-08 21:05:19',NULL,'scheduled',NULL,NULL,'2024-12-27 09:24:43','2024-12-27 09:24:43'),(21,2,10,'2025-01-16 03:34:15',NULL,'scheduled',NULL,NULL,'2024-12-27 09:24:43','2024-12-27 09:24:43'),(22,2,11,'2024-12-30 13:31:00',NULL,'scheduled',NULL,NULL,'2024-12-27 09:31:47','2024-12-27 09:31:47'),(23,3,11,'2024-12-30 11:38:00',NULL,'scheduled',NULL,NULL,'2024-12-27 09:37:05','2024-12-27 09:37:05'),(24,1,11,'2024-12-25 11:40:00',NULL,'scheduled',NULL,NULL,'2024-12-27 09:38:24','2024-12-27 09:40:56'),(25,2,5,'2024-12-11 22:00:00',NULL,'scheduled',NULL,NULL,'2024-12-27 10:05:36','2024-12-27 10:05:36'),(26,4,11,'2025-01-08 12:14:00',NULL,'scheduled',NULL,NULL,'2024-12-27 10:11:40','2024-12-27 10:11:40');
/*!40000 ALTER TABLE `appointments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `doctors`
--

DROP TABLE IF EXISTS `doctors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `doctors` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `speciality` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qualification` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `doctors_user_id_foreign` (`user_id`),
  CONSTRAINT `doctors_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctors`
--

LOCK TABLES `doctors` WRITE;
/*!40000 ALTER TABLE `doctors` DISABLE KEYS */;
INSERT INTO `doctors` VALUES (1,2,'orthopedic Surgeon','Iusto sit sit quia ut. Saepe facilis voluptatem impedit natus. Nostrum sed sit qui voluptatibus quo odio. Dolores omnis et a. Deleniti itaque repellendus quas voluptatem sapiente fugit atque. In possimus rem soluta nisi. Accusamus voluptate velit dolore ea qui explicabo voluptas. Autem sit inventore autem harum rerum. Et necessitatibus qui quia numquam corporis dolor officia et. Repellendus nesciunt quasi quod voluptas qui. Dolorem eum saepe adipisci aut alias quia necessitatibus.','2024-12-27 09:24:41','2024-12-27 09:24:41'),(2,4,'neurologist','Deleniti maxime molestiae est. Et voluptas ut voluptatem qui a ipsa labore magni. Sit ea ut minima consequatur maxime. Enim et necessitatibus est et aut non. Et et consequatur ut eveniet optio molestias. Qui sint ratione dolorem quasi velit corrupti tempore. Qui quia aut quia iste occaecati quia. Nisi voluptates nihil quia reiciendis et. Temporibus possimus necessitatibus mollitia fugit. Voluptatem suscipit repellendus inventore et voluptatem recusandae consequatur. Et repudiandae est incidunt est velit.','2024-12-27 09:24:41','2024-12-27 09:24:41'),(3,6,'anesthesiologist','Quam sed nostrum nisi enim quisquam rerum. Sunt adipisci et doloremque quidem hic nulla quia. Modi aliquam repellendus quasi dolorem voluptatem. Delectus non et laboriosam magnam voluptatem. Nam accusamus saepe sit illo blanditiis quis exercitationem. Alias non est perspiciatis in recusandae facilis suscipit. Odio ipsam inventore odit mollitia doloremque placeat nihil. Dignissimos libero aut voluptate et et. Nihil ab eum repudiandae vero molestiae vel commodi. Alias commodi eum unde voluptatem rem voluptatem quidem. Placeat provident architecto asperiores distinctio aliquam aut molestiae.','2024-12-27 09:24:41','2024-12-27 09:24:41'),(4,8,'pediatrician','Optio aut perspiciatis eum optio accusantium illo. Sapiente soluta sequi in nemo voluptatem illum. Non dolores tempore fugiat omnis. Perspiciatis esse velit quas non suscipit quaerat eos cupiditate. Accusamus magnam sed dolorum eum. Consequatur modi occaecati similique. Quis sint culpa est omnis est. Consequatur odio sint velit dolores iure et. Vel qui ipsa libero nisi et quia. Earum dolores corrupti eos autem qui sapiente aperiam. Laboriosam accusantium est quis temporibus occaecati. Aut ipsam fuga facere occaecati quia. Quasi ad debitis placeat nesciunt corporis sunt.','2024-12-27 09:24:41','2024-12-27 09:24:41'),(5,10,'anesthesiologist','Autem ut minus animi veniam et. Qui beatae enim voluptatem et quaerat sit. Asperiores laudantium repellat molestiae. Ullam ab quibusdam vel. Nobis qui numquam nam ratione enim. Dolor exercitationem possimus facilis voluptate assumenda assumenda. Sed labore et molestiae nam. Est aut aliquam qui est in. Et hic alias enim repellendus sapiente. Deleniti et eum hic quaerat quam numquam nemo. Qui eius atque incidunt enim aut maiores necessitatibus nostrum. Enim dolores est in nostrum qui. Doloribus ut nam nulla adipisci suscipit et modi temporibus. Qui earum earum et libero sit voluptas.','2024-12-27 09:24:42','2024-12-27 09:29:25');
/*!40000 ALTER TABLE `doctors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `emergency_contacts`
--

DROP TABLE IF EXISTS `emergency_contacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `emergency_contacts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `patient_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `relationship` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `emergency_contacts_patient_id_foreign` (`patient_id`),
  CONSTRAINT `emergency_contacts_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emergency_contacts`
--

LOCK TABLES `emergency_contacts` WRITE;
/*!40000 ALTER TABLE `emergency_contacts` DISABLE KEYS */;
/*!40000 ALTER TABLE `emergency_contacts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_100000_create_password_resets_table',1),(2,'2019_08_19_000000_create_failed_jobs_table',1),(3,'2019_12_14_000001_create_personal_access_tokens_table',1),(4,'2023_05_29_135123_create_users_table',1),(5,'2023_05_30_181938_create_doctors_table',1),(6,'2023_05_30_181948_create_patients_table',1),(7,'2023_05_30_182246_create_appointments_table',1),(8,'2024_01_01_000000_update_appointment_statuses',1),(9,'2024_01_02_add_medical_history_fields',2),(10,'2024_01_03_add_emergency_contacts',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `patients`
--

DROP TABLE IF EXISTS `patients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `patients` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `medical_history` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `allergies` text COLLATE utf8mb4_unicode_ci,
  `current_medications` text COLLATE utf8mb4_unicode_ci,
  `chronic_conditions` text COLLATE utf8mb4_unicode_ci,
  `previous_surgeries` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `patients_user_id_foreign` (`user_id`),
  CONSTRAINT `patients_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `patients`
--

LOCK TABLES `patients` WRITE;
/*!40000 ALTER TABLE `patients` DISABLE KEYS */;
INSERT INTO `patients` VALUES (1,12,'Exercitationem veniam et veritatis quasi. Laboriosam dolorum ut repellat in veritatis eligendi odio sequi. Et ipsam reprehenderit nostrum quia ad aut. Sit id consequatur laboriosam quam suscipit odio cum. Voluptatum velit fuga consequatur. Dolor dolore laboriosam non tenetur est. Et voluptatum nihil fuga temporibus cupiditate id tempora. In ducimus nihil necessitatibus in iste unde. Et omnis aut quo qui et laboriosam impedit qui. Ducimus suscipit eius dolores omnis impedit est. Aliquid natus et et temporibus perferendis occaecati.','2024-12-27 09:24:43','2024-12-27 09:24:43',NULL,NULL,NULL,NULL),(2,14,'Repellendus possimus ut rerum veritatis. Quia incidunt aut a qui atque vel vitae. Aperiam qui quas velit et. Maxime eum velit omnis autem ipsa maiores. Qui qui et nobis. Accusantium aut et et est qui sed. Non molestiae est ea facere sit sit id. Voluptas iste perferendis aut. Necessitatibus culpa modi sit inventore facilis. Mollitia hic sint similique quidem. Ut est aut voluptas hic impedit magnam. Sit beatae placeat dolorem suscipit.','2024-12-27 09:24:43','2024-12-27 09:24:43',NULL,NULL,NULL,NULL),(3,16,'Ipsa earum totam labore distinctio. Numquam quod et culpa beatae animi. Consequatur quia dolores sit quia similique. Et error voluptatem voluptatem assumenda placeat sint odio. Et rem soluta sint ut corporis enim eaque. Laborum amet adipisci quae eum excepturi officiis dolores. Voluptatem laudantium vero velit quis aut aperiam dolorum. Commodi repudiandae sit a. Inventore quis voluptatem et praesentium. Aspernatur a voluptatem eius quas architecto. Atque dolores sit illum soluta veniam. Nam animi accusantium vero. Ex necessitatibus omnis quo maxime.','2024-12-27 09:24:43','2024-12-27 09:24:43',NULL,NULL,NULL,NULL),(4,18,'Exercitationem sit maxime sit et expedita possimus placeat. Quia similique ea quam. Alias fugit et ea laudantium aut recusandae. Velit voluptatum aliquid sint quia et. Blanditiis sint nam fugiat sit modi iure id cupiditate. Id ratione facilis quod voluptatem. Quod soluta illo nemo laudantium deserunt minus. Ducimus culpa autem animi sit non qui. Modi voluptas culpa deserunt voluptate ipsum exercitationem unde. Magni tempora non exercitationem inventore maiores. Deserunt eos quidem odio sed accusantium ea eum. Est nobis deleniti id omnis amet et. Corporis omnis dolorem omnis suscipit.','2024-12-27 09:24:43','2024-12-27 09:24:43',NULL,NULL,NULL,NULL),(5,20,'Distinctio beatae omnis modi consequatur est. Pariatur voluptatum molestiae dolorem sit. Ea et ea et. Non suscipit error voluptatem molestias suscipit. Eveniet accusamus sit a ipsum sint. Voluptatem nobis ipsam odit voluptatum esse provident. Quia tempore aut vero quis delectus. Exercitationem voluptatem dignissimos aspernatur velit ut. Aut sunt ab sit dolores enim qui expedita voluptas. Aut voluptatum vero omnis animi. Facilis fuga alias autem fugit.','2024-12-27 09:24:43','2024-12-27 09:24:43',NULL,NULL,NULL,NULL),(6,22,'Voluptatem eaque consequuntur hic. Magnam culpa officia dolores neque. Quidem architecto quia odio quo. Totam assumenda voluptas voluptate quis at debitis omnis. Et quia asperiores culpa ut. Dolor repudiandae exercitationem reiciendis corporis autem est. Possimus nam rerum laborum est magni. Corporis sit magni dicta sequi quidem dolorem. Omnis non ipsam sapiente eius. Accusantium ullam minima amet qui in cum neque.','2024-12-27 09:24:43','2024-12-27 09:24:43',NULL,NULL,NULL,NULL),(7,24,'Impedit exercitationem qui nam voluptates eos voluptatem. Velit aliquid soluta dolorem. Perspiciatis facilis ut aliquid sed dolore porro. Et aspernatur magnam sit quo. Expedita non aut reiciendis asperiores quas perspiciatis cupiditate. Iure molestias accusamus atque sit. Ipsa maiores amet sed. Velit debitis ut inventore. Et labore eos et. Voluptas occaecati consequatur quidem omnis. Nemo dolores labore dolorum. Quis aut excepturi commodi consequuntur labore. Ipsam et voluptatum architecto consequatur. Et est aut voluptatem sint.','2024-12-27 09:24:43','2024-12-27 09:24:43',NULL,NULL,NULL,NULL),(8,26,'Esse voluptas autem aut nemo sit. Laborum necessitatibus laborum magni ea ut tenetur. Commodi ipsum enim dignissimos ea eius alias eius. Numquam autem veritatis unde eum consequatur. Quidem similique quae praesentium est molestiae dolores. Qui aspernatur qui nesciunt quas. Asperiores sit praesentium nesciunt exercitationem provident. Est qui aut ut mollitia quo. Eaque hic et harum nam dolor. Doloremque est perferendis et veritatis est cum ea. Neque ratione et explicabo molestias in. Expedita quidem illo ut non.','2024-12-27 09:24:43','2024-12-27 09:24:43',NULL,NULL,NULL,NULL),(9,28,'Distinctio quaerat sit nulla. Eveniet doloremque facilis sapiente debitis. Qui rerum eveniet explicabo inventore enim. Illo iste voluptatem repellendus. Culpa consequuntur ea laudantium soluta. Eius est aut vero facilis sequi est. Ut et neque expedita neque sit. Odit qui enim mollitia voluptas consequatur tempora. Fugit quia vel eos sunt in dolor aut. Et nesciunt unde et unde nesciunt officiis aspernatur. Sit aspernatur cum officia est et. Assumenda voluptas quia at blanditiis quo. Ut recusandae sint assumenda.','2024-12-27 09:24:43','2024-12-27 09:24:43',NULL,NULL,NULL,NULL),(10,30,'Id eligendi velit beatae doloremque quisquam non vitae. Vero corporis officiis occaecati quibusdam sed. Sit ut asperiores et nihil. Sed eaque est cum odio porro. Deserunt est animi aliquid maiores. Corrupti sunt similique sed sed aliquam molestiae. Sint non illum natus velit. Quisquam eum vel velit qui sapiente. Est sit ut cupiditate aliquam ex. Itaque est non commodi saepe fugit sunt. Dolore rerum cum et sequi nesciunt eos. Blanditiis aut iusto rerum sequi. Voluptate ducimus vel sit temporibus omnis sit.','2024-12-27 09:24:43','2024-12-27 09:24:43',NULL,NULL,NULL,NULL),(11,13,'<p><strong>wqvcwerqv</strong></p>','2024-12-27 09:31:21','2024-12-27 10:11:11',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `patients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin User','admin@example.com','2024-12-27 09:24:41','$2y$10$Agaqio50ZLAI/tpZQThFmeaoM/NspMFNtQqINEwu4BXHdYPJTrfIS','female','admin','DgjuXzZfKf','2024-12-27 09:24:41','2024-12-27 09:24:41'),(2,'Aniyah Nikolaus','kendall11@example.org','2024-12-27 09:24:41','$2y$10$cL8oasTqcm4qLLenndWdBep/fO6ncbAkNoAGgjy5PwseAhMj4Wf1e','female','doctor','IF55j9rlkc','2024-12-27 09:24:41','2024-12-27 09:24:41'),(3,'Trey O\'Conner','xrogahn@example.org','2024-12-27 09:24:41','$2y$10$LwHBV3eP8AobAZTogQS4bep3wcqubdX7HfoNGpG5p0.OhPscGow7m','female','doctor','aI9exBLKMH','2024-12-27 09:24:41','2024-12-27 09:24:41'),(4,'Kristin Hettinger','konopelski.jerome@example.com','2024-12-27 09:24:41','$2y$10$LkSAenylKOdVc75MrX/n0ekvL0p97vqGeZ1HynyPu4ih0KAriJGOe','male','doctor','J5F67kX4NfNJzGROcGWHTVBpCOkrmc3oIZruGoruhBVumxmVcyd3KrQcK4Xs','2024-12-27 09:24:41','2024-12-27 09:24:41'),(5,'Juliana Schumm','marvin.cedrick@example.com','2024-12-27 09:24:41','$2y$10$49OZzvY.VaC3xtXLVRnS/.C3KVM18MQEM2PK0PS/t1w5PcwLDYb5K','female','doctor','PuQ2ZC7FJD','2024-12-27 09:24:41','2024-12-27 09:24:41'),(6,'Magnus Bogisich','emmett30@example.net','2024-12-27 09:24:41','$2y$10$Ir5e5swBVxNr3eiH4Vkv.uK2.MGGV5Pcx2yvzyR4zDtxDKk3G2Cti','female','doctor','94lhXrSxhD','2024-12-27 09:24:41','2024-12-27 09:24:41'),(7,'Stuart Altenwerth','zachary57@example.org','2024-12-27 09:24:41','$2y$10$zhvwR.lAEXgpezqPbMTjb.m4vHm4r0oeTYiKrmkv64fezhO.M9cHC','male','doctor','L8UOErxybg','2024-12-27 09:24:41','2024-12-27 09:24:41'),(8,'Dr. Emmitt Sipes Sr.','strosin.mittie@example.net','2024-12-27 09:24:41','$2y$10$sQylItexBQC3kI/tBP2hz.0oCgzpa8hvIMJr0yl7cJMBmJvn1ce3K','female','doctor','QEMDfyzqjV','2024-12-27 09:24:41','2024-12-27 09:24:41'),(9,'Rowland Schuster','keebler.ronaldo@example.net','2024-12-27 09:24:41','$2y$10$myyYyCdisYRh60p4r/TYkOBw3malnatz4hDqsKg8Azzb954B/lG12','male','doctor','7iluLhMocpKKeIl56XcZqa7dQTsuxkFAZdbGiuiLT6Tw4xOVjD1SX0pvBHWp','2024-12-27 09:24:41','2024-12-27 10:08:23'),(10,'Antonio Franecki','oberbrunner.maurine@example.org','2024-12-27 09:24:41','$2y$10$lq.qPITzAf6WzJuhiTARk.tl4/3GfE3.GN6fpbjNUxMLwOyXX8xry','female','doctor','m98W9tMGYb','2024-12-27 09:24:41','2024-12-27 09:29:25'),(11,'Cory Buckridge','pmitchell@example.org','2024-12-27 09:24:41','$2y$10$qd9gzdkztioXomBbHWoz5elyydXmRztEwrkY7YfKl.6XmbEU4nTBS','female','doctor','zPOoyaPgA5','2024-12-27 09:24:42','2024-12-27 09:24:42'),(12,'Mr. Randi Beatty DVM','cwest@example.org','2024-12-27 09:24:42','$2y$10$Ny2ixYBXqPY63bkLuwj/HeVSZnV8ot1JHQGEvsvhrbahdxdpAP7Lm','male','patient','9ogl6QfdEQ','2024-12-27 09:24:42','2024-12-27 09:24:42'),(13,'Jamar Schroeder I','arnaldo.kunde@example.net','2024-12-27 09:24:42','$2y$10$f/t/g4sjlaOnf5R0g7hJY.PbBDQ.EP1BkFNjizM/xHNwuDrSAKsLy','female','patient','EqrXpn5gZBcGiDWhooOPCtweW8SWaQc2LVF5ZDgZ8kIIPrTqhweMYgfLE47s','2024-12-27 09:24:43','2024-12-27 10:11:11'),(14,'Adeline Larson IV','richard24@example.org','2024-12-27 09:24:42','$2y$10$mJZGsMqcmXxbzP6oEbO.ku8Z6znSuidqJ4I.KciE7qUzuBisFYbX6','female','patient','YvtP0zBpdM','2024-12-27 09:24:43','2024-12-27 09:24:43'),(15,'Monty Senger PhD','jamel50@example.com','2024-12-27 09:24:43','$2y$10$3znvqZgMX8wYAUjKUYV/9.GLupbd30djy7ejHQYGHQPmU614fWV.G','male','patient','ndzPQSDC6x','2024-12-27 09:24:43','2024-12-27 09:24:43'),(16,'Bridgette Koss','ayana71@example.org','2024-12-27 09:24:42','$2y$10$T9XZF/x14/BNE4RitKV74ujEw.YHoOBqeG/aCAByZ4O2AYVIDgo9q','female','patient','R6756YPSVz','2024-12-27 09:24:43','2024-12-27 09:24:43'),(17,'Ross Glover','jlittel@example.org','2024-12-27 09:24:43','$2y$10$insj5jD8ZOeXoYrBCSHy3O9SWL53GHOkcO3kfuspTeIKkqAjhpO/G','male','patient','ULI4AmoPBY','2024-12-27 09:24:43','2024-12-27 09:24:43'),(18,'Dr. Cullen Hoppe','christopher.leannon@example.com','2024-12-27 09:24:42','$2y$10$k3/Zb4GciHzbNzASS3eDPOnuTFaqANMWzDHu0eEOxH.Mx6JX80eiG','male','patient','rukbH2ZtwM','2024-12-27 09:24:43','2024-12-27 09:24:43'),(19,'Orie Windler','margaret.romaguera@example.net','2024-12-27 09:24:43','$2y$10$2CIm6IHCIw2nxqDlc9Q4CeEWx0JE9N0TEjwy70FjaplGSBlVqcZwq','female','patient','jx3fIacDzK','2024-12-27 09:24:43','2024-12-27 09:24:43'),(20,'Mrs. Emma Bechtelar I','donavon63@example.com','2024-12-27 09:24:42','$2y$10$z1Q7eu2rNt/TrIaEUJhL8upKU9hbEeACxvVWo.Wh1tfbxlr7pmIUK','female','patient','B39gmVltDN','2024-12-27 09:24:43','2024-12-27 09:24:43'),(21,'Mr. Kenyon Cartwright MD','hubert37@example.com','2024-12-27 09:24:43','$2y$10$iOf6eQronc41K9fYPdYto.LpuhsfRJ4PfxJFLHlvFKZ.TZnNzIMAu','female','patient','DeNTgxrCpf','2024-12-27 09:24:43','2024-12-27 09:24:43'),(22,'Kyleigh Tremblay','gkeebler@example.net','2024-12-27 09:24:42','$2y$10$y6EbwF/hjDGYlHRltmxAKuBO8o6bg9X6IR80U/XuYQDbYIONtAWj2','male','patient','JAbSYvA675','2024-12-27 09:24:43','2024-12-27 09:24:43'),(23,'Ms. Karina Durgan IV','stuart48@example.org','2024-12-27 09:24:43','$2y$10$xAMaa8UFh3suT72t4h6EueVq6YmXTBrm78UsHThKgc5n.RyFf0d8.','female','patient','VFG5Lmlkva','2024-12-27 09:24:43','2024-12-27 09:24:43'),(24,'Wilmer Wisozk DDS','crona.nasir@example.net','2024-12-27 09:24:42','$2y$10$XkajeL8KLBbUOCshnEKK6uqMMEEPQyj8PnvvKuRgPzsPEISGQFa92','male','patient','Mp1q4KhbVG','2024-12-27 09:24:43','2024-12-27 09:24:43'),(25,'Prof. Celine Wilkinson IV','keyshawn.torp@example.com','2024-12-27 09:24:43','$2y$10$zPJnZBVoYvyCNxnJTF4IbekP9K.4YMgSCmzPflR0PSXtzfF9DA3LW','male','patient','hlGGytSjEC','2024-12-27 09:24:43','2024-12-27 09:24:43'),(26,'Jayson Huels II','rterry@example.net','2024-12-27 09:24:42','$2y$10$f/PJTg4EyOBEXW.5ke8X/e.BiDiHuyCbG2j5tX2mUhfPzbbbpGrNu','female','patient','yuBgq0dFZ8','2024-12-27 09:24:43','2024-12-27 09:24:43'),(27,'Kiel Glover','otreutel@example.net','2024-12-27 09:24:43','$2y$10$VFl27Ahyh4qLR0cx0W5F9eJfnSq.2SfE4FKHBaXVeC6jR2RfHmINW','female','patient','U43B5CALUY','2024-12-27 09:24:43','2024-12-27 09:24:43'),(28,'Cleora Murphy','alanna59@example.com','2024-12-27 09:24:42','$2y$10$SJHZ9zu6jsUOEAGKhlnWQOgf3mu0LHF9M11XyqghHF826GjGmmq7.','male','patient','klQBu53dac','2024-12-27 09:24:43','2024-12-27 09:24:43'),(29,'Dillon Beer','natalie.kassulke@example.net','2024-12-27 09:24:43','$2y$10$.I8egrF4dn2zeZZUhhbuDu.0gonyAx39S2Sw.dyNmyL3DntdcawNW','female','patient','K1sWc8sHmd','2024-12-27 09:24:43','2024-12-27 09:24:43'),(30,'Ryan Deckow','hilpert.oleta@example.com','2024-12-27 09:24:42','$2y$10$UjSkD8XsNLQ6tvFUFp5Ea.blVRnpdHQxhbbijchk9f2.mH13Jh.Sm','female','patient','yPmZxJsFya','2024-12-27 09:24:43','2024-12-27 09:24:43'),(31,'Theresa Gislason','stone.jacobs@example.net','2024-12-27 09:24:43','$2y$10$FqvbnoGt7J1AuVVp354JWO2Jpj4Hqb0gaPV8QAzCklc4RXcIQp28m','female','patient','Kpbd58nwhw','2024-12-27 09:24:43','2024-12-27 09:24:43');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-12-27 14:13:55

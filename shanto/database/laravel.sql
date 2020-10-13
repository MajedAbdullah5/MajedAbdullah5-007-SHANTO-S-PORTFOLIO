-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2020 at 08:30 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` int(10) UNSIGNED NOT NULL,
  `address_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `address_status`, `Address`) VALUES
(1, 'Current address', 'Nanjing university of information science and technology, 219\nningliu road, pukou 210044.d\nJiangsu, Nanjing, China'),
(2, 'Permanent address', 'Ward no 5, Uttar alipur, Dagonbhuiyan, 3920\nFeni, Bangladesh');

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`id`, `name`, `password`, `username`, `email`) VALUES
(1, 'Majed', 'Majed123', 'MajedAbdullah', 'Majedabdullah635@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `career_objectives`
--

CREATE TABLE `career_objectives` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `objectives` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `career_objectives`
--

INSERT INTO `career_objectives` (`id`, `objectives`) VALUES
(1, 'Searching for a desirable opportunity with which I will have the scope to utilize my skills and potentiality to do something innovative for the benefit of mankind and the society as well and from which I will be able to enhance my knowledge and efficiency. For the last two years, I have been fascinated with the field of Software developer and I have been working as a Java instructor back at home in Bangladesh. Very fortunate to get a scholarship in China. The skill and experience I have gained in a variety of work settings, combined with character qualities of dependability, reliability, and an ethic of hard work make me a positive fit for this role. As a quick learner, I will adapt quickly to the requirements of the task. I am confident that I would contribute to the positive reputation that your company has already gained. Thanks.');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_des` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_fee` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_total_class` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_total_enroll` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_name`, `course_des`, `course_fee`, `course_total_class`, `course_total_enroll`, `course_image`, `course_link`) VALUES
(23, 'ABDULLA AL JABER', 'eswe', '1212', '1212', '212', 'http://127.0.0.1:8000/storage/0KBcbHU3jFUUlwSQDzxWD4KwHf9J4yHQFvtLoXOZ.png', 'ss'),
(24, 'sd', 'sd', 'sd', 'sd', 'sd', 'http://127.0.0.1:8000/storage/jEVrXxFs77f3e3XcygMiiWzeiBFXNVMp7ZvUc7aY.png', 'sd');

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `education_duration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `education_institute` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `education_certificate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `education_major` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `education_gpa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `education_board` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`id`, `education_duration`, `education_institute`, `education_certificate`, `education_major`, `education_gpa`, `education_board`) VALUES
(1, 'Since 2017/09- Running..', 'Nanjing University of Information Science and Technology Nanjing, China', NULL, 'B.sc in Software Engineering', 'Current CGPA: 3:00', NULL),
(2, 'Since 2014/07-2016/08', 'Government Iqbal Memorial College', 'Higher Secondary Certificate', 'Group of science', 'GPA 3.78 out of 5', 'Board of Comilla'),
(3, 'Since 2014/07-2016/08', 'Uttar Alipur School and College', 'Secondary School Certificate', 'Group of science', 'GPA 4.38 out of 5', 'Board of Comilla');

-- --------------------------------------------------------

--
-- Table structure for table `emergency_contact`
--

CREATE TABLE `emergency_contact` (
  `id` int(10) UNSIGNED NOT NULL,
  `contactStatus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contactInformation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `emergency_contact`
--

INSERT INTO `emergency_contact` (`id`, `contactStatus`, `contactInformation`) VALUES
(5, 'Name', 'Abdulla al jaber'),
(6, 'Phone', '01890312202'),
(7, 'Address', 'North Alipur, Ward no 5, Beker bazar, Dagonbhuiyan,Feni'),
(8, 'School', 'Nanjing university of information science and technology');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_skill`
--

CREATE TABLE `job_skill` (
  `id` int(10) UNSIGNED NOT NULL,
  `job` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `workplace` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_skill`
--

INSERT INTO `job_skill` (`id`, `job`, `workplace`, `position`) VALUES
(1, 'Former teacher', 'Uttar Alipur School and College', 'Instructor of Information communication and technology'),
(2, 'Former teacher 	', 'Dagonbhuiyan Institute of Science and Engineering ', 'Instructor of java programming language'),
(3, 'Former teacher', 'Uttar Alipur School and College', 'Instructor of Information communication and technology'),
(4, 'Former teacher 	', 'Dagonbhuiyan Institute of Science and Engineering ', 'Instructor of java programming language');

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE `language` (
  `id` int(10) UNSIGNED NOT NULL,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language_proficiency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`id`, `language`, `language_proficiency`) VALUES
(1, 'Bengali', 'Native'),
(2, 'English', 'Intermediate'),
(3, 'Chinese', 'Good'),
(4, 'Hindi', 'Good'),
(5, 'Urdu', 'Good');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `message_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message_message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `message_name`, `message_email`, `message_message`) VALUES
(1, 'Majed Abdullah', 'Majedabdullah635@gmail.com', 'Hei Jaber!'),
(5, 'Majed Abdullah', 'Majedabdullah635@gmail.com', 'Hei Jaber!'),
(6, 'Majed Abdullah', 'Majedabdullah635@gmail.com', 'Hei Jaber!'),
(7, 'Majed Abdullah', 'Majedabdullah635@gmail.com', 'Hei Jaber!'),
(8, 'Majed Abdullah', 'Majedabdullah635@gmail.com', 'Hei Jaber!'),
(9, 'Majed Abdullah', 'Majedabdullah635@gmail.com', 'Hei Jaber!'),
(10, 'Majed Abdullah', 'Majedabdullah635@gmail.com', 'Hei Jaber!'),
(11, 'Majed Abdullah', 'Majedabdullah635@gmail.com', 'Hei Jaber!'),
(12, 'Majed Abdullah', 'Majedabdullah635@gmail.com', 'Hei Jaber!'),
(14, 'Majed Abdullah', 'Majedabdullah635@gmail.com', 'Hei Jaber!'),
(15, 'Majed Abdullah', 'Majedabdullah635@gmail.com', 'Hei Jaber!'),
(16, 'Majed Abdullah', 'Majedabdullah635@gmail.com', 'Hei Jaber!');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(3, '2020_09_18_144322_visitors_migration', 1),
(4, '2020_09_19_082203_service_migration', 2),
(6, '2020_09_29_073050_project_migration', 4),
(9, '2014_10_12_000000_create_users_table', 5),
(10, '2019_08_19_000000_create_failed_jobs_table', 5),
(11, '2020_09_30_152405_service_migration', 5),
(12, '2020_10_01_040132_course_migration', 6),
(13, '2020_10_01_091414_project_migration', 7),
(14, '2020_10_01_131346_message_migration', 8),
(15, '2020_10_01_143116_visitors_migration', 9),
(16, '2020_10_02_050300_emergency__contact', 10),
(17, '2020_10_02_052604_career__objectives', 11),
(18, '2020_10_02_054209_career_objectives', 12),
(19, '2020_10_02_055631_career_objectives', 13),
(20, '2020_10_02_060228_education_migration', 14),
(21, '2020_10_02_062425_language_migration', 15),
(22, '2020_10_02_063709_skills_migration', 16),
(23, '2020_10_02_134611_job_skill_migration', 17),
(24, '2020_10_02_140546_personal_information', 18),
(25, '2020_10_02_145353_personal__infomation', 19),
(26, '2020_10_02_151259_address_migration', 20),
(27, '2020_10_04_161625_emergency_migration', 21),
(28, '2020_10_04_161456_emergency_migration', 22),
(29, '2020_10_05_142852_admin_table', 22),
(30, '2020_10_06_162449_photo_migration', 23),
(31, '2020_10_08_165600_portfolio_photo_migration', 24);

-- --------------------------------------------------------

--
-- Table structure for table `personal_infomation`
--

CREATE TABLE `personal_infomation` (
  `id` int(10) UNSIGNED NOT NULL,
  `information_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `information` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_infomation`
--

INSERT INTO `personal_infomation` (`id`, `information_status`, `information`) VALUES
(2, 'Father’s Name ', 'Fakrul islam'),
(3, 'Name                 ', ' Abdulla al jaber'),
(7, 'Mother’s Name ', 'Gol nahar '),
(8, 'Date of Birth', '03/04/1998'),
(10, 'Nationality', 'Bangladeshi'),
(13, 'Religion ', 'Islam'),
(14, 'Sex ', 'Male'),
(17, 'Marital Status', 'Single'),
(18, 'Height', '5’-9’’'),
(21, 'Phone No          ', '+8615651730150'),
(22, 'National ID       ', '19983012556000091'),
(23, 'Blood Group', 'O+');

-- --------------------------------------------------------

--
-- Table structure for table `photo_gallery`
--

CREATE TABLE `photo_gallery` (
  `id` int(10) UNSIGNED NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `photo_gallery`
--

INSERT INTO `photo_gallery` (`id`, `location`) VALUES
(11, 'http://127.0.0.1:8000/storage/SJI3ERfvysw1pmXpPoUmeYFICw0zDoJSL7C09v3r.png'),
(12, 'http://127.0.0.1:8000/storage/cePlhzNYcNH9kNvFYhei0ZvIqalJiM9lZG8lx6xm.png'),
(13, 'http://127.0.0.1:8000/storage/SJI3ERfvysw1pmXpPoUmeYFICw0zDoJSL7C09v3r.png'),
(14, 'http://127.0.0.1:8000/storage/cePlhzNYcNH9kNvFYhei0ZvIqalJiM9lZG8lx6xm.png'),
(15, 'http://127.0.0.1:8000/storage/SJI3ERfvysw1pmXpPoUmeYFICw0zDoJSL7C09v3r.png'),
(16, 'http://127.0.0.1:8000/storage/cePlhzNYcNH9kNvFYhei0ZvIqalJiM9lZG8lx6xm.png'),
(17, 'http://127.0.0.1:8000/storage/SJI3ERfvysw1pmXpPoUmeYFICw0zDoJSL7C09v3r.png'),
(18, 'http://127.0.0.1:8000/storage/cePlhzNYcNH9kNvFYhei0ZvIqalJiM9lZG8lx6xm.png'),
(19, 'http://127.0.0.1:8000/storage/SJI3ERfvysw1pmXpPoUmeYFICw0zDoJSL7C09v3r.png'),
(20, 'http://127.0.0.1:8000/storage/cePlhzNYcNH9kNvFYhei0ZvIqalJiM9lZG8lx6xm.png'),
(21, 'http://127.0.0.1:8000/storage/SJI3ERfvysw1pmXpPoUmeYFICw0zDoJSL7C09v3r.png'),
(22, 'http://127.0.0.1:8000/storage/cePlhzNYcNH9kNvFYhei0ZvIqalJiM9lZG8lx6xm.png'),
(23, 'http://127.0.0.1:8000/storage/SJI3ERfvysw1pmXpPoUmeYFICw0zDoJSL7C09v3r.png'),
(24, 'http://127.0.0.1:8000/storage/cePlhzNYcNH9kNvFYhei0ZvIqalJiM9lZG8lx6xm.png'),
(25, 'http://127.0.0.1:8000/storage/SJI3ERfvysw1pmXpPoUmeYFICw0zDoJSL7C09v3r.png'),
(26, 'http://127.0.0.1:8000/storage/cePlhzNYcNH9kNvFYhei0ZvIqalJiM9lZG8lx6xm.png'),
(27, 'http://127.0.0.1:8000/storage/SJI3ERfvysw1pmXpPoUmeYFICw0zDoJSL7C09v3r.png'),
(28, 'http://127.0.0.1:8000/storage/cePlhzNYcNH9kNvFYhei0ZvIqalJiM9lZG8lx6xm.png'),
(29, 'http://127.0.0.1:8000/storage/SJI3ERfvysw1pmXpPoUmeYFICw0zDoJSL7C09v3r.png'),
(30, 'http://127.0.0.1:8000/storage/cePlhzNYcNH9kNvFYhei0ZvIqalJiM9lZG8lx6xm.png'),
(31, 'http://127.0.0.1:8000/storage/SJI3ERfvysw1pmXpPoUmeYFICw0zDoJSL7C09v3r.png'),
(32, 'http://127.0.0.1:8000/storage/cePlhzNYcNH9kNvFYhei0ZvIqalJiM9lZG8lx6xm.png'),
(33, 'http://127.0.0.1:8000/storage/SJI3ERfvysw1pmXpPoUmeYFICw0zDoJSL7C09v3r.png'),
(34, 'http://127.0.0.1:8000/storage/cePlhzNYcNH9kNvFYhei0ZvIqalJiM9lZG8lx6xm.png'),
(35, 'http://127.0.0.1:8000/storage/SJI3ERfvysw1pmXpPoUmeYFICw0zDoJSL7C09v3r.png'),
(36, 'http://127.0.0.1:8000/storage/cePlhzNYcNH9kNvFYhei0ZvIqalJiM9lZG8lx6xm.png'),
(37, 'http://127.0.0.1:8000/storage/SJI3ERfvysw1pmXpPoUmeYFICw0zDoJSL7C09v3r.png'),
(38, 'http://127.0.0.1:8000/storage/cePlhzNYcNH9kNvFYhei0ZvIqalJiM9lZG8lx6xm.png'),
(39, 'http://127.0.0.1:8000/storage/SJI3ERfvysw1pmXpPoUmeYFICw0zDoJSL7C09v3r.png'),
(40, 'http://127.0.0.1:8000/storage/cePlhzNYcNH9kNvFYhei0ZvIqalJiM9lZG8lx6xm.png'),
(41, 'http://127.0.0.1:8000/storage/SJI3ERfvysw1pmXpPoUmeYFICw0zDoJSL7C09v3r.png'),
(42, 'http://127.0.0.1:8000/storage/cePlhzNYcNH9kNvFYhei0ZvIqalJiM9lZG8lx6xm.png'),
(43, 'http://127.0.0.1:8000/storage/HUPltQ9LYV0A5MgvHRRN0vr7acp02YgwzyPpZvjP.png'),
(44, 'http://127.0.0.1:8000/storage/Y6gYxsHhsOwfuGl19hAZrdaba5NojWIC2hUbNmHG.png'),
(45, 'http://127.0.0.1:8000/storage/PAlNR8RTRY6Ixnzi72ZrRKcNzfYuTgzh1zpoXWlC.png'),
(46, 'http://127.0.0.1:8000/storage/TTusjuvKN7hqD7Vmae00Qq4q8VN2kAYTXLXSRpza.png'),
(47, 'http://127.0.0.1:8000/storage/srfEpjNRPtk67xU7DwJRKi18ovCOgSNkv0TRTdtf.png');

-- --------------------------------------------------------

--
-- Table structure for table `portfolio_photo`
--

CREATE TABLE `portfolio_photo` (
  `id` int(10) UNSIGNED NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `portfolio_photo`
--

INSERT INTO `portfolio_photo` (`id`, `photo`) VALUES
(2, 'http://127.0.0.1:8000/storage/xnz48iITO7GQw4BQ6rDdTZIN6ZDHKG5c3mqUihhH.png');

-- --------------------------------------------------------

--
-- Table structure for table `programming_skills`
--

CREATE TABLE `programming_skills` (
  `id` int(10) UNSIGNED NOT NULL,
  `programming_language` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `programming_level` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `programming_skills`
--

INSERT INTO `programming_skills` (`id`, `programming_language`, `programming_level`) VALUES
(1, 'Java 			[core, intermediate, advanced(Spring Framework, Hibernate, JSP, Spring Boot, Spring Security,  ) ]', '70%'),
(2, 'Python', '30%'),
(5, 'Pure JavaScript', '60%'),
(6, 'JavaScript', '60%'),
(9, 'Php(Learning laravel)', '80%'),
(10, 'ReactJs', '30%'),
(13, 'css', '100%'),
(14, 'MySql', '100%'),
(17, 'JQuery', '40%'),
(20, 'Laravel', '50%');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_des` varchar(3000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `project_name`, `project_des`, `project_link`, `project_image`) VALUES
(38, 'Majed', 'Hello', 'Does it work?', 'http://127.0.0.1:8000/storage/qA5rs3970eUscb8gBsxgfagVcI9IPChuJxqgL0Tj.png'),
(39, 'Java', 'Hello', 'dsd', 'http://127.0.0.1:8000/storage/Asw11JAsxZmmm5THZ5nfl1txAGF6qKdPQUnhDDDC.png'),
(40, 'Majed', 'ww', 'wsw', 'http://127.0.0.1:8000/storage/HHLPyqb0DoT6SKXSsRRBPmVibEcjufvdclazZcCS.png'),
(41, 'Majed', 'Hei', 'as', 'http://127.0.0.1:8000/storage/fBOrLJrbWaAL7MLqT33ZkOToleGbIw8yxO6bpv75.png');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_des` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service_name`, `service_des`, `service_link`, `service_image`) VALUES
(32, 'ABDULLA AL JABER', 'sd', 'sd', 'http://127.0.0.1:8000/storage/Ga4rR0ITpXpGlja8Eh8SdHXmO5ZvfqQOG2ISpNAu.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ip_Address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visit_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`id`, `ip_Address`, `visit_time`) VALUES
(1, '127.0.0.1', '2020-10-01 08:31:58pm'),
(2, '127.0.0.1', '2020-10-01 08:41:54pm'),
(3, '127.0.0.1', '2020-10-01 08:42:21pm'),
(4, '127.0.0.1', '2020-10-01 08:43:19pm'),
(5, '127.0.0.1', '2020-10-01 08:43:27pm'),
(6, '127.0.0.1', '2020-10-01 08:44:32pm'),
(7, '127.0.0.1', '2020-10-01 08:46:00pm'),
(8, '127.0.0.1', '2020-10-01 08:46:33pm'),
(9, '127.0.0.1', '2020-10-01 08:47:11pm'),
(10, '127.0.0.1', '2020-10-01 08:47:27pm'),
(11, '127.0.0.1', '2020-10-01 08:47:43pm'),
(12, '127.0.0.1', '2020-10-01 08:48:01pm'),
(13, '127.0.0.1', '2020-10-01 08:48:14pm'),
(14, '127.0.0.1', '2020-10-01 08:48:39pm'),
(15, '127.0.0.1', '2020-10-01 08:49:37pm'),
(16, '127.0.0.1', '2020-10-01 08:49:46pm'),
(17, '127.0.0.1', '2020-10-01 08:50:23pm'),
(18, '127.0.0.1', '2020-10-01 08:50:43pm'),
(19, '127.0.0.1', '2020-10-01 08:51:00pm'),
(20, '127.0.0.1', '2020-10-01 08:51:10pm'),
(21, '127.0.0.1', '2020-10-01 09:07:28pm'),
(22, '127.0.0.1', '2020-10-01 09:13:25pm'),
(23, '127.0.0.1', '2020-10-01 09:13:33pm'),
(24, '127.0.0.1', '2020-10-01 09:13:50pm'),
(25, '127.0.0.1', '2020-10-01 09:14:09pm'),
(26, '127.0.0.1', '2020-10-01 09:14:23pm'),
(27, '127.0.0.1', '2020-10-01 09:14:45pm'),
(28, '127.0.0.1', '2020-10-01 09:16:38pm'),
(29, '127.0.0.1', '2020-10-01 09:17:09pm'),
(30, '127.0.0.1', '2020-10-01 09:18:33pm'),
(31, '127.0.0.1', '2020-10-01 09:19:09pm'),
(32, '127.0.0.1', '2020-10-01 09:19:44pm'),
(33, '127.0.0.1', '2020-10-01 09:20:16pm'),
(34, '127.0.0.1', '2020-10-01 09:21:10pm'),
(35, '127.0.0.1', '2020-10-01 09:21:39pm'),
(36, '127.0.0.1', '2020-10-01 09:21:55pm'),
(37, '127.0.0.1', '2020-10-01 09:23:19pm'),
(38, '127.0.0.1', '2020-10-01 09:23:39pm'),
(39, '127.0.0.1', '2020-10-01 09:24:09pm'),
(40, '127.0.0.1', '2020-10-01 09:24:43pm'),
(41, '127.0.0.1', '2020-10-01 09:25:24pm'),
(42, '127.0.0.1', '2020-10-01 09:26:21pm'),
(43, '127.0.0.1', '2020-10-01 09:29:55pm'),
(44, '127.0.0.1', '2020-10-01 09:30:14pm'),
(45, '127.0.0.1', '2020-10-01 09:30:47pm'),
(46, '127.0.0.1', '2020-10-01 09:31:16pm'),
(47, '127.0.0.1', '2020-10-01 09:31:29pm'),
(48, '127.0.0.1', '2020-10-01 09:31:49pm'),
(49, '127.0.0.1', '2020-10-01 09:31:59pm'),
(50, '127.0.0.1', '2020-10-01 09:32:24pm'),
(51, '127.0.0.1', '2020-10-01 09:33:10pm'),
(52, '127.0.0.1', '2020-10-01 09:33:22pm'),
(53, '127.0.0.1', '2020-10-01 09:33:38pm'),
(54, '127.0.0.1', '2020-10-01 09:35:54pm'),
(55, '127.0.0.1', '2020-10-01 09:36:53pm'),
(56, '127.0.0.1', '2020-10-01 09:37:08pm'),
(57, '127.0.0.1', '2020-10-01 09:37:44pm'),
(58, '127.0.0.1', '2020-10-01 09:38:31pm'),
(59, '127.0.0.1', '2020-10-01 09:41:19pm'),
(60, '127.0.0.1', '2020-10-01 09:41:43pm'),
(61, '127.0.0.1', '2020-10-01 09:42:18pm'),
(62, '127.0.0.1', '2020-10-01 09:43:50pm'),
(63, '127.0.0.1', '2020-10-01 09:45:56pm'),
(64, '127.0.0.1', '2020-10-01 09:46:08pm'),
(65, '127.0.0.1', '2020-10-01 09:49:16pm'),
(66, '127.0.0.1', '2020-10-01 09:50:10pm'),
(67, '127.0.0.1', '2020-10-01 09:50:30pm'),
(68, '127.0.0.1', '2020-10-01 09:50:41pm'),
(69, '127.0.0.1', '2020-10-01 09:55:42pm'),
(70, '127.0.0.1', '2020-10-01 09:56:07pm'),
(71, '127.0.0.1', '2020-10-01 09:56:44pm'),
(72, '127.0.0.1', '2020-10-01 09:57:06pm'),
(73, '127.0.0.1', '2020-10-01 09:57:13pm'),
(74, '127.0.0.1', '2020-10-01 09:57:20pm'),
(75, '127.0.0.1', '2020-10-01 09:58:46pm'),
(76, '127.0.0.1', '2020-10-01 09:59:29pm'),
(77, '127.0.0.1', '2020-10-01 10:00:38pm'),
(78, '127.0.0.1', '2020-10-01 10:01:29pm'),
(79, '127.0.0.1', '2020-10-01 10:02:25pm'),
(80, '127.0.0.1', '2020-10-01 10:03:16pm'),
(81, '127.0.0.1', '2020-10-01 10:04:15pm'),
(82, '127.0.0.1', '2020-10-01 10:05:16pm'),
(83, '127.0.0.1', '2020-10-01 10:05:45pm'),
(84, '127.0.0.1', '2020-10-01 10:06:11pm'),
(85, '127.0.0.1', '2020-10-01 10:07:05pm'),
(86, '127.0.0.1', '2020-10-01 10:07:41pm'),
(87, '127.0.0.1', '2020-10-01 10:10:19pm'),
(88, '127.0.0.1', '2020-10-01 10:10:43pm'),
(89, '127.0.0.1', '2020-10-01 10:10:58pm'),
(90, '127.0.0.1', '2020-10-01 10:11:49pm'),
(91, '127.0.0.1', '2020-10-01 10:12:24pm'),
(92, '127.0.0.1', '2020-10-01 10:12:53pm'),
(93, '127.0.0.1', '2020-10-01 10:13:18pm'),
(94, '127.0.0.1', '2020-10-01 10:14:04pm'),
(95, '127.0.0.1', '2020-10-01 10:14:13pm'),
(96, '127.0.0.1', '2020-10-01 10:14:49pm'),
(97, '127.0.0.1', '2020-10-01 10:15:57pm'),
(98, '127.0.0.1', '2020-10-01 10:16:06pm'),
(99, '127.0.0.1', '2020-10-01 10:19:04pm'),
(100, '127.0.0.1', '2020-10-01 10:23:48pm'),
(101, '127.0.0.1', '2020-10-01 10:24:34pm'),
(102, '127.0.0.1', '2020-10-01 10:26:02pm'),
(103, '127.0.0.1', '2020-10-01 10:27:22pm'),
(104, '127.0.0.1', '2020-10-01 10:27:35pm'),
(105, '127.0.0.1', '2020-10-01 10:27:54pm'),
(106, '127.0.0.1', '2020-10-01 10:28:26pm'),
(107, '127.0.0.1', '2020-10-01 10:28:35pm'),
(108, '127.0.0.1', '2020-10-01 10:28:45pm'),
(109, '127.0.0.1', '2020-10-01 10:29:57pm'),
(110, '127.0.0.1', '2020-10-01 10:30:38pm'),
(111, '127.0.0.1', '2020-10-01 10:31:02pm'),
(112, '127.0.0.1', '2020-10-01 10:32:12pm'),
(113, '127.0.0.1', '2020-10-01 10:32:26pm'),
(114, '127.0.0.1', '2020-10-01 10:33:06pm'),
(115, '127.0.0.1', '2020-10-01 10:33:14pm'),
(116, '127.0.0.1', '2020-10-01 10:34:14pm'),
(117, '127.0.0.1', '2020-10-01 10:34:31pm'),
(118, '127.0.0.1', '2020-10-01 10:34:47pm'),
(119, '127.0.0.1', '2020-10-01 10:35:19pm'),
(120, '127.0.0.1', '2020-10-01 10:35:29pm'),
(121, '127.0.0.1', '2020-10-01 10:36:20pm'),
(122, '127.0.0.1', '2020-10-01 10:36:46pm'),
(123, '127.0.0.1', '2020-10-01 10:37:43pm'),
(124, '127.0.0.1', '2020-10-01 10:37:53pm'),
(125, '127.0.0.1', '2020-10-01 10:40:16pm'),
(126, '127.0.0.1', '2020-10-01 10:41:21pm'),
(127, '127.0.0.1', '2020-10-01 10:42:00pm'),
(128, '127.0.0.1', '2020-10-01 10:44:54pm'),
(129, '127.0.0.1', '2020-10-01 10:45:07pm'),
(130, '127.0.0.1', '2020-10-01 10:45:53pm'),
(131, '127.0.0.1', '2020-10-01 10:46:16pm'),
(132, '127.0.0.1', '2020-10-01 10:46:51pm'),
(133, '127.0.0.1', '2020-10-01 10:47:17pm'),
(134, '127.0.0.1', '2020-10-01 10:47:47pm'),
(135, '127.0.0.1', '2020-10-01 10:48:25pm'),
(136, '127.0.0.1', '2020-10-01 10:49:18pm'),
(137, '127.0.0.1', '2020-10-01 10:49:52pm'),
(138, '127.0.0.1', '2020-10-01 10:50:08pm'),
(139, '127.0.0.1', '2020-10-01 10:51:03pm'),
(140, '127.0.0.1', '2020-10-01 10:52:04pm'),
(141, '127.0.0.1', '2020-10-01 10:53:18pm'),
(142, '127.0.0.1', '2020-10-01 10:53:25pm'),
(143, '127.0.0.1', '2020-10-01 10:55:56pm'),
(144, '127.0.0.1', '2020-10-01 10:57:10pm'),
(145, '127.0.0.1', '2020-10-01 10:57:36pm'),
(146, '127.0.0.1', '2020-10-01 10:57:47pm'),
(147, '127.0.0.1', '2020-10-01 10:58:08pm'),
(148, '127.0.0.1', '2020-10-01 10:58:25pm'),
(149, '127.0.0.1', '2020-10-01 10:59:03pm'),
(150, '127.0.0.1', '2020-10-01 10:59:11pm'),
(151, '127.0.0.1', '2020-10-01 10:59:28pm'),
(152, '127.0.0.1', '2020-10-01 10:59:43pm'),
(153, '127.0.0.1', '2020-10-01 10:59:49pm'),
(154, '127.0.0.1', '2020-10-01 11:00:23pm'),
(155, '127.0.0.1', '2020-10-01 11:00:56pm'),
(156, '127.0.0.1', '2020-10-01 11:03:30pm'),
(157, '127.0.0.1', '2020-10-01 11:04:36pm'),
(158, '127.0.0.1', '2020-10-01 11:04:59pm'),
(159, '127.0.0.1', '2020-10-01 11:08:10pm'),
(160, '127.0.0.1', '2020-10-01 11:09:16pm'),
(161, '127.0.0.1', '2020-10-01 11:09:58pm'),
(162, '127.0.0.1', '2020-10-01 11:13:19pm'),
(163, '127.0.0.1', '2020-10-02 09:25:26am'),
(164, '127.0.0.1', '2020-10-02 09:27:56am'),
(165, '127.0.0.1', '2020-10-02 09:29:23am'),
(166, '127.0.0.1', '2020-10-02 09:30:26am'),
(167, '127.0.0.1', '2020-10-02 09:35:23am'),
(168, '127.0.0.1', '2020-10-02 07:42:55pm'),
(169, '127.0.0.1', '2020-10-02 10:23:11pm'),
(170, '127.0.0.1', '2020-10-03 10:06:28am'),
(171, '127.0.0.1', '2020-10-03 08:49:08pm'),
(172, '127.0.0.1', '2020-10-04 11:40:53am'),
(173, '127.0.0.1', '2020-10-04 11:42:37am'),
(174, '127.0.0.1', '2020-10-05 01:00:45am'),
(175, '127.0.0.1', '2020-10-05 01:24:12am'),
(176, '127.0.0.1', '2020-10-05 01:39:48am'),
(177, '127.0.0.1', '2020-10-05 01:55:11am'),
(178, '127.0.0.1', '2020-10-07 12:04:28pm'),
(179, '127.0.0.1', '2020-10-07 12:07:48pm'),
(180, '127.0.0.1', '2020-10-07 12:10:11pm'),
(181, '127.0.0.1', '2020-10-07 12:10:43pm'),
(182, '127.0.0.1', '2020-10-07 12:13:09pm'),
(183, '127.0.0.1', '2020-10-07 12:13:24pm'),
(184, '127.0.0.1', '2020-10-07 12:13:30pm'),
(185, '127.0.0.1', '2020-10-07 12:14:10pm'),
(186, '127.0.0.1', '2020-10-07 12:24:40pm'),
(187, '127.0.0.1', '2020-10-07 12:28:55pm'),
(188, '127.0.0.1', '2020-10-07 12:30:45pm'),
(189, '127.0.0.1', '2020-10-07 12:31:06pm'),
(190, '127.0.0.1', '2020-10-07 12:31:21pm'),
(191, '127.0.0.1', '2020-10-07 12:33:39pm'),
(192, '127.0.0.1', '2020-10-07 12:33:56pm'),
(193, '127.0.0.1', '2020-10-07 12:40:08pm'),
(194, '127.0.0.1', '2020-10-07 12:42:49pm'),
(195, '127.0.0.1', '2020-10-07 12:43:40pm'),
(196, '127.0.0.1', '2020-10-07 12:44:34pm'),
(197, '127.0.0.1', '2020-10-07 12:47:59pm'),
(198, '127.0.0.1', '2020-10-07 12:54:35pm'),
(199, '127.0.0.1', '2020-10-07 12:55:12pm'),
(200, '127.0.0.1', '2020-10-07 12:55:28pm'),
(201, '127.0.0.1', '2020-10-07 12:55:52pm'),
(202, '127.0.0.1', '2020-10-07 12:56:23pm'),
(203, '127.0.0.1', '2020-10-07 12:56:32pm'),
(204, '127.0.0.1', '2020-10-07 12:56:47pm'),
(205, '127.0.0.1', '2020-10-07 12:57:05pm'),
(206, '127.0.0.1', '2020-10-07 01:00:06pm'),
(207, '127.0.0.1', '2020-10-07 01:00:24pm'),
(208, '127.0.0.1', '2020-10-07 01:09:40pm'),
(209, '127.0.0.1', '2020-10-07 01:13:18pm'),
(210, '127.0.0.1', '2020-10-07 01:14:54pm'),
(211, '127.0.0.1', '2020-10-07 04:13:35pm'),
(212, '127.0.0.1', '2020-10-07 04:14:06pm'),
(213, '127.0.0.1', '2020-10-07 04:14:50pm'),
(214, '127.0.0.1', '2020-10-07 04:20:55pm'),
(215, '127.0.0.1', '2020-10-07 04:26:05pm'),
(216, '127.0.0.1', '2020-10-07 04:27:20pm'),
(217, '127.0.0.1', '2020-10-07 04:29:25pm'),
(218, '127.0.0.1', '2020-10-07 04:30:04pm'),
(219, '127.0.0.1', '2020-10-07 04:31:57pm'),
(220, '127.0.0.1', '2020-10-07 04:37:23pm'),
(221, '127.0.0.1', '2020-10-07 04:40:58pm'),
(222, '127.0.0.1', '2020-10-07 04:42:18pm'),
(223, '127.0.0.1', '2020-10-07 04:43:37pm'),
(224, '127.0.0.1', '2020-10-07 04:45:36pm'),
(225, '127.0.0.1', '2020-10-07 04:48:51pm'),
(226, '127.0.0.1', '2020-10-07 04:49:44pm'),
(227, '127.0.0.1', '2020-10-07 04:50:36pm'),
(228, '127.0.0.1', '2020-10-07 04:50:52pm'),
(229, '127.0.0.1', '2020-10-07 04:52:12pm'),
(230, '127.0.0.1', '2020-10-07 04:53:52pm'),
(231, '127.0.0.1', '2020-10-07 04:54:11pm'),
(232, '127.0.0.1', '2020-10-07 04:56:23pm'),
(233, '127.0.0.1', '2020-10-07 04:59:00pm'),
(234, '127.0.0.1', '2020-10-07 04:59:44pm'),
(235, '127.0.0.1', '2020-10-07 05:19:53pm'),
(236, '127.0.0.1', '2020-10-07 05:20:36pm'),
(237, '127.0.0.1', '2020-10-07 09:07:37pm'),
(238, '127.0.0.1', '2020-10-07 09:09:25pm'),
(239, '127.0.0.1', '2020-10-07 11:04:54pm'),
(240, '127.0.0.1', '2020-10-07 11:40:07pm'),
(241, '127.0.0.1', '2020-10-07 11:42:50pm'),
(242, '127.0.0.1', '2020-10-07 11:46:40pm'),
(243, '127.0.0.1', '2020-10-07 11:50:17pm'),
(244, '127.0.0.1', '2020-10-07 11:52:00pm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `career_objectives`
--
ALTER TABLE `career_objectives`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emergency_contact`
--
ALTER TABLE `emergency_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_skill`
--
ALTER TABLE `job_skill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_infomation`
--
ALTER TABLE `personal_infomation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `photo_gallery`
--
ALTER TABLE `photo_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolio_photo`
--
ALTER TABLE `portfolio_photo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `programming_skills`
--
ALTER TABLE `programming_skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `career_objectives`
--
ALTER TABLE `career_objectives`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `emergency_contact`
--
ALTER TABLE `emergency_contact`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_skill`
--
ALTER TABLE `job_skill`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `personal_infomation`
--
ALTER TABLE `personal_infomation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `photo_gallery`
--
ALTER TABLE `photo_gallery`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `portfolio_photo`
--
ALTER TABLE `portfolio_photo`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `programming_skills`
--
ALTER TABLE `programming_skills`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=245;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

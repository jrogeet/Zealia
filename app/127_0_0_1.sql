-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2024 at 08:08 AM
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
-- Database: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Table structure for table `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) NOT NULL DEFAULT '',
  `user` varchar(255) NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `query` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Table structure for table `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) NOT NULL,
  `col_name` varchar(64) NOT NULL,
  `col_type` varchar(64) NOT NULL,
  `col_length` text DEFAULT NULL,
  `col_collation` varchar(64) NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) DEFAULT '',
  `col_default` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Table structure for table `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `column_name` varchar(64) NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `transformation` varchar(255) NOT NULL DEFAULT '',
  `transformation_options` varchar(255) NOT NULL DEFAULT '',
  `input_transformation` varchar(255) NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) NOT NULL,
  `settings_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Table structure for table `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL,
  `export_type` varchar(10) NOT NULL,
  `template_name` varchar(64) NOT NULL,
  `template_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

--
-- Dumping data for table `pma__export_templates`
--

INSERT INTO `pma__export_templates` (`id`, `username`, `export_type`, `template_name`, `template_data`) VALUES
(1, 'root', 'database', 'zealia', '{\"quick_or_custom\":\"quick\",\"what\":\"sql\",\"structure_or_data_forced\":\"0\",\"table_select[]\":[\"accounts\",\"group_edit_history\",\"join_room_requests\",\"log_trails\",\"notifications\",\"rooms\",\"room_groups\",\"room_list\",\"ticket\"],\"table_structure[]\":[\"accounts\",\"group_edit_history\",\"join_room_requests\",\"log_trails\",\"notifications\",\"rooms\",\"room_groups\",\"room_list\",\"ticket\"],\"table_data[]\":[\"accounts\",\"group_edit_history\",\"join_room_requests\",\"log_trails\",\"notifications\",\"rooms\",\"room_groups\",\"room_list\",\"ticket\"],\"aliases_new\":\"\",\"output_format\":\"sendit\",\"filename_template\":\"@DATABASE@\",\"remember_template\":\"on\",\"charset\":\"utf-8\",\"compression\":\"none\",\"maxsize\":\"\",\"codegen_structure_or_data\":\"data\",\"codegen_format\":\"0\",\"csv_separator\":\",\",\"csv_enclosed\":\"\\\"\",\"csv_escaped\":\"\\\"\",\"csv_terminated\":\"AUTO\",\"csv_null\":\"NULL\",\"csv_columns\":\"something\",\"csv_structure_or_data\":\"data\",\"excel_null\":\"NULL\",\"excel_columns\":\"something\",\"excel_edition\":\"win\",\"excel_structure_or_data\":\"data\",\"json_structure_or_data\":\"data\",\"json_unicode\":\"something\",\"latex_caption\":\"something\",\"latex_structure_or_data\":\"structure_and_data\",\"latex_structure_caption\":\"Structure of table @TABLE@\",\"latex_structure_continued_caption\":\"Structure of table @TABLE@ (continued)\",\"latex_structure_label\":\"tab:@TABLE@-structure\",\"latex_relation\":\"something\",\"latex_comments\":\"something\",\"latex_mime\":\"something\",\"latex_columns\":\"something\",\"latex_data_caption\":\"Content of table @TABLE@\",\"latex_data_continued_caption\":\"Content of table @TABLE@ (continued)\",\"latex_data_label\":\"tab:@TABLE@-data\",\"latex_null\":\"\\\\textit{NULL}\",\"mediawiki_structure_or_data\":\"structure_and_data\",\"mediawiki_caption\":\"something\",\"mediawiki_headers\":\"something\",\"htmlword_structure_or_data\":\"structure_and_data\",\"htmlword_null\":\"NULL\",\"ods_null\":\"NULL\",\"ods_structure_or_data\":\"data\",\"odt_structure_or_data\":\"structure_and_data\",\"odt_relation\":\"something\",\"odt_comments\":\"something\",\"odt_mime\":\"something\",\"odt_columns\":\"something\",\"odt_null\":\"NULL\",\"pdf_report_title\":\"\",\"pdf_structure_or_data\":\"structure_and_data\",\"phparray_structure_or_data\":\"data\",\"sql_include_comments\":\"something\",\"sql_header_comment\":\"\",\"sql_use_transaction\":\"something\",\"sql_compatibility\":\"NONE\",\"sql_structure_or_data\":\"structure_and_data\",\"sql_create_table\":\"something\",\"sql_auto_increment\":\"something\",\"sql_create_view\":\"something\",\"sql_procedure_function\":\"something\",\"sql_create_trigger\":\"something\",\"sql_backquotes\":\"something\",\"sql_type\":\"INSERT\",\"sql_insert_syntax\":\"both\",\"sql_max_query_size\":\"50000\",\"sql_hex_for_binary\":\"something\",\"sql_utc_time\":\"something\",\"texytext_structure_or_data\":\"structure_and_data\",\"texytext_null\":\"NULL\",\"xml_structure_or_data\":\"data\",\"xml_export_events\":\"something\",\"xml_export_functions\":\"something\",\"xml_export_procedures\":\"something\",\"xml_export_tables\":\"something\",\"xml_export_triggers\":\"something\",\"xml_export_views\":\"something\",\"xml_export_contents\":\"something\",\"yaml_structure_or_data\":\"data\",\"\":null,\"lock_tables\":null,\"as_separate_files\":null,\"csv_removeCRLF\":null,\"excel_removeCRLF\":null,\"json_pretty_print\":null,\"htmlword_columns\":null,\"ods_columns\":null,\"sql_dates\":null,\"sql_relation\":null,\"sql_mime\":null,\"sql_disable_fk\":null,\"sql_views_as_tables\":null,\"sql_metadata\":null,\"sql_create_database\":null,\"sql_drop_table\":null,\"sql_if_not_exists\":null,\"sql_simple_view_export\":null,\"sql_view_current_user\":null,\"sql_or_replace_view\":null,\"sql_truncate\":null,\"sql_delayed\":null,\"sql_ignore\":null,\"texytext_columns\":null}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db` varchar(64) NOT NULL DEFAULT '',
  `table` varchar(64) NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) NOT NULL,
  `item_name` varchar(64) NOT NULL,
  `item_type` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Table structure for table `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Dumping data for table `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"zealia\",\"table\":\"room_groups\"},{\"db\":\"zealia\",\"table\":\"rooms\"},{\"db\":\"zealia\",\"table\":\"accounts\"},{\"db\":\"zealia\",\"table\":\"notifications\"},{\"db\":\"zealia\",\"table\":\"group_edit_history\"},{\"db\":\"zealia\",\"table\":\"join_room_requests\"},{\"db\":\"zealia\",\"table\":\"log_trails\"},{\"db\":\"zealia\",\"table\":\"room_list\"},{\"db\":\"zealia\",\"table\":\"ticket\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) NOT NULL DEFAULT '',
  `master_table` varchar(64) NOT NULL DEFAULT '',
  `master_field` varchar(64) NOT NULL DEFAULT '',
  `foreign_db` varchar(64) NOT NULL DEFAULT '',
  `foreign_table` varchar(64) NOT NULL DEFAULT '',
  `foreign_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Table structure for table `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `search_name` varchar(64) NOT NULL DEFAULT '',
  `search_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `display_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

--
-- Dumping data for table `pma__table_info`
--

INSERT INTO `pma__table_info` (`db_name`, `table_name`, `display_field`) VALUES
('zealia', 'group_edit_history', 'school_id');

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `prefs` text NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

--
-- Dumping data for table `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'zealia', 'accounts', '{\"CREATE_TIME\":\"2024-09-16 19:03:42\"}', '2024-09-22 23:48:27'),
('root', 'zealia', 'room_groups', '{\"CREATE_TIME\":\"2024-09-16 19:03:42\",\"col_order\":[0,1],\"col_visib\":[1,1]}', '2024-09-19 01:14:30');

-- --------------------------------------------------------

--
-- Table structure for table `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text NOT NULL,
  `schema_sql` text DEFAULT NULL,
  `data_sql` longtext DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Dumping data for table `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2024-09-25 12:58:45', '{\"Console\\/Mode\":\"collapse\"}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) NOT NULL,
  `tab` varchar(64) NOT NULL,
  `allowed` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Table structure for table `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) NOT NULL,
  `usergroup` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indexes for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indexes for table `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indexes for table `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indexes for table `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indexes for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indexes for table `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indexes for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indexes for table `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indexes for table `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indexes for table `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indexes for table `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indexes for table `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indexes for table `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `test`;

-- --------------------------------------------------------

--
-- Table structure for table `userlist`
--

CREATE TABLE `userlist` (
  `count_ID` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `student_num` varchar(255) NOT NULL,
  `section` enum('BSCS 3-Y2-1','') NOT NULL,
  `result` text DEFAULT NULL,
  `R` int(11) DEFAULT NULL,
  `I` int(11) DEFAULT NULL,
  `A` int(11) DEFAULT NULL,
  `S` int(11) DEFAULT NULL,
  `E` int(11) DEFAULT NULL,
  `C` int(11) DEFAULT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userlist`
--

INSERT INTO `userlist` (`count_ID`, `firstname`, `lastname`, `student_num`, `section`, `result`, `R`, `I`, `A`, `S`, `E`, `C`, `pass`) VALUES
(36, 'Playboi', 'Cartimar', '01210011112', 'BSCS 3-Y2-1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$2J9jjmxmJjV9B.Sn7VDFiOCgNC83sdAXT/QxyWDdBbMKEyxTcx44.'),
(35, 'Jun', 'Seba', '01210011113', 'BSCS 3-Y2-1', 'ECI', 0, 0, 0, 0, 1, 0, '$2y$10$D9wQKrtyVGnjQJV5inwWxeIJDiZYEVVcbFg6oea5C8NNq9uCLFX2S'),
(32, 'John Rogee', 'Turqueza', '01210011114', 'BSCS 3-Y2-1', 'CRS', 1, 0, 1, 1, 1, 2, '$2y$10$qo.zozT5zAH99QB4pF4PZOv1793dZ.zSpGHLrDkyoIcS8nPhcXDFm'),
(28, 'maenard', 'llamas', '01220005358', 'BSCS 3-Y2-1', 'ICS', 3, 7, 1, 5, 3, 5, '$2y$10$xEdF7gjuQyYgpo7fNcjgdOBlIDcCwfPfnkQFbUuUeSfjWMezayjTO'),
(33, 'J', 'G', '01220005932', 'BSCS 3-Y2-1', 'SER', 3, 1, 2, 4, 3, 2, '$2y$10$yKECvulk4t5VtcN1HZU4PuBAqdl7E4VyyPpy5e7w/x5kWv7ZFWfj6'),
(24, 'juan', 'dela cruz', '1', 'BSCS 3-Y2-1', 'AEI', 1, 7, 7, 2, 7, 3, '$2y$10$e2s3yptEFvN.Y7iNfRYecuIwc/nuzhHoW3bUz5gyHWu7mz2BfuGL6'),
(23, 'Renzo', 'Gregorio', '19-4417-625', 'BSCS 3-Y2-1', 'IRE', 7, 7, 2, 4, 7, 3, '$2y$10$GhI2Im95bOq6PReU193OZ.KzX6mdk8zlhA0no9LzFvdhoYEx5XK5K'),
(25, 'dos', 'dela cruz', '2', 'BSCS 3-Y2-1', 'ICE', 2, 7, 3, 1, 5, 7, '$2y$10$5hCRvXkfkQMTWK9KbXnEU.95PU8gcmhi6AsQT3J98OPjfk40N1//C'),
(26, 'thirdy', 'dela cruz', '3', 'BSCS 3-Y2-1', 'ICE', 1, 7, 2, 3, 7, 5, '$2y$10$rpFz7usnhiGrBJ1tyVhJzuO3OnoE3q4KFa7qdyKnaKNkoSeHcAufe'),
(29, 'ford', 'dela cruz', '4', 'BSCS 3-Y2-1', 'RIC', 5, 5, 2, 2, 2, 5, '$2y$10$D5bxZuH8EKeqhpP5S.OrWOeMYcSZRIangC3D.DLByIKJXLc0OkyQi'),
(30, 'singko', 'dela cruz', '5', 'BSCS 3-Y2-1', 'AEI', 2, 6, 5, 2, 5, 2, '$2y$10$ykLQlf/jbOytktxeenldp.J4AZVYnOlVQhsCwkHLWUg4N2dMKN2wC'),
(31, 'six', 'dela cruz', '6', 'BSCS 3-Y2-1', 'ICE', 1, 7, 6, 1, 7, 7, '$2y$10$KvUs.cw7bP3VAIZsz3/Ie.YbZz/9GRFkJzSDbOhhySPBfzkTh6aqa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `userlist`
--
ALTER TABLE `userlist`
  ADD PRIMARY KEY (`student_num`),
  ADD UNIQUE KEY `count_ID` (`count_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `userlist`
--
ALTER TABLE `userlist`
  MODIFY `count_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- Database: `zealia`
--
CREATE DATABASE IF NOT EXISTS `zealia` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `zealia`;

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `school_id` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `l_name` varchar(255) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `account_type` enum('student','professor','admin') NOT NULL DEFAULT 'student',
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `reset_token_hash` varchar(64) DEFAULT NULL,
  `reset_token_expires_at` datetime DEFAULT NULL,
  `account_activation_hash` varchar(64) DEFAULT NULL,
  `R` varchar(50) DEFAULT NULL,
  `I` varchar(50) DEFAULT NULL,
  `A` varchar(50) DEFAULT NULL,
  `S` varchar(50) DEFAULT NULL,
  `E` varchar(50) DEFAULT NULL,
  `C` varchar(50) DEFAULT NULL,
  `result` varchar(3) DEFAULT NULL,
  `kanban` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`kanban`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='All accounts (Students, Admin, Prof)';

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`school_id`, `email`, `password`, `l_name`, `f_name`, `account_type`, `reg_date`, `reset_token_hash`, `reset_token_expires_at`, `account_activation_hash`, `R`, `I`, `A`, `S`, `E`, `C`, `result`, `kanban`) VALUES
('00000', 'adminturquoise@fatima.edu.ph', '$2y$10$5VylqOadeQrcANwfiyd39OuimAMDl58iGeZuwCmk.bTSJM7Jy8jHW', 'Turquoise', 'Admin', 'admin', '2024-10-07 03:31:01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('01210011112', 'jmturqueza1114val@student.fatima.edu.ph', '$2y$10$XraX5nTQULgdFKs0Dn55Pedx8yvDJM2dkLBhK/IU/ielf./iwObva', 'Nuggets', 'Nettspend', 'student', '2024-10-11 05:52:33', NULL, NULL, NULL, '3', '1', '3', '0', '1', '0', 'REI', '{\"1\": {\"todo\": [[\"data1\", \"info1\", \"date1\"], [\"todo2\", \"info2\", \"date2\"]],\"wip\": [[\"working1\", \"info1\", \"date1\"], [\"working2\", \"info2\", \"date2\"]],\"done\": [[\"done1\", \"info1\", \"date1\"], [\"done2\", \"info2\", \"date2\"]]},\"2\": {\"todo\": [[\"data1\", \"info1\", \"date1\"], [\"todo2\", \"info2\", \"date2\"]],\"wip\": [[\"working1\", \"info1\", \"date1\"], [\"working2\", \"info2\", \"date2\"]],\"done\": [[\"done1\", \"info1\", \"date1\"], [\"done2\", \"info2\", \"date2\"]]}}'),
('01210011113', 'jmturqueza1113val@student.fatima.edu.ph', '$2y$10$Lx95qWIJEsWahYXQa2i8peJq4hUP/EJnaS083KgXR0J8N6cDLY386', 'Turquoise', 'Regine', 'student', '2024-10-07 03:48:04', NULL, NULL, NULL, '2', '2', '0', '1', '1', '2', 'CIR', NULL),
('01210011114', 'jmturqueza1112val@student.fatima.edu.ph', '$2y$10$Pc.SiSr1F3XE6KxKP0Ke5uhLiU2Qt8mz.EoS41byNyzH2djYISY7a', 'Turqouise', 'John Rogee', 'professor', '2024-09-20 14:13:07', NULL, NULL, NULL, '1', '1', '2', '0', '0', '2', 'AIC', NULL),
('01234354658', 'nettspendnuggets@student.fatima.edu.ph', '$2y$10$VwZUH2fXUYO7/HPcsD0kB.GNM08smgdcDCPr3sh7cWo35HJqdkyVm', 'Nuggets', 'Nettspend', 'student', '2024-10-11 02:16:03', NULL, NULL, 'edc8ae71bb3c216573a855196842cd12bc53c987021123a35564962707cdc04f', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('12345678901', 'john.doe@student.fatima.edu.ph', '', 'Doe', 'John', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '3', '4', '6', '2', '0', '1', 'AIR', NULL),
('12345678902', 'jane.smith@student.fatima.edu.ph', '', 'Smith', 'Jane', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '4', '6', '2', '1', '0', '3', 'CAI', NULL),
('12345678903', 'bob.jones@student.fatima.edu.ph', '', 'Jones', 'Bob', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '6', '4', '5', '2', '1', '0', 'RIA', NULL),
('12345678904', 'emma.james@student.fatima.edu.ph', '', 'James', 'Emma', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '0', '1', '2', '6', '4', '5', 'SCE', NULL),
('12345678905', 'alice.brown@student.fatima.edu.ph', '', 'Brown', 'Alice', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '1', '5', '0', '6', '4', '2', 'EIS', NULL),
('12345678906', 'michael.davis@student.fatima.edu.ph', '', 'Davis', 'Michael', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '5', '4', '6', '2', '1', '0', 'ARI', NULL),
('12345678907', 'sarah.wilson@student.fatima.edu.ph', '', 'Wilson', 'Sarah', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '0', '1', '2', '5', '4', '6', 'SEC', NULL),
('12345678908', 'tom.taylor@student.fatima.edu.ph', '', 'Taylor', 'Tom', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '4', '5', '2', '6', '1', '0', 'SIR', NULL),
('12345678909', 'emily.clark@student.fatima.edu.ph', '', 'Clark', 'Emily', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '6', '2', '4', '0', '5', '1', 'RAE', NULL),
('12345678910', 'george.martin@student.fatima.edu.ph', '', 'Martin', 'George', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '4', '5', '2', '1', '0', '6', 'CIR', NULL),
('12345678911', 'chris.evans@student.fatima.edu.ph', '', 'Evans', 'Chris', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '4', '5', '1', '6', '0', '2', 'ISR', NULL),
('12345678912', 'anna.kim@student.fatima.edu.ph', '', 'Kim', 'Anna', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '6', '0', '4', '1', '5', '2', 'EAR', NULL),
('12345678913', 'oliver.lewis@student.fatima.edu.ph', '', 'Lewis', 'Oliver', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '6', '5', '1', '0', '4', '2', 'RIE', NULL),
('12345678914', 'lucy.thomas@student.fatima.edu.ph', '', 'Thomas', 'Lucy', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '4', '5', '6', '1', '0', '2', 'CIA', NULL),
('12345678915', 'jack.johnson@student.fatima.edu.ph', '', 'Johnson', 'Jack', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '1', '0', '5', '6', '4', '2', 'ESA', NULL),
('12345678916', 'olivia.white@student.fatima.edu.ph', '', 'White', 'Olivia', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '0', '4', '6', '5', '1', '2', 'AIS', NULL),
('12345678917', 'liam.harris@student.fatima.edu.ph', '', 'Harris', 'Liam', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '5', '1', '6', '4', '0', '2', 'RSA', NULL),
('12345678918', 'ella.moore@student.fatima.edu.ph', '', 'Moore', 'Ella', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '0', '6', '2', '1', '5', '4', 'EIC', NULL),
('12345678919', 'noah.wright@student.fatima.edu.ph', '', 'Wright', 'Noah', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '5', '6', '1', '0', '4', '2', 'IRE', NULL),
('12345678920', 'sophia.hall@student.fatima.edu.ph', '', 'Hall', 'Sophia', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '6', '1', '5', '2', '4', '0', 'REA', NULL),
('12345678921', 'mason.king@student.fatima.edu.ph', '', 'King', 'Mason', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '1', '0', '5', '6', '4', '2', 'SCA', NULL),
('12345678922', 'mia.scott@student.fatima.edu.ph', '', 'Scott', 'Mia', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '0', '5', '1', '6', '4', '2', 'SIE', NULL),
('12345678923', 'james.green@student.fatima.edu.ph', '', 'Green', 'James', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '0', '1', '2', '4', '6', '5', 'ERC', NULL),
('12345678924', 'isabella.baker@student.fatima.edu.ph', '', 'Baker', 'Isabella', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '0', '5', '6', '4', '1', '2', 'AIS', NULL),
('12345678925', 'logan.adams@student.fatima.edu.ph', '', 'Adams', 'Logan', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '0', '1', '5', '2', '6', '4', 'CEA', NULL),
('12345678926', 'grace.carter@student.fatima.edu.ph', '', 'Carter', 'Grace', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '5', '6', '4', '0', '2', '1', 'AIR', NULL),
('12345678927', 'benjamin.morris@student.fatima.edu.ph', '', 'Morris', 'Benjamin', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '5', '6', '1', '4', '2', '0', 'SIR', NULL),
('12345678928', 'zoe.murphy@student.fatima.edu.ph', '', 'Murphy', 'Zoe', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '0', '1', '2', '6', '4', '5', 'CSE', NULL),
('12345678929', 'lucas.cooper@student.fatima.edu.ph', '', 'Cooper', 'Lucas', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '6', '5', '4', '0', '1', '2', 'IRA', NULL),
('12345678930', 'charlotte.reed@student.fatima.edu.ph', '', 'Reed', 'Charlotte', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '4', '5', '1', '6', '2', '0', 'SIR', NULL),
('12345678931', 'ella.lee@student.fatima.edu.ph', '', 'Lee', 'Ella', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '6', '5', '4', '1', '0', '2', 'RIC', NULL),
('12345678932', 'ethan.martin@student.fatima.edu.ph', '', 'Martin', 'Ethan', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '4', '5', '6', '0', '1', '2', 'CIA', NULL),
('12345678933', 'emma.jackson@student.fatima.edu.ph', '', 'Jackson', 'Emma', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '6', '0', '4', '1', '5', '2', 'ERA', NULL),
('12345678934', 'jackson.roberts@student.fatima.edu.ph', '', 'Roberts', 'Jackson', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '0', '1', '2', '6', '5', '4', 'SEC', NULL),
('12345678935', 'olivia.morgan@student.fatima.edu.ph', '', 'Morgan', 'Olivia', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '0', '5', '6', '4', '1', '2', 'AIS', NULL),
('12345678936', 'liam.bennett@student.fatima.edu.ph', '', 'Bennett', 'Liam', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '1', '5', '6', '0', '4', '2', 'AIE', NULL),
('12345678937', 'lucy.gray@student.fatima.edu.ph', '', 'Gray', 'Lucy', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '6', '5', '4', '0', '1', '2', 'RIA', NULL),
('12345678938', 'noah.cook@student.fatima.edu.ph', '', 'Cook', 'Noah', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '6', '0', '5', '4', '1', '2', 'SRA', NULL),
('12345678939', 'sophie.wood@student.fatima.edu.ph', '', 'Wood', 'Sophie', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '5', '4', '6', '0', '1', '2', 'CIA', NULL),
('12345678940', 'william.jones@student.fatima.edu.ph', '', 'Jones', 'William', 'student', '2024-09-22 15:52:41', NULL, NULL, NULL, '0', '2', '4', '6', '5', '1', 'SCE', NULL),
('12345678941', 'henry.collins@student.fatima.edu.ph', '', 'Collins', 'Henry', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '6', '2', '5', '4', '0', '1', 'RAS', NULL),
('12345678942', 'amelia.jones@student.fatima.edu.ph', '', 'Jones', 'Amelia', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '5', '6', '1', '0', '4', '2', 'IRE', NULL),
('12345678943', 'daniel.bell@student.fatima.edu.ph', '', 'Bell', 'Daniel', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '4', '6', '1', '5', '0', '2', 'CIS', NULL),
('12345678944', 'chloe.anderson@student.fatima.edu.ph', '', 'Anderson', 'Chloe', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '6', '2', '4', '1', '5', '0', 'RCE', NULL),
('12345678945', 'jacob.turner@student.fatima.edu.ph', '', 'Turner', 'Jacob', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '5', '6', '4', '0', '2', '1', 'AIR', NULL),
('12345678946', 'ava.hill@student.fatima.edu.ph', '', 'Hill', 'Ava', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '4', '6', '5', '0', '1', '2', 'SIA', NULL),
('12345678947', 'david.moore@student.fatima.edu.ph', '', 'Moore', 'David', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '6', '5', '4', '0', '1', '2', 'RIC', NULL),
('12345678948', 'mila.young@student.fatima.edu.ph', '', 'Young', 'Mila', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '6', '1', '4', '2', '5', '0', 'ERA', NULL),
('12345678949', 'ryan.wright@student.fatima.edu.ph', '', 'Wright', 'Ryan', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '4', '2', '1', '0', '6', '5', 'CAE', NULL),
('12345678950', 'sophie.bryant@student.fatima.edu.ph', '', 'Bryant', 'Sophie', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '6', '1', '2', '5', '4', '0', 'RES', NULL),
('12345678951', 'jackson.mitchell@student.fatima.edu.ph', '', 'Mitchell', 'Jackson', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '0', '1', '2', '6', '5', '4', 'SEC', NULL),
('12345678952', 'natalie.perry@student.fatima.edu.ph', '', 'Perry', 'Natalie', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '6', '5', '4', '0', '1', '2', 'IRA', NULL),
('12345678953', 'lucas.davis@student.fatima.edu.ph', '', 'Davis', 'Lucas', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '4', '5', '2', '6', '1', '0', 'SIR', NULL),
('12345678954', 'emily.kelly@student.fatima.edu.ph', '', 'Kelly', 'Emily', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '6', '5', '4', '1', '2', '0', 'RIA', NULL),
('12345678955', 'logan.cox@student.fatima.edu.ph', '', 'Cox', 'Logan', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '0', '1', '6', '2', '5', '4', 'AEC', NULL),
('12345678956', 'sophia.edwards@student.fatima.edu.ph', '', 'Edwards', 'Sophia', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '0', '4', '6', '5', '1', '2', 'AIS', NULL),
('12345678957', 'grace.morgan@student.fatima.edu.ph', '', 'Morgan', 'Grace', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '6', '0', '5', '4', '1', '2', 'SRA', NULL),
('12345678958', 'benjamin.watson@student.fatima.edu.ph', '', 'Watson', 'Benjamin', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '6', '5', '4', '0', '2', '1', 'IRA', NULL),
('12345678959', 'zoe.morris@student.fatima.edu.ph', '', 'Morris', 'Zoe', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '1', '5', '0', '6', '4', '2', 'EIS', NULL),
('12345678960', 'matthew.green@student.fatima.edu.ph', '', 'Green', 'Matthew', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '6', '5', '4', '1', '0', '2', 'RIE', NULL),
('12345678961', 'amelia.jenkins@student.fatima.edu.ph', '', 'Jenkins', 'Amelia', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '5', '4', '6', '0', '1', '2', 'SCA', NULL),
('12345678962', 'oliver.patterson@student.fatima.edu.ph', '', 'Patterson', 'Oliver', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '5', '6', '4', '0', '1', '2', 'AIR', NULL),
('12345678963', 'lily.hughes@student.fatima.edu.ph', '', 'Hughes', 'Lily', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '0', '4', '6', '5', '1', '2', 'AIS', NULL),
('12345678964', 'jackson.henderson@student.fatima.edu.ph', '', 'Henderson', 'Jackson', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '0', '2', '4', '6', '5', '1', 'SEC', NULL),
('12345678965', 'grace.barnes@student.fatima.edu.ph', '', 'Barnes', 'Grace', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '4', '5', '2', '6', '1', '0', 'SIR', NULL),
('12345678966', 'michael.evans@student.fatima.edu.ph', '', 'Evans', 'Michael', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '6', '1', '5', '0', '4', '2', 'EAR', NULL),
('12345678967', 'hannah.williams@student.fatima.edu.ph', '', 'Williams', 'Hannah', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '6', '1', '5', '0', '4', '2', 'ERA', NULL),
('12345678968', 'noah.turner@student.fatima.edu.ph', '', 'Turner', 'Noah', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '4', '6', '1', '5', '2', '0', 'CIS', NULL),
('12345678969', 'amelia.carter@student.fatima.edu.ph', '', 'Carter', 'Amelia', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '6', '2', '5', '4', '0', '1', 'RES', NULL),
('12345678970', 'jackson.robinson@student.fatima.edu.ph', '', 'Robinson', 'Jackson', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '5', '6', '4', '1', '2', '0', 'AIR', NULL),
('12345678971', 'lucy.bailey@student.fatima.edu.ph', '', 'Bailey', 'Lucy', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '0', '4', '6', '5', '1', '2', 'AIS', NULL),
('12345678972', 'daniel.martin@student.fatima.edu.ph', '', 'Martin', 'Daniel', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '6', '5', '4', '1', '2', '0', 'RIA', NULL),
('12345678973', 'ava.rogers@student.fatima.edu.ph', '', 'Rogers', 'Ava', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '4', '5', '6', '1', '0', '2', 'CIR', NULL),
('12345678974', 'lucas.sanders@student.fatima.edu.ph', '', 'Sanders', 'Lucas', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '6', '5', '4', '1', '2', '0', 'RIA', NULL),
('12345678975', 'grace.mitchell@student.fatima.edu.ph', '', 'Mitchell', 'Grace', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '0', '1', '2', '6', '4', '5', 'SEC', NULL),
('12345678976', 'liam.pierce@student.fatima.edu.ph', '', 'Pierce', 'Liam', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '0', '4', '6', '5', '1', '2', 'AIS', NULL),
('12345678977', 'emily.ross@student.fatima.edu.ph', '', 'Ross', 'Emily', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '6', '1', '5', '0', '4', '2', 'ERA', NULL),
('12345678978', 'jackson.richardson@student.fatima.edu.ph', '', 'Richardson', 'Jackson', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '6', '5', '4', '1', '2', '0', 'RIC', NULL),
('12345678979', 'sophie.brooks@student.fatima.edu.ph', '', 'Brooks', 'Sophie', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '6', '0', '5', '4', '1', '2', 'SRA', NULL),
('12345678980', 'lucas.perry@student.fatima.edu.ph', '', 'Perry', 'Lucas', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '4', '6', '2', '1', '0', '5', 'CIS', NULL),
('12345678981', 'sarah.reed@student.fatima.edu.ph', '', 'Reed', 'Sarah', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '6', '5', '4', '0', '1', '2', 'RIA', NULL),
('12345678982', 'jack.thomas@student.fatima.edu.ph', '', 'Thomas', 'Jack', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '0', '6', '4', '1', '2', '5', 'EIS', NULL),
('12345678983', 'amelia.cox@student.fatima.edu.ph', '', 'Cox', 'Amelia', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '4', '5', '1', '6', '2', '0', 'SIR', NULL),
('12345678984', 'daniel.davis@student.fatima.edu.ph', '', 'Davis', 'Daniel', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '0', '5', '6', '1', '2', '4', 'AIS', NULL),
('12345678985', 'lucy.baker@student.fatima.edu.ph', '', 'Baker', 'Lucy', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '6', '5', '4', '0', '2', '1', 'RIA', NULL),
('12345678986', 'jackson.williams@student.fatima.edu.ph', '', 'Williams', 'Jackson', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '6', '1', '5', '0', '4', '2', 'ERA', NULL),
('12345678987', 'grace.hughes@student.fatima.edu.ph', '', 'Hughes', 'Grace', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '0', '5', '6', '4', '1', '2', 'AIS', NULL),
('12345678988', 'liam.morris@student.fatima.edu.ph', '', 'Morris', 'Liam', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '6', '5', '4', '0', '1', '2', 'IRA', NULL),
('12345678989', 'lucas.cox@student.fatima.edu.ph', '', 'Cox', 'Lucas', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '4', '5', '6', '0', '2', '1', 'SIR', NULL),
('12345678990', 'sophie.watson@student.fatima.edu.ph', '', 'Watson', 'Sophie', 'student', '2024-09-22 15:55:51', NULL, NULL, NULL, '6', '1', '5', '0', '4', '2', 'SRA', NULL),
('12345678991', 'hannah.king@student.fatima.edu.ph', '', 'King', 'Hannah', 'student', '2024-09-22 15:56:56', NULL, NULL, NULL, '6', '0', '5', '4', '1', '2', 'SRA', NULL),
('12345678992', 'oliver.fisher@student.fatima.edu.ph', '', 'Fisher', 'Oliver', 'student', '2024-09-22 15:56:56', NULL, NULL, NULL, '6', '5', '4', '1', '2', '0', 'IRA', NULL),
('12345678993', 'emma.ward@student.fatima.edu.ph', '', 'Ward', 'Emma', 'student', '2024-09-22 15:56:56', NULL, NULL, NULL, '6', '1', '5', '0', '4', '2', 'ERA', NULL),
('12345678994', 'william.dixon@student.fatima.edu.ph', '', 'Dixon', 'William', 'student', '2024-09-22 15:56:56', NULL, NULL, NULL, '0', '1', '2', '6', '5', '4', 'SEC', NULL),
('12345678995', 'chloe.bell@student.fatima.edu.ph', '', 'Bell', 'Chloe', 'student', '2024-09-22 15:56:56', NULL, NULL, NULL, '5', '6', '4', '0', '2', '1', 'AIR', NULL),
('12345678996', 'lucas.russell@student.fatima.edu.ph', '', 'Russell', 'Lucas', 'student', '2024-09-22 15:56:56', NULL, NULL, NULL, '4', '5', '6', '1', '2', '0', 'SIR', NULL),
('12345678997', 'ava.walker@student.fatima.edu.ph', '', 'Walker', 'Ava', 'student', '2024-09-22 15:56:56', NULL, NULL, NULL, '6', '5', '4', '0', '1', '2', 'RIA', NULL),
('12345678998', 'jackson.cook@student.fatima.edu.ph', '', 'Cook', 'Jackson', 'student', '2024-09-22 15:56:56', NULL, NULL, NULL, '0', '4', '6', '5', '1', '2', 'AIS', NULL),
('12345678999', 'emma.martin@student.fatima.edu.ph', '', 'Martin', 'Emma', 'student', '2024-09-22 15:56:56', NULL, NULL, NULL, '4', '6', '1', '5', '0', '2', 'CIS', NULL),
('12345679000', 'sophia.james@student.fatima.edu.ph', '', 'James', 'Sophia', 'student', '2024-09-22 15:56:56', NULL, NULL, NULL, '6', '2', '5', '4', '1', '0', 'RES', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `group_edit_history`
--

CREATE TABLE `group_edit_history` (
  `id` int(11) NOT NULL,
  `room_id` int(10) UNSIGNED NOT NULL,
  `from_group` int(11) NOT NULL,
  `to_group` int(11) NOT NULL,
  `school_id` varchar(50) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `groups_json` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`groups_json`)),
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `group_edit_history`
--

INSERT INTO `group_edit_history` (`id`, `room_id`, `from_group`, `to_group`, `school_id`, `reason`, `groups_json`, `timestamp`) VALUES
(2, 1, 0, 1, '12345678923', 'may kamukha sa group 1', '[[[\"Emma James\",\"12345678904\",\"Principal Investigator\"],[\"Olivia White\",\"12345678916\",\"Research Writer\"],[\"Zoe Murphy\",\"12345678928\",\"System Designer\"]],[[\"Alice Brown\",\"12345678905\",\"Principal Investigator\"],[\"Michael Davis\",\"12345678906\",\"Research Writer\"],[\"Anna Kim\",\"12345678912\",\"System Developer\"],[\"William Jones\",\"12345678940\",\"System Designer\"],[\"James Green\",\"12345678923\",\"N/A\"]],[[\"Sarah Wilson\",\"12345678907\",\"Principal Investigator\"],[\"John Doe\",\"12345678901\",\"Research Writer\"],[\"Logan Adams\",\"12345678925\",\"System Developer\"],[\"Jackson Roberts\",\"12345678934\",\"System Designer\"]],[[\"Tom Taylor\",\"12345678908\",\"Principal Investigator\"],[\"Sophie Wood\",\"12345678939\",\"Research Writer\"],[\"Lucy Gray\",\"12345678937\",\"System Developer\"],[\"Charlotte Reed\",\"12345678930\",\"System Designer\"]],[[\"George Martin\",\"12345678910\",\"Principal Investigator\"],[\"Noah Cook\",\"12345678938\",\"Research Writer\"],[\"Ella Lee\",\"12345678931\",\"System Developer\"],[\"Benjamin Morris\",\"12345678927\",\"System Designer\"]],[[\"Chris Evans\",\"12345678911\",\"Principal Investigator\"],[\"Ethan Martin\",\"12345678932\",\"Research Writer\"],[\"Sophia Hall\",\"12345678920\",\"System Developer\"],[\"Liam Bennett\",\"12345678936\",\"System Designer\"]],[[\"Jack Johnson\",\"12345678915\",\"Principal Investigator\"],[\"Lucas Cooper\",\"12345678929\",\"Research Writer\"],[\"Liam Harris\",\"12345678917\",\"System Developer\"],[\"Olivia Morgan\",\"12345678935\",\"System Designer\"]],[[\"Ella Moore\",\"12345678918\",\"Principal Investigator\"],[\"Mason King\",\"12345678921\",\"Research Writer\"],[\"Oliver Lewis\",\"12345678913\",\"System Developer\"],[\"Emma Jackson\",\"12345678933\",\"System Designer\"]],[[\"Noah Wright\",\"12345678919\",\"Principal Investigator\"],[\"Lucy Thomas\",\"12345678914\",\"Research Writer\"],[\"Emily Clark\",\"12345678909\",\"System Developer\"],[\"Grace Carter\",\"12345678926\",\"System Designer\"]],[[\"Mia Scott\",\"12345678922\",\"Principal Investigator\"],[\"Jane Smith\",\"12345678902\",\"Research Writer\"],[\"Bob Jones\",\"12345678903\",\"System Developer\"],[\"Isabella Baker\",\"12345678924\",\"System Designer\"]]]', '2024-10-01 08:34:28'),
(3, 1, 1, 0, '12345678923', 'Testing', '[[[\"Emma James\",\"12345678904\",\"Principal Investigator\"],[\"Olivia White\",\"12345678916\",\"Research Writer\"],[\"Zoe Murphy\",\"12345678928\",\"System Designer\"],[\"James Green\",\"12345678923\",\"Pancit Canton Master\"]],[[\"Alice Brown\",\"12345678905\",\"Principal Investigator\"],[\"Michael Davis\",\"12345678906\",\"Research Writer\"],[\"Anna Kim\",\"12345678912\",\"System Developer\"],[\"William Jones\",\"12345678940\",\"System Designer\"]],[[\"Sarah Wilson\",\"12345678907\",\"Principal Investigator\"],[\"John Doe\",\"12345678901\",\"Research Writer\"],[\"Logan Adams\",\"12345678925\",\"System Developer\"],[\"Jackson Roberts\",\"12345678934\",\"System Designer\"]],[[\"Tom Taylor\",\"12345678908\",\"Principal Investigator\"],[\"Sophie Wood\",\"12345678939\",\"Research Writer\"],[\"Lucy Gray\",\"12345678937\",\"System Developer\"],[\"Charlotte Reed\",\"12345678930\",\"System Designer\"]],[[\"George Martin\",\"12345678910\",\"Principal Investigator\"],[\"Noah Cook\",\"12345678938\",\"Research Writer\"],[\"Ella Lee\",\"12345678931\",\"System Developer\"],[\"Benjamin Morris\",\"12345678927\",\"System Designer\"]],[[\"Chris Evans\",\"12345678911\",\"Principal Investigator\"],[\"Ethan Martin\",\"12345678932\",\"Research Writer\"],[\"Sophia Hall\",\"12345678920\",\"System Developer\"],[\"Liam Bennett\",\"12345678936\",\"System Designer\"]],[[\"Jack Johnson\",\"12345678915\",\"Principal Investigator\"],[\"Lucas Cooper\",\"12345678929\",\"Research Writer\"],[\"Liam Harris\",\"12345678917\",\"System Developer\"],[\"Olivia Morgan\",\"12345678935\",\"System Designer\"]],[[\"Ella Moore\",\"12345678918\",\"Principal Investigator\"],[\"Mason King\",\"12345678921\",\"Research Writer\"],[\"Oliver Lewis\",\"12345678913\",\"System Developer\"],[\"Emma Jackson\",\"12345678933\",\"System Designer\"]],[[\"Noah Wright\",\"12345678919\",\"Principal Investigator\"],[\"Lucy Thomas\",\"12345678914\",\"Research Writer\"],[\"Emily Clark\",\"12345678909\",\"System Developer\"],[\"Grace Carter\",\"12345678926\",\"System Designer\"]],[[\"Mia Scott\",\"12345678922\",\"Principal Investigator\"],[\"Jane Smith\",\"12345678902\",\"Research Writer\"],[\"Bob Jones\",\"12345678903\",\"System Developer\"],[\"Isabella Baker\",\"12345678924\",\"System Designer\"]]]', '2024-10-01 12:55:45'),
(4, 1, 0, 1, '12345678904', 'Leader Swap', '[[[\"Olivia White\",\"12345678916\",\"Research Writer\"],[\"Zoe Murphy\",\"12345678928\",\"System Designer\"],[\"James Green\",\"12345678923\",\"Pancit Canton Master\"]],[[\"Alice Brown\",\"12345678905\",\"Principal Investigator\"],[\"Michael Davis\",\"12345678906\",\"Research Writer\"],[\"Anna Kim\",\"12345678912\",\"System Developer\"],[\"William Jones\",\"12345678940\",\"System Designer\"],[\"Emma James\",\"12345678904\",\"N/A\"]],[[\"Sarah Wilson\",\"12345678907\",\"Principal Investigator\"],[\"John Doe\",\"12345678901\",\"Research Writer\"],[\"Logan Adams\",\"12345678925\",\"System Developer\"],[\"Jackson Roberts\",\"12345678934\",\"System Designer\"]],[[\"Tom Taylor\",\"12345678908\",\"Principal Investigator\"],[\"Sophie Wood\",\"12345678939\",\"Research Writer\"],[\"Lucy Gray\",\"12345678937\",\"System Developer\"],[\"Charlotte Reed\",\"12345678930\",\"System Designer\"]],[[\"George Martin\",\"12345678910\",\"Principal Investigator\"],[\"Noah Cook\",\"12345678938\",\"Research Writer\"],[\"Ella Lee\",\"12345678931\",\"System Developer\"],[\"Benjamin Morris\",\"12345678927\",\"System Designer\"]],[[\"Chris Evans\",\"12345678911\",\"Principal Investigator\"],[\"Ethan Martin\",\"12345678932\",\"Research Writer\"],[\"Sophia Hall\",\"12345678920\",\"System Developer\"],[\"Liam Bennett\",\"12345678936\",\"System Designer\"]],[[\"Jack Johnson\",\"12345678915\",\"Principal Investigator\"],[\"Lucas Cooper\",\"12345678929\",\"Research Writer\"],[\"Liam Harris\",\"12345678917\",\"System Developer\"],[\"Olivia Morgan\",\"12345678935\",\"System Designer\"]],[[\"Ella Moore\",\"12345678918\",\"Principal Investigator\"],[\"Mason King\",\"12345678921\",\"Research Writer\"],[\"Oliver Lewis\",\"12345678913\",\"System Developer\"],[\"Emma Jackson\",\"12345678933\",\"System Designer\"]],[[\"Noah Wright\",\"12345678919\",\"Principal Investigator\"],[\"Lucy Thomas\",\"12345678914\",\"Research Writer\"],[\"Emily Clark\",\"12345678909\",\"System Developer\"],[\"Grace Carter\",\"12345678926\",\"System Designer\"]],[[\"Mia Scott\",\"12345678922\",\"Principal Investigator\"],[\"Jane Smith\",\"12345678902\",\"Research Writer\"],[\"Bob Jones\",\"12345678903\",\"System Developer\"],[\"Isabella Baker\",\"12345678924\",\"System Designer\"]]]', '2024-10-01 13:46:14'),
(5, 1, 1, 0, '12345678905', 'Leader Swap', '[[[\"Olivia White\",\"12345678916\",\"Research Writer\"],[\"Zoe Murphy\",\"12345678928\",\"System Designer\"],[\"James Green\",\"12345678923\",\"Pancit Canton Master\"],[\"Alice Brown\",\"12345678905\",\"Principal Investigator\"]],[[\"Michael Davis\",\"12345678906\",\"Research Writer\"],[\"Anna Kim\",\"12345678912\",\"System Developer\"],[\"William Jones\",\"12345678940\",\"System Designer\"],[\"Emma James\",\"12345678904\",\"N/A\"]],[[\"Sarah Wilson\",\"12345678907\",\"Principal Investigator\"],[\"John Doe\",\"12345678901\",\"Research Writer\"],[\"Logan Adams\",\"12345678925\",\"System Developer\"],[\"Jackson Roberts\",\"12345678934\",\"System Designer\"]],[[\"Tom Taylor\",\"12345678908\",\"Principal Investigator\"],[\"Sophie Wood\",\"12345678939\",\"Research Writer\"],[\"Lucy Gray\",\"12345678937\",\"System Developer\"],[\"Charlotte Reed\",\"12345678930\",\"System Designer\"]],[[\"George Martin\",\"12345678910\",\"Principal Investigator\"],[\"Noah Cook\",\"12345678938\",\"Research Writer\"],[\"Ella Lee\",\"12345678931\",\"System Developer\"],[\"Benjamin Morris\",\"12345678927\",\"System Designer\"]],[[\"Chris Evans\",\"12345678911\",\"Principal Investigator\"],[\"Ethan Martin\",\"12345678932\",\"Research Writer\"],[\"Sophia Hall\",\"12345678920\",\"System Developer\"],[\"Liam Bennett\",\"12345678936\",\"System Designer\"]],[[\"Jack Johnson\",\"12345678915\",\"Principal Investigator\"],[\"Lucas Cooper\",\"12345678929\",\"Research Writer\"],[\"Liam Harris\",\"12345678917\",\"System Developer\"],[\"Olivia Morgan\",\"12345678935\",\"System Designer\"]],[[\"Ella Moore\",\"12345678918\",\"Principal Investigator\"],[\"Mason King\",\"12345678921\",\"Research Writer\"],[\"Oliver Lewis\",\"12345678913\",\"System Developer\"],[\"Emma Jackson\",\"12345678933\",\"System Designer\"]],[[\"Noah Wright\",\"12345678919\",\"Principal Investigator\"],[\"Lucy Thomas\",\"12345678914\",\"Research Writer\"],[\"Emily Clark\",\"12345678909\",\"System Developer\"],[\"Grace Carter\",\"12345678926\",\"System Designer\"]],[[\"Mia Scott\",\"12345678922\",\"Principal Investigator\"],[\"Jane Smith\",\"12345678902\",\"Research Writer\"],[\"Bob Jones\",\"12345678903\",\"System Developer\"],[\"Isabella Baker\",\"12345678924\",\"System Designer\"]]]', '2024-10-01 13:46:14'),
(6, 1, 3, 4, '12345678908', 'There\'s conflict between the members', '[[[\"Emma James\",\"12345678904\",\"Principal Investigator\"],[\"Isabella Baker\",\"12345678924\",\"Research Writer\"],[\"Emma Jackson\",\"12345678933\",\"System Developer\"],[null,\"01210011112\",\"System Designer\"]],[[\"Alice Brown\",\"12345678905\",\"Principal Investigator\"],[\"Olivia White\",\"12345678916\",\"Research Writer\"],[\"Zoe Murphy\",\"12345678928\",\"System Developer\"],[\"William Jones\",\"12345678940\",\"System Designer\"]],[[\"Sarah Wilson\",\"12345678907\",\"Principal Investigator\"],[\"Michael Davis\",\"12345678906\",\"Research Writer\"],[\"James Green\",\"12345678923\",\"System Developer\"],[\"Jackson Roberts\",\"12345678934\",\"System Designer\"]],[[\"John Doe\",\"12345678901\",\"Research Writer\"],[\"Anna Kim\",\"12345678912\",\"System Developer\"],[\"Charlotte Reed\",\"12345678930\",\"System Designer\"]],[[\"George Martin\",\"12345678910\",\"Principal Investigator\"],[\"Sophie Wood\",\"12345678939\",\"Research Writer\"],[\"Lucy Gray\",\"12345678937\",\"System Developer\"],[\"Benjamin Morris\",\"12345678927\",\"System Designer\"],[\"Tom Taylor\",\"12345678908\",\"N/A\"]],[[\"Chris Evans\",\"12345678911\",\"Principal Investigator\"],[\"Noah Cook\",\"12345678938\",\"Research Writer\"],[\"Ella Lee\",\"12345678931\",\"System Developer\"],[\"Liam Bennett\",\"12345678936\",\"System Designer\"]],[[\"Jack Johnson\",\"12345678915\",\"Principal Investigator\"],[\"Ethan Martin\",\"12345678932\",\"Research Writer\"],[\"Sophia Hall\",\"12345678920\",\"System Developer\"],[\"Olivia Morgan\",\"12345678935\",\"System Designer\"]],[[\"Ella Moore\",\"12345678918\",\"Principal Investigator\"],[\"Lucas Cooper\",\"12345678929\",\"Research Writer\"],[\"Liam Harris\",\"12345678917\",\"System Developer\"],[\"Grace Carter\",\"12345678926\",\"System Designer\"]],[[\"Noah Wright\",\"12345678919\",\"Principal Investigator\"],[\"Mason King\",\"12345678921\",\"Research Writer\"],[\"Oliver Lewis\",\"12345678913\",\"System Developer\"]],[[\"Mia Scott\",\"12345678922\",\"Principal Investigator\"],[\"Lucy Thomas\",\"12345678914\",\"Research Writer\"],[\"Emily Clark\",\"12345678909\",\"System Developer\"]],[[\"Logan Adams\",\"12345678925\",\"Principal Investigator\"],[\"Jane Smith\",\"12345678902\",\"Research Writer\"],[\"Bob Jones\",\"12345678903\",\"System Developer\"]]]', '2024-10-11 04:46:03'),
(7, 1, 0, 1, '12345678928', 'Walang ambag', '[[[\"Emma James\",\"12345678904\",\"Principal Investigator\"],[\"Isabella Baker\",\"12345678924\",\"Research Writer\"],[\"James Green\",\"12345678923\",\"System Developer\"]],[[\"Alice Brown\",\"12345678905\",\"Principal Investigator\"],[\"Olivia White\",\"12345678916\",\"Research Writer\"],[\"Anna Kim\",\"12345678912\",\"System Developer\"],[\"William Jones\",\"12345678940\",\"System Designer\"],[\"Zoe Murphy\",\"12345678928\",\"N/A\"]],[[\"Sarah Wilson\",\"12345678907\",\"Principal Investigator\"],[\"Michael Davis\",\"12345678906\",\"Research Writer\"],[\"Logan Adams\",\"12345678925\",\"System Developer\"],[\"Jackson Roberts\",\"12345678934\",\"System Designer\"]],[[\"Tom Taylor\",\"12345678908\",\"Principal Investigator\"],[\"Sophie Wood\",\"12345678939\",\"Research Writer\"],[\"Nettspend Nuggets\",\"01210011112\",\"System Developer\"],[\"Charlotte Reed\",\"12345678930\",\"System Designer\"]],[[\"George Martin\",\"12345678910\",\"Principal Investigator\"],[\"Noah Cook\",\"12345678938\",\"Research Writer\"],[\"Lucy Gray\",\"12345678937\",\"System Developer\"],[\"Benjamin Morris\",\"12345678927\",\"System Designer\"]],[[\"Chris Evans\",\"12345678911\",\"Principal Investigator\"],[\"Ethan Martin\",\"12345678932\",\"Research Writer\"],[\"Ella Lee\",\"12345678931\",\"System Developer\"],[\"Liam Bennett\",\"12345678936\",\"System Designer\"]],[[\"Jack Johnson\",\"12345678915\",\"Principal Investigator\"],[\"Lucas Cooper\",\"12345678929\",\"Research Writer\"],[\"Sophia Hall\",\"12345678920\",\"System Developer\"],[\"Olivia Morgan\",\"12345678935\",\"System Designer\"]],[[\"Ella Moore\",\"12345678918\",\"Principal Investigator\"],[\"Mason King\",\"12345678921\",\"Research Writer\"],[\"Liam Harris\",\"12345678917\",\"System Developer\"],[\"Emma Jackson\",\"12345678933\",\"System Designer\"]],[[\"Noah Wright\",\"12345678919\",\"Principal Investigator\"],[\"Lucy Thomas\",\"12345678914\",\"Research Writer\"],[\"Oliver Lewis\",\"12345678913\",\"System Developer\"],[\"Grace Carter\",\"12345678926\",\"System Designer\"]],[[\"Mia Scott\",\"12345678922\",\"Principal Investigator\"],[\"Jane Smith\",\"12345678902\",\"Research Writer\"],[\"Emily Clark\",\"12345678909\",\"System Developer\"]]]', '2024-10-11 05:23:50'),
(8, 1, 0, 1, '12345678924', 'Personal Conflict', '[[[\"Emma James\",\"12345678904\",\"Principal Investigator\"],[\"James Green\",\"12345678923\",\"System Developer\"],[\"Zoe Murphy\",\"12345678928\",\"System Designer\"]],[[\"Alice Brown\",\"12345678905\",\"Principal Investigator\"],[\"Olivia White\",\"12345678916\",\"Research Writer\"],[\"Anna Kim\",\"12345678912\",\"System Developer\"],[\"William Jones\",\"12345678940\",\"System Designer\"],[\"Isabella Baker\",\"12345678924\",\"N/A\"]],[[\"Sarah Wilson\",\"12345678907\",\"Principal Investigator\"],[\"Michael Davis\",\"12345678906\",\"Research Writer\"],[\"Logan Adams\",\"12345678925\",\"System Developer\"],[\"Jackson Roberts\",\"12345678934\",\"System Designer\"]],[[\"Tom Taylor\",\"12345678908\",\"Principal Investigator\"],[\"Sophie Wood\",\"12345678939\",\"Research Writer\"],[\"Nettspend Nuggets\",\"01210011112\",\"System Developer\"],[\"Charlotte Reed\",\"12345678930\",\"System Designer\"]],[[\"George Martin\",\"12345678910\",\"Principal Investigator\"],[\"Noah Cook\",\"12345678938\",\"Research Writer\"],[\"Lucy Gray\",\"12345678937\",\"System Developer\"],[\"Benjamin Morris\",\"12345678927\",\"System Designer\"]],[[\"Chris Evans\",\"12345678911\",\"Principal Investigator\"],[\"Ethan Martin\",\"12345678932\",\"Research Writer\"],[\"Ella Lee\",\"12345678931\",\"System Developer\"],[\"Liam Bennett\",\"12345678936\",\"System Designer\"]],[[\"Jack Johnson\",\"12345678915\",\"Principal Investigator\"],[\"Lucas Cooper\",\"12345678929\",\"Research Writer\"],[\"Sophia Hall\",\"12345678920\",\"System Developer\"],[\"Olivia Morgan\",\"12345678935\",\"System Designer\"]],[[\"Ella Moore\",\"12345678918\",\"Principal Investigator\"],[\"Mason King\",\"12345678921\",\"Research Writer\"],[\"Liam Harris\",\"12345678917\",\"System Developer\"],[\"Emma Jackson\",\"12345678933\",\"System Designer\"]],[[\"Noah Wright\",\"12345678919\",\"Principal Investigator\"],[\"Lucy Thomas\",\"12345678914\",\"Research Writer\"],[\"Oliver Lewis\",\"12345678913\",\"System Developer\"],[\"Grace Carter\",\"12345678926\",\"System Designer\"]],[[\"Mia Scott\",\"12345678922\",\"Principal Investigator\"],[\"Jane Smith\",\"12345678902\",\"Research Writer\"],[\"Emily Clark\",\"12345678909\",\"System Developer\"]]]', '2024-10-11 06:03:06');

-- --------------------------------------------------------

--
-- Table structure for table `join_room_requests`
--

CREATE TABLE `join_room_requests` (
  `room_id` int(10) UNSIGNED NOT NULL,
  `school_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `join_room_requests`
--

INSERT INTO `join_room_requests` (`room_id`, `school_id`) VALUES
(17, '01210011112'),
(4, '01210011112');

-- --------------------------------------------------------

--
-- Table structure for table `log_trails`
--

CREATE TABLE `log_trails` (
  `id` int(10) UNSIGNED NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `school_id` varchar(50) NOT NULL,
  `action_type` enum('LOGIN','LOGOUT','REGISTER','ROOM_CREATE','ROOM_MODIFY','ROOM_JOIN','JOIN_REQUEST_RESPONSE','GROUP_CREATE','GROUP_MODIFY','ACCOUNT_CHANGE','PASSWORD_CHANGE','PERSONALITY_TEST') NOT NULL,
  `description` text NOT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `resource` varchar(255) DEFAULT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `school_id` varchar(50) NOT NULL,
  `read_status` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `type` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `school_id`, `read_status`, `created_at`, `type`) VALUES
(48, '01210011113', 0, '2024-10-08 03:42:09', '{\"type\":\"student_remove\",\"room_name\":\"CSTH411 BSCS 4-Y1-1\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":1,\"student_id\":\"01210011113\"}'),
(50, '01210011113', 0, '2024-10-08 03:42:41', '{\"type\":\"room_accept\",\"room_name\":\"CSTH411 BSCS 4-Y1-1\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":1,\"student_id\":\"01210011113\"}'),
(51, '01210011113', 0, '2024-10-08 03:42:54', '{\"type\":\"student_remove\",\"room_name\":\"CSTH411 BSCS 4-Y1-1\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":1,\"student_id\":\"01210011113\"}'),
(53, '01210011113', 0, '2024-10-08 08:23:18', '{\"type\":\"room_accept\",\"room_name\":\"CSTH411 BSCS 4-Y1-1\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":1,\"student_id\":\"01210011113\"}'),
(55, '01210011113', 0, '2024-10-10 23:57:56', '{\"type\":\"room_accept\",\"room_name\":\"IT Capstone BSIT 4-Y1-1\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":4,\"student_id\":\"01210011113\"}'),
(57, '01210011113', 0, '2024-10-10 23:58:21', '{\"type\":\"room_accept\",\"room_name\":\"untiljapan\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":7,\"student_id\":\"01210011113\"}'),
(59, '01210011113', 0, '2024-10-10 23:59:14', '{\"type\":\"room_accept\",\"room_name\":\"CSOA411\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":6,\"student_id\":\"01210011113\"}'),
(60, '01210011113', 0, '2024-10-11 03:08:43', '{\"type\":\"student_remove\",\"room_name\":\"CSTH411 BSCS 4-Y1-1\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":1,\"student_id\":\"01210011113\"}'),
(70, '12345678903', 0, '2024-10-11 04:59:35', '{\"type\":\"student_remove\",\"room_name\":\"CSTH411 BSCS 4-Y1-1\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":1,\"student_id\":\"12345678903\"}'),
(75, '12345678901', 0, '2024-10-11 05:22:15', '{\"type\":\"student_remove\",\"room_name\":\"CSTH411 BSCS 4-Y1-1\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":1,\"student_id\":\"12345678901\"}'),
(77, '01210011112', 0, '2024-10-11 06:00:28', '{\"type\":\"room_decline\",\"room_name\":\"CSTH411 BSCS 4-Y1-1\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":1,\"student_id\":\"01210011112\"}'),
(79, '01210011112', 0, '2024-10-11 06:00:48', '{\"type\":\"room_accept\",\"room_name\":\"CSTH411 BSCS 4-Y1-1\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":1,\"student_id\":\"01210011112\"}'),
(80, '01210011112', 0, '2024-10-11 06:04:59', '{\"type\":\"student_remove\",\"room_name\":\"CSTH411 BSCS 4-Y1-1\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":1,\"student_id\":\"01210011112\"}'),
(82, '01210011112', 0, '2024-10-12 02:56:42', '{\"type\":\"room_accept\",\"room_name\":\"CSTH411 BSCS 4-Y1-1\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":1,\"student_id\":\"01210011112\"}'),
(85, '01210011112', 0, '2024-10-13 06:47:31', '{\"type\":\"room_accept\",\"room_name\":\"CSTH411 BSCS 4-Y1-4\",\"prof_name\":\"John Rogee Turqouise\",\"prof_id\":\"01210011114\",\"room_id\":13,\"student_id\":\"01210011112\"}');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `room_id` int(10) UNSIGNED NOT NULL,
  `room_name` varchar(255) NOT NULL,
  `school_id` varchar(50) NOT NULL,
  `room_code` varchar(6) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `year_level` enum('1st year','2nd year','3rd year','4th year') DEFAULT NULL,
  `program` enum('cs','it') DEFAULT NULL,
  `section` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`room_id`, `room_name`, `school_id`, `room_code`, `created_date`, `year_level`, `program`, `section`) VALUES
(1, 'CSTH411 BSCS 4-Y1-1', '01210011114', '646733', '2024-09-22 15:58:14', '4th year', 'cs', 'Y1-1'),
(4, 'IT Capstone BSIT 4-Y1-1', '01210011114', '387034', '2024-10-10 13:21:55', '4th year', 'it', 'Y1-1'),
(5, 'CSTH411 BSCS 4-Y1-2', '01210011114', '491825', '2024-10-10 13:43:10', '4th year', 'cs', 'Y1-2'),
(6, 'IT Capstone BSIT 4-Y1-3', '01210011114', '870967', '2024-10-10 16:09:08', '1st year', 'it', 'Y1-1'),
(7, 'IT Capstone BSIT 4-Y1-2', '01210011114', '602392', '2024-10-10 23:43:10', '1st year', 'cs', 'Y1-3'),
(13, 'CSTH411 BSCS 4-Y1-4', '01210011114', '678034', '2024-10-11 04:39:20', '3rd year', 'it', 'Y1-1'),
(14, 'New Roolm', '01210011114', '526008', '2024-10-11 04:55:51', '2nd year', 'cs', 'Y1-3'),
(15, 'Devil in a new dress', '01210011114', '950935', '2024-10-11 05:19:12', '2nd year', 'it', 'Y1-1'),
(16, 'NEWEST ROOM', '01210011114', '320149', '2024-10-11 05:58:50', '1st year', 'cs', 'WQEQWEWQ'),
(17, 'weqwewq', '01210011114', '813804', '2024-10-13 05:16:19', '1st year', 'cs', 'ewqewq'),
(18, 'wqeqweqw', '01210011114', '668153', '2024-10-13 08:43:40', '1st year', 'cs', 'wqeqw'),
(19, '124321421', '01210011114', '407262', '2024-10-13 08:43:48', '1st year', 'cs', '14214'),
(20, 'Let it burn', '01210011114', '176080', '2024-10-13 14:10:54', '1st year', 'cs', 'Usher');

-- --------------------------------------------------------

--
-- Table structure for table `room_groups`
--

CREATE TABLE `room_groups` (
  `room_id` int(10) UNSIGNED NOT NULL,
  `groups_json` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`groups_json`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room_groups`
--

INSERT INTO `room_groups` (`room_id`, `groups_json`) VALUES
(1, '[[[\"Emma+James\",\"12345678904\",\"Principal Investigator\"],[\"Isabella+Baker\",\"12345678924\",\"Research Writer\"],[\"James+Green\",\"12345678923\",\"System Developer\"],[\"Zoe+Murphy\",\"12345678928\",\"System Designer\"]],[[\"Alice+Brown\",\"12345678905\",\"Principal Investigator\"],[\"Olivia+White\",\"12345678916\",\"Research Writer\"],[\"Anna+Kim\",\"12345678912\",\"System Developer\"],[\"William+Jones\",\"12345678940\",\"System Designer\"]],[[\"Sarah+Wilson\",\"12345678907\",\"Principal Investigator\"],[\"Michael+Davis\",\"12345678906\",\"Research Writer\"],[\"Logan+Adams\",\"12345678925\",\"System Developer\"],[\"Jackson+Roberts\",\"12345678934\",\"System Designer\"]],[[\"Tom+Taylor\",\"12345678908\",\"Principal Investigator\"],[\"Sophie+Wood\",\"12345678939\",\"Research Writer\"],[\"Nettspend+Nuggets\",\"01210011112\",\"System Developer\"],[\"Charlotte+Reed\",\"12345678930\",\"System Designer\"]],[[\"George+Martin\",\"12345678910\",\"Principal Investigator\"],[\"Noah+Cook\",\"12345678938\",\"Research Writer\"],[\"Lucy+Gray\",\"12345678937\",\"System Developer\"],[\"Benjamin+Morris\",\"12345678927\",\"System Designer\"]],[[\"Chris+Evans\",\"12345678911\",\"Principal Investigator\"],[\"Ethan+Martin\",\"12345678932\",\"Research Writer\"],[\"Ella+Lee\",\"12345678931\",\"System Developer\"],[\"Liam+Bennett\",\"12345678936\",\"System Designer\"]],[[\"Jack+Johnson\",\"12345678915\",\"Principal Investigator\"],[\"Lucas+Cooper\",\"12345678929\",\"Research Writer\"],[\"Sophia+Hall\",\"12345678920\",\"System Developer\"],[\"Olivia+Morgan\",\"12345678935\",\"System Designer\"]],[[\"Ella+Moore\",\"12345678918\",\"Principal Investigator\"],[\"Mason+King\",\"12345678921\",\"Research Writer\"],[\"Liam+Harris\",\"12345678917\",\"System Developer\"],[\"Emma+Jackson\",\"12345678933\",\"System Designer\"]],[[\"Noah+Wright\",\"12345678919\",\"Principal Investigator\"],[\"Lucy+Thomas\",\"12345678914\",\"Research Writer\"],[\"Oliver+Lewis\",\"12345678913\",\"System Developer\"],[\"Grace+Carter\",\"12345678926\",\"System Designer\"]],[[\"Mia+Scott\",\"12345678922\",\"Principal Investigator\"],[\"Jane+Smith\",\"12345678902\",\"Research Writer\"],[\"Emily+Clark\",\"12345678909\",\"System Developer\"]]]');

-- --------------------------------------------------------

--
-- Table structure for table `room_list`
--

CREATE TABLE `room_list` (
  `room_id` int(10) UNSIGNED NOT NULL,
  `school_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='List of Students in per room\r\n';

--
-- Dumping data for table `room_list`
--

INSERT INTO `room_list` (`room_id`, `school_id`) VALUES
(1, '12345678902'),
(1, '12345678904'),
(1, '12345678905'),
(1, '12345678906'),
(1, '12345678907'),
(1, '12345678908'),
(1, '12345678909'),
(1, '12345678910'),
(1, '12345678911'),
(1, '12345678912'),
(1, '12345678913'),
(1, '12345678914'),
(1, '12345678915'),
(1, '12345678916'),
(1, '12345678917'),
(1, '12345678918'),
(1, '12345678919'),
(1, '12345678920'),
(1, '12345678921'),
(1, '12345678922'),
(1, '12345678923'),
(1, '12345678924'),
(1, '12345678925'),
(1, '12345678926'),
(1, '12345678927'),
(1, '12345678928'),
(1, '12345678929'),
(1, '12345678930'),
(1, '12345678931'),
(1, '12345678932'),
(1, '12345678933'),
(1, '12345678934'),
(1, '12345678935'),
(1, '12345678936'),
(1, '12345678937'),
(1, '12345678938'),
(1, '12345678939'),
(1, '12345678940'),
(4, '01210011113'),
(7, '01210011113'),
(6, '01210011113'),
(1, '01210011112'),
(13, '01210011112');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `ticket_id` int(10) UNSIGNED NOT NULL,
  `status` enum('pending','solved','unresolved') DEFAULT NULL,
  `f_name` varchar(255) NOT NULL,
  `l_name` varchar(255) NOT NULL,
  `school_id` varchar(255) DEFAULT NULL,
  `message` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `category` enum('rooms','groups','account','others') NOT NULL,
  `ticket_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`ticket_id`, `status`, `f_name`, `l_name`, `school_id`, `message`, `email`, `category`, `ticket_date`) VALUES
(1, NULL, 'Jovannah', 'Lean', '01234567890', 'My acount is hak  ;(', 'whathehealll@student.fatima.edu.ph', 'account', '2024-10-08 02:58:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`school_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `reset_token_hash` (`reset_token_hash`),
  ADD UNIQUE KEY `account_activation_hash` (`account_activation_hash`),
  ADD KEY `idx_school_id` (`school_id`);

--
-- Indexes for table `group_edit_history`
--
ALTER TABLE `group_edit_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `roomid_fk` (`room_id`),
  ADD KEY `schoolid_fk` (`school_id`);

--
-- Indexes for table `join_room_requests`
--
ALTER TABLE `join_room_requests`
  ADD KEY `request_room_id` (`room_id`),
  ADD KEY `request_school_id` (`school_id`);

--
-- Indexes for table `log_trails`
--
ALTER TABLE `log_trails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_notifications_school_id` (`school_id`),
  ADD KEY `idx_notifications_read_status` (`read_status`),
  ADD KEY `idx_notifications_created_at` (`created_at`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`room_id`),
  ADD UNIQUE KEY `room_code` (`room_code`),
  ADD KEY `school_id` (`school_id`);

--
-- Indexes for table `room_groups`
--
ALTER TABLE `room_groups`
  ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `room_list`
--
ALTER TABLE `room_list`
  ADD KEY `room_id` (`room_id`),
  ADD KEY `school_id` (`school_id`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`ticket_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `group_edit_history`
--
ALTER TABLE `group_edit_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `log_trails`
--
ALTER TABLE `log_trails`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `room_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `room_groups`
--
ALTER TABLE `room_groups`
  MODIFY `room_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `room_list`
--
ALTER TABLE `room_list`
  MODIFY `room_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `ticket_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `group_edit_history`
--
ALTER TABLE `group_edit_history`
  ADD CONSTRAINT `group_edit_history_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `accounts` (`school_id`),
  ADD CONSTRAINT `group_edit_history_ibfk_2` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`room_id`);

--
-- Constraints for table `join_room_requests`
--
ALTER TABLE `join_room_requests`
  ADD CONSTRAINT `request_room_id` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`room_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `request_school_id` FOREIGN KEY (`school_id`) REFERENCES `accounts` (`school_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `accounts` (`school_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `room_student_id` FOREIGN KEY (`school_id`) REFERENCES `accounts` (`school_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `room_groups`
--
ALTER TABLE `room_groups`
  ADD CONSTRAINT `room_groups_id` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`room_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `room_list`
--
ALTER TABLE `room_list`
  ADD CONSTRAINT `list_student_id` FOREIGN KEY (`school_id`) REFERENCES `accounts` (`school_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `room_list_id` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`room_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

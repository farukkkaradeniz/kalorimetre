<?php

use yii\db\Migration;

class m160524_225455_kalorimetre extends Migration
{
    public function up()
    {
		$this -> execute('-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 25 May 2016, 00:57:16
-- Sunucu sürümü: 10.1.10-MariaDB
-- PHP Sürümü: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Veritabanı: `yii`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('admin', '1', 1464115342),
('admin', '5', NULL),
('author', '2', 1464115342);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('admin', 1, NULL, NULL, NULL, 1464115053, 1464115053),
('admin/yemekler/create', 2, 'create post', NULL, NULL, 1464114650, 1464114650),
('admin/yemekler/delete', 2, 'delete post', NULL, NULL, 1464114650, 1464114650),
('admin/yemekler/index', 2, 'Create a index', NULL, NULL, 1464114650, 1464114650),
('admin/yemekler/update', 2, 'Update post', NULL, NULL, 1464114650, 1464114650),
('admin/yemekler/view', 2, 'view post', NULL, NULL, 1464114650, 1464114650),
('author', 1, NULL, NULL, NULL, 1464115052, 1464115052);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('admin', 'admin/yemekler/delete'),
('admin', 'admin/yemekler/update'),
('admin', 'author'),
('author', 'admin/yemekler/create'),
('author', 'admin/yemekler/index'),
('author', 'admin/yemekler/view');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kaloritable`
--

CREATE TABLE `kaloritable` (
  `id` int(11) NOT NULL,
  `userid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `YemekName` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `meal` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `Tarih` date DEFAULT NULL,
  `kalori` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `kaloritable`
--

INSERT INTO `kaloritable` (`id`, `userid`, `YemekName`, `meal`, `Tarih`, `kalori`) VALUES
(18, 'sinan', 'mercimek çorbası', 'öğle', '2016-05-18', 100),
(19, 'sinan', 'pilav', 'akşam', '2016-05-18', 300),
(20, 'sinan', '3', 'akşam', '2016-05-17', 3),
(22, 'sinan', 'makarna', 'akşam', '2016-05-17', 150),
(24, 'sinan', 'Yulaf Ezmesi(40gr)', 'sabah', '2016-05-18', 150),
(27, 'sinan', 'mercimek çorbası', 'öğle', '2016-05-18', 100),
(28, 'sinan', 'mercimek çorbası', 'öğle', '2016-05-18', 100),
(29, 'sinan', 'mercimek çorbası', 'akşam', '2016-05-18', 100),
(30, 'sinan', 'pilav', 'akşam', '2016-05-18', 300);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1459793489),
('m130524_201442_init', 1459793493),
('m140506_102106_rbac_init', 1464112724),
('m160524_171019_kaloritable_table', 1464110075),
('m160524_171833_yemekler_table', 1464110488),
('m160524_172450_ogun_table', 1464110711),
('m160524_172617_sports_table', 1464110914);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ogun`
--

CREATE TABLE `ogun` (
  `id` int(11) NOT NULL,
  `Name` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `ogun`
--

INSERT INTO `ogun` (`id`, `Name`) VALUES
(1, 'sabah'),
(2, 'öğle'),
(3, 'akşam');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sports`
--

CREATE TABLE `sports` (
  `id` int(11) NOT NULL,
  `userName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `AletName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `minute` int(11) DEFAULT NULL,
  `weight` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `sports`
--

INSERT INTO `sports` (`id`, `userName`, `AletName`, `minute`, `weight`) VALUES
(1, 'aliekrem', 'Koşu Bandı', 15, NULL),
(2, 'sinan', 'pisiklet', 25, NULL),
(3, 'sinan', 'koşubandı', 15, NULL),
(4, 'faruk', 'leg curl', NULL, 32);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(2, 'aliekremozalp', 'asdf', 'aeozalp', 'aeozalp', 'ae06@gmail.com', 1, 1, 0),
(3, 'faruk_fk', 'CQjx1bJasvyk3znBQvKjXrPCoCmeREV7', '$2y$13$0jj6U3yadOxscBVsQG/wP.avLJvzTydm44RtHqmcqYS8q4rS/tHfS', NULL, 'karadenizfaruk28@gmail.com', 10, 1463483739, 1463483739),
(4, 'aliekrem', 'u-SbtYUhILFnw-STQ-5bkElVm0b2RyUq', '$2y$13$i7sN8O7woaZu4ksmkybnLuDQ.nSWnU12yhKcietcGsmaRxHdE722a', NULL, 'aekrem06@gmail.com', 10, 1463485974, 1463485974),
(5, 'sinan', 'GQ6qglQ-CIxqLl3YfUCC_faqP90GKvVu', '$2y$13$3LSt7O.YVFYi01p4hEgT9.X8kC6j3iCzFKmBEwuVH3rcCFDDNY5KK', NULL, 'sinan60@gmail.com', 10, 1463502388, 1463502388);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yemekler`
--

CREATE TABLE `yemekler` (
  `id` int(11) NOT NULL,
  `yemekName` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `kalori` int(11) NOT NULL,
  `ogunid` varchar(15) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `yemekler`
--

INSERT INTO `yemekler` (`id`, `yemekName`, `kalori`, `ogunid`) VALUES
(1, 'pilav', 300, 'akşam'),
(2, 'makarna', 150, 'akşam'),
(3, 'mercimek çorbası', 100, 'akşam'),
(4, 'Yulaf Ezmesi(40gr)', 150, 'sabah'),
(5, 'beyaz peynir(1 kalıp)', 45, 'sabah'),
(6, 'Reçel 1 çorba kaşığı', 65, 'sabah'),
(7, 'Yumurta(Haşlanmış-Adet)', 74, 'sabah'),
(8, 'Yumurta(Sahanda-Adet)', 154, 'sabah'),
(9, 'Zeytin(7-adet)', 60, 'sabah'),
(10, 'Kaşar-Salam Açbitir', 460, 'sabah'),
(11, 'salata', 45, 'öğle'),
(12, 'Pilav', 300, 'öğle'),
(13, 'mercimek çorbası', 100, 'öğle'),
(14, 'ezogelin çorbası', 100, 'öğle');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`);

--
-- Tablo için indeksler `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Tablo için indeksler `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Tablo için indeksler `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Tablo için indeksler `kaloritable`
--
ALTER TABLE `kaloritable`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Tablo için indeksler `ogun`
--
ALTER TABLE `ogun`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `sports`
--
ALTER TABLE `sports`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- Tablo için indeksler `yemekler`
--
ALTER TABLE `yemekler`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `kaloritable`
--
ALTER TABLE `kaloritable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- Tablo için AUTO_INCREMENT değeri `ogun`
--
ALTER TABLE `ogun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Tablo için AUTO_INCREMENT değeri `sports`
--
ALTER TABLE `sports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Tablo için AUTO_INCREMENT değeri `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Tablo için AUTO_INCREMENT değeri `yemekler`
--
ALTER TABLE `yemekler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;
');
    }

    public function down()
    {
        echo "m160524_225455_kalorimetre cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}

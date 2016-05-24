<?php

use yii\db\Migration;

class m160524_171019_kaloritable_table extends Migration
{
    public function up()
    {
       $this->execute('CREATE TABLE IF NOT EXISTS `kaloritable` (
  `id` int(11) NOT NULL,
  `userid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `YemekName` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `meal` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `Tarih` date DEFAULT NULL,
  `kalori` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `kaloritable`
--
ALTER TABLE `kaloritable`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `kaloritable`
--
ALTER TABLE `kaloritable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;');
    }

    public function down()
    {
        echo "m160524_171019_kaloritable_table cannot be reverted.\n";

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

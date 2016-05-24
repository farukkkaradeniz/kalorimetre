<?php

use yii\db\Migration;

class m160524_172450_ogun_table extends Migration
{
    public function up()
    {
$this->execute('CREATE TABLE IF NOT EXISTS `ogun` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `ogun`
--
ALTER TABLE `ogun`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `ogun`
--
ALTER TABLE `ogun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;');
    }

    public function down()
    {
        echo "m160524_172450_ogun_table cannot be reverted.\n";

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

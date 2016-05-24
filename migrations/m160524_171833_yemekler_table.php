<?php

use yii\db\Migration;

class m160524_171833_yemekler_table extends Migration
{
    public function up()
    {
        $this->execute('CREATE TABLE IF NOT EXISTS `yemekler` (
  `id` int(11) NOT NULL,
  `yemekName` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `kalori` int(11) NOT NULL,
  `ogunid` varchar(15) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `yemekler`
--
ALTER TABLE `yemekler`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `yemekler`
--
ALTER TABLE `yemekler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;');
    }

    public function down()
    {
        echo "m160524_171833_yemekler_table cannot be reverted.\n";

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

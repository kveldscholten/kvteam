<?php
/**
 * @copyright Kevin Veldscholten
 * @package ilch
 */

namespace Modules\Kvteam\Config;

class Config extends \Ilch\Config\Install
{
    public $config = [
        'key' => 'kvteam',
        'version' => '1.0',
        'icon_small' => 'fa-users',
        'author' => 'Veldscholten, Kevin',
        'languages' => [
            'de_DE' => [
                'name' => 'Team',
                'description' => 'Mit diesem Module kannst du deine Team Seite erstellen und bearbeiten.',
            ],
            'en_EN' => [
                'name' => 'Team',
                'description' => 'With this module you can add and change your team site.',
            ],
        ],
        'ilchCore' => '2.0.0',
        'phpVersion' => '5.6'
    ];

    public function install()
    {
        $this->db()->queryMulti($this->getInstallSql());
    }

    public function uninstall()
    {
        $this->db()->queryMulti('DROP TABLE `[prefix]_kvteam`');
    }

    public function getInstallSql()
    {
        return 'CREATE TABLE IF NOT EXISTS `[prefix]_kvteam` (
                `id` INT(11) NOT NULL AUTO_INCREMENT,
                `title` VARCHAR(255) NOT NULL,
                `userIds` VARCHAR(255) NOT NULL,
                `position` INT(11) NOT NULL DEFAULT 0,
                PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1';
    }

    public function getUpdate($installedVersion)
    {
        
    }
}

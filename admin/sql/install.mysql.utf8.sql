CREATE TABLE IF NOT EXISTS `#__frecuenciarespiratoria` (
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `resultado` varchar(255) NOT NULL DEFAULT '',
    `nombrepropietario` varchar(255) NOT NULL DEFAULT '',
    `nombrepaciente` varchar(255) NOT NULL DEFAULT '',
    `estado` tinyint(1) NOT NULL default '0',
    `fecha_creacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
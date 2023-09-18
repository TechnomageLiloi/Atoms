CREATE TABLE `atoms_maps` (
    `key_map` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
    `title` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
    `program` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
    `status` tinyint(3) unsigned NOT NULL DEFAULT '1',
    `type` tinyint(3) unsigned NOT NULL DEFAULT '1',
    PRIMARY KEY (`key_map`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `atoms_repositories` (
    `key_atom` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `key_map` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
    `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
    `summary` text COLLATE utf8mb4_unicode_ci NOT NULL,
    `global` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
    `local` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
    `status` tinyint(3) unsigned NOT NULL DEFAULT '1',
    PRIMARY KEY (`key_atom`),
    KEY `atoms_repositories_rune_maps_key_map_fk` (`key_map`),
    CONSTRAINT `atoms_repositories_rune_maps_key_map_fk` FOREIGN KEY (`key_map`) REFERENCES `atoms_maps` (`key_map`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=131 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
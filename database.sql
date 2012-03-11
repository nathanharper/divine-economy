DROP TABLE IF EXISTS `artists`;
CREATE TABLE `artists` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(255) NOT NULL DEFAULT '',
  `photo` VARCHAR(255) NOT NULL DEFAULT '',
  `description` text NOT NULL DEFAULT '', 
  `created_at` bigint NOT NULL default 0,
  `updated_at` bigint NOT NULL default 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `releases`;
CREATE TABLE `releases` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(255) NOT NULL DEFAULT '',
  `artwork` VARCHAR(255) NOT NULL DEFAULT '', 
  `description` text NOT NULL DEFAULT '', 
  `created_at` bigint NOT NULL default 0,
  `updated_at` bigint NOT NULL default 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `tracks`;
CREATE TABLE `tracks` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(255) NOT NULL DEFAULT '',
  `track_num` bigint not null default 0,
  `filename` VARCHAR(255) NOT NULL DEFAULT '',
  `description` text NOT NULL DEFAULT '',
  `release_id` bigint not null default 0,
  `created_at` bigint NOT NULL default 0,
  `updated_at` bigint NOT NULL default 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `artists_releases`;
CREATE TABLE `artists_releases` (
  `artist_id` bigint not null,
  `release_id` bigint not null	
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint unsigned not null AUTO_INCREMENT PRIMARY KEY,
  `username` VARCHAR(255) NOT NULL DEFAULT '',
  `crypt` VARCHAR(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;*/

DROP TABLE IF EXISTS `simpleusers`;
CREATE TABLE `simpleusers` (
    `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
    `username` VARCHAR( 50 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
    `password` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
    `group` INT NOT NULL DEFAULT 1 ,
    `email` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
    `last_login` VARCHAR( 25 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
    `login_hash` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
    `profile_fields` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
    UNIQUE (`username`,`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `audiofiles`;
CREATE TABLE `audiofiles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `filename` VARCHAR(255) NOT NULL DEFAULT '',
  `created_at` bigint NOT NULL default 0,
  `updated_at` bigint NOT NULL default 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

alter table `artists` modify `name` varchar(255) default null;
alter table `artists` modify `description` text default null;
alter table `artists` modify `photo` varchar(255) default null;
alter table `releases` modify `name` varchar(255) default null;
alter table `releases` modify `description` text default null;
alter table `releases` modify `artwork` varchar(255) default null;

alter table `tracks` modify `name` varchar(255) default null;
alter table `tracks` modify `description` text default null;
alter table `tracks` modify `track_num` varchar(32) default null;
alter table `tracks` modify `filename` varchar(255) default null;

alter table `tracks` drop column `filename`;
alter table `tracks` add column `audiofile_id` bigint;

alter table `tracks` modify `audiofile_id` bigint not null default 0;

alter table `artists` add column `audio` varchar(255) default null;
alter table `releases` add column `audio` varchar(255) default null;

DROP TABLE IF EXISTS `blogposts`;
CREATE TABLE `blogposts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `filename` VARCHAR(255) NOT NULL DEFAULT '',
  `date` bigint DEFAULT NULL,
  `title` varchar(255) default null,
  `body` text default null,
  `image` varchar(255) default null,
  `audio` varchar(255) default null,
  `created_at` bigint NOT NULL default 0,
  `updated_at` bigint NOT NULL default 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `gigs`;
CREATE TABLE `gigs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `date` bigint default null,
  `venue` VARCHAR(255) default null,
  `body` text default null,
  `created_at` bigint NOT NULL default 0,
  `updated_at` bigint NOT NULL default 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `artists_gigs`;
CREATE TABLE `artists_gigs` (
  `artist_id` bigint not null,
  `gig_id` bigint not null	
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- new stuff

DROP TABLE IF EXISTS `transactions`;
CREATE TABLE `transactions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `first` VARCHAR(32) default null,
  `last` VARCHAR(32) default null,
  `street` text default null,
--  `address2` text default null,
  `zip` TINYINT DEFAULT NULL,
  `state` CHAR(2) DEFAULT NULL,
  `order_sent` TINYINT NOT NULL DEFAULT 0,
  `created_at` bigint NOT NULL default 0,
  `updated_at` bigint NOT NULL default 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `transactions` ADD COLUMN `city` VARCHAR(32) DEFAULT NULL;

DROP TABLE IF EXISTS `releases_transactions`;
CREATE TABLE `releases_transactions` (
  `release_id` bigint not null,
  `transaction_id` bigint not null	
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `releases` ADD COLUMN `price` DECIMAL(5,2) UNSIGNED NOT NULL DEFAULT 0.00;
ALTER TABLE `transactions` ADD COLUMN `amount` DECIMAL(5,2) UNSIGNED NOT NULL DEFAULT 0.00;
ALTER TABLE `transactions` ADD COLUMN `transaction_id` VARCHAR(128) DEFAULT NULL;
ALTER TABLE `releases_transactions` ADD COLUMN `quantity` TINYINT UNSIGNED NOT NULL DEFAULT 0;

-- New Shit
alter table `releases` add column `catalogue_id` varchar(128) default null;
CREATE TABLE `{plans}` (
  `id`          INT(10) UNSIGNED                 NOT NULL AUTO_INCREMENT,
  `title`       VARCHAR(255)                     NOT NULL DEFAULT '',
  `status`      TINYINT(1) UNSIGNED              NOT NULL DEFAULT '0',
  `time_create` INT(10) UNSIGNED                 NOT NULL DEFAULT '0',
  `time_update` INT(10) UNSIGNED                 NOT NULL DEFAULT '0',
  `time_period` INT(10) UNSIGNED                 NOT NULL DEFAULT '0',
  `price`       DECIMAL(16, 2)                   NOT NULL DEFAULT '0.00',
  `vat`         DECIMAL(16, 2)                   NOT NULL DEFAULT '0.00',
  `type`        ENUM('manual', 'role', 'module') NOT NULL DEFAULT 'manual',
  `order`       INT(10) UNSIGNED                 NOT NULL DEFAULT '0',
  `setting`     TEXT,
  PRIMARY KEY (`id`),
  KEY `title` (`title`),
  KEY `status` (`status`),
  KEY `time_create` (`time_create`),
  KEY `order` (`order`)
);

CREATE TABLE `{category}` (
  `id`     INT(10) UNSIGNED    NOT NULL AUTO_INCREMENT,
  `title`  VARCHAR(255)        NOT NULL DEFAULT '',
  `status` TINYINT(1) UNSIGNED NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
);

CREATE TABLE `{order}` (
  `id`         INT(10) UNSIGNED    NOT NULL AUTO_INCREMENT,
  `uid`        INT(10) UNSIGNED    NOT NULL DEFAULT '0',
  `plan`       INT(10) UNSIGNED    NOT NULL DEFAULT '0',
  `price`      DECIMAL(16, 2)      NOT NULL DEFAULT '0.00',
  `vat`        DECIMAL(16, 2)      NOT NULL DEFAULT '0.00',
  `time_order` INT(10) UNSIGNED    NOT NULL DEFAULT '0',
  `time_start` INT(10) UNSIGNED    NOT NULL DEFAULT '0',
  `time_end`   INT(10) UNSIGNED    NOT NULL DEFAULT '0',
  `status`     TINYINT(1) UNSIGNED NOT NULL DEFAULT '0',
  `extra`      TEXT,
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`),
  KEY `plan` (`plan`),
  KEY `time_order` (`time_order`),
  KEY `time_start` (`time_start`),
  KEY `time_end` (`time_end`),
  KEY `status` (`status`)
);
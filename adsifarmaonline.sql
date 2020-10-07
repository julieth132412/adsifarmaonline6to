USE adsifarmaonline;
--
-- Table structure for table 'users'
--

CREATE TABLE 'usuarios'(
    'id' int(10) NOT NULL AUTO_INCREMENT,
    'fullname' VARCHAR(20)  CHARACTER utf8 COLLATE utf8_unicode_ci NOT NULL,
    'username' VARCHAR(20) not null,
    'password' VARCHAR(20) not null,
    'secretpin' int(10) NOT NULL,
    'created' DATETIME NOT NULL
    PRIMARY KEY ('id')
);
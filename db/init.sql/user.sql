CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(120) DEFAULT NULL,
  `password` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

insert into user (id, firstname, lastname, username, email, password) values (1, 'Admin', 'Immo', 'admin', 'admin@toitoimontoit.com', 'edbd1887e772e13c251f688a5f10c1ffbb67960d');
insert into user (id, firstname, lastname, username, email, password) values (2, 'John', 'Doe', 'guest', 'guest@toitoimontoit.com', '35675e68f4b5af7b995d9205ad0fc43842f16450');
insert into user (id, firstname, lastname, username, email, password) values (3, 'Michek', 'Dupont', 'mdupont', 'm.dupont@boutik.com', '568ee82b585919c249e4ed15d250124f2d1216ec');
insert into user (id, firstname, lastname, username, email, password) values (4, 'Molly', 'Lourens', 'mlourens', 'mlourens3@nih.gov', '568ee82b585919c249e4ed15d250124f2d1216ec');
insert into user (id, firstname, lastname, username, email, password) values (5, 'Jeanine', 'Carpmile', 'jcarpmile', 'jcarpmile4@github.io', '568ee82b585919c249e4ed15d250124f2d1216ec');
insert into user (id, firstname, lastname, username, email, password) values (6, 'Ekaterina', 'Penhearow', 'epenhearow5', 'epenhearow5@dropbox.com', '568ee82b585919c249e4ed15d250124f2d1216ec');
insert into user (id, firstname, lastname, username, email, password) values (7, 'Wini', 'Gonnelly', 'wgonnelly6', 'wgonnelly6@ning.com', '568ee82b585919c249e4ed15d250124f2d1216ec');
insert into user (id, firstname, lastname, username, email, password) values (8, 'Kimble', 'Alpe', 'kalpe', 'kalpe7@ezinearticles.com', '568ee82b585919c249e4ed15d250124f2d1216ec');
insert into user (id, firstname, lastname, username, email, password) values (9, 'Vonnie', 'Coward', 'vcoward', 'vcoward8@fc2.com', '568ee82b585919c249e4ed15d250124f2d1216ec');

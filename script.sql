DROP TABLE  IF EXISTS panier,commande, produit, user, typeProduit, etat;


CREATE TABLE IF NOT EXISTS typeProduit (
  id_type int(10) NOT NULL,
  libelle varchar(50) DEFAULT NULL,
  PRIMARY KEY (id_type)
)  DEFAULT CHARSET=utf8;

INSERT INTO `typeproduit` (`id_type`, `libelle`) VALUES
(1, 'boy'),
(2, 'girl'),
(3, 'illustration');



CREATE TABLE IF NOT EXISTS etat (
  id_etat int(11) NOT NULL AUTO_INCREMENT,
  libelle varchar(20) NOT NULL,
  PRIMARY KEY (id_etat)
) DEFAULT CHARSET=utf8 ;

INSERT INTO `etat` (`id_etat`, `libelle`) VALUES
(1, 'En préparation'),
(2, 'Expédié'),
(3, 'A traiter');



CREATE TABLE IF NOT EXISTS produit (
  id int(10) NOT NULL AUTO_INCREMENT,
  id_type int(10) DEFAULT NULL,
  nom varchar(50) DEFAULT NULL,
  prix float(3,2) DEFAULT NULL,
  photo varchar(50) DEFAULT NULL,
  dispo tinyint(4) NOT NULL,
  stock int(11) NOT NULL,
  PRIMARY KEY (id),
  KEY id_type (id_type),
  CONSTRAINT produit_fk_1 FOREIGN KEY (id_type) REFERENCES typeProduit (id_type)
) DEFAULT CHARSET=utf8 ;

INSERT INTO `produit` (`id`, `id_type`, `nom`, `prix`, `photo`, `dispo`, `stock`) VALUES
(2, 1, 'Kaito Kid', 5.50, 'kaito.jpg', 1, 10),
(3, 2, 'Purple', 8.50, 'purple.jpg', 1, 10),
(4, 1, 'Kano', 5.00, 'kano.jpg', 1, 4),
(6, 2, 'Lutty', 7.30, 'lutty.jpg', 1, 5),
(7, 1, 'Paindore', 6.00, 'rimbaud.jpg', 1, 3),
(8, 3, 'SoraMafu', 9.40, 'soramafu.jpg', 1, 10),
(9, 1, 'Ikasan', 7.00, 'ikasan.jpg', 1, 10),
(10, 2, 'Chibi', 3.00, 'hallow.jpg', 1, 11);


CREATE TABLE IF NOT EXISTS user (
  id_user int(11) NOT NULL AUTO_INCREMENT,
  email varchar(255) NOT NULL,
  password varchar(255) NOT NULL,
  login varchar(255) NOT NULL,
  nom varchar(255) NOT NULL,
  code_postal varchar(255) NOT NULL,
  ville varchar(255) NOT NULL,
  adresse varchar(255) NOT NULL,
  valide tinyint NOT NULL,
  droit tinyint NOT NULL,
  PRIMARY KEY (id_user)
) DEFAULT CHARSET=utf8;

# Contenu de la table user
INSERT INTO user (id_user,login,password,email,valide,droit) VALUES
(1, 'admin', 'admin', 'admin@gmail.com',1,2),
(2, 'vendeur', 'vendeur', 'vendeur@gmail.com',1,2),
(3, 'client', 'client', 'client@gmail.com',1,1),
(4, 'client2', 'client2', 'client2@gmail.com',1,1),
(5, 'client3', 'client3', 'client3@gmail.com',1,1);




CREATE TABLE IF NOT EXISTS commande (
  id_commande int(11) NOT NULL AUTO_INCREMENT,
  id_user int(11) NOT NULL,
  id_lieu int(11) NOT NULL,
  prix float(5,2) NOT NULL,
  date_achat date NOT NULL,
  id_etat int(11) NOT NULL,
  PRIMARY KEY (id_commande),
  KEY id_user (id_user),
  KEY id_lieu (id_lieu),
  KEY id_etat (id_etat)
) DEFAULT CHARSET=utf8 ;




CREATE TABLE IF NOT EXISTS panier (
  id_panier int(11) NOT NULL AUTO_INCREMENT,
  id_user int(11) NOT NULL,
  id_produit int(11) NOT NULL,
  quantite int(11) NOT NULL,
  prix float(5,2) NOT NULL,
  id_commande int(1) NOT NULL,
  dateAjoutPanier datetime NOT NULL,
  PRIMARY KEY (id_panier),
  KEY id_user (id_user),
  KEY id_produit (id_produit)
) DEFAULT CHARSET=utf8 ;



ALTER TABLE commande
  ADD CONSTRAINT commande_fk_1 FOREIGN KEY (id_user) REFERENCES user (id_user),
  ADD CONSTRAINT commande_fk_2 FOREIGN KEY (id_etat) REFERENCES etat (id_etat);


ALTER TABLE panier
  ADD CONSTRAINT panier_fk_1 FOREIGN KEY (id_user) REFERENCES user (id_user),
  ADD CONSTRAINT panier_fk_2 FOREIGN KEY (id_produit) REFERENCES produit (id),
  ADD CONSTRAINT panier_fk_3 FOREIGN KEY (id_commande) REFERENCES commande (id_commande);




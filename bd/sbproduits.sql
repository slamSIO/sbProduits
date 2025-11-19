drop database if exists sbproduits ;
create database sbproduits ;

use sbproduits ;

create table client (

	id int auto_increment not null ,
	nom varchar(100) not null ,
	prenom varchar(100) not null ,
	mdp varchar(100) not null ,
	email varchar( 100 ) not null ,
	primary key(id)
) ;


create table produit (

	id int auto_increment not null ,
	libelle varchar(20) not null ,
	primary key( id )
) ;

create table avis (

	id int auto_increment not null ,
	commentaire varchar( 200 ) ,
	idClient int not null ,
	idProduit int not null ,
	horodatage  timestamp default CURRENT_TIMESTAMP ,
	primary key( id ) ,
	foreign key( idClient ) references client( id ) ,
	foreign key( idProduit ) references produit( id )
) ;


insert into client values
( NULL , 'ONESTAS' , 'Valentine' , 'azerty' , 'valentine.onestas@gmail.com') ,
( NULL , 'HAFIDI' , 'Nadiya' , 'azerty' , 'n.hafidi@gmail.com') ,
( NULL , 'OSARO' , 'Clémence' , 'azerty' , 'c.osaro@orange.fr' ) ,
( NULL , 'JADOUX' , 'Lucie' , 'azerty' , 'lucie.jadoux@gmail.com' ) ,
( NULL , 'KANNY' , 'Pauline' , 'azerty' , 'p.kanny@gmail.com' ) ,
( NULL , 'KARA' , 'Juliette' , 'azerty' , 'juliette.kara@gmail.com' ) ,
( NULL , 'LAURY' , 'Sophie' , 'azerty' , 'sophie.laury@gmail.com' ) , 
( NULL , 'BELLIL' , 'Rim' , 'azerty' , 'rim.bellil@gmail.com' ) ;

insert into produit values
( NULL , "dentifrice banane" ) ,
( NULL , "dentifrice pomme" ) ,
( NULL , "savon jasmin" ) ;

insert into avis( commentaire , idClient , idProduit ) values
( 'Un goût bizarre' , 8 , 1 ) ,
( 'Très bon produit' , 7 , 1 ) ,
( 'Satisfaite de ce savon' , 2 , 3) ,
( 'Bof' , 8 , 3 ) ;


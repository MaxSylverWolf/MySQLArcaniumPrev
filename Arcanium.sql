drop database if exists Arcanium;
create database Arcanium default character set utf8 default collate utf8_general_ci;
use Arcanium;

CREATE TABLE CHARACTERS(
id_char INT PRIMARY KEY AUTO_INCREMENT,
id_mount INT,
id_eq INT UNIQUE NOT NULL,
id_area INT,
id_class INT,
id_guild INT,
id_pet INT,
exp INT,
lvl INT,
charname VARCHAR(40),
attack INT,
defence INT,
inte INT,
health INT,
mana INT,
stamina INT,
gold INT);

CREATE TABLE USERLOGIN(
id INT PRIMARY KEY AUTO_INCREMENT,
id_char INT,
username VARCHAR(40),
pass VARCHAR(40),
email VARCHAR(40),
birth DATE);

ALTER TABLE USERLOGIN ADD FOREIGN KEY chars(id_char) REFERENCES CHARACTERS(id_char) ON DELETE CASCADE;

CREATE TABLE MOUNTS(
id_mount INT PRIMARY KEY AUTO_INCREMENT,
mountname VARCHAR(40),
id_skill INT,
mountdefence INT,
mountattack INT
);

ALTER TABLE CHARACTERS ADD FOREIGN KEY charmount(id_mount) REFERENCES MOUNTS(id_mount);

CREATE TABLE PETS(
id_pet INT PRIMARY KEY AUTO_INCREMENT,
petname VARCHAR(40),
id_skill INT,
petdefence INT,
petattack INT
);

ALTER TABLE CHARACTERS ADD FOREIGN KEY charpet(id_pet) REFERENCES PETS(id_pet);

CREATE TABLE EQ(
id_eq INT PRIMARY KEY AUTO_INCREMENT,
id_char INT,
id_weapon INT,
id_armor INT,
id_helmet INT,
id_pants INT,
id_gloves INT,
id_shoes INT,
id_shield INT,
id_necklace INT,
id_ring INT,
id_wings INT,
id_cloak INT,
id_else INT);

ALTER TABLE CHARACTERS ADD FOREIGN KEY chareq(id_eq) REFERENCES EQ(id_eq) ON DELETE CASCADE;

CREATE TABLE ITEMS(
id_item INT PRIMARY KEY AUTO_INCREMENT,
itemname VARCHAR(50),
about VARCHAR(150),
id_type INT,
id_attr INT,
price INT
);

ALTER TABLE EQ ADD FOREIGN KEY weapon(id_weapon) REFERENCES ITEMS(id_item);
ALTER TABLE EQ ADD FOREIGN KEY armor(id_armor) REFERENCES ITEMS(id_item);
ALTER TABLE EQ ADD FOREIGN KEY helmet(id_helmet) REFERENCES ITEMS(id_item);
ALTER TABLE EQ ADD FOREIGN KEY pants(id_pants) REFERENCES ITEMS(id_item);
ALTER TABLE EQ ADD FOREIGN KEY gloves(id_gloves) REFERENCES ITEMS(id_item);
ALTER TABLE EQ ADD FOREIGN KEY shoes(id_shoes) REFERENCES ITEMS(id_item);
ALTER TABLE EQ ADD FOREIGN KEY shield(id_shield) REFERENCES ITEMS(id_item);
ALTER TABLE EQ ADD FOREIGN KEY necklace(id_necklace) REFERENCES ITEMS(id_item);
ALTER TABLE EQ ADD FOREIGN KEY ring(id_ring) REFERENCES ITEMS(id_item);
ALTER TABLE EQ ADD FOREIGN KEY wings(id_wings) REFERENCES ITEMS(id_item);
ALTER TABLE EQ ADD FOREIGN KEY cloak(id_cloak) REFERENCES ITEMS(id_item);
ALTER TABLE EQ ADD FOREIGN KEY sthelse(id_else) REFERENCES ITEMS(id_item);

CREATE TABLE TYPEITEM(
id_type INT PRIMARY KEY AUTO_INCREMENT,
itemname VARCHAR(50)
);

ALTER TABLE ITEMS ADD FOREIGN KEY itemtype(id_type) REFERENCES TYPEITEM(id_type);

CREATE TABLE CHARITEM(
id_char INT,
id_item INT
);

ALTER TABLE CHARITEM ADD FOREIGN KEY itemchar(id_char) REFERENCES CHARACTERS(id_char);
ALTER TABLE CHARITEM ADD FOREIGN KEY charequip(id_item) REFERENCES ITEMS(id_item);

CREATE TABLE AREAFIELD(
id_area INT PRIMARY KEY AUTO_INCREMENT,
namearea VARCHAR(50),
aboutarea VARCHAR(150),
entrancelvl INT
);

ALTER TABLE CHARACTERS ADD FOREIGN KEY chararea(id_area) REFERENCES AREAFIELD(id_area);

CREATE TABLE CLASS(
id_class INT PRIMARY KEY AUTO_INCREMENT,
nameclass VARCHAR(30),
about VARCHAR(150),
id_attr INT,
id_skill1 INT,
id_skill2 INT,
id_skill3 INT,
id_skill4 INT
);

ALTER TABLE CHARACTERS ADD FOREIGN KEY charclasses(id_class) REFERENCES CLASS(id_class);

CREATE TABLE SKILLS(
id_skill INT PRIMARY KEY AUTO_INCREMENT,
skill VARCHAR(30),
skill_attack INT,
skill_buff INT
);

ALTER TABLE CLASS ADD FOREIGN KEY skill1(id_skill1) REFERENCES SKILLS(id_skill);
ALTER TABLE CLASS ADD FOREIGN KEY skill2(id_skill2) REFERENCES SKILLS(id_skill);
ALTER TABLE CLASS ADD FOREIGN KEY skill3(id_skill3) REFERENCES SKILLS(id_skill);
ALTER TABLE CLASS ADD FOREIGN KEY skill4(id_skill4) REFERENCES SKILLS(id_skill);

ALTER TABLE MOUNTS ADD FOREIGN KEY skillmount(id_skill) REFERENCES SKILLS(id_skill);
ALTER TABLE PETS ADD FOREIGN KEY skillpet(id_skill) REFERENCES SKILLS(id_skill);

CREATE TABLE GUILDS(
id_guild INT PRIMARY KEY AUTO_INCREMENT,
lvl INT,
nameguild VARCHAR(50),
aboutguild VARCHAR(150),
entrancelvl INT);

ALTER TABLE CHARACTERS ADD FOREIGN KEY charguild(id_guild) REFERENCES GUILDS(id_guild);

CREATE TABLE LEVELEXP(
lvl INT PRIMARY KEY AUTO_INCREMENT,
exp INT
);

ALTER TABLE CHARACTERS ADD FOREIGN KEY levelexp(lvl) REFERENCES LEVELEXP(lvl);

CREATE TABLE LEVELEXPGUILD(
lvl INT PRIMARY KEY AUTO_INCREMENT,
exp INT
);

ALTER TABLE GUILDS ADD FOREIGN KEY levelguild(lvl) REFERENCES LEVELEXPGUILD(lvl);

CREATE TABLE ATTRIBUTES(
id_attr INT PRIMARY KEY AUTO_INCREMENT,
attr_name VARCHAR(40),
attr_value INT
);

ALTER TABLE CLASS ADD FOREIGN KEY attrclass(id_attr) REFERENCES ATTRIBUTES(id_attr);
ALTER TABLE ITEMS ADD FOREIGN KEY attritems(id_attr) REFERENCES ATTRIBUTES(id_attr);

CREATE TABLE ENEMY(
id_enemy INT PRIMARY KEY AUTO_INCREMENT,
enemyname VARCHAR(40),
lvl INT,
attack INT,
defence INT,
health INT,
mana INT,
id_lot INT,
id_area INT,
exp INT,
gold INT,
about VARCHAR(150)
);

ALTER TABLE ENEMY ADD FOREIGN KEY enemyarea(id_area) REFERENCES AREAFIELD(id_area);

CREATE TABLE NPC(
id_npc INT PRIMARY KEY AUTO_INCREMENT,
npcname VARCHAR(45),
gold INT,
aboutnpc VARCHAR(50),
id_area INT
);

ALTER TABLE NPC ADD FOREIGN KEY npcarea(id_area) REFERENCES AREAFIELD(id_area);

CREATE TABLE NPCITEMS(
id INT PRIMARY KEY AUTO_INCREMENT,
id_npc INT,
id_item INT
);

ALTER TABLE NPCITEMS ADD FOREIGN KEY itemnpc(id_npc) REFERENCES NPC(id_npc);
ALTER TABLE NPCITEMS ADD FOREIGN KEY npcitem(id_item) REFERENCES ITEMS(id_item);

CREATE TABLE QUESTS(
id_quest INT PRIMARY KEY AUTO_INCREMENT,
aboutquest VARCHAR(150),
lvlquest INT,
id_lot INT,
id_area INT
);

ALTER TABLE QUESTS ADD FOREIGN KEY questqrea(id_area) REFERENCES AREAFIELD(id_area);
ALTER TABLE QUESTS ADD FOREIGN KEY lotquest(id_lot) REFERENCES ITEMS(id_item);

CREATE TABLE QUESTENEMY(
id INT PRIMARY KEY AUTO_INCREMENT,
id_quest INT,
id_enemy INT,
gold INT);

ALTER TABLE QUESTENEMY ADD FOREIGN KEY questquest(id_quest) REFERENCES QUESTS(id_quest);
ALTER TABLE QUESTENEMY ADD FOREIGN KEY questenemy(id_enemy) REFERENCES ENEMY(id_enemy);

CREATE TABLE QUESTCHARACTERS(
id INT PRIMARY KEY AUTO_INCREMENT,
id_quest INT,
id_char INT,
progress VARCHAR(35));

ALTER TABLE QUESTCHARACTERS ADD FOREIGN KEY questchar(id_quest) REFERENCES QUESTS(id_quest);
ALTER TABLE QUESTCHARACTERS ADD FOREIGN KEY questcharacter(id_char) REFERENCES CHARACTERS(id_char);

CREATE TABLE BATTLE(
id INT PRIMARY KEY AUTO_INCREMENT,
id_char INT,
id_enemy INT,
isWin boolean,
id_item INT);

ALTER TABLE BATTLE ADD FOREIGN KEY battlechar(id_char) REFERENCES CHARACTERS(id_char);
ALTER TABLE BATTLE ADD FOREIGN KEY battlenemy(id_enemy) REFERENCES ENEMY(id_enemy);
ALTER TABLE BATTLE ADD FOREIGN KEY battleitem(id_item) REFERENCES ITEMS(id_item);

INSERT INTO AREAFIELD VALUES
(1,'Sandstorm Dessert','Dont get in! Its so hard to stay alive!',1),
(2,'Corndayle Village','New Heroes please join to the battles.',2),
(3,'Ninja Fortress','Shh...dont say a word!',3);

INSERT INTO ATTRIBUTES VALUES
(1,'+150 Attack',150),
(2,'+200 Defence',200),
(3,'+100 Attack',100),
(4,'+400 Silence',400),
(5,'+500 Attack',500),
(6,'+200 Agillity',200),
(7,'+300 Defence',200),
(8,'+150 Critical Strike',150),
(9,'+200 Stats',200),
(10,'+150 Speed Casting',150),
(11,'+150 AOE AREA',150),
(12,'+250 Health',250),
(13,'+200 Mana',200);

INSERT INTO SKILLS VALUES
(1,'Fire Strike',200,400),
(2,'Kick Time',100,1000),
(3,'Blaze Water',300,100),
(4,'Air Damage',500,50),
(5,'Sky Sharp',100,100),
(6,'Growl',50,1000),
(7,'Primal Fury',400,50),
(8,'Sword Cyclone',200,30),
(9,'Mark of the Justice',100,400),
(10,'Moonfire',500,10),
(11,'Charizard Summon',1,2000),
(12,'Wolf form',1,3000),
(13,'Rebirth',100,1000),
(14,'Stampeding Roar',2000,10),
(15,'Piercing Shot',300,10),
(16,'Phoenix AOE',2000,10),
(17,'Magic Arrow',1000,50),
(18,'Chain Action',500,400);

INSERT INTO MOUNTS VALUES
(1,'Gold Lion',1,500,100),
(2,'Black Caninoid',2,200,150),
(3,'Reactor Raptor',3,100,300);

INSERT INTO PETS VALUES
(1,'Little Corcky',4,200,100),
(2,'Advanced Morphy',5,100,200),
(3,'Master Yoshi',6,300,300);

INSERT INTO TYPEITEM VALUES
(1,'Weapon'),
(2,'Armor'),
(3,'Helmet'),
(4,'Pants'),
(5,'Gloves'),
(6,'Shoes'),
(7,'Shield'),
(8,'Necklace'),
(9,'Ring'),
(10,'Wings'),
(11,'Cloak'),
(12,'Consumables');

INSERT INTO ITEMS VALUES
(1,'Sword of Dancer','The fastest in the history, the best in the attack!',1,1,50),
(2,'Armor of God','Did you ever feel the power of God? Its your choice!',2,2,10),
(3,'Helmet of Disaster','The world in your hands, try it out',3,3,20),
(4,'Miracle Pants','Silence... nobody see you...',4,4,15),
(5,'Sage Gloves','Sage Mode - nature of power!',5,5,19),
(6,'Speedster Shoes','Gepard in your skin! Be fast!',6,6,20),
(7,'Shield of Majesty','Push your enemies back to their Caves!',7,7,5),
(8,'Crying Necklace','Cry your power out! Critical Strike back!',8,8,100),
(9,'Ring of Unlimited','Unlimit your stats. Be the best!',9,9,50),
(10,'Wings of Future','Speed up your skills!',10,10,40),
(11,'Cloak of Beasts','Beast spirit in your mind.',11,11,10),
(12,'Health Potion','Health increase +250',12,12,10),
(13,'Mana Potion','Mana increase +200',12,13,10);


INSERT INTO CLASS VALUES
(1,'Warrior','Glory and power will let you destroy all enemies',1,7,8,9,10),
(2,'Summoner','Summon your beasts to stand at your side.',2,11,12,13,14),
(3,'Archer','AOE Skills and fight with bunch of monsters! Thats called life!',3,15,16,17,18);

INSERT INTO LEVELEXP VALUES
(1,100),(2,200),(3,300),(4,400),(5,500),(6,600),(7,700),(8,800),(9,900),(10,1000);

INSERT INTO LEVELEXPGUILD VALUES
(1,100),(2,200),(3,300),(4,400),(5,500),(6,600),(7,700),(8,800),(9,900),(10,1000);

INSERT INTO GUILDS VALUES
(1,1,'Arcanium','The best guild!',1),
(2,2,'Ravens','ACTION',1),
(3,3,'Windstopper','Full of speed!',1);

INSERT INTO EQ VALUES
(1,1,1,2,3,4,5,6,7,8,9,10,11,12),
(2,2,1,2,3,4,5,6,7,8,9,10,11,13),
(3,3,1,2,3,4,5,6,7,8,9,10,11,12);

INSERT INTO CHARACTERS VALUES
(1,1,1,1,1,1,1,200,5,'SylverWolf',49,28,19,300,200,1000,450),
(2,2,2,2,2,2,2,300,7,'Arcanine',29,45,20,200,400,900,900),
(3,3,3,3,3,3,3,100,3,'Naruto',51,10,15,100,300,450,200);

INSERT INTO USERLOGIN VALUES
(1,1,'sylverwolf','rasengan','sylverwolf@email.com','2000-10-10'),
(2,2,'admin','admin','admin@email.com','2000-11-11'),
(3,3,'naruto','rasengan','naruto@email.com','2000-12-12');

INSERT INTO CHARITEM VALUES
(1,1),(1,2),(1,3),(1,4),(1,5),(1,6),(1,7),(1,8),(1,9),(1,10),(1,11),(1,12),
(2,1),(2,2),(2,3),(2,4),(2,5),(2,6),(2,7),(2,8),(2,9),(2,10),(2,11),(2,13),
(3,1),(3,2),(3,3),(3,4),(3,5),(3,6),(3,7),(3,8),(3,9),(3,10),(3,11),(3,12);

INSERT INTO ENEMY VALUES
(1,'Riolu',5,100,20,100,100,1,1,50,50,'Riolu, the wolf in humanoid body'),
(2,'Trecko',5,100,20,100,100,2,2,50,50,'Trecko, leaf green edition');

INSERT INTO NPC VALUES
(1,'Yogi',500,'Weapon Seller',2),
(2,'Ali',500,'Armor Seller',2),
(3,'Coli',500,'Consumables Seller',2);

INSERT INTO NPCITEMS VALUES
(1,1,1),(2,1,3),(3,1,5),
(4,2,6),(5,2,7),(6,2,8),
(7,3,9),(8,3,10),(9,3,11);

INSERT INTO QUESTS VALUES
(1,'Catch 50 Riolu',1,1,1),
(2,'Catch 50 Trecko',2,2,2);

INSERT INTO QUESTENEMY VALUES
(1,1,1,500),(2,2,2,500);

INSERT INTO QUESTCHARACTERS VALUES
(1,1,1,'Dawaj dalej'),
(2,2,2,'Już prawie!');

INSERT INTO BATTLE VALUES
(1,1,1,true,3),
(2,2,2,false,4);

SELECT * FROM EQ;
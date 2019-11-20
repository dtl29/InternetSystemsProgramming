use ISP_dtl29;
create table Cards (
	name varchar(400) primary key,
    cmc varchar(50),
    cardType varchar(50),
    color varchar(5),
    legBrawl varchar(10),
    legCommander varchar(10),
    legDuel varchar(10),
    legFuture varchar(10),
    legHistoric varchar(10),
    legLegacy varchar(10),
    legModern varchar(10),
    legOlderschool varchar(10),
    legPauper varchar(10),
    legPenny varchar(10),
    legPioneet varchar(10),
    legStandard varchar(10),
    legVintage varchar(10),
    power int,
    rarity varchar(50),
    setName varchar(50),
    toughness int,
    image varchar(500)
);
create table Decks (
	name varchar(500) primary key,
	nameOfCreator varchar(500),
	primaryCard varChar(500),
	deckList varchar(6000)
);

create table DeckUsers (
	id integer primary key,
	username varchar(500),
	password varchar(500),
	email varchar(500)
);

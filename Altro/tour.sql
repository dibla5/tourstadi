CREATE TABLE cartaDiCredito(
    numCarta varchar(255) PRIMARY KEY,
    cvv varchar(3),
    dataScadenza date
);

CREATE TABLE utente(
    username varchar(255) PRIMARY KEY,
    nome varchar(255),
    cognome varchar(255),
    numTelefono varchar(10),
    psw varchar(255) 
)

CREATE TABLE ordine (
    id int PRIMARY KEY AUTO_INCREMENT,
    dataInizio date,
    cittaPartenza varchar(255),
    utente varchar(255),
    tour int,
    FOREIGN KEY(utente) REFERENCES utente(username),
    FOREIGN KEY(tour) REFERENCES tour(id)
);

CREATE TABLE tour(
    id int PRIMARY KEY AUTO_INCREMENT,
    nome varchar(255),
    costo int,
    utente varchar(255),
    FOREIGN KEY(utente) REFERENCES utente(username)
);

CREATE TABLE stadio(
    id int PRIMARY KEY AUTO_INCREMENT,
    nome varchar(255),
    citta varchar(255),
    img varchar(255)
);

CREATE TABLE squadra(
    id int PRIMARY KEY AUTO_INCREMENT,
    nome varchar(255),
    stadio int,
    FOREIGN KEY(stadio) REFERENCES stadio(id)
);

CREATE TABLE recensione(
    id int PRIMARY KEY AUTO_INCREMENT,
    voto int, /* =1 mi piace =2 non mi piace ....*/
    commento varchar(2000),
    utente varchar(255),
    stadio int,
    FOREIGN KEY (utente) REFERENCES utente(username),
    FOREIGN KEY (stadio) REFERENCES stadio(id)
);

CREATE TABLE utentePossiedeCartaCredito(
    utente varchar(255),
    cartaDiCredito varchar(255),
    FOREIGN KEY(utente) REFERENCES utente(username),
    FOREIGN KEY(cartaDiCredito) REFERENCES cartaDiCredito(numCarta),
    PRIMARY KEY(utente, cartaDiCredito)
);

CREATE TABLE recensioneHaTour(
    recensione int,
    tour int,
    FOREIGN KEY(recensione) REFERENCES recensione(id),
    FOREIGN KEY(tour) REFERENCES tour(id),
    PRIMARY KEY(tour, recensione)
);

CREATE TABLE tourHaStadio(
    tour int,
    stadio int,
    FOREIGN KEY(tour) REFERENCES tour(id),
    FOREIGN KEY(stadio) REFERENCES stadio(id),
    PRIMARY KEY(tour, stadio)
);

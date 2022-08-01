CREATE TABLE statetimezone
(
    location text NOT NULL,
    timezone text,
    PRIMARY KEY (location)
);

CREATE TABLE statelocation
(
    dominantparty text,
    statename text NOT NULL,
    location text,
    PRIMARY KEY (statename),
    FOREIGN KEY (location)
        REFERENCES statetimezone (location)
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
);

CREATE TABLE politicianrepresent
(
    polname text NOT NULL,
    dob date NOT NULL,
    party text,
    role text,
    statename text NOT NULL,
    PRIMARY KEY (polname, dob),
    FOREIGN KEY (statename)
        REFERENCES statelocation (statename)
        ON UPDATE CASCADE
        ON DELETE CASCADE
);

CREATE TABLE familymemberdetails
(
    fmname text NOT NULL,
    polname text NOT NULL,
    fm_dob date NOT NULL,
    relationship text NOT NULL,
    PRIMARY KEY (fmname, polname)
);

CREATE TABLE familymemberrelationship
(
    fmname text NOT NULL,
    polname text NOT NULL,
    poldob date NOT NULL,
    PRIMARY KEY (fmname, poldob, polname),
    FOREIGN KEY (fmname, polname)
        REFERENCES familymemberdetails (fmname, polname)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    FOREIGN KEY (polname, poldob)
        REFERENCES politicianrepresent (polname, dob)
        ON UPDATE CASCADE
        ON DELETE CASCADE
);

CREATE TABLE bill
(
    id text,
    year integer NOT NULL,
    PRIMARY KEY (id, year)
);
CREATE TABLE billprivate
(
    id text NOT NULL,
    year integer NOT NULL,
    status text,
    beneficiary text NOT NULL,
    PRIMARY KEY (id, year),
    FOREIGN KEY (id, year)
        REFERENCES bill (id, year)
        ON UPDATE CASCADE
        ON DELETE CASCADE
);
CREATE TABLE billpublic
(
    id text NOT NULL,
    year integer NOT NULL,
    status text,
    PRIMARY KEY (id, year),
    FOREIGN KEY (id, year)
        REFERENCES bill (id, year)
        ON UPDATE CASCADE
        ON DELETE CASCADE
);
CREATE TABLE billvote
(
    polname text NOT NULL,
    dob date NOT NULL,
    id text NOT NULL,
    year integer NOT NULL,
    action text,
    PRIMARY KEY (polname, dob, id, year),
    FOREIGN KEY (id, year)
        REFERENCES bill (id, year)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    FOREIGN KEY (polname, dob)
        REFERENCES politicianrepresent (polname, dob)
        ON UPDATE CASCADE
        ON DELETE CASCADE
);

CREATE TABLE company
(
    lei text NOT NULL,
    comname text NOT NULL,
    PRIMARY KEY (lei)
);

CREATE TABLE exchange
(
    exchname text NOT NULL,
    timezone text NOT NULL,
    PRIMARY KEY (exchname)
);

CREATE TABLE executiveof
(
    execname text NOT NULL,
    dob date NOT NULL,
    lei text NOT NULL,
    salary integer,
    role text,
    PRIMARY KEY (execname, dob, lei),
    FOREIGN KEY (lei)
        REFERENCES company (lei)
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
);

CREATE TABLE stock
(
    lei text UNIQUE NOT NULL,
    ticker text NOT NULL,
    PRIMARY KEY (ticker),
    FOREIGN KEY (lei)
        REFERENCES company (lei)
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
);

CREATE TABLE tradedexchange
(
    ticker text NOT NULL,
    exchname text NOT NULL,
    ipo date NOT NULL,
    PRIMARY KEY (ticker, exchname),
    FOREIGN KEY (exchname)
        REFERENCES exchange (exchname)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    FOREIGN KEY (ticker)
        REFERENCES stock (ticker)
        ON UPDATE CASCADE
        ON DELETE CASCADE
);

CREATE TABLE transaction
(
    "time" timestamp without time zone NOT NULL,
    polname text NOT NULL,
    dob date NOT NULL,
    ticker text NOT NULL,
    action text,
    valfloor double precision,
    valceil double precision,
    PRIMARY KEY (polname, dob, ticker, "time"),
    FOREIGN KEY (polname, dob)
        REFERENCES politicianrepresent (polname, dob)
        ON UPDATE NO ACTION
        ON DELETE CASCADE,
    FOREIGN KEY (ticker)
        REFERENCES stock (ticker)
        ON UPDATE NO ACTION
        ON DELETE CASCADE
);

INSERT INTO statetimezone VALUES ('Mountain','Mountain Time Zone');
INSERT INTO statetimezone VALUES ('West Coast','Pacific Time Zone');
INSERT INTO statetimezone VALUES ('Central','Central Time Zone');
INSERT INTO statetimezone VALUES ('East Coast','Eastern Time Zone');
INSERT INTO statetimezone VALUES ('Alaska','Alaskan Time Zone');
INSERT INTO statetimezone VALUES ('Hawaii','Hawaiian Time Zone');

INSERT INTO statelocation VALUES ('Democratic','Arizona','Mountain');
INSERT INTO statelocation VALUES ('Republican','Alabama','Central');
INSERT INTO statelocation VALUES ('Republican','Alaska','Alaska');
INSERT INTO statelocation VALUES ('Republican','Arkansas','Central');
INSERT INTO statelocation VALUES ('Democratic','California','West Coast');
INSERT INTO statelocation VALUES ('Democratic','Colorado','Mountain');
INSERT INTO statelocation VALUES ('Democratic','Connecticut','East Coast');
INSERT INTO statelocation VALUES ('Democratic','Delaware','East Coast');
INSERT INTO statelocation VALUES ('Republican','Florida','East Coast');
INSERT INTO statelocation VALUES ('Democratic','Georgia','East Coast');
INSERT INTO statelocation VALUES ('Democratic','Hawaii','Hawaii');
INSERT INTO statelocation VALUES ('Republican','Idaho','Mountain');
INSERT INTO statelocation VALUES ('Democratic','Illinois','Central');
INSERT INTO statelocation VALUES ('Republican','Indiana','East Coast');
INSERT INTO statelocation VALUES ('Republican','Iowa','Central');
INSERT INTO statelocation VALUES ('Republican','Kansas','Central');
INSERT INTO statelocation VALUES ('Republican','Kentucky','Central');
INSERT INTO statelocation VALUES ('Republican','Louisiana','Central');
INSERT INTO statelocation VALUES ('Democratic','Maine','East Coast');
INSERT INTO statelocation VALUES ('Democratic','Maryland','East Coast');
INSERT INTO statelocation VALUES ('Democratic','Massachusetts','East Coast');
INSERT INTO statelocation VALUES ('Democratic','Michigan','East Coast');
INSERT INTO statelocation VALUES ('Democratic','Minnesota','Central');
INSERT INTO statelocation VALUES ('Republican','Mississippi','Central');
INSERT INTO statelocation VALUES ('Republican','Missouri','Central');
INSERT INTO statelocation VALUES ('Republican','Montana','Mountain');
INSERT INTO statelocation VALUES ('Democratic','Nebraska','Central');
INSERT INTO statelocation VALUES ('Democratic','Nevada','West Coast');
INSERT INTO statelocation VALUES ('Democratic','New Hampshire','East Coast');
INSERT INTO statelocation VALUES ('Democratic','New Jersey','East Coast');
INSERT INTO statelocation VALUES ('Democratic','New Mexico','Mountain');
INSERT INTO statelocation VALUES ('Democratic','New York','East Coast');
INSERT INTO statelocation VALUES ('Republican','North Carolina','East Coast');
INSERT INTO statelocation VALUES ('Republican','North Dakota','Central');
INSERT INTO statelocation VALUES ('Republican','Ohio','East Coast');
INSERT INTO statelocation VALUES ('Republican','Oklahoma','Central');
INSERT INTO statelocation VALUES ('Democratic','Oregon','West Coast');
INSERT INTO statelocation VALUES ('Democratic','Pennsylvania','East Coast');
INSERT INTO statelocation VALUES ('Democratic','Rhode Island','East Coast');
INSERT INTO statelocation VALUES ('Republican','South Carolina','East Coast');
INSERT INTO statelocation VALUES ('Republican','South Dakota','Central');
INSERT INTO statelocation VALUES ('Republican','Tennessee','Central');
INSERT INTO statelocation VALUES ('Republican','Texas','Central');
INSERT INTO statelocation VALUES ('Republican','Utah','Mountain');
INSERT INTO statelocation VALUES ('Democratic','Vermont','East Coast');
INSERT INTO statelocation VALUES ('Democratic','Virginia','East Coast');
INSERT INTO statelocation VALUES ('Democratic','Washington','West Coast');
INSERT INTO statelocation VALUES ('Republican','West Virginia','East Coast');
INSERT INTO statelocation VALUES ('Democratic','Wisconsin','Central');
INSERT INTO statelocation VALUES ('Republican','Wyoming','Mountain');

INSERT INTO politicianrepresent VALUES ('Taylor Johnson',TO_DATE('1971-02-03','YYYY-MM-DD'),'Republican','Senate','Arkansas');
INSERT INTO politicianrepresent VALUES ('Franciska Moore',TO_DATE('1963-05-12','YYYY-MM-DD'),'Democrat','Congress','New York');
INSERT INTO politicianrepresent VALUES ('Donald Mouse',TO_DATE('1975-11-30','YYYY-MM-DD'),'Democrat','Congress','Washington');
INSERT INTO politicianrepresent VALUES ('Miles Watson',TO_DATE('1970-12-22','YYYY-MM-DD'),'Republican','Senate','Texas');

INSERT INTO familymemberdetails VALUES ('Pierre Johnson','Taylor Johnson',TO_DATE('1998-12-03','YYYY-MM-DD'),'Parent-Child');
INSERT INTO familymemberdetails VALUES ('Mary Johnson','Taylor Johnson',TO_DATE('1996-11-20','YYYY-MM-DD'),'Parent-Child');
INSERT INTO familymemberdetails VALUES ('Gina White','Donald Mouse',TO_DATE('1977-02-09','YYYY-MM-DD'),'Spouse');
INSERT INTO familymemberdetails VALUES ('Veronica Watson','Miles Watson',TO_DATE('1972-05-07','YYYY-MM-DD'),'Sibling');

INSERT INTO familymemberrelationship VALUES ('Pierre Johnson','Taylor Johnson',TO_DATE('1971-02-03','YYYY-MM-DD'));
INSERT INTO familymemberrelationship VALUES ('Mary Johnson','Taylor Johnson',TO_DATE('1971-02-03','YYYY-MM-DD'));
INSERT INTO familymemberrelationship VALUES ('Gina White','Donald Mouse',TO_DATE('1975-11-30','YYYY-MM-DD'));
INSERT INTO familymemberrelationship VALUES ('Veronica Watson','Miles Watson',TO_DATE('1970-12-22','YYYY-MM-DD'));

INSERT INTO bill VALUES (1,2022);
INSERT INTO bill VALUES (2,2022);
INSERT INTO bill VALUES (3,2022);
INSERT INTO bill VALUES (1,2021);
INSERT INTO bill VALUES (2,2021);
INSERT INTO bill VALUES (3,2021);
INSERT INTO bill VALUES (4,2020);

INSERT INTO billprivate VALUES (3,2022,'Passed','Intel Corporation');
INSERT INTO billprivate VALUES (2,2021,'Passed','John Doe');
INSERT INTO billprivate VALUES (3,2021,'Passed','Shell PLC');

INSERT INTO billpublic VALUES (1,2022,'Passed');
INSERT INTO billpublic VALUES (2,2022,'Pending');
INSERT INTO billpublic VALUES (1,2021,'Passed');
INSERT INTO billpublic VALUES (4,2020,'Passed');

INSERT INTO billvote VALUES ('Taylor Johnson',TO_DATE('1971-02-03','YYYY-MM-DD'),1,2022,'Vote');
INSERT INTO billvote VALUES ('Taylor Johnson',TO_DATE('1971-02-03','YYYY-MM-DD'),2,2022,'Vote');
INSERT INTO billvote VALUES ('Taylor Johnson',TO_DATE('1971-02-03','YYYY-MM-DD'),3,2022,'Vote');
INSERT INTO billvote VALUES ('Taylor Johnson',TO_DATE('1971-02-03','YYYY-MM-DD'),1,2021,'Veto');
INSERT INTO billvote VALUES ('Taylor Johnson',TO_DATE('1971-02-03','YYYY-MM-DD'),2,2021,'Veto');
INSERT INTO billvote VALUES ('Taylor Johnson',TO_DATE('1971-02-03','YYYY-MM-DD'),3,2021,'Veto');
INSERT INTO billvote VALUES ('Taylor Johnson',TO_DATE('1971-02-03','YYYY-MM-DD'),4,2020,'Vote');
INSERT INTO billvote VALUES ('Franciska Moore',TO_DATE('1963-05-12','YYYY-MM-DD'),1,2022,'Veto');
INSERT INTO billvote VALUES ('Franciska Moore',TO_DATE('1963-05-12','YYYY-MM-DD'),2,2022,'Veto');
INSERT INTO billvote VALUES ('Franciska Moore',TO_DATE('1963-05-12','YYYY-MM-DD'),3,2022,'Vote');
INSERT INTO billvote VALUES ('Franciska Moore',TO_DATE('1963-05-12','YYYY-MM-DD'),1,2021,'Veto');
INSERT INTO billvote VALUES ('Franciska Moore',TO_DATE('1963-05-12','YYYY-MM-DD'),4,2020,'Vote');
INSERT INTO billvote VALUES ('Donald Mouse',TO_DATE('1975-11-30','YYYY-MM-DD'),1,2022,'Vote');
INSERT INTO billvote VALUES ('Donald Mouse',TO_DATE('1975-11-30','YYYY-MM-DD'),2,2022,'Veto');
INSERT INTO billvote VALUES ('Donald Mouse',TO_DATE('1975-11-30','YYYY-MM-DD'),3,2022,'Veto');
INSERT INTO billvote VALUES ('Donald Mouse',TO_DATE('1975-11-30','YYYY-MM-DD'),1,2021,'Vote');
INSERT INTO billvote VALUES ('Donald Mouse',TO_DATE('1975-11-30','YYYY-MM-DD'),2,2021,'Veto');
INSERT INTO billvote VALUES ('Donald Mouse',TO_DATE('1975-11-30','YYYY-MM-DD'),3,2021,'Vote');
INSERT INTO billvote VALUES ('Donald Mouse',TO_DATE('1975-11-30','YYYY-MM-DD'),4,2020,'Veto');
INSERT INTO billvote VALUES ('Miles Watson',TO_DATE('1970-12-22','YYYY-MM-DD'),3,2022,'Vote');
INSERT INTO billvote VALUES ('Miles Watson',TO_DATE('1970-12-22','YYYY-MM-DD'),1,2021,'Veto');
INSERT INTO billvote VALUES ('Miles Watson',TO_DATE('1970-12-22','YYYY-MM-DD'),4,2020,'Veto');

INSERT INTO company VALUES ('HWUPKR0MPOU8FGXBT394','Apple Inc.');
INSERT INTO company VALUES ('INR2EJN1ERAN0W5ZP974','Microsoft Corporation');
INSERT INTO company VALUES ('TOTALLYLEGITIMATEORGLEI','Totally Legitimate Company Ltd.');
INSERT INTO company VALUES ('21380068P1DRHMJ8KU70','Shell PLC');
INSERT INTO company VALUES ('KNX4USFCNGPY45LOCE31','Intel Corporation');
INSERT INTO company VALUES ('549300N2ZLI21P85T117','TSMC Global Ltd.');
INSERT INTO company VALUES ('549300OKLGX3OMYVS512','Chevron Global Energy Inc.');

INSERT INTO exchange VALUES ('NYSE','Eastern Time Zone');
INSERT INTO exchange VALUES ('NASDAQ','Eastern Time Zone');
INSERT INTO exchange VALUES ('IEX','Eastern Time Zone');
INSERT INTO exchange VALUES ('NRSE','Pacific Time Zone');
INSERT INTO exchange VALUES ('FSE','Pacific Time Zone');
INSERT INTO exchange VALUES ('RLSE','Central Time Zone');

INSERT INTO executiveof VALUES ('Tim Cook',TO_DATE('1960-11-01','YYYY-MM-DD'),'HWUPKR0MPOU8FGXBT394',3000000,'CEO');
INSERT INTO executiveof VALUES ('Satya Nadella',TO_DATE('1967-08-19','YYYY-MM-DD'),'INR2EJN1ERAN0W5ZP974',2500000,'Chairman');
INSERT INTO executiveof VALUES ('Legitt Perrson',TO_DATE('1972-12-09','YYYY-MM-DD'),'TOTALLYLEGITIMATEORGLEI',1200000,'CEO');
INSERT INTO executiveof VALUES ('Van Beurden',TO_DATE('1958-04-23','YYYY-MM-DD'),'21380068P1DRHMJ8KU70',1750000,'CEO');
INSERT INTO executiveof VALUES ('Patrick Gelsinger',TO_DATE('1961-03-05','YYYY-MM-DD'),'KNX4USFCNGPY45LOCE31',1098500,'CEO');
INSERT INTO executiveof VALUES ('Mark Liu',TO_DATE('1954-01-01','YYYY-MM-DD'),'549300N2ZLI21P85T117',NULL,'Chairman');
INSERT INTO executiveof VALUES ('Michael Wirth',TO_DATE('1960-01-01','YYYY-MM-DD'),'549300OKLGX3OMYVS512',1650000,'Chairman');
INSERT INTO executiveof VALUES ('Pierre Breber',TO_DATE('1965-01-01','YYYY-MM-DD'),'549300OKLGX3OMYVS512',1020000,'CFO');
INSERT INTO executiveof VALUES ('Amy Hood',TO_DATE('1971-08-09','YYYY-MM-DD'),'INR2EJN1ERAN0W5ZP974',995833,'CFO');
INSERT INTO executiveof VALUES ('Luca Maestri',TO_DATE('1963-10-14','YYYY-MM-DD'),'HWUPKR0MPOU8FGXBT394',1000000,'CFO');

INSERT INTO stock VALUES ('HWUPKR0MPOU8FGXBT394','AAPL');
INSERT INTO stock VALUES ('INR2EJN1ERAN0W5ZP974','MSFT');
INSERT INTO stock VALUES ('TOTALLYLEGITIMATEORGLEI','TLGT');
INSERT INTO stock VALUES ('21380068P1DRHMJ8KU70','SHEL');
INSERT INTO stock VALUES ('KNX4USFCNGPY45LOCE31','INTC');
INSERT INTO stock VALUES ('549300N2ZLI21P85T117','TSMC');
INSERT INTO stock VALUES ('549300OKLGX3OMYVS512','CVX');

INSERT INTO tradedexchange VALUES ('AAPL','NASDAQ',TO_DATE('1980-12-12','YYYY-MM-DD'));
INSERT INTO tradedexchange VALUES ('MSFT','NASDAQ',TO_DATE('1986-03-13','YYYY-MM-DD'));
INSERT INTO tradedexchange VALUES ('TLGT','NRSE',TO_DATE('2001-04-01','YYYY-MM-DD'));
INSERT INTO tradedexchange VALUES ('SHEL','NYSE',TO_DATE('1984-11-01','YYYY-MM-DD'));
INSERT INTO tradedexchange VALUES ('INTC','NASDAQ',TO_DATE('1971-10-13','YYYY-MM-DD'));
INSERT INTO tradedexchange VALUES ('TSMC','NYSE',TO_DATE('1997-10-08','YYYY-MM-DD'));
INSERT INTO tradedexchange VALUES ('CVX','NYSE',TO_DATE('1982-07-30','YYYY-MM-DD'));

INSERT INTO transaction VALUES (TO_TIMESTAMP('2022-05-28 13:12:26', 'YYYY-MM-DD HH24:MI:SS'),'Taylor Johnson',TO_DATE('1971-02-03','YYYY-MM-DD'),'INTC','Buy',50000.00,99999.99);
INSERT INTO transaction VALUES (TO_TIMESTAMP('2021-12-11 09:50:12', 'YYYY-MM-DD HH24:MI:SS'),'Taylor Johnson',TO_DATE('1971-02-03','YYYY-MM-DD'),'INTC','Sell',250000.00,499999.99);
INSERT INTO transaction VALUES (TO_TIMESTAMP('2021-12-28 11:20:01', 'YYYY-MM-DD HH24:MI:SS'),'Taylor Johnson',TO_DATE('1971-02-03','YYYY-MM-DD'),'AAPL','Sell',250000.00,499999.99);
INSERT INTO transaction VALUES (TO_TIMESTAMP('2021-12-31 11:20:02', 'YYYY-MM-DD HH24:MI:SS'),'Taylor Johnson',TO_DATE('1971-02-03','YYYY-MM-DD'),'MSFT','Sell',250000.00,499999.99);
INSERT INTO transaction VALUES (TO_TIMESTAMP('2020-02-11 15:42:01', 'YYYY-MM-DD HH24:MI:SS'),'Taylor Johnson',TO_DATE('1971-02-03','YYYY-MM-DD'),'AAPL','Buy',500000.00,749999.99);
INSERT INTO transaction VALUES (TO_TIMESTAMP('2020-02-11 15:42:02', 'YYYY-MM-DD HH24:MI:SS'),'Taylor Johnson',TO_DATE('1971-02-03','YYYY-MM-DD'),'MSFT','Buy',500000.00,749999.99);
INSERT INTO transaction VALUES (TO_TIMESTAMP('2020-02-11 15:42:03', 'YYYY-MM-DD HH24:MI:SS'),'Taylor Johnson',TO_DATE('1971-02-03','YYYY-MM-DD'),'SHEL','Buy',100000.00,249999.99);
INSERT INTO transaction VALUES (TO_TIMESTAMP('2012-04-20 10:00:00', 'YYYY-MM-DD HH24:MI:SS'),'Donald Mouse',TO_DATE('1975-11-30','YYYY-MM-DD'),'AAPL','Buy',50000.00,99999.99);
INSERT INTO transaction VALUES (TO_TIMESTAMP('2012-04-20 10:00:01', 'YYYY-MM-DD HH24:MI:SS'),'Donald Mouse',TO_DATE('1975-11-30','YYYY-MM-DD'),'MSFT','Buy',50000.00,99999.99);
INSERT INTO transaction VALUES (TO_TIMESTAMP('2012-04-20 10:00:02', 'YYYY-MM-DD HH24:MI:SS'),'Donald Mouse',TO_DATE('1975-11-30','YYYY-MM-DD'),'TLGT','Buy',250000.00,499999.99);
INSERT INTO transaction VALUES (TO_TIMESTAMP('2012-04-20 10:00:03', 'YYYY-MM-DD HH24:MI:SS'),'Donald Mouse',TO_DATE('1975-11-30','YYYY-MM-DD'),'SHEL','Buy',250000.00,499999.99);
INSERT INTO transaction VALUES (TO_TIMESTAMP('2012-04-20 10:00:04', 'YYYY-MM-DD HH24:MI:SS'),'Donald Mouse',TO_DATE('1975-11-30','YYYY-MM-DD'),'INTC','Buy',50000.00,99999.99);
INSERT INTO transaction VALUES (TO_TIMESTAMP('2012-04-20 10:00:05', 'YYYY-MM-DD HH24:MI:SS'),'Donald Mouse',TO_DATE('1975-11-30','YYYY-MM-DD'),'TSMC','Buy',100000.00,249999.99);
INSERT INTO transaction VALUES (TO_TIMESTAMP('2012-04-20 10:00:06', 'YYYY-MM-DD HH24:MI:SS'),'Donald Mouse',TO_DATE('1975-11-30','YYYY-MM-DD'),'CVX','Buy',100000.00,249999.99);
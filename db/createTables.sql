DROP TABLE IF EXISTS Authenticate;
CREATE TABLE Authenticate (
        Auth_ID INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
        PASSWORD CHAR(40) NOT NULL
);

DROP TABLE IF EXISTS Members;
CREATE TABLE Members (
        USERNAME VARCHAR(15) NOT NULL PRIMARY KEY,
        EMAIL VARCHAR(50) NOT NULL,
	AUTH_ID INTEGER NOT NULL,
        FOREIGN KEY (AUTH_ID) REFERENCES Authenticate(Auth_ID)
);

DROP TABLE IF EXISTS Apps;
CREATE TABLE Apps (
	APP_ID INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
	USER_NAME VARCHAR(15) NOT NULL,
	FOREIGN KEY (USER_NAME) REFERENCES Members(USERNAME)
);

DROP TABLE IF EXISTS BasicInfo;
CREATE TABLE BasicInfo (
	APP_ID INTEGER NOT NULL PRIMARY KEY,
	BUSINESS_NAME VARCHAR(30) NOT NULL,
	STREET_ADDRESS VARCHAR(50),
	CITY VARCHAR(20),
	STATE CHAR(2),
	PHONE INTEGER,
	TAGLINE VARCHAR(100),
	DESCRIPTION VARCHAR(250),
	FOREIGN KEY (APP_ID) REFERENCES Apps(APP_ID)
);

DROP TABLE IF EXISTS Menu;
CREATE TABLE Menu (
	PAGE_ORDER INTEGER NOT NULL,
	APP_ID INTEGER NOT NULL,
	PAGE_NAME VARCHAR(15) NOT NULL,
	PAGE_KEY VARCHAR(30) PRIMARY KEY,
	UNIQUE PAGE_KEY (APP_ID, PAGE_NAME), 
	FOREIGN KEY (APP_ID) REFERENCES Apps(APP_ID)
);

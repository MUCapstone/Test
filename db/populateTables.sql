
#POPULATE INITAL LOGIN TABLES

INSERT INTO Authenticate (PASSWORD) VALUES (sha1('pass'));
INSERT INTO Members (USERNAME, EMAIL, AUTH_ID) VALUES ('n_bonney', 'nicole.e.bonney@gmail.com', 1);

INSERT INTO Authenticate (PASSWORD) VALUES (sha1('pass'));
INSERT INTO Members (USERNAME, EMAIL, AUTH_ID) VALUES ('b_trenhaile', 'brianltren@gmail.com', 2);

INSERT INTO Authenticate (PASSWORD) VALUES (sha1('pass'));
INSERT INTO Members (USERNAME, EMAIL, AUTH_ID) VALUES ('b_smith', 'brcsmith12@gmail.com', 3);

INSERT INTO Authenticate (PASSWORD) VALUES (sha1('pass'));
INSERT INTO Members (USERNAME, EMAIL, AUTH_ID) VALUES ('r_kemna', 'raqkem@gmail.com', 4);


#POPULATE APP TABLE
INSERT INTO Apps (USER_NAME) VALUES ('r_kemna');
INSERT INTO Apps (USER_NAME) VALUES ('b_trenhaile');

#POPULATE BASIC INFO TABLE
INSERT INTO BasicInfo (APP_ID, BUSINESS_NAME, STREET_ADDRESS, CITY, STATE, PHONE, TAGLINE, DESCRIPTION) 
	VALUES (1, 'YoYums', '122 E High St.', 'Jefferson City', 'MO', 5736447581, 'froyo is the way to go',
	'Jefferson City\'s best frozen treat!');
INSERT INTO BasicInfo (APP_ID, BUSINESS_NAME, STREET_ADDRESS, CITY, STATE, PHONE, TAGLINE, DESCRIPTION)
        VALUES (2, 'Brian\'s Italian Restaurant', '4001 Hyde Park Ave', 'Columbia', 'MO', 5736739353, 
		'World famous sauce recipe passed down through generations', 'We are a family owned Italian restaurant in Columbia, Missouri. We strive to bring Italy right to your plate in this great college town with recipes passed down through generations.');


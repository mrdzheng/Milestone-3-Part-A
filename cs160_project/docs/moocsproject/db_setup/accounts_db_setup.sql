USE `youthcyb_cs160s1g1`;

CREATE TABLE accounts(
  Name varchar(255),
  Username varchar(255),
  Password varchar(255),
  Email varchar(255),
  Type varchar(255)
);

INSERT INTO accounts (Name, Username, Password, Email, Type) 
VALUES ('Alvin Ko', 'ako', 'ako', 'ako@sample.com', 'admin');

INSERT INTO accounts (Name, Username, Password, Email, Type) 
VALUES ('Dave Zheng', 'dzheng', 'dzheng', 'dzheng@sample.com', 'admin');

INSERT INTO accounts (Name, Username, Password, Email, Type) 
VALUES ('Steve Lee', 'slee', 'slee','slee@sample.com', 'admin');

INSERT INTO accounts (Name, Username, Password, Email, Type) 
VALUES ('Nick Saric', 'nsaric', 'nsaric', 'nsaric@sample.com', 'admin');

INSERT INTO accounts (Name, Username, Password, Email, Type) 
VALUES ('Chris Tseng', 'ctseng', 'ctseng', 'ctseng@sample.com', 'student');
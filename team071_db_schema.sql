/*
CS6400 students are expected to write their own SQL. 
Note: if your SQL script is a dump (auto generated via phpMyAdmin export)  there will be 0 points awarded for that portion of the submission.
Please change the team number below to reflect your correct team number including the leading zero. 
*/

DROP DATABASE IF EXISTS `cs6400_sp17_team071`; 
CREATE DATABASE IF NOT EXISTS cs6400_sp17_team071 DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

SET default_storage_engine=InnoDB;
SET FOREIGN_KEY_CHECKS=0;
USE cs6400_sp17_team071;

-- Tables 

CREATE TABLE `user` (
Username varchar (100) NOT NULL, 
Password varchar (100)  NOT NULL, 
Email  varchar (100)  NOT NULL, 
Firstname varchar (100)  NOT NULL, 
Lastname  varchar (100)  NOT NULL, 
SiteID int (16) unsigned  NOT NULL,      
PRIMARY KEY (Username)
);

CREATE TABLE `site`  (
SiteID int (16) unsigned  NOT NULL, 
Facilityname varchar (100) NOT NULL, 
Phone varchar(25) NOT NULL, 
Street varchar (100) NOT NULL, 
City varchar (100) NOT NULL, 
State varchar (100)  NOT NULL, 
Zipcode  varchar (100)  NOT NULL, 
PRIMARY KEY (SiteID), 
UNIQUE KEY `Facilityname` (`Facilityname`)
);

CREATE TABLE `food_house_services` (
ServiceID int (16) unsigned  NOT NULL, 
Operationhour  varchar (200)  NOT NULL, 
Scondition varchar (200)  NOT NULL, 
SiteID int (16) unsigned  NOT NULL, 
PRIMARY KEY (ServiceID)
);

CREATE TABLE `foodbank`(
ServiceID int (16) unsigned  NOT NULL, 
SiteID int (16) unsigned  NOT NULL, 
PRIMARY KEY (ServiceID)
);

CREATE TABLE `soupkitchen` (
ServiceID int (16) unsigned  NOT NULL, 
Seatavail  int (16) unsigned  NOT NULL, 
Totalseat  int (16) unsigned  NOT NULL, 
PRIMARY KEY (ServiceID)
);

CREATE TABLE `room` (
RoomID int(16) unsigned  NOT NULL, 
Roomnum int (16) unsigned  NOT NULL, 
ServiceID int (16) unsigned  NOT NULL, 
PRIMARY KEY (RoomID)
);

CREATE TABLE `bunk` (
BunkID int(16) unsigned  NOT NULL, 
Bunknum int (16) unsigned  NOT NULL, 
Bunktype varchar (100)  NOT NULL, 
ServiceID int (16) unsigned  NOT NULL, 
PRIMARY KEY (BunkID)
);

CREATE TABLE `waitlist` (
WaitlistID int(16) unsigned  NOT NULL, 
ServiceID int (16) unsigned  NOT NULL, 
PRIMARY KEY (WaitlistID)
);

CREATE TABLE `headofhousehold` (
Ranking  int(16) unsigned  NOT NULL,  
ClientID  int(16) unsigned  NOT NULL, 
UNIQUE KEY `ClientID` (`ClientID`)
);

CREATE TABLE `WaitlistManageHousehold` (
ClientID  int(16) unsigned  NOT NULL, 
WaitlistID int(16) unsigned  NOT NULL, 
PRIMARY KEY (ClientID,WaitlistID)
);

CREATE TABLE `client` (
ClientID  int(16) unsigned  NOT NULL, 
IDtype  varchar (100)  NOT NULL, 
IDstate  varchar (100)  NOT NULL, 
Phonenum  varchar(25) NOT NULL, 
Firstname  varchar (100)  NOT NULL, 
Lastname  varchar (100)  NOT NULL, 
PRIMARY KEY (ClientID)
);

CREATE TABLE `UserManageClient` (
ClientID int(16) unsigned  NOT NULL, 
Username  varchar (100) NOT NULL, 
PRIMARY KEY (ClientID,Username)
);

CREATE TABLE `clientlog` (
LogID  int(16) unsigned  NOT NULL, 
Date DATE NOT NULL, 
Description varchar (200)  NOT NULL, 
Note varchar (200)  NOT NULL, 
SiteID int (16) unsigned  NOT NULL, 
ClientID int(16) unsigned  NOT NULL, 
PRIMARY KEY (LogID) 
);

CREATE TABLE `item` (
ItemID int(16) unsigned  NOT NULL, 
Itemnumber int(16) unsigned  NOT NULL, 
Unit varchar (100)  NOT NULL, 
Storagetype varchar (100)  NOT NULL, 
Category varchar (100)  NOT NULL, 
Expirationdate DATE NOT NULL, 
ServiceID int (16) unsigned  NOT NULL, 
PRIMARY KEY (ItemID) 
);

CREATE TABLE `Store` (
ServiceID int (16) unsigned  NOT NULL, 
ItemID int (16) unsigned  NOT NULL, 
PRIMARY KEY (ServiceID,ItemID) 
);

CREATE TABLE `requestitem` (
Username  varchar (100)  NOT NULL, 
ItemID int (16) unsigned  NOT NULL, 
Requestnum int(16) unsigned  NOT NULL, 
ItemNumprovided int(16) unsigned  NOT NULL, 
Requestsource  varchar (100)  NOT NULL, 
Status  varchar (100)  NOT NULL, 
PRIMARY KEY (Username,ItemID) 
);

-- Constraints 

ALTER TABLE `user`
  ADD CONSTRAINT user_ibfk_1 FOREIGN KEY (SiteID) REFERENCES `site` (siteID);
  
ALTER TABLE `food_house_services`
  ADD CONSTRAINT food_house_services_ibfk_1 FOREIGN KEY (SiteID) REFERENCES `site` (siteID);

ALTER TABLE `foodbank`
  ADD CONSTRAINT foodbank_ibfk_1 FOREIGN KEY (ServiceID) REFERENCES `food_house_services` (ServiceID);

ALTER TABLE `room`
  ADD CONSTRAINT room_ibfk_1 FOREIGN KEY (ServiceID) REFERENCES `food_house_services` (ServiceID);

ALTER TABLE `bunk`
  ADD CONSTRAINT bunk_ibfk_1 FOREIGN KEY (ServiceID) REFERENCES `food_house_services` (ServiceID);

ALTER TABLE `headofhousehold`
  ADD CONSTRAINT headofhousehold_ibfk_1 FOREIGN KEY (ClientID) REFERENCES `client` (ClientID);

ALTER TABLE `waitlistmanagehousehold`  
  ADD CONSTRAINT waitlistmanagehousehold_ibfk_1 FOREIGN KEY (ClientID) REFERENCES `client` (ClientID),
  ADD CONSTRAINT waitlistmanagehousehold_ibfk_2 FOREIGN KEY (WaitlistID) REFERENCES `waitlist` (WaitlistID);
  
ALTER TABLE `usermanageclient`
  ADD CONSTRAINT usermanageclient_ibfk_1 FOREIGN KEY (ClientID) REFERENCES `client` (ClientID), 
  ADD CONSTRAINT usermanageclient_ibfk_2 FOREIGN KEY (Username) REFERENCES `user` (Username);

ALTER TABLE `clientlog`
  ADD CONSTRAINT clientlog_ibfk_1 FOREIGN KEY (ClientID) REFERENCES `Client` (ClientID);
  ADD CONSTRAINT clientlog_ibfk_2 FOREIGN KEY (SiteID) REFERENCES `site` (siteID);

ALTER TABLE `item`
  ADD CONSTRAINT item_ibfk_1 FOREIGN KEY (ServiceID) REFERENCES `food_house_services` (ServiceID);

 ALTER TABLE `store`
  ADD CONSTRAINT store_ibfk_1 FOREIGN KEY (ItemID) REFERENCES `item` (ItemID), 
  ADD CONSTRAINT store_ibfk_2 FOREIGN KEY (ServiceID) REFERENCES `food_house_services` (ServiceID);
  
 ALTER TABLE `requestitem`
  ADD CONSTRAINT requestitem_ibfk_1 FOREIGN KEY (ItemID) REFERENCES `item` (ItemID), 
  ADD CONSTRAINT requestitem_ibfk_2 FOREIGN KEY (Username) REFERENCES `user` (Username);
  
  
  
  

##Add values to site
INSERT INTO `site` (`SiteID`, `Facilityname`, `Phone`, `Street`, `City`, `State`, `Zipcode`) 
VALUES ('1001', 'Site A', '(561) 123 4567', '1000 A Street', 'Jupiter City', 'FL', '33458'),
	   ('1002', 'Site B', '(561) 223 4567', '1000 B Street', 'Jupiter City', 'FL', '33458'),
       ('1003', 'Site C', '(561) 323 4567', '1000 C Street', 'Jupiter City', 'FL', '33458'), 
       ('1004', 'Site D', '(561) 423 4567', '1000 D Street', 'Jupiter City', 'FL', '33458'),
       ('1005', 'Site E', '(561) 523 4567', '1000 E Street', 'Jupiter City', 'FL', '33458'),
       ('1006', 'Site F', '(561) 623 4567', '1000 F Street', 'Jupiter City', 'FL', '33458'),
       ('1007', 'Site G', '(561) 723 4567', '1000 G Street', 'Jupiter City', 'FL', '33458'), 
       ('1008', 'Site H', '(561) 823 4567', '1000 H Street', 'Jupiter City', 'FL', '33458')
	   
	   
	   
INSERT INTO `user` (`Username`, `Password`, `Email`, `Firstname`, `Lastname`, `SiteID`) 
VALUES  ('fl', 'omscs', 'a@gmail.com', 'Fang', 'Lei', '1001'), 
		('ld', 'omscs', 'b@gmail.com', 'Li', 'Dong', '1002'),
		('lb', 'omscs', 'c@gmail.com', 'Lin', 'Bo', '1003'),
		('zl', 'omscs', 'd@gmail.com', 'Zhou', 'Liang', '1004'),
		('managera', 'omscs', 'e@gmail.com', 'Manager', 'A', '1005'),
		('managerb', 'omscs', 'f@gmail.com', 'Mana', 'B', '1005'),
		('managerc', 'omscs', 'g@gmail.com', 'Manager', 'C', '1006'),
		('managerd', 'omscs', 'h@gmail.com', 'Mana', 'D', '1007'),
		('managere', 'omscs', 'i@gmail.com', 'Manager', 'E', '1008')

##Add a new column: service name
ALTER TABLE food_house_services ADD COLUMN Sname varchar(20) AFTER ServiceID		
		
INSERT INTO `food_house_services` (`ServiceID`, `Sname`,`Operationhour`, `Scondition`, `SiteID`) 
VALUES  ('11001', 'Food Pantry', '9am-5pm', 'ID Required', '1001'), 
		('11002', 'Food Pantry', '9am-5pm', 'ID Required', '1002'), 
		('11003', 'Food Pantry', '9am-5pm', 'ID Required', '1003'), 
		('11004', 'Food Pantry', '9am-5pm', 'ID Required', '1004'), 
		('21005', 'Soup Kitchen', '9am-5pm', 'ID Required', '1005'), 
		('21006', 'Soup Kitchen', '9am-5pm', 'ID Required', '1006'),
		('21007', 'Soup Kitchen','9am-5pm', 'ID Required', '1007'), 
		('21008', 'Soup Kitchen', '9am-5pm', 'ID Required', '1008'), 
		('31005', 'Shelter', '9am-5pm', 'ID Required', '1005'), 
		('21001',  'Soup Kitchen','9am-5pm', 'ID Required', '1001')
		
ALTER TABLE foodbank ADD COLUMN Sname varchar(20) AFTER ServiceID


#This is the old wrong foreigh key.
#Drop first
ALTER TABLE `foodbank`
  ADD CONSTRAINT foodbank_ibfk_1 FOREIGN KEY (ServiceID) REFERENCES `food_house_services` (ServiceID);
 
ALTER TABLE foodbank DROP FOREIGN KEY `foodbank_ibfk_1` 

ALTER TABLE `foodbank` 
  ADD CONSTRAINT foodbank_ibfk_1 FOREIGN KEY (SiteID) REFERENCES `site` (siteID);
 
 
INSERT INTO `foodbank` (`ServiceID`, `Sname`, `SiteID`) 
VALUES  ('41002', 'Food Bank', '1002') ,
		('41005', 'Food Bank', '1005')
		

#Add a view: serviceid, sname, siteID
CREATE VIEW site_services AS (SELECT ServiceID,Sname,SiteID FROM `food_house_services`) UNION (SELECT ServiceID,Sname,SiteID from `foodbank` )






##Client Section
INSERT INTO `client` (`ClientID`, `IDtype`, `IDstate`, `Phonenum`, `Firstname`, `Lastname`) 
VALUES  ('1000', 'Driver License', 'GA', '(123) 156-7890', 'Allen', 'Smith'),
		('1001', 'Driver License', 'GA', '(123) 256-7890', 'David', 'Anderson'),
		('1002', 'Driver License', 'GA', '(123) 356-7890', 'Tim', 'Carson'),
		('1003', 'Driver License', 'GA', '(123) 456-7890', 'Mike', 'Wang'),
		('1004', 'Driver License', 'GA', '(123) 556-7890', 'John', 'Chen'),
		('1005', 'Driver License', 'GA', '(123) 656-7890', 'Jocob', 'Trump'),
		('1006', 'Driver License', 'GA', '(123) 756-7890', 'Alex', 'Obama'),
		('1007', 'Driver License', 'GA', '(123) 856-7890', 'Kevin', 'Bush'),
		('1008', 'Driver License', 'GA', '(123) 956-7890', 'Marshall', 'Cliton'),
		('1009', 'Driver License', 'GA', '(123) 106-7890', 'Luke', 'Reagon'),
		('1010', 'Driver License', 'GA', '(123) 116-7890', 'Tom', 'Washington')
		

INSERT INTO `usermanageclient` (`ClientID`, `Username`) 
VALUES  ('1000', 'fl'),
		('1001', 'ld'), 
		('1002', 'lb'), 
		('1003', 'zl'), 
		('1004', 'managera'), 
		('1005', 'managerb'), 
		('1006', 'managerd'), 
		('1007', 'managerd'), 
		('1008', 'managere'), 
		('1009', 'fl'), 
		('1010', 'ld') 

		
		
INSERT INTO `room` (`RoomID`, `Roomnum`, `ServiceID`) 
VALUES  ('1001', '1', '31005') ,
		('1002', '2', '31005') ,
		('1003', '3', '31005') ,
		('1004', '4', '31005') 


INSERT INTO `bunk` (`BunkID`, `Bunknum`, `Bunktype`, `ServiceID`) 
VALUES  ('2001', '1', 'Male', '31005'),		
		('3001', '2', 'Female', '31005'),
		('4001', '3', 'Mix', '31005'),
		('2002', '4', 'Male', '31005'),
		('4002', '5', 'Mix', '31005')

INSERT INTO `soupkitchen` (`ServiceID`, `Seatavail`, `Totalseat`) 
VALUES  ('21005', '30', '30'), 
		('21006', '25', '30'), 
		('21007', '30', '30'), 
		('21008', '20', '30'),
		('21001', '30', '30'),
		










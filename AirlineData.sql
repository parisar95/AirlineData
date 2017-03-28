drop table Ticket;
drop table Passenger;
drop table CrewAssn;
drop table Crew;
drop table Flight;
drop table Airport_d;
drop table Airport_a;
drop table AirplaneModel;
drop table ModelInfo;
drop table Airport;


CREATE TABLE Airport
	(acode CHAR(4),
	city CHAR(20),
	PRIMARY KEY (acode));
	grant select on Airport to public;

CREATE TABLE Airport_d
	(acode_d CHAR(4),
	PRIMARY KEY (acode_d), 
	FOREIGN KEY (acode_d) REFERENCES Airport(acode) ON DELETE CASCADE);

CREATE TABLE Airport_a
	(acode_a CHAR(4),
	PRIMARY KEY (acode_a), 
	FOREIGN KEY (acode_a) REFERENCES Airport(acode) ON DELETE CASCADE);

CREATE TABLE ModelInfo
	(model CHAR(3),
            capacity INTEGER,
	PRIMARY KEY (model));

CREATE TABLE AirplaneModel
	(regno CHAR(5),
	model CHAR(3),
	PRIMARY KEY (regno),
	FOREIGN KEY (model) references ModelInfo(model));
	grant select on AirplaneModel to public;

CREATE TABLE Passenger
	(pid INTEGER,
	pname CHAR(20),
	PRIMARY KEY(pid));
	grant select on Passenger to public;

CREATE TABLE Crew
	(eid INTEGER,
	ename CHAR(20),
	position CHAR(20),
	PRIMARY KEY (eid));

CREATE TABLE Flight
	(fno CHAR(4), 
	dateflight DATE,
	deptime CHAR(5) NOT NULL,
	depacode CHAR(4) NOT NULL,
	arrdate DATE NOT NULL,
	arrtime CHAR(5) NOT NULL,
	arracode CHAR(4) NOT NULL,
	regno CHAR(5) NOT NULL,
	PRIMARY KEY(fno, dateflight),
	FOREIGN KEY (depacode) REFERENCES Airport_d(acode_d) ,
	FOREIGN KEY (arracode) REFERENCES Airport_a(acode_a) ,
	FOREIGN KEY (regno) REFERENCES AirplaneModel(regno));

CREATE TABLE CrewAssn
	(eid INTEGER, 
	fno CHAR(4),
	dateflight DATE,
	PRIMARY KEY (eid, fno, dateflight),
	FOREIGN KEY (eid) REFERENCES Crew ON DELETE CASCADE,
	FOREIGN KEY (fno, dateflight) REFERENCES Flight ON DELETE CASCADE);


CREATE TABLE Ticket
	(tid CHAR(4),
	fno CHAR(4) NOT NULL,
	dateflight DATE NOT NULL,
	pid INTEGER NOT NULL,
	PRIMARY KEY (tid),
	FOREIGN KEY (fno, dateflight) REFERENCES Flight ON DELETE CASCADE,
	FOREIGN KEY (pid) REFERENCES Passenger);

insert into Airport
values('A000', 'Vancouver');
insert into Airport
values('A001', 'Chicago');
insert into Airport
values('A002', 'Victoria');
insert into Airport
values('A003', 'Toronto');
insert into Airport
values('A004', 'Montreal');
insert into Airport
values('A005', 'Cancun');

insert into Airport_d
values ('A000');
insert into Airport_d
values ('A001');
insert into Airport_d
values ('A002');
insert into Airport_d
values ('A003');
insert into Airport_d
values ('A004');
insert into Airport_d
values ('A005');

insert into Airport_a
values ('A000');
insert into Airport_a
values ('A001');
insert into Airport_a
values ('A002');
insert into Airport_a
values ('A003');
insert into Airport_a
values ('A004');
insert into Airport_a
values ('A005');

insert into ModelInfo
values ('150', '100');
insert into ModelInfo
values ('200', '50');
insert into ModelInfo
values ('140', '75');
insert into ModelInfo
values ('100', '100');

insert into AirplaneModel
values ('001', '150');
insert into AirplaneModel
values ('002', '200');
insert into AirplaneModel
values ('003', '140');
insert into AirplaneModel
values ('004', '100');


insert into Passenger
values('0001', 'Bill Bob');
insert into Passenger
values('0002', 'Sarah Brown');
insert into Passenger
values('0003', 'Alyssa Cook');
insert into Passenger
values('0004', 'Tom Cook');
insert into Passenger
values('0005', 'Sarah Lee');
insert into Passenger
values('0006', 'Angela Smith');
insert into Passenger
values('0007', 'James Bond');
insert into Passenger
values('0008', 'Alex House');
insert into Passenger
values('0009', 'Lisa Small');
insert into Passenger
values('0010', 'Angel Crane');
insert into Passenger
values('0011', 'Ariel McDonald');
insert into Passenger
values('0012', 'Jim Slim');


insert into Crew
values('0001', 'Eric Brown', 'Pilot');
insert into Crew
values ('0002', 'Allison Wright', 'Co-Pilot');
insert into Crew
values ('0003', 'Bobby Smith', 'Pilot');
insert into Crew
values ('0004', 'Angela Smith', 'Co-Pilot');
insert into Crew
values ('0005', 'Lisa Lee', 'Flight Attendant');
insert into Crew
values('0006', 'Joe Moe', 'Pilot');
insert into Crew
values ('0007', 'Steve Wright', 'Co-Pilot');
insert into Crew
values ('0008', 'Bobby Smith', 'Flight Attendant');
insert into Crew
values ('0009', 'Sierra Murphy', 'Flight Attendant');
insert into Crew
values ('0010', 'Jessica Ross', 'Flight Attendant');
insert into Crew
values ('0011', 'Bill King', 'Pilot');

insert into Flight
values('F000', '2017-05-09', '07:30', 'A003', '2017-05-10', '00:30', 'A000', '001');
insert into Flight
values('F001', '2017-04-28', '10:15', 'A003', '2017-04-29', '03:30', 'A000', '002');
insert into Flight
values('F002', '2017-04-21', '1:15', 'A001', '2017-04-21', '11:30', 'A000', '002');
insert into Flight
values('F003', '2017-04-21', '11:30', 'A005', '2017-04-21', '2:30', 'A004', '001');
insert into Flight
values('F004', '2017-04-02', '17:00', 'A001', '2017-04-02', '21:30', 'A005', '003');
insert into Flight
values('F005', '2017-04-10', '04:00', 'A002', '2017-04-10', '06:30', 'A005', '001');
insert into Flight
values('F006', '2017-04-11', '18:00', 'A002', '2017-04-11', '21:15', 'A001', '003');
insert into Flight
values('F007', '2017-04-21', '01:30', 'A001', '2017-04-21', '03:45', 'A003', '003');
insert into Flight
values('F008', '2017-04-21', '04:00', 'A003', '2017-04-21', '08:15', 'A000', '004');


insert into CrewAssn
values('0001', 'F000', '2017-05-09');
insert into CrewAssn
values('0001', 'F008', '2017-04-21');
insert into CrewAssn
values ('0002', 'F000', '2017-05-09');
insert into CrewAssn
values ('0002', 'F001', '2017-04-28');
insert into CrewAssn
values('0003', 'F001', '2017-04-28');
insert into CrewAssn
values('0004', 'F002', '2017-04-21');
insert into CrewAssn
values('0005', 'F002', '2017-04-21');
insert into CrewAssn
values('0005', 'F004', '2017-04-02');
insert into CrewAssn
values('0006', 'F003', '2017-04-21');
insert into CrewAssn
values('0007', 'F000', '2017-05-09');
insert into CrewAssn
values('0007', 'F004', '2017-04-02');
insert into CrewAssn
values('0008', 'F004', '2017-04-02');
insert into CrewAssn
values('0009', 'F002', '2017-04-21');
insert into CrewAssn
values('0010', 'F003', '2017-04-21');
insert into CrewAssn
values('0010', 'F004', '2017-04-02');
insert into CrewAssn
values('0011', 'F005', '2017-04-10');
insert into CrewAssn
values('0011', 'F006', '2017-04-11');
insert into CrewAssn
values('0011', 'F007', '2017-04-21');


insert into Ticket
values('T001', 'F000', '2017-05-09', '0001');
insert into Ticket
values('T002', 'F000', '2017-05-09', '0002');
insert into Ticket
values('T003', 'F000', '2017-05-09', '0003');
insert into Ticket
values('T004', 'F001', '2017-04-28', '0001');
insert into Ticket
values('T005', 'F001', '2017-04-28', '0002');
insert into Ticket
values('T006', 'F001', '2017-04-28', '0004');
insert into Ticket
values('T007', 'F002', '2017-04-21', '0005');
insert into Ticket
values('T008', 'F003', '2017-04-21', '0008');
insert into Ticket
values('T009', 'F007', '2017-04-21', '0002');
insert into Ticket
values('T010', 'F007', '2017-04-21', '0003');
insert into Ticket
values('T011', 'F007', '2017-04-21', '0006');
insert into Ticket
values('T012', 'F007', '2017-04-21', '0008');
insert into Ticket
values('T013', 'F008', '2017-04-21', '0008');
insert into Ticket
values('T014', 'F008', '2017-04-21', '0011');
insert into Ticket
values('T015', 'F004', '2017-04-02', '0009');
insert into Ticket
values('T016', 'F004', '2017-04-02', '0010');
insert into Ticket
values('T017', 'F004', '2017-04-02', '0012');
insert into Ticket
values('T018', 'F005', '2017-04-10', '0007');
insert into Ticket
values('T019', 'F005', '2017-04-10', '0004');
insert into Ticket
values('T020', 'F006', '2017-04-11', '0009');




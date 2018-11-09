create table Worker(
  Fname varchar(15),
  Minit char(1),
  Lname varchar(15),
  WID int(9) primary key
  );
  
  create table Worker_Phone(
  WID int(9) REFERENCES Worker(WID),
  PHONE varchar(15),
  primary key(WID, PHONE)
  );
  
  create table Conductor(
  WID int(9) REFERENCES Worker(WID),
  Rank varchar(15),
  primary key(WID)
  );
  
  create table Cook(
  WID int(9) REFERENCES Worker(WID),
  Signature_Dish varchar(15),
  primary key(WID)
  );
  
  create table Maintenance(
  WID int(9) REFERENCES Worker(WID),
  Type varchar(15),
  primary key(WID)
  );
  
  create table Train(
  ID int(8) primary key,
  Type varchar(30),
  Capacity int(2),
  Name varchar(30)
  );

  create table Trips(
  Departure_Time varchar(30),
  Destination varchar(30),
  Arrival_Time varchar(15),
  Status varchar(15),
  Space_Left int(2),
  Train_ID int(8) REFERENCES Train(ID),
  primary key(Departure_Time, Destination)
  );

  create table Tickets(
  Train_ID int(8) REFERENCES Train(ID),
  Seat int(2),
  Type varchar(15),
  SSN int(9),
  Status varchar(15),
  primary key(Train_ID, Seat)
  );

  create table Passenger(
  SSN int(9) primary key,
  Fname varchar(15),
  Lname varchar(15),
  Minit char(1),
  Address varchar(60),
  Age int,
  DOB varchar(8)
  );

  create table Purchase(
  Train_ID int(8) REFERENCES Train(ID),
  Seat int(2) REFERENCES Tickets(Seat),
  SSN int(9) REFERENCES Passenger(SSN),
  price int,
  primary key(Train_ID, Seat, SSN)
  );

  create table Passenger_Phone(
  SSN int(9) REFERENCES Passenger(SSN),
  Phone varchar(15),
  primary key(SSN, Phone)
  );

  insert into Train
  	(ID, Type, Capacity, Name)
  	values
  	(12345678, "Bullet", 20, "Gonzalez");

  insert into Train
  	(ID, Type, Capacity, Name)
  	values
  	(22224444, "Steam", 20, "Thomas");

  insert into Train
  	(ID, Type, Capacity, Name)
  	values
  	(33224455, "Locomotive", 20, "Jenkins");

  insert into Worker
  	(Fname, Minit, Lname, WID)
  	values
  	("Franklin", "P", "Smith", 333445555);

  insert into Worker
  	(Fname, Minit, Lname, WID)
  	values
  	("Hal", "T", "Washington", 555555555);

  insert into Worker
  	(Fname, Minit, Lname, WID)
  	values
  	("Xander", "O", "Dandy", 434343437);

  insert into Worker
  	(Fname, Minit, Lname, WID)
  	values
  	("Patrick", "Z", "Moto", 987654321);

  insert into Worker
  	(Fname, Minit, Lname, WID)
  	values
  	("Scott", "Q", "Quentin", 453543789);

  insert into Worker
  	(Fname, Minit, Lname, WID)
  	values
  	("Sally", "H", "Harrison", 123321222);

  insert into Worker
  	(Fname, Minit, Lname, WID)
  	values
  	("Mary", "W", "Monroe", 111111111);

  insert into Worker
  	(Fname, Minit, Lname, WID)
  	values
  	("Susie", "J", "O'Conner", 876678912);

  insert into Worker
  	(Fname, Minit, Lname, WID)
  	values
  	("Franklin", "T", "Wong", 567891234);

  insert into Worker_Phone
  	(WID, PHONE)
  	values
  	(333445555, "111-111-1111");

  insert into Worker_Phone
  	(WID, PHONE)
  	values
  	(555555555, "222-222-2222");

  insert into Worker_Phone
  	(WID, PHONE)
  	values
  	(434343437, "333-333-3333");

  insert into Worker_Phone
  	(WID, PHONE)
  	values
  	(987654321, "444-444-4444");

  insert into Worker_Phone
  	(WID, PHONE)
  	values
  	(453543789, "555-555-5555");

  insert into Worker_Phone
  	(WID, PHONE)
  	values
  	(123321222, "666-666-6666");

  insert into Worker_Phone
  	(WID, PHONE)
  	values
  	(111111111, "777-777-7777");

  insert into Worker_Phone
  	(WID, PHONE)
  	values
  	(876678912, "888-888-8888");

  insert into Worker_Phone
  	(WID, PHONE)
  	values
  	(567891234, "999-999-9999");

  insert into Conductor
  	(WID, Rank)
  	values
  	(567891234, "Senior");

   insert into Conductor
  	(WID, Rank)
  	values
  	(123321222, "Associate");

  insert into Conductor
  	(WID, Rank)
  	values
  	(333445555, "Temp");

  insert into Cook
  	(WID, Signature_Dish)
  	values
  	(876678912, "Lobster");

  insert into Cook
  	(WID, Signature_Dish)
  	values
  	(111111111, "Chicken Alfredo");

  insert into Cook
  	(WID, Signature_Dish)
  	values
  	(453543789, "Western Burger");

  insert into Maintenance
  	(WID, Type)
  	values
  	(987654321, "Electrical");

  insert into Maintenance
  	(WID, Type)
  	values
  	(434343437, "Plumbing");

  insert into Maintenance
  	(WID, Type)
  	values
  	(555555555, "Sanitation");

  insert into Trips
  	(Departure_Time, Destination, Arrival_Time, Status, Space_Left, Train_ID)
  	values
  	("11/30/2017 9:30am", "St. Louis", "11/30/2017 10:30am", "On Time", 10, 12345678);

  insert into Trips
  	(Departure_Time, Destination, Arrival_Time, Status, Space_Left, Train_ID)
  	values
  	("12/03/2017 7:30pm", "Springfield", "12/03/2017 9:00pm", "Delayed", 10, 22224444);

  insert into Trips
  	(Departure_Time, Destination, Arrival_Time, Status, Space_Left, Train_ID)
  	values
  	("12/03/2017 10:00am", "Jefferson City", "12/03/2017 1:00pm", "On Time", 10, 33224455);
  
  insert into Tickets
  	(Train_ID, Seat, Type, SSN, Status)
  	values
  	(12345678, 01, "First Class", NULL, "Available");

  insert into Tickets
  	(Train_ID, Seat, Type, SSN, Status)
  	values
  	(12345678, 02, "First Class", NULL, "Available");

  insert into Tickets
  	(Train_ID, Seat, Type, SSN, Status)
  	values
  	(12345678, 03, "First Class", NULL, "Available");

  insert into Tickets
  	(Train_ID, Seat, Type, SSN, Status)
  	values
  	(12345678, 04, "First Class", NULL, "Available");

  insert into Tickets
  	(Train_ID, Seat, Type, SSN, Status)
  	values
  	(12345678, 05, "Business", NULL, "Available");

  insert into Tickets
  	(Train_ID, Seat, Type, SSN, Status)
  	values
  	(12345678, 06, "Business", NULL, "Available");

  insert into Tickets
  	(Train_ID, Seat, Type, SSN, Status)
  	values
  	(12345678, 07, "Business", NULL, "Available");

  insert into Tickets
  	(Train_ID, Seat, Type, SSN, Status)
  	values
  	(12345678, 08, "Business", NULL, "Available");

  insert into Tickets
  	(Train_ID, Seat, Type, SSN, Status)
  	values
  	(12345678, 09, "Business", NULL, "Available");

  insert into Tickets
  	(Train_ID, Seat, Type, SSN, Status)
  	values
  	(12345678, 10, "Business", NULL, "Available");

  insert into Tickets
  	(Train_ID, Seat, Type, SSN, Status)
  	values
  	(22224444, 01, "First Class", NULL, "Available");

  insert into Tickets
  	(Train_ID, Seat, Type, SSN, Status)
  	values
  	(22224444, 02, "First Class", NULL, "Available");

  insert into Tickets
  	(Train_ID, Seat, Type, SSN, Status)
  	values
  	(22224444, 03, "First Class", NULL, "Available");

  insert into Tickets
  	(Train_ID, Seat, Type, SSN, Status)
  	values
  	(22224444, 04, "First Class", NULL, "Available");

  insert into Tickets
  	(Train_ID, Seat, Type, SSN, Status)
  	values
  	(22224444, 05, "Business", NULL, "Available");

  insert into Tickets
  	(Train_ID, Seat, Type, SSN, Status)
  	values
  	(22224444, 06, "Business", NULL, "Available");

  insert into Tickets
  	(Train_ID, Seat, Type, SSN, Status)
  	values
  	(22224444, 07, "Business", NULL, "Available");

  insert into Tickets
  	(Train_ID, Seat, Type, SSN, Status)
  	values
  	(22224444, 08, "Business", NULL, "Available");

  insert into Tickets
  	(Train_ID, Seat, Type, SSN, Status)
  	values
  	(22224444, 09, "Business", NULL, "Available");

  insert into Tickets
  	(Train_ID, Seat, Type, SSN, Status)
  	values
  	(22224444, 10, "Business", NULL, "Available");

  insert into Tickets
  	(Train_ID, Seat, Type, SSN, Status)
  	values
  	(33224455, 01, "First Class", NULL, "Available");

  insert into Tickets
  	(Train_ID, Seat, Type, SSN, Status)
  	values
  	(33224455, 02, "First Class", NULL, "Available");

  insert into Tickets
  	(Train_ID, Seat, Type, SSN, Status)
  	values
  	(33224455, 03, "First Class", NULL, "Available");

  insert into Tickets
  	(Train_ID, Seat, Type, SSN, Status)
  	values
  	(33224455, 04, "First Class", NULL, "Available");

  insert into Tickets
  	(Train_ID, Seat, Type, SSN, Status)
  	values
  	(33224455, 05, "Business", NULL, "Available");

  insert into Tickets
  	(Train_ID, Seat, Type, SSN, Status)
  	values
  	(33224455, 06, "Business", NULL, "Available");

  insert into Tickets
  	(Train_ID, Seat, Type, SSN, Status)
  	values
  	(33224455, 07, "Business", NULL, "Available");

  insert into Tickets
  	(Train_ID, Seat, Type, SSN, Status)
  	values
  	(33224455, 08, "Business", NULL, "Available");

  insert into Tickets
  	(Train_ID, Seat, Type, SSN, Status)
  	values
  	(33224455, 09, "Business", NULL, "Available");

  insert into Tickets
  	(Train_ID, Seat, Type, SSN, Status)
  	values
  	(33224455, 10, "Business", NULL, "Available");
CREATE TABLE supervisor (  
    id int NOT NULL primary key AUTO_INCREMENT,
    firstName varchar(50),
    lastName varchar(50),
    phone char(10),
    email varchar(50),
    password text NOT NULL,
    createdAt DATETIME,
    shortDesc varchar(250)
);

CREATE TABLE therapist (  
    id int NOT NULL primary key AUTO_INCREMENT,
    firstName varchar(50),
    lastName varchar(50),
    phone char(10),
    email varchar(50),
    password text NOT NULL,
    createdAt DATETIME,
    shortDesc varchar(250),
    supervisor int,
    FOREIGN KEY (supervisor) REFERENCES supervisor(id)
);

CREATE TABLE client (  
    id int NOT NULL primary key AUTO_INCREMENT,
    firstName varchar(50),
    lastName varchar(50),
    phone char(10),
    email varchar(50),
    password text NOT NULL,
    createdAt DATETIME,
    lastSeen DATETIME,
    therapist int,
    FOREIGN KEY (therapist) REFERENCES therapist(id)
);

CREATE TABLE meeting (  
    id int NOT NULL primary key AUTO_INCREMENT,
    client int,
    FOREIGN KEY (client) REFERENCES client(id),
    therapist int,
    FOREIGN KEY (therapist) REFERENCES therapist(id),
    clientNo int NOT NULL,
    dateTime DATETIME,
    duration int NOT NULL DEFAULT 50
    );

CREATE TABLE assignment (  
    id int NOT NULL primary key AUTO_INCREMENT,
    client int,
    FOREIGN KEY (client) REFERENCES client(id),
    therapist int,
    FOREIGN KEY (therapist) REFERENCES therapist(id),
    clientNo int NOT NULL,
    dateTime DATETIME,
    dueDate DATETIME,
    content text,
    response text
    );


CREATE TABLE notes (  
    id int NOT NULL primary key AUTO_INCREMENT,
    client int,
    FOREIGN KEY (client) REFERENCES client(id),
    therapist int,
    FOREIGN KEY (therapist) REFERENCES therapist(id),
    content text NOT NULL
);

ALTER TABLE meeting
    ADD assign_pre int;

ALTER TABLE meeting 
    ADD FOREIGN KEY (assign_pre) REFERENCES assignment(id);


ALTER TABLE meeting
    ADD assign_post int;
    
ALTER TABLE meeting 
    ADD FOREIGN KEY (assign_post) REFERENCES assignment(id);

ALTER TABLE notes
    ADD meeting int;

ALTER TABLE notes 
    ADD FOREIGN KEY (meeting) REFERENCES meeting(id);

    INSERT INTO supervisor (firstName, lastName, phone, email, createdAt, shortDesc)
VALUES ('Super1', 'Super1', 1234567890, 'email1@email.com', '2020.05.02 00:00:01', 'Super1 test description'),
('Super2', 'Super2', 1234567890, 'email2@email.com', '2020.05.03 00:00:04', 'Super2 test description'); 

INSERT INTO therapist (firstName, lastName, phone, email, createdAt, shortDesc, supervisor)
VALUES ('Therapist1', 'Therapist1', 1234567890, 'therapist1@email.com', '2020.05.03 00:00:04', 'Therapist1 test description', 1),
('Therapist2', 'Therapist2', 1234567890, 'therapist2@email.com', '2020.05.03 00:00:04', 'Therapist2 test description', 2),
('Therapist3', 'Therapist3', 1234567890, 'therapist3@email.com', '2020.05.03 00:00:04', 'Therapist3 test description', 1);

INSERT INTO client (firstName, lastName, phone, email, password, createdAt, lastSeen, therapist)
VALUES ('client1', 'client1', 1234567890, 'client1@email.com', 'admin', '2020.05.03 00:00:04', '2020.05.03 00:00:04', 1),
('client2', 'client2', 1234567890, 'client2@email.com', 'admin', '2020.05.03 12:15:04', '2020.05.03 00:00:04', 2),
('client3', 'client3', 1234567890, 'client3@email.com', 'admin', '2020.05.06 00:40:04', '2020.06.03 00:00:04', 3),
('client4', 'client4', 1234567890, 'client4@email.com', 'admin', '2020.05.14 14:55:04', '2020.05.03 00:00:04', 1),
('client5', 'client5', 1234567890, 'client5@email.com', 'admin', '2020.05.23 03:33:04', '2020.06.03 00:00:04', 2),
('client6', 'client6', 1234567890, 'client6@email.com', 'admin', '2020.06.03 08:20:04', '2020.05.03 00:00:04', 3);

INSERT INTO meeting (client, therapist, clientNo, dateTime)
VALUES (1, 1, 1, '2020.12.24 15:00:00'),
(1, 1, 2, '2020.12.24 15:00:00'),
(2, 2, 1, '2020.12.25 16:00:00'),
(1, 1, 3, '2021.01.02 12:00:00'),
(1, 1, 1, '2021.01.14 13:00:00'),
(1, 1, 4, '2021.01.13 18:00:00'),
(2, 2, 2, '2021.01.16 09:00:00'),
(1, 1, 5, '2021.01.18 10:00:00'),
(1, 1, 6, '2021.01.21 15:00:00'),
(2, 2, 3, '2021.01.24 17:00:00'),
(1, 1, 7, '2021.01.26 12:00:00'),
(3, 1, 1, '2021.01.28 11:00:00'),
(3, 1, 2, '2021.01.31 15:00:00'),
(3, 1, 3, '2021.02.01 10:00:00'),
(4, 3, 1, '2021.02.04 18:00:00'),
(4, 3, 2, '2021.02.11 16:00:00'),
(4, 3, 3, '2021.02.18 15:00:00'),
(5, 2, 1, '2021.02.24 14:00:00'),
(6, 1, 1, '2021.02.27 09:00:00');

INSERT INTO notes (client, therapist, content, meeting)
VALUES (1, 1, 'Sed sed gravida lectus. Proin ultricies diam elit, vitae gravida erat lobortis eget. Nam consectetur eget eros et vehicula. Ut ac nibh ac lorem consequat blandit. Pellentesque at arcu facilisis, pulvinar nisi nec, ultrices turpis. Ut non dapibus leo. Pellentesque vulputate dolor et tristique vestibulum.', 1),
(1, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam molestie neque dui, at efficitur augue porta ac. Morbi at odio elementum, dapibus felis ut, feugiat felis. Phasellus nec sodales arcu. Integer tincidunt libero neque, sed dapibus ante euismod a. Etiam vehicula, tellus eget tempor tempus, urna lacus viverra massa, eleifend maximus odio libero sit amet leo. Donec a fermentum neque. Phasellus accumsan blandit ultricies. Duis eleifend at elit ac sodales. Suspendisse in egestas nisl. Phasellus et enim pellentesque, dictum leo vel, elementum ligula. Vestibulum mollis odio erat, a laoreet odio suscipit eget. Maecenas et porta leo. Nam accumsan lectus lorem, tincidunt varius urna volutpat ut.', 2),
(2, 2, 'Mauris ac lorem erat. Vestibulum quis rhoncus eros. Vestibulum elementum fringilla malesuada. Suspendisse ac mi vel ipsum auctor gravida. Phasellus ultrices nulla vitae enim condimentum, vel iaculis nulla pharetra. Vestibulum et diam quis purus ullamcorper venenatis. Vestibulum rhoncus lacus vel ipsum consectetur congue a a augue. Vestibulum et felis ut eros fermentum blandit. Praesent id neque ac justo ultricies lobortis. Praesent eu feugiat magna. Aenean vehicula urna nec porta euismod. Nulla tortor justo, cursus at arcu malesuada, egestas aliquet lectus.', 3),
(1, 1, 'Integer eu leo orci. Curabitur non lacus enim. Suspendisse vel libero est. Ut molestie enim eget justo molestie, ac porta augue volutpat. Integer ut diam metus. Proin libero risus, vehicula id neque ac, congue scelerisque magna. Vivamus molestie quam vel vestibulum pretium. Maecenas diam lacus, laoreet eu sem vitae, sagittis consequat risus. Curabitur laoreet bibendum diam, vel consequat ex. Suspendisse condimentum lorem elementum vulputate pretium. Donec cursus metus ut neque aliquam semper varius nec augue. Integer ut turpis nisl.', 4),
(1, 1, 'Sed massa nunc, vestibulum vitae tristique vel, mattis eu magna. Proin vulputate porttitor felis maximus porttitor. Fusce sollicitudin odio orci, quis pretium magna congue vel. Aenean rhoncus lacus vitae augue molestie malesuada. Integer finibus dolor a pretium molestie. Ut non porttitor lectus. Nam non malesuada magna.', 5),
(1, 1, 'Cras ac nunc eu nunc pharetra lobortis id vitae justo. Maecenas fermentum sem et mauris ullamcorper, id dapibus neque eleifend. Aenean vehicula tempus diam, et aliquam urna accumsan ut. Proin ut volutpat nunc. Donec elit tellus, maximus eget ligula sit amet, imperdiet porta diam. Phasellus condimentum massa sit amet sem blandit, id posuere nibh aliquam. Sed pretium tempus nisi, id elementum nunc blandit et. Ut volutpat condimentum velit, eget faucibus nisi vulputate eu. Donec luctus mi et nisl convallis fermentum. Aenean consectetur mollis nunc nec congue.', 6),
(2, 2, 'Fusce mattis libero eget vestibulum maximus. Nam hendrerit volutpat finibus. Pellentesque dapibus nisl ac quam euismod tristique. Nulla facilisi. Vestibulum sem ante, lacinia vitae risus sit amet, tempor bibendum lacus. Donec arcu ipsum, condimentum scelerisque mattis eget, vulputate eget erat. Nam suscipit fringilla lectus non aliquam. Nam ac massa at neque aliquam imperdiet.', 7),
(1, 1, 'Curabitur fringilla vulputate semper. Nunc varius tellus id leo mattis consequat. Sed facilisis enim et metus ullamcorper, vitae sodales diam pellentesque. Duis volutpat fringilla orci, nec pharetra erat interdum vel. Sed a massa accumsan, tristique metus ac, gravida ligula. Duis sit amet dui ultrices, rhoncus dolor sed, vestibulum diam. Nunc orci nulla, egestas nec diam vitae, cursus pellentesque ante. Vivamus nulla ipsum, volutpat vitae elementum sit amet, gravida in lectus. Etiam eu tortor sit amet justo convallis euismod', 8),
(1, 1, 'Morbi mollisClass aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Cras non vulputate quam. Suspendisse fringilla ante tristique felis commodo sodales. Integer congue viverra ex, a hendrerit leo ornare vel. Aenean vitae velit pellentesque, laoreet ipsum et, euismod mi. Fusce sit amet purus consectetur, tempus sapien nec, euismod risus. Duis dignissim faucibus nibh, sed pulvinar nisl tincidunt ac.test content', 10),
(1, 1, 'Nullam a imperdiet dolor, sit amet interdum odio. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque interdum nibh at pulvinar elementum. Curabitur porta porta risus nec facilisis. Suspendisse a eros ex. Nunc ac velit laoreet lacus pretium tristique molestie non enim. Vestibulum vulputate lorem eget magna placerat commodo. Integer pharetra convallis orci, sed blandit ligula ultricies sed. Vestibulum vestibulum gravida imperdiet.', 11),
(3, 1, 'Sed tristique auctor augue. Sed id mi leo. Ut sit amet ex vel diam hendrerit consectetur. Cras vitae aliquam arcu. Nulla sit amet blandit diam, ut dictum urna. Proin ultrices a ligula quis venenatis. Suspendisse vitae mi dui. Cras sed justo pharetra, laoreet lacus non, ornare sem. Mauris tincidunt lacus in fermentum cursus. Praesent vel fermentum arcu. Donec vestibulum luctus lorem, at convallis ex luctus at. Nulla pellentesque vitae dui vulputate consequat.', 12),
(3, 1, 'Proin tempor tellus a leo mattis semper. Mauris ut dui ligula. Phasellus imperdiet nunc risus, sed facilisis mi euismod hendrerit. Cras eu orci a neque pretium convallis. Aenean elementum massa sit amet aliquam bibendum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse laoreet libero non lacinia mattis.', 13),
(3, 1, 'Vestibulum vel porttitor mauris, eu tincidunt tellus. Suspendisse ornare leo mi, vitae bibendum tortor egestas in. Morbi nec nisi nisl. Phasellus ut consectetur elit, sit amet lobortis enim. Nullam porttitor, dui a cursus pulvinar, eros turpis congue neque, at venenatis justo ligula at turpis. In hac habitasse platea dictumst. ', 14),
(4, 3, 'Vivamus pretium diam erat, in interdum ex posuere eu. Sed viverra, sapien id interdum sodales, massa purus iaculis sem, eu iaculis libero eros sed dolor. Fusce mi nisi, porttitor ut hendrerit vel, fermentum non nibh. Vestibulum pharetra venenatis orci, sit amet blandit orci aliquet nec.', 15),
(4, 3, 'Aliquam id dolor efficitur, efficitur quam sit amet, pellentesque quam. Praesent vehicula metus nec laoreet scelerisque. Nunc eu lectus et nisi accumsan finibus vel nec dui. Duis dolor nulla, imperdiet sit amet risus ac, faucibus venenatis sem. Donec mi ipsum, tincidunt eget aliquam nec, varius sit amet justo.', 16),
(4, 3, 'Proin ut purus rutrum, pretium nisl sed, facilisis ipsum. Fusce convallis dictum efficitur. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Curabitur in ipsum interdum, luctus magna at, euismod lectus.', 17),
(5, 2, 'Nullam convallis tortor in pharetra malesuada. Donec maximus arcu et metus bibendum facilisis. Vivamus posuere augue ac quam bibendum finibus. Nam porta dolor a tortor feugiat, ac dictum augue blandit. Praesent sollicitudin dui consectetur diam pellentesque pretium. Phasellus quis nisi vehicula, consequat leo et, aliquam nibh. ', 18),
(6, 1, 'Praesent blandit sapien vel mauris tincidunt ullamcorper. Aliquam tellus nunc, rhoncus in fringilla tempor, accumsan fermentum libero. Maecenas metus arcu, viverra eu odio nec, convallis dapibus augue. Sed sagittis libero vel lectus iaculis, vel congue mauris euismod. ', 19);

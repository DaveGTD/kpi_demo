create table facebook(
    fb_id int not null auto_increment, 
    clicked int, 
    converted int, 
    cost int, 
    age int, 
    gender varchar(255), 
    state varchar(255),
    primary key (fb_id)
);

create table website(
    user_id int not null auto_increment,
    ip varchar(255), 
    time_spent int, 
    product varchar(255),
    revenue decimal,
    primary key (user_id)
);

create table retail(
    user_id int not null auto_increment, 
    product varchar(255),
    revenue decimal,
    primary key (user_id)
);

create table plena(
    customer_id int not null auto_increment, 
    age int, 
    gender varchar(255),
    state varchar(255),
    ip varchar(255),
    product varchar(255),
    revenue decimal,
    source varchar(255),
    referrer varchar(255),
    cost int, 
    visit_time int,
    primary key (customer_id)
);
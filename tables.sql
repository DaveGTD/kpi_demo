--ctc = click through rate
--cpc = cost per click

create table ad_words_demo(
    id int not null auto_increment,
    period datetime,
    spend int, 
    clicks int, 
    ctr int, 
    cpc int, 
    impressions int, 
    conversion_rate int, 
    revenue_per_conversion int, 
    conversions int, 
    unique_customers_added int, 
    ts DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    primary key (id)

);
CREATE DATABASE demo;


CREATE TABLE exec
(
	id INT AUTO_INCREMENT NOT NULL,
	ts DATETIME,
	ts_internal TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	revenue_add DECIMAL,
	revenue_lost DECIMAL,
	customer_satisfaction_score INT,
	sales_growth_rate INT,
	net_income DECIMAL,
	growth_rate INT,
	PRIMARY KEY (id)
);

CREATE TABLE marketing
(
	id INT AUTO_INCREMENT NOT NULL,
	ts DATETIME,
	ts_internal TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	inboud_leads INT,
	conversion_rate INT,
	customer_acquisition_cost DECIMAL,
	cost_per_lead DECIMAL,
	lead_source VARCHAR(255),
	google_roi INT,
	facebook_roi INT,
	direct_mail_roi INT,
	other_roi INT,
  PRIMARY KEY (id)
);


CREATE TABLE finance
(
	id INT AUTO_INCREMENT NOT NULL,
	ts DATETIME,
	ts_internal TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	cash_flow DECIMAL,
	burn_rate DECIMAL,
	margins INT,
	customer_lifetime_value DECIMAL,
	cash_in_bank DECIMAL,
	revenue_growth_rate INT,
	income_growth_rate INT,
  PRIMARY KEY (id)
);

CREATE TABLE website
(
	id INT AUTO_INCREMENT NOT NULL,
	ts DATETIME,
	ts_internal TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  live_customers INT,
	logins_per_day INT,
	average_time_spent DECIMAL,
	error_rate INT,
	bouce_rate INT,
	source VARCHAR(255),
	state VARCHAR(2),
	traffic INT,
  PRIMARY KEY (id)
);

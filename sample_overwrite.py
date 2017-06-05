#!/Users/adave/anaconda3/bin/python
import datetime
from influxdb import InfluxDBClient
from random import randint
import random
import time
import json

#test overwrite feature of influxdb 

username = 'admin'
password = 'admin'
port = 8086
dbname = 'mydb'
host = '54.218.45.82' #IDB_THREE
time = '2015-09-09T06:38:50'

client = InfluxDBClient(host, port, username, password, dbname)
client.switch_database(dbname)


json_body = [
				{
					"measurement":"cost_of_customer_acquisition",
					"tags": {"medium":"direct_mail", "state":"FL"},
					"time": time,
					"fields": { "spend_per_customer":53, "total_spend":2112, "number_customers_acquired":210, "attrition_rate":10 }
				}
			]

client.write_points(json_body)

#!/Users/adave/anaconda3/bin/python
import datetime
from influxdb import InfluxDBClient
from random import randint
import random
import time
import json

def strTimeProp(start, end, format, prop):
    """Get a time at a proportion of a range of two formatted times.

    start and end should be strings specifying times formated in the
    given format (strftime-style), giving an interval [start, end].
    prop specifies how a proportion of the interval to be taken after
    start.  The returned time will be in the specified format.
    """

    stime = time.mktime(time.strptime(start, format))
    etime = time.mktime(time.strptime(end, format))

    ptime = stime + prop * (etime - stime)

    return time.strftime(format, time.localtime(ptime))


def randomDate(start, end, prop):
    return strTimeProp(start, end, "%Y-%m-%dT%H:%M:%S", prop)

def randomTimestamp(start, end):
    rd = randomDate(start, end, random.random())
    # print rd
    return time.mktime(datetime.datetime.strptime(rd, '%m/%d/%Y').timetuple())


def cost_of_customer_acquisition(client, num_to_insert, start_time, end_time):
	medium_tags = ['facebook', 'google', 'direct_mail', 'mlm']
	state_tags = ['UT', 'WA', 'MA', 'FL', 'TX']

	for i in range(1, num_to_insert):
		medium_tag_value = random.choice(medium_tags)
		state_tag_value = random.choice(state_tags)
		json_body = [
						{
							"measurement":"cost_of_customer_acquisition",
							"tags": {"medium":medium_tag_value, "state":state_tag_value},
							"time": randomDate(start_time, end_time, random.random()),
							"fields": { "spend_per_customer":randint(49,83), "total_spend":randint(0,10000), "number_customers_acquired":randint(0,500), "attrition_rate":randint(10,70) }
						}
					]
		client.write_points(json_body)
	#end of function


username = 'admin'
password = 'admin'
port = 8086
dbname = 'mydb'
host = '' #IDB_THREE
num_to_insert = 10
start_time = '2015-03-04T21:08:12'
end_time = datetime.datetime.now().strftime("%Y-%m-%dT%H:%M:%S")
client = InfluxDBClient(host, port, username, password, dbname)
client.switch_database(dbname)

# start inserting data
cost_of_customer_acquisition(client, num_to_insert, start_time, end_time)

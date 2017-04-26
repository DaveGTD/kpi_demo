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


def main(host='localhost', port=8086):
    user = 'admin'
    password = 'admin'
    dbname = 'mydb'
    host = '54.191.134.166'
    client = InfluxDBClient(host, port, dbname)


    client.switch_database(dbname)

    # print (randomDate("2015-03-04T21:08:12", "2016-03-04T21:08:12", random.random()))

    for i in range(1,1000):
            json_body = [
            {
                "measurement":"test_measurement",
                "tags": {"tag_one":"value_one", "tag_two":"value_two"},
				# "time": datetime.datetime.now(),
                "time": randomDate("2015-03-04T21:08:12", "2016-03-04T21:08:12", random.random()),
                "fields": {
                            "test_data_one":randint(0,100)
                          }

            }
            ]

            client.write_points(json_body)


    # result = client.query(query)

    # client.switch_user(user, password)


    # client.drop_database(dbname)


main()

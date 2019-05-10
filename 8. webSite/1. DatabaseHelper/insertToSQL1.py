import mysql.connector
from mysql.connector import Error
from mysql.connector import errorcode
from datetime import datetime

import json
import codecs
from collections import OrderedDict

rate = json.load(codecs.open(r'C:\Users\Administrator\Desktop\crawling\ourpoint_korea.json','r','utf-8-sig'))
corr = json.load(codecs.open(r'C:\Users\Administrator\Desktop\crawling\correlation_korea.json','r','utf-8-sig'))
loc = json.load(codecs.open(r'C:\Users\Administrator\Desktop\crawling\final_korea.json','r','utf-8-sig'))


def insertToTable(res_name, location, res_rate, keyword1, keyword2, keyword3, id):
    try:
        connection = mysql.connector.connect(host='localhost',
                             database='SADproj',
                             user='root',
                             password='')

        cursor = connection.cursor(prepared=True)

        sql_insert_query = ("INSERT INTO korean"
                            "(res_name, location, res_rate, keyword1, keyword2, keyword3, id) "
                            "VALUES (%s, %s, %s, %s, %s, %s, %s)")

        insert_tuple = (res_name, location, res_rate, keyword1, keyword2, keyword3, id)
        cursor.execute(sql_insert_query, insert_tuple)
        connection.commit()
        print("Record inserted successfully into table")
    except mysql.connector.Error as error :
        connection.rollback()
        print("Failed to insert into MySQL table {}".format(error))
    finally:
        #closing database connection.
        if(connection.is_connected()):
            cursor.close()
            connection.close()
            print("MySQL connection is closed")


for i in range(len(corr)):
    a = rate[i]['res_name']
    b = rate[i]['our_point']
    c = corr[i]['k1']
    d = corr[i]['k2']
    e = corr[i]['k3']
    Id = i
    for j in range(len(loc)):
        loc_name = loc[j]['res_name']
        if (loc_name == a):
            loca = loc[j]['address']
            insertToTable(a, loca, b, c, d, e, Id)
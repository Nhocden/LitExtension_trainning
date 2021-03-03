import mysql.connector
import pandas as pd
import numpy as np

#Read file csv
df = pd.read_csv("customer.csv")
#Handling data None
data1 = df.replace({np.nan: None})
data2 = data1.itertuples()


db = mysql.connector.connect(
    user='root',
    password='nguyendung123',
    host='localhost',
    database='test',
    autocommit=True,
    auth_plugin='mysql_native_password'
)
cursor = db.cursor()


def create_table():
    query = "CREATE TABLE customer ("
    for i in data1:
        if data1[i].dtype =="int64":
            print (i)
            query += i+" int(10),"
        else :
            query += i + " varchar(50),"

    query = query[:-1] + ");"
    print(query)
    cursor.execute(query)

def insert_data():
    create_table()
    sql = "INSERT INTO customer VALUES("
    for column in data1:
        sql += "%s,"
    sql = sql[:-1]
    sql += ");"
    for row in data2:
        cursor.execute(sql,row[1::])

insert_data()

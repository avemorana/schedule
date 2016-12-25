import mysql.connector
from file_names import *

config = {
    'user': 'root',
    'password': '',
    'host': 'localhost',
    'database': 'lectures'
}

cnx = mysql.connector.connect(**config)

if cnx.is_connected():
    print("Connected to MySQL database '{0}'".format(config['database']))

cur = cnx.cursor()
cur.execute("DROP TABLE IF EXISTS lessons")
cur.execute("CREATE TABLE lessons("
            "id INT PRIMARY KEY AUTO_INCREMENT, "
            "room VARCHAR(10), "
            "building TINYINT(2), "
            "week TINYINT(1), "
            "day TINYINT(1), "
            "lesson_number TINYINT(2), "
            "lesson_name VARCHAR(100), "
            "lesson_teacher VARCHAR(50))")

query = "INSERT INTO lessons(room,building,week,day,lesson_number,lesson_name,lesson_teacher) VALUES(%s,%s,%s,%s,%s,%s,%s)"

counter = 0
with open(LESSONS_FILE_NAME) as f:
    for line in f.readlines():
        #line = line.replace("'", "*")       #replace all apostrophes with star
        room, building, week, day, lesson, name, teacher = line.split('\t')
        building = int(building)
        day = int(day)
        lesson = int(lesson)
        teacher = teacher.strip()
        args = [room, building, week, day, lesson, name, teacher]
        counter += 1
        cur.execute(query, args)
        cnx.commit()

cur.execute("SELECT * FROM lessons")
rows = cur.fetchall()
print("DONE")

cur.close()
cnx.close()

# with open('list_of_lessons.txt') as f:
#     for line in f.readlines():
#         # if line.find('улаков') != -1:
#         room, building, week, day, number, name, teacher = line.split("\t")
#
#         try:
#             building = int(building)
#         except ValueError:
#             print(building)
#         # print(type(building))
#         # print(line, end="")
from file_names import *

with open(UNIQUE_PLACES_FILE_NAME) as f:
    counter = 0
    for line in f.readlines():
        if line.split('\t')[-1].find("01") != -1:
            counter += 1
            print(str(counter) + ".\t" + line, end='')

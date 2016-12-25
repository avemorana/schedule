import json
import re
from urllib import error, request

from file_names import *
from file_utils import append_to_file


def read_groups():
    groups = {}
    with open(GROUPS_FILE_NAME, 'r') as f:
        for line in f.readlines():
            group_info = line.strip().split('.')
            groups[group_info[0]] = group_info[1]
    return groups


def get_group_schedule(group_id):
    url = "http://api.rozklad.org.ua/v2/groups/{}/lessons".format(group_id)
    req = request.Request(url)
    try:
        resp = request.urlopen(req)
    except error.HTTPError:
        return None
    resp_data = resp.read()
    group_schedule = json.loads(resp_data.decode('utf-8'))
    return group_schedule['data']


def parse_schedule(schedule):
    for lesson in schedule:
        if lesson['lesson_type'] == "Лек" and lesson['lesson_room'] != "":

            name = re.sub(' +', ' ', lesson['lesson_full_name'])
            teacher = lesson['teacher_name'] if lesson['teacher_name'] != "" else 'викладача не вказано'
            lesson_room = lesson['lesson_room']
            if lesson_room.endswith(','):
                lesson_room = lesson_room[:-1]
            if lesson_room.find(',') != -1:
                lesson_room = lesson_room.split(',')[0]
            if re.match(r'^\d*\w*/?\d*-\d+$', lesson_room):
                room, building = lesson_room.split('-')
                if room == '':
                    append_to_file(BAD_LESSON_ROOMS_FILE_NAME, lesson_room)
                    continue
            elif re.match(r'^\d*\w*/?\d*-\d+\s\D+$', lesson_room):
                room, building = lesson_room.split(' ')[0].split('-')
            else:
                append_to_file(BAD_LESSON_ROOMS_FILE_NAME, lesson_room)
                continue

            week = lesson['lesson_week']
            day = lesson['day_number']
            number = lesson['lesson_number']

            lesson_str = room + '\t' + building + '\t' + week + '\t' + day + '\t' + number + '\t' + name + '\t' + teacher
            append_to_file(LESSONS_FILE_NAME, lesson_str)


if __name__ == '__main__':
    groups = read_groups()
    counter = 0
    size = len(groups)
    for group_id in groups.keys():
        counter += 1
        print("processed " + (str((counter * 100) / size)).split('.')[0] + "%")
        data = get_group_schedule(group_id)
        if data is not None:
            # print("GROUP {}: \"{}\"".format(group_id, groups[group_id]))
            parse_schedule(data)

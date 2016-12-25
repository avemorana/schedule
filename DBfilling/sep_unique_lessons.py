from file_names import *
from file_utils import append_to_file, is_unique_in_file


def is_unique_lesson(lesson):
    return is_unique_in_file(UNIQUE_LESSONS_FILE_NAME, lesson)


def is_unique_place(place):
    return is_unique_in_file(UNIQUE_PLACES_FILE_NAME, place)


def is_unique_time(time):
    return is_unique_in_file(UNIQUE_TIME_FILE_NAME, time)


def read_all_lessons():
    with open(LESSONS_FILE_NAME) as f:
        counter = 0
        for line in f.readlines():
            print(counter)
            counter += 1
            room, building, week, day, number, name, teacher = line.strip().split("\t")
            lesson = name + '\t' + teacher
            place = room + '\t' + building
            time = week + '\t' + day + '\t' + number
            if is_unique_lesson(lesson): append_to_file(UNIQUE_LESSONS_FILE_NAME, lesson)
            if is_unique_place(place):   append_to_file(UNIQUE_PLACES_FILE_NAME, place)
            if is_unique_time(time):     append_to_file(UNIQUE_TIME_FILE_NAME, time)


if __name__ == '__main__':
    with open(UNIQUE_LESSONS_FILE_NAME, 'w') as f:
        pass
    with open(UNIQUE_PLACES_FILE_NAME, 'w') as f:
        pass
    with open(UNIQUE_TIME_FILE_NAME, 'w') as f:
        pass
    read_all_lessons()
